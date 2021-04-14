{{-- admin お客様情報一覧 --}}
@extends('layouts.app_admin')

@section('content')
    <h2>お客様情報編集</h2>

    <h6 class="text-danger mt-3">電話番号は変更できません</h6>

    <form action="{{ route('admin.person.update') }}" method="post" class="mt-4" style="width: 25rem;">
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

        <input type="hidden" name="id" value="{{ $user['id'] }}">

        <button type="submit" class="btn btn-info">変更する</button>
    </form>

    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('admin.person.password_edit') }}" method="get" class="mt-4">
                <input type="hidden" name="id" value="{{ $user['id'] }}">
                <button type="submit" class="btn btn-warning">パスワードを変更する</button>
            </form>
        </div>
        <div class="col-md-6">
            <form action="{{ route('admin.person.conf_del') }}" method="get" class="mt-4">
                <input type="hidden" name="id" value="{{ $user['id'] }}">
                <button type="submit" class="btn btn-danger">アカウントを削除する</button>
            </form>
        </div>
    </div>




    <a href="{{ route('admin.person.show') }}" class="btn btn-dark mt-4">戻る</a>

@endsection
