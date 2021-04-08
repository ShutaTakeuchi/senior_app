{{-- admin ログイン後のページ --}}
@extends('layouts.app_admin')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            {{-- フラッシュメッセージ --}}
            @if (session('flash_message'))
                <div class="row">
                    <div class="flash_message">
                        <h2 class="text-danger">{{ session('flash_message') }}</h2>
                    </div>
                    <br>
                </div>
            @endif
        </div>

        <div class="row justify-content-center">

            {{-- ごはん --}}
            <div class="col-md-6">
                <div class="card text-center">
                    <div class="card-header">
                        ごはん
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                    <div class="card-footer text-muted">
                        2 days ago
                    </div>
                </div>
            </div>

            {{-- おかいもの --}}
            <div class="col-md-6">
                <div class="card text-center">
                    <div class="card-header">
                        おかいもの
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                    <div class="card-footer text-muted">
                        2 days ago
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
