{{-- admin スタッフ新規登録 --}}
@extends('layouts.app_admin')

@section('content')
    <h2>スタッフ新規登録</h2>

    <form action="{{ route('admin.staff.store') }}" method="post" class="mt-4" style="width: 18rem;">
        @csrf

        <div class="form-group">
            <label for="name">名前</label>

            {{-- バリデーション --}}
            @error('name')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror

            <input type="text" class="form-control" id="name" name="name" placeholder="アドミン太郎" value="{{ old('name') }}">
        </div>

        <div class="form-group">
            <label for="email">メールアドレス</label>

            {{-- バリデーション --}}
            @error('email')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror

            <input type="email" class="form-control" id="email" name="email" placeholder="admin@admin.com" value="{{ old('email') }}">
        </div>

        <div class="form-group">
            <label for="password">パスワード</label>

            {{-- バリデーション --}}
            @error('password')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror

            <input type="password" class="form-control" name="password" id="password">
        </div>

        <div class="row mt-5">
            <div class="col-md-6">
                <a href="{{ route('admin.staff.index') }}" class="btn btn-dark">戻る</a>
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary">登録</button>
            </div>
        </div>

    </form>
@endsection
