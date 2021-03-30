{{-- 訪問型会員登録のフォーム --}}
@extends('layouts.app')

@section('content')
<header class="masthead bg-primary text-white text-center" style="margin-top: -120px; height: 1200px;">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3>お客様のご自宅に訪問し、</h3>
            <h3>一緒に登録をさせていただきます。</h3>
            <br>
            <h3>お客様の情報を入力してください。</h3>
            <br>
            <div class="card bg-secondary">
                {{-- <div class="card-header">{{ __('会員登録') }}</div> --}}

                <div class="card-body">
                    <form method="POST" action="">
                        @csrf

                        {{-- name --}}
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('お名前') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="別府太郎">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- address --}}
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('住所') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus placeholder="別府市〜〜">

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- tel --}}
                        <div class="form-group row">
                            <label for="tel" class="col-md-4 col-form-label text-md-right">{{ __('電話番号') }}</label>

                            <div class="col-md-6">
                                <input id="tel" type="text" class="form-control @error('tel') is-invalid @enderror" name="tel" value="{{ old('tel') }}" required autocomplete="tel" autofocus placeholder="00011112222">

                                @error('tel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <br>
                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    {{ __('送信する') }}
                                </button>
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
