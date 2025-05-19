@extends('admin.layout.master')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="header-title">
                        <h4 class="card-title">Submenus</h4>
                    </div>
                    <div>
                        <a href="{{ route('admin.submenus.create') }}" class="btn btn-primary btn-lg">Add New
                            Submenu</a>
                    </div>
                </div>
                <div class="card-body">
                    <p>Manage your website submenus here.</p>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Menu</th>
                                    <th>Name</th>
                                    <th>URL</th>
                                    <th>Type</th>
                                    <th>Parent</th>
                                    <th>Status</th>
                                    <th>Order</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($submenus as $submenu)
                                <tr>
                                    <td>{{ $submenu->id }}</td>
                                    <td>{{ $submenu->menu->name }}</td>
                                    <td>{{ $submenu->name }}</td>
                                    <td>{{ $submenu->url }}</td>
                                    <td>{{ ucfirst($submenu->type) }}</td>
                                    <td>{{ $submenu->parent ? $submenu->parent->name : '-' }}</td>
                                    <td>
                                        @if ($submenu->active)
                                        <span class="badge bg-success">Active</span>
                                        @else
                                        <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>{{ $submenu->order }}</td>
                                    <td>
                                        <div class="action-buttons d-flex gap-2">
                                            <a href="{{ route('admin.submenus.show', $submenu) }}"
                                                class="btn btn-info btn-sm" data-bs-toggle="tooltip" title="View">
                                                <i class="ti ti-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.submenus.edit', $submenu) }}"
                                                class="btn btn-primary btn-sm" data-bs-toggle="tooltip" title="Edit">
                                                <i class="ti ti-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.submenus.destroy', $submenu) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Are you sure you want to delete this submenu?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    data-bs-toggle="tooltip" title="Delete">
                                                    <i class="ti ti-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="9" class="text-center">No submenus found.</td>
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