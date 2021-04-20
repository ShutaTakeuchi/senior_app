<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\WelcomeRequest;

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

    /**
     * 入力確認画面
     */
    public function conf(Request $request)
    {
        $data = [
            'user' => $request->input()
        ];
        return view('welcome.conf', $data);
    }

    /**
     * 入力完了処理画面
     */
    public function comp(WelcomeRequest $request)
    {
        // google spread sheets api
        $credentials_path = storage_path('app/json/credentials.json');
        $client = new \Google_Client();
        $client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
        $client->setAuthConfig($credentials_path);
        $client = new \Google_Service_Sheets($client);

        $sheet_id = '1FH7nkXPNeqa8ay_8IcEcMjADq8K8ibqQTBCCytZJYAY';

        // 個人情報と注文データを定義
        $time = date('Y-m-d H:i:s');
        $tel = $request->input('tel');
        $order = [
            $request->input('name'),
            $request->input('address'),
            "'$tel",
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

        // LINE API 
        $channelToken = 'm3PQGwcOS0ahPTO1YQtgarFT9b9RzAStkA5DLQqDlPYUs2BdBQSvOBV5pDzBLEqvn8lFuIsY3vmad7y7NQHOqJ86TOWsnM72X/Ba77OIVCV4oP14Dg+T/bYfibPuKjcUStCbJp9VZFeylmWPyPaPSAdB04t89/1O/w1cDnyilFU=';
        $headers = [
            'Authorization: Bearer ' . $channelToken,
            'Content-Type: application/json; charset=utf-8',
        ];

        $name = $request->input('name');
        $address = $request->input('address');
        $tel = $request->input('tel');
        $message = <<<EOF
        【訪問式新規登録】
        お客様の訪問日検討のご連絡をお願いします。
        お名前：{$name} 様　
        住所：{$address}
        電話番号：{$tel}
        EOF;

        // POSTデータを設定してJSONにエンコード
        $post = [
            'to' => 'U1bfc80088869c07efb51e9c6e8d18185',
            'messages' => [
                [
                    'type' => 'text',
                    'text' => $message,
                ],
            ],
        ];
        $post = json_encode($post);

        // HTTPリクエストを設定
        $ch = curl_init('https://api.line.me/v2/bot/message/push');
        $options = [
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_BINARYTRANSFER => true,
            CURLOPT_HEADER => true,
            CURLOPT_POSTFIELDS => $post,
        ];
        curl_setopt_array($ch, $options);

        // 実行
        $result = curl_exec($ch);

        // フラッシュメッセージ
        return redirect('/login')->with([
            'message_1' => 'ありがとうございます。',
            'message_2' => 'ご連絡をお待ちください。'
        ]);

    }
}
