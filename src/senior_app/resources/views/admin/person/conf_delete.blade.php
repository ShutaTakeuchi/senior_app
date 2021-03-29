{{-- admin アカウント削除確認画面 --}}
@extends('layouts.app_admin')

@section('content')
    <h2>お客様のアカウント削除の確認画面</h2>
    <h3>本当にこちらのアカウントを削除しますか？</h3>
    <br>
    <br>

    <h4>お名前：{{ $user['name'] }}</h4>
    <h4>メールアドレス：{{ $user['email'] }}</h4>
    <h4>住所：{{ $user['address'] }}</h4>
    <h4>電話番号：{{ $user['tel'] }}</h4>

    <br>
    <br>

    <form action="{{ route('admin.person.delete') }}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $user['id'] }}">
        <button type="submit" class="btn btn-danger">削除します</button>
    </form>

    <br>

    <a href="{{ route('admin.person.show') }}" class="btn btn-info">戻る</a>
@endsection
