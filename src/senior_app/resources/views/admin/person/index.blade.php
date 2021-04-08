{{-- admin お客様情報一覧 --}}
@extends('layouts.app_admin')

@section('content')
    <h2>お客様情報一覧</h2>
    <br>

    <h5>電話番号で検索する</h5>
    <!-- フラッシュメッセージ -->
    @if (session('flash_message'))
        <div class="flash_message text-danger">
            <strong>{{ session('flash_message') }}</strong>
        </div>
    @endif

    <form action="{{ route('admin.person.search') }}" method="post">
        @csrf
        <div class="form-group">
            <input type="test" name="tel" class="form-control" placeholder="00011112222" value="{{ old('tel') }}">
            <button type="submit" class="btn btn-warning" style="margin-top: 7px;">検索</button>
        </div>
        
    </form>

    <br>

    @if (isset($user))
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">お名前</th>
                    <th scope="col">メールアドレス</th>
                    <th scope="col">住所</th>
                    <th scope="col">電話番号</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-danger">
                    <th scope=>{{ $user['name'] }}</th>
                    <td>{{ $user['email'] }}</td>
                    <td>{{ $user['address'] }}</td>
                    <td>{{ $user['tel'] }}</td>
                    <td>
                        <form action="{{ route('admin.person.edit') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $user['id'] }}">
                            <input type="submit" class="btn btn-info" value="編集">
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>

    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">お名前</th>
                    <th scope="col">メールアドレス</th>
                    <th scope="col">住所</th>
                    <th scope="col">電話番号</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th scope=>{{ $user['name'] }}</th>
                        <td>{{ $user['email'] }}</td>
                        <td>{{ $user['address'] }}</td>
                        <td>{{ $user['tel'] }}</td>
                        <td>
                            <form action="{{ route('admin.person.edit') }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $user['id'] }}">
                                <input type="submit" class="btn btn-info" value="編集">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
