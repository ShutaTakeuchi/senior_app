{{-- admin ログイン後のページ --}}
@extends('layouts.app_admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="text-center">配達管理</h2>
            <a href="{{ route('admin.search.delivery') }}" type="button" class="btn btn-success btn-lg btn-block">食</a>
            <a href="{{ route('admin.search.item') }}" type="button" class="btn btn-primary btn-lg btn-block">日用品</a>
        </div>
    </div>
</div>
@endsection