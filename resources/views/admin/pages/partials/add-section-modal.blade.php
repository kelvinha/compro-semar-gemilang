<!-- Add Section Modal -->
<div class="modal fade" id="addSectionModal" tabindex="-1" aria-labelledby="addSectionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addSectionModalLabel">Add New Section</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addSectionForm" method="POST">
                @csrf
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="name">Section Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="type">Section Type <span class="text-danger">*</span></label>
                        <select class="form-control" id="type" name="type" required>
                            <option value="content">Content</option>
                            <option value="slider">Slider</option>
                            <option value="gallery">Gallery</option>
                            <option value="features">Features</option>
                            <option value="testimonials">Testimonials</option>
                            <option value="contact">Contact Form</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="content">Content</label>
                        <textarea class="form-control ckeditor" id="content" name="content" rows="5"></textarea>
                    </div>

                    @if(isset($isMultilingual) && $isMultilingual)
                    <div class="form-group mb-3">
                        <label for="content_id">Content (Indonesian)</label>
                        <textarea class="form-control ckeditor" id="content_id" name="content_id" rows="5"></textarea>
                    </div>
                    @endif

                    <div class="form-group mb-3">
                        <label for="order">Order</label>
                        <input type="number" class="form-control" id="order" name="order" value="0">
                    </div>

                    <div class="form-group mb-3">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="active" name="active" value="1" checked>
                            <label class="form-check-label" for="active">Active</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add Section</button>
                </div>
            </form>
        </div>
    </div>
</div>
