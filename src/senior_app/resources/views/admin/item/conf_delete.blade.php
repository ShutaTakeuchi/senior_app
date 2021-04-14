{{-- admin　担当者入力画面 --}}
@extends('layouts.app_admin')

@section('content')
    <h2 class="mb-4">削除確認画面</h2>

    <h4 class="text-danger mb-4">本当に削除してもよろしいですか？</h4>

    <table class="table table-bordered mb-4">
        <tbody>
            <tr>
                <td>注文時間</td>
                <th>{{ $item->created_at }}</th>
            </tr>
            <tr>
                <td>商品名</td>
                <th>{{ $item->item_name }}</th>
            </tr>
            <tr>
                <td>お名前</td>
                <th>{{ $item->user->name }}</th>
            </tr>
            <tr>
                <td>住所</td>
                <th>{{ $item->user->address }}</th>
            </tr>
            <tr>
                <td>電話番号</td>
                <th>{{ $item->user->tel }}</th>
            </tr>
        </tbody>
    </table>

    <form action="{{ route('admin.comp.delete.item') }}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $item->id }}">
        <input type="submit" class="btn btn-info" value="削除する">
    </form>

    <br>

    <a href="{{ route('admin.search.item') }}" class="btn btn-dark">戻る</a>

@endsection