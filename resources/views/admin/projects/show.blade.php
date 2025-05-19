@extends('admin.layout.master')

@section('title', 'View Project')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Project Details</h4>
                    <div class="card-tools">
                        <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-edit"></i> Edit Project
                        </a>
                        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-arrow-left"></i> Back to List
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Project Information</h5>
                            <table class="table table-bordered">
                                <tr>
                                    <th width="30%">Project Name</th>
                                    <td>{{ $project->project_name }}</td>
                                </tr>
                                <tr>
                                    <th>Client Name</th>
                                    <td>{{ $project->client_name ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Location</th>
                                    <td>{{ $project->location ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Completion Date</th>
                                    <td>{{ $project->completion_date ? $project->completion_date->format('F d, Y') : 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        @if ($project->status == 'active')
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Featured</th>
                                    <td>
                                        @if ($project->featured)
                                            <span class="badge bg-info">Yes</span>
                                        @else
                                            <span class="badge bg-secondary">No</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Order</th>
                                    <td>{{ $project->order }}</td>
                                </tr>
                                <tr>
                                    <th>Created At</th>
                                    <td>{{ $project->created_at->format('F d, Y H:i:s') }}</td>
                                </tr>
                                <tr>
                                    <th>Updated At</th>
                                    <td>{{ $project->updated_at->format('F d, Y H:i:s') }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h5>Main Image</h5>
                            @if ($project->project_main_image)
                                <img src="{{ asset('storage/' . $project->project_main_image) }}" alt="{{ $project->project_name }}" class="img-fluid mb-3" style="max-height: 300px;">
                            @else
                                <p>No main image available</p>
                            @endif
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-12">
                            <h5>Project Description</h5>
                            <div class="p-3 bg-light">
                                {!! $project->project_description !!}
                            </div>
                        </div>
                    </div>

                    @if ($project->project_gallery_images && count($project->project_gallery_images) > 0)
                        <div class="row mt-4">
                            <div class="col-12">
                                <h5>Gallery Images</h5>
                                <div class="row">
                                    @foreach ($project->project_gallery_images as $image)
                                        <div class="col-md-3 mb-3">
                                            <img src="{{ asset('storage/' . $image) }}" alt="Gallery Image" class="img-fluid">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="row mt-4">
                        <div class="col-12">
                            <h5>SEO Information</h5>
                            <table class="table table-bordered">
                                <tr>
                                    <th width="20%">Meta Title</th>
                                    <td>{{ $project->meta_title ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Meta Description</th>
                                    <td>{{ $project->meta_description ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Meta Keywords</th>
                                    <td>{{ $project->meta_keywords ?? 'N/A' }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
