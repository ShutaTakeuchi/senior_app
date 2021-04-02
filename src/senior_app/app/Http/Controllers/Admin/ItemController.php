<?php
 
namespace App\Http\Controllers\Admin;  // \Adminを追加
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Item;
use Auth;
 
class ItemController extends Controller
{
    /**
     * delivery お客様検索
     */
    public function search(Request $request)
    {
        // 管理者以外をブロック
        $me = Auth::user();
        if ($me->id !== 1){
            return redirect('admin/home');
        }

        return view('admin.item.index');
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
                'href' => 'item/search'
            ];
            return view('admin.error', $error);
        }
        $user_order_data = User::find($user_data['id'])->items;
        $data = [
            'user_data' => $user_data,
            'orders' => $user_order_data
        ];
        return view('admin.item.show_user', $data);
    }

    public function show_all()
    {
        $order_users = User::has('items')->get();
        $data = [
            'order_users' => $order_users
        ];
        return view('admin.item.order_user', $data);
    }

    public function delete(Request $request)
    {
        // データベースからデータを削除する
        Item::find($request->input('id'))->delete();
        // 終了をLINEで伝える
        $channelToken = 'm3PQGwcOS0ahPTO1YQtgarFT9b9RzAStkA5DLQqDlPYUs2BdBQSvOBV5pDzBLEqvn8lFuIsY3vmad7y7NQHOqJ86TOWsnM72X/Ba77OIVCV4oP14Dg+T/bYfibPuKjcUStCbJp9VZFeylmWPyPaPSAdB04t89/1O/w1cDnyilFU=';
        $headers = [
            'Authorization: Bearer ' . $channelToken,
            'Content-Type: application/json; charset=utf-8',
        ];

        $user_name = $request->input('user_name');
        $item_name = $request->input('item_name');
        $staff_name = Auth::user()['name'];
        $message = <<<EOF
        【通販　配達済み連絡】
        お疲れ様です。
        {$user_name} 様へ
        {$item_name} の商品を
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

        return redirect('/admin/home')->with('flash_message', 'お疲れ様でした！');
    }
}