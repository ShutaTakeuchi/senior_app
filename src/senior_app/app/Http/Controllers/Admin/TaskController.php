<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Admin;
use App\Delivery;
use App\Item;

class TaskController extends Controller
{
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
            return redirect('/admin/task/delivery')->with('flash_message', '変更しました。');
        }else{
            Item::where('id', $request->input('id'))
                ->update(['status' => '配達中']);
            return redirect('/admin/task/item')->with('flash_message', '変更しました。');
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
        if ($request->input('category') === 'delivery') {
            Delivery::find($request->input('id'))->delete();
        } else {
            Item::find($request->input('id'))->delete();
        }
        return redirect('admin/home')->with('flash_message', 'お疲れ様でした！');
    }
}
