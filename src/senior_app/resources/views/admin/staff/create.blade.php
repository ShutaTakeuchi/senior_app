{{-- admin スタッフ新規登録 --}}
@extends('layouts.app_admin')

@section('content')
    <h2>スタッフ新規登録</h2>

    <br>

    <form action="{{ route('admin.staff.store') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="name">名前</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="アドミン太郎">
        </div>

        <br>

        <div class="form-group">
            <label for="email">メールアドレス</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="admin@admin.com">
        </div>

        <br>

        <div class="form-group">
            <label for="password">パスワード</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>

        <br>

        <button type="submit" class="btn btn-primary">登録する</button>
    </form>

@endsection
