@extends('admin.layout.master')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="header-title">
                        <h4 class="card-title">Team Member Details</h4>
                    </div>
                    <div>
                        <a href="{{ route('admin.teams.index') }}" class="btn btn-outline-primary">
                            <i class="ti ti-arrow-left me-1"></i> Back to List
                        </a>
                        <a href="{{ route('admin.teams.edit', $team) }}" class="btn btn-primary ms-2">
                            <i class="ti ti-edit me-1"></i> Edit
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 text-center mb-4">
                            <div class="team-photo-container mb-3">
                                <img src="{{ $team->photo_url }}" alt="{{ $team->name }}" class="img-fluid rounded"
                                    style="max-height: 300px;">
                            </div>
                            <h4 class="mb-1">{{ $team->name }}</h4>
                            @if($team->position)
                            <p class="text-muted">{{ $team->position }}</p>
                            @endif
                            <div class="mt-3">
                                <span class="badge bg-{{ $team->status == 'active' ? 'success' : 'danger' }} px-3 py-2">
                                    {{ ucfirst($team->status) }}
                                </span>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">Information</h5>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <th style="width: 150px;">Name</th>
                                                <td>{{ $team->name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Position</th>
                                                <td>{{ $team->position ?: 'N/A' }}</td>
                                            </tr>
                                            <tr>
                                                <th>Status</th>
                                                <td>
                                                    <span
                                                        class="badge bg-{{ $team->status == 'active' ? 'success' : 'danger' }}">
                                                        {{ ucfirst($team->status) }}
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Order</th>
                                                <td>{{ $team->order }}</td>
                                            </tr>
                                            <tr>
                                                <th>Created At</th>
                                                <td>{{ $team->created_at->format('F d, Y H:i:s') }}</td>
                                            </tr>
                                            <tr>
                                                <th>Updated At</th>
                                                <td>{{ $team->updated_at->format('F d, Y H:i:s') }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            @if($team->description)
                            <div class="card mt-4">
                                <div class="card-header">
                                    <h5 class="mb-0">Description</h5>
                                </div>
                                <div class="card-body">
                                    <div class="team-description">
                                        {!! $team->description !!}
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('admin.teams.edit', $team) }}" class="btn btn-primary">
                            <i class="ti ti-edit me-1"></i> Edit
                        </a>
                        <a href="{{ route('admin.teams.index') }}" class="btn btn-outline-secondary ms-2">
                            <i class="ti ti-arrow-left me-1"></i> Back to List
                        </a>
                        <form action="{{ route('admin.teams.destroy', $team) }}" method="POST" class="d-inline ms-2"
                            onsubmit="return confirm('Are you sure you want to delete this team member?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="ti ti-trash me-1"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection