{{-- 検索結果 --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">
            {{-- 検索ページのリンク --}}
            <a class="btn btn-primary btn-lg btn-block" href="{{ route('delivery.index') }}" role="button">もう一度検索し直す</a>
            <br>
        </div>      
        
        <div class="col-md-8">
            @if (isset($results['rest']))
                @foreach ($results['rest'] as $result)
                    <div class="card" style=";">
                        <img class="card-img-top" src="{{ $result['image_url']['shop_image1'] }}">
                        <div class="card-body">
                        {{-- 店名 --}}
                        <h5 class="card-title"><a href="{{ $result['url'] }}">{{ $result['name'] }}</a></h5>
                        {{-- 詳細 --}}
                        <p class="card-text">{{ $result['pr']['pr_long'] }}</p>
                        {{-- 住所 --}}
                        <p class="card-text">{{ $result['address'] }}</p>
                        {{-- 営業時間 --}}
                        <p class="card-text">{{ $result['opentime'] }}</p>
                        {{-- 休日 --}}
                        <p class="card-text">{{ $result['holiday'] }}</p>
                        {{-- 電話番号 --}}
                        <p class="card-text">{{ $result['tel'] }}</p>
                        {{-- 注文ボタン --}}
                        <form action="{{ route('delivery.sheet') }}" method="get">
                            <input type="hidden" name="shop_id" value="{{ $result['id'] }}">
                            <input type="hidden" name="shop_name" value="{{ $result['name'] }}">
                            <input class="btn btn-primary" type="submit" value="このお店で注文する">
                        </form>
                        </div>
                    </div>
                    <br>
                @endforeach

            {{-- 検索結果がなかった場合の処理 --}}
            @elseif (isset($results['error']))
                <p>申し訳ございません</p>
                <p>お探しのものはありませんでした</p>
            @endif
        </div>  
    </div>
</div>

@endsection


