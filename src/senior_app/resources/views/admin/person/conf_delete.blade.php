{{-- admin アカウント削除確認画面 --}}
@extends('layouts.app_admin')

@section('content')

    <h2>お客様のアカウント削除の確認</h2>

    <h4 class="text-danger mt-5">本当にこちらのアカウントを削除しますか？</h4>

    <div class="card mt-4">
        <div class="card-body">
            <h4>{{ $user['name'] }}</h4>
            <h4 class="mt-3">{{ $user['email'] }}</h4>
            <h4 class="mt-3">{{ $user['address'] }}</h4>
            <h4 class="mt-3">{{ $user['tel'] }}</h4>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-mb-6 mx-5">
            <a href="{{ route('admin.person.show') }}" class="btn btn-dark">戻る</a>
        </div>

        <div class="col-mb-6 mx-5">
            <form action="{{ route('admin.person.delete') }}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ $user['id'] }}">
                <button type="submit" class="btn btn-danger">削除</button>
            </form>
        </div>
    </div>





@endsection
