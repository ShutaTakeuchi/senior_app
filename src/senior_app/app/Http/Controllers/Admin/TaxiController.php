<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Taxi;
use App\Admin;
use Auth;

class TaxiController extends Controller
{
    /**
     * 一覧表示
     */
    public function index()
    {

        // 管理者以外をブロック
        $me = Auth::user();
        if ($me->id !== 1) {
            return redirect('admin/task/taxi');
        }

        $taxis = Taxi::all();
        $data = [
            'taxis' => $taxis
        ];

        return view('admin.taxi.index', $data);
    }

    /**
     * 担当者を選択する
     */
    public function insert_staff(Request $request)
    {
        $admin = Admin::all();
        $data = [
            'admins' => $admin,
            'taxi_id' => $request->input('taxi_id')
        ];

        return view('admin.taxi.insert_staff', $data);
    }

    /**
     * 担当者選択後の処理
     */
    public function store_staff(Request $request)
    {

        Taxi::where('id', $request->input('taxi_id'))
            ->update(['admin_id' => $request->input('id')]);

        return redirect('/admin/taxi/index')->with('flash_message', '変更しました');
    }
}
