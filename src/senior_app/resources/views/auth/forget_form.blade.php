{{-- 訪問型会員登録のフォーム --}}
@extends('layouts.app')

@section('title', 'パスワード変更手続き / HOME-GOOD')

@section('content')
    <header class="masthead bg-primary text-white text-center" style="padding-top: 30px; height: 100%;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    
                    <h2>パスワード変更手続き</h2>

                    <div class="text-danger mt-5">
                        <h5>パスワードお忘れの場合、</h5>
                        <h5>再度、パスワードを設定</h5>
                        <h5>し直す必要がございます。</h5>
                    </div>

                    <div class="text-body mt-4">
                        <h5>送信後、こちらから</h5>
                        <h5>ご連絡させて頂きます。</h5>
                    </div>

                    <div class="text-body mt-5">
                        <h6>以下の入力フォームにご記入ください。</h6>
                    </div>

                    <form action="{{ route('login.forget.comp') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">お名前</label>

                            {{-- エラーメッセージ --}}
                            <div class="text-danger">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </div>

                            <input type="text" class="form-control" id="name" name="name" placeholder="別府太郎">
                        </div>
                        <div class="form-group">
                            <label for="tel">電話番号(ハイフン無し)</label>

                            {{-- エラーメッセージ --}}
                            <div class="text-danger">
                                @error('tel')
                                    {{ $message }}
                                @enderror
                            </div>

                            <input type="text" class="form-control" id="tel" name="tel" placeholder="00011112222">
                        </div>

                        <button type="submit" class="btn btn-info btn-lg">送信する</button>
                    </form>

                    <a href="{{ route('login') }}" class="btn btn-dark btn-lg mt-4">戻る</a>

                </div>
            </div>
        </div>
    </header>
@endsection
