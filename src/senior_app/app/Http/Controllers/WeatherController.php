<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeatherController extends Controller
{
    /**
     * 天気予報を取得して、表示する
     */
    public function index()
    {
        $url = 'https://weather.tsukumijima.net/api/forecast/city/440010';
        $json = file_get_contents($url);
        $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
        $arr = json_decode($json,true);
        dd($arr);
        return view('');
    }
}
