{{-- 配食検索フォーム --}}
@extends('layouts.app')

@section('content')
<header class="masthead bg-primary text-white text-center" style="margin-top: -25px; height: 800px;">
  <div class="container d-flex align-items-center flex-column">
    <h2>いらっしゃいませ。</h2>
    <h2>ごはんをさがしてみましょう。</h2>
    <form action="{{ url('/delivery/result') }}" method="GET">
      {{-- @csrf --}}
        <div class="form-group">
          <label for="exampleInputEmail1"></label>
          <input type="text" class="form-control" id="exampleInputEmail1" name='food_name' placeholder="和食、そば、焼肉など">
        </div>
        <button type="submit" class="btn btn-info btn-lg btn-block">さがす</button>
      </form>
  </div>
</header>
@endsection


