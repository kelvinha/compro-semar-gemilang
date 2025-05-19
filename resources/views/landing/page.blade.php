@extends('landing.layout.master')

@section('content')
<!-- Start Page Title Area -->
<div class="page-title-area">
    <div class="container">
        <div class="page-title-content">
            <h2>{{ $page->name }}</h2>
            <ul>
                <li>
                    <a href="{{ route('home.index') }}">
                        <i class="bx bx-home"></i>
                        Home
                    </a>
                </li>
                <li class="active">{{ $page->name }}</li>
            </ul>
        </div>
    </div>
</div>
<!-- End Page Title Area -->

<!-- Start Page Content Area -->
<section class="page-content-area pt-100 pb-70">
    <div class="container">
        @if(isset($sections) && $sections->count() > 0)
            @foreach($sections as $section)
                @if($section->type == 'text')
                    <div class="row mb-5">
                        <div class="col-12">
                            <div class="section-title">
                                <h2>{{ $section->name }}</h2>
                            </div>
                            <div class="section-content">
                                {!! $section->content !!}
                            </div>
                        </div>
                    </div>
                @elseif($section->type == 'text_image')
                    @php
                        $options = $section->options ?? [];
                        $imageUrl = isset($section->image) ? asset($section->image->path) : asset('vendor/landing/assets/img/about-img.jpg');
                        $imagePosition = isset($options['image_position']) ? $options['image_position'] : 'right';
                    @endphp
                    <div class="row mb-5 align-items-center">
                        @if($imagePosition == 'left')
                            <div class="col-lg-6">
                                <div class="about-img">
                                    <img src="{{ $imageUrl }}" alt="{{ $section->name }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="section-title">
                                    <h2>{{ $section->name }}</h2>
                                </div>
                                <div class="section-content">
                                    {!! $section->content !!}
                                </div>
                            </div>
                        @else
                            <div class="col-lg-6">
                                <div class="section-title">
                                    <h2>{{ $section->name }}</h2>
                                </div>
                                <div class="section-content">
                                    {!! $section->content !!}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="about-img">
                                    <img src="{{ $imageUrl }}" alt="{{ $section->name }}">
                                </div>
                            </div>
                        @endif
                    </div>
                @elseif($section->type == 'features')
                    @php
                        $options = $section->options ?? [];
                    @endphp
                    <div class="row mb-5">
                        <div class="col-12">
                            <div class="section-title">
                                <h2>{{ $section->name }}</h2>
                            </div>
                        </div>
                        
                        @if(isset($options['items']) && is_array($options['items']))
                            @foreach($options['items'] as $index => $item)
                                <div class="col-lg-4 col-sm-6">
                                    <div class="single-challenges overly-one">
                                        <div class="overly-two">
                                            <i class="{{ $item['icon'] ?? 'flaticon-threat' }}"></i>
                                            <h3>{{ $item['title'] ?? 'Feature ' . ($index + 1) }}</h3>
                                            <p>{{ $item['description'] ?? 'Description for feature ' . ($index + 1) }}</p>
                                            <span class="{{ $item['icon'] ?? 'flaticon-threat' }}"></span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="col-12">
                                <p>No features defined for this section.</p>
                            </div>
                        @endif
                    </div>
                @endif
            @endforeach
        @else
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>{{ $page->name }}</h2>
                    </div>
                    <p>No content has been added to this page yet.</p>
                </div>
            </div>
        @endif
    </div>
</section>
<!-- End Page Content Area -->
@endsection
