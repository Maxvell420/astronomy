<?php

namespace App\Classes;

use App\Models\Article;
use App\Models\Link;
use DiDom\Document;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

class AstronomyParserService extends ParserService
{
    private int $counter = 0;
    public function __construct(string $root)
    {
        parent::__construct($root);
//        Пагинация статей на сайте на этой странице , поэтому начинаю брать с нее ну и поскольку новые статьи на первой странице , то ее проверяем каждый раз на новые статьи
        Link::query()->updateOrCreate(['url'=>'https://www.astronews.ru/cgi-bin/mng.cgi?page=news&str=1'],[['url'=>'https://www.astronews.ru/cgi-bin/mng.cgi?page=news&str=1','parsed'=>0]]);
    }

    function saveCookies(string $response)
    {
        // TODO: Implement saveCookies() method.
    }

    public function getContent(Model $model)
    {
        $news = $model::query()->where('parsed','=','false')->get();
        foreach ($news as $item){
            if ($this->counter>=10){
                $this->log('ended parsing session successfully');
                exit();
            }
            $this->log("started parsing $item->url");
            $options = ['headers'=>1,'redirects'=>1,'variable'=>1];
            $page = $this->getPage($item->url,$options);
//            file_put_contents('text.txt',$page);
//            die();
//            $page = file_get_contents('text.txt');
            $page = $this->convertToUTF8('windows-1251',$page);
            if ($this->mainPageCheck($item->url)){
                $links = $this->getMainPageContent($page);
                $this->saveLinks($links,$model);
            }
            if ($this->articlePageCheck($item->url)){
                $this->getArticlePageContent($page,$item->url);
            }
            $item->update(['parsed'=>1]);
            $this->log("ended parsing $item->url");
            $this->counter++;
            $number = rand(1,5);
            sleep($number);
        }
    }
    private function getMainPageContent(string $page):array
    {
        $patterns = ['.news-page .name','.pages a'];
        $document = new Document($page);
        $array=[];
        foreach ($patterns as $pattern){
            $links = $document->find($pattern);
            if (!empty($links)){
                $hrefs = $this->getLinks($links);
                $array=array_merge($array,$hrefs);
            }
        }
        return $array;
    }
    private function getArticlePageContent(string $page,string $url)
    {
        $document = new Document($page);
        $elements = $document->find('.news-page p');
        $title= $elements[0]->text();
        $text = $elements[1]->text();
        $pictures=[];
        $images = $document->find('.news-page .img_l');
        $srcs = array_merge($pictures,$this->getSrcs($images));
        $article = Article::query()->firstOrCreate(['original'=>$url],['original'=>$url,'title'=>$title,'content'=>$text]);
        if ($article->wasRecentlyCreated){
            $this->saveImages($srcs,$article);
        }
    }
    private function saveImages(array $images,Article $article)
    {
        foreach ($images as $image){
            $path = "pictures/$article->id";
            $name = $this->getImgName($image);
            mkdir($path,0777,true);
            $picture = $article->picture()->create(['original'=>$image,'name'=>$name,'path'=>$path]);
            $file = file_get_contents($image);
            $picture->savePicture($file,$name,$image);
        }
    }
    private function getText(string $page,string $selector)
    {
        $document = new Document($page);
        $document->find($selector);
    }
    private function mainPageCheck(string $url):bool
    {
        return preg_match("#str=\d+$#",$url);
    }
    private function articlePageCheck(string $url):bool
    {
        return preg_match("#^news=\d+$#",$url);
    }
}
