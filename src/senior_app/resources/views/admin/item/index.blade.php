{{-- admin 通販注文検索 --}}
@extends('layouts.app_admin')

@section('content')

    <!-- フラッシュメッセージ -->
    @if (session('flash_message'))
        <div class="flash_message text-danger">
            <h2>{{ session('flash_message') }}</h2>
        </div>
    @endif

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
                            <input type="submit" class="btn text-danger btn-sm" value="未定">
                        </form>
                        @elseif ($item->admin_id === '未定')
                            <form action="{{ route('admin.staff.item') }}" method="get">
                                <input type="hidden" name="item_id" value="{{ $item->id }}">
                                <input type="submit" class="btn text-danger btn-sm" value="未定">
                            </form>
                        @else
                            <form action="{{ route('admin.staff.item') }}" method="get">
                                <input type="hidden" name="item_id" value="{{ $item->id }}">
                                <input type="submit" class="btn btn-body btn-sm" value="{{ $item->admin->name }}">
                            </form>
                        @endif
                    </td>
                    <td>
                        {{-- 状況 --}}
                        <form action="{{ route('admin.status.conf.item') }}" method="get">
                            <input type="hidden" name="id" value="{{ $item->id }}">
                            @if ($item->status === '入荷済み')
                                <input type="hidden" name="status" value="入荷済み">
                                <input type="submit" class="btn btn-info btn-sm" value="入荷済み">
                            @elseif ($item->status === '注文済み')
                                <input type="hidden" name="status" value="注文済み">
                                <input type="submit" class="btn btn-warning btn-sm" value="注文済み">
                            @elseif ($item->status === '注文依頼')
                                <input type="hidden" name="status" value="注文依頼">
                                <input type="submit" class="btn btn-danger btn-sm" value="注文依頼">
                            @endif
                        </form>
                    </td>
                    <td>
                        {{-- キャンセル --}}
                        <form action="" method="post">
                            <input type="hidden" value="{{ $item->id }}">
                            <input type="submit" class="btn btn-body btn-sm" value="キャンセル">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
