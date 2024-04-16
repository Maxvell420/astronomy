<?php

namespace App\Http\Controllers;

use App\Classes\AstronomyParserService;
use App\Models\Link;

class ParserController extends Controller
{
    public function parse()
    {
        $url = 'https://www.astronews.ru/';
        $parser = new AstronomyParserService($url);
        $model = new Link();
        $parser->getContent($model);
    }
}
