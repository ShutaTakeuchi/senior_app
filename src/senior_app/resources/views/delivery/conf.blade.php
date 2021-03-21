{{-- 配食宅配購入確認ページ --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <p>当店の配食サービス専用のメニューをご提供いたします。</p>
          <p>こちらの店舗で購入しますか？</p>
          <h3>{{ $shop_name }}</h3>
            <a href="{{ route('delivery.index') }}" type="submit" class="btn btn-primary">いいえ、他を探します</a>
            <form action="{{ route('delivery.sheet') }}" method="get">
                <input type="hidden" name="shop_id" value="{{ $shop_id }}">
                <input type="hidden" name="shop_name" value="{{ $shop_name }}">
                <input class="btn btn-primary btn-lg btn-block" type="submit" value="はい、購入します">
            </form>
        </div>
    </div>
</div>
@endsection
