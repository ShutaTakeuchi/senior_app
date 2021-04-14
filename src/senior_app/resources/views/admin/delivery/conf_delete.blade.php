{{-- admin　担当者入力画面 --}}
@extends('layouts.app_admin')

@section('content')
    <h2 class="mb-4">削除確認画面</h2>

    <h4 class="text-danger mb-4">本当に削除してもよろしいですか？</h4>


    <table class="table table-bordered mb-4">
        <tbody>
            <tr>
                <td>注文時間</td>
                <th>{{ $delivery->created_at }}</th>
            </tr>
            <tr>
                <td>商品名</td>
                <th>{{ $delivery->shop_name }}</th>
            </tr>
            <tr>
                <td>お名前</td>
                <th>{{ $delivery->user->name }}</th>
            </tr>
            <tr>
                <td>住所</td>
                <th>{{ $delivery->user->address }}</th>
            </tr>
            <tr>
                <td>電話番号</td>
                <th>{{ $delivery->user->tel }}</th>
            </tr>
        </tbody>
    </table>

    <form action="{{ route('admin.comp.delete.delivery') }}" method="post" class="mb-4">
        @csrf
        <input type="hidden" name="id" value="{{ $delivery->id }}">
        <input type="submit" class="btn btn-danger" value="削除する">
    </form>

    <a href="{{ route('admin.search.delivery') }}" class="btn btn-dark">戻る</a>

@endsection
