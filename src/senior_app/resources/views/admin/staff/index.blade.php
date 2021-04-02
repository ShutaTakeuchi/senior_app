{{-- admin スタッフ情報 --}}
@extends('layouts.app_admin')

@section('content')

    <!-- フラッシュメッセージ -->
    @if (session('flash_message'))
        <div class="flash_message text-danger">
            {{ session('flash_message') }}
        </div>
    @endif


    <a href="{{ route('admin.staff.create') }}" style="text-decoration: none;">
        <h4>スタッフ登録</h4>
    </a>

    <h2>スタッフ情報</h2>


    <table class="table">
        <thead>
            <tr>
                <th scope="col">社員番号</th>
                <th scope="col">名前</th>
                <th scope="col">メールアドレス</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($people as $person)
                <tr>
                    <td>{{ $person->id }}</th>
                    <td>{{ $person->name }}</td>
                    <td>{{ $person->email }}</td>

                    <td>
                        @if($person->id !== 1)
                        <form action="{{ route('admin.delete.conf') }}" method="get">
                            <input type="hidden" name="id" value="{{ $person->id }}">
                            <input type="submit" class="btn btn-danger btn-sm" value="削除">
                        </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
