@extends('admin.layout.master')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Menu Details</h4>
                    </div>
                    <div>
                        <a href="{{ route('admin.menus.index') }}" class="btn btn-primary">Back to Menus</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table">
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $menu->id }}</td>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $menu->name }}</td>
                                </tr>
                                <tr>
                                    <th>Slug</th>
                                    <td>{{ $menu->slug }}</td>
                                </tr>
                                <tr>
                                    <th>Location</th>
                                    <td>{{ $menu->location }}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        @if($menu->active)
                                        <span class="badge bg-success">Active</span>
                                        @else
                                        <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Order</th>
                                    <td>{{ $menu->order }}</td>
                                </tr>
                                <tr>
                                    <th>Created At</th>
                                    <td>{{ $menu->created_at->format('M d, Y H:i') }}</td>
                                </tr>
                                <tr>
                                    <th>Updated At</th>
                                    <td>{{ $menu->updated_at->format('M d, Y H:i') }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="mt-4">
                        <h5>Submenus</h5>

                        <div class="mb-3">
                            <a href="{{ route('admin.submenus.create') }}?menu_id={{ $menu->id }}"
                                class="btn btn-sm btn-primary">Add Submenu</a>
                        </div>

                        @if($menu->submenus->isEmpty())
                        <p>No submenus found.</p>
                        @else
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>URL</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th>Order</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($menu->submenus as $submenu)
                                    <tr>
                                        <td>{{ $submenu->id }}</td>
                                        <td>{{ $submenu->name }}</td>
                                        <td>{{ $submenu->url }}</td>
                                        <td>{{ ucfirst($submenu->type) }}</td>
                                        <td>
                                            @if($submenu->active)
                                            <span class="badge bg-success">Active</span>
                                            @else
                                            <span class="badge bg-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>{{ $submenu->order }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('admin.submenus.show', $submenu) }}"
                                                    class="btn btn-sm btn-info">
                                                    <i class="ti ti-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.submenus.edit', $submenu) }}"
                                                    class="btn btn-sm btn-primary">
                                                    <i class="ti ti-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.submenus.destroy', $submenu) }}"
                                                    method="POST" class="d-inline"
                                                    onsubmit="return confirm('Are you sure you want to delete this submenu?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                        <i class="ti ti-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
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