<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ContactController extends Controller
{
    /**
     * 連絡一覧を表示
     */
    public function index()
    {
        return view('contact.index');
    }

    /**
     * 緊急連絡
     */
    public function emergency()
    {
        $channelToken = 'm3PQGwcOS0ahPTO1YQtgarFT9b9RzAStkA5DLQqDlPYUs2BdBQSvOBV5pDzBLEqvn8lFuIsY3vmad7y7NQHOqJ86TOWsnM72X/Ba77OIVCV4oP14Dg+T/bYfibPuKjcUStCbJp9VZFeylmWPyPaPSAdB04t89/1O/w1cDnyilFU=';
        $headers = [
            'Authorization: Bearer ' . $channelToken,
            'Content-Type: application/json; charset=utf-8',
        ];

        $user_name = Auth::user()['name'];
        $user_tel = Auth::user()['tel'];
        $message = <<<EOF
        【緊急連絡】
        至急、電話をおかけください。
        お名前：{$user_name} 様　
        電話番号：{$user_tel}
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

        // エラーチェック
        $errno = curl_errno($ch);
        if ($errno) {
            return;
        }

        // HTTPステータスを取得
        $info = curl_getinfo($ch);
        $httpStatus = $info['http_code'];

        $responseHeaderSize = $info['header_size'];
        $body = substr($result, $responseHeaderSize);

        return redirect('/')->with([
            'message_1' => '管理者からの電話をお待ちください。',
            'message_2' => 'しばらくお待ちください。'
        ]);    
    }

    public function conf_taxi()
    {
        $message = [
            'message' => 'タクシーの手配を予約しますか？'
        ];
        return view('contact.conf', $message);
    }

    public function comp_taxi()
    {
        $channelToken = 'm3PQGwcOS0ahPTO1YQtgarFT9b9RzAStkA5DLQqDlPYUs2BdBQSvOBV5pDzBLEqvn8lFuIsY3vmad7y7NQHOqJ86TOWsnM72X/Ba77OIVCV4oP14Dg+T/bYfibPuKjcUStCbJp9VZFeylmWPyPaPSAdB04t89/1O/w1cDnyilFU=';
        $headers = [
            'Authorization: Bearer ' . $channelToken,
            'Content-Type: application/json; charset=utf-8',
        ];

        $user_name = Auth::user()['name'];
        $user_tel = Auth::user()['tel'];
        $user_address = Auth::user()['address'];
        $message = <<<EOF
        【タクシー予約】
        タクシーの手配をお願い致します。
        お名前：{$user_name} 様　
        住所：{$user_address}
        電話番号：{$user_tel}
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

        // エラーチェック
        $errno = curl_errno($ch);
        if ($errno) {
            return;
        }

        // HTTPステータスを取得
        $info = curl_getinfo($ch);
        $httpStatus = $info['http_code'];

        $responseHeaderSize = $info['header_size'];
        $body = substr($result, $responseHeaderSize);

        return redirect('/')->with([
            'message_1' => 'タクシーを予約致します。',
            'message_2' => 'しばらくお待ちください。'
        ]);
    }
}
