@extends('admin.layout.master')

@section('title', 'Newsletter Subscribers')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="header-title">
                        <h4 class="card-title">Newsletter Subscribers</h4>
                    </div>
                    <div>
                        <a href="{{ route('admin.newsletter-subscribers.create') }}" class="btn btn-primary">
                            <i class="ti ti-plus me-1"></i> Add New Subscriber
                        </a>
                        <a href="{{ route('admin.newsletter-subscribers.export') }}" class="btn btn-success ms-2">
                            <i class="ti ti-download me-1"></i> Export Subscribers
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <div class="alert alert-info" role="alert">
                                <i class="ti ti-info-circle me-2"></i>
                                <strong>Newsletter Subscribers</strong> are people who have signed up to receive your
                                newsletter.
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Date Subscribed</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($subscribers as $subscriber)
                                <tr>
                                    <td>{{ $subscriber->id }}</td>
                                    <td>{{ $subscriber->email }}</td>
                                    <td>
                                        @if ($subscriber->status == 'active')
                                        <span class="badge bg-success">Active</span>
                                        @else
                                        <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>{{ $subscriber->created_at->format('M d, Y H:i') }}</td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="{{ route('admin.newsletter-subscribers.edit', $subscriber->id) }}"
                                                class="btn btn-action-primary" data-bs-toggle="tooltip" title="Edit">
                                                <i class="ti ti-edit"></i>
                                            </a>
                                            <form
                                                action="{{ route('admin.newsletter-subscribers.destroy', $subscriber->id) }}"
                                                method="POST" class="d-inline"
                                                onsubmit="return confirm('Are you sure you want to delete this subscriber?');">
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
                                    <td colspan="5" class="text-center">No subscribers found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $subscribers->links() }}
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