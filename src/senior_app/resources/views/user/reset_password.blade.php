{{-- 個人情報 --}}
@extends('layouts.app')

@section('title', 'パスワードの変更 / HOME-GOOD')

@section('content')
    <header class="masthead bg-primary text-white text-center" style="padding-top: 30px; height: 100%;">
        <div class="container d-flex align-items-center flex-column">
            <h2>パスワード変更</h2>

            <div class="mt-4 text-danger">
                <h5>ログイン時に必要になりますので</h5>
                <h5>パスワードは必ずお控えください。</h5>
            </div>

            <div class="mt-4 text-body">
                <h6>以下にご希望のパスワードを</h6>
                <h6>入力してください。</h6>
            </div>

            <div class="text-danger">
                @error('password')
                    {{ $message }}
                @enderror
            </div>

            <form action="{{ route('user.password.reset_comp') }}" method="post">
                @csrf
                <div class="form-group">
                    <input type="password" class="form-control" name="password" value="">
                </div>
                <input type="submit" value="決定する" class="btn btn-info btn-lg">
            </form>


            <a href="{{ route('user.index') }}" class="btn btn-dark btn-lg mt-4">戻る</a>

        </div>
    </header>
@endsection
