@extends('admin.layout.master')

@section('title', 'Edit Project')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Project</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group">
                            <label for="project_name">Project Name</label>
                            <input type="text" name="project_name" id="project_name" class="form-control @error('project_name') is-invalid @enderror" value="{{ old('project_name', $project->project_name) }}" required>
                            @error('project_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="client_name">Client Name</label>
                            <input type="text" name="client_name" id="client_name" class="form-control @error('client_name') is-invalid @enderror" value="{{ old('client_name', $project->client_name) }}">
                            @error('client_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="project_main_image">Main Image</label>
                            @if ($project->project_main_image)
                                <img src="{{ asset('storage/' . $project->project_main_image) }}" alt="{{ $project->project_name }}" class="img-thumbnail mb-2" width="100">
                            @endif
                            <input type="file" name="project_main_image" id="project_main_image" class="form-control-file @error('project_main_image') is-invalid @enderror">
                            @error('project_main_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="project_gallery_images">Gallery Images</label>
                            @if ($project->project_gallery_images)
                                <div class="row mb-2">
                                    @foreach ($project->project_gallery_images as $image)
                                        <div class="col-md-3">
                                            <div class="card">
                                                <img src="{{ asset('storage/' . $image) }}" class="card-img-top" alt="Gallery Image">
                                                <div class="card-body">
                                                    <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="delete_gallery[]" value="{{ $image }}">
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this image?')">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                            <input type="file" name="project_gallery_images[]" id="project_gallery_images" class="form-control-file @error('project_gallery_images') is-invalid @enderror" multiple>
                            @error('project_gallery_images')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="project_description">Project Description</label>
                            <textarea name="project_description" id="project_description" class="form-control ckeditor @error('project_description') is-invalid @enderror">{{ old('project_description', $project->project_description) }}</textarea>
                            @error('project_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="completion_date">Completion Date</label>
                            <input type="date" name="completion_date" id="completion_date" class="form-control @error('completion_date') is-invalid @enderror" value="{{ old('completion_date', $project->completion_date ? $project->completion_date->format('Y-m-d') : '') }}">
                            @error('completion_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="location">Location</label>
                            <input type="text" name="location" id="location" class="form-control @error('location') is-invalid @enderror" value="{{ old('location', $project->location) }}">
                            @error('location')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="order">Order</label>
                            <input type="number" name="order" id="order" class="form-control @error('order') is-invalid @enderror" value="{{ old('order', $project->order) }}">
                            @error('order')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control @error('status') is-invalid @enderror" required>
                                <option value="active" {{ old('status', $project->status) == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ old('status', $project->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Featured</label>
                            <div class="form-check">
                                <input type="checkbox" name="featured" class="form-check-input" {{ old('featured', $project->featured) ? 'checked' : '' }}>
                                <label class="form-check-label">Mark as Featured</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Meta Title</label>
                            <input type="text" name="meta_title" class="form-control @error('meta_title') is-invalid @enderror" value="{{ old('meta_title', $project->meta_title) }}">
                            @error('meta_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Meta Description</label>
                            <textarea name="meta_description" class="form-control @error('meta_description') is-invalid @enderror">{{ old('meta_description', $project->meta_description) }}</textarea>
                            @error('meta_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Meta Keywords</label>
                            <input type="text" name="meta_keywords" class="form-control @error('meta_keywords') is-invalid @enderror" value="{{ old('meta_keywords', $project->meta_keywords) }}">
                            @error('meta_keywords')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update Project</button>
                            <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
