{{-- 連絡一覧 --}}
@extends('layouts.app')

@section('title', '会員登録サポート / HOME-GOOD')

@section('content')
    <header class="masthead bg-primary text-white text-center" style="padding-top: 30px; height: 100%;">
        <div class="container d-flex align-items-center flex-column">
            <h2>会員登録サポート</h2>

            <div class="row text-danger mt-4">
                <div class="col-md-6 mb-2">
                    <h5>お客様の会員登録を</h5>
                    <h5>私たちスタッフがお手伝いを</h5>
                    <h5>無料でさせていただきます。</h5>
                </div>

                <div class="col-md-6">
                    <h5>またHOME-GOODの使い方も</h5>
                    <h5>詳しく教えさせていただきます。</h5>
                </div>
            </div>
            
            <h5 class="text-body mt-4">以下からお選びください。</h5>

            <div class="row">
                <div class="col-md-6">
                    <a href="{{ route('welcome.address') }}" class="btn btn-info btn-lg btn-block mt-3">営業所へ行く</a>
                </div>

                <div class="col-md-6">
                    <a href="{{ route('welcome.form') }}" class="btn btn-info btn-lg btn-block mt-3">家に来てもらう</a>
                </div>
            </div>
{{-- 
            <a href="{{ route('welcome.address') }}" class="btn btn-info btn-lg btn-block mt-2">営業所へ行く</a>

            <a href="{{ route('welcome.form') }}" class="btn btn-info btn-lg btn-block mt-4">家に来てもらう</a> --}}


            <a href="{{ route('register') }}" class="btn btn-dark btn-lg mt-5">会員登録へ戻る</a>
        </div>
    </header>
@endsection
