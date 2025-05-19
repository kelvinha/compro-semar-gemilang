@extends('landing.layout.master')

@section('title', $blog->seo->title ?? $blog->title)
@section('meta_description', $blog->seo->description ?? Str::limit(strip_tags($blog->excerpt ?? $blog->content), 160))
@section('meta_keywords', $blog->seo->keywords ?? 'blog, article, ' . $blog->title)

@section('og_title', $blog->seo->og_title ?? $blog->seo->title ?? $blog->title)
@section('og_description', $blog->seo->og_description ?? $blog->seo->description ?? Str::limit(strip_tags($blog->excerpt
?? $blog->content), 160))
@section('og_image', asset('storage/' . ($blog->seo->og_image ?? $blog->featured_image ?? '')))

@section('content')
<!-- Start Page Title Area -->
<div class="page-title-area">
    <div class="container">
        <div class="page-title-content">
            <h2>{{ $blog->title }}</h2>
            <ul>
                <li>
                    <a href="{{ route('home.index') }}">
                        <i class="bx bx-home"></i>
                        Home
                    </a>
                </li>
                <li>
                    <a href="{{ route('home.blog') }}">
                        {{ $blogPage->title ?? 'Blog' }}
                    </a>
                </li>
                <li class="active">{{ $blog->title }}</li>
            </ul>
        </div>
    </div>
</div>
<!-- End Page Title Area -->

<!-- Start Blog Details Area -->
<div class="blog-details-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="blog-details-content">
                    @if($blog->featured_image)
                    <div class="blog-details-img">
                        <img src="{{ asset('storage/' . $blog->featured_image) }}" alt="{{ $blog->title }}">
                    </div>
                    @endif

                    <div class="blog-top-content">
                        <div class="blog-content">
                            <ul class="admin">
                                @if($blog->author)
                                <li>
                                    <i class="bx bx-user-circle"></i>
                                    Posted by: {{ $blog->author->name }}
                                </li>
                                @endif
                                <li>
                                    <i class="bx bx-calendar-alt"></i>
                                    {{ $blog->published_at->format('F d, Y') }}
                                </li>
                                @if($blog->category)
                                <li>
                                    <i class="bx bx-purchase-tag-alt"></i>
                                    {{ $blog->category->name }}
                                </li>
                                @endif
                            </ul>

                            <h3>{{ $blog->title }}</h3>
                        </div>
                    </div>

                    <div class="blog-details-text">
                        {!! $blog->content !!}
                    </div>

                    @if($blog->tags && $blog->tags->count() > 0)
                    <div class="blog-details-tag">
                        <ul>
                            <li class="title">Tags:</li>
                            @foreach($blog->tags as $tag)
                            <li>
                                <a href="#">{{ $tag->name }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
            </div>

            @if(isset($relatedBlogs) && $relatedBlogs->count() > 0)
            <div class="col-lg-12">
                <div class="related-post">
                    <h3>Related Posts</h3>

                    <div class="row">
                        @foreach($relatedBlogs as $relatedBlog)
                        <div class="col-lg-4 col-md-6">
                            <div class="single-blog">
                                <div class="blog-img">
                                    <a href="{{ route('home.blog.post', $relatedBlog->slug) }}">
                                        @if($relatedBlog->featured_image)
                                        <img src="{{ asset('storage/' . $relatedBlog->featured_image) }}"
                                            alt="{{ $relatedBlog->title }}">
                                        @else
                                        <img src="{{asset('vendor/landing')}}/assets/img/blog/blog-1.jpg"
                                            alt="{{ $relatedBlog->title }}">
                                        @endif
                                    </a>
                                </div>

                                <div class="blog-content">
                                    @if($relatedBlog->category)
                                    <span class="category">{{ $relatedBlog->category->name }}</span>
                                    @endif
                                    <span>{{ $relatedBlog->published_at->format('F d, Y') }}</span>
                                    <h3>
                                        <a href="{{ route('home.blog.post', $relatedBlog->slug) }}">{{
                                            $relatedBlog->title }}</a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
<!-- End Blog Details Area -->
@endsection