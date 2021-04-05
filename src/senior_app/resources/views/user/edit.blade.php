{{-- admin お客様情報一覧 --}}
@extends('layouts.app')

@section('content')
<header class="masthead bg-primary text-white text-center" style="margin-top: -25px; height: 100%;">
    <div class="container d-flex align-items-center flex-column">
    <h2>お客様情報編集</h2>
    <br>
    <h5 class="text-danger">電話番号は変更できません</h5>

    <br>
    
    <form action="" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $user['id'] }}">
        <button type="submit" class="btn btn-warning">パスワードの変更はこちらへ</button>
    </form>

    <br>
    <br>

    <form action="" method="post">
        @csrf
        <div class="form-group">
            <label for="name">お名前</label>
            <input type="text" class="form-control" id="name" value="{{ $user['name'] }}" name="name">
        </div>

        <div class="form-group">
            <label for="email">メールアドレス</label>   
            <input type="email" class="form-control" id="email" value="{{ $user['email'] }}" name="email">
        </div>

        <div class="form-group">
            <label for="address">住所</label>
            <input type="text" class="form-control" id="address" value="{{ $user['address'] }}" name="address">
        </div>

        <br>
        
        <input type="hidden" name="id" value="{{ $user['id'] }}">

        <button type="submit" class="btn btn-info">変更する</button>
    </form>

    <br>

    <form action="" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $user['id'] }}">
        <button type="submit" class="btn btn-danger">退会したい</button>
    </form>

    <br>

    <a href="" class="btn btn-dark">戻る</a>


</div>
</header>
@endsection
