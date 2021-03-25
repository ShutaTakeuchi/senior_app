<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Item;

class ItemController extends Controller
{
    // show search-form
    public function index()
    {
        return view('item.index');
    }

    // 商品検索の結果
    // public function show(Request $request)
    // {
    //     $app_id = '1096060211205045149';
    //     $keyword = $request->input('item_keyword');
    //     $url = "https://app.rakuten.co.jp/services/api/IchibaItem/Search/20170706?format=json&keyword=$keyword&applicationId=$app_id";
    //     $json = file_get_contents($url);
    //     $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
    //     $arr = json_decode($json,true);
    //     dd($arr);
    //     return view('');
    // }

    // 商品検索の結果を取得
    public function guzzle(Request $request)
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request(
            'GET',
            'https://app.rakuten.co.jp/services/api/IchibaItem/Search/20170706',
            ['query' => [
                'format' => 'json',
                'keyword' => $request->input('item_keyword'), 
                'applicationId' => '1096060211205045149',
                // 在庫有り
                'availability' => 1,
            ],
            'http_errors' => false
            ]
        );
        $data = [
            'results' => json_decode($response->getBody(), true)
        ];
        // dd($data['results']);
        return view('item.show', $data);
    }

    /**
     * 確認画面の表示
     */
    public function confirm_purchase(Request $request)
    {
        $id = $request->input('item_id');
        $name = $request->input('item_name');
        $price = $request->input('item_price');
        $data = [
            'item_id' => $id,
            'item_name' => $name,
            'item_price' => $price,
            'user_address' => Auth::user()['address'],
        ];
        return view('item.conf', $data);
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
            $request->input('item_id'),
            $request->input('item_name'),
        ];

        $values = new \Google_Service_Sheets_ValueRange();
        $values->setValues([
            'values' => $order
        ]);
        $params = ['valueInputOption' => 'USER_ENTERED'];
        $client->spreadsheets_values->append(
            $sheet_id,
            'item!A1',
            $values,
            $params
        );

        // データベースに保存
        $this->insert_data($request->input('item_id'), $request->input('item_name'));
        
        // 注文完了時の表示
        return view('delivery.comp');
    }

    /**
     * データベースに新規作成
     */
    public function insert_data($item_id, $item_name)
    {
        $item = new Item;
        $item->user_id = Auth::user()['id'];
        $item->item_id = $item_id;
        $item->item_name = $item_name;
        $item->save();
    }
}
