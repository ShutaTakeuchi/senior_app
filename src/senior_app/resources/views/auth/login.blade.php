@extends('layouts.app')

@section('content')
    <header class="masthead bg-primary text-white text-center" style="margin-top: -120px; height: 1100px;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="text-center">

                        {{-- フラッシュメッセージ --}}
                        @if (session('message_1'))
                            <div class="flash_message">
                                <h5 class="text-center text-danger">{{ session('message_1') }}</h5>
                                <h5 class="text-center text-danger">{{ session('message_2') }}</h5>
                                <br>
                            </div>
                        @endif

                        <br>
                        <img src="images/icon/home_secondary.png">
                        <br>
                        <br>
                        <br>
                        <h1>あなたのご自宅に</h1>
                        <h1>さらなる希望を。</h1>
                        <br>
                        <br>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card bg-secondary">
                        {{-- <div class="card-header">{{ __('ログイン') }}</div> --}}
                        <br>
                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="email"
                                        class="col-md-4 col-form-label text-md-right">{{ __('メールアドレス') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-right">{{ __('パスワード') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <br>

                                {{-- <div class="form-group row">
                            <div class="col-md-6 offset-md-4"> --}}
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('ログインを保持する') }}
                                    </label>
                                </div>
                                {{-- </div>
                        </div> --}}

                                <br>
                                <div class="form-group row mb-0">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-lg">
                                            {{ __('ログイン') }}
                                        </button>
                                        <br>
                                        <br>
                                        <a class="btn btn-link" href="{{ route('register') }}"
                                            style="text-decoration: none;">
                                            {{ __('はじめての方はこちらへ') }}
                                        </a>
                                        <br>
                                        {{-- @if (Route::has('password.request')) --}}
                                        <a class="btn btn-link" href="{{ route('login.forget.form') }}"
                                            style="text-decoration: none;">
                                            {{ __('パスワードをお忘れの方はこちらへ') }}
                                        </a>
                                        {{-- @endif --}}
                                        <br>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </header>
@endsection
