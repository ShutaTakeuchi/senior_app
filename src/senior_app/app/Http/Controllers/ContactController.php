<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Post;
use App\Taxi;

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

    public function comp_taxi(Request $request)
    {
        // LINE API
        $channelToken = 'm3PQGwcOS0ahPTO1YQtgarFT9b9RzAStkA5DLQqDlPYUs2BdBQSvOBV5pDzBLEqvn8lFuIsY3vmad7y7NQHOqJ86TOWsnM72X/Ba77OIVCV4oP14Dg+T/bYfibPuKjcUStCbJp9VZFeylmWPyPaPSAdB04t89/1O/w1cDnyilFU=';
        $headers = [
            'Authorization: Bearer ' . $channelToken,
            'Content-Type: application/json; charset=utf-8',
        ];
    
        $user_name = Auth::user()['name'];
        $user_tel = Auth::user()['tel'];
        $user_address = Auth::user()['address'];

        if($request->input('place') === '1'){
            $message = <<<EOF
        【タクシー予約】
        タクシーの手配をお願い致します。
        お迎え先：自宅
        お名前：{$user_name} 様　
        住所：{$user_address}
        電話番号：{$user_tel}
        EOF;

        }else{
            $message = <<<EOF
            【タクシー予約】
            タクシーの手配をお願い致します。
            お迎え先：他（確認してください）
            お名前：{$user_name} 様　
            住所：{$user_address}
            電話番号：{$user_tel}
            EOF;
        }

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

        // データベースに保存する
        $taxi = new Taxi;
        $taxi->user_id = Auth::user()['id'];
        $taxi->status = '配車依頼';
        $taxi->place = $request->input('place');
        $taxi->save();

        return redirect('/')->with([
            'message_1' => 'ありがとうございます。',
            'message_2' => '連絡をお待ちください。'
        ]);
    }

    /**
     * キャンセルしたい商品を表示
     */
    public function show_order()
    {
        // HomeControllerのメソッドを呼び出す
        $home_controller = app()->make('App\Http\Controllers\HomeController');
        $deliveries = $home_controller->show_reserve_delivery();
        $items = $home_controller->show_reserve_item();
        
        $data = [
            'deliveries' => $deliveries,
            'items' => $items
        ];
        
        return view('contact.show_order', $data);
    }

    public function conf_cancel(Request $request)
    { 
        $name = $request->input('name');
        if ($request->input('category') === 'delivery'){
            $category = 'ごはん';
        }else{
            $category = 'おかいもの';
        }

        $data = [
            'name' => $name,
            'category' => $category
        ];

        return view('contact.conf_cancel', $data);
    }

    /**
     * 商品のキャンセル申請の確定処理
     */
    public function comp_cancel(Request $request)
    {
        $channelToken = 'm3PQGwcOS0ahPTO1YQtgarFT9b9RzAStkA5DLQqDlPYUs2BdBQSvOBV5pDzBLEqvn8lFuIsY3vmad7y7NQHOqJ86TOWsnM72X/Ba77OIVCV4oP14Dg+T/bYfibPuKjcUStCbJp9VZFeylmWPyPaPSAdB04t89/1O/w1cDnyilFU=';
        $headers = [
            'Authorization: Bearer ' . $channelToken,
            'Content-Type: application/json; charset=utf-8',
        ];

        $user_name = Auth::user()['name'];
        $user_tel = Auth::user()['tel'];
        $user_address = Auth::user()['address'];
        $name = $request->input('name');
        $category = $request->input('category');
        $message = <<<EOF
        【商品キャンセル申請】
        {$category}のキャンセルのご検討お願いします。
        商品名：{$name}
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
            'message_1' => 'キャンセルを申請しました。',
            'message_2' => 'ご連絡をおまちください。。'
        ]);
    }

    /**
     * その他のお問い合わせ
     */
    public function other_contact()
    {
        $channelToken = 'm3PQGwcOS0ahPTO1YQtgarFT9b9RzAStkA5DLQqDlPYUs2BdBQSvOBV5pDzBLEqvn8lFuIsY3vmad7y7NQHOqJ86TOWsnM72X/Ba77OIVCV4oP14Dg+T/bYfibPuKjcUStCbJp9VZFeylmWPyPaPSAdB04t89/1O/w1cDnyilFU=';
        $headers = [
            'Authorization: Bearer ' . $channelToken,
            'Content-Type: application/json; charset=utf-8',
        ];

        $user_name = Auth::user()['name'];
        $user_tel = Auth::user()['tel'];

        $message = <<<EOF
        【その他お問い合わせ】
        お客様へご連絡をお願いします。
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
            'message_1' => 'こちらからご連絡いたします。',
            'message_2' => 'しばらくおまちください。'
        ]);
    }
}
