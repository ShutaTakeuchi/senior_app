<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * 会員登録サポートの一覧
     */
    public function index()
    {
        return view('welcome.index');
    }

    /**
     * 営業所へ来られる方のためのページ
     */
    public function address()
    {
        return view('welcome.address');
    }

    /**
     * 訪問型のフォーム
     */
    public function form()
    {
        return view('welcome.form');
    }

    public function conf(Request $request)
    {
        
    }
}
