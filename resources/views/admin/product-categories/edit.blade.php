@extends('admin.layout.master')

@section('title', 'Edit Product Category')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Product Category</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.product-categories.update', $productCategory) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name"
                                class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name', $productCategory->name) }}" required>
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description"
                                class="form-control ckeditor @error('description') is-invalid @enderror">{{ old('description', $productCategory->description) }}</textarea>
                            @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="parent_id">Parent Category</label>
                            <select name="parent_id" id="parent_id"
                                class="form-control @error('parent_id') is-invalid @enderror">
                                <option value="">None</option>
                                @foreach ($parentCategories as $cat)
                                @if ($cat->id != $productCategory->id)
                                <option value="{{ $cat->id }}" {{ old('parent_id', $productCategory->parent_id) ==
                                    $cat->id ?
                                    'selected' : '' }}>{{ $cat->name }}</option>
                                @endif
                                @endforeach
                            </select>
                            @error('parent_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="image">Image</label>
                            @if ($productCategory->image)
                            <img src="{{ asset('storage/' . $productCategory->image) }}"
                                alt="{{ $productCategory->name }}" class="img-thumbnail mb-2" width="100">
                            @endif
                            <input type="file" name="image" id="image"
                                class="form-control-file @error('image') is-invalid @enderror">
                            @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="order">Order</label>
                            <input type="number" name="order" id="order"
                                class="form-control @error('order') is-invalid @enderror"
                                value="{{ old('order', $productCategory->order) }}">
                            @error('order')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control @error('status') is-invalid @enderror" required>
                                <option value="active" {{ old('status', $productCategory->status) == 'active' ?
                                    'selected' : ''
                                    }}>Active</option>
                                <option value="inactive" {{ old('status', $productCategory->status) == 'inactive' ?
                                    'selected'
                                    : '' }}>Inactive</option>
                            </select>
                            @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Meta Title</label>
                            <input type="text" name="meta_title"
                                class="form-control @error('meta_title') is-invalid @enderror"
                                value="{{ old('meta_title', $productCategory->meta_title) }}">
                            @error('meta_title')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Meta Description</label>
                            <textarea name="meta_description"
                                class="form-control @error('meta_description') is-invalid @enderror">{{ old('meta_description', $productCategory->meta_description) }}</textarea>
                            @error('meta_description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Meta Keywords</label>
                            <input type="text" name="meta_keywords"
                                class="form-control @error('meta_keywords') is-invalid @enderror"
                                value="{{ old('meta_keywords', $productCategory->meta_keywords) }}">
                            @error('meta_keywords')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update Category</button>
                            <a href="{{ route('admin.product-categories.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection