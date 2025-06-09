@extends('admin.layout.master')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Create New Client</h4>
                    </div>
                    <div>
                        <a href="{{ route('admin.clients.index') }}" class="btn btn-secondary">Back to Clients</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.clients.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="name">Client Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" value="{{ old('name') }}" required>
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="industry">Industry</label>
                                    <select class="form-control @error('industry') is-invalid @enderror"
                                        id="industry" name="industry">
                                        <option value="">Select Industry</option>
                                        @foreach($industries as $value => $label)
                                        <option value="{{ $value }}" {{ old('industry') == $value ? 'selected' : '' }}>
                                            {{ $label }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('industry')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="location">Location</label>
                                    <input type="text" class="form-control @error('location') is-invalid @enderror"
                                        id="location" name="location" value="{{ old('location') }}">
                                    @error('location')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="website_url">Website URL</label>
                                    <input type="url" class="form-control @error('website_url') is-invalid @enderror"
                                        id="website_url" name="website_url" value="{{ old('website_url') }}">
                                    @error('website_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="partnership_start">Partnership Start Date</label>
                                    <input type="date" class="form-control @error('partnership_start') is-invalid @enderror"
                                        id="partnership_start" name="partnership_start" value="{{ old('partnership_start') }}">
                                    @error('partnership_start')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="logo">Client Logo</label>
                                    <input type="file" class="form-control @error('logo') is-invalid @enderror"
                                        id="logo" name="logo" accept="image/*">
                                    <small class="form-text text-muted">Recommended: Square logo, max 2MB</small>
                                    @error('logo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="order">Order</label>
                                    <input type="number" class="form-control @error('order') is-invalid @enderror"
                                        id="order" name="order" value="{{ old('order', 0) }}" min="0">
                                    @error('order')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror"
                                        id="description" name="description" rows="4">{{ old('description') }}</textarea>
                                    @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            @if($isMultilingual)
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label for="description_id">Description (Indonesian)</label>
                                    <textarea class="form-control @error('description_id') is-invalid @enderror"
                                        id="description_id" name="description_id" rows="4">{{ old('description_id') }}</textarea>
                                    @error('description_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            @endif

                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="contact_info">Contact Information (JSON)</label>
                                    <textarea class="form-control @error('contact_info') is-invalid @enderror"
                                        id="contact_info" name="contact_info" rows="3" 
                                        placeholder='{"email": "contact@client.com", "phone": "+1234567890"}'>{{ old('contact_info') }}</textarea>
                                    <small class="form-text text-muted">Enter contact details in JSON format</small>
                                    @error('contact_info')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="services_provided">Services Provided (JSON)</label>
                                    <textarea class="form-control @error('services_provided') is-invalid @enderror"
                                        id="services_provided" name="services_provided" rows="3" 
                                        placeholder='["Web Development", "SEO", "Digital Marketing"]'>{{ old('services_provided') }}</textarea>
                                    <small class="form-text text-muted">Enter services as JSON array</small>
                                    @error('services_provided')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="featured" name="featured" 
                                                {{ old('featured') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="featured">
                                                Featured Client
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="active" name="active" 
                                                {{ old('active', true) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="active">
                                                Active
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">Create Client</button>
                            <a href="{{ route('admin.clients.index') }}" class="btn btn-secondary">Cancel</a>
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
    // JSON validation for contact_info and services_provided
    const contactInfoField = document.getElementById('contact_info');
    const servicesProvidedField = document.getElementById('services_provided');

    function validateJSON(field) {
        field.addEventListener('blur', function() {
            const value = this.value.trim();
            if (value) {
                try {
                    JSON.parse(value);
                    this.classList.remove('is-invalid');
                    this.classList.add('is-valid');
                } catch (e) {
                    this.classList.remove('is-valid');
                    this.classList.add('is-invalid');
                }
            } else {
                this.classList.remove('is-invalid', 'is-valid');
            }
        });
    }

    if (contactInfoField) validateJSON(contactInfoField);
    if (servicesProvidedField) validateJSON(servicesProvidedField);
});
</script>
@endsection
