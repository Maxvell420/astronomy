<?php

namespace App\Http\Controllers;

use App\Classes\AstronomyParserService;
use App\Classes\LentaParserService;
use App\Models\Link;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    public function parse(Request $request)
    {
        $parser_id = $request->input('parser');
        if ($parser_id=='0'){
            $url = 'https://lenta.ru/';
            $parser = new LentaParserService($url);
            $model = new Link();
            $parser->getContent($model);
        } elseif ($parser_id=='1'){
            $url = 'https://www.astronews.ru/';
            $parser = new AstronomyParserService($url);
            $model = new Link();
            $parser->getContent($model);
        }
        return redirect()->route('dashboard');
    }
}
