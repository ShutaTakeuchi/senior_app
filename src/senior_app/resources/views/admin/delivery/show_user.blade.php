{{-- admin 配食注文検索結果 --}}
@extends('layouts.app_admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">      
          <h2>食</h2>                                      
            <h2>{{ $user_data['name'] }} 様</h2>
            <h2>{{ $user_data['address'] }}</h2>
            <h2>{{ $user_data['tel'] }}</h2>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">店舗名</th>
                    <th scope="col">注文時間</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                @foreach ($orders as $order)
                <tbody>
                  <tr>
                    <td>{{ $order['shop_name'] }}</td>
                    <td>{{ $order['created_at'] }}</td>
                    {{-- <td><a href="/admin/delivery/delete?id={{ $order['id'] }}&user_name={{ $user_data['name'] }}&shop_name={{ $order['shop_name'] }}">配達済み</a></td> --}}
                    <td>
                    <form action="{{ route('admin.delivery.delete') }}" method="post">
                      @csrf
                      <div class="form-group">
                        <input type="hidden" name="id" value="{{ $order['id'] }}">
                        <input type="hidden" name="user_name" value="{{ $user_data['name'] }}">
                        <input type="hidden" name="shop_name" value="{{ $order['shop_name'] }}">
                        <input type="submit" class="btn btn-info" value="配達済み"></button>
                      </div>
                    </td>
                    </form>

                  </tr>
                </tbody>
                @endforeach
              </table>
        </div>
    </div>
</div>
@endsection