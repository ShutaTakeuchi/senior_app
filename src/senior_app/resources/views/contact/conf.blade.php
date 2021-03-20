{{-- タクシー手配予約確認 --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>タクシーの手配を予約しますか？</h2>
            <a href="{{ route('contact.comp.taxi') }}" class="btn btn-primary">手配を願います</a>
            <a href="{{ route('home') }}" class="btn btn-primary">いいえ、戻ります</a>
        </div>
    </div>
</div>
@endsection
