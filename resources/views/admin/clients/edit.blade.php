@extends('admin.layout.master')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Edit Client</h4>
                    </div>
                    <div>
                        <a href="{{ route('admin.clients.index') }}" class="btn btn-secondary">Back to Clients</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.clients.update', $client) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="name">Client Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" value="{{ old('name', $client->name) }}" required>
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="industry">Industry</label>
                                    <select class="form-control @error('industry') is-invalid @enderror" id="industry"
                                        name="industry">
                                        <option value="">Select Industry</option>
                                        @foreach($industries as $value => $label)
                                        <option value="{{ $value }}" {{ old('industry', $client->industry) == $value ?
                                            'selected' : '' }}>
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
                                        id="location" name="location" value="{{ old('location', $client->location) }}">
                                    @error('location')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="website_url">Website URL</label>
                                    <input type="text" class="form-control @error('website_url') is-invalid @enderror"
                                        id="website_url" name="website_url"
                                        value="{{ old('website_url', $client->website_url) }}">
                                    @error('website_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="partnership_start">Partnership Start Date</label>
                                    <input type="date"
                                        class="form-control @error('partnership_start') is-invalid @enderror"
                                        id="partnership_start" name="partnership_start"
                                        value="{{ old('partnership_start', $client->partnership_start?->format('Y-m-d')) }}">
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
                                    @if($client->logo)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $client->logo) }}" alt="{{ $client->name }}"
                                            class="img-thumbnail" style="max-height: 80px;">
                                        <small class="d-block text-muted">Current logo</small>
                                    </div>
                                    @endif
                                    @error('logo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="order">Order</label>
                                    <input type="number" class="form-control @error('order') is-invalid @enderror"
                                        id="order" name="order" value="{{ old('order', $client->order) }}" min="0">
                                    @error('order')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror"
                                        id="description" name="description"
                                        rows="4">{{ old('description', $client->description) }}</textarea>
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
                                        id="description_id" name="description_id"
                                        rows="4">{{ old('description_id', $client->description_id) }}</textarea>
                                    @error('description_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            @endif



                            <div class="col-md-12 mb-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="featured"
                                                name="featured" {{ old('featured', $client->featured) ? 'checked' : ''
                                            }}>
                                            <label class="form-check-label" for="featured">
                                                Featured Client
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="active" name="active" {{
                                                old('active', $client->active) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="active">
                                                Active
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">Update Client</button>
                            <a href="{{ route('admin.clients.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection