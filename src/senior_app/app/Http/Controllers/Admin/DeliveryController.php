<?php
 
namespace App\Http\Controllers\Admin;  // \Adminを追加
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Delivery;
use Auth;
 
class DeliveryController extends Controller
{
    /**
     * delivery お客様検索
     */
    public function search(Request $request)
    {
        return view('admin.delivery.index');
    }

    /**
     * delivery 検索されたお客様の注文履歴を表示
     */
    public function show(Request $request)
    {
        $user_data = User::where('tel', $request->input('user_tel'))->first();
        // 未登録の電話番号の場合
        if ($user_data === null){
            $error = [
                'message' => '登録されてない電話番号です。',
                'href' => 'delivery/search'
            ];
            return view('admin.error', $error);
        }
        $user_order_data = User::find($user_data['id'])->deliveries;
        $data = [
            'user_data' => $user_data,
            'orders' => $user_order_data
        ];
        return view('admin.delivery.show_user', $data);
    }

    public function show_all()
    {
        $order_users = User::has('deliveries')->get();
        $data = [
            'order_users' => $order_users
        ];
        return view('admin.delivery.order_user', $data);
    }

    public function delete(Request $request)
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
        $staff_name = Auth::user()['name'];
        $message = <<<EOF
        【テイクアウト　配達済み連絡】
        お疲れ様です。
        {$user_name} 様へ
        {$shop_name} の商品を
        配達致しました。
        担当者：{$staff_name}
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

        // フラッシュメッセージ
        return redirect('/admin/home')->with('flash_message', 'お疲れ様でした！');
    }
}