@extends('admin.layout.master')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Submenu Details</h4>
                    </div>
                    <div>
                        <a href="{{ route('admin.submenus.index') }}" class="btn btn-primary">Back to Submenus</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table">
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $submenu->id }}</td>
                                </tr>
                                <tr>
                                    <th>Menu</th>
                                    <td>{{ $submenu->menu->name }}</td>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $submenu->name }}</td>
                                </tr>
                                <tr>
                                    <th>Slug</th>
                                    <td>{{ $submenu->slug }}</td>
                                </tr>
                                <tr>
                                    <th>URL</th>
                                    <td>{{ $submenu->url }}</td>
                                </tr>
                                <tr>
                                    <th>Type</th>
                                    <td>{{ ucfirst($submenu->type) }}</td>
                                </tr>
                                <tr>
                                    <th>Parent</th>
                                    <td>{{ $submenu->parent ? $submenu->parent->name : '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        @if($submenu->active)
                                        <span class="badge bg-success">Active</span>
                                        @else
                                        <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Order</th>
                                    <td>{{ $submenu->order }}</td>
                                </tr>
                                <tr>
                                    <th>Created At</th>
                                    <td>{{ $submenu->created_at->format('M d, Y H:i') }}</td>
                                </tr>
                                <tr>
                                    <th>Updated At</th>
                                    <td>{{ $submenu->updated_at->format('M d, Y H:i') }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="mt-4">
                        <h5>Child Submenus</h5>

                        <div class="mb-3">
                            <a href="{{ route('admin.submenus.create') }}?menu_id={{ $submenu->menu_id }}&parent_id={{ $submenu->id }}"
                                class="btn btn-sm btn-primary">Add Child Submenu</a>
                        </div>

                        @if($submenu->children->isEmpty())
                        <p>No child submenus found.</p>
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
                                    @foreach($submenu->children as $child)
                                    <tr>
                                        <td>{{ $child->id }}</td>
                                        <td>{{ $child->name }}</td>
                                        <td>{{ $child->url }}</td>
                                        <td>{{ ucfirst($child->type) }}</td>
                                        <td>
                                            @if($child->active)
                                            <span class="badge bg-success">Active</span>
                                            @else
                                            <span class="badge bg-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>{{ $child->order }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('admin.submenus.show', $child) }}"
                                                    class="btn btn-sm btn-info">
                                                    <i class="ti ti-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.submenus.edit', $child) }}"
                                                    class="btn btn-sm btn-primary">
                                                    <i class="ti ti-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.submenus.destroy', $child) }}"
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

                    <div class="mt-4">
                        <h5>Page Sections</h5>

                        <div class="mb-3">
                            <a href="#" class="btn btn-sm btn-primary">Add Section</a>
                        </div>

                        @if($submenu->sections->isEmpty())
                        <p>No sections found.</p>
                        @else
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th>Order</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($submenu->sections as $section)
                                    <tr>
                                        <td>{{ $section->id }}</td>
                                        <td>{{ $section->name }}</td>
                                        <td>{{ ucfirst($section->type) }}</td>
                                        <td>
                                            @if($section->active)
                                            <span class="badge bg-success">Active</span>
                                            @else
                                            <span class="badge bg-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>{{ $section->order }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="#" class="btn btn-sm btn-info">
                                                    <i class="ti ti-eye"></i>
                                                </a>
                                                <a href="#" class="btn btn-sm btn-primary">
                                                    <i class="ti ti-edit"></i>
                                                </a>
                                                <form action="#" method="POST" class="d-inline"
                                                    onsubmit="return confirm('Are you sure you want to delete this section?');">
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