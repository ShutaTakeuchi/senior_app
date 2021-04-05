<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Admin;
use Auth;

class AdminController extends Controller
{
    /**
     * 社員の一覧表示
     */
    public function index()
    {
        // 管理者以外をブロック
        $me = Auth::user();
        if ($me->id !== 1){
            return redirect('admin/home');
        }

        $admin_people = Admin::all();
        $data = [
            'people' => $admin_people
        ];

        return view('admin.staff.index', $data);
    }

    /**
     * 新規登録フォーム
     */
    public function create_staff()
    {
        return view('admin.staff.create');
    }

    public function store_staff(Request $request)
    {
        $admin = new Admin;
        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        $admin->password = Hash::make($request->input('password'));
        $admin->save();

        return redirect('admin/staff/index')->with('flash_message', '登録が完了しました。よろしくお願いします！');
    }

    public function conf_delete(Request $request)
    {
        $staff = Admin::find($request->input('id'));
        $data = [
            'staff' => $staff
        ];

        return view('admin.staff.conf_delete', $data);
    }

    public function comp_delete(Request $request)
    {
        Admin::find($request->input('id'))->delete();
        return redirect('admin/staff/index')->with('flash_message', '削除しました。');
    }
}
