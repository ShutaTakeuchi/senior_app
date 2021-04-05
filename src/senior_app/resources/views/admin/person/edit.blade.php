{{-- admin お客様情報一覧 --}}
@extends('layouts.app_admin')

@section('content')
    <h2>お客様情報編集</h2>
    <br>
    <h5 class="text-danger">電話番号は変更できません</h5>

    <br>
    <br>

    <form action="{{ route('admin.person.update') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">お名前</label>
            <input type="text" class="form-control" id="name" value="{{ $user['name'] }}" name="name">
        </div>

        <div class="form-group">
            <label for="email">メールアドレス</label>
            <input type="email" class="form-control" id="email" value="{{ $user['email'] }}" name="email">
        </div>

        <div class="form-group">
            <label for="address">住所</label>
            <input type="text" class="form-control" id="address" value="{{ $user['address'] }}" name="address">
        </div>

        <div class="form-group">
            <label for="address">パスワード</label>
            <input type="password" class="form-control" id="address" value="" name="password">
        </div>
        
        <input type="hidden" name="id" value="{{ $user['id'] }}">

        <button type="submit" class="btn btn-info">変更する</button>
    </form>

    <br>

    <form action="{{ route('admin.person.conf_del') }}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $user['id'] }}">
        <button type="submit" class="btn btn-danger">アカウントを削除する</button>
    </form>

@endsection
