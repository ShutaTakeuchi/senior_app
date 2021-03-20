{{-- 連絡一覧 --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>連絡の一覧</h2>
            <a href="{{ route('contact.emergency') }}">緊急</a>
            <a href="{{ route('contact.conf.taxi') }}">タクシー</a>
        </div>
    </div>
</div>
@endsection
