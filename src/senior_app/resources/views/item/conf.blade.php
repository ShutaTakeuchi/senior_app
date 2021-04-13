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
    <header class="masthead bg-primary text-white text-center" style="padding-top: 30px; height: 100%;">
        <div class="container d-flex align-items-center flex-column">
            <h4>こちらの商品を購入しますか？</h4>
            <br>
            <br>

            <div class="card text-center" style="width: 27rem;">
                <div class="card-body text-body">
                    <h4 class="card-title">{{ $item_name }}</h4>
                    <h3 class="card-text text-danger">¥{{ $item_price }}</h3>
                </div>
                <div class="card-footer text-body">
                    <h6>お届け先：{{ $user_address }}</h6>
                </div>
            </div>

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
