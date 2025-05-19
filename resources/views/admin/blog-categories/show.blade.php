@extends('admin.layout.master')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Category Details</h4>
                    </div>
                    <div>
                        <a href="{{ route('admin.blog-categories.edit', $blogCategory) }}" class="btn btn-primary">Edit
                            Category</a>
                        <a href="{{ route('admin.blog-categories.index') }}" class="btn btn-secondary">Back to
                            Categories</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table">
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $blogCategory->id }}</td>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $blogCategory->name }}</td>
                                </tr>
                                <tr>
                                    <th>Slug</th>
                                    <td>{{ $blogCategory->slug }}</td>
                                </tr>
                                <tr>
                                    <th>Parent</th>
                                    <td>{{ $blogCategory->parent ? $blogCategory->parent->name : '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td>{{ $blogCategory->description }}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        @if($blogCategory->active)
                                        <span class="badge bg-success">Active</span>
                                        @else
                                        <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Order</th>
                                    <td>{{ $blogCategory->order }}</td>
                                </tr>
                                <tr>
                                    <th>Created At</th>
                                    <td>{{ $blogCategory->created_at->format('M d, Y H:i') }}</td>
                                </tr>
                                <tr>
                                    <th>Updated At</th>
                                    <td>{{ $blogCategory->updated_at->format('M d, Y H:i') }}</td>
                                </tr>
                            </table>
                        </div>

                        <div class="col-md-6">
                            @if($blogCategory->image)
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5 class="mb-0">Category Image</h5>
                                </div>
                                <div class="card-body">
                                    <img src="{{ asset('storage/' . $blogCategory->image) }}"
                                        alt="{{ $blogCategory->name }}" class="img-fluid">
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>

                    @if($blogCategory->children->isNotEmpty())
                    <div class="mt-4">
                        <h5>Child Categories</h5>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Status</th>
                                        <th>Order</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($blogCategory->children as $child)
                                    <tr>
                                        <td>{{ $child->id }}</td>
                                        <td>{{ $child->name }}</td>
                                        <td>{{ $child->slug }}</td>
                                        <td>
                                            @if($child->active)
                                            <span class="badge bg-success">Active</span>
                                            @else
                                            <span class="badge bg-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>{{ $child->order }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('admin.blog-categories.show', $child) }}"
                                                    class="btn btn-sm btn-info">
                                                    <i class="ti ti-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.blog-categories.edit', $child) }}"
                                                    class="btn btn-sm btn-primary">
                                                    <i class="ti ti-edit"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @endif

                    @if($blogCategory->blogs->isNotEmpty())
                    <div class="mt-4">
                        <h5>Blog Posts in this Category</h5>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($blogCategory->blogs as $blog)
                                    <tr>
                                        <td>{{ $blog->id }}</td>
                                        <td>{{ Str::limit($blog->title, 30) }}</td>
                                        <td>{{ $blog->user->name }}</td>
                                        <td>
                                            @if($blog->status == 'published')
                                            <span class="badge bg-success">Published</span>
                                            @elseif($blog->status == 'draft')
                                            <span class="badge bg-warning">Draft</span>
                                            @else
                                            <span class="badge bg-info">{{ ucfirst($blog->status) }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $blog->created_at->format('M d, Y') }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('admin.blogs.show', $blog) }}"
                                                    class="btn btn-sm btn-info">
                                                    <i class="ti ti-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.blogs.edit', $blog) }}"
                                                    class="btn btn-sm btn-primary">
                                                    <i class="ti ti-edit"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection