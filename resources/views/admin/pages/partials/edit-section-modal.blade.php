<!-- Edit Section Modal -->
<div class="modal fade" id="editSectionModal" tabindex="-1" aria-labelledby="editSectionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSectionModalLabel">Edit Section</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editSectionForm" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="PUT">
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="edit_name">Section Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="edit_name" name="name" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="edit_type">Section Type <span class="text-danger">*</span></label>
                        <select class="form-control" id="edit_type" name="type" required>
                            <option value="content">Content</option>
                            <option value="slider">Slider</option>
                            <option value="gallery">Gallery</option>
                            <option value="features">Features</option>
                            <option value="testimonials">Testimonials</option>
                            <option value="contact">Contact Form</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="edit_content">Content</label>
                        <textarea class="form-control ckeditor" id="edit_content" name="content" rows="5"></textarea>
                    </div>

                    <div id="edit_content_id_container" style="display: none;">
                        <div class="form-group mb-3">
                            <label for="edit_content_id">Content (Indonesian)</label>
                            <textarea class="form-control ckeditor" id="edit_content_id" name="content_id" rows="5"></textarea>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="edit_order">Order</label>
                        <input type="number" class="form-control" id="edit_order" name="order" value="0">
                    </div>

                    <div class="form-group mb-3">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="edit_active" name="active" value="1">
                            <label class="form-check-label" for="edit_active">Active</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update Section</button>
                </div>
            </form>
        </div>
    </div>
</div>
