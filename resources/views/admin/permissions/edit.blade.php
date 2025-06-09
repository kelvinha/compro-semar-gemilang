@extends('admin.layout.master')

@section('content')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Edit Permission</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.permissions.index') }}">Permissions</a></li>
                    <li class="breadcrumb-item">Edit</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Edit Permission: {{ $permission->display_name }}</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.permissions.update', $permission) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="name">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                    name="name" value="{{ old('name', $permission->name) }}" required>
                                <small class="form-text text-muted">Permission name (e.g., create-users,
                                    edit-posts)</small>
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="display_name">Display Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('display_name') is-invalid @enderror"
                                    id="display_name" name="display_name"
                                    value="{{ old('display_name', $permission->display_name) }}" required>
                                <small class="form-text text-muted">Human-readable name (e.g., Create Users, Edit
                                    Posts)</small>
                                @error('display_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="group">Group <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <select class="form-control @error('group') is-invalid @enderror" id="group-select"
                                        name="group">
                                        <option value="">Select or enter a group</option>
                                        @foreach($groups as $group)
                                        <option value="{{ $group }}" {{ old('group', $permission->group) == $group ?
                                            'selected' : '' }}>{{ ucfirst($group) }}</option>
                                        @endforeach
                                    </select>
                                    <input type="text" class="form-control d-none" id="group-input"
                                        placeholder="Enter new group name">
                                    <button class="btn btn-outline-secondary" type="button"
                                        id="toggle-group-input">New</button>
                                </div>
                                <small class="form-text text-muted">Group for organizing permissions (e.g., users,
                                    posts)</small>
                                @error('group')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="description">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror"
                                    id="description" name="description"
                                    rows="3">{{ old('description', $permission->description) }}</textarea>
                                <small class="form-text text-muted">Optional description of what this permission
                                    allows</small>
                                @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update Permission</button>
                        <a href="{{ route('admin.permissions.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const groupSelect = document.getElementById('group-select');
        const groupInput = document.getElementById('group-input');
        const toggleButton = document.getElementById('toggle-group-input');
        let customGroupMode = false;
        
        toggleButton.addEventListener('click', function() {
            customGroupMode = !customGroupMode;
            
            if (customGroupMode) {
                groupSelect.classList.add('d-none');
                groupInput.classList.remove('d-none');
                groupInput.name = 'group';
                groupSelect.name = '';
                toggleButton.textContent = 'Select';
                groupInput.focus();
            } else {
                groupSelect.classList.remove('d-none');
                groupInput.classList.add('d-none');
                groupInput.name = '';
                groupSelect.name = 'group';
                toggleButton.textContent = 'New';
            }
        });
    });
</script>
@endsection