{{-- admin 個別タスク一覧 --}}
@extends('layouts.app_admin')

@section('content')

    <!-- フラッシュメッセージ -->
    @if (session('flash_message'))
        <div class="flash_message text-danger mb-4">
            <h4>{{ session('flash_message') }}</h4>
        </div>
    @endif

    <h2>ごはん</h2>

    {{-- 業務がない場合 --}}
    @if (count($deliveries) < 1)
        <div class="text-center text-danger mt-4">
            <h5>現在、配達業務はありません</h5>
        </div>
    @endif

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
                        <form action="{{ route('admin.task.delivery.bought') }}" method="get">
                            <input type="hidden" name="id" value="{{ $delivery->id }}">
                            <input type="hidden" name="category" value="delivery">
                            <input type="submit" class="btn btn-warning btn-sm" value="購入済み">
                        </form>
                    </td>
                </tr>
            @elseif($delivery->status === '配達中')
                <tr>
                    <th></th>
                    <td>
                        <form action="{{ route('admin.task.conf.finish') }}" method="get">
                            <input type="hidden" name="id" value="{{ $delivery->id }}">
                            <input type="hidden" name="category" value="delivery">
                            <input type="submit" class="btn btn-info btn-sm" value="配達済み">
                        </form>
                    </td>
                </tr>
            @endif
        </table>
    @endforeach
@endsection
