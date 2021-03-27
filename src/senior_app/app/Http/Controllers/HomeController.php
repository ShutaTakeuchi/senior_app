<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use Auth;

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
        // homeで表示させるためのデータ
        $weather_info = $this->get_weather();
        $delivery_info = $this->show_reserve_delivery();
        $item_info = $this->show_reserve_item();
            // 投稿データの取得
        $posts = $this->get_all_post();
        $param = [
            'weather' => $weather_info,
            'deliveries' => $delivery_info,
            'items' => $item_info,
            'posts' => $posts,
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

    /**
     * 配食の注文内容を取得して表示させる
     */
    public function show_reserve_delivery()
    {
        $data = User::find(Auth::user()['id'])->deliveries;
        return $data;
    }

    /**
     * 配食の注文内容を取得して表示させる
     */
    public function show_reserve_item()
    {
        $data = User::find(Auth::user()['id'])->items;
        return $data;
    }

    public function get_all_post()
    {
        $posts = Post::orderBy('id', 'DESC')->take(6)->get();
        return $posts;
    }
}
