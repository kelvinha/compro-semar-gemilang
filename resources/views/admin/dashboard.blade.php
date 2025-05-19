@extends('admin.layout.master')

@section('content')
    <div class="content-inner container-fluid pb-0" id="page_layout">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Dashboard</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <p>Welcome to {{ config('app.name') }} Dashboard</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-2">Total Users</h6>
                                <h4 class="counter">{{ $userCount }}</h4>
                            </div>
                            <div>
                                <i class="ti ti-users fs-3 text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-2">Total Media</h6>
                                <h4 class="counter">{{ $mediaCount }}</h4>
                            </div>
                            <div>
                                <i class="ti ti-photo fs-3 text-info"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-2">Total Menus</h6>
                                <h4 class="counter">{{ $menuCount }}</h4>
                            </div>
                            <div>
                                <i class="ti ti-menu-2 fs-3 text-success"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-2">Total Blogs</h6>
                                <h4 class="counter">{{ $blogCount }}</h4>
                            </div>
                            <div>
                                <i class="ti ti-article fs-3 text-warning"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Latest Blogs</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($latestBlogs->isEmpty())
                            <p>No blogs found.</p>
                        @else
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Author</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($latestBlogs as $blog)
                                            <tr>
                                                <td>{{ Str::limit($blog->title, 30) }}</td>
                                                <td>{{ $blog->user->name }}</td>
                                                <td>
                                                    @if ($blog->status == 'published')
                                                        <span class="badge bg-success">Published</span>
                                                    @else
                                                        <span class="badge bg-warning">{{ ucfirst($blog->status) }}</span>
                                                    @endif
                                                </td>
                                                <td>{{ $blog->created_at->format('M d, Y') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Latest Users</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($latestUsers->isEmpty())
                            <p>No users found.</p>
                        @else
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($latestUsers as $user)
                                            <tr>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->role->display_name }}</td>
                                                <td>{{ $user->created_at->format('M d, Y') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
