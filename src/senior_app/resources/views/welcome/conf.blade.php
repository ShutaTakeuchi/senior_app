{{-- 訪問型フォームの確認 --}}
@extends('layouts.app')

@section('content')
<header class="masthead bg-primary text-white text-center" style="margin-top: -120px; height: 800px;">
    <div class="container d-flex align-items-center flex-column">
        <h2>お客様情報の確認</h2>
        <br>
        <h3></h3>
        <a href="{{ route('welcome.form') }}" class="btn btn-danger btn-lg btn-block">会員登録へ戻る</a>
    </div>
  </header>
@endsection