{{-- admin お客様パスワード変更画面 --}}
@extends('layouts.app_admin')

@section('content')
    <h2>お客様アカウントのパスワード変更フォーム</h2>

    <div class="mt-5 text-danger">
        <h5>お客様がパスワード忘れられた際の一時的な変更措置です。</h5>
        <h5>パスワード変更後、即座にお客様自身でパスワードの変更を</h5>
        <h5>お願い頂くよう、お願い申し上げます。</h5>
    </div>

    <form action="{{ route('admin.person.password_update') }}" method="post" style="width: 20rem;" class="mt-4">
        @csrf
        <div class="form-group">
            
            {{-- バリデーション --}}
            @error('password')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror

            <input type="password" class="form-control" name="password" placeholder="こちらに入力してください">
        </div>

        <input type="hidden" name="id" value="{{ $user['id'] }}">

        <button type="submit" class="btn btn-info">変更する</button>
    </form>

    <a href="{{ route('admin.person.show') }}" class="btn btn-dark mt-4">戻る</a>

@endsection
