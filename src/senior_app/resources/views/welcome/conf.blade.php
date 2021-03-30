{{-- 訪問型フォームの確認 --}}
@extends('layouts.app')

@section('content')
<header class="masthead bg-primary text-white text-center" style="margin-top: -120px; height: 800px;">
    <div class="container d-flex align-items-center flex-column">
        <h2>お客様情報の確認</h2>
        <br>
        <h3>お名前：{{ $user['name'] }}</h3>
        <h3>住所：{{ $user['address'] }}</h3>
        <h3>電話番号：{{ $user['tel'] }}</h3>
        <br>

        <form action="{{ route('welcome.form.comp') }}" method="post">
          @csrf
          <input type="hidden" name="name" value="{{ $user['name'] }}">
          <input type="hidden" name="address" value="{{ $user['address'] }}">
          <input type="hidden" name="tel" value="{{ $user['tel'] }}">
          <button type="submit" class="btn btn-info btn-lg">確認しました</button>
        </form>
        <br>

        <a href="{{ route('welcome.form') }}" class="btn btn-danger">会員登録へ戻る</a>
    </div>
  </header>
@endsection