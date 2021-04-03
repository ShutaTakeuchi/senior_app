{{-- admin　担当者入力画面 --}}
@extends('layouts.app_admin')

@section('content')
    <h2 class="text-danger">本当に削除してもいいですか？</h2>

    <br>
    <h5>商品名：{{ $item->item_name }}</h5>
    <br>
    <h5>お名前：{{ $item->user->name }}</h5>
    <br>
    <h5>住所：{{ $item->user->address }}</h5>
    <br>
    <h5>電話番号：{{ $item->user->tel }}</h5>

    <br>

    <form action="{{ route('admin.comp.delete.item') }}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $item->id }}">
        <input type="submit" class="btn btn-info" value="削除する">
    </form>
    
    <br>

    <a href="{{ route('admin.search.item') }}">戻る</a>

@endsection
