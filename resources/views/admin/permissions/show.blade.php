@extends('admin.layout.master')

@section('content')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Permission Details</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('permissions.index') }}">Permissions</a></li>
                    <li class="breadcrumb-item">View</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h5>Permission: {{ $permission->display_name }}</h5>
                <div>
                    <a href="{{ route('permissions.edit', $permission) }}" class="btn btn-primary">Edit</a>
                    <a href="{{ route('permissions.index') }}" class="btn btn-secondary">Back to List</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-bordered">
                            <tr>
                                <th style="width: 30%">Name</th>
                                <td>{{ $permission->name }}</td>
                            </tr>
                            <tr>
                                <th>Display Name</th>
                                <td>{{ $permission->display_name }}</td>
                            </tr>
                            <tr>
                                <th>Group</th>
                                <td>{{ ucfirst($permission->group) }}</td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>{{ $permission->description ?: 'No description provided' }}</td>
                            </tr>
                            <tr>
                                <th>Created At</th>
                                <td>{{ $permission->created_at->format('M d, Y H:i') }}</td>
                            </tr>
                            <tr>
                                <th>Updated At</th>
                                <td>{{ $permission->updated_at->format('M d, Y H:i') }}</td>
                            </tr>
                        </table>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h5>Roles with this Permission</h5>
                            </div>
                            <div class="card-body p-0">
                                @if($permission->roles->count() > 0)
                                    <div class="table-responsive">
                                        <table class="table mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Role Name</th>
                                                    <th>Display Name</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($permission->roles as $role)
                                                    <tr>
                                                        <td>{{ $role->name }}</td>
                                                        <td>{{ $role->display_name }}</td>
                                                        <td>
                                                            <a href="{{ route('roles.show', $role) }}" class="btn btn-sm btn-info">
                                                                <i class="ti ti-eye"></i> View
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <div class="p-3">
                                        <div class="alert alert-info mb-0">
                                            This permission is not assigned to any roles yet.
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
