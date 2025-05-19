@extends('admin.layout.master')

@section('title', 'Services')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Services</h4>
                    <div class="card-tools">
                        <a href="{{ route('admin.services.create') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Add New Service
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Icon</th>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Featured</th>
                                    <th>Order</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($services as $service)
                                    <tr>
                                        <td>{{ $service->id }}</td>
                                        <td>
                                            @if ($service->icon)
                                                <img src="{{ asset('storage/' . $service->icon) }}" alt="{{ $service->title }}" width="50">
                                            @else
                                                <span class="badge bg-secondary">No Icon</span>
                                            @endif
                                        </td>
                                        <td>{{ $service->title }}</td>
                                        <td>
                                            @if ($service->status == 'active')
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($service->featured)
                                                <span class="badge bg-info">Featured</span>
                                            @else
                                                <span class="badge bg-secondary">Not Featured</span>
                                            @endif
                                        </td>
                                        <td>{{ $service->order }}</td>
                                        <td>
                                            <a href="{{ route('admin.services.edit', $service->id) }}" class="btn btn-sm btn-info">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this service?')">
                                                    <i class="fas fa-trash"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">No services found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $services->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
