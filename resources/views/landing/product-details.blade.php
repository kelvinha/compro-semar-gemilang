@extends('landing.layout.master-temp')

@section('title', $product->seo->title ?? $product->meta_title ?? $product->title)
@section('meta_description', $product->seo->description ?? $product->meta_description ??
Str::limit(strip_tags($product->description), 160))
@section('meta_keywords', $product->seo->keywords ?? $product->meta_keywords ?? 'product, ' . $product->title)

@section('og_title', $product->seo->og_title ?? $product->meta_title ?? $product->title)
@section('og_description', $product->seo->og_description ?? $product->meta_description ??
Str::limit(strip_tags($product->description), 160))
@section('og_image', asset('storage/' . ($product->seo->og_image ?? $product->image ?? '')))

@section('content')
    <!-- Start Page Title Area -->
    <div class="page-title-area page-title-style-two">
        <div class="container">
            <div class="page-title-content">
                <h2>{{ $product->name }}</h2>
                <ul>
                    <li>
                        <a href="{{ route('home.index') }}">
                            <i class="bx bx-home"></i>
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('home.products') }}">
                            {{ $productsPage->title ?? 'Products' }}
                        </a>
                    </li>
                    @if($category)
                        <li>
                            <a href="{{ route('home.products.category', $category->slug) }}">
                                {{ $category->name }}
                            </a>
                        </li>
                    @endif
                    <li class="active">{{ $product->title }}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Page Title Area -->

    <!-- Start Product Details Area -->
    <section class="product-details-area ptb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12">
                    <div class="product-details-image">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}">
                        @else
                            <img src="{{ asset('vendor/landing') }}/assets/img/product/product-1.jpg"
                                 alt="{{ $product->title }}">
                        @endif
                    </div>
                </div>

                <div class="col-lg-6 col-md-12">
                    <div class="product-details-desc">
                        <h3>{{ $product->title }}</h3>

                        @if($product->price > 0)
                            <div class="price">
                                <span class="new-price">${{ number_format($product->price, 2) }}</span>
                            </div>
                        @endif


                        <div class="short-description">
                            {!! $product->short_description !!}
                        </div>

                        <ul class="product-info">
                            @if($category)
                                <li>
                                    <span>Category:</span> <a
                                            href="{{ route('home.products.category', $category->slug) }}">{{
                                $category->name }}</a>
                                </li>
                            @endif
                        </ul>

                        <div class="product-add-to-cart mt-4">
                            <a href="#contact" class="default-btn">
                                <span>Contact for Inquiry</span>
                            </a>
                        </div>

                    </div>
                </div>

                <div class="col-lg-12 col-md-12">
                    <div class="tab products-details-tab mt-5">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <ul class="tabs">
                                    <li class="current">
                                        <a href="#">
                                            <div class="dot"></div>
                                            Detail
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <div class="tab-content">
                                    <div class="tabs-item current">
                                        <div class="products-details-tab-content">
                                            {!! $product->description !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Product Details Area -->

    <!-- Start Related Products Area -->
    @if($relatedProducts->count() > 0)
        <section class="related-products-area pb-70">
            <div class="container">
                <div class="section-title">
                    <span>Related Products</span>
                    <h2>You might also like</h2>
                </div>

                <div class="row">
                    @foreach($relatedProducts as $related)
                        <div class="col-lg-3 col-sm-6">
                            <div class="single-product">
                                <div class="product-img">
                                    @if($related->image)
                                        <img src="{{ asset('storage/' . $related->image) }}" alt="{{ $related->name }}">
                                    @else
                                        <img src="{{ asset('vendor/landing') }}/assets/img/product/product-1.jpg"
                                             alt="{{ $related->name }}">
                                    @endif

                                    <ul>
                                        <li>
                                            <a href="{{ route('home.products.show', $related->slug) }}">
                                                <i class="bx bx-show-alt"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <a href="{{ route('home.products.show', $related->slug) }}">
                                    <h3>{{ $related->name }}</h3>
                                </a>

                                @if($related->price > 0)
                                    <span>${{ number_format($related->price, 2) }}</span>
                                @endif

                                <a href="{{ route('home.products.show', $related->slug) }}" class="default-btn">
                                    <span>View Details</span>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    <!-- End Related Products Area -->
@endsection
