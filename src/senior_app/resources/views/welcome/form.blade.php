{{-- 訪問型会員登録のフォーム --}}
@extends('layouts.app')

@section('title', 'お客様情報入力 / HOME-GOOD')

@section('content')
    <header class="masthead bg-primary text-white text-center" style="padding-top: 30px; height: 100%;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h2>ご自宅で会員登録</h2>

                    <br>

                    <div class="text-body">
                        <h5>お客様のご自宅に訪問し、<br>ご一緒に登録をさせていただきます。</h5>
                    </div>

                    <br>

                    <div class="text-danger">
                        <h5>後ほどお電話をさせていたき、<br>ご希望の日時をお聞き致します。</h5>
                    </div>

                    <br>

                    <h6 text-body>当日のご案内の所要時間は約１時間です。</h6>

                    <br>

                    <h5 class="text-body">お客様の情報を入力してください。</h5>

                    <br>

                    <form action="{{ route('welcome.form.comp') }}" method="post" class="mx-auto" style="width: 100%;">
                        @csrf
                        <div class="form-group">
                            <label for="name">お名前</label>

                            {{-- 未入力エラー --}}
                            <div class="text-danger">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </div>

                            <input type="text" class="form-control" id="name" name="name" placeholder="別府太郎">
                        </div>
                        <div class="form-group">
                            <label for="address">住所</label>

                            {{-- 未入力エラー --}}
                            <div class="text-danger">
                                @error('address')
                                    {{ $message }}
                                @enderror
                            </div>

                            <input type="text" class="form-control" id="address" name="address" placeholder="別府市◯◯">
                        </div>
                        <div class="form-group">
                            <label for="tel">電話番号(ハイフン無し)</label>

                            {{-- 未入力エラー --}}
                            <div class="text-danger">
                                @error('tel')
                                    {{ $message }}
                                @enderror
                            </div>

                            <input type="text" class="form-control" id="tel" name="tel" placeholder="00011112222">
                        </div>

                        <br>

                        <button type="submit" class="btn btn-info btn-lg">送信する</button>
                    </form>

                    <br>

                    <a href="{{ route('welcome.index') }}" class="btn btn-dark btn-lg">戻る</a>

                </div>
            </div>
        </div>
    </header>
@endsection
