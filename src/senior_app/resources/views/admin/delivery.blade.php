{{-- admin 配食注文検索 --}}
@extends('layouts.app_admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>ご注文検索</h2>
            <p>お客様のお名前を入力してください</p>
            <form action="{{ route('admin.show.delivery') }}" method="get">
                <input type="text" name="user_name">
                <input type="submit" value="検索">
            </form>
        </div>
    </div>
</div>
@endsection