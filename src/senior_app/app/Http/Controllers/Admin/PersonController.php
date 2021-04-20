<?php

namespace App\Http\Controllers\Admin;  // \Adminを追加

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\User;
use App\Delivery;
use App\Item;
use App\Taxi;
use Illuminate\Foundation\Console\Presets\React;
use App\Http\Requests\TemporaryResetPasswordRequest;
use App\Http\Requests\EditUserRequest;

class PersonController extends Controller
{
    /**
     * 登録済みのユーザーを表示
     */
    public function show_people()
    {

        // 管理者以外をブロック
        $me = Auth::user();
        if ($me->id !== 1){
            return redirect('admin/home');
        }
    
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
            return redirect('/admin/person/index')->with('flash_message', 'ユーザー情報がありません');
        }

        $data = [
            'user' => $user
        ];
        return view('admin.person.index', $data);
    }

    /**
     * ユーザ情報の編集（パスワード以外）
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
     * 変更完了(パスワード以外)
     */
    public function update(EditUserRequest $request)
    {
        User::where('id', $request->input('id'))
          ->update([
              'name' => $request->input('name'),
              'email' => $request->input('email'),
              'address' => $request->input('address'),
          ]);

        return redirect('admin/person/index')->with('flash_message', 'お客様情報を変更しました');
    }

    /**
     * 削除の確認画面を表示
     */
    public function conf_delete(Request $request)
    {
        $user = User::find($request->input('id'));
        $data = [
            'user' => $user
        ];
        return view('admin.person.conf_delete', $data);
    }

    /**
     * 特定のアカウントを削除する
     */
    public function delete(Request $request)
    {
        $user = User::find($request->input('id'));
        $user_id = $user->id;

        Delivery::where('user_id', $user_id)->delete();
        Item::where('user_id', $user_id)->delete();
        Taxi::where('user_id', $user_id)->delete();

        $user->delete();
        
        return redirect('admin/person/index')->with('flash_message', 'アカウントを削除しました。');        
    }

    /**
     * お客様のパスワードの変更フォーム
     */
    public function password_edit(Request $request)
    {
        $user = User::find($request->input('id'));
        $data = [
          'user' => $user
        ];

        return view('admin.person.password_edit', $data);
    }

    /**
     * お客様のパスワードの変更完了処理
     */
    public function password_update(TemporaryResetPasswordRequest $request)
    {
        User::where('id', $request->input('id'))
          ->update([
            'password' => bcrypt($request->input('password'))
          ]);

        return redirect('admin/person/index')->with('flash_message', '変更しました');
    }
}
