{{-- 日用品検索フォーム --}}
@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <p>いらっしゃいませ</p>
          <p>必要な日用品を探してみましょう</p>
            <form action="{{ url('/item/show') }}" method="GET">
                <div class="form-group">
                  <label for="exampleInputEmail1"></label>
                  <input type="text" class="form-control" id="exampleInputEmail1" name='item_keyword' placeholder="水、ティッシュ、服など">
                </div>
                <button type="submit" class="btn btn-primary btn-lg btn-block">さがす</button>
              </form>
        </div>
    </div>
</div> --}}
<header class="masthead bg-primary text-white text-center" style="padding-top: 50px; height: 100%; min-height: 550px;">
  <div class="container d-flex align-items-center flex-column">
    <h2>いらっしゃいませ。</h2>
    <h2>日用品をさがしてみましょう。</h2>
    <form action="{{ url('/item/show') }}" method="GET">
      {{-- @csrf --}}
        <div class="form-group">
          <label for="exampleInputEmail1"></label>
          <input type="text" class="form-control" id="exampleInputEmail1" name='item_keyword' placeholder="水、ティッシュなど">
        </div>
        <button type="submit" class="btn btn-info btn-lg btn-block">さがす</button>
      </form>

      <br>

      <a href="{{ route('home') }}" class="btn btn-dark btn-lg">戻る</a>
  </div>
</header>
@endsection

