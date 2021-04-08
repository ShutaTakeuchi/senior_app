{{-- 営業所の住所 --}}
@extends('layouts.app')

@section('content')
<header class="masthead bg-primary text-white text-center" style="margin-top: -120px; height: 800px;">
    <div class="container d-flex align-items-center flex-column">
        <h2>営業所の住所</h2>
        <br>
        <h3 class="text-danger">大分県別府市◯◯</h3>
        <br>
        <h4>お越しの際は、お持ちの<strong>スマートフォンをご持参ください。</strong></h4>
        <br>
        <a href="{{ route('register') }}" class="btn btn-dark btn-lg">会員登録へ戻る</a>
    </div>
  </header>
@endsection