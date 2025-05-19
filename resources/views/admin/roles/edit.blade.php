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
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Edit Role</h4>
                        </div>
                        <div>
                            <a href="{{ route('roles.index') }}" class="btn btn-primary">Back to Roles</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('roles.update', $role) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="name">Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" name="name" value="{{ old('name', $role->name) }}" required
                                            {{ $role->is_system ? 'readonly' : '' }}>
                                        <small class="form-text text-muted">The name must be unique and contain only
                                            letters, numbers, and underscores.</small>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="display_name">Display Name <span class="text-danger">*</span></label>
                                        <input type="text"
                                            class="form-control @error('display_name') is-invalid @enderror"
                                            id="display_name" name="display_name"
                                            value="{{ old('display_name', $role->display_name) }}" required>
                                        @error('display_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                            rows="3">{{ old('description', $role->description) }}</textarea>
                                        @error('description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4 mb-3">
                                <h5>Permissions</h5>
                                <p class="text-muted">Select the permissions for this role.</p>
                            </div>

                            <div class="permission-groups">
                                @foreach ($permissions as $group => $groupPermissions)
                                    <div class="permission-group mb-4">
                                        <div class="card permission-card">
                                            <div class="card-header permission-card-header">
                                                <h5 class="mb-0">
                                                    <i class="ti ti-{{ moduleIcon($group) }} me-2"></i>
                                                    {{ ucfirst($group) }}
                                                </h5>
                                                <div class="permission-group-actions">
                                                    <button type="button"
                                                        class="btn btn-sm btn-outline-primary select-all-group"
                                                        data-group="{{ $group }}">
                                                        Select All
                                                    </button>
                                                    <button type="button"
                                                        class="btn btn-sm btn-outline-secondary deselect-all-group"
                                                        data-group="{{ $group }}">
                                                        Deselect All
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="card-body permission-card-body">
                                                <div class="row">
                                                    @foreach ($groupPermissions as $permission)
                                                        <div class="col-md-6 mb-2">
                                                            <div class="permission-item" data-group="{{ $group }}">
                                                                <div class="form-check">
                                                                    <input class="form-check-input permission-checkbox"
                                                                        type="checkbox"
                                                                        id="permission_{{ $permission->id }}"
                                                                        name="permissions[]" value="{{ $permission->id }}"
                                                                        data-group="{{ $group }}"
                                                                        {{ in_array($permission->id, old('permissions', $rolePermissions)) ? 'checked' : '' }}>
                                                                    <label class="form-check-label"
                                                                        for="permission_{{ $permission->id }}">
                                                                        <strong>{{ $permission->display_name }}</strong>
                                                                        @if ($permission->description)
                                                                            <small
                                                                                class="text-muted d-block">{{ $permission->description }}</small>
                                                                        @endif
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    // Select all permissions in a group
                                    document.querySelectorAll('.select-all-group').forEach(button => {
                                        button.addEventListener('click', function() {
                                            const group = this.getAttribute('data-group');
                                            document.querySelectorAll(`.permission-checkbox[data-group="${group}"]`)
                                                .forEach(checkbox => {
                                                    checkbox.checked = true;
                                                });
                                        });
                                    });

                                    // Deselect all permissions in a group
                                    document.querySelectorAll('.deselect-all-group').forEach(button => {
                                        button.addEventListener('click', function() {
                                            const group = this.getAttribute('data-group');
                                            document.querySelectorAll(`.permission-checkbox[data-group="${group}"]`)
                                                .forEach(checkbox => {
                                                    checkbox.checked = false;
                                                });
                                        });
                                    });
                                });
                            </script>

                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Update Role</button>
                                <a href="{{ route('roles.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
