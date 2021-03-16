{{-- 健康状態入力フォーム --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>本日の体調を教えてください。</h2>
            <form action="" method="post">
                @csrf
                {{-- <div class="form-group">
                  <label for="exampleFormControlInput1">Email address</label>
                  <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                </div> --}}
                <div class="form-group">
                  <label for="exampleFormControlSelect1">体温</label>
                  <select class="form-control" id="exampleFormControlSelect1" name="integer_temperature">
                    <option value="34">34</option>
                    <option value="35">35</option>
                    <option value="36">36</option>
                    <option value="37">37</option>
                    <option value="38">38</option>
                    <option value="39">39</option>
                    <option value="40">40</option>
                    <option value="41">41</option>
                  </select>度

                  <select class="form-control" id="exampleFormControlSelect1" name="decimal_temperature">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option valud="9">9</option>
                  </select>分
                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect1">今日の体調を教えてください</label>
                  <select class="form-control" id="exampleFormControlSelect1" name="condtion">
                    <option value="元気です">元気です</option>
                    <option value="体調がすぐれません">体調がすぐれません</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlTextarea1">体調の状態をよろしければ詳しく教えてください。</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="頭痛がする　体がだるい　特に無し　など" name="detail_condition"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">送る</button>
              </form>
        </div>
    </div>
</div>
@endsection
