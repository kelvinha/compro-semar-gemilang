@extends('admin.layout.master')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Banner Management</h4>
                    </div>
                    <div>
                        <a href="{{ route('admin.banners.create') }}" class="btn btn-primary">Add New Banner</a>
                    </div>
                </div>
                <div class="card-body">
                    @if($banners->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Type</th>
                                    <th>Order</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($banners as $banner)
                                <tr>
                                    <td>
                                        @if($banner->image)
                                        <img src="{{ asset('storage/' . $banner->image) }}" alt="{{ $banner->title }}" 
                                             class="img-thumbnail" style="max-width: 80px; max-height: 60px;">
                                        @else
                                        <span class="text-muted">No image</span>
                                        @endif
                                    </td>
                                    <td>
                                        <strong>{{ $banner->title }}</strong>
                                        @if($banner->subtitle)
                                        <br><small class="text-muted">{{ Str::limit($banner->subtitle, 50) }}</small>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge bg-info">{{ ucfirst($banner->type) }}</span>
                                    </td>
                                    <td>{{ $banner->order }}</td>
                                    <td>
                                        @if($banner->active)
                                        <span class="badge bg-success">Active</span>
                                        @else
                                        <span class="badge bg-secondary">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.banners.show', $banner) }}" 
                                               class="btn btn-sm btn-outline-info" title="View">
                                                <i class="ti ti-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.banners.edit', $banner) }}" 
                                               class="btn btn-sm btn-outline-primary" title="Edit">
                                                <i class="ti ti-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.banners.destroy', $banner) }}" 
                                                  method="POST" class="d-inline"
                                                  onsubmit="return confirm('Are you sure you want to delete this banner?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                                    <i class="ti ti-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="text-center py-4">
                        <i class="ti ti-photo-off fs-1 text-muted"></i>
                        <h5 class="mt-2">No banners found</h5>
                        <p class="text-muted">Create your first banner to get started.</p>
                        <a href="{{ route('admin.banners.create') }}" class="btn btn-primary">Add New Banner</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
