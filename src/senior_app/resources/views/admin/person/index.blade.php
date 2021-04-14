{{-- admin お客様情報一覧 --}}
@extends('layouts.app_admin')

@section('content')

    <h2>お客様情報一覧</h2>

    <h6 class="text-muted mt-3">電話番号（ハイフン無し）で検索</h6>

    <form action="{{ route('admin.person.search') }}" method="post">
        @csrf
        <div class="form-group" style="display:inline-flex">
            <input type="test" name="tel" class="form-control" value="{{ old('tel') }}" placeholder="00011112222">
            <button type="submit" class="btn btn-dark">検索</button>
        </div>

    </form>

    <!-- フラッシュメッセージ -->
    @if (session('flash_message'))
        <div class="flash_message text-danger">
            <h5>{{ session('flash_message') }}</h5>
        </div>
    @endif


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
                    <td nowrap>{{ $user['name'] }}</td>
                    <td nowrap>{{ $user['email'] }}</td>
                    <td nowrap>{{ $user['address'] }}</td>
                    <td nowrap>{{ $user['tel'] }}</td>
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
                        <td nowrap>{{ $user['name'] }}</td>
                        <td nowrap>{{ $user['email'] }}</td>
                        <td nowrap>{{ $user['address'] }}</td>
                        <td nowrap>{{ $user['tel'] }}</td>
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
