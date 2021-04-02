{{-- admin 通販注文検索 --}}
@extends('layouts.app_admin')

@section('content')
    <h2>おかいもの</h2>
    <h2>ご注文検索</h2>
    <h5>お客様の電話番号を入力してください。</h5>
    <h5>（ハイフン無し）</h5>

    <form action="{{ route('admin.item.show') }}" method="post">
        @csrf
        <div class="form-group">
            <input type="test" name="user_tel" class="form-control" placeholder="00011112222">
            <br>
            <button type="submit" class="btn btn-info">検索</button>
        </div>
    </form>
    <a class="btn btn-info" href="{{ route('admin.item.show_all') }}">全て</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">お名前</th>
                <th scope="col">住所</th>
                <th scope="col">電話番号</th>
                <th scope="col">商品名</th>
                <th scope="col">担当</th>
                <th scope="col">状況</th>
                <th scope="col">キャンセル</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
                <tr>
                    <th>{{ $item->user->name }}</th>
                    <td>{{ $item->user->address }}</td>
                    <td>{{ $item->user->tel }}</td>
                    <td>{{ $item->item_name }}</td>
                    <td>
                        @if ($item->admin_id === null)
                            <form action="{{ route('admin.staff.item') }}" method="get">
                                <input type="hidden" name="item_id" value="{{ $item->id }}">
                                <input type="submit" class="btn btn-warning btn-sm" value="未定">
                            </form>
                            {{-- 担当者が入力済みの場合は、担当者名を表示する --}}
                        @else
                            <form action="{{ route('admin.staff.item') }}" method="get">
                                <input type="hidden" name="item_id" value="{{ $item->id }}">
                                <input type="submit" class="btn btn-body btn-sm" value="{{ $item->admin->name }}">
                            </form>
                        @endif
                    </td>
                    <td>
                        {{ $item->status }}
                    </td>
                    <td>
                        {{-- キャンセル --}}
                        <form action="" method="post">
                            <input type="hidden" value="{{ $item->id }}">
                            <input type="submit" class="btn btn-danger btn-sm" value="キャンセル">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
