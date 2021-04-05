{{-- admin スタッフ削除確認画面 --}}
@extends('layouts.app_admin')

@section('content')
    <h2>スタッフアカウント削除の確認画面</h2>
    <br>
    <br>
    <h3 class="text-danger">本当にこちらのアカウントを削除しますか？</h3>
    <br>
    <h5 class="text-danger">担当する業務が終了していることをご確認ください。</h5>
    <br>

    <div class="card">
        <div class="card-body">
            <h4>{{ $staff['name'] }}</h4>
            <br>
            <h4>{{ $staff['email'] }}</h4>
        </div>
      </div>
    <br>
    <br>

    <form action="{{ route('admin.delete.comp') }}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $staff['id'] }}">
        <button type="submit" class="btn btn-danger">削除します</button>
    </form>

    <br>

    <a href="{{ route('admin.staff.index') }}" class="btn btn-dark">戻る</a>
@endsection

