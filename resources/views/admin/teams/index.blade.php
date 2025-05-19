@extends('admin.layout.master')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="header-title">
                        <h4 class="card-title">Team Members</h4>
                    </div>
                    <div>
                        <a href="{{ route('admin.teams.create') }}" class="btn btn-primary">
                            <i class="ti ti-plus me-1"></i> Add New Team Member
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <div class="alert alert-info" role="alert">
                                <i class="ti ti-info-circle me-2"></i>
                                <strong>Team Members</strong> are displayed on the website to showcase your
                                organization's staff or team.
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Status</th>
                                    <th>Order</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($teams as $team)
                                <tr>
                                    <td>
                                        <img src="{{ $team->photo_url }}" alt="{{ $team->name }}" class="img-thumbnail"
                                            style="max-width: 50px; max-height: 50px;">
                                    </td>
                                    <td>{{ $team->name }}</td>
                                    <td>{{ $team->position }}</td>
                                    <td>
                                        <span class="badge bg-{{ $team->status == 'active' ? 'success' : 'danger' }}">
                                            {{ ucfirst($team->status) }}
                                        </span>
                                    </td>
                                    <td>{{ $team->order }}</td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="{{ route('admin.teams.show', $team) }}" class="btn btn-action-info"
                                                data-bs-toggle="tooltip" title="View">
                                                <i class="ti ti-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.teams.edit', $team) }}"
                                                class="btn btn-action-primary" data-bs-toggle="tooltip" title="Edit">
                                                <i class="ti ti-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.teams.destroy', $team) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Are you sure you want to delete this team member?');">
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
                                    <td colspan="6" class="text-center">No team members found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $teams->links() }}
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