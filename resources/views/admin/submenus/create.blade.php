@extends('admin.layout.master')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Create Submenu</h4>
                    </div>
                    <div>
                        <a href="{{ route('admin.submenus.index') }}" class="btn btn-primary">Back to Submenus</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.submenus.store') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="menu_id">Menu <span class="text-danger">*</span></label>
                                    <select class="form-control @error('menu_id') is-invalid @enderror" id="menu_id"
                                        name="menu_id" required>
                                        <option value="">Select Menu</option>
                                        @foreach($menus as $id => $name)
                                        <option value="{{ $id }}" {{ old('menu_id', request('menu_id'))==$id
                                            ? 'selected' : '' }}>{{ $name }}</option>
                                        @endforeach
                                    </select>
                                    @error('menu_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="name">Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" value="{{ old('name') }}" required>
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="type">Type <span class="text-danger">*</span></label>
                                    <select class="form-control @error('type') is-invalid @enderror" id="type"
                                        name="type" required>
                                        @foreach($types as $key => $value)
                                        <option value="{{ $key }}" {{ old('type')==$key ? 'selected' : '' }}>{{ $value
                                            }}</option>
                                        @endforeach
                                    </select>
                                    @error('type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="url">URL</label>
                                    <input type="text" class="form-control @error('url') is-invalid @enderror" id="url"
                                        name="url" value="{{ old('url') }}">
                                    <small class="form-text text-muted">For page type, use relative URL (e.g., /about).
                                        For link type, use full URL (e.g., https://example.com).</small>
                                    @error('url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="parent_id">Parent Submenu</label>
                                    <select class="form-control @error('parent_id') is-invalid @enderror" id="parent_id"
                                        name="parent_id">
                                        <option value="">None (Top Level)</option>
                                        @foreach($parents as $id => $name)
                                        <option value="{{ $id }}" {{ old('parent_id')==$id ? 'selected' : '' }}>{{ $name
                                            }}</option>
                                        @endforeach
                                    </select>
                                    @error('parent_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="order">Order</label>
                                    <input type="number" class="form-control @error('order') is-invalid @enderror"
                                        id="order" name="order" value="{{ old('order', 0) }}">
                                    @error('order')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="active">Status</label>
                                    <div class="form-check form-switch mt-2">
                                        <input class="form-check-input" type="checkbox" id="active" name="active"
                                            value="1" {{ old('active') ? 'checked' : 'checked' }}>
                                        <label class="form-check-label" for="active">Active</label>
                                    </div>
                                    @error('active')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">Create Submenu</button>
                            <a href="{{ route('admin.submenus.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection