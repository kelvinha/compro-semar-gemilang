@extends('landing.layout.master')
@section('classBody', 'blog_list_page')
@section('meta_description', $blogPage->seo->description ?? $blogPage->subtitle ?? 'Stay updated with the latest news,
insights, and articles from our team.')
@section('meta_keywords', $blogPage->seo->keywords ?? 'blog, news, articles, insights, updates')

@section('og_title', $blogPage->seo->og_title ?? $blogPage->seo->title ?? 'Our Blog')
@section('og_description', $blogPage->seo->og_description ?? $blogPage->seo->description ?? 'Stay updated with the
latest news, insights, and articles from our team.')
@section('og_image', asset('storage/' . ($blogPage->seo->og_image ?? '')))
@section('content')
    @php
        // Load home page content directly in the view
        $homePage = \App\Helpers\PageHelper::getHomePage();

        // If home page doesn't exist, create a fallback
        if (!$homePage) {
        $homePage = \App\Helpers\PageHelper::createFallbackPage(
        'Home',
        'Welcome to our website. Discover our products and services.',
        'home, welcome, products, services'
        );
        }
    @endphp
    <!--Start breadcrumb area-->
    <section class="breadcrumb-area" style="background-image: url({{asset('vendor/landing')}}/assets/images/breadcrumb/breadcrumb-1.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="inner-content clearfix">
                        <div class="title">
                            <h1>Blogs</h1>
                        </div>
                        <div class="breadcrumb-menu">
                            <ul class="clearfix">
                                <li><a href="{{ route('home.index') }}">Home Back</a></li>
                                <li><span class="flaticon-next-1"></span></li>
                                <li class="active">Our Blogs</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End breadcrumb area-->

    <!--Start latest blog area -->
    <section class="blog-pagev2-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7 col-md-12 col-sm-12">
                    <div class="blog-post">
                        <!--Start Single Blog Post Style3-->
                        @foreach($blogs as $blog)
                        <div class="single-blog-post-style3 wow fadeInUp animated" data-wow-delay="0.3s" data-wow-duration="1200ms">
                            @if($blog->featured_image)
                                <div class="img-holder">
                                    <img src="{{asset('storage/' . $blog->featured_image)}}" alt="{{ $blog->title }}">
                                    <div class="overlay-style-one bg1"></div>
                                </div>
                            @else
                            <div class="img-holder">
                                <img src="{{asset('vendor/landing')}}/assets/images/blog/blog-v3-1.jpg" alt="Awesome Image">
                                <div class="overlay-style-one bg1"></div>
                            </div>
                            @endif
                            <div class="text-holder">
                                <ul class="meta-info">
                                    <li>{{ $blog->published_at->format('l, j F Y') }}</li>
                                </ul>
                                <h3 class="blog-title"><a href="#"> {{ $blog->title }}</a></h3>
                                <h4>Author : {{ $blog->user->name }}</h4>
                                <div class="button-box">
                                    <div class="readmore">
                                        <a class="btn-one" href="#">Read More<span class="flaticon-next"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <!--Start sidebar Wrapper-->
                <div class="col-xl-4 col-lg-5 col-md-9 col-sm-12">
                    <div class="sidebar-wrapper">
                        <!--Start sidebar categories Box-->
                        <div class="sidebar-categories-box wow fadeInUp animated" data-wow-delay="0.1s" data-wow-duration="1200ms">
                            <div class="categories-title">
                                <h3>All Categories</h3>
                            </div>
                            <ul class="categories clearfix">
                                @foreach($categories as $category)
                                <li><a href="#">{{$category->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <!--End Sidebar Wrapper-->
            </div>

            <div class="row">
{{--                <div class="col-xl-12">--}}
{{--                    <!--Styled Pagination-->--}}
{{--                    <ul class="styled-pagination blog_pagination clearfix text-left">--}}
{{--                        <li><a href="#">1</a></li>--}}
{{--                        <li><a href="#" class="active">2</a></li>--}}
{{--                        <li><a href="#">3</a></li>--}}
{{--                        <li class="next"><a href="#"><span class="fa fa-angle-right"></span></a></li>--}}
{{--                    </ul>--}}
{{--                    <!--End Styled Pagination-->--}}
{{--                </div>--}}
                {{ $blogs->links() }}
            </div>

        </div>
    </section>
    <!--End latest blog area-->
@endsection
