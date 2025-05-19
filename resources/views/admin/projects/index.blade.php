@extends('admin.layout.master')

@section('title', 'Projects')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Projects</h4>
                    <div class="card-tools">
                        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Add New Project
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Project Name</th>
                                    <th>Client</th>
                                    <th>Location</th>
                                    <th>Completion Date</th>
                                    <th>Status</th>
                                    <th>Featured</th>
                                    <th>Order</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($projects as $project)
                                    <tr>
                                        <td>{{ $project->id }}</td>
                                        <td>
                                            @if ($project->project_main_image)
                                                <img src="{{ asset('storage/' . $project->project_main_image) }}" alt="{{ $project->project_name }}" width="50">
                                            @else
                                                <span class="badge bg-secondary">No Image</span>
                                            @endif
                                        </td>
                                        <td>{{ $project->project_name }}</td>
                                        <td>{{ $project->client_name ?? '-' }}</td>
                                        <td>{{ $project->location ?? '-' }}</td>
                                        <td>{{ $project->completion_date ? $project->completion_date->format('M d, Y') : '-' }}</td>
                                        <td>
                                            @if ($project->status == 'active')
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($project->featured)
                                                <span class="badge bg-info">Featured</span>
                                            @else
                                                <span class="badge bg-secondary">Not Featured</span>
                                            @endif
                                        </td>
                                        <td>{{ $project->order }}</td>
                                        <td>
                                            <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-sm btn-info">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this project?')">
                                                    <i class="fas fa-trash"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="10" class="text-center">No projects found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $projects->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
