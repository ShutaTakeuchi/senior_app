@extends('layouts.app')

@section('title', 'ログイン / HOME-GOOD')

@section('content')
    <header class="masthead bg-primary text-white text-center" style="margin-top: -120px; height: 100%;">
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
                                        {{-- <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus> --}}

                                            {{-- 入力済み --}}
                                            <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="test@test.com" required autocomplete="email" autofocus>

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
                                            required autocomplete="current-password" value="password123">

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

            <hr style="border-top: 2px dashed #2c3e50" class="my-5">

            {{-- home-goodとは --}}
            <div class="row text-center justify-content-center">
                <h2>HOME-GOODとは？</h2>
            </div>


            <div class="row text-center justify-content-center my-4">
                <h4 class="text-secondary">お客様の大切なご自宅の生活を<br class="br-sp">サポートするサービスです。</h4>
            </div>


            <div class="row text-center justify-content-center my-4">
                <h4 class="text-secondary">お客様の生活に必要なものを<br class="br-sp">ご自宅へお届けします。</h4>
            </div>

            <div class="row text-center justify-content-center my-4">
                <h4 class="text-secondary">毎日24時間お客様とつながり、<br class="br-sp">「あんしん」を提供します。</h4>
            </div>

            <div class="row text-center justify-content-center my-4">
                <h4 class="text-secondary">難しい操作は全てなくし、<br class="br-sp">使いやすさを大切にします。</h4>
            </div>

            <div class="row text-center justify-content-center my-5">
                <a href="{{ route('register') }}" class="btn btn-info btn-lg" style="width: 60%;">いますぐはじめる</a>
            </div>

            <div class="row text-center justify-content-center mt-5">
                <h3>ご自宅の生活で<br class="br-sp">このような悩みや不安<br class="br-sp">はありませんか？</h3>
            </div>

            {{-- 悩みや不安 --}}
            <div class="row justify-content-center mx-auto">
                <div class="col-md-4 mx-auto">
                    <div class="card border-secondary text-secondary mt-3">
                        <div class="card-body">
                            <h5 class="card-text">毎日の料理が<br>大変でできない...</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mx-auto">
                    <div class="card border-secondary text-secondary mt-3">
                        <div class="card-body">
                            <h5 class="card-text">レストランに行きたいけど<br>外出はちょっと...</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mx-auto">
                    <div class="card border-secondary text-secondary mt-3">
                        <div class="card-body">
                            <h5 class="card-text">買い物したいけど<br>外出はちょっと...</h5>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center mx-auto">
                <div class="col-md-4 mx-auto">
                    <div class="card border-secondary text-secondary mt-3">
                        <div class="card-body">
                            <h5 class="card-text">外出をしたいけど<br>車の運転ができない...</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mx-auto">
                    <div class="card border-secondary text-secondary mt-3">
                        <div class="card-body">
                            <h5 class="card-text">オンラインショッピングの<br>使い方が分からない...</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mx-auto">
                    <div class="card border-secondary text-secondary mt-3">
                        <div class="card-body">
                            <h5 class="card-text">1人の時に体調が悪く<br>なったらどうしよう...</h5>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row text-center justify-content-center mt-3">
                <i class="fas fa-arrow-down text-secondary" style="font-size: 60px;"></i>
            </div>

            <div class="row text-center justify-content-center mt-3">
                <h3 class="text-secondary">HOME-GOODが<br class="br-sp">全て解決します！</h3>
            </div>

            {{-- <div class="row text-center justify-content-center my-4">
                <a href="{{ route('register') }}" class="btn btn-info btn-lg" style="width: 60%;">いますぐはじめる</a>
            </div> --}}

            <hr style="border-top: 2px dashed #2c3e50" class="my-5">

            <div class="row text-center justify-content-center mb-4">
                <h2>HOME-GOOD<br class="br-sp">でできること</h2>
            </div>

            <div class="row justify-content-center mx-auto">
                <div class="col-md-4 mx-auto">
                    <div class="card h-100 border-light">
                        <img class="img-fluid" src="images/button/food.png" alt="" />
                        <div class="card-body text-secondary">
                            <h1 class="card-title">ごはん</h1>
                            <h5 class="card-text text-muted mb-4">配食サービス</h5>
                            <h6 class="card-text">大分県別府市内における飲食店のデリバリーサービスです。</h6>
                            <h6 class="card-text">食べたいものを検索して、好きな飲食店を選び注文するだけ！</h6>
                            <h6 class="card-text">各店舗の弊社専用のテイクアウトメニューのみのご提供とさせていただいております。</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mx-auto">
                    <div class="card h-100 border-light">
                        <img class="img-fluid" src="images/button/cart.png" alt="" />
                        <div class="card-body text-secondary">
                            <h1 class="card-title">おかいもの</h1>
                            <h5 class="card-text text-muted mb-4">オンラインショッピング</h5>
                            <h6 class="card-text">難しい操作を一切省いた通販サービスです。</h6>
                            <h6 class="card-text">服や本、趣味グッズ、食材、生活に必要な日用品など衣食住問わず、検索して欲しいものを選び注文するだけ！</h6>
                            <h6 class="card-text">通常の通販サイトに比べ、配達までに多少のお時間を頂く可能性がございます。</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mx-auto">
                    <div class="card h-100 border-light">
                        <img class="img-fluid" src="images/button/telephone.png" alt="" />
                        <div class="card-body text-secondary">
                            <h1 class="card-title">れんらく</h1>
                            <h5 class="card-text text-muted mb-4">営業所への連絡</h5>
                            <h6 class="card-text">緊急、救急時などにボタン一つで営業所へ連絡することができます。</h6>
                            <h6 class="card-text">また弊社オリジナルのタクシーサービスを行っており、簡単な操作でタクシーを手配することができます！</h6>
                            <h6 class="card-text">各種れんらくは、お客様が送信されたのちに営業所から電話をかけさせていただきます。</h6>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row text-center justify-content-center mt-5">
                <h3 class="text-secondary">これらすべて簡単な<br class="br-sp">操作でできます！！</h3>
            </div>

            <div class="row text-center justify-content-center my-5">
                <a href="{{ route('register') }}" class="btn btn-info btn-lg" style="width: 60%;">いますぐはじめる</a>
            </div>

            <hr style="border-top: 2px dashed #2c3e50" class="my-5">

            <div class="row text-center justify-content-center mb-4">
                <h2>HOME-GOODの<br class="br-sp">あんしんサポート</h2>
            </div>

            <div class="row justify-content-center mx-auto">
                <div class="col-md-6 mx-auto">
                    <div class="card h-100 border-light">
                        <div class="card-body text-secondary">
                            <h4 class="card-title text-danger">一緒に会員登録</h4>
                            <h6 class="card-text">スタッフと一緒にお客様の会員登録を行い、あんしんして登録を進めることができます。</h6>
                            <h6 class="card-text">当サービスを利用するにあたって、会員登録を行う必要があります。配達サービスやタクシーサービスを利用する際に迅速な対応を目指し、お客様の情報をあらかじめ登録していただきます。</h6>
                            <h6 class="card-text">営業所へお越しいただき登録を行う方法と、スタッフがお客様のご自宅に訪問させていただいてご自宅で登録を行う方法があります。</h6>
                            <h6 class="card-text">お客様のご都合に合わせてお選びいただけます。</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mx-auto">
                    <div class="card h-100 border-light">
                        <div class="card-body text-secondary">
                            <h4 class="card-title text-danger">24時間つながる</h4>
                            <h6 class="card-text">HOME-GOODの「れんらく」はタクシーサービスを除いて、毎日24時間ご利用いただけます。</h6>
                            <h6 class="card-text">緊急、救急時や生活に関すること、当サービスの使い方がわからないなどの問題が生じた際はいつでもご連絡いただけます。</h6>
                            <h6 class="card-text">またスタッフのご自宅のかけつけが必要な緊急、救急時の際は迅速な対応をさせていただきます。</h6>
                            <h6 class="card-text">タクシーサービスを除いた各種れんらくは無料で対応させていただきます。</h6>
                            <h6 class="card-text">HOME-GOODはいつでもお客様のそばで見守ります。</h6>
                        </div>
                    </div>
                </div>
            </div>

            <hr style="border-top: 2px dashed #2c3e50" class="my-5">

            <div class="row text-center justify-content-center mb-4">
                <h4>ご質問がありました際は、<br class="br-sp">電話もしくは営業所にて<br class="br-sp">対応させていただきます。</h4>
            </div>

            <div class="row text-center justify-content-center mb-4">
                <h4>お気軽にお問い合わせください。</h4>
            </div>

            <div class="row text-center justify-content-center mb-4 text-secondary">
                <div class="col-md-6 my-3">
                    <h3 class="text-danger">電話</h3>
                    <h5>TEL 000-1111-2222</h5>
                    <h5>24時間対応</h5>
                </div>
                <div class="col-md-6 my-3">
                    <h3 class="text-danger">営業所</h3>
                    <h5>〒874-0000</h5>
                    <h5>大分県別府市◯◯◯</h5>
                    <h5>9:00〜17:00</h5>
                </div>
            </div>

            <hr style="border-top: 2px dashed #2c3e50" class="mt-5">

            <div class="row text-center justify-content-center text-secondary mt-5">
                <h6>大切なご自宅で<br class="br-sp">大切な時間を<br class="br-sp">過ごすことが<br class="br-sp">HOME-GOODの<br class="br-sp">願いです。</h6>
            </div>

        </div>
    </header>
@endsection
