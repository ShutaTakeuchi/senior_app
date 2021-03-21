{{-- admin 配食注文検索 --}}
@extends('layouts.app_admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>食</h2>
            <h2>ご注文検索</h2>
            <p>お客様の電話番号を入力してください（ハイフン無し）</p>
            <form action="{{ route('admin.delivery.show') }}" method="get">
                <input type="text" name="user_tel">
                <input type="submit" value="検索">
            </form>
            <a href="{{ route('admin.delivery.show_all') }}">全て</a>
        </div>
    </div>
</div>
@endsection