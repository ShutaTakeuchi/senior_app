{{-- 連絡一覧 --}}
@extends('layouts.app')

@section('title', 'れんらく / HOME-GOOD')

@section('content')
<header class="masthead bg-primary text-white text-center" style="padding-top: 50px; height: 100%;">
    <div class="container d-flex align-items-center flex-column">
        <h2>各種連絡</h2>

        <h5 class="text-body mt-4 mb-5">送信後、営業所からご連絡致します</h5>


        <div style="width: 20rem;" class="mb-4">
        <a href="{{ route('contact.conf.taxi') }}" class="btn btn-info btn-lg btn-block py-4 mb-4" style="font-size: 1.5rem;">タクシーをつかいたい</a>

        <a href="{{ route('contact.show.order') }}" class="btn btn-info btn-lg btn-block py-4 mb-4" style="font-size: 1.5rem;">商品をキャンセルしたい</a>

        <a href="{{ route('contact.other.form') }}" class="btn btn-info btn-lg btn-block py-4 mb-4" style="font-size: 1.5rem;">その他連絡</a>

        <a href="{{ route('contact.emergency') }}" class="btn btn-danger btn-lg btn-block py-4 mb-4" style="font-size: 1.5rem;">緊急・救急</a>
        </div>




        <h5>そのままお電話を希望される方は、</h5>
        <h5 class="mb-3">以下の番号におかけください</h5>
        <h4 class="text-body mb-5">TEL 000-1111-2222</h4>



        <a href="{{ route('home') }}" class="btn btn-dark btn-lg">戻る</a>
    </div>
  </header>
@endsection