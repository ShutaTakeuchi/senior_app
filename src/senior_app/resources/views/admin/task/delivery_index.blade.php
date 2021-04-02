{{-- admin 個別タスク一覧 --}}
@extends('layouts.app_admin')

@section('content')

    <!-- フラッシュメッセージ -->
    @if (session('flash_message'))
        <div class="flash_message text-danger">
            {{ session('flash_message') }}
        </div>
    @endif

    <h2>ごはん一覧</h2>

    @foreach ($deliveries as $delivery)
    <table class="table table-bordered">
            <tr>
                <th>商品名</th>
                <td>{{ $delivery->shop_name }}</td>
            </tr>
            <tr>
                <th>お名前</th>
                <td>{{ $delivery->user->name }}</td>
            </tr>
            <tr>
                <th>住所</th>
                <td>{{ $delivery->user->address }}</td>
            </tr>
            <tr>
                <th>電話番号</th>
                <td>{{ $delivery->user->tel }}</td>
            </tr>
            <tr>
                <th></th>
                <td><a href="">購入済み</a></td>
            </tr>
            <tr>
                <th></th>
                <td><a href="">配達済み</a></td>
            </tr>
    </table>
    @endforeach
@endsection
