{{-- admin スタッフ削除確認画面 --}}
@extends('layouts.app_admin')

@section('content')
    <h2>スタッフアカウント削除の確認画面</h2>
    <h3>本当にこちらのアカウントを削除しますか？</h3>
    <br>
    <br>

    <h4>お名前：{{ $staff['name'] }}</h4>
    <h4>メールアドレス：{{ $staff['email'] }}</h4>

    <br>
    <br>

    <form action="{{ route('admin.delete.comp') }}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $staff['id'] }}">
        <button type="submit" class="btn btn-danger">削除します</button>
    </form>

    <br>

    <a href="" class="btn btn-body">戻る</a>
@endsection
