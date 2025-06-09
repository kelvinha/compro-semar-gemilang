@extends('admin.layout.master')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Banner Details</h4>
                    </div>
                    <div>
                        <a href="{{ route('admin.banners.edit', $banner) }}" class="btn btn-primary">Edit Banner</a>
                        <a href="{{ route('admin.banners.index') }}" class="btn btn-secondary">Back to Banners</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <strong>Title:</strong>
                                    <p>{{ $banner->title }}</p>
                                </div>

                                @if($banner->title_id)
                                <div class="col-md-6 mb-3">
                                    <strong>Title (Indonesian):</strong>
                                    <p>{{ $banner->title_id }}</p>
                                </div>
                                @endif

                                @if($banner->subtitle)
                                <div class="col-md-6 mb-3">
                                    <strong>Subtitle:</strong>
                                    <p>{{ $banner->subtitle }}</p>
                                </div>
                                @endif

                                @if($banner->subtitle_id)
                                <div class="col-md-6 mb-3">
                                    <strong>Subtitle (Indonesian):</strong>
                                    <p>{{ $banner->subtitle_id }}</p>
                                </div>
                                @endif

                                @if($banner->description)
                                <div class="col-md-12 mb-3">
                                    <strong>Description:</strong>
                                    <p>{{ $banner->description }}</p>
                                </div>
                                @endif

                                @if($banner->description_id)
                                <div class="col-md-12 mb-3">
                                    <strong>Description (Indonesian):</strong>
                                    <p>{{ $banner->description_id }}</p>
                                </div>
                                @endif

                                <div class="col-md-6 mb-3">
                                    <strong>Type:</strong>
                                    <p><span class="badge bg-info">{{ ucfirst($banner->type) }}</span></p>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <strong>Order:</strong>
                                    <p>{{ $banner->order }}</p>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <strong>Status:</strong>
                                    <p>
                                        @if($banner->active)
                                        <span class="badge bg-success">Active</span>
                                        @else
                                        <span class="badge bg-secondary">Inactive</span>
                                        @endif
                                    </p>
                                </div>

                                @if($banner->button_text)
                                <div class="col-md-6 mb-3">
                                    <strong>Button Text:</strong>
                                    <p>{{ $banner->button_text }}</p>
                                </div>
                                @endif

                                @if($banner->button_text_id)
                                <div class="col-md-6 mb-3">
                                    <strong>Button Text (Indonesian):</strong>
                                    <p>{{ $banner->button_text_id }}</p>
                                </div>
                                @endif

                                @if($banner->button_url)
                                <div class="col-md-6 mb-3">
                                    <strong>Button URL:</strong>
                                    <p><a href="{{ $banner->button_url }}" target="{{ $banner->button_target }}" class="text-primary">{{ $banner->button_url }}</a></p>
                                </div>
                                @endif

                                <div class="col-md-6 mb-3">
                                    <strong>Button Target:</strong>
                                    <p>{{ $banner->button_target == '_blank' ? 'New Window' : 'Same Window' }}</p>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <strong>Created:</strong>
                                    <p>{{ $banner->created_at->format('M d, Y H:i') }}</p>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <strong>Last Updated:</strong>
                                    <p>{{ $banner->updated_at->format('M d, Y H:i') }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            @if($banner->image)
                            <div class="mb-3">
                                <strong>Banner Image:</strong>
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $banner->image) }}" alt="{{ $banner->title }}" 
                                         class="img-fluid rounded border">
                                </div>
                            </div>
                            @endif

                            @if($banner->mobile_image)
                            <div class="mb-3">
                                <strong>Mobile Image:</strong>
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $banner->mobile_image) }}" alt="{{ $banner->title }} Mobile" 
                                         class="img-fluid rounded border">
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="mt-4">
                        <div class="d-flex gap-2">
                            <a href="{{ route('admin.banners.edit', $banner) }}" class="btn btn-primary">
                                <i class="ti ti-edit"></i> Edit Banner
                            </a>
                            <form action="{{ route('admin.banners.destroy', $banner) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Are you sure you want to delete this banner?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="ti ti-trash"></i> Delete Banner
                                </button>
                            </form>
                            <a href="{{ route('admin.banners.index') }}" class="btn btn-secondary">
                                <i class="ti ti-arrow-left"></i> Back to Banners
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
