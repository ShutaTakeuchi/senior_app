<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Console\Presets\React;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    // show search-form
    public function index()
    {
        return view('delivery.index');
    }

    // show search result
    public function show(Request $request)
    {

        $client = new \GuzzleHttp\Client();
        $response = $client->request(
            'GET',
            'https://api.gnavi.co.jp/RestSearchAPI/v3/',
            ['query' => [
                'keyid' => '574735d685b7bb9a4b3574f15d2296e2',
                'areacode_m' => 'AREAM5308', 
                'freeword' => $request->input('food_name'),
                // 'takeout' => 1,
            ],
            'http_errors' => false
            ]
        );
        $data = [
            'results' => json_decode($response->getBody(), true)
        ];
        return view('delivery.show', $data);
    }
}
