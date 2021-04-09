{{-- タクシー手配予約確認 --}}
@extends('layouts.app')

@section('content')
    <header class="masthead bg-primary text-white text-center" style="margin-top: -120px; height: 800px;">
        <div class="container d-flex align-items-center flex-column">
            <br>
            <br>
            <h2>タクシーの予約</h2>
            <br>
            <h4>これは当社オリジナルの送迎サービスです。</h4>
            <h4>予約後、こちらからご連絡させていただきます。</h4>
            <br>
            <h5 class="text-danger">混み具合により、ご希望の時間に予約できない可能性があります。</h5>
            <br>
            <br>
            {{-- 家から --}}
            <form action="{{ route('contact.comp.taxi') }}" method="post">
                @csrf
                <input type="hidden" name="place" value="1">
                <input class="btn btn-info btn-lg" type="submit" value="自宅から乗る">
            </form>
            <br>
            {{-- 他の場所から --}}
            <form action="{{ route('contact.comp.taxi') }}" method="post">
                @csrf
                <input type="hidden" name="place" value="2">
                <input class="btn btn-info btn-lg" type="submit" value="他の場所から予約する">
            </form>
            <br>
            <a href="{{ route('home') }}" class="btn btn-dark btn-lg">戻る</a>
        </div>
    </header>
@endsection
