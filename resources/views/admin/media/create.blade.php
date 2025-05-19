@extends('admin.layout.master')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Upload Media</h4>
                    </div>
                    <div>
                        <a href="{{ route('admin.media.index') }}" class="btn btn-primary">Back to Media Library</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.media.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="file">File <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control @error('file') is-invalid @enderror"
                                        id="file" name="file" required>
                                    <small class="form-text text-muted">Max file size: 10MB</small>
                                    @error('file')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" value="{{ old('name') }}">
                                    <small class="form-text text-muted">Leave empty to use the original file
                                        name.</small>
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="alt_text">Alt Text</label>
                                    <input type="text" class="form-control @error('alt_text') is-invalid @enderror"
                                        id="alt_text" name="alt_text" value="{{ old('alt_text') }}">
                                    <small class="form-text text-muted">Alternative text for accessibility.</small>
                                    @error('alt_text')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="caption">Caption</label>
                                    <input type="text" class="form-control @error('caption') is-invalid @enderror"
                                        id="caption" name="caption" value="{{ old('caption') }}">
                                    @error('caption')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">Upload Media</button>
                            <a href="{{ route('admin.media.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">
                    <h4 class="card-title">Bulk Upload</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="dropzone-container border rounded p-4 text-center">
                                <div class="dz-message">
                                    <i class="ti ti-upload fs-1 text-primary mb-2"></i>
                                    <h5>Drop files here or click to upload</h5>
                                    <p class="text-muted">Upload multiple files at once</p>
                                </div>
                                <div class="fallback">
                                    <input name="file" type="file" multiple />
                                </div>
                                <div class="dropzone-previews mt-3"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection