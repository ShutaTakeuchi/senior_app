{{-- admin アカウント削除確認画面 --}}
@extends('layouts.app')

@section('title', 'アカウント削除の確認 / HOME-GOOD')

@section('content')
    <header class="masthead bg-primary text-white text-center" style="padding-top: 30px; height: 100%; min-height: 520px;">
        <div class="container d-flex align-items-center flex-column">

            <h2>アカウント削除の確認</h2>

            <div class="text-body mt-4">
                <h6>削除後、再び当サービスの利用を</h6>
                <h6>ご希望の場合は、再度アカウントを作成</h6>
                <h6>する必要があります。</h6>
            </div>

            <h4 class="text-danger mt-4">アカウントを削除しますか？</h4>

            <form action="{{ route('user.delete') }}" method="get" class="mt-4">
                <button type="submit" class="btn btn-danger btn-lg">削除します</button>
            </form>

            <a href="{{ route('user.index') }}" class="btn btn-dark btn-lg mt-4">戻る</a>

        </div>
    </header>
@endsection
