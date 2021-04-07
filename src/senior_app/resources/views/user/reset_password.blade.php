{{-- 個人情報 --}}
@extends('layouts.app')

@section('content')
    <header class="masthead bg-primary text-white text-center" style="margin-top: -25px; height: 800px;">
        <div class="container d-flex align-items-center flex-column">
            <h2>パスワード変更</h2>
            <h5 class="text-danger">ログインの際に必要になりますので</h5>
            <h5 class="text-danger">必ずお控えください。</h5>
            <br>
            <br>

            <form action="{{ route('user.password.reset_comp') }}" method="post">
                @csrf
                <div class="form-group">
                    <input type="password" class="form-control" name="password">
                </div>
                <input type="submit" value="決定する" class="btn btn-info btn-lg">
            </form>

            <br>

            <a href="{{ route('user.index') }}" class="btn btn-dark btn-lg">戻る</a>

        </div>
    </header>
@endsection
