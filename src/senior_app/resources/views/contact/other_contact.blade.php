{{-- その他連絡内容フォーム --}}
@extends('layouts.app')

@section('title', 'その他のれんらく / HOME-GOOD')

@section('content')
    <header class="masthead bg-primary text-white text-center" style="padding-top: 30px; height: 100%;">
        <div class="container d-flex align-items-center flex-column">
            <h2>その他連絡</h2>
            <br>

            <div class="text-body">
                <h6>スムーズなご案内をご提供させていただきたく、</h6>
                <h6>よろしければ、お問い合わせ内容をお聞かせください。</h6>
                <h6>なお、未入力の場合もご案内させて致します。</h6>
            </div>

            <br>

            <form action="{{ route('contact.other') }}" method="post">
                @csrf
                <div class="form-group">

                    {{-- エラーメッセージ --}}
                    <div class="text-danger">
                        @error('content')
                            {{ $message }}
                        @enderror
                    </div>

                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" cols="50" name="content"
                        placeholder="当サービスの使い方がわからない　〜について困っている　など"></textarea>
                </div>
                <button type="submit" class="btn btn-info btn-lg">送信する</button>
            </form>


            <br>

            <a href="{{ route('contact.index') }}" class="btn btn-dark btn-lg">戻る</a>
        </div>
    </header>
@endsection
