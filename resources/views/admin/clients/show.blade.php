@extends('admin.layout.master')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Client Details</h4>
                    </div>
                    <div>
                        <a href="{{ route('admin.clients.edit', $client) }}" class="btn btn-primary">Edit Client</a>
                        <a href="{{ route('admin.clients.index') }}" class="btn btn-secondary">Back to Clients</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <strong>Client Name:</strong>
                                    <p>{{ $client->name }}</p>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <strong>Slug:</strong>
                                    <p><code>{{ $client->slug }}</code></p>
                                </div>

                                @if($client->industry)
                                <div class="col-md-6 mb-3">
                                    <strong>Industry:</strong>
                                    <p>{{ $client->industry }}</p>
                                </div>
                                @endif

                                @if($client->location)
                                <div class="col-md-6 mb-3">
                                    <strong>Location:</strong>
                                    <p>{{ $client->location }}</p>
                                </div>
                                @endif

                                @if($client->website_url)
                                <div class="col-md-6 mb-3">
                                    <strong>Website:</strong>
                                    <p><a href="{{ $client->website_url }}" target="_blank" class="text-primary">{{
                                            $client->website_url }}</a></p>
                                </div>
                                @endif

                                @if($client->partnership_start)
                                <div class="col-md-6 mb-3">
                                    <strong>Partnership Start:</strong>
                                    <p>{{ $client->partnership_start->format('M d, Y') }}</p>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <strong>Partnership Duration:</strong>
                                    <p>{{ $client->getPartnershipDuration() }} years</p>
                                </div>
                                @endif

                                <div class="col-md-6 mb-3">
                                    <strong>Order:</strong>
                                    <p>{{ $client->order }}</p>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <strong>Status:</strong>
                                    <p>
                                        @if($client->active)
                                        <span class="badge bg-success">Active</span>
                                        @else
                                        <span class="badge bg-secondary">Inactive</span>
                                        @endif

                                        @if($client->featured)
                                        <span class="badge bg-warning">Featured</span>
                                        @endif
                                    </p>
                                </div>

                                @if($client->description)
                                <div class="col-md-12 mb-3">
                                    <strong>Description:</strong>
                                    <p>{{ $client->description }}</p>
                                </div>
                                @endif

                                @if($client->description_id)
                                <div class="col-md-12 mb-3">
                                    <strong>Description (Indonesian):</strong>
                                    <p>{{ $client->description_id }}</p>
                                </div>
                                @endif



                                <div class="col-md-6 mb-3">
                                    <strong>Created:</strong>
                                    <p>{{ $client->created_at->format('M d, Y H:i') }}</p>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <strong>Last Updated:</strong>
                                    <p>{{ $client->updated_at->format('M d, Y H:i') }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            @if($client->logo)
                            <div class="mb-3">
                                <strong>Client Logo:</strong>
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $client->logo) }}" alt="{{ $client->name }}"
                                        class="img-fluid rounded border">
                                </div>
                            </div>
                            @else
                            <div class="mb-3">
                                <strong>Client Logo:</strong>
                                <div class="mt-2 p-4 border rounded text-center text-muted">
                                    <i class="ti ti-photo-off fs-1"></i>
                                    <p class="mb-0">No logo uploaded</p>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="mt-4">
                        <div class="d-flex gap-2">
                            <a href="{{ route('admin.clients.edit', $client) }}" class="btn btn-primary">
                                <i class="ti ti-edit"></i> Edit Client
                            </a>
                            <form action="{{ route('admin.clients.destroy', $client) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Are you sure you want to delete this client?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="ti ti-trash"></i> Delete Client
                                </button>
                            </form>
                            <a href="{{ route('admin.clients.index') }}" class="btn btn-secondary">
                                <i class="ti ti-arrow-left"></i> Back to Clients
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection