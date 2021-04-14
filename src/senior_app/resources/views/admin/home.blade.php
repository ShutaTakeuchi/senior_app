{{-- admin ログイン後のページ --}}
@extends('layouts.app_admin')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            {{-- フラッシュメッセージ --}}
            @if (session('flash_message'))
                <div class="row">
                    <div class="flash_message">
                        <h5 class="text-danger">{{ session('flash_message') }}</h5>
                    </div>
                    <br>
                </div>
            @endif
        </div>

        <div class="row justify-content-center">

            {{-- ごはん --}}
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-header">
                        ごはん
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">状況</h5>
                        <table class="table table-bordered">
                            <tr>
                                <th>注文依頼</th>
                                @if ($delivery_not_buy > 0)
                                    <td class="text-danger">{{ $delivery_not_buy }}</td>
                                @else
                                    <td>{{ $delivery_not_buy }}</td>
                                @endif
                            </tr>
                            <tr>
                                <th>配達中</th>
                                @if ($delivery_delivering > 0)
                                    <td class="text-danger">{{ $delivery_delivering }}</td>
                                @else
                                    <td>{{ $delivery_delivering }}</td>
                                @endif
                            </tr>
                        </table>
                    </div>
                    <div class="card-footer text-muted">
                        <a href="{{ route('admin.search.delivery') }}" class="btn btn-primary">詳細</a>
                    </div>
                </div>
            </div>

            {{-- おかいもの --}}
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-header">
                        おかいもの
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">状況</h5>
                        {{-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> --}}
                        <table class="table table-bordered">
                            <tr>
                                <th>注文依頼</th>
                                @if ($item_not_buy > 0)
                                    <td class="text-danger">{{ $item_not_buy }}</td>
                                @else
                                    <td>{{ $item_not_buy }}</td>
                                @endif
                            </tr>
                            <tr>
                                <th>注文済み</th>
                                @if ($item_bought > 0)
                                    <td class="text-danger">{{ $item_bought }}</td>
                                @else
                                    <td>{{ $item_bought }}</td>
                                @endif
                            </tr>
                            <tr>
                                <th>入荷済み</th>
                                @if ($item_got > 0)
                                    <td class="text-danger">{{ $item_got }}</td>
                                @else
                                    <td>{{ $item_got }}</td>
                                @endif
                            </tr>
                            <tr>
                                <th>配達中</th>
                                @if ($item_delivering > 0)
                                    <td class="text-danger">{{ $item_delivering }}</td>
                                @else
                                    <td>{{ $item_delivering }}</td>
                                @endif
                            </tr>
                        </table>
                    </div>
                    <div class="card-footer text-muted">
                        <a href="{{ route('admin.search.item') }}" class="btn btn-primary">詳細</a>
                    </div>
                </div>
            </div>

            {{-- タクシー --}}
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-header">
                        タクシー
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">状況</h5>
                        {{-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> --}}
                        <table class="table table-bordered">
                            <tr>
                                <th>配車依頼</th>
                                @if ($taxi_order > 0)
                                    <td class="text-danger">{{ $taxi_order }}</td>
                                @else
                                    <td>{{ $taxi_order }}</td>
                                @endif
                            </tr>
                            <tr>
                                <th>お迎え中</th>
                                @if ($taxi_to_customer > 0)
                                    <td class="text-danger">{{ $taxi_to_customer }}</td>
                                @else
                                    <td>{{ $taxi_to_customer }}</td>
                                @endif
                            </tr>
                            <tr>
                                <th>送迎中</th>
                                @if ($taxi_to_destination > 0)
                                    <td class="text-danger">{{ $taxi_to_destination }}</td>
                                @else
                                    <td>{{ $taxi_to_destination }}</td>
                                @endif
                            </tr>
                        </table>
                    </div>
                    <div class="card-footer text-muted">
                        <a href="{{ route('admin.taxi.index') }}" class="btn btn-primary">詳細</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
