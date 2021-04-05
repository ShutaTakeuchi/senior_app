{{-- admin アカウント削除確認画面 --}}
@extends('layouts.app_admin')

@section('content')
    <h2>お客様のアカウント削除の確認画面</h2>
    <br>
    <br>
    <h3 class="text-danger">本当にこちらのアカウントを削除しますか？</h3>
    <br>
    <br>

    <div class="card">
        <div class="card-body">
            <h4>{{ $user['name'] }}</h4>
            <br>
            <h4>{{ $user['email'] }}</h4>
            <br>
            <h4>{{ $user['address'] }}</h4>
            <br>
            <h4>{{ $user['tel'] }}</h4>
        </div>
    </div>

    <br>
    <br>

    <form action="{{ route('admin.person.delete') }}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $user['id'] }}">
        <button type="submit" class="btn btn-danger">削除します</button>
    </form>

    <br>

<a href="{{ route('admin.person.show') }}" class="btn btn-dark">戻る</a @endsection
