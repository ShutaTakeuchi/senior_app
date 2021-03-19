{{-- 通販購入確認ページ --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <p>こちらの商品購入しますか？</p>
          <h3>{{ $item_name }}</h3>
          <h3>{{ $item_price }}円</h3>
            <a href="{{ route('item.index') }}" type="submit" class="btn btn-primary">いいえ、他を探します</a>
            <form action="{{ route('item.sheet') }}" method="get">
                <input type="hidden" name="item_id" value="{{ $item_id }}">
                <input type="hidden" name="item_name" value="{{ $item_name }}">
                <input class="btn btn-primary" type="submit" value="はい、購入します">
            </form>
        </div>
    </div>
</div>
@endsection
