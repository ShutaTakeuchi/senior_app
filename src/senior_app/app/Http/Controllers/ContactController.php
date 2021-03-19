<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * 連絡一覧を表示
     */
    public function index()
    {
        return view('contact.index');
    }

    /**
     * 緊急連絡
     */
    public function emergency()
    {
        return view('contact.emergency');
    }
}
