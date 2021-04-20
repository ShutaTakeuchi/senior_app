{{-- 個人情報変更申請の確認 --}}
@extends('layouts.app')

@section('title', '個人情報変更の連絡 / HOME-GOOD')

@section('content')
<header class="masthead bg-primary text-white text-center" style="margin-top: -120px; height: 800px;">
    <div class="container d-flex align-items-center flex-column">
        <br>
        <br>
        <h2>今の個人情報を変更しますか？</h2>
        <br>
        <br>
        <a href="{{ route('contact.comp.edit') }}"  class="btn btn-info btn-lg">変更します</a>
        <br>
        <a href="{{ route('home') }}" class="btn btn-dark btn-lg">戻る</a>
    </div>
  </header>
@endsection
