<div class="row">
    <div class="col-md-6 mb-3">
        <div class="form-group">
            <label for="edit-section-name">Name</label>
            <input type="text" class="form-control" id="edit-section-name" name="name" value="{{ $section->name }}" required>
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <div class="form-group">
            <label for="edit-section-type">Type</label>
            <select class="form-control" id="edit-section-type" name="type" required>
                <option value="content" {{ $section->type == 'content' ? 'selected' : '' }}>Content</option>
                <option value="slider" {{ $section->type == 'slider' ? 'selected' : '' }}>Slider</option>
                <option value="gallery" {{ $section->type == 'gallery' ? 'selected' : '' }}>Gallery</option>
                <option value="features" {{ $section->type == 'features' ? 'selected' : '' }}>Features</option>
                <option value="testimonials" {{ $section->type == 'testimonials' ? 'selected' : '' }}>Testimonials</option>
                <option value="contact" {{ $section->type == 'contact' ? 'selected' : '' }}>Contact Form</option>
            </select>
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <div class="form-group">
            <label for="edit-section-order">Order</label>
            <input type="number" class="form-control" id="edit-section-order" name="order" value="{{ $section->order }}">
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <div class="form-group">
            <label for="edit-section-active">Active</label>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="edit-section-active" name="active" value="1" {{ $section->active ? 'checked' : '' }}>
            </div>
        </div>
    </div>

    <!-- Content Section - Only visible for content type -->
    <div class="col-md-12 mb-3 section-field" id="edit-content-section" style="{{ $section->type == 'content' ? 'display: block;' : 'display: none;' }}">
        <div class="form-group">
            <label for="edit-section-content">Content</label>
            <textarea class="form-control ckeditor" id="edit-section-content" name="content" rows="5">{{ $section->content }}</textarea>
        </div>

        @if (isset($isMultilingual) && $isMultilingual)
            <div class="form-group mt-3">
                <label for="edit-section-content-id">Content (Indonesian)</label>
                <textarea class="form-control ckeditor" id="edit-section-content-id" name="content_id" rows="5">{{ $section->content_id }}</textarea>
            </div>
        @endif
    </div>

    <!-- Slider Section - Only visible for slider type -->
    <div class="col-md-12 mb-3 section-field" id="edit-slider-section" style="{{ $section->type == 'slider' ? 'display: block;' : 'display: none;' }}">
        <div class="form-group">
            <label>Slider Images</label>
            <div class="row mt-3" id="edit-slider-images">
                <div class="col-md-12 mb-3">
                    <button type="button" class="btn btn-primary" id="edit-select-slider-images">
                        <i class="ti ti-photo"></i> Select Images from Media
                    </button>
                </div>
                <div class="col-md-12" id="edit-selected-slider-images">
                    @if($section->type == 'slider' && $section->content)
                        @php
                            $sliderImages = json_decode($section->content, true) ?? [];
                        @endphp
                        <div class="media-selector-items">
                            @foreach($sliderImages as $index => $image)
                                <div class="media-selector-item">
                                    <div class="media-item">
                                        <img src="{{ $image['url'] ?? asset('storage/' . $image) }}" alt="{{ $image['name'] ?? 'Slider Image' }}" class="img-fluid">
                                        <button type="button" class="media-remove" data-index="{{ $index }}">
                                            <i class="ti ti-x"></i>
                                        </button>
                                    </div>
                                    <div class="media-item-name">{{ $image['name'] ?? 'Image ' . ($index + 1) }}</div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
            <input type="hidden" name="slider_images" id="edit-slider-images-input" value="{{ $section->type == 'slider' ? $section->content : '' }}">
        </div>
    </div>

    <!-- Gallery Section - Only visible for gallery type -->
    <div class="col-md-12 mb-3 section-field" id="edit-gallery-section" style="{{ $section->type == 'gallery' ? 'display: block;' : 'display: none;' }}">
        <div class="form-group">
            <label>Gallery Images</label>
            <div class="row mt-3" id="edit-gallery-images">
                <div class="col-md-12 mb-3">
                    <button type="button" class="btn btn-primary" id="edit-select-gallery-images">
                        <i class="ti ti-photo"></i> Select Images from Media
                    </button>
                </div>
                <div class="col-md-12" id="edit-selected-gallery-images">
                    @if($section->type == 'gallery' && $section->content)
                        @php
                            $galleryImages = json_decode($section->content, true) ?? [];
                        @endphp
                        <div class="media-selector-items">
                            @foreach($galleryImages as $index => $image)
                                <div class="media-selector-item">
                                    <div class="media-item">
                                        <img src="{{ $image['url'] ?? asset('storage/' . $image) }}" alt="{{ $image['name'] ?? 'Gallery Image' }}" class="img-fluid">
                                        <button type="button" class="media-remove" data-index="{{ $index }}">
                                            <i class="ti ti-x"></i>
                                        </button>
                                    </div>
                                    <div class="media-item-name">{{ $image['name'] ?? 'Image ' . ($index + 1) }}</div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
            <input type="hidden" name="gallery_images" id="edit-gallery-images-input" value="{{ $section->type == 'gallery' ? $section->content : '' }}">
        </div>
    </div>

    <!-- Features Section - Only visible for features type -->
    <div class="col-md-12 mb-3 section-field" id="edit-features-section" style="{{ $section->type == 'features' ? 'display: block;' : 'display: none;' }}">
        <div class="form-group">
            <label>Features</label>
            <div id="edit-features-container">
                @if($section->type == 'features' && $section->content)
                    @php
                        $features = json_decode($section->content, true) ?? [];
                    @endphp
                    @foreach($features as $index => $feature)
                        <div class="feature-item card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label>Title</label>
                                        <input type="text" class="form-control feature-title" name="feature_titles[]" value="{{ $feature['title'] ?? '' }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Icon</label>
                                        <input type="text" class="form-control feature-icon" name="feature_icons[]" placeholder="fa fa-star" value="{{ $feature['icon'] ?? '' }}">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label>Description</label>
                                        <textarea class="form-control feature-description" name="feature_descriptions[]" rows="3">{{ $feature['description'] ?? '' }}</textarea>
                                    </div>
                                </div>
                                @if($index > 0)
                                    <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 m-2 remove-feature">
                                        <i class="ti ti-trash"></i>
                                    </button>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="feature-item card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>Title</label>
                                    <input type="text" class="form-control feature-title" name="feature_titles[]">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Icon</label>
                                    <input type="text" class="form-control feature-icon" name="feature_icons[]" placeholder="fa fa-star">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Description</label>
                                    <textarea class="form-control feature-description" name="feature_descriptions[]" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <button type="button" class="btn btn-success mt-2" id="edit-add-feature">
                <i class="ti ti-plus"></i> Add Feature
            </button>
        </div>
    </div>

    <!-- Image Section - Only visible for content type -->
    <div class="col-md-6 mb-3 section-field" id="edit-image-section" style="{{ $section->type == 'content' ? 'display: block;' : 'display: none;' }}">
        <div class="form-group">
            <label for="edit-section-image">Image</label>
            <input type="file" class="form-control" id="edit-section-image" name="image">
            @if($section->image)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $section->image) }}" alt="Section Image" class="img-thumbnail" style="max-height: 100px;">
                </div>
            @endif
        </div>
    </div>
</div>

<script>
    // Initialize section type change handler
    document.getElementById('edit-section-type').addEventListener('change', function() {
        // Hide all section fields
        document.querySelectorAll('.section-field').forEach(function(field) {
            field.style.display = 'none';
        });
        
        // Show fields based on selected type
        const selectedType = this.value;
        
        switch(selectedType) {
            case 'content':
                document.getElementById('edit-content-section').style.display = 'block';
                document.getElementById('edit-image-section').style.display = 'block';
                break;
            case 'slider':
                document.getElementById('edit-slider-section').style.display = 'block';
                break;
            case 'gallery':
                document.getElementById('edit-gallery-section').style.display = 'block';
                break;
            case 'features':
                document.getElementById('edit-features-section').style.display = 'block';
                break;
            case 'testimonials':
                document.getElementById('edit-testimonials-section').style.display = 'block';
                break;
            case 'contact':
                document.getElementById('edit-contact-section').style.display = 'block';
                break;
            default:
                document.getElementById('edit-content-section').style.display = 'block';
                document.getElementById('edit-image-section').style.display = 'block';
        }
    });
    
    // Initialize CKEditor for textarea fields
    document.querySelectorAll('#editSectionModal textarea.ckeditor').forEach(function(textarea) {
        ClassicEditor
            .create(textarea)
            .catch(error => {
                console.error(error);
            });
    });
    
    // Add feature button
    document.getElementById('edit-add-feature').addEventListener('click', function() {
        const container = document.getElementById('edit-features-container');
        const featureItem = document.querySelector('.feature-item').cloneNode(true);
        
        // Clear input values
        featureItem.querySelectorAll('input, textarea').forEach(function(input) {
            input.value = '';
        });
        
        // Add remove button
        const removeBtn = document.createElement('button');
        removeBtn.type = 'button';
        removeBtn.className = 'btn btn-danger btn-sm position-absolute top-0 end-0 m-2 remove-feature';
        removeBtn.innerHTML = '<i class="ti ti-trash"></i>';
        removeBtn.addEventListener('click', function() {
            featureItem.remove();
        });
        featureItem.querySelector('.card-body').appendChild(removeBtn);
        
        container.appendChild(featureItem);
    });
    
    // Remove feature buttons
    document.querySelectorAll('.remove-feature').forEach(function(button) {
        button.addEventListener('click', function() {
            this.closest('.feature-item').remove();
        });
    });
    
    // Initialize media selectors
    if (typeof MediaSelector !== 'undefined') {
        // Slider images selector
        const editSliderSelector = document.getElementById('edit-select-slider-images');
        if (editSliderSelector) {
            new MediaSelector({
                containerSelector: '#edit-selected-slider-images',
                inputSelector: '#edit-slider-images-input',
                buttonSelector: '#edit-select-slider-images',
                multiple: true,
                maxItems: 10,
                mediaRoute: '/admin/media'
            });
        }
        
        // Gallery images selector
        const editGallerySelector = document.getElementById('edit-select-gallery-images');
        if (editGallerySelector) {
            new MediaSelector({
                containerSelector: '#edit-selected-gallery-images',
                inputSelector: '#edit-gallery-images-input',
                buttonSelector: '#edit-select-gallery-images',
                multiple: true,
                maxItems: 20,
                mediaRoute: '/admin/media'
            });
        }
    }
</script>
