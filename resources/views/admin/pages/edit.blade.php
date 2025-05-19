@extends('admin.layout.master')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="header-title">
                        <h4 class="card-title mb-0">Edit Page: {{ $page->name }}</h4>
                    </div>
                    <div class="d-flex gap-2">
                        <a href="{{ route('admin.pages.sections', $page) }}" class="btn btn-outline-primary">
                            <i class="ti ti-layout-grid me-1"></i> Manage Sections
                        </a>
                        <a href="{{ route('admin.pages.index') }}" class="btn btn-outline-secondary">
                            <i class="ti ti-arrow-left me-1"></i> Back to Pages
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.pages.update', $page) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-lg-8">
                                <!-- Main Content Card -->
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <h5 class="mb-0">Page Information</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group mb-4">
                                            <label for="name" class="form-label fw-bold">Page Title <span
                                                    class="text-danger">*</span></label>
                                            <input type="text"
                                                class="form-control form-control-lg @error('name') is-invalid @enderror"
                                                id="name" name="name" value="{{ old('name', $page->name) }}" required
                                                placeholder="Enter page title">
                                            @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-4">
                                            <label for="url" class="form-label fw-bold">URL <span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group input-group-lg">
                                                <span class="input-group-text bg-light">{{ url('/') }}</span>
                                                <input type="text"
                                                    class="form-control @error('url') is-invalid @enderror" id="url"
                                                    name="url" value="{{ old('url', $page->url) }}" required
                                                    placeholder="e.g., /about-us">
                                            </div>
                                            <div class="form-text text-muted">The URL path for this page. Will be
                                                automatically generated from the title if left empty.</div>
                                            @error('url')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="row mb-4">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="order" class="form-label fw-bold">Display Order <span
                                                            class="text-danger">*</span></label>
                                                    <input type="number"
                                                        class="form-control @error('order') is-invalid @enderror"
                                                        id="order" name="order" value="{{ old('order', $page->order) }}"
                                                        required>
                                                    <div class="form-text text-muted">Lower numbers will be displayed
                                                        first</div>
                                                    @error('order')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="options" class="form-label fw-bold">Additional Options</label>
                                            <textarea class="form-control @error('options') is-invalid @enderror"
                                                id="options" name="options" rows="4"
                                                placeholder="{&quot;key&quot;: &quot;value&quot;}">{{ old('options', $page->options ?? '') }}</textarea>
                                            <div class="form-text text-muted">Optional: Add any additional configuration
                                                in JSON format</div>
                                            @error('options')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <!-- Status Card -->
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <h5 class="mb-0">Publishing</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check form-switch mb-3">
                                            <input type="checkbox" class="form-check-input" id="active" name="active"
                                                value="1" {{ $page->active ? 'checked' : '' }}>
                                            <label class="form-check-label" for="active">Make this page active</label>
                                        </div>
                                        <hr>
                                        <div class="d-grid gap-2">
                                            <button type="submit" class="btn btn-primary btn-lg">
                                                <i class="ti ti-device-floppy me-1"></i> Update Page
                                            </button>
                                            <a href="{{ route('admin.pages.index') }}" class="btn btn-light">
                                                <i class="ti ti-arrow-left me-1"></i> Cancel
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <!-- SEO Card -->
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h5 class="mb-0">SEO Settings</h5>
                                        <button type="button" class="btn btn-sm btn-light" data-bs-toggle="collapse"
                                            data-bs-target="#seoSettings">
                                            <i class="ti ti-chevron-down"></i>
                                        </button>
                                    </div>
                                    <div id="seoSettings" class="collapse show">
                                        <div class="card-body">
                                            <div class="form-group mb-4">
                                                <label for="meta_title" class="form-label fw-bold">Meta Title</label>
                                                <input type="text"
                                                    class="form-control @error('meta_title') is-invalid @enderror"
                                                    id="meta_title" name="meta_title"
                                                    value="{{ old('title', optional($page->seo)->title) }}"
                                                    placeholder="Enter meta title">
                                                <div class="form-text text-muted">Recommended length: 50-60 characters
                                                </div>
                                                @error('title')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-4">
                                                <label for="meta_description" class="form-label fw-bold">Meta
                                                    Description</label>
                                                <textarea
                                                    class="form-control @error('meta_description') is-invalid @enderror"
                                                    id="meta_description" name="meta_description" rows="3"
                                                    placeholder="Enter meta description">{{ old('description', optional($page->seo)->description) }}</textarea>
                                                <div class="form-text text-muted">Recommended length: 150-160 characters
                                                </div>
                                                @error('description')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-4">
                                                <label for="meta_keywords" class="form-label fw-bold">Meta
                                                    Keywords</label>
                                                <input type="text"
                                                    class="form-control @error('meta_keywords') is-invalid @enderror"
                                                    id="meta_keywords" name="meta_keywords"
                                                    value="{{ old('keywords', optional($page->seo)->keywords) }}"
                                                    placeholder="keyword1, keyword2, keyword3">
                                                <div class="form-text text-muted">Separate keywords with commas</div>
                                                @error('keywords')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="og_image" class="form-label fw-bold">Social Media
                                                    Image</label>
                                                @if(optional($page->seo)->og_image)
                                                <div class="mb-2">
                                                    <img src="{{ Storage::url($page->seo->og_image) }}"
                                                        alt="Current OG Image" class="img-thumbnail"
                                                        style="max-width: 200px;">
                                                </div>
                                                @endif
                                                <input type="file"
                                                    class="form-control @error('og_image') is-invalid @enderror"
                                                    id="og_image" name="og_image">
                                                <div class="form-text text-muted">Recommended size: 1200x630 pixels
                                                </div>
                                                @error('og_image')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
    const nameInput = document.getElementById('name');
    const urlInput = document.getElementById('url');
    
    nameInput.addEventListener('blur', function() {
        if (urlInput.value === '') {
            urlInput.value = '/' + nameInput.value.toLowerCase()
                .replace(/[\W_]+/g, '-')
                .replace(/^-+|-+$/g, '');
        }
    });

    // Character count for meta title and description
    const metaTitleInput = document.getElementById('meta_title');
    const metaDescInput = document.getElementById('meta_description');

    function updateCharCount(input, recommended) {
        const count = input.value.length;
        const helpText = input.nextElementSibling;
        const [min, max] = recommended;
        
        if (count < min) {
            helpText.classList.add('text-warning');
            helpText.classList.remove('text-danger', 'text-success');
        } else if (count > max) {
            helpText.classList.add('text-danger');
            helpText.classList.remove('text-warning', 'text-success');
        } else {
            helpText.classList.add('text-success');
            helpText.classList.remove('text-warning', 'text-danger');
        }
        
        helpText.textContent = `${count} characters (recommended: ${min}-${max})`;
    }

    if (metaTitleInput) {
        metaTitleInput.addEventListener('input', () => updateCharCount(metaTitleInput, [50, 60]));
        // Initial count
        updateCharCount(metaTitleInput, [50, 60]);
    }
    
    if (metaDescInput) {
        metaDescInput.addEventListener('input', () => updateCharCount(metaDescInput, [150, 160]));
        // Initial count
        updateCharCount(metaDescInput, [150, 160]);
    }
});
</script>
@endsection