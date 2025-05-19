@extends('admin.layout.master')

@section('content')
    <div class="content-inner container-fluid pb-0" id="page_layout">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="header-title">
                            <h4 class="card-title">Roles</h4>
                        </div>
                        <div>
                            <a href="{{ route('roles.create') }}" class="btn btn-primary btn-lg">Add New Role</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <p>Manage user roles and their permissions here.</p>

                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Display Name</th>
                                        <th>Description</th>
                                        <th>Users</th>
                                        <th>System</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($roles as $role)
                                        <tr>
                                            <td>{{ $role->id }}</td>
                                            <td>{{ $role->name }}</td>
                                            <td>{{ $role->display_name }}</td>
                                            <td>{{ Str::limit($role->description, 50) }}</td>
                                            <td>{{ $role->users_count }}</td>
                                            <td>
                                                @if ($role->is_system)
                                                    <span class="badge bg-info">System</span>
                                                @else
                                                    <span class="badge bg-secondary">Custom</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="action-buttons d-flex gap-2">
                                                    <a href="{{ route('roles.show', $role) }}" class="btn btn-info btn-sm" data-bs-toggle="tooltip" title="View">
                                                        <i class="ti ti-eye"></i>
                                                    </a>
                                                    <a href="{{ route('roles.edit', $role) }}" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" title="Edit">
                                                        <i class="ti ti-edit"></i>
                                                    </a>
                                                    @if (!$role->is_system)
                                                        <form action="{{ route('roles.destroy', $role) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this role?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" title="Delete">
                                                                <i class="ti ti-trash"></i>
                                                            </button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">No roles found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
