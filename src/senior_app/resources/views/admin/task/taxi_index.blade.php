{{-- admin 個別タスク一覧 --}}
@extends('layouts.app_admin')

@section('content')

    <!-- フラッシュメッセージ -->
    @if (session('flash_message'))
        <div class="flash_message text-danger">
            <h2>{{ session('flash_message') }}</h2>
        </div>
    @endif

    <h2>タクシー一覧</h2>

    @foreach ($taxis as $taxi)
        <table class="table table-bordered">
            <tr>
                <th>お名前</th>
                <td>{{ $taxi->user->name }}</td>
            </tr>
            <tr>
                <th>住所</th>
                <td>{{ $taxi->user->address }}</td>
            </tr>
            <tr>
                <th>電話番号</th>
                <td>{{ $taxi->user->tel }}</td>
            </tr>
            <tr>
                <th>時間</th>
                <td>{{ $taxi->created_at }}</td>
            </tr>

            @if ($taxi->status === '配車依頼')
                <tr>
                    <th></th>
                    <td>
                        <form action="{{ route('admin.taxk.taxi.go_to_customer') }}" method="get">
                            <input type="hidden" name="id" value="{{ $taxi->id }}">
                            <input type="submit" class="btn btn-warning btn-sm" value="お迎え中">
                        </form>
                    </td>
                </tr>
            @elseif($taxi->status === 'お迎え中')
                <tr>
                    <th></th>
                    <td>
                        <form action="{{ route('admin.taxk.taxi.go_to_destination') }}" method="get">
                            <input type="hidden" name="id" value="{{ $taxi->id }}">
                            <input type="submit" class="btn btn-info btn-sm" value="送迎中">
                        </form>
                    </td>
                </tr>
            @elseif($taxi->status === '送迎中')
                <tr>
                    <th></th>
                    <td>
                        <form action="{{ route('admin.taxk.taxi.finish.conf') }}" method="get">
                            <input type="hidden" name="id" value="{{ $taxi->id }}">
                            <input type="submit" class="btn btn-info btn-sm" value="送迎済み">
                        </form>
                    </td>
                </tr>
            @endif
        </table>
    @endforeach
@endsection
