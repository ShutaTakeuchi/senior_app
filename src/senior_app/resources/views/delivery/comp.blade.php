{{-- 配食宅配注文完了ページ --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <p>ご注文を承りました。</p>
          <p>配達までしばらくおまちくださいませ。</p>
            <a href="{{ route('home') }}" type="submit" class="btn btn-primary">戻る</a>
        </div>
    </div>
</div>
@endsection
