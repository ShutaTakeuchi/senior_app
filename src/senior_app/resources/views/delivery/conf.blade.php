{{-- 配食宅配購入確認ページ --}}
@extends('layouts.app')

@section('title', 'ごはんの注文確認 / HOME-GOOD')

@section('content')
    <header class="masthead bg-primary text-white text-center " style="padding-top: 30px; min-height: 600px; height:100%;">
        <div class="container d-flex align-items-center flex-column">
            <h5>当店の配食サービス専用の</h5>
            <h5>メニューをご提供いたします。</h5>
            <br>
            <h4>こちらの店舗で購入しますか？</h4>
            <br>

            <div class="card text-center" style="width: 27rem;">
                <div class="card-body text-body">
                    <h2 class="card-title">{{ $shop_name }}</h2>
                    <h3 class="card-text text-danger">¥{{ $price }}</h3>
                </div>
                <div class="card-footer text-body">
                    <h6>お届け先：{{ $user_address }}</h6>
                </div>
            </div>

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
