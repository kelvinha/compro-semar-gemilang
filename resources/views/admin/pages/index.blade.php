@extends('admin.layout.master')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Pages</h4>
                    </div>
                    <div>
                        <a href="{{ route('admin.pages.create') }}" class="btn btn-primary">Add New Page</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>URL</th>
                                    <th>Order</th>
                                    <th>Status</th>
                                    <th>Sections</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="sortable-pages">
                                @foreach($pages as $page)
                                <tr data-id="{{ $page->id }}">
                                    <td>{{ $page->name }}</td>
                                    <td>
                                        <a href="{{ url($page->url) }}" target="_blank" class="text-primary">
                                            {{ $page->url }}
                                        </a>
                                    </td>
                                    <td>{{ $page->order }}</td>
                                    <td>
                                        @if($page->active)
                                        <span class="badge bg-success">Active</span>
                                        @else
                                        <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge bg-info">
                                            {{ $page->sections->count() }}
                                            @if($page->sections->count() == 1)
                                            Section
                                            @else
                                            Sections
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        <div class="action-buttons d-flex gap-2">
                                            <a href="{{ route('admin.pages.edit', $page) }}"
                                                class="btn btn-info btn-sm">
                                                <i class="ti ti-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.pages.destroy', $page) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Are you sure you want to delete this page? This action cannot be undone.');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="ti ti-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $pages->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
    // Initialize page sorting
    new Sortable(document.getElementById('sortable-pages'), {
        handle: '.handle',
        animation: 150,
        onEnd: function(evt) {
            const pages = Array.from(evt.to.children);
            const orders = pages.map((page, index) => ({
                id: page.dataset.id,
                order: index + 1
            }));

            // Update page orders via AJAX
            fetch('{{ route('admin.pages.update-order') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    orders
                })
            });
        }
    });

    // Add drag handle to each row
    document.querySelectorAll('#sortable-pages tr').forEach(function(row) {
        const handle = document.createElement('div');
        handle.className = 'handle';
        handle.innerHTML = '<i class="ti ti-arrows-vertical"></i>';
        row.insertBefore(handle, row.firstChild);
    });
});
</script>
@endsection