{{-- admin お客様情報一覧 --}}
@extends('layouts.app_admin')

@section('content')
    <h2>お客様情報一覧</h2>
    <h3>電話番号は変更できません。</h3>

    <form action="{{ route('admin.person.update') }}" method="post">
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
        
        <input type="hidden" name="id" value="{{ $user['id'] }}">

        <button type="submit" class="btn btn-info">変更する</button>
    </form>
@endsection
