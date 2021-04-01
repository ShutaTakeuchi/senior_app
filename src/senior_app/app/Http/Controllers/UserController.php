<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    /**
     * 自分の個人情報を取得して表示する
     */
    public function index()
    {
        $user = Auth::user();
        $data = [
            'user' => $user
        ];

        return view('user.index', $data);
    }
}
