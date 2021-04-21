{{-- admin 配食注文検索 --}}
@extends('layouts.app_admin')

@section('content')

    <!-- フラッシュメッセージ -->
    @if (session('flash_message'))
        <div class="flash_message text-danger">
            <h2>{{ session('flash_message') }}</h2>
        </div>
    @endif

    <h2>タクシー</h2>


    <table class="table table-bordered table-wrap">
        <thead>
            <tr>
                <th scope="col">予約時間</th>
                <th scope="col">お名前</th>
                <th scope="col">住所</th>
                <th scope="col">電話番号</th>
                <th scope="col">担当</th>
                <th scope="col">状況</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($taxis as $taxi)
                <tr>
                    <td nowrap>{{ $taxi->created_at }}</td>
                    <th>{{ $taxi->user->name }}</th>
                    <td>{{ $taxi->user->address }}</td>
                    <td>{{ $taxi->user->tel }}</td>
                    <td>
                        {{-- in charge --}}
                        @if ($taxi->admin_id === null)
                            <form action="{{ route('admin.taxi.select.staff') }}" method="get">
                                <input type="hidden" name="taxi_id" value="{{ $taxi->id }}">
                                <input type="submit" class="btn text-danger btn-sm" value="未定">
                            </form>
                        @elseif ($taxi->admin_id === '未定')
                            <form action="{{ route('admin.taxi.select.staff') }}" method="get">
                                <input type="hidden" name="taxi_id" value="{{ $taxi->id }}">
                                <input type="submit" class="btn text-danger btn-sm" value="未定">
                            </form>
                        @else
                            <form action="{{ route('admin.taxi.select.staff') }}" method="get">
                                <input type="hidden" name="taxi_id" value="{{ $taxi->id }}">
                                <input type="submit" class="btn btn-body btn-sm" value="{{ $taxi->admin->name }}">
                            </form>
                        @endif
                    </td>
                    {{-- status --}}
                    <td>
                        @if ($taxi->status === '配車依頼')
                            <button class="btn btn-danger btn-sm" disabled>{{ $taxi->status }}</button>
                        @elseif ($taxi->status === 'お迎え中')
                            <button class="btn btn-primary btn-sm" disabled>{{ $taxi->status }}</button>
                        @elseif ($taxi->status === '送迎中')
                            <button class="btn btn-info btn-sm" disabled>{{ $taxi->status }}</button>
                        @endif
                    </td>
                    <td>
                        {{-- キャンセル --}}
                        <form action="{{ route('admin.taxi.delete.conf') }}" method="get">
                            <input type="hidden" name="id" value="{{ $taxi->id }}">
                            <input type="submit" class="btn btn-body btn-sm" value="削除">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- 注文がない時 --}}
    @if (count($taxis) < 1)
        <h4 class="text-danger mt-5">現在、予約はありません</h4>
    @endif

@endsection
