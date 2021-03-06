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
        // 金額をランダムで表示
        $rand_price="";
        for($i=0;$i<3;$i++){
        $rand_price.=mt_rand(0,9);
        }

        $id = $request->input('shop_id');
        $name = $request->input('shop_name');
        $data = [
            'shop_id' => $id,
            'shop_name' => $name,
            'user_address' => Auth::user()['address'],
            'price' => $rand_price
        ];
        return view('delivery.conf', $data);
    }

    /**
     * スプレッドシートとデータベースに注文内容を追加する
     */
    public function insert_data_sheet(Request $request)
    {

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
        $delivery->status = '注文依頼';
        $delivery->save();
    }
}
