{{-- admin お客様情報一覧 --}}
@extends('layouts.app')

@section('content')
    <header class="masthead bg-primary text-white text-center" style="padding-top: 30px; height: 100%;">
        <div class="container d-flex align-items-center flex-column">
            <h2>お客様情報変更</h2>
            <br>
            <h5 class="text-danger">電話番号は変更できません</h5>

            <br>

            <form action="{{ route('user.password.reset_form') }}" method="get">
                <button type="submit" class="btn btn-warning btn-lg">パスワードの変更はこちらへ</button>
            </form>

            <br>
            <br>

            <form action="{{ route('user.update') }}" method="post" style="width: 25rem;">
                @csrf
                <div class="form-group">
                    <label for="name">お名前</label>

                    {{-- 未入力エラー --}}
                    <div class="text-danger">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </div>

                    <input type="text" class="form-control" id="name" value="{{ $user['name'] }}" name="name">
                </div>

                <div class="form-group">
                    <label for="email">メールアドレス</label>

                    {{-- 未入力エラー --}}
                    <div class="text-danger">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </div>
                    
                    <input type="email" class="form-control" id="email" value="{{ $user['email'] }}" name="email">
                </div>

                <div class="form-group">
                    <label for="address">住所</label>

                    {{-- 未入力エラー --}}
                    <div class="text-danger">
                        @error('address')
                            {{ $message }}
                        @enderror
                    </div>

                    <input type="text" class="form-control" id="address" value="{{ $user['address'] }}" name="address">
                </div>

                <br>

                <input type="hidden" name="id" value="{{ $user['id'] }}">

                <button type="submit" class="btn btn-info btn-lg">変更する</button>
            </form>

            <br>

            <a href="{{ route('user.index') }}" class="btn btn-dark btn-lg">戻る</a>

            <br>

            <form action="{{ route('user.delete.conf') }}" method="get">
                <button type="submit" class="btn btn-danger btn-lg">退会したい方はこちらへ</button>
            </form>


        </div>
    </header>
@endsection
