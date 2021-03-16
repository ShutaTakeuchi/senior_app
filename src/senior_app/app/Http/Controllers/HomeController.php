<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $weather_info = $this->get_weather();
        $param = [
            'weather' => $weather_info
        ];
        return view('home', $param);
    }

    /**
     * 天気予報を取得
     */
    public function get_weather()
    {
        $url = 'https://weather.tsukumijima.net/api/forecast/city/440010';
        $json = file_get_contents($url);
        $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
        $arr = json_decode($json,true);
        return $arr;
    }
}
