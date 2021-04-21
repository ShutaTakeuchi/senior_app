{{-- admin 個別タスク一覧 --}}
@extends('layouts.app_admin')

@section('content')
    <h2>業務終了確認</h2>
    <h4 class="text-danger mt-3 mb-5">業務が完了しましたか？</h4>

    {{-- delivery --}}
    @if ($category === 'delivery')

        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-4">{{ $delivery->shop_name }}</h5>
                <p class="card-text">{{ $delivery->user->name }}様</p>
                <p class="card-text">{{ $delivery->user->address }}</p>
                <p class="card-text">{{ $delivery->user->tel }}</p>
            </div>
        </div>

        <form action="{{ route('admin.task.comp.finish') }}" method="post" class="mt-5">
            @csrf
            <input type="hidden" name="category" value="delivery">
            <input type="hidden" name="id" value="{{ $delivery->id }}">
            <input type="submit" class="btn btn-info" value="配達しました">
        </form>
        <br>
        <a href="{{ route('admin.task.delivery.show') }}" class="btn btn-dark">戻る</a>

        {{-- item --}}
    @elseif($category === 'item')
        <h5 class="mb-5">{{ $item->item_name }}</h5>
        <h4>{{ $item->user->name }}様</h4>
        <h4>{{ $item->user->address }}</h4>
        <h4>{{ $item->user->tel }}</h4>

        <form action="{{ route('admin.task.comp.finish') }}" method="post" class="mt-4">
            @csrf
            <input type="hidden" name="category" value="item">
            <input type="hidden" name="id" value="{{ $item->id }}">
            <input type="submit" class="btn btn-info" value="配達しました">
        </form>
        <br>
        <a href="{{ route('admin.task.item.show') }}" class="btn btn-dark">戻る</a>

        {{-- taxi --}}
    @elseif($category === 'taxi')
        <h4>{{ $taxi->user->name }}様</h4>
        <h4>{{ $taxi->user->address }}</h4>
        <h4>{{ $taxi->user->tel }}</h4>

        <form action="{{ route('admin.taxk.taxi.finish.comp') }}" method="post" class="mt-5">
            @csrf
            <input type="hidden" name="category" value="taxi">
            <input type="hidden" name="id" value="{{ $taxi->id }}">
            <input type="submit" class="btn btn-info" value="送迎しました">
        </form>
        <br>
        <a href="{{ route('admin.task.taxi') }}" class="btn btn-dark">戻る</a>
    @endif
@endsection
