{{-- 緊急連絡 --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <p>{{ $message }}</p>
        </div>
    </div>
</div>
@endsection
