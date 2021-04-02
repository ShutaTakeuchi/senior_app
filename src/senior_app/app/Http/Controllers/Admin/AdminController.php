<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Admin;

class AdminController extends Controller
{
    /**
     * 社員の一覧表示
     */
    public function index()
    {
        $admin_people = Admin::all();
        $data = [
            'people' => $admin_people
        ];

        return view('admin.staff.index', $data);
    }

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

        return redirect('admin/staff/index')->with('flash_message', '新規登録が完了しました。');
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
