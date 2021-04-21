{{-- admin　担当者入力画面 --}}
@extends('layouts.app_admin')

@section('content')

    <h2>商品状況の変更</h2>

    <div class="text-danger mt-5">
        @if ($status === '注文済み')
            <h4 style="display: inline;">入荷済み</h4>
        @elseif ($status === '入荷済み')
            <h4 style="display: inline;">発注依頼</h4>
        @elseif ($status === '注文依頼')
            <h4 style="display: inline;">注文済み</h4>
        @endif
        <h4 class="text-body" style="display: inline;">に変更しますか？</h4>
    </div>
    

    <form action="{{ route('admin.status.comp.item') }}" method="post" class="mt-5">
        @csrf
        <input type="hidden" name="id" value="{{ $id }}">
        <input type="hidden" name="status" value="{{ $status }}">
        <input type="submit" value="確定する" class="btn btn-primary">
    </form>

    <a href="{{ route('admin.search.item') }}" class="btn btn-dark mt-4">戻る</a>

@endsection
