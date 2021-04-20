{{-- キャンセル確認 --}}
@extends('layouts.app')

@section('title', 'キャンセルの確認 / HOME-GOOD')

@section('content')
<header class="masthead bg-primary text-white text-center" style="padding-top: 30px; height: 100%;">
    <div class="container d-flex align-items-center flex-column">
        <h2>キャンセル申請確認</h2>
        <br>
        
        <div class="text-danger">
            <h5>商品の注文状況や</h5>
            <h5>配達状況によって</h5>
            <h5>キャンセルできない場合があります。</h5>
        </div>

        <br>

        <div class="text-body">
            <h4>こちらの商品を</h4>
            <h4>キャンセルしますか？</h4>
        </div>

        <br>

        <h2 class="text-danger">{{ $name }}</h2>
        <br>
        <form action="{{ route('contact.comp.cancel') }}" method="post">
            @csrf
            <input type="hidden" name="category" value="{{ $category }}">
            <input type="hidden" name="name" value="{{ $name }}">
            <input type="submit" value="キャンセルしたい" class="btn btn-info btn-lg">
        </form>
        <br>
        <a href="{{ route('contact.show.order') }}" class="btn btn-dark btn-lg">いいえ</a>
    </div>
  </header>
@endsection
