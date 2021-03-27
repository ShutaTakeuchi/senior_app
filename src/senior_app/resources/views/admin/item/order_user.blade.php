{{-- admin 注文中のお客様の一覧 --}}
@extends('layouts.app_admin')

@section('content')
            <h2>おかいもの</h2>
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
                    <td>
                      <form action="{{ route('admin.item.show') }}" method="post">
                        @csrf
                        <div class="form-group">
                          <input type="hidden" name="user_tel" value="{{ $order_user['tel'] }}">
                          <input type="submit" class="btn btn-info" value="{{ $order_user['tel'] }}"></button>
                        </div>
                      </form>
                    </td>
                  </tr>
                </tbody>
                @endforeach
              </table>
@endsection

