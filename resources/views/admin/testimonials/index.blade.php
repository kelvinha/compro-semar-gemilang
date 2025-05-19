@extends('admin.layout.master')

@section('title', 'Testimonials')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="header-title">
                        <h4 class="card-title">Testimonials</h4>
                    </div>
                    <div>
                        <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary">
                            <i class="ti ti-plus me-1"></i> Add New Testimonial
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <div class="alert alert-info" role="alert">
                                <i class="ti ti-info-circle me-2"></i>
                                <strong>Testimonials</strong> are displayed on the website to showcase feedback from
                                clients or customers.
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Title</th>
                                    <th>Company</th>
                                    <th>Status</th>
                                    <th>Order</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($testimonials as $testimonial)
                                <tr>
                                    <td>
                                        @if($testimonial->image)
                                        <img src="{{ asset('storage/' . $testimonial->image) }}"
                                            alt="{{ $testimonial->name }}" class="img-thumbnail"
                                            style="max-width: 50px; max-height: 50px;">
                                        @else
                                        <span class="badge bg-light text-dark">No Image</span>
                                        @endif
                                    </td>
                                    <td>{{ $testimonial->name }}</td>
                                    <td>{{ $testimonial->title }}</td>
                                    <td>{{ $testimonial->company }}</td>
                                    <td>
                                        <span class="badge bg-{{ $testimonial->status ? 'success' : 'danger' }}">
                                            {{ $testimonial->status ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td>{{ $testimonial->order }}</td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="{{ route('admin.testimonials.edit', $testimonial) }}"
                                                class="btn btn-action-primary" data-bs-toggle="tooltip" title="Edit">
                                                <i class="ti ti-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.testimonials.destroy', $testimonial) }}"
                                                method="POST" class="d-inline"
                                                onsubmit="return confirm('Are you sure you want to delete this testimonial?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-action-danger"
                                                    data-bs-toggle="tooltip" title="Delete">
                                                    <i class="ti ti-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">No testimonials found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $testimonials->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Initialize tooltips
    document.addEventListener('DOMContentLoaded', function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</script>
@endsection