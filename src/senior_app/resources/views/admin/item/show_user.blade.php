{{-- admin 配食注文検索結果 --}}
@extends('layouts.app_admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">                                            
            <h2>{{ $user_data['name'] }} 様</h2>
            <h2>{{ $user_data['address'] }}</h2>
            <h2>{{ $user_data['tel'] }}</h2>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">商品名</th>
                    <th scope="col">注文時間</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                @foreach ($orders as $order)
                <tbody>
                  <tr>
                    <td>{{ $order['item_name'] }}</td>
                    <td>{{ $order['created_at'] }}</td>
                    <td><a href="/admin/item/delete?id={{ $order['id'] }}&user_name={{ $user_data['name'] }}&item_name={{ $order['item_name'] }}">配達済み</a></td>
                  </tr>
                </tbody>
                @endforeach
              </table>
        </div>
    </div>
</div>
@endsection