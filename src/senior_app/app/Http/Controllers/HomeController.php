<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Taxi;
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
        // homeで表示させるための各データ
        // $weather_info = $this->get_weather();
        $delivery_info = $this->show_reserve_delivery();
        $item_info = $this->show_reserve_item();
        $taxi_status = ($this->get_taxi_status());
        // 投稿データ
        $posts = $this->get_all_post();
        $param = [
            // 'weather' => $weather_info,
            'deliveries' => $delivery_info,
            'items' => $item_info,
            'posts' => $posts,
            'taxi_status' => $taxi_status
        ];
        return view('home', $param);
    }

    /**
     * 配食の注文内容を取得
     */
    public function show_reserve_delivery()
    {
        $data = User::find(Auth::user()['id'])->deliveries;
        return $data;
    }

    /**
     * 配食の注文内容を取得
     */
    public function show_reserve_item()
    {
        $data = User::find(Auth::user()['id'])->items;
        return $data;
    }

    /**
     * 全ての投稿を取得
     */
    public function get_all_post()
    {
        $posts = Post::orderBy('id', 'DESC')->take(6)->get();
        return $posts;
    }

    /**
     * タクシーのstatusを取得
     */
    public function get_taxi_status()
    {
        $taxi = Taxi::where('user_id', Auth::user()['id'])->where('status', 'お迎え中')->get();
        return $taxi;
    }
}
