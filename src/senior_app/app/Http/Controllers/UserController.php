<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class UserController extends Controller
{
    /**
     * 自分の個人情報を取得して表示する
     */
    public function index()
    {
        $user = Auth::user();
        $data = [
            'user' => $user
        ];

        return view('user.index', $data);
    }

    /**
     * 編集フォーム
     */
    public function edit(Request $request)
    {
        $user = User::find($request->input('id'));
        $data = [
          'user' => $user
        ];

        return view('user.edit', $data);
    }

    /**
     * 編集完了処理
     */
    public function update(Request $request)
    {
        User::where('id', $request->input('id'))
          ->update([
              'name' => $request->input('name'),
              'email' => $request->input('email'),
              'address' => $request->input('address'),
          ]);

        return redirect('/user/index')->with('flash_message', '変更しました');
    }

    /**
     * パスワード変更フォーム
     */
    public function reset_password_form(Request $request)
    {

    }

    /**
     * パスワード変更処理
     */
    public function reset_password(Request $request)
    {
            //   'password' => Hash::make($request->input('password')),
    }

    /**
     * ユーザ削除確認フォーム
     */
    public function conf_delete(Request $request)
    {

    }

    /**
     * 削除完了処理
     */
    public function delete(Request $request)
    {

    }
}
