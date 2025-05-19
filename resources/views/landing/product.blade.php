@extends('landing.layout.master')

@section('title', $productsPage->seo->title ?? 'Our Products')
@section('meta_description', $productsPage->seo->description ?? 'Explore our range of high-quality products')
@section('meta_keywords', $productsPage->seo->keywords ?? 'products, valve automation, control systems')

@section('content')
<!-- Start Page Title Area -->
<div class="page-title-area page-title-style-two">
    <div class="container">
        <div class="page-title-content">
            <h2>{{ $productsPage->seo->title ?? 'Our Products' }}</h2>
            <ul>
                <li>
                    <a href="{{ route('home.index') }}">
                        <i class="bx bx-home"></i>
                        Home
                    </a>
                </li>
                @if($category)
                <li>
                    <a href="{{ route('home.products') }}">
                        {{ $productsPage->seo->title ?? 'Products' }}
                    </a>
                </li>
                <li class="active">{{ $category->name }}</li>
                @else
                <li class="active">{{ $productsPage->seo->title ?? 'Products' }}</li>
                @endif
            </ul>
        </div>
    </div>
</div>
<!-- End Page Title Area -->

@if($featuredProducts->count() > 0 && !$category)
<!-- Start Featured Products Area -->
<section class="featured-services-area pt-100 pb-70">
    <div class="container">
        <div class="section-title">
            <span>Featured Products</span>
            <h2>Our Top Products</h2>
        </div>

        <div class="row">
            @foreach($featuredProducts as $featured)
            <div class="col-lg-4 col-md-6">
                <div class="featured-services-item">
                    <div class="featured-services-img">
                        <a href="{{ route('home.products.show', $featured->slug) }}">
                            @if($featured->image)
                            <img src="{{ asset('storage/' . $featured->image) }}" alt="{{ $featured->name }}">
                            @else
                            <img src="{{ asset('vendor/landing') }}/assets/img/services/services-1.jpg"
                                alt="{{ $featured->name }}">
                            @endif
                        </a>
                    </div>
                    <div class="featured-services-content">
                        <h3>
                            <a href="{{ route('home.products.show', $featured->slug) }}">{{ $featured->name }}</a>
                        </h3>
                        @if($featured->price > 0)
                        <p><strong>Price:</strong> ${{ number_format($featured->price, 2) }}</p>
                        @endif
                        <p>{{ Str::limit(strip_tags($featured->short_description), 100) }}</p>
                        <a href="{{ route('home.products.show', $featured->slug) }}" class="read-more">
                            View Details <i class="bx bx-right-arrow-alt"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End Featured Products Area -->
@endif

<!-- Start Product Area -->
<div class="product-area ptb-100">
    <div class="container">
        {{-- @if($productsPage->content)
        <div class="row mb-4">
            <div class="col-12">
                <div class="about-content">
                    {!! $productsPage->content !!}
                </div>
            </div>
        </div>
        @endif --}}

        <div class="row">
            <div class="col-lg-3">
                <div class="sidebar-widget categories">
                    <h3>Product Categories</h3>
                    <ul>
                        <li>
                            <a href="{{ route('home.products') }}" class="{{ !$category ? 'active' : '' }}">
                                All Products
                            </a>
                        </li>
                        @foreach($categories as $cat)
                        <li>
                            <a href="{{ route('home.products.category', $cat->slug) }}"
                                class="{{ $category && $category->id == $cat->id ? 'active' : '' }}">
                                {{ $cat->name }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-lg-9">

                <div class="row">
                    @forelse($products as $product)
                    <div class="col-lg-4 col-sm-6">
                        <div class="single-product">
                            <div class="product-img">
                                @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}">
                                @else
                                <img src="{{ asset('vendor/landing') }}/assets/img/product/product-1.jpg"
                                    alt="{{ $product->title }}">
                                @endif

                                <ul>
                                    <li>
                                        <a href="{{ route('home.products.show', $product->slug) }}">
                                            <i class="bx bx-show-alt"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <a href="{{ route('home.products.show', $product->slug) }}">
                                <h3>{{ $product->title }}</h3>
                            </a>

                            @if($product->price > 0)
                            <span>${{ number_format($product->price, 2) }}</span>
                            @endif

                            <a href="{{ route('home.products.show', $product->slug) }}" class="default-btn">
                                <span>View Details</span>
                            </a>
                        </div>
                    </div>
                    @empty
                    <div class="col-12 text-center">
                        <div class="alert alert-info">
                            <p>No products found. Please check back later.</p>
                        </div>
                    </div>
                    @endforelse
                </div>

                <div class="col-lg-12 col-md-12">
                    <div class="pagination-area">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Product Area -->
@endsection