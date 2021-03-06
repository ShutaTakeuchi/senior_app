{{-- admin お客様情報一覧 --}}
@extends('layouts.app_admin')

@section('content')

    <h2>お客様情報一覧</h2>

    <h6 class="text-muted mt-3">電話番号（ハイフン無し）で検索</h6>

    <form action="{{ route('admin.person.search') }}" method="get">
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
        <a href="{{ route('admin.person.show') }}" class="btn btn-primary mb-3" style="width: 16rem; margin-top: -10px;">一覧に戻る</a>
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
                        <form action="{{ route('admin.person.edit') }}" method="get">
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
                            <form action="{{ route('admin.person.edit') }}" method="get">
                                <input type="hidden" name="id" value="{{ $user['id'] }}">
                                <input type="submit" class="btn btn-info" value="編集">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- 注文がない時 --}}
        @if (count($users) < 1)
            <h4 class="text-danger mt-5">現在、ご登録されているお客様は存在しません</h4>
        @endif

    @endif
@endsection
