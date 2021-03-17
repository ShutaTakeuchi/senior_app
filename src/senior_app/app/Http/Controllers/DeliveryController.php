<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Console\Presets\React;
use Illuminate\Http\Request;
use Auth;

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

    public function insert_data_sheet(Request $request)
    {
        $credentials_path = storage_path('app/json/credentials.json');
        $client = new \Google_Client();
        $client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
        $client->setAuthConfig($credentials_path);
        $client = new \Google_Service_Sheets($client);

        $sheet_id = '1FH7nkXPNeqa8ay_8IcEcMjADq8K8ibqQTBCCytZJYAY';

        // 個人情報と注文データの挿入
        $order = [
            Auth::user()['id'],
            Auth::user()['name'],
            Auth::user()['address'],
            Auth::user()['tel'],
            $request->input('shop_id'),
            $request->input('shop_name'),
        ];

        $values = new \Google_Service_Sheets_ValueRange();
        $values->setValues([
            'values' => $order
        ]);
        $params = ['valueInputOption' => 'USER_ENTERED'];
        $client->spreadsheets_values->append(
            $sheet_id,
            'A1',
            $values,
            $params
        );
    }
}
