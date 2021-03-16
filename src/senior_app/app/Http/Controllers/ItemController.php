<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
