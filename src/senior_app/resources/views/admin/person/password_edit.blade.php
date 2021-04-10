{{-- admin お客様パスワード変更画面 --}}
@extends('layouts.app_admin')

@section('content')
    <h2>お客様アカウントのパスワード変更フォーム</h2>
    <br>
    <br>
    <br>

    <form action="{{ route('admin.person.password_update') }}" method="post">
        @csrf
        <div class="form-group">
            <input type="password" class="form-control" name="password">
        </div>

        <br>
        
        <input type="hidden" name="id" value="{{ $user['id'] }}">

        <button type="submit" class="btn btn-info">変更する</button>
    </form>

    <br>
    <br>

    <a href="{{ route('admin.person.show') }}" class="btn btn-dark">戻る</a>

@endsection