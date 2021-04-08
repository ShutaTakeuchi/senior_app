{{-- 連絡一覧 --}}
@extends('layouts.app')

@section('content')
<header class="masthead bg-primary text-white text-center" style="margin-top: -120px; height: 800px;">
    <div class="container d-flex align-items-center flex-column">
        <h2>連絡の一覧</h2>
        <br>
        <br>
        <a href="{{ route('welcome.address') }}" class="btn btn-info btn-lg btn-block">営業所へ行く</a>
        <br>
        <a href="{{ route('welcome.form') }}" class="btn btn-info btn-lg btn-block">家に来てもらう</a>
        <br>
        <a href="{{ route('register') }}" class="btn btn-dark btn-lg btn-block">会員登録へ戻る</a>
    </div>
  </header>
@endsection