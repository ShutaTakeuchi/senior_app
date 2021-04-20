{{-- 注文中 --}}
@extends('layouts.app')

@section('title', '注文キャンセルのれんらく / HOME-GOOD')

@section('content')
    <header class="masthead bg-primary text-white text-center" style="padding-top: 30px; height: 100%; min-height: 520px;">
        <div class="container d-flex align-items-center flex-column">
            <h2 class="page-section-heading text-center text-uppercase text-white">キャンセル申請</h2>

            <div class="text-danger mt-4">
                <h5>商品の注文状況や配達状況によって</h5>
                <h5>キャンセルできない場合があります。</h5>
            </div>

            <div class="text-body mt-4">
                <h5>キャンセルしたい商品を<br>お選びください</h5>
            </div>


            <div class="row mt-5" style="width: 100%;">

                {{-- ごはん --}}
                <div class="col-md-6">
                    <h3 class="text-center text-uppercase text-dark">ごはん</h3>

                    <table class="table table-bordered">
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

                            {{-- 注文中が0の場合 --}}
                            @if (count($deliveries) < 1)
                                <div class="text-center text-danger my-4">
                                    <h5>注文中の商品は</h5>
                                    <h5>ありません</h5>
                                </div>
                            @endif

                        </tbody>
                    </table>
                </div>

                {{-- おかいもの --}}
                <div class="col-md-6">
                    <h3 class="text-center text-uppercase text-dark">おかいもの</h3>

                    <table class="table table-bordered">
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

                            {{-- 注文中が0の場合 --}}
                            @if (count($items) < 1)
                                <div class="text-center text-danger my-4">
                                    <h5>注文中の商品は</h5>
                                    <h5>ありません</h5>
                                </div>
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>

            <a href="{{ route('contact.index') }}" class="btn btn-dark btn-lg" style="margin-top: 60px;">戻る</a>
        </div>
        </div>
    </header>
@endsection
