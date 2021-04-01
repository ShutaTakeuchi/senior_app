{{-- 注文中 --}}
@extends('layouts.app')

@section('content')
    <header class="masthead bg-primary text-white text-center" style="margin-top: -120px; height: 100%;">
        <div class="container d-flex align-items-center flex-column">
            <h1 class="page-section-heading text-center text-uppercase text-white">注文中の商品</h1>
            <br>
            <h1 class="page-section-heading text-center text-uppercase text-danger">キャンセルしたい商品や店舗名を選択してください。</h1>
            <br>
            <br>
            <div class="row">

                {{-- ごはん --}}
                <div class="col-md-6">
                    <h3 class=" text-center text-uppercase text-dark">ごはん</h3>

                    <table class="table table-borderless">
                        <tbody>
                            @foreach ($deliveries as $delivery)
                                <tr>
                                    <td class="text-white"><img
                                            src="{{ asset('images/icon/home_secondary_32px.png') }}">　<strong><a
                                                href="/contact/conf/cancel?name={{ $delivery['shop_name'] }}&category=delivery"
                                                style="text-decoration: none;"
                                                class="text-white">{{ $delivery['shop_name'] }}</a></strong></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- おかいもの --}}
                <div class="col-md-6">
                    <h3 class="text-center text-uppercase text-dark">おかいもの</h3>

                    <table class="table table-borderless">
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td class="text-white"><img
                                            src="{{ asset('images/icon/home_secondary_32px.png') }}">　<strong><a
                                                href="/contact/conf/cancel?name={{ $item['item_name'] }}&category=item"
                                                style="text-decoration: none;"
                                                class="text-white">{{ $item['item_name'] }}</a></strong></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <br>

            <a href="{{ route('home') }}" class="btn btn-dark btn-lg">戻る</a>
        </div>
        </div>
    </header>
@endsection
