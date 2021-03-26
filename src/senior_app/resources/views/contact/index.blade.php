{{-- 連絡一覧 --}}
@extends('layouts.app')

@section('content')
<header class="masthead bg-primary text-white text-center" style="margin-top: -120px; height: 800px;">
    <div class="container d-flex align-items-center flex-column">
        <h2>連絡の一覧</h2>
        <br>
        <h4 class="text-dark">こちらから電話をかけさせていただきます。</h4>
        <br>
        <a href="{{ route('contact.conf.taxi') }}" class="btn btn-info btn-lg btn-block">タクシーをつかいたい</a>
        <br>
        <br>
        <a href="{{ route('contact.emergency') }}" class="btn btn-warning btn-lg btn-block">緊急・救急</a>
    </div>
  </header>
@endsection