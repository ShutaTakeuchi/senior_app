{{-- 配食宅配購入確認ページ --}}
@extends('layouts.app')

@section('content')
<header class="masthead bg-primary text-white text-center" style="margin-top: -90px; height: 100%;">
    <div class="container d-flex align-items-center flex-column">
        <h5>当店の配食サービス専用のメニューをご提供いたします。</h5>
        <br>
        <h4>こちらの店舗で購入しますか？</h4>
        <br>
        <br>
        <h1 class="text-danger">{{ $shop_name }}</h1>
        <br>
        <h2 class="">¥{{ $price }}</h2>
        <br>
        <h4 class="text-dark">お届け先：　{{ $user_address }}</h4>
        <br>
        <br>
        <form action="{{ route('delivery.sheet') }}" method="get">
            <input type="hidden" name="shop_id" value="{{ $shop_id }}">
            <input type="hidden" name="shop_name" value="{{ $shop_name }}">
            <input class="btn btn-info btn-lg btn-block" type="submit" value="はい、購入します">
        </form>
        <br>
        <a href="{{ route('delivery.index') }}" type="submit" class="btn btn-dark btn-lg">いいえ、戻ります</a>
        
    </div>
</header>
@endsection
