{{-- 連絡一覧 --}}
@extends('layouts.app')

@section('content')
    <header class="masthead bg-primary text-white text-center" style="margin-top: -120px; height: 800px;">
        <div class="container d-flex align-items-center flex-column">
            <h2>会員登録サポートサービス</h2>
            <br>

            <div class="text-body">
                <h5>お客様の会員登録を</h5>
                <h5>私たちスタッフがお手伝いを</h5>
                <h5>無料でさせていただきます。</h5>
                <br>
                <h5>またHOME-GOODの使い方も</h5>
                <h5>詳しく教えさせていただきます。</h5>
            </div>
            
            <br>
            <h5>以下からお選びください。</h5>
            <br>
            <a href="{{ route('welcome.address') }}" class="btn btn-info btn-lg btn-block">営業所へ行く</a>
            <br>
            <a href="{{ route('welcome.form') }}" class="btn btn-info btn-lg btn-block">家に来てもらう</a>
            <br>
            <br>
            <a href="{{ route('register') }}" class="btn btn-dark btn-lg">会員登録へ戻る</a>
        </div>
    </header>
@endsection
