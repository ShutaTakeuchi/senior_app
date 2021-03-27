{{-- admin 配食注文検索 --}}
@extends('layouts.app_admin')

@section('content')
            <h2>ごはん</h2>
            <h2>ご注文検索</h2>
            <h5>お客様の電話番号を入力してください。</h5>
            <h5>（ハイフン無し）</h5>

            <form action="{{ route('admin.delivery.show') }}" method="post">
                @csrf
                <div class="form-group">
                  <input type="test" name="user_tel" class="form-control" placeholder="00011112222">
                  <br>
                  <button type="submit" class="btn btn-info">検索</button>
                </div>
              </form>
              <a class="btn btn-info" href="{{ route('admin.delivery.show_all') }}">全て</a>
@endsection