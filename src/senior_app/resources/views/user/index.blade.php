{{-- 個人情報 --}}
@extends('layouts.app')

@section('content')
    <header class="masthead bg-primary text-white text-center" style="margin-top: -25px; height: 800px;">
        <div class="container d-flex align-items-center flex-column">
            <h2>個人情報</h2>
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

            <a href="{{ route('home') }}" class="btn btn-dark btn-lg">戻る</a>

        </div>
    </header>
@endsection
