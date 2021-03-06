@extends('layouts.app')

@section('title', '新規登録 / HOME-GOOD')

@section('content')
    <header class="masthead bg-primary text-white text-center" style="padding-top: 30px; height: 100%;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h1>新しい暮らし、</h1>
                    <h1>始めましょう。</h1>
                    <div class="card bg-secondary mt-4">
                        {{-- <div class="card-header">{{ __('会員登録') }}</div> --}}

                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                {{-- name --}}
                                <div class="form-group row">
                                    <label for="name"
                                        class="col-md-4 col-form-label text-md-right">{{ __('お名前') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" required autocomplete="name" autofocus
                                            placeholder="別府太郎">

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- email --}}
                                <div class="form-group row">
                                    <label for="email"
                                        class="col-md-4 col-form-label text-md-right">{{ __('メールアドレス') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email"
                                            placeholder="beppu@onsen.com">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- address --}}
                                <div class="form-group row">
                                    <label for="address"
                                        class="col-md-4 col-form-label text-md-right">{{ __('住所') }}</label>

                                    <div class="col-md-6">
                                        <input id="address" type="text"
                                            class="form-control @error('address') is-invalid @enderror" name="address"
                                            value="{{ old('address') }}" required autocomplete="address" autofocus
                                            placeholder="別府市〜〜">

                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- tel --}}
                                <div class="form-group row">
                                    <label for="tel"
                                        class="col-md-4 col-form-label text-md-right">{{ __('電話番号') }}</label>

                                    <div class="col-md-6">
                                        <input id="tel" type="text" class="form-control @error('tel') is-invalid @enderror"
                                            name="tel" value="{{ old('tel') }}" required autocomplete="tel" autofocus
                                            placeholder="00011112222">

                                        @error('tel')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- password --}}
                                <div class="form-group row">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-right">{{ __('パスワード') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="new-password" placeholder="８文字以上でご記入ください。">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm"
                                        class="col-md-4 col-form-label text-md-right">{{ __('パスワード確認') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password"
                                            placeholder="もう一度入力してください。">
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-lg">
                                            {{ __('登録する') }}
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <div class="col-md-12 mt-5">
                                <a href="{{ route('welcome.index') }}" class="btn btn-danger btn-lg">
                                    {{ __('使い方が分からない') }}
                                </a>
                            </div>

                            <a href="{{ route('login') }}" class="btn btn-info mt-4">ログインへ戻る</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection
