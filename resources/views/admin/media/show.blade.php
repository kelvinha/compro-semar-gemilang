@extends('admin.layout.master')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Media Details</h4>
                    </div>
                    <div>
                        <a href="{{ route('admin.media.edit', $media) }}" class="btn btn-primary">Edit Media</a>
                        <a href="{{ route('admin.media.index') }}" class="btn btn-secondary">Back to Media Library</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="text-center mb-4">
                                @if($media->is_image)
                                <img src="{{ asset('storage/' . $media->path) }}" alt="{{ $media->name }}"
                                    class="img-fluid">
                                @elseif($media->is_video)
                                <video controls class="w-100">
                                    <source src="{{ asset('storage/' . $media->path) }}" type="{{ $media->mime_type }}">
                                    Your browser does not support the video tag.
                                </video>
                                @elseif($media->is_audio)
                                <audio controls class="w-100">
                                    <source src="{{ asset('storage/' . $media->path) }}" type="{{ $media->mime_type }}">
                                    Your browser does not support the audio tag.
                                </audio>
                                @elseif($media->is_document)
                                <div class="bg-light d-flex align-items-center justify-content-center"
                                    style="height: 300px;">
                                    <div class="text-center">
                                        <i class="ti ti-file-text fs-1 text-primary"></i>
                                        <h5 class="mt-3">{{ $media->file_name }}</h5>
                                        <a href="{{ asset('storage/' . $media->path) }}" class="btn btn-primary mt-2"
                                            target="_blank">View Document</a>
                                    </div>
                                </div>
                                @else
                                <div class="bg-light d-flex align-items-center justify-content-center"
                                    style="height: 300px;">
                                    <div class="text-center">
                                        <i class="ti ti-file fs-1 text-primary"></i>
                                        <h5 class="mt-3">{{ $media->file_name }}</h5>
                                        <a href="{{ asset('storage/' . $media->path) }}" class="btn btn-primary mt-2"
                                            download>Download File</a>
                                    </div>
                                </div>
                                @endif
                            </div>

                            @if($media->caption)
                            <div class="alert alert-light">
                                <strong>Caption:</strong> {{ $media->caption }}
                            </div>
                            @endif
                        </div>

                        <div class="col-md-4">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5 class="mb-0">File Information</h5>
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <tr>
                                            <th>Name</th>
                                            <td>{{ $media->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>File Name</th>
                                            <td>{{ $media->file_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>MIME Type</th>
                                            <td>{{ $media->mime_type }}</td>
                                        </tr>
                                        <tr>
                                            <th>Size</th>
                                            <td>{{ $media->human_size }}</td>
                                        </tr>
                                        <tr>
                                            <th>Alt Text</th>
                                            <td>{{ $media->alt_text ?: '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Uploaded By</th>
                                            <td>{{ $media->user->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Uploaded At</th>
                                            <td>{{ $media->created_at->format('M d, Y H:i') }}</td>
                                        </tr>
                                        <tr>
                                            <th>Updated At</th>
                                            <td>{{ $media->updated_at->format('M d, Y H:i') }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">File URL</h5>
                                </div>
                                <div class="card-body">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control"
                                            value="{{ asset('storage/' . $media->path) }}" id="file-url" readonly>
                                        <button class="btn btn-outline-secondary" type="button"
                                            onclick="copyToClipboard('file-url')">
                                            <i class="ti ti-copy"></i>
                                        </button>
                                    </div>

                                    <div class="d-grid gap-2">
                                        <a href="{{ asset('storage/' . $media->path) }}" class="btn btn-primary"
                                            target="_blank">View Original</a>
                                        <a href="{{ asset('storage/' . $media->path) }}" class="btn btn-secondary"
                                            download>Download</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function copyToClipboard(elementId) {
        const element = document.getElementById(elementId);
        element.select();
        document.execCommand('copy');
        
        // Show a toast notification
        toastr.success('URL copied to clipboard');
    }
</script>
@endsection