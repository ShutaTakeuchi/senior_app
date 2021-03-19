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
                    <a href="{{ route('health.index') }}">健康管理</a>

                    <p>今日の天気は<h3>{{ $weather['forecasts']['0']['telop'] }}</h3></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
