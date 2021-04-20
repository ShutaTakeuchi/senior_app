<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Admin;
use App\Delivery;
use App\Item;
use App\Taxi;

class TaskController extends Controller
{
    /**
     * 業務スタッフトップページ
     */
    public function index()
    {
        return view('admin.task.index');
    }

    /**
     * delivery担当の業務を表示
     */
    public function delivery_show()
    {
        $deliveries = Admin::find(Auth::user()['id'])->deliveries;
        $data = [
            'deliveries' => $deliveries
        ];

        return view('Admin.task.delivery_index', $data);
    }

    /**
     * deliveryのステータスを変更する
     */
    public function change_status_bought(Request $request)
    {
        if ($request->input('category') === 'delivery') {
            Delivery::where('id', $request->input('id'))
                ->update(['status' => '配達中']);
            return redirect('/admin/task/delivery')->with('flash_message', '変更しました');
        } else {
            Item::where('id', $request->input('id'))
                ->update(['status' => '配達中']);
            return redirect('/admin/task/item')->with('flash_message', '変更しました');
        }
    }

    /**
     * item担当の業務を表示
     */
    public function item_show()
    {
        $items = Admin::find(Auth::user()['id'])->items;
        $data = [
            'items' => $items
        ];

        return view('Admin.task.item_index', $data);
    }

    /**
     * deliveryとitemの配達完了の確認ページ
     */
    public function conf_finish(Request $request)
    {
        if ($request->input('category') === 'delivery') {
            $delivery = Delivery::find($request->input('id'));
            $data = [
                'category' => 'delivery',
                'delivery' => $delivery
            ];
        } else {
            $item = Item::find($request->input('id'));
            $data = [
                'category' => 'item',
                'item' => $item
            ];
        }

        return view('admin.task.conf_finish', $data);
    }

    /**
     * deliveryとitemの配達完了の処理
     */
    public function finish(Request $request)
    {
        // Delivery
        if ($request->input('category') === 'delivery') {

            // line api
            $delivery = Delivery::find($request->input('id'));
            $user_name = $delivery->user->name;
            $shop_name = $delivery->shop_name;
            $staff_name = Auth::user()['name'];
            $message = <<<EOF
            【ごはん　配達済み連絡】
            お疲れ様です。
            {$user_name} 様へ
            {$shop_name} の商品を
            配達致しました。
            担当者：{$staff_name}
            EOF;
            $public_func = app()->make('App\Http\Controllers\Admin\PublicController');
            $public_func->line_api($message);

            // google sheets api
            $tel = $delivery->user->tel;
            $time = date('Y-m-d H:i:s');
            $order = [
                $delivery->user->name,
                $delivery->user->address,
                "'$tel",
                $delivery->shop_name,
                Auth::user()['name'],
                $time
            ];
            $public_func->google_sheets_api($order, 'delivery');

            // 削除処理
            $delivery->delete();

            // Item
        } else {
            $item = Item::find($request->input('id'));
            // line api
            $user_name = $item->user->name;
            $item_name = $item->item_name;
            $staff_name = Auth::user()['name'];
            $message = <<<EOF
            【おかいもの　配達済み連絡】
            お疲れ様です。
            {$user_name} 様へ
            {$item_name} の商品を
            配達致しました。
            担当者：{$staff_name}
            EOF;
            $public_func = app()->make('App\Http\Controllers\Admin\PublicController');
            $public_func->line_api($message);

            // google sheets api
            $tel = $item->user->tel;
            $time = date('Y-m-d H:i:s');
            $order = [
                $item->user->name,
                $item->user->address,
                "'$tel",
                $item->item_name,
                Auth::user()['name'],
                $time
            ];
            $public_func->google_sheets_api($order, 'item');

            // 削除処理
            $item->delete();
        }

        return redirect('admin/task/index')->with('flash_message', 'お疲れ様でした！');
    }

    /**
     * 担当のタクシー業務を表示
     */
    public function taxi_index()
    {
        // $taxi = Admin::find(Auth::user()['id'])->taxi;
        $taxi = Taxi::where('admin_id', Auth::id())->get();
        $data = [
            'taxis' => $taxi
        ];

        return view('Admin.task.taxi_index', $data);
    }

    /**
     * タクシーがお客様のところへ向かう時の処理（お迎え中にする）
     */
    public function go_to_customer(Request $request)
    {
        Taxi::where('id', $request->input('id'))
            ->update(['status' => 'お迎え中']);
        return redirect('/admin/task/taxi')->with('flash_message', '変更しました');
    }

    /**
     * 送迎開始の際の処理（送迎中にする）
     */
    public function go_to_destination(Request $request)
    {
        Taxi::where('id', $request->input('id'))
            ->update(['status' => '送迎中']);
        return redirect('/admin/task/taxi')->with('flash_message', '変更しました');
    }

    /**
     * 送迎が終了の確認
     */
    public function conf_finish_taxi(Request $request)
    {
        $taxi = Taxi::find($request->input('id'));
        $data = [
            'taxi' => $taxi,
            'category' => 'taxi'
        ];
        return view('admin.task.conf_finish', $data);
    }

    /**
     * 送迎が終了した時の処理
     */
    public function finish_taxi(Request $request)
    {
        // line api
        $taxi = Taxi::find($request->input('id'));
        $user_name = $taxi->user->name;
        $staff_name = Auth::user()['name'];
        $message = <<<EOF
        【タクシー　送迎完了連絡】
        お疲れ様です。
        {$user_name} 様を
        送迎致しました。
        担当者：{$staff_name}
        EOF;
        $public_func = app()->make('App\Http\Controllers\Admin\PublicController');
        $public_func->line_api($message);

        // google sheets api
        $tel = $taxi->user->tel;
        $time = date('Y-m-d H:i:s');
        $order = [
            $taxi->user->name,
            $taxi->user->address,
            "'$tel",
            Auth::user()['name'],
            $time
        ];
        $public_func->google_sheets_api($order, 'taxi');

        // 削除処理
        $taxi->delete();

        return redirect('admin/task/index')->with('flash_message', 'お疲れ様でした！');

    }
}
