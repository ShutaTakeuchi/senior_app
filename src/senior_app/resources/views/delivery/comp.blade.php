{{-- 配食宅配注文完了ページ --}}
@extends('layouts.app')

@section('content')

<header class="masthead bg-primary text-white text-center" style="margin-top: -90px; height: 700px;">
    <div class="container d-flex align-items-center flex-column">
        <h2>ありがとうございます。</h2>
        <h2>ご注文を承りました。</h2>
        <h2>配達までしばらくおまちくださいませ。</h2>
        <br>
        <br>
        <br>
        <a href="{{ route('home') }}" type="submit" class="btn btn-info btn-lg">戻る</a>
    </div>
</header>
@endsection