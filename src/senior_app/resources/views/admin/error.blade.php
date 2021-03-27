{{-- admin エラー時の表示 --}}
@extends('layouts.app_admin')

@section('content')
    <h2>{{ $message }}</h2>
    <a href="/admin/{{ $href }}" class="btn btn-info">戻る</a>
@endsection