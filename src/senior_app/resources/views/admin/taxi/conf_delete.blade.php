{{-- admin　タクシー予約削除確認画面 --}}
@extends('layouts.app_admin')

@section('content')
    <h2 class="text-danger">本当に削除してもいいですか？</h2>

    <h5>予約時間：{{ $taxi->created_at }}</h5>
    <br>
    <h5>お名前：{{ $taxi->user->name }}</h5>
    <br>
    <h5>住所：{{ $taxi->user->address }}</h5>
    <br>
    <h5>電話番号：{{ $taxi->user->tel }}</h5>

    <br>

    <form action="{{ route('admin.taxi.delete') }}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $taxi->id }}">
        <input type="submit" class="btn btn-info" value="削除する">
    </form>
    
    <br>

    <a href="{{ route('admin.search.delivery') }}">戻る</a>

@endsection
