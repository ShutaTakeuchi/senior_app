{{-- 営業所の住所 --}}
@extends('layouts.app')

@section('title', '営業所の住所 / HOME-GOOD')

@section('content')
    <header class="masthead bg-primary text-white text-center" style="padding-top: 30px; height: 100%;">
        <div class="container d-flex align-items-center flex-column">
            <h2>営業所で会員登録</h2>

            <br>

            <div class="text-body card">
                <div class="card-body">
                    <h4 class="card-text">〒000-0000</h4>
                    <br>
                    <h3 class="card-text">大分県別府市◯◯</h3>
                    <br>
                    <h6>営業時間：9:00〜17:00 (年中無休)</h6>
                </div>
            </div>

            <br>

            <div class="text-body">
                <h5>こちらの営業所内の登録カウンターへ<br>お越しくださいませ。</h5>
            </div>

            <br>

            <div class="text-danger">
                <h5>お越しの際は、<br>お持ちのスマートフォンを<br class="br-sp">ご持参ください。</h5>
            </div>

            <br>

            <h6>当日のご案内の所要時間は約１時間です。</h6>

            <br>
            <br>

            <a href="{{ route('welcome.index') }}" class="btn btn-dark btn-lg">戻る</a>
        </div>
    </header>
@endsection
