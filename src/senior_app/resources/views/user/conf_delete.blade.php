{{-- admin アカウント削除確認画面 --}}
@extends('layouts.app')

@section('content')
    <header class="masthead bg-primary text-white text-center" style="margin-top: -50px; height: 900px;">
        <div class="container d-flex align-items-center flex-column">

            <h2>お客様のアカウント削除の確認画面</h2>
            <br>
            <br>
            <h3 class="text-danger">本当にアカウントを削除しますか？</h3>
            <br>
            <br>

            <form action="{{ route('user.delete') }}" method="get">
                <button type="submit" class="btn btn-danger">削除します</button>
            </form>

            <br>

            <a href="{{ route('user.index') }}" class="btn btn-dark">戻る</a>


        </div>
    </header>
@endsection
