{{-- admin 個別タスク一覧 --}}
@extends('layouts.app_admin')

@section('content')
    <h2>業務終了確認</h2>
    <h3 class="text-danger mt-3 mb-4">業務が完了しましたか？</h3>

    {{-- delivery --}}
    @if ($category === 'delivery')
        <h5>{{ $delivery->shop_name }}</h5>
        <br>
        <h5>お名前：{{ $delivery->user->name }}</h5>
        <br>
        <h5>住所：{{ $delivery->user->address }}</h5>
        <br>
        <h5>電話番号：{{ $delivery->user->tel }}</h5>
        <br>

        <form action="{{ route('admin.task.comp.finish') }}" method="post">
            @csrf
            <input type="hidden" name="category" value="delivery">
            <input type="hidden" name="id" value="{{ $delivery->id }}">
            <input type="submit" class="btn btn-info" value="配達しました">
        </form>
        <br>
        <a href="{{ route('admin.home') }}" class="btn btn-dark">戻る</a>

        {{-- item --}}
    @elseif($category === 'item')
        <h4>{{ $item->item_name }}</h4>
        <br>
        <h4>お名前：{{ $item->user->name }}</h4>
        <br>
        <h4>住所：{{ $item->user->address }}</h4>
        <br>
        <h4>電話番号：{{ $item->user->tel }}</h4>
        <br>

        <form action="{{ route('admin.task.comp.finish') }}" method="post">
            @csrf
            <input type="hidden" name="category" value="item">
            <input type="hidden" name="id" value="{{ $item->id }}">
            <input type="submit" class="btn btn-info" value="配達しました">
        </form>
        <br>
        <a href="{{ route('admin.home') }}" class="btn btn-dark">戻る</a>

        {{-- taxi --}}
    @elseif($category === 'taxi')
        <h4>お名前：{{ $taxi->user->name }}</h4>
        <br>
        <h4>住所：{{ $taxi->user->address }}</h4>
        <br>
        <h4>電話番号：{{ $taxi->user->tel }}</h4>
        <br>

        <form action="{{ route('admin.taxk.taxi.finish.comp') }}" method="post">
            @csrf
            <input type="hidden" name="category" value="taxi">
            <input type="hidden" name="id" value="{{ $taxi->id }}">
            <input type="submit" class="btn btn-info" value="送迎しました">
        </form>
        <br>
        <a href="{{ route('admin.home') }}" class="btn btn-dark">戻る</a>
    @endif
@endsection
