{{-- admin エラー時の表示 --}}
@extends('layouts.app_admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>{{ $message }}</h2>
            <a href="/admin/{{ $href }}">戻る</a>
        </div>
    </div>
</div>
@endsection