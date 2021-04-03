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

            @if ($delivery->status === '注文依頼')
                <tr>
                    <th></th>
                    <td>
                        <form action="" method="get">
                            <input type="hidden" name="id" value="{{ $delivery->id }}">
                            <input type="hidden" name="status" value="購入済み">
                            <input type="submit" class="btn btn-warning btn-sm" value="購入済み">
                        </form>
                    </td>
                </tr>
            @elseif($delivery->status === '配達中')
                <tr>
                    <th></th>
                    <td>
                        <form action="" method="get">
                            <input type="hidden" name="id" value="{{ $delivery->id }}">
                            <input type="hidden" name="status" value="配達済み">
                            <input type="submit" class="btn btn-info btn-sm" value="配達済み">
                        </form>
                    </td>
                </tr>
            @endif
        </table>
    @endforeach
@endsection
