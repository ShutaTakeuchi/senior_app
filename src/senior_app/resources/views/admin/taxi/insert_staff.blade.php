{{-- admin　担当者入力画面 --}}
@extends('layouts.app_admin')

@section('content')
    <h2 class="mb-5">担当者を選択してください</h2>

    <form action="{{ route('admin.taxi.store.staff') }}" method="post">
        @csrf
        <div class="form-group">
            <select name="id" class="form-control form-control-lg">
                <option value="未定">未定</option>
                @foreach ($admins as $admin)
                    @if($admin->name !== 'admin')
                        <option value="{{ $admin->id }}">{{ $admin->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        </div>
        <br>
        <input type="hidden" name="taxi_id" value="{{ $taxi_id }}">
        <button type="submit" class="btn btn-info mb-3">決定</button>
        <br>
        <a href="{{ route('admin.taxi.index') }}" class="btn btn-dark">戻る</a>
    </form>

@endsection
