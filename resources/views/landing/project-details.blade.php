@extends('landing.layout.master')

@section('title', $project->seo->title ?? $project->meta_title ?? $project->project_name)
@section('meta_description', $project->seo->description ?? $project->meta_description ??
Str::limit(strip_tags($project->project_description), 160))
@section('meta_keywords', $project->seo->keywords ?? $project->meta_keywords ?? 'project, ' . $project->project_name .
', ' . $project->client_name)

@section('og_title', $project->seo->og_title ?? $project->meta_title ?? $project->project_name)
@section('og_description', $project->seo->og_description ?? $project->meta_description ??
Str::limit(strip_tags($project->project_description), 160))
@section('og_image', asset('storage/' . ($project->seo->og_image ?? $project->project_main_image ?? '')))

@section('content')
<!-- Start Page Title Area -->
<div class="page-title-area page-title-style-two">
    <div class="container">
        <div class="page-title-content">
            <h2>{{ $project->project_name }}</h2>
            <ul>
                <li>
                    <a href="{{ route('home.index') }}">
                        <i class="bx bx-home"></i>
                        Home
                    </a>
                </li>
                <li>
                    <a href="{{ route('home.projects') }}">
                        {{ $projectsPage->title ?? 'Projects' }}
                    </a>
                </li>
                <li class="active">{{ $project->project_name }}</li>
            </ul>
        </div>
    </div>
</div>
<!-- End Page Title Area -->

<!-- Start Project Details Area -->
<section class="service-details-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="service-details-wrap">
                    @if ($project->project_main_image)
                    <div class="service-details-img">
                        <img src="{{ asset('storage/' . $project->project_main_image) }}"
                            alt="{{ $project->project_name }}">
                    </div>
                    @endif

                    <h3>{{ $project->project_name }}</h3>
                    <div class="service-details-content">
                        {!! $project->project_description !!}
                    </div>

                    @if ($project->project_gallery_images && count($project->project_gallery_images) > 0)
                    <div class="service-details-gallery">
                        <h3>Project Gallery</h3>
                        <div class="row">
                            @foreach ($project->project_gallery_images as $image)
                            <div class="col-lg-4 col-md-6">
                                <div class="single-gallery">
                                    <img src="{{ asset('storage/' . $image) }}" alt="Gallery Image">
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <div class="col-lg-4">
                <div class="service-sidebar-area">
                    <div class="service-list">
                        <h3 class="service-details-title">Project Details</h3>
                        <ul>
                            <li>
                                <strong>Client:</strong> {{ $project->client_name ?? 'N/A' }}
                            </li>
                            <li>
                                <strong>Location:</strong> {{ $project->location ?? 'N/A' }}
                            </li>
                            @if ($project->completion_date)
                            <li>
                                <strong>Completion Date:</strong> {{ $project->completion_date->format('F d, Y') }}
                            </li>
                            @endif
                        </ul>
                    </div>

                    @if ($relatedProjects && $relatedProjects->count() > 0)
                    <div class="service-list">
                        <h3 class="service-details-title">Related Projects</h3>
                        <ul>
                            @foreach ($relatedProjects as $relatedProject)
                            <li>
                                <a href="{{ route('home.projects.show', $relatedProject->slug) }}">
                                    {{ $relatedProject->project_name }}
                                    <i class="bx bx-chevron-right"></i>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Project Details Area -->
@endsection