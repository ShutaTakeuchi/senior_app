{{-- 検索結果 --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        {{-- 検索ページのリンク --}}
        <a href="{{ route('delivery.index') }}">もう一度検索し直す</a>
        
        @if (isset($results['rest']))
            <div class="col-md-8">
                @foreach ($results['rest'] as $result)
                    <div class="card">
                        <div class="card-header"><a href="">{{ $result['name'] }}</a></div>
    
                        <div class="card-body">
                            <p>{{ $result['pr']['pr_short'] }}</p>
                            <img src="{{ $result['image_url']['shop_image1'] }}">
                            <img src="{{ $result['image_url']['shop_image2'] }}">
                        </div>
                    </div>
                @endforeach
            </div>  

        {{-- 検索結果がなかった場合の処理 --}}
        @elseif (isset($results['error']))
            <p>お探しのものはありませんでした</p>
        @endif

    </div>
</div>
@endsection
