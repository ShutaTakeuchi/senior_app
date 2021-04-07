{{-- 訪問型会員登録のフォーム --}}
@extends('layouts.app')

@section('content')
    <header class="masthead bg-primary text-white text-center" style="margin-top: -120px; height: 1200px;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h3>お客様の情報を</h3>
                    <h3>入力してください。</h3>
                    <br>
                    <h3>ご連絡させていただきます。</h3>
                    <br>
                    <br>

                    <form action="{{ route('login.forget.comp') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">お名前</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="別府太郎">
                        </div>
                        <div class="form-group">
                            <label for="tel">電話番号</label>
                            <input type="text" class="form-control" id="tel" name="tel" placeholder="00011112222">
                        </div>
                        <button type="submit" class="btn btn-info">送信する</button>
                    </form>

                </div>
            </div>
        </div>
    </header>
@endsection