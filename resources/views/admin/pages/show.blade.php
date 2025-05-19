@extends('admin.layout.master')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Page Details</h4>
                    </div>
                    <div>
                        <a href="{{ route('admin.pages.edit', $page) }}" class="btn btn-primary">Edit Page</a>
                        <a href="{{ route('admin.pages.index') }}" class="btn btn-secondary">Back to Pages</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table">
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $page->id }}</td>
                                </tr>
                                <tr>
                                    <th>Title</th>
                                    <td>{{ $page->name }}</td>
                                </tr>
                                <tr>
                                    <th>Slug</th>
                                    <td>{{ $page->slug }}</td>
                                </tr>
                                <tr>
                                    <th>URL</th>
                                    <td>
                                        <a href="{{ url($page->url) }}" target="_blank">{{ url($page->url) }}</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Menu</th>
                                    <td>{{ $page->menu->name }}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        @if($page->active)
                                        <span class="badge bg-success">Active</span>
                                        @else
                                        <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Created At</th>
                                    <td>{{ $page->created_at->format('M d, Y H:i') }}</td>
                                </tr>
                                <tr>
                                    <th>Updated At</th>
                                    <td>{{ $page->updated_at->format('M d, Y H:i') }}</td>
                                </tr>
                            </table>
                        </div>

                        <div class="col-md-6">
                            @if($page->seo)
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5 class="mb-0">SEO Information</h5>
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <tr>
                                            <th>Meta Title</th>
                                            <td>{{ $page->seo->title }}</td>
                                        </tr>
                                        <tr>
                                            <th>Meta Description</th>
                                            <td>{{ $page->seo->description }}</td>
                                        </tr>
                                        <tr>
                                            <th>Meta Keywords</th>
                                            <td>{{ $page->seo->keywords }}</td>
                                        </tr>
                                    </table>

                                    @if($page->seo->og_image)
                                    <div class="mt-3">
                                        <h6>OG Image</h6>
                                        <img src="{{ asset('storage/' . $page->seo->og_image) }}" alt="OG Image"
                                            class="img-fluid img-thumbnail">
                                    </div>
                                    @endif
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="mt-4">
                        <h5>Page Sections</h5>

                        @if($page->sections->isEmpty())
                        <div class="alert alert-info">
                            No sections found. <a href="{{ route('admin.pages.edit', $page) }}">Add some sections</a> to
                            build your page.
                        </div>
                        @else
                        <div class="accordion" id="sectionsAccordion">
                            @foreach($page->sections as $section)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading{{ $section->id }}">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse{{ $section->id }}" aria-expanded="false"
                                        aria-controls="collapse{{ $section->id }}">
                                        <div class="d-flex justify-content-between w-100 me-3">
                                            <span>{{ $section->name }}</span>
                                            <span>
                                                <span class="badge bg-secondary me-2">{{ ucfirst($section->type)
                                                    }}</span>
                                                @if($section->active)
                                                <span class="badge bg-success">Active</span>
                                                @else
                                                <span class="badge bg-danger">Inactive</span>
                                                @endif
                                            </span>
                                        </div>
                                    </button>
                                </h2>
                                <div id="collapse{{ $section->id }}" class="accordion-collapse collapse"
                                    aria-labelledby="heading{{ $section->id }}" data-bs-parent="#sectionsAccordion">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-md-8">
                                                @if($section->content)
                                                <div class="mb-3">
                                                    <h6>Content</h6>
                                                    <div class="border p-3 rounded">
                                                        {!! $section->content !!}
                                                    </div>
                                                </div>
                                                @endif

                                                @if($section->options)
                                                <div class="mb-3">
                                                    <h6>Options</h6>
                                                    <pre
                                                        class="border p-3 rounded">{{ json_encode($section->options, JSON_PRETTY_PRINT) }}</pre>
                                                </div>
                                                @endif
                                            </div>

                                            <div class="col-md-4">
                                                @if($section->image)
                                                <div class="mb-3">
                                                    <h6>Image</h6>
                                                    <img src="{{ asset('storage/' . $section->image) }}"
                                                        alt="{{ $section->name }}" class="img-fluid img-thumbnail">
                                                </div>
                                                @endif

                                                <div class="d-grid gap-2">
                                                    <a href="{{ route('admin.pages.edit', $page) }}#sections"
                                                        class="btn btn-primary">Edit Section</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection