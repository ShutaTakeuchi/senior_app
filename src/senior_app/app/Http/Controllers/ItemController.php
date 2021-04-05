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
        if($request->input('item_keyword') === null) {
            $keyword = '日用品';
        }else{
            $keyword = $request->input('item_keyword');
        }
        
        $client = new \GuzzleHttp\Client();
        $response = $client->request(
            'GET',
            'https://app.rakuten.co.jp/services/api/IchibaItem/Search/20170706',
            ['query' => [
                'format' => 'json',
                'keyword' => $keyword, 
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
        // データベースに保存
        $this->insert_data($request->input('item_id'), $request->input('item_name'));
        
        // フラッシュメッセージ
        return redirect('/')->with([
            'message_1' => '注文しました。',
            'message_2' => 'しばらくお待ちください。'
        ]);
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
        $item->status = '注文依頼';
        $item->save();
    }
}
