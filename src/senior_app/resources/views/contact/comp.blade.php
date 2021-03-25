{{-- 緊急連絡 --}}
@extends('layouts.app')

@section('content')
<header class="masthead bg-primary text-white text-center" style="margin-top: -120px; height: 800px;">
    <div class="container d-flex align-items-center flex-column">
        <br>
        <br>
        <h2>{{ $message }}</h2>
        <br>
        <br>
        <a href="{{ route('home') }}" type="submit" class="btn btn-info btn-lg">戻る</a>
    </div>
  </header>
@endsection