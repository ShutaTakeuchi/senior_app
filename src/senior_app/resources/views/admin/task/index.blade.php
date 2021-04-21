{{-- admin 配達　トップ画面 --}}
@extends('layouts.app_admin')

@section('content')

    <!-- フラッシュメッセージ -->
    @if (session('flash_message'))
        <div class="flash_message text-danger mb-4">
            <h2>{{ session('flash_message') }}</h2>
        </div>
    @endif

    <h2>{{ Auth::user()['name'] }}さん</h2>
    <h2>お疲れ様です</h2>

    <div style="width: 100%; max-width: 25rem;">
        <a href="{{ route('admin.task.delivery.show') }}" class="btn btn-lg btn-block my-4 py-4 btn-info" style="font-size: 2rem;">ごはん</a>
        <a href="{{ route('admin.task.item.show') }}" class="btn btn-lg btn-block my-4 py-4 btn-info" style="font-size: 2rem;">おかいもの</a>
        <a href="{{ route('admin.task.taxi') }}" class="btn btn-lg btn-block my-4 py-4 btn-info" style="font-size: 2rem;">タクシー</a>
    </div>

@endsection
