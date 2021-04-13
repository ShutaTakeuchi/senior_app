{{-- 配食検索フォーム --}}
@extends('layouts.app')

@section('content')
    <header class="bg-primary text-white text-center" style="padding-top: 60px; height: 800px;">
        <div class="container d-flex align-items-center flex-column">

            <div>
                <h2>いらっしゃいませ。</h2>
                <h2>ごはんをさがしてみましょう。</h2>
            </div>

            <form action="{{ url('/delivery/result') }}" method="GET">
                <div class="form-group">
                    <label for="exampleInputEmail1"></label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name='food_name'
                        placeholder="和食、そば、焼肉など">
                </div>
                <button type="submit" class="btn btn-info btn-lg btn-block">さがす</button>
            </form>

            <br>

            <a href="{{ route('home') }}" class="btn btn-dark btn-lg">戻る</a>
            
        </div>
    </header>
@endsection
