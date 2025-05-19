@extends('landing.layout.master')

@section('title', $blogPage->name ?? $blogPage->seo->title ?? 'Our Blog')
@section('meta_description', $blogPage->seo->description ?? $blogPage->subtitle ?? 'Stay updated with the latest news,
insights, and articles from our team.')
@section('meta_keywords', $blogPage->seo->keywords ?? 'blog, news, articles, insights, updates')

@section('og_title', $blogPage->seo->og_title ?? $blogPage->seo->title ?? 'Our Blog')
@section('og_description', $blogPage->seo->og_description ?? $blogPage->seo->description ?? 'Stay updated with the
latest news, insights, and articles from our team.')
@section('og_image', asset('storage/' . ($blogPage->seo->og_image ?? '')))

@section('content')
<!-- Start Page Title Area -->
<div class="page-title-area page-title-style-two">
    <div class="container">
        <div class="page-title-content">
            <h2>{{ $blogPage->name ?? 'Our Blog' }}</h2>
            <ul>
                <li>
                    <a href="{{ route('home.index') }}">
                        <i class="bx bx-home"></i>
                        Home
                    </a>
                </li>
                <li class="active">{{ $blogPage->name ?? 'Blog' }}</li>
            </ul>
        </div>
    </div>
</div>
<!-- End Page Title Area -->

<!-- Start Blog Area -->
<section class="blog-area ptb-100">
    <div class="container">

        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    @forelse($blogs as $blog)
                    <div class="col-lg-6 col-md-6">
                        <div class="single-blog">
                            <div class="blog-img">
                                <a href="{{ route('home.blog.post', $blog->slug) }}">
                                    @if($blog->featured_image)
                                    <img src="{{ asset('storage/' . $blog->featured_image) }}" alt="{{ $blog->title }}">
                                    @else
                                    <img src="{{asset('vendor/landing')}}/assets/img/blog/blog-1.jpg"
                                        alt="{{ $blog->title }}">
                                    @endif
                                </a>
                            </div>

                            <div class="blog-content">
                                @if($blog->category)
                                <span class="category">{{ $blog->category->name }}</span>
                                @endif
                                <span>{{ $blog->published_at->format('F d, Y') }}</span>
                                <h3>
                                    <a href="{{ route('home.blog.post', $blog->slug) }}">{{ $blog->title }}</a>
                                </h3>
                                <p>{{ Str::limit(strip_tags($blog->excerpt ?? $blog->content), 120) }}</p>
                                <a href="{{ route('home.blog.post', $blog->slug) }}" class="read-more">
                                    Read More <i class="bx bx-right-arrow-alt"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12">
                        <div class="alert alert-info">
                            <p>No blog posts found. Please check back later.</p>
                        </div>
                    </div>
                    @endforelse
                </div>

                <div class="col-lg-12 col-md-12">
                    <div class="pagination-area">
                        {{ $blogs->links() }}
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="widget-sidebar">
                    <div class="sidebar-widget search">
                        <form class="search-form">
                            <input class="form-control" name="search" placeholder="Search..." type="text">
                            <button class="search-button" type="submit">
                                <i class="bx bx-search"></i>
                            </button>
                        </form>
                    </div>

                    @if(isset($featuredBlogs) && $featuredBlogs->count() > 0)
                    <div class="sidebar-widget recent-post">
                        <h3 class="widget-title">Featured Posts</h3>

                        <ul>
                            @foreach($featuredBlogs as $featuredBlog)
                            <li>
                                <a href="{{ route('home.blog.post', $featuredBlog->slug) }}">
                                    {{ $featuredBlog->title }}
                                    <span>{{ $featuredBlog->published_at->format('F d, Y') }}</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <div class="sidebar-widget categories">
                        <h3 class="widget-title">Categories</h3>

                        <ul>
                            <li>
                                <a href="{{ route('home.blog') }}" class="{{ !isset($category) ? 'active' : '' }}">
                                    All Categories
                                </a>
                            </li>
                            @foreach($categories as $cat)
                            <li>
                                <a href="{{ route('home.blog.category', $cat->slug) }}"
                                    class="{{ isset($category) && $category->id == $cat->id ? 'active' : '' }}">
                                    {{ $cat->name }}
                                    <span>({{ $cat->blogs_count }})</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Blog Area -->
@endsection