{{-- タクシー手配予約確認 --}}
@extends('layouts.app')

@section('title', 'タクシー予約のれんらく / HOME-GOOD')

@section('content')
    <header class="masthead bg-primary text-white text-center" style="padding-top: 50px; height: 100%;">
        <div class="container d-flex align-items-center flex-column">
            <h2>タクシー予約</h2>
            <br>

            <div class="text-body">
                <h5>こちらは当社オリジナルの<br>送迎サービスです。</h5>
                <br>
                <h5>予約後、営業所より</h5>
                <h5>ご連絡をさせていただきます。</h5>
            </div>

            <br>
            <h5 class="text-danger">混み具合により、ご希望の時間に</h5>
            <h5 class="text-danger">予約できない可能性があります。</h5>
            <br>
            <h5>お迎え先を以下よりお選びください。</h5>
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
            <a href="{{ route('contact.index') }}" class="btn btn-dark btn-lg">戻る</a>
        </div>
    </header>
@endsection
