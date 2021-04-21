{{-- admin　担当者入力画面 --}}
@extends('layouts.app_admin')

@section('content')
    <h2 class="mb-5">担当者を選択してください。</h2>
    <br>

    <form action="{{ route('admin.store_staff.item') }}" method="post">
        @csrf
        <div class="form-group">
            <select name="id" class="form-control form-control-lg">
                <option value="未定">未定</option>
                @foreach ($items as $item)
                    @if($item->name !== 'admin')
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        </div>
        <br>
        <input type="hidden" name="item_id" value="{{ $item_id }}">

        <button type="submit" class="btn btn-info mb-3">確定</button>
        <br>
        <a href="{{ route('admin.home') }}" class="btn btn-dark">戻る</a>

    </form>




@endsection
