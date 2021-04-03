{{-- admin　担当者入力画面 --}}
@extends('layouts.app_admin')

@section('content')
    @if ($status === '注文済み')
        <h2>入荷済みに変更しますか？</h2>
    @elseif ($status === '入荷済み')
        <h2>発注依頼に変更しますか？</h2>
    @elseif ($status === '注文依頼')
        <h2>注文済みに変更しますか？</h2>
    @endif
    <form action="{{ route('admin.status.comp.item') }}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $id }}">
        <input type="hidden" name="status" value="{{ $status }}">
        <input type="submit" value="確定する">
    </form>

@endsection
