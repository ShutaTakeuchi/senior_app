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

    /**
     * ユーザー検索結果
     */
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

    /**
     * ユーザ情報の編集
     */
    public function edit(Request $request)
    {
        $user = User::find($request->input('id'));
        $data = [
          'user' => $user
        ];

        return view('admin.person.edit', $data);
    }

    /**
     * 変更完了
     */
    public function update(Request $request)
    {
        User::where('id', $request->input('id'))
          ->update([
              'name' => $request->input('name'),
              'email' => $request->input('email'),
              'address' => $request->input('address'),
          ]);

        return redirect('admin/home')->with('flash_message', '変更しました');
    }
}
