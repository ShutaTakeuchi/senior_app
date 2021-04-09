<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Taxi;

class TaxiController extends Controller
{
    /**
     * 一覧表示
     */
    public function index()
    {
        $taxis = Taxi::all();
        $data = [
            'taxis' => $taxis
        ];

        return view('admin.taxi.index', $data);
    }
}
