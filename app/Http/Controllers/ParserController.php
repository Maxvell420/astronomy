<?php

namespace App\Http\Controllers;

use App\Classes\AstronomyParserService;
use App\Classes\LentaParserService;
use App\Models\Link;

class ParserController extends Controller
{
    public function parse()
    {
        $url = 'https://lenta.ru/';
        $parser = new LentaParserService($url);
        $model = new Link();
        $parser->getContent($model);
//        $url = 'https://www.astronews.ru/';
//        $parser = new AstronomyParserService($url);
//        $model = new Link();
//        $parser->getContent($model);
    }
}
