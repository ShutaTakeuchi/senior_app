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
        
        @if (isset($results['rest']))
            <div class="col-md-8">
                @foreach ($results['rest'] as $result)
                    <div class="card" style=";">
                        <img class="card-img-top" src="{{ $result['image_url']['shop_image1'] }}">
                        <div class="card-body">
                        {{-- 店名 --}}
                        <h5 class="card-title"><a href="">{{ $result['name'] }}</a></h5>
                        {{-- 詳細 --}}
                        <p class="card-text">{{ $result['pr']['pr_long'] }}</p>
                        {{-- 注文ボタン --}}
                        <a href="#" class="btn btn-primary">このお店で注文する</a>
                        </div>
                    </div>
                <br>
                @endforeach
            </div>  

        {{-- 検索結果がなかった場合の処理 --}}
        @elseif (isset($results['error']))
            <p>お探しのものはありませんでした</p>
        @endif

    </div>
</div>

@endsection


