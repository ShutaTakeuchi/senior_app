{{-- ログイン後のページ --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{ route('delivery.index') }}">配食サービス</a>
                    <a href="{{ route('item.index') }}">日用品配達サービス</a>
                    {{-- <a href="{{ route('health.index') }}">健康管理</a> --}}
                    <a href="{{ route('contact.index') }}">連絡</a>

                    <p>今日の天気は<h3>{{ $weather['forecasts']['0']['telop'] }}</h3></p>
                </div>
            </div>

            {{-- delivery履歴 --}}
            <div class="card">
                <div class="card-header">配食履歴</div>
                <div class="card-body">
                    @foreach ($deliveries as $delivery)
                        <p>・{{ $delivery['shop_name'] }}</p>
                    @endforeach
                </div>
            </div>

            {{-- item履歴 --}}
            <div class="card">
                <div class="card-header">通販履歴</div>
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
