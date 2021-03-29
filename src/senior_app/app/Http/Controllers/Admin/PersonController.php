<?php

namespace App\Http\Controllers\Admin;  // \Adminを追加

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;

class PersonController extends Controller
{
    /**
     * 登録済みのユーザーを表示
     */
    public function show_people()
    {
        $users = User::all();
        $data = [
            'users' => $users
        ];

        return view('admin.person.index', $data);
    }

    public function get_person(Request $request)
    {
        $user = User::where('tel', $request->input('tel'))->first();

        // フラッシュメッセージ
        if ($user === null){
            return redirect('/admin/person/index')->with('flash_message', 'ユーザー情報がありません。');
        }

        $data = [
            'user' => $user
        ];
        return view('admin.person.index', $data);
    }
}
