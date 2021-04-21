{{-- admin 個別タスク一覧 --}}
@extends('layouts.app_admin')

@section('content')

    <!-- フラッシュメッセージ -->
    @if (session('flash_message'))
        <div class="flash_message text-danger mb-4">
            <h4>{{ session('flash_message') }}</h4>
        </div>
    @endif

    <h2>おかいもの</h2>

    {{-- 業務がない場合 --}}
    @if (count($items) < 1)
        <div class="text-center text-danger mt-4">
            <h5>現在、配達業務はありません</h5>
        </div>
    @endif

    @foreach ($items as $item)
    @if ($item->status === '入荷済み' || $item->status === '配達中')
    <table class="table table-bordered">
            <tr>
                <th>商品名</th>
                <td>{{ $item->item_name }}</td>
            </tr>
            <tr>
                <th>お名前</th>
                <td>{{ $item->user->name }}</td>
            </tr>
            <tr>
                <th>住所</th>
                <td>{{ $item->user->address }}</td>
            </tr>
            <tr>
                <th>電話番号</th>
                <td>{{ $item->user->tel }}</td>
            </tr>
            
            @if($item->status === '入荷済み')
            <tr>
                <th></th>
                <td>
                    <form action="{{ route('admin.task.delivery.bought') }}" method="get">
                        <input type="hidden" name="id" value="{{ $item->id }}">
                        <input type="hidden" name="category" value="item">
                        <input type="submit" class="btn btn-warning btn-sm" value="配達中">
                    </form>
                </td>
            </tr>
            @elseif ($item->status === '配達中')
            <tr>
                <th></th>
                <td>
                    <form action="{{ route('admin.task.conf.finish') }}" method="get">
                        <input type="hidden" name="id" value="{{ $item->id }}">
                        <input type="hidden" name="category" value="item">
                        <input type="submit" class="btn btn-info btn-sm" value="配達済み">
                    </form>
                </td>
            </tr>
            @endif
    </table>
    @endif
    @endforeach
@endsection