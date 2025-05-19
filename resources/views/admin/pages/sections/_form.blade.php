@php
$sectionTypes = [
    'text' => 'Text/HTML',
    'image' => 'Single Image',
    'slider' => 'Image Slider',
    'gallery' => 'Image Gallery',
    'video' => 'Video'
];
@endphp

<div class="row">
    <div class="col-md-6 mb-3">
        <div class="form-group">
            <label for="name">Section Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $section->name ?? '') }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <div class="form-group">
            <label for="type">Section Type <span class="text-danger">*</span></label>
            <select class="form-select @error('type') is-invalid @enderror" id="type" name="type" onchange="handleSectionTypeChange()" required>
                <option value="">Select a section type</option>
                @foreach($sectionTypes as $type => $label)
                    <option value="{{ $type }}" {{ old('type', $section->type ?? '') == $type ? 'selected' : '' }}>
                        {{ $label }}
                    </option>
                @endforeach
            </select>
            @error('type')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <div class="form-group">
            <label for="order">Order <span class="text-danger">*</span></label>
            <input type="number" class="form-control @error('order') is-invalid @enderror" id="order" name="order" value="{{ old('order', $section->order ?? 0) }}" required>
            @error('order')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <div class="form-group">
            <label for="active">Status</label>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="active" name="active" value="1" {{ old('active', $section->active ?? true) ? 'checked' : '' }}>
                <label class="form-check-label" for="active">Active</label>
            </div>
        </div>
    </div>

    <!-- Type-specific fields -->
    <div id="text-content" class="col-md-12 mb-3 {{ $section->type == 'text' ? '' : 'd-none' }}">
        <div class="form-group">
            <label for="content">Content <span class="text-danger">*</span></label>
            <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="5" required>{{ old('content', $section->content ?? '') }}</textarea>
            @error('content')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div id="image-content" class="col-md-6 mb-3 {{ $section->type == 'image' ? '' : 'd-none' }}">
        <div class="form-group">
            <label for="image_id">Select Image <span class="text-danger">*</span></label>
            <select class="form-select @error('image_id') is-invalid @enderror" id="image_id" name="image_id" required>
                <option value="">Select an image</option>
                @foreach($media as $mediaItem)
                    <option value="{{ $mediaItem->id }}" {{ old('image_id', $section->image_id ?? '') == $mediaItem->id ? 'selected' : '' }}>
                        {{ $mediaItem->name }}
                    </option>
                @endforeach
            </select>
            @error('image_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div id="media-content" class="col-md-12 mb-3 {{ in_array($section->type, ['slider', 'gallery']) ? '' : 'd-none' }}">
        <div class="form-group">
            <label>Select Media Items <span class="text-danger">*</span></label>
            <select class="form-select @error('media_ids') is-invalid @enderror" name="media_ids[]" multiple required>
                @foreach($media as $mediaItem)
                    <option value="{{ $mediaItem->id }}" {{ in_array($mediaItem->id, old('media_ids', $section->media_ids ?? [])) ? 'selected' : '' }}>
                        {{ $mediaItem->name }}
                    </option>
                @endforeach
            </select>
            @error('media_ids')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div id="video-content" class="col-md-12 mb-3 {{ $section->type == 'video' ? '' : 'd-none' }}">
        <div class="form-group">
            <label for="video_url">Video URL <span class="text-danger">*</span></label>
            <input type="url" class="form-control @error('video_url') is-invalid @enderror" id="video_url" name="video_url" value="{{ old('video_url', $section->video_url ?? '') }}" required>
            <small class="form-text text-muted">Enter a YouTube or Vimeo video URL</small>
            @error('video_url')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-md-12 mb-3">
        <div class="form-group">
            <label for="options">Options (JSON format)</label>
            <textarea class="form-control @error('options') is-invalid @enderror" id="options" name="options" rows="3">{{ old('options', $section->options ?? '') }}</textarea>
            <small class="form-text text-muted">Enter any additional options for the section in JSON format.</small>
            @error('options')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<script>
function handleSectionTypeChange() {
    const type = document.getElementById('type').value;
    
    // Hide all type-specific sections
    ['text-content', 'image-content', 'media-content', 'video-content'].forEach(id => {
        document.getElementById(id).classList.add('d-none');
    });

    // Show relevant section based on type
    switch(type) {
        case 'text':
            document.getElementById('text-content').classList.remove('d-none');
            break;
        case 'image':
            document.getElementById('image-content').classList.remove('d-none');
            break;
        case 'slider':
        case 'gallery':
            document.getElementById('media-content').classList.remove('d-none');
            break;
        case 'video':
            document.getElementById('video-content').classList.remove('d-none');
            break;
    }
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    handleSectionTypeChange();
    
    // Initialize select2 for better dropdown experience
    const selectElements = document.querySelectorAll('select.form-select');
    selectElements.forEach(select => {
        $(select).select2({
            theme: 'bootstrap-5',
            width: '100%'
        });
    });
});
</script>
