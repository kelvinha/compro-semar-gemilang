@extends('landing.layout.master-temp')

@section('title', $projectsPage->seo->title ?? 'Our Projects')
@section('meta_description', $projectsPage->seo->description ?? 'Explore our completed and ongoing projects')
@section('meta_keywords', $projectsPage->seo->keywords ?? 'projects, portfolio, case studies')

@section('content')
    <!-- Start Page Title Area -->
    <div class="page-title-area page-title-style-two">
        <div class="container">
            <div class="page-title-content">
                <h2>{{ $projectsPage->seo->title ?? 'Our Projects' }}</h2>
                <ul>
                    <li>
                        <a href="{{ route('home.index') }}">
                            <i class="bx bx-home"></i>
                            Home
                        </a>
                    </li>
                    <li class="active">{{ $projectsPage->seo->title ?? 'Projects' }}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Page Title Area -->

    @if($featuredProjects->count() > 0)
        <!-- Start Featured Projects Area -->
        <section class="featured-services-area pt-100 pb-70">
            <div class="container">
                <div class="section-title">
                    <span>Featured Projects</span>
                    <h2>Our Highlighted Work</h2>
                </div>

                <div class="row">
                    @foreach($featuredProjects as $featured)
                        <div class="col-lg-4 col-md-6">
                            <div class="featured-services-item">
                                <div class="featured-services-img">
                                    <a href="{{ route('home.projects.show', $featured->slug) }}">
                                        @if($featured->project_main_image)
                                            <img src="{{ asset('storage/' . $featured->project_main_image) }}"
                                                 alt="{{ $featured->project_name }}">
                                        @else
                                            <img src="{{ asset('assets/img/projects/project-placeholder.jpg') }}"
                                                 alt="{{ $featured->project_name }}">
                                        @endif
                                    </a>
                                </div>
                                <div class="featured-services-content">
                                    <h3>
                                        <a href="{{ route('home.projects.show', $featured->slug) }}">{{ $featured->project_name
                                }}</a>
                                    </h3>
                                    <p>{{ $featured->client_name }}</p>
                                    <a href="{{ route('home.projects.show', $featured->slug) }}" class="read-more">
                                        View Details <i class="bx bx-right-arrow-alt"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- End Featured Projects Area -->
    @endif

    <!-- Start Projects Area -->
    <section class="services-area pb-70">
        <div class="container">
            <div class="section-title">
                {{-- <span>{{ $projectsPage->subtitle ?? 'Our Portfolio' }}</span> --}}
                <h2>{{ $projectsPage->heading ?? 'Explore our completed and ongoing projects' }}</h2>
            </div>

            @if($projectsPage->content)
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="about-content">
                            {!! $projectsPage->content !!}
                        </div>
                    </div>
                </div>
            @endif

            <div class="row">
                @forelse ($projects as $project)
                    <div class="col-lg-4 col-sm-6">
                        <div class="single-services">
                            <div class="services-img">
                                <a href="{{ route('home.projects.show', $project->slug) }}">
                                    @if ($project->project_main_image)
                                        <img src="{{ asset('storage/' . $project->project_main_image) }}"
                                             alt="{{ $project->project_name }}">
                                    @else
                                        <img src="{{ asset('assets/img/projects/project-placeholder.jpg') }}"
                                             alt="{{ $project->project_name }}">
                                    @endif
                                </a>
                            </div>

                            <div class="services-content">
                                <h3>
                                    <a href="{{ route('home.projects.show', $project->slug) }}">{{ $project->project_name }}</a>
                                </h3>
                                @if($project->client_name)
                                    <p><strong>Client:</strong> {{ $project->client_name }}</p>
                                @endif
                                @if($project->location)
                                    <p><strong>Location:</strong> {{ $project->location }}</p>
                                @endif
                                <p>{{ Str::limit(strip_tags($project->project_description), 100) }}</p>

                                <a href="{{ route('home.projects.show', $project->slug) }}" class="read-more">
                                    View Project
                                    <i class="flaticon-right-arrow"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <div class="alert alert-info">
                            <p>No projects found. Please check back later.</p>
                        </div>
                    </div>
                @endforelse
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="pagination-area">
                        {{ $projects->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Projects Area -->
@endsection
