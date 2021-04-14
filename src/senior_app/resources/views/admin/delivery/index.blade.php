{{-- admin 配食注文検索 --}}
@extends('layouts.app_admin')

@section('content')

    <!-- フラッシュメッセージ -->
    <div>
        @if (session('flash_message'))
            <div class="flash_message text-danger">
                <h5>{{ session('flash_message') }}</h5>
            </div>
        @endif
    </div>

    {{-- 目次 --}}
    <h2>ごはん</h2>

    {{-- 一覧 --}}
    <table class="table table-bordered table-wrap">
        <thead>
            <tr>
                <th scope="col">注文時間</th>
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
                    <td nowrap>{{ $delivery->created_at }}</td>
                    <td nowrap>{{ $delivery->user->name }}</th>
                    <td nowrap>{{ $delivery->user->address }}</td>
                    <td nowrap>{{ $delivery->user->tel }}</td>
                    <td>{{ $delivery->shop_name }}</td>
                    <td>
                        @if ($delivery->admin_id === null)
                            <form action="{{ route('admin.staff.delivery') }}" method="get">
                                <input type="hidden" name="shop_id" value="{{ $delivery->id }}">
                                <input type="submit" class="btn text-danger btn-sm" value="未定">
                            </form>
                        @elseif ($delivery->admin_id === '未定')
                            <form action="{{ route('admin.staff.delivery') }}" method="get">
                                <input type="hidden" name="shop_id" value="{{ $delivery->id }}">
                                <input type="submit" class="btn text-danger btn-sm" value="未定">
                            </form>
                        @else
                            <form action="{{ route('admin.staff.delivery') }}" method="get">
                                <input type="hidden" name="shop_id" value="{{ $delivery->id }}">
                                <input type="submit" class="btn btn-body btn-sm" value="{{ $delivery->admin->name }}">
                            </form>
                        @endif
                    </td>
                    <td>
                        @if ($delivery->status === '注文依頼')
                            <button class="btn btn-danger btn-sm">{{ $delivery->status }}</button>
                        @elseif ($delivery->status === '配達中')
                            <button class="btn btn-info btn-sm">{{ $delivery->status }}</button>
                        @endif
                    </td>
                    <td>
                        {{-- キャンセル --}}
                        <form action="{{ route('admin.conf.delete.delivery') }}" method="get">
                            <input type="hidden" name="id" value="{{ $delivery->id }}">
                            <input type="submit" class="btn btn-body btn-sm" value="削除">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>

    {{-- 注文がない時 --}}
    @if (count($deliveries) < 1)
        <h4 class="text-danger mt-5">現在、ご注文はありません</h4>
    @endif

@endsection
