{{-- admin 配達済み画面 --}}
@extends('layouts.app_admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>お疲れ様でした！</h2>
            <a href="{{ route('admin.home') }}">ホームへ戻る</a>
        </div>
    </div>
</div>
@endsection