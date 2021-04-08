<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * 会員登録サポートの一覧
     */
    public function index()
    {
        return view('welcome.index');
    }

    /**
     * 営業所へ来られる方のためのページ
     */
    public function address()
    {
        return view('welcome.address');
    }

    /**
     * 訪問型のフォーム
     */
    public function form()
    {
        return view('welcome.form');
    }

    public function conf(Request $request)
    {
        $data = [
            'user' => $request->input()
        ];
        return view('welcome.conf', $data);
    }

    public function comp(Request $request)
    {
        $credentials_path = storage_path('app/json/credentials.json');
        $client = new \Google_Client();
        $client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
        $client->setAuthConfig($credentials_path);
        $client = new \Google_Service_Sheets($client);

        $sheet_id = '1FH7nkXPNeqa8ay_8IcEcMjADq8K8ibqQTBCCytZJYAY';

        // 個人情報と注文データを定義
        $time = date('Y-m-d H:i:s');
        $order = [
            $request->input('name'),
            $request->input('address'),
            $request->input('tel'),
            $time
        ];

        $values = new \Google_Service_Sheets_ValueRange();
        $values->setValues([
            'values' => $order
        ]);
        $params = ['valueInputOption' => 'USER_ENTERED'];
        $client->spreadsheets_values->append(
            $sheet_id,
            '訪問!A1',
            $values,
            $params
        );

        // フラッシュメッセージ
        return redirect('/login')->with([
            'flash_message' => 'ありがとうございます。ご連絡をおまちください。',
        ]);

    }
}
