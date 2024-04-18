<?php

namespace App\Classes;

use App\Models\Article;
use App\Models\Link;
use DiDom\Document;
use Illuminate\Database\Eloquent\Model;

class LentaParserService extends ParserService
{
    private int $counter = 0;
    public function __construct(string $root)
    {
        Link::query()->updateOrCreate(['url'=>'https://lenta.ru/rubrics/science/cosmos/'],[['url'=>'https://lenta.ru/rubrics/science/cosmos/','parsed'=>0]]);
        parent::__construct($root);
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
                return;
            }
            $this->log("started parsing $item->url");
            $options = ['headers'=>1,'redirects'=>1,'variable'=>1];
            $page = $this->getPage($item->url,$options);
//            file_put_contents('text.txt',$page);
//            die();
//            $this->target =$item->url;
//            $page = file_get_contents('text.txt');
//            проверка на то страница это новости или ссылка на ajax
            if ($this->checkMainLink($item->url)){
                $links = $this->getMainPageContent($page);
                $this->saveLinks($links,$model);
            }
            if ($this->checkArticleLink($item->url)){
                $this->getArticlePageContent($page,$item->url);
            }
            $item->update(['parsed'=>1]);
            $this->log("ended parsing $item->url");
            $this->counter++;
            $number = rand(1,5);
            sleep($number);
        }
    }
    private function getArticlePageContent(string $page,string $url)
    {
        preg_match('#"articleBody":"(?<articleText>.+)"}#',$page,$matches);
        $articleContent = $matches['articleText'];
        preg_match('#"thumbnailUrl":\["(?<articleThumbnail>.+?)",#',$page,$matches);
        $articleThumbnail = $matches['articleThumbnail'];
        preg_match('#"name":"(?<title>.+?)",#',$page,$matches);
        $articleTitle = $matches['title'];
        $article = Article::query()->firstOrCreate(['original'=>$url],['original'=>$url,'title'=>$articleTitle,'content'=>$articleContent]);
        if ($article->wasRecentlyCreated){
            $this->saveImage( $articleThumbnail,$article);
        }
    }
    private function saveImage(string $image,Article $article): void
    {
        $path = "pictures/$article->id";
        $name = $this->getImgName($image);
        mkdir($path,0777,true);
        $picture = $article->picture()->create(['original'=>$image,'name'=>$name,'path'=>$path]);
        $file = file_get_contents($image);
        $picture->savePicture($file,$name,$image);
    }
    private function checkMainLink(string $url):bool
    {
        if (str_starts_with($url,'https://lenta.ru/rubrics')){
            return true;
        }
        return false;
    }
    private function checkArticleLink(string $url):bool
    {
        return preg_match('#https*://lenta.ru/news/#',$url);
    }
    private function getMainPageContent(string $page)
    {
        $document = new Document($page);
        $patterns = ['.rubric-page__item._news > a','.rubric-page__item._more > a'];
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
}
