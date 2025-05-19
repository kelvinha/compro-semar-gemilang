@extends('admin.layout.master')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Create Blog Post</h4>
                    </div>
                    <div>
                        <a href="{{ route('admin.blogs.index') }}" class="btn btn-primary">Back to Blog Posts</a>
                    </div>
                </div>
                <div class="card-body">
                    @if (isset($isMultilingual) && $isMultilingual)
                    <div class="mb-4">
                        <div class="btn-group" role="group">
                            <a href="{{ route('admin.blogs.create', ['lang' => 'en']) }}"
                                class="btn {{ $language == 'en' ? 'btn-primary' : 'btn-outline-primary' }}">English</a>
                            <a href="{{ route('admin.blogs.create', ['lang' => 'id']) }}"
                                class="btn {{ $language == 'id' ? 'btn-primary' : 'btn-outline-primary' }}">Indonesian</a>
                        </div>
                    </div>
                    @endif

                    <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="lang" value="{{ $language ?? 'en' }}">

                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group mb-3">
                                    <label for="title">Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        id="title" name="title" value="{{ old('title') }}" required>
                                    @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                @if (isset($isMultilingual) && $isMultilingual && $language == 'id')
                                <div class="form-group mb-3">
                                    <label for="title_id">Title (Indonesian) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('title_id') is-invalid @enderror"
                                        id="title_id" name="title_id" value="{{ old('title_id') }}" required>
                                    @error('title_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                @endif

                                <div class="form-group mb-3">
                                    <label for="excerpt">Excerpt</label>
                                    <textarea class="form-control @error('excerpt') is-invalid @enderror" id="excerpt"
                                        name="excerpt" rows="3">{{ old('excerpt') }}</textarea>
                                    <small class="form-text text-muted">A short summary of the blog post.</small>
                                    @error('excerpt')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                @if (isset($isMultilingual) && $isMultilingual && $language == 'id')
                                <div class="form-group mb-3">
                                    <label for="excerpt_id">Excerpt (Indonesian)</label>
                                    <textarea class="form-control @error('excerpt_id') is-invalid @enderror"
                                        id="excerpt_id" name="excerpt_id" rows="3">{{ old('excerpt_id') }}</textarea>
                                    <small class="form-text text-muted">A short summary of the blog post in
                                        Indonesian.</small>
                                    @error('excerpt_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                @endif

                                <div class="form-group mb-3">
                                    <label for="content">Content <span class="text-danger">*</span></label>
                                    <textarea class="form-control ckeditor @error('content') is-invalid @enderror"
                                        id="content" name="content" rows="10">{{ old('content') }}</textarea>
                                    @error('content')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                @if (isset($isMultilingual) && $isMultilingual && $language == 'id')
                                <div class="form-group mb-3">
                                    <label for="content_id">Content (Indonesian) <span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control ckeditor @error('content_id') is-invalid @enderror"
                                        id="content_id" name="content_id" rows="10">{{ old('content_id') }}</textarea>
                                    @error('content_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                @endif
                            </div>

                            <div class="col-md-4">
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <h5 class="mb-0">Publish</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group mb-3">
                                            <label for="status">Status</label>
                                            <select class="form-control @error('status') is-invalid @enderror"
                                                id="status" name="status">
                                                @foreach ($statuses as $key => $value)
                                                <option value="{{ $key }}" {{ old('status', 'draft' )==$key ? 'selected'
                                                    : '' }}>
                                                    {{ $value }}</option>
                                                @endforeach
                                            </select>
                                            @error('status')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3" id="published_at_group" style="display: none;">
                                            <label for="published_at">Publish Date</label>
                                            <input type="datetime-local"
                                                class="form-control @error('published_at') is-invalid @enderror"
                                                id="published_at" name="published_at" value="{{ old('published_at') }}">
                                            @error('published_at')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-check form-switch mb-3">
                                            <input class="form-check-input" type="checkbox" id="featured"
                                                name="featured" value="1" {{ old('featured') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="featured">Featured</label>
                                        </div>

                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary btn-lg">Save Blog Post</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="card mb-3">
                                    <div class="card-header">
                                        <h5 class="mb-0">Category</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <select class="form-control @error('category_id') is-invalid @enderror"
                                                id="category_id" name="category_id">
                                                <option value="">Select Category</option>
                                                @foreach ($categories as $id => $name)
                                                <option value="{{ $id }}" {{ old('category_id')==$id ? 'selected' : ''
                                                    }}>
                                                    {{ $name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="card mb-3">
                                    <div class="card-header">
                                        <h5 class="mb-0">Featured Image</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <input type="file"
                                                class="form-control @error('featured_image') is-invalid @enderror"
                                                id="featured_image" name="featured_image">
                                            <small class="form-text text-muted">Recommended size: 1200x630
                                                pixels.</small>
                                            @error('featured_image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="card mb-3">
                                    <div class="card-header">
                                        <h5 class="mb-0">SEO Settings</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group mb-3">
                                            <label for="meta_title">Meta Title</label>
                                            <input type="text"
                                                class="form-control @error('meta_title') is-invalid @enderror"
                                                id="meta_title" name="meta_title" value="{{ old('meta_title') }}">
                                            @error('meta_title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="meta_description">Meta Description</label>
                                            <textarea
                                                class="form-control @error('meta_description') is-invalid @enderror"
                                                id="meta_description" name="meta_description"
                                                rows="3">{{ old('meta_description') }}</textarea>
                                            @error('meta_description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="meta_keywords">Meta Keywords</label>
                                            <input type="text"
                                                class="form-control @error('meta_keywords') is-invalid @enderror"
                                                id="meta_keywords" name="meta_keywords"
                                                value="{{ old('meta_keywords') }}">
                                            @error('meta_keywords')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="og_image">OG Image</label>
                                            <input type="file"
                                                class="form-control @error('og_image') is-invalid @enderror"
                                                id="og_image" name="og_image">
                                            <small class="form-text text-muted">Recommended size: 1200x630
                                                pixels.</small>
                                            @error('og_image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="card mb-3">
                                    <div class="card-header">
                                        <h5 class="mb-0">Actions</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <a href="{{ route('admin.blogs.index') }}"
                                                class="btn btn-secondary btn-lg">Cancel</a>
                                            <button type="submit" class="btn btn-primary btn-lg">Save Blog Post</button>
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
            const statusSelect = document.getElementById('status');
            const publishedAtGroup = document.getElementById('published_at_group');

            function togglePublishedAt() {
                if (statusSelect.value === 'scheduled') {
                    publishedAtGroup.style.display = 'block';
                } else {
                    publishedAtGroup.style.display = 'none';
                }
            }

            togglePublishedAt();

            statusSelect.addEventListener('change', togglePublishedAt);
        });
</script>
@endsection