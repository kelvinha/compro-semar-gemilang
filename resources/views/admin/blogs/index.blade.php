@extends('admin.layout.master')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="header-title">
                        <h4 class="card-title">Blog Posts</h4>
                    </div>
                    <div>
                        <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary btn-lg">Add New Post</a>
                    </div>
                </div>
                <div class="card-body">
                    <p>Manage your blog posts here.</p>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Featured</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($blogs as $blog)
                                <tr>
                                    <td>{{ $blog->id }}</td>
                                    <td>{{ Str::limit($blog->title, 30) }}</td>
                                    <td>{{ $blog->user->name }}</td>
                                    <td>{{ $blog->category ? $blog->category->name : '-' }}</td>
                                    <td>
                                        @if ($blog->status == 'published')
                                        <span class="badge bg-success">Published</span>
                                        @elseif($blog->status == 'draft')
                                        <span class="badge bg-warning">Draft</span>
                                        @else
                                        <span class="badge bg-info">{{ ucfirst($blog->status) }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($blog->featured)
                                        <span class="badge bg-primary">Featured</span>
                                        @else
                                        <span class="badge bg-secondary">No</span>
                                        @endif
                                    </td>
                                    <td>{{ $blog->created_at->format('M d, Y') }}</td>
                                    <td>
                                        <div class="action-buttons d-flex gap-2">
                                            <a href="{{ route('admin.blogs.show', $blog) }}" class="btn btn-info btn-sm"
                                                data-bs-toggle="tooltip" title="View">
                                                <i class="ti ti-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.blogs.edit', $blog) }}"
                                                class="btn btn-primary btn-sm" data-bs-toggle="tooltip" title="Edit">
                                                <i class="ti ti-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.blogs.destroy', $blog) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Are you sure you want to delete this blog post?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    data-bs-toggle="tooltip" title="Delete">
                                                    <i class="ti ti-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center">No blog posts found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection