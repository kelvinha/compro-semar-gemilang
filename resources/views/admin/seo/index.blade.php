@extends('admin.layout.master')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="header-title">
                        <h4 class="card-title">SEO Settings</h4>
                    </div>
                </div>
                <div class="card-body">
                    <p>Manage your website SEO settings here.</p>

                    <form action="{{ route('admin.seo.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            @foreach($seoSettings as $setting)
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="{{ $setting->key }}">{{ $setting->display_name }}</label>

                                    @if($setting->type == 'text')
                                    <input type="text" class="form-control" id="{{ $setting->key }}"
                                        name="{{ $setting->key }}" value="{{ $setting->value }}">
                                    @elseif($setting->type == 'textarea')
                                    <textarea class="form-control" id="{{ $setting->key }}" name="{{ $setting->key }}"
                                        rows="3">{{ $setting->value }}</textarea>
                                    @elseif($setting->type == 'image')
                                    <div class="mb-2">
                                        @if($setting->value)
                                        <img src="{{ asset('storage/' . $setting->value) }}"
                                            alt="{{ $setting->display_name }}" class="img-thumbnail"
                                            style="max-height: 100px;">
                                        @endif
                                    </div>
                                    <input type="file" class="form-control" id="{{ $setting->key }}"
                                        name="{{ $setting->key }}">
                                    @elseif($setting->type == 'boolean')
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="{{ $setting->key }}"
                                            name="{{ $setting->key }}" value="1" {{ $setting->value ? 'checked' : '' }}>
                                    </div>
                                    @endif

                                    @if($setting->description)
                                    <small class="form-text text-muted">{{ $setting->description }}</small>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary btn-lg">Save SEO Settings</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="header-title">
                        <h4 class="card-title">SEO Best Practices</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Meta Title</h5>
                            <ul>
                                <li>Keep it under 60 characters</li>
                                <li>Include your main keyword</li>
                                <li>Make it unique for each page</li>
                            </ul>

                            <h5>Meta Description</h5>
                            <ul>
                                <li>Keep it under 160 characters</li>
                                <li>Include your main keyword</li>
                                <li>Make it compelling to increase click-through rates</li>
                            </ul>
                        </div>

                        <div class="col-md-6">
                            <h5>Open Graph (OG) Tags</h5>
                            <ul>
                                <li>Used for social media sharing</li>
                                <li>OG Image should be at least 1200x630 pixels</li>
                                <li>OG Title and Description should be compelling</li>
                            </ul>

                            <h5>Other Tips</h5>
                            <ul>
                                <li>Use canonical URLs to avoid duplicate content</li>
                                <li>Use schema markup for rich snippets</li>
                                <li>Ensure your website is mobile-friendly</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection