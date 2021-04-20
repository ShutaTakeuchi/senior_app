{{-- 連絡一覧 --}}
@extends('layouts.app')

@section('title', 'れんらく / HOME-GOOD')

@section('content')
<header class="masthead bg-primary text-white text-center" style="padding-top: 50px; height: 100%;">
    <div class="container d-flex align-items-center flex-column">
        <h2>各種連絡</h2>
        <br>
        <h5 class="text-body">送信後、営業所からご連絡致します。</h5>
        <br>
        <a href="{{ route('contact.conf.taxi') }}" class="btn btn-info btn-lg btn-block py-4">タクシーをつかいたい</a>
        <br>
        <a href="{{ route('contact.show.order') }}" class="btn btn-info btn-lg btn-block py-4">商品をキャンセルしたい</a>
        <br>
        <a href="{{ route('contact.other.form') }}" class="btn btn-info btn-lg btn-block py-4">その他連絡</a>
        <br>
        <a href="{{ route('contact.emergency') }}" class="btn btn-danger btn-lg btn-block py-4">緊急・救急</a>

        <br>
        <br>

        <h5>そのままお電話を希望される方は、</h5>
        <h5>以下の番号におかけください。</h5>
        <h4 class="text-body">TEL 000-1111-2222</h4>

        <br>

        <a href="{{ route('home') }}" class="btn btn-dark btn-lg">戻る</a>
    </div>
  </header>
@endsection