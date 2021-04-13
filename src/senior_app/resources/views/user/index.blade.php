{{-- 個人情報 --}}
@extends('layouts.app')

@section('content')
    <header class="masthead bg-primary text-white text-center" style="padding-top: 30px; height: 100%;">
        <div class="container d-flex align-items-center flex-column">

            <!-- フラッシュメッセージ -->
            @if (session('flash_message'))
                <div class="flash_message text-danger">
                    <h3>{{ session('flash_message') }}</h3>
                </div>
                <br>
            @endif

            <h2>お客様情報</h2>
            <br>

            <table class="table table-bordered">
                <tr>
                    <td>お名前</td>
                    <th>{{ $user['name'] }}</th>
                </tr>
                <tr>
                    <td>メールアドレス</td>
                    <th>{{ $user['email'] }}</th>
                </tr>
                <tr>
                    <td>住所</td>
                    <th>{{ $user['address'] }}</th>
                </tr>
                <tr>
                    <td>電話番号</td>
                    <th>{{ $user['tel'] }}</th>
                </tr>
            </table>

            <br>

            <form action="{{ route('user.edit') }}" method="get">
                <input type="hidden" name="id" value="{{ $user['id'] }}">
                <input type="submit" value="変更したい" class="btn btn-info btn-lg">
            </form>

            <br>

            <a href="{{ route('home') }}" class="btn btn-dark btn-lg">戻る</a>

        </div>
    </header>
@endsection
