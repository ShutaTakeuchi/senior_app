<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Admin;

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
     * ステータスを変更する
     */
    public function change_status(Request $request)
    {
        
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
}
