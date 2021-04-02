{{-- admin　担当者入力画面 --}}
@extends('layouts.app_admin')

@section('content')
            <h2>担当者を入力してください。</h2>
            <form action="{{ route('admin.store_staff.delivery') }}" method="post">
                @csrf
                <input type="text" name="staff_name">
                <input type="hidden" name="id" value="{{ $order }}">
                <input type="submit" value="決定">
            </form>
@endsection