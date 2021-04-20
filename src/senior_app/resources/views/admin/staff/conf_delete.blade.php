{{-- admin スタッフ削除確認画面 --}}
@extends('layouts.app_admin')

@section('content')
    <h2>スタッフアカウント削除の確認画面</h2>

    <h4 class="text-danger mt-5">こちらのアカウントを削除しますか？</h4>

    <h6 class="text-danger mt-3">担当する業務が終了していることをご確認ください。</h6>


    <div class="card mt-4">
        <div class="card-body">
            <h4>{{ $staff['name'] }}</h4>
            <br>
            <h4>{{ $staff['email'] }}</h4>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-6 mb-3">
            <a href="{{ route('admin.staff.index') }}" class="btn btn-dark">戻る</a>
        </div>
        <div class="col-md-6">
            <form action="{{ route('admin.delete.comp') }}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ $staff['id'] }}">
                <button type="submit" class="btn btn-danger">削除</button>
            </form>
        
        </div>
    </div>
@endsection
