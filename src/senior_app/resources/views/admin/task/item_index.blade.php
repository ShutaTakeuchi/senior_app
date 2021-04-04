{{-- admin 個別タスク一覧 --}}
@extends('layouts.app_admin')

@section('content')

    <!-- フラッシュメッセージ -->
    @if (session('flash_message'))
        <div class="flash_message text-danger">
            {{ session('flash_message') }}
        </div>
    @endif

    <h2>おかいもの一覧</h2>

    @foreach ($items as $item)
    @if ($item->status === '入荷済み')
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
    </table>
    @endif
    @endforeach
@endsection