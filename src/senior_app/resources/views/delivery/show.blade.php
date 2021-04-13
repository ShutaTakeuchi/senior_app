{{-- 検索結果 --}}
@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">

        <div class="col-md-8">
            {{-- 検索ページのリンク --}}
            <a class="btn btn-primary btn-lg btn-block" href="{{ route('delivery.index') }}" role="button">もう一度検索する</a>
            <br>
        </div>      
        
        <div class="col-md-8">
            @if (isset($results['rest']))
                @foreach ($results['rest'] as $result)
                    <div class="card" style="">
                        <div class="card-body" style="background-color: #dddddd">
                            <h2 class="card-title text-center"><a href="{{ $result['url'] }}" class="text-dark" style="text-decoration: none;">{{ $result['name'] }}</a></h2>
                            <img class="card-img-top rounded mx-auto d-block" src="{{ $result['image_url']['shop_image1'] }}" style="width: auto; height:auto;">
                            <br>
                            {{-- 店名 --}}
                            <div class="text-center">
                                
                                {{-- 詳細 --}}
                                <h6 class="card-text">{{ $result['pr']['pr_short'] }}</h6>
                                {{-- 住所 --}}
                                {{-- <p class="card-text">{{ $result['address'] }}</p> --}}
                                {{-- 営業時間 --}}
                                <br>
                                <h6>営業時間</h6><h5 class="card-text text-danger">{{ $result['opentime'] }}</h5>
                                {{-- 休日 --}}
                                <h6>休日</h6><h5 class="card-text text-danger">{{ $result['holiday'] }}</h5>
                                {{-- 電話番号 --}}
                                <h6>電話番号</h6><h5 class="card-text text-danger">{{ $result['tel'] }}</h5>
                                <br>
                                {{-- 注文ボタン --}}
                                <form action="{{ route('delivery.conf') }}" method="get">
                                    <input type="hidden" name="shop_id" value="{{ $result['id'] }}">
                                    <input type="hidden" name="shop_name" value="{{ $result['name'] }}">
                                    <input class="btn btn-info btn-lg btn-block" type="submit" value="このお店で注文する">
                                </form>
                            </div>
                        </div>
                    </div>
                    <br>
                @endforeach

            {{-- 検索結果がなかった場合の処理 --}}
            @elseif (isset($results['error']))
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


