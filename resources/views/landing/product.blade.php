@extends('landing.layout.master')
@section('classBody', 'services_listing_page')
@section('content')
    <section class="breadcrumb-area"
             style="background-image: url({{asset('vendor/landing')}}/assets/images/breadcrumb/breadcrumb-2.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="inner-content clearfix">
                        <div class="title">
                            <h1>Products</h1>
                        </div>
                        <div class="breadcrumb-menu">
                            <ul class="clearfix">
                                <li><a href="{{ route('home.index')  }}">Home Back</a></li>
                                <li><span class="flaticon-next-1"></span></li>
                                <li class="active">Products</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Start Service Style2 Area-->
    <section class="service-style2-area service-page2">
        <div class="container service-box">
            <div class="sec-title text-center">
                <p>Show Now</p>
                <div class="big-title black-clr"><h1>Our Products</h1></div>
            </div>
            <div class="row">
                @foreach($products as $product)
                    <div class="col-xl-6 col-lg-6">
                        <div class="single-service-style2">
                            <div class="img-holder">
                                @if($product->image)
                                    <img src="{{asset('storage/' . $product->image)}}"
                                         alt="{{ $product->title }}">
                                @else
                                    <img src="{{asset('vendor/landing')}}/assets/images/services/service-1.jpg"
                                         alt="Awesome Image">
                                @endif
                                <div class="static-content">
                                    <div class="title">
                                        <h3>{{ $product->title }}</a></h3>
                                    </div>
                                </div>
                                <div class="overlay-content">
                                    <div class="inner-content">
                                        <div class="icon"><span class="flaticon-helmet-1"></span></div>
                                        <div class="text-holder">
                                            <div class="title">
                                                <h3><a href="#">{{ $product->title }}</a></h3>
                                            </div>
                                            {!!  $product->description !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>
    <!--End Service Style2 Area-->
@endsection
