{{-- 通販購入確認ページ --}}
@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <p>こちらの商品購入しますか？</p>
          <h3>{{ $item_name }}</h3>
          <h3>{{ $item_price }}円</h3>
            <a href="{{ route('item.index') }}" type="submit" class="btn btn-primary">いいえ、他を探します</a>
            <form action="{{ route('item.sheet') }}" method="get">
                <input type="hidden" name="item_id" value="{{ $item_id }}">
                <input type="hidden" name="item_name" value="{{ $item_name }}">
                <input class="btn btn-primary btn-lg btn-block" type="submit" value="はい、購入します">
            </form>
        </div>
    </div>
</div> --}}
<header class="masthead bg-primary text-white text-center" style="margin-top: -90px; height: 100%;">
    <div class="container d-flex align-items-center flex-column">
        <h4>こちらの商品を購入しますか？</h4>
        <br>
        <br>
        <h2 class="text-danger">{{ $item_name }}</h2>
        <br>
        <br>
        <h2 class="">¥{{ $item_price }}</h2>
        <br>
        <br>
        <h4 class="text-dark">お届け先：　{{ $user_address }}</h4>
        <br>
        <br>
        <form action="{{ route('item.sheet') }}" method="get">
            <input type="hidden" name="item_id" value="{{ $item_id }}">
            <input type="hidden" name="item_name" value="{{ $item_name }}">
            <input class="btn btn-info btn-lg btn-block" type="submit" value="はい、購入します">
        </form>
        <br>
        <a href="{{ route('item.index') }}" type="submit" class="btn btn-dark btn-lg">いいえ、戻ります</a>
        
    </div>
</header>
@endsection

