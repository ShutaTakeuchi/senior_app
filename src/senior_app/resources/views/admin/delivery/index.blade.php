{{-- admin 配食注文検索 --}}
@extends('layouts.app_admin')

@section('content')

    <!-- フラッシュメッセージ -->
    @if (session('flash_message'))
        <div class="flash_message text-danger">
            <h2>{{ session('flash_message') }}</h2>
        </div>
    @endif
    <h2>ごはん</h2>
    <br>
    
    {{-- <h2>ご注文検索</h2>
    <h5>お客様の電話番号を入力してください。</h5>
    <h5>（ハイフン無し）</h5>

    <form action="{{ route('admin.delivery.show') }}" method="post">
        @csrf
        <div class="form-group">
            <input type="test" name="user_tel" class="form-control" placeholder="00011112222">
            <br>
            <button type="submit" class="btn btn-info">検索</button>
        </div>
    </form>
    <a class="btn btn-info" href="{{ route('admin.delivery.show_all') }}">全て</a> --}}

    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">お名前</th>
                <th scope="col">住所</th>
                <th scope="col">電話番号</th>
                <th scope="col">商品名</th>
                <th scope="col">担当</th>
                <th scope="col">状況</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($deliveries as $delivery)
                <tr>
                    <td nowrap>{{ $delivery->user->name }}</th>
                    <td>{{ $delivery->user->address }}</td>
                    <td>{{ $delivery->user->tel }}</td>
                    <td>{{ $delivery->shop_name }}</td>
                    <td>
                        @if ($delivery->admin_id === null)
                            <form action="{{ route('admin.staff.delivery') }}" method="get">
                                <input type="hidden" name="shop_id" value="{{ $delivery->id }}">
                                <input type="submit" class="btn text-danger btn-sm" value="未定">
                            </form>
                            {{-- 担当者が入力済みの場合は、担当者名を表示する --}}
                        @else
                            <form action="{{ route('admin.staff.delivery') }}" method="get">
                                <input type="hidden" name="shop_id" value="{{ $delivery->id }}">
                                <input type="submit" class="btn btn-body btn-sm" value="{{ $delivery->admin->name }}">
                            </form>
                        @endif
                    </td>
                    <td>
                        {{ $delivery->status }}
                    </td>
                    <td>
                        {{-- キャンセル --}}
                        <form action="{{ route('admin.conf.delete.delivery') }}" method="post">
                            <input type="hidden" value="{{ $delivery->id }}">
                            <input type="submit" class="btn btn-body btn-sm" value="削除">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
