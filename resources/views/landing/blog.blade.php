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
    <main class="site-main">
        <!-- START OF MAIN BANNER -->
        <section class="inner-banner back-img" style="background-image: url('{{asset('vendor/landing')}}/assets/images/banner.jpg');">
            <div class="banner-stripes">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="banner-shape-wp wow fadeInRight for-des" data-wow-duration=".8s">
                <div class="banner-shape">
                    <span class="stripe"></span>
                    <span class="stripe stripe-secondary"></span>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="inner-banner-content-wp white-text text-center">
                            <div class="inner-banner-content wow fadeInUp" data-wow-duration=".8s">
                                <h2 class="h1-title">Blog List</h2>
                            </div>
                            <div class="inner-banner-breadcrumb wow fadeInUp" data-wow-duration=".8s" data-wow-delay=".2s">
                                <ul>
                                    <li>
                                        <a href="{{ route('home.index') }}" title="Home">Home</a>
                                    </li>
                                    <li>
                                        <span>Blog</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END OF MAIN BANNER -->
        <!-- BLOG MAIN CONTENT START -->
        <section class="blog-listing">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="blog-listing-box wow fadeInLeft" data-wow-duration=".8s" data-wow-delay=".2s">
                            @foreach($blogs as $blog)
                                <div class="blog-box">
                                    <div class="blog-image">
                                        @if($blog->featured_image)
                                            <a href="{{ route('home.blog.post', $blog->slug) }}" class="back-img" style="background-image: url('{{asset('storage/' . $blog->featured_image)}}');" title="{{ $blog->title }}"></a>
                                        @else
                                            <a href="{{ route('home.blog.post', $blog->slug) }}" class="back-img" style="background-image: url('{{asset('vendor/landing')}}/assets/images/default-blog-image.svg');" title="{{ $blog->title }}"></a>
                                        @endif
                                        <p class="blog-published">{{ $blog->published_at->format('l, j F Y')  }}</p>
                                    </div>
                                    <div class="blog-box-content">
                                        <h4 class="h4-title">
                                            <a href="{{ route('home.blog.post', $blog->slug) }}" title="{{ $blog->title }}">{{ $blog->title }}</a>
                                        </h4>
                                        <p>{{ $blog->excerpt  }}</p>
                                        <a href="{{ route('home.blog.post', $blog->slug) }}" class="sec-btn" title="{{ $blog->excerpt  }}"></a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="portfolio-pagination">
                            {{ $blogs->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="blog-listing-sidebar wow fadeInRight" data-wow-duration=".8s" data-wow-delay=".2s">
                            <div class="blog-sidebar-box blog-search-box">
                                <h4 class="h4-title">Search Here</h4>
                                <div class="blog-search">
                                    <form>
                                        <div class="blog-search-bar">
                                            <input type="text" placeholder="Search..." required="">
                                            <button type="submit">
                                                <img src="{{asset('vendor/landing')}}/assets/images/search-icon.svg" width="20" height="20" alt="Search Icon">
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="blog-sidebar-box blog-category-box">
                                <h4 class="h4-title">Categories</h4>
                                <ul>
                                    @foreach($categories as $cat)
                                        <li>
                                            <a href="" title="{{ $cat->name }}">{{ $cat->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="blog-sidebar-box blog-recent-post-box">
                                <h4 class="h4-title">Recent Post</h4>
                                <div class="blog-recent-post-wp">
                                    @foreach($currentBlogs as $currentBlog)
                                        <div class="blog-recent-post">
                                            @if($currentBlog->featured_image)
                                                <div class="recent-post-img">
                                                    <a class="back-img" href="{{ route('home.blog.post', $currentBlog->slug) }}" style="background-image: url('{{asset('storage/' . $currentBlog->featured_image)}}');" title="{{ $currentBlog->title }}"></a>
                                                </div>
                                            @else
                                                <div class="recent-post-img">
                                                    <a href="{{ route('home.blog.post', $currentBlog->slug) }}" class="back-img" style="background-image: url('{{asset('vendor/landing')}}/assets/images/default-blog-image.svg');" title="{{ $currentBlog->title }}"></a>
                                                </div>
                                            @endif
                                            <div class="recent-post-content">
                                                <p class="recent-post-text">
                                                    <a href="{{ route('home.blog.post', $currentBlog->slug) }}" title={{ $currentBlog->title }}>{{ $currentBlog->title }}</a>
                                                </p>
                                                <div class="recent-post-date">{{ $currentBlog->published_at->format('l, j F Y')}}</div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- BLOG MAIN CONTENT END-->
    </main>
@endsection
