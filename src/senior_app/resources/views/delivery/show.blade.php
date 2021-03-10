@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($results['rest'] as $result)
                <div class="card">
                    <div class="card-header"><a href="">{{ $result['name'] }}</a></div>

                    <div class="card-body">
                        <p>{{ $result['pr']['pr_short'] }}</p>
                        <img src="{{ $result['image_url']['shop_image1'] }}">
                        <img src="{{ $result['image_url']['shop_image2'] }}">
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
