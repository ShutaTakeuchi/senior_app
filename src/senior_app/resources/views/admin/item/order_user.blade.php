{{-- admin 注文中のお客様の一覧 --}}
@extends('layouts.app_admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">  
            <h2>注文中のお客様</h2>
          <table class="table">                                          
                <thead>
                  <tr>
                    <th scope="col">お名前</th>
                    <th scope="col">電話番号</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                @foreach ($order_users as $order_user)
                <tbody>
                  <tr>
                    <td>{{ $order_user['name'] }}</td>
                    <td><a href="/admin/item/show?user_tel={{ $order_user['tel'] }}">{{ $order_user['tel'] }}</a></td>
                  </tr>
                </tbody>
                @endforeach
              </table>
        </div>
    </div>
</div>
@endsection