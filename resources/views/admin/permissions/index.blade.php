@extends('admin.layout.master')

@php
    function moduleIcon($module)
    {
        $icons = [
            'user' => 'users',
            'role' => 'shield',
            'permission' => 'lock',
            'blog' => 'news',
            'page' => 'file-text',
            'media' => 'photo',
            'menu' => 'menu-2',
            'submenu' => 'list',
            'setting' => 'settings',
            'language' => 'language',
            'dashboard' => 'dashboard',
            'analytics' => 'chart-bar',
            'section' => 'layout-grid',
            'website' => 'world',
            'default' => 'circle',
        ];

        $module = strtolower($module);
        return isset($icons[$module]) ? $icons[$module] : $icons['default'];
    }
@endphp

@section('content')
    <div class="content-inner container-fluid pb-0" id="page_layout">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="header-title">
                            <h4 class="card-title">Permissions Management</h4>
                        </div>
                        <div>
                            <a href="{{ route('permissions.create') }}" class="btn btn-primary">
                                <i class="ti ti-plus me-1"></i> Add New Permission
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <div class="alert alert-info" role="alert">
                                    <i class="ti ti-info-circle me-2"></i>
                                    <strong>Permissions</strong> control what actions users can perform in the system.
                                    Assign permissions to roles to grant access to specific features.
                                </div>
                            </div>
                        </div>

                        <div class="permission-groups">
                            @foreach ($permissions as $group => $groupPermissions)
                                <div class="permission-group mb-4">
                                    <div class="card permission-card">
                                        <div class="card-header permission-card-header">
                                            <div class="d-flex align-items-center">
                                                <i class="ti ti-{{ moduleIcon($group) }} me-2 fs-5"></i>
                                                <h5 class="mb-0">{{ ucfirst($group) }}</h5>
                                                <span class="badge bg-primary ms-2">{{ count($groupPermissions) }}</span>
                                            </div>
                                            <div>
                                                <button type="button"
                                                    class="btn btn-sm btn-outline-primary permission-expand-btn"
                                                    data-bs-toggle="collapse" data-bs-target="#collapse-{{ $group }}"
                                                    aria-expanded="true">
                                                    <i class="ti ti-chevron-down"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="collapse show" id="collapse-{{ $group }}">
                                            <div class="card-body p-0">
                                                <div class="table-responsive">
                                                    <table class="table table-hover mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Display Name</th>
                                                                <th>Description</th>
                                                                <th class="text-center">Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($groupPermissions as $permission)
                                                                <tr>
                                                                    <td><code>{{ $permission->name }}</code></td>
                                                                    <td><strong>{{ $permission->display_name }}</strong>
                                                                    </td>
                                                                    <td class="text-muted">{{ $permission->description }}
                                                                    </td>
                                                                    <td>
                                                                        <div class="action-buttons">
                                                                            <a href="{{ route('permissions.show', $permission) }}"
                                                                                class="btn btn-action-info"
                                                                                data-bs-toggle="tooltip" title="View">
                                                                                <i class="ti ti-eye"></i>
                                                                            </a>
                                                                            <a href="{{ route('permissions.edit', $permission) }}"
                                                                                class="btn btn-action-primary"
                                                                                data-bs-toggle="tooltip" title="Edit">
                                                                                <i class="ti ti-edit"></i>
                                                                            </a>
                                                                            <form
                                                                                action="{{ route('permissions.destroy', $permission) }}"
                                                                                method="POST" class="d-inline"
                                                                                onsubmit="return confirm('Are you sure you want to delete this permission?');">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <button type="submit"
                                                                                    class="btn btn-action-danger"
                                                                                    data-bs-toggle="tooltip" title="Delete">
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
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
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
