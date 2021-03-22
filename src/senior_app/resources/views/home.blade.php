{{-- ログイン後のページ --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <p class="text-center">きょうのてんきは、<img src="{{ $weather['forecasts']['0']['image']['url'] }}">です</p>
            <a type="button" class="btn btn-success btn-lg btn-block" href="{{ route('delivery.index') }}" style="padding: 40px;">ごはん</a>
            <a type="button" class="btn btn-primary btn-lg btn-block" href="{{ route('item.index') }}" style="padding: 40px;">おかいもの</a>
            <a type="button" class="btn btn-danger btn-lg btn-block" href="{{ route('contact.index') }}" style="padding: 40px;">れんらく</a>

            {{-- delivery履歴 --}}
            <div class="card">
                <div class="card-header">ごはんの注文履歴</div>
                <div class="card-body">
                    @foreach ($deliveries as $delivery)
                        <p>・{{ $delivery['shop_name'] }}</p>
                    @endforeach
                </div>
            </div>

            {{-- item履歴 --}}
            <div class="card">
                <div class="card-header">買い物したもの</div>
                <div class="card-body">
                    @foreach ($items as $item)
                        <p>・{{ $item['item_name'] }}</p>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</div>
@endsection