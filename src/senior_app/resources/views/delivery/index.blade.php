{{-- 配食検索フォーム --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <p>食べたいものを探してみましょう</p>
            <form action="{{ url('/delivery/result') }}" method="GET">
              {{-- @csrf --}}
                <div class="form-group">
                  <label for="exampleInputEmail1"></label>
                  <input type="text" class="form-control" id="exampleInputEmail1" name='food_name' placeholder="お弁当、そば、焼肉など">
                </div>
                <button type="submit" class="btn btn-primary">さがす</button>
              </form>
        </div>
    </div>
</div>
@endsection
