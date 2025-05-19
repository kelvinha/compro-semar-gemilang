@extends('admin.layout.master')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Role Details</h4>
                    </div>
                    <div>
                        <a href="{{ route('roles.index') }}" class="btn btn-primary">Back to Roles</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table">
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $role->id }}</td>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $role->name }}</td>
                                </tr>
                                <tr>
                                    <th>Display Name</th>
                                    <td>{{ $role->display_name }}</td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td>{{ $role->description }}</td>
                                </tr>
                                <tr>
                                    <th>System Role</th>
                                    <td>
                                        @if($role->is_system)
                                            <span class="badge bg-info">Yes</span>
                                        @else
                                            <span class="badge bg-secondary">No</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Created At</th>
                                    <td>{{ $role->created_at->format('M d, Y H:i') }}</td>
                                </tr>
                                <tr>
                                    <th>Updated At</th>
                                    <td>{{ $role->updated_at->format('M d, Y H:i') }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <h5>Permissions</h5>
                        
                        @if($role->permissions->isEmpty())
                            <p>No permissions assigned to this role.</p>
                        @else
                            <div class="row">
                                @foreach($role->permissions->groupBy('group') as $group => $permissions)
                                    <div class="col-md-4 mb-3">
                                        <div class="card">
                                            <div class="card-header">
                                                <h6 class="mb-0">{{ ucfirst($group) }}</h6>
                                            </div>
                                            <div class="card-body">
                                                <ul class="list-group list-group-flush">
                                                    @foreach($permissions as $permission)
                                                        <li class="list-group-item">{{ $permission->display_name }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    
                    <div class="mt-4">
                        <h5>Users with this Role</h5>
                        
                        @if($role->users->isEmpty())
                            <p>No users have this role.</p>
                        @else
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Created At</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($role->users as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    @if($user->is_active)
                                                        <span class="badge bg-success">Active</span>
                                                    @else
                                                        <span class="badge bg-danger">Inactive</span>
                                                    @endif
                                                </td>
                                                <td>{{ $user->created_at->format('M d, Y') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
