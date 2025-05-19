@extends('admin.layout.master')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Page Sections: {{ $page->name }}</h4>
                    </div>
                    <div>
                        <a href="{{ route('admin.pages.edit', $page) }}" class="btn btn-primary">Back to Page</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="mb-0">Manage Sections</h6>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#addSectionModal">
                            <i class="ti ti-plus"></i> Add Section
                        </button>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th width="10">&nbsp;</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Order</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="sortable-sections">
                                @foreach($page->sections as $section)
                                <tr data-id="{{ $section->id }}">
                                    <td>
                                        <div class="handle">
                                            <i class="ti ti-arrows-move"></i>
                                        </div>
                                    </td>
                                    <td>{{ $section->name }}</td>
                                    <td>{{ ucfirst($section->type) }}</td>
                                    <td>{{ $section->order }}</td>
                                    <td>
                                        @if($section->active)
                                        <span class="badge bg-success">Active</span>
                                        @else
                                        <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="action-buttons d-flex gap-2">
                                            <button type="button" class="btn btn-info btn-sm edit-section"
                                                data-id="{{ $section->id }}">
                                                <i class="ti ti-edit"></i>
                                            </button>
                                            <form action="{{ route('admin.pages.delete-section', $section->id) }}"
                                                method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure you want to delete this section?')">
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
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.pages.partials.add-section-modal')
@include('admin.pages.partials.edit-section-modal')

@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    // Initialize sortable sections
    new Sortable(document.getElementById('sortable-sections'), {
        handle: '.handle',
        animation: 150,
        onEnd: function(evt) {
            const sections = Array.from(evt.to.children);
            const orders = sections.map((section, index) => ({
                id: section.dataset.id,
                order: index + 1
            }));

            // Update section orders via AJAX
            fetch('{{ route('admin.pages.update-section-order') }}', {
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

    // Handle edit section button click
    document.querySelectorAll('.edit-section').forEach(button => {
        button.addEventListener('click', function() {
            const sectionId = this.dataset.id;
            
            fetch(`{{ route('admin.pages.edit-section', ':id') }}`.replace(':id', sectionId))
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const section = data.section;
                        const form = document.getElementById('editSectionForm');
                        form.action = '{{ route("admin.pages.update-section", ":id") }}'.replace(':id', sectionId);
                        
                        // Populate form fields
                        form.querySelector('#edit_name').value = section.name;
                        form.querySelector('#edit_type').value = section.type;
                        form.querySelector('#edit_content').value = section.content || '';
                        form.querySelector('#edit_order').value = section.order;
                        form.querySelector('#edit_active').checked = section.active;

                        // Handle multilingual content
                        const contentIdContainer = form.querySelector('#edit_content_id_container');
                        if (data.isMultilingual) {
                            contentIdContainer.style.display = 'block';
                            form.querySelector('#edit_content_id').value = section.content_id || '';
                        } else {
                            contentIdContainer.style.display = 'none';
                        }
                        
                        // Show the modal
                        const modal = new bootstrap.Modal(document.getElementById('editSectionModal'));
                        modal.show();
                    } else {
                        toastr.error('Error fetching section data');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    toastr.error('Error fetching section data');
                });
        });
    });

    // Handle edit section form submission
    const editSectionForm = document.getElementById('editSectionForm');
    if (editSectionForm) {
        editSectionForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('_method', 'PUT');
            
            fetch(this.action, {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.reload();
                } else {
                    toastr.error('Error updating section');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                toastr.error('Error updating section');
            });
        });
    }

    // Initialize CKEditor for textareas
    document.querySelectorAll('.ckeditor').forEach(textarea => {
        ClassicEditor
            .create(textarea)
            .catch(error => {
                console.error(error);
            });
    });
});
</script>
@endsection