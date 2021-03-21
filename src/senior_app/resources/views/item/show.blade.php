{{-- 検索結果 --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">
            {{-- 検索ページのリンク --}}
            <a class="btn btn-primary btn-lg btn-block" href="{{ route('item.index') }}" role="button">もう一度検索し直す</a>
            <br>
        </div>      
        
        <div class="col-md-8">
            @if ($results['hits'] > 0)
                @foreach ($results['Items'] as $result)
                    <div class="card" style=";">
                        <img class="card-img-top" src="{{ $result['Item']['mediumImageUrls'][0]['imageUrl'] }}">
                        <div class="card-body">
                        {{-- 商品名 --}}
                        <h5 class="card-title"><a href="{{ $result['Item']['itemUrl'] }}">{{ $result['Item']['itemName'] }}</a></h5>
                        {{-- 金額 --}}
                        <p class="card-text">{{ $result['Item']['itemPrice'] }}円</p>
                        {{-- 注文ボタン --}}
                        <form action="{{ route('item.conf') }}" method="get">
                            <input type="hidden" name="item_id" value="{{ $result['Item']['itemCode'] }}">
                            <input type="hidden" name="item_name" value="{{ $result['Item']['itemName'] }}">
                            <input type="hidden" name="item_price" value="{{ $result['Item']['itemPrice'] }}">
                            <input class="btn btn-primary btn-lg btn-block" type="submit" value="この商品を注文する">
                        </form>
                        </div>
                    </div>
                    <br>
                @endforeach

            {{-- 検索結果がなかった場合の処理 --}}
            @else
                <p>申し訳ございません</p>
                <p>お探しのものはありませんでした</p>
            @endif
        </div>  
    </div>
</div>

@endsection


