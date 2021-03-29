{{-- キャンセル確認 --}}
@extends('layouts.app')

@section('content')
<header class="masthead bg-primary text-white text-center" style="margin-top: -120px; height: 800px;">
    <div class="container d-flex align-items-center flex-column">
        <br>
        <br>
        <h2>こちらの商品をキャンセルしますか？</h2>
        <br>
        <h2 class="text-danger">{{ $name }}</h2>
        <br>
        <form action="{{ route('contact.comp.cancel') }}" method="post">
            @csrf
            <input type="hidden" name="category" value="{{ $category }}">
            <input type="hidden" name="name" value="{{ $name }}">
            <input type="submit" value="キャンセルしたい" class="btn btn-info btn-lg">
        </form>
        <br>
        <a href="{{ route('contact.show.order') }}" class="btn btn-dark btn-lg">いいえ、戻る</a>
    </div>
  </header>
@endsection
