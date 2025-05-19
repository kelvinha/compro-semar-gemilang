@extends('admin.layout.master')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="header-title">
                        <h4 class="card-title">Add New Team Member</h4>
                    </div>
                    <div>
                        <a href="{{ route('admin.teams.index') }}" class="btn btn-outline-primary">
                            <i class="ti ti-arrow-left me-1"></i> Back to List
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.teams.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" value="{{ old('name') }}" required>
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="position" class="form-label">Position</label>
                                    <input type="text" class="form-control @error('position') is-invalid @enderror"
                                        id="position" name="position" value="{{ old('position') }}">
                                    @error('position')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="photo" class="form-label">Photo</label>
                                    <div class="custom-file-upload">
                                        <input type="file"
                                            class="form-control file-upload-input @error('photo') is-invalid @enderror"
                                            id="photo" name="photo" accept="image/*">
                                        <div class="file-upload-preview mt-2">
                                            <div class="no-file">No photo uploaded</div>
                                        </div>
                                    </div>
                                    <small class="form-text text-muted">Recommended size: 300x300px</small>
                                    @error('photo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="order" class="form-label">Order</label>
                                            <input type="number"
                                                class="form-control @error('order') is-invalid @enderror" id="order"
                                                name="order" value="{{ old('order', 0) }}" min="0">
                                            @error('order')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="status" class="form-label">Status <span
                                                    class="text-danger">*</span></label>
                                            <select class="form-select @error('status') is-invalid @enderror"
                                                id="status" name="status" required>
                                                <option value="active" {{ old('status')=='active' ? 'selected' : '' }}>
                                                    Active</option>
                                                <option value="inactive" {{ old('status')=='inactive' ? 'selected' : ''
                                                    }}>Inactive</option>
                                            </select>
                                            @error('status')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror"
                                        id="description" name="description" rows="5">{{ old('description') }}</textarea>
                                    @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="ti ti-device-floppy me-1"></i> Save Team Member
                            </button>
                            <a href="{{ route('admin.teams.index') }}" class="btn btn-outline-secondary ms-2">
                                <i class="ti ti-x me-1"></i> Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Initialize file upload preview
    document.addEventListener('DOMContentLoaded', function() {
        const photoInput = document.getElementById('photo');
        const previewContainer = document.querySelector('.file-upload-preview');

        photoInput.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                const file = this.files[0];
                const reader = new FileReader();

                reader.onload = function(e) {
                    previewContainer.innerHTML = `
                        <img src="${e.target.result}" class="img-thumbnail" style="max-height: 150px;">
                        <span class="file-name">${file.name}</span>
                    `;
                };

                reader.readAsDataURL(file);
            } else {
                previewContainer.innerHTML = `<div class="no-file">No photo uploaded</div>`;
            }
        });

        // Initialize CKEditor for description if available
        if (typeof ClassicEditor !== 'undefined') {
            ClassicEditor
                .create(document.querySelector('#description'))
                .catch(error => {
                    console.error(error);
                });
        }
    });
</script>
@endsection