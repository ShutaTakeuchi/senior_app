<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HealthController extends Controller
{
    //健康状態を入力するフォームを表示
    public function index()
    {
        return view('health.index');
    }
}
