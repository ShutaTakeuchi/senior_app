<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Illuminate\Support\Facades\Hash;

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
    public function reset_password_form()
    {
        return view('user.reset_password');
    }

    /**
     * パスワード変更処理
     */
    public function reset_password(Request $request)
    {
        User::where('id', Auth::id())
          ->update([
              'password' => bcrypt($request->input('password'))
          ]);

        return redirect('/user/index')->with('flash_message', 'パスワードを変更しました');
    }

    /**
     * ユーザ削除確認フォーム
     */
    public function conf_delete()
    {
        return view('user.conf_delete');
    }

    /**
     * 削除完了処理
     */
    public function delete()
    {
        User::find(Auth::id())->delete();
        return redirect('/login')->with('flash_message', 'また是非ご利用くださいませ。');
    }
}
