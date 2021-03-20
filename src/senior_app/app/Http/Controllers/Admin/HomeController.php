<?php
 
namespace App\Http\Controllers\Admin;  // \Adminを追加
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Delivery;
use Auth;
 
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
 
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.home');
    }

    /**
     * delivery お客様検索
     */
    public function search_delivery(Request $request)
    {
        return view('admin.delivery');
    }

    /**
     * delivery 検索されたお客様の注文履歴を表示
     */
    public function show_delivery(Request $request)
    {
        $user_data = User::where('name', $request->input('user_name'))->first();
        // dd($user_data);
        $user_order_data = User::find($user_data['id'])->deliveries;
        $data = [
            'user_data' => $user_data,
            'orders' => $user_order_data
        ];
        return view('admin.delivery_show', $data);
    }

    public function delete_order(Request $request)
    {
        // データベースからデータを削除する
        Delivery::find($request->input('id'))->delete();
        // 終了をLINEで伝える
        $channelToken = 'm3PQGwcOS0ahPTO1YQtgarFT9b9RzAStkA5DLQqDlPYUs2BdBQSvOBV5pDzBLEqvn8lFuIsY3vmad7y7NQHOqJ86TOWsnM72X/Ba77OIVCV4oP14Dg+T/bYfibPuKjcUStCbJp9VZFeylmWPyPaPSAdB04t89/1O/w1cDnyilFU=';
        $headers = [
            'Authorization: Bearer ' . $channelToken,
            'Content-Type: application/json; charset=utf-8',
        ];

        $user_name = $request->input('user_name');
        $shop_name = $request->input('shop_name');
        $message = <<<EOF
        【テイクアウト　配達済み連絡】
        お疲れ様です。
        {$user_name} 様へ
        {$shop_name} の商品を
        配達致しました。
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
        curl_exec($ch);

        return view('admin.delivery_comp');
    }
}