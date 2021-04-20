<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Delivery;
use App\Item;
use App\Taxi;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\EditUserRequest;
use App\Http\Requests\ResetPasswordRequest;

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
    public function update(EditUserRequest $request)
    {
        User::where('id', $request->input('id'))
          ->update([
              'name' => $request->input('name'),
              'email' => $request->input('email'),
              'address' => $request->input('address'),
          ]);

        return redirect('/user/index')->with('flash_message', '情報を変更しました');
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
    public function reset_password(ResetPasswordRequest $request)
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
        Delivery::where('user_id', Auth::id())->delete();
        Item::where('user_id', Auth::id())->delete();
        Taxi::where('user_id', Auth::id())->delete();
        
        return redirect('/login')->with([
            'message_1' => '是非またのご利用を',
            'message_2' => '心よりお待ちしております。'
        ]);
    }
}
