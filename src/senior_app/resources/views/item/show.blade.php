{{-- 検索結果 --}}
@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">

        <div class="col-md-8">
            {{-- 検索ページのリンク --}}
            <a class="btn btn-primary btn-lg btn-block" href="{{ route('item.index') }}" role="button">もう一度検索する</a>
            <br>
        </div>      
        
        <div class="col-md-8">
            @if ($results['hits'] > 0)
                @foreach ($results['Items'] as $result)
                    <div class="card" style=";">
                        {{-- <img class="card-img-top" src="{{ $result['Item']['mediumImageUrls'][0]['imageUrl'] }}"> --}}
                        {{-- <div class="card-body"> --}}
                        <div class="card-body" style="background-color: #dddddd">
                            {{-- 商品名 --}}
                            <h4 class="card-title text-center"><a href="{{ $result['Item']['itemUrl'] }}" class="text-dark" style="text-decoration: none;">{{ $result['Item']['itemName'] }}</a></h4>
                            <img class="card-img-top rounded mx-auto d-block" style="width: 50%; height: auto;" src="{{ $result['Item']['mediumImageUrls'][0]['imageUrl'] }}">

                            <br>

                            <div class="text-center">
                                <h6 class="card-text">{{ $result['Item']['catchcopy'] }}</h6>
                                {{-- 金額 --}}
                                <br>
                                <h2 class="card-text text-danger">¥{{ $result['Item']['itemPrice'] }}</h2>
                                <br>
                                {{-- 注文ボタン --}}
                                <form action="{{ route('item.conf') }}" method="get">
                                    <input type="hidden" name="item_id" value="{{ $result['Item']['itemCode'] }}">
                                    <input type="hidden" name="item_name" value="{{ $result['Item']['itemName'] }}">
                                    <input type="hidden" name="item_price" value="{{ $result['Item']['itemPrice'] }}">
                                    <input class="btn btn-info btn-lg btn-block" type="submit" value="この商品を注文する">
                                </form>
                            </div>
                        </div>
                    </div>
                    <br>
                @endforeach

            {{-- 検索結果がなかった場合の処理 --}}
            @else
                <br>
                <br>
                <h2 class="text-center">申し訳ございません。</h2>
                <br>
                <h2 class="text-center" style="height: 400px;">お探しのものはありませんでした。</h2>
            @endif
        </div>  
    </div>
</div>
@endsection


