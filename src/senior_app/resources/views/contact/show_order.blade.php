{{-- 注文中 --}}
@extends('layouts.app')

@section('content')
    <header class="masthead bg-primary text-white text-center" style="padding-top: 30px; height: 100%;">
        <div class="container d-flex align-items-center flex-column">
            <h2 class="page-section-heading text-center text-uppercase text-white">キャンセル申請</h2>
            <br>

            <div class="text-danger">
                <h5>商品の注文状況や</h5>
                <h5>配達状況によって</h5>
                <h5>キャンセルできない場合があります。</h5>
            </div>

            <br>

            <div class="text-body">
                <h6>キャンセルしたい商品を</h6>
                <h6>お選びください。</h6>
            </div>

            <br>
            <br>
            <div class="row">

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
                        </tbody>
                    </table>
                </div>
            </div>

            <br>

            <a href="{{ route('contact.index') }}" class="btn btn-dark btn-lg">戻る</a>
        </div>
        </div>
    </header>
@endsection
