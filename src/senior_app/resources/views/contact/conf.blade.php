{{-- タクシー手配予約確認 --}}
@extends('layouts.app')

@section('content')
<header class="masthead bg-primary text-white text-center" style="margin-top: -120px; height: 800px;">
    <div class="container d-flex align-items-center flex-column">
        <br>
        <br>
        <h2>タクシーを予約しますか？</h2>
        <br>
        <br>
        <a href="{{ route('contact.comp.taxi') }}"  class="btn btn-info btn-lg">予約します</a>
        <br>
        <a href="{{ route('home') }}" class="btn btn-dark btn-lg">いいえ</a>
    </div>
  </header>
@endsection
