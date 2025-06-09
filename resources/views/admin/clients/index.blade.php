@extends('admin.layout.master')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Client Management</h4>
                    </div>
                    <div>
                        <a href="{{ route('admin.clients.create') }}" class="btn btn-primary">Add New Client</a>
                    </div>
                </div>
                <div class="card-body">
                    @if($clients->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Logo</th>
                                    <th>Name</th>
                                    <th>Industry</th>
                                    <th>Location</th>
                                    <th>Partnership</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clients as $client)
                                <tr>
                                    <td>
                                        @if($client->logo)
                                        <img src="{{ asset('storage/' . $client->logo) }}" alt="{{ $client->name }}" 
                                             class="img-thumbnail" style="max-width: 60px; max-height: 60px;">
                                        @else
                                        <span class="text-muted">No logo</span>
                                        @endif
                                    </td>
                                    <td>
                                        <strong>{{ $client->name }}</strong>
                                        @if($client->website_url)
                                        <br><a href="{{ $client->website_url }}" target="_blank" class="text-primary">
                                            <i class="ti ti-external-link"></i> Website
                                        </a>
                                        @endif
                                    </td>
                                    <td>{{ $client->industry ?? 'N/A' }}</td>
                                    <td>{{ $client->location ?? 'N/A' }}</td>
                                    <td>
                                        @if($client->partnership_start)
                                        {{ $client->partnership_start->format('Y') }}
                                        <br><small class="text-muted">{{ $client->getPartnershipDuration() }} years</small>
                                        @else
                                        N/A
                                        @endif
                                    </td>
                                    <td>
                                        @if($client->active)
                                        <span class="badge bg-success">Active</span>
                                        @else
                                        <span class="badge bg-secondary">Inactive</span>
                                        @endif
                                        @if($client->featured)
                                        <br><span class="badge bg-warning">Featured</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.clients.show', $client) }}" 
                                               class="btn btn-sm btn-outline-info" title="View">
                                                <i class="ti ti-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.clients.edit', $client) }}" 
                                               class="btn btn-sm btn-outline-primary" title="Edit">
                                                <i class="ti ti-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.clients.destroy', $client) }}" 
                                                  method="POST" class="d-inline"
                                                  onsubmit="return confirm('Are you sure you want to delete this client?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
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
                    @else
                    <div class="text-center py-4">
                        <i class="ti ti-users-off fs-1 text-muted"></i>
                        <h5 class="mt-2">No clients found</h5>
                        <p class="text-muted">Add your first client to get started.</p>
                        <a href="{{ route('admin.clients.create') }}" class="btn btn-primary">Add New Client</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
