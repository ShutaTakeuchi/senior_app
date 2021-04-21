{{-- admin　担当者入力画面 --}}
@extends('layouts.app_admin')

@section('content')
    <h2 class="mb-5">担当者を選択してください</h2>
    

    <form action="{{ route('admin.store_staff.delivery') }}" method="post" style="width: 15rem;">
        @csrf
        <div class="form-group">
            <select name="id" class="form-control form-control-lg">
                <option value="未定">未定</option>
                @foreach ($deliveries as $delivery)
                    @if($delivery->name !== 'admin')
                        <option value="{{ $delivery->id }}">{{ $delivery->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        </div>
        <br>
        <input type="hidden" name="shop_id" value="{{ $shop_id }}">

        <button type="submit" class="btn btn-info mb-3">確定</button>
        <br>
        <a href="{{ route('admin.search.delivery') }}" class="btn btn-dark">戻る</a>
    </form>

@endsection
