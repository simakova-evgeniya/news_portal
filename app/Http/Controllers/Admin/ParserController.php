<?php

namespace App\Http\Controllers\Admin;


use App\Services\Contracts\Parser;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request,Parser $parser)
    {
        $load = $parser->setLink("https://www.vedomosti.ru/rss/issue.xml")
        ->getParseData();

    dd($load);
    
    
    }
}
