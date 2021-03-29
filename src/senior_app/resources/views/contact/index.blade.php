{{-- 連絡一覧 --}}
@extends('layouts.app')

@section('content')
<header class="masthead bg-primary text-white text-center" style="margin-top: -120px; height: 800px;">
    <div class="container d-flex align-items-center flex-column">
        <h2>連絡の一覧</h2>
        <br>
        <br>
        <a href="{{ route('contact.conf.taxi') }}" class="btn btn-info btn-lg btn-block">タクシーをつかいたい</a>
        <br>
        <a href="{{ route('contact.show.order') }}" class="btn btn-info btn-lg btn-block">商品のキャンセル</a>
        <br>
        <a href="{{ route('contact.emergency') }}" class="btn btn-danger btn-lg btn-block">緊急・救急</a>
    </div>
  </header>
@endsection