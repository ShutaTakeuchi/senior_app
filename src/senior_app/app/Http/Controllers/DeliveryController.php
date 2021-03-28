<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Console\Presets\React;
use Illuminate\Http\Request;
use Auth;
use App\Delivery;

class DeliveryController extends Controller
{
    /**
     * 検索フォームを表示する
     */
    public function index()
    {
        return view('delivery.index');
    }

    /**
     * 検索結果データを取得し、表示する
     */
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
    
    /**
     * 確認画面の表示
     */
    public function confirm_purchase(Request $request)
    {
        $id = $request->input('shop_id');
        $name = $request->input('shop_name');
        $data = [
            'shop_id' => $id,
            'shop_name' => $name,
            'user_address' => Auth::user()['address'],
        ];
        return view('delivery.conf', $data);
    }

    /**
     * スプレッドシートとデータベースに注文内容を追加する
     */
    public function insert_data_sheet(Request $request)
    {
        $credentials_path = storage_path('app/json/credentials.json');
        $client = new \Google_Client();
        $client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
        $client->setAuthConfig($credentials_path);
        $client = new \Google_Service_Sheets($client);

        $sheet_id = '1FH7nkXPNeqa8ay_8IcEcMjADq8K8ibqQTBCCytZJYAY';

        // 個人情報と注文データを定義
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
            'delivery!A1',
            $values,
            $params
        );

        // データベースに保存
        $this->insert_data($request->input('shop_id'), $request->input('shop_name'));
        
        // 注文完了時の表示
        // return view('delivery.comp');
        // フラッシュメッセージ
        return redirect('/')->with([
            'message_1' => '注文しました。',
            'message_2' => 'しばらくお待ちください。'
        ]);
    }

    /**
     * データベースに新規作成
     */
    public function insert_data($shop_id, $shop_name)
    {
        $delivery = new Delivery;
        $delivery->user_id = Auth::user()['id'];
        $delivery->shop_id = $shop_id;
        $delivery->shop_name = $shop_name;
        $delivery->save();
    }
}
