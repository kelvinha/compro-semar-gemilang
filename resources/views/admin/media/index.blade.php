@extends('admin.layout.master')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="header-title">
                        <h4 class="card-title">Media Library</h4>
                    </div>
                    <div>
                        <a href="{{ route('admin.media.create') }}" class="btn btn-primary btn-lg">Upload New Media</a>
                    </div>
                </div>
                <div class="card-body">
                    <p>Manage your media files here.</p>

                    <div class="row">
                        @forelse($media as $item)
                        <div class="col-md-2 col-sm-4 mb-4">
                            <div class="card h-100">
                                <div class="card-body p-2 text-center">
                                    @if ($item->is_image)
                                    <img src="{{ asset('storage/' . $item->path) }}" alt="{{ $item->name }}"
                                        class="img-fluid mb-2" style="max-height: 100px;">
                                    @elseif($item->is_video)
                                    <div class="bg-light d-flex align-items-center justify-content-center mb-2"
                                        style="height: 100px;">
                                        <i class="ti ti-video fs-1 text-primary"></i>
                                    </div>
                                    @elseif($item->is_document)
                                    <div class="bg-light d-flex align-items-center justify-content-center mb-2"
                                        style="height: 100px;">
                                        <i class="ti ti-file-text fs-1 text-primary"></i>
                                    </div>
                                    @else
                                    <div class="bg-light d-flex align-items-center justify-content-center mb-2"
                                        style="height: 100px;">
                                        <i class="ti ti-file fs-1 text-primary"></i>
                                    </div>
                                    @endif

                                    <h6 class="card-title mb-1" title="{{ $item->name }}">
                                        {{ Str::limit($item->name, 15) }}</h6>
                                    <p class="card-text small text-muted mb-2">{{ $item->human_size }}</p>

                                    <div class="action-buttons d-flex gap-2">
                                        <a href="{{ route('admin.media.show', $item) }}" class="btn btn-info btn-sm"
                                            data-bs-toggle="tooltip" title="View">
                                            <i class="ti ti-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.media.edit', $item) }}" class="btn btn-primary btn-sm"
                                            data-bs-toggle="tooltip" title="Edit">
                                            <i class="ti ti-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.media.destroy', $item) }}" method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Are you sure you want to delete this media?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" data-bs-toggle="tooltip"
                                                title="Delete">
                                                <i class="ti ti-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-12">
                            <div class="alert alert-info">
                                No media files found. <a href="{{ route('admin.media.create') }}">Upload some</a>!
                            </div>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection