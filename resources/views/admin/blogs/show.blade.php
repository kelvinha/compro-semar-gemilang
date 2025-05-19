@extends('admin.layout.master')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Blog Post Details</h4>
                    </div>
                    <div>
                        <a href="{{ route('admin.blogs.edit', $blog) }}" class="btn btn-primary">Edit Post</a>
                        <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary">Back to Blog Posts</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <h2>{{ $blog->title }}</h2>

                            <div class="d-flex mb-3">
                                <div class="me-3">
                                    <strong>Author:</strong> {{ $blog->user->name }}
                                </div>
                                <div class="me-3">
                                    <strong>Category:</strong> {{ $blog->category ? $blog->category->name :
                                    'Uncategorized' }}
                                </div>
                                <div>
                                    <strong>Date:</strong> {{ $blog->created_at->format('M d, Y') }}
                                </div>
                            </div>

                            @if($blog->excerpt)
                            <div class="alert alert-light">
                                <strong>Excerpt:</strong> {{ $blog->excerpt }}
                            </div>
                            @endif

                            <div class="mb-4">
                                <h5>Content:</h5>
                                <div class="border p-3 rounded">
                                    {!! $blog->content !!}
                                </div>
                            </div>

                            @if($blog->seo)
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5 class="mb-0">SEO Information</h5>
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <tr>
                                            <th>Meta Title</th>
                                            <td>{{ $blog->seo->title }}</td>
                                        </tr>
                                        <tr>
                                            <th>Meta Description</th>
                                            <td>{{ $blog->seo->description }}</td>
                                        </tr>
                                        <tr>
                                            <th>Meta Keywords</th>
                                            <td>{{ $blog->seo->keywords }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            @endif
                        </div>

                        <div class="col-md-4">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5 class="mb-0">Status Information</h5>
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <tr>
                                            <th>Status</th>
                                            <td>
                                                @if($blog->status == 'published')
                                                <span class="badge bg-success">Published</span>
                                                @elseif($blog->status == 'draft')
                                                <span class="badge bg-warning">Draft</span>
                                                @else
                                                <span class="badge bg-info">{{ ucfirst($blog->status) }}</span>
                                                @endif
                                            </td>
                                        </tr>
                                        @if($blog->published_at)
                                        <tr>
                                            <th>Published Date</th>
                                            <td>{{ $blog->published_at->format('M d, Y H:i') }}</td>
                                        </tr>
                                        @endif
                                        <tr>
                                            <th>Featured</th>
                                            <td>
                                                @if($blog->featured)
                                                <span class="badge bg-primary">Yes</span>
                                                @else
                                                <span class="badge bg-secondary">No</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Allow Comments</th>
                                            <td>
                                                @if($blog->allow_comments)
                                                <span class="badge bg-success">Yes</span>
                                                @else
                                                <span class="badge bg-danger">No</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Created At</th>
                                            <td>{{ $blog->created_at->format('M d, Y H:i') }}</td>
                                        </tr>
                                        <tr>
                                            <th>Updated At</th>
                                            <td>{{ $blog->updated_at->format('M d, Y H:i') }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            @if($blog->featured_image)
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5 class="mb-0">Featured Image</h5>
                                </div>
                                <div class="card-body">
                                    <img src="{{ asset('storage/' . $blog->featured_image) }}" alt="{{ $blog->title }}"
                                        class="img-fluid">
                                </div>
                            </div>
                            @endif

                            @if($blog->seo && $blog->seo->og_image)
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5 class="mb-0">OG Image</h5>
                                </div>
                                <div class="card-body">
                                    <img src="{{ asset('storage/' . $blog->seo->og_image) }}" alt="OG Image"
                                        class="img-fluid">
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection