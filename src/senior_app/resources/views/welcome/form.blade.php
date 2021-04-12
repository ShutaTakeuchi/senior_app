{{-- 訪問型会員登録のフォーム --}}
@extends('layouts.app')

@section('content')
    <header class="masthead bg-primary text-white text-center" style="margin-top: -120px; height: 1200px;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h2>ご自宅で会員登録</h2>

                    <br>

                    <div class="text-body">
                        <h5>お客様のご自宅に訪問し、</h5>
                        <h5>ご一緒に登録をさせていただきます。</h5>
                    </div>

                    <br>

                    <div class="text-danger">
                        <h5>後ほど、お電話をかけさせていたき、</h5>
                        <h5>ご希望の日時をお聞き致します。</h5>
                    </div>

                    <br>

                    <h6 text-body>当日のご案内の所要時間は約１時間です。</h6>

                    <br>

                    <h5 class="text-body">お客様の情報を入力してください。</h5>

                    <br>

                    <form action="{{ route('welcome.form.conf') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">お名前</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="別府太郎">
                        </div>
                        <div class="form-group">
                            <label for="address">住所</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="別府市◯◯">
                        </div>
                        <div class="form-group">
                            <label for="tel">電話番号(ハイフン無し)</label>
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
