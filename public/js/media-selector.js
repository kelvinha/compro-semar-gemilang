/**
 * Media Selector for CMS
 * Handles selecting media items for sliders, galleries, etc.
 */

class MediaSelector {
    constructor(options) {
        this.options = Object.assign({
            containerSelector: null,
            inputSelector: null,
            buttonSelector: null,
            multiple: true,
            maxItems: 10,
            mediaRoute: '/admin/media',
            onSelect: null
        }, options);

        this.selectedItems = [];
        this.init();
    }

    init() {
        const button = document.querySelector(this.options.buttonSelector);
        if (!button) return;

        button.addEventListener('click', (e) => {
            e.preventDefault();
            this.openMediaBrowser();
        });

        // Initialize selected items if input has value
        const input = document.querySelector(this.options.inputSelector);
        if (input && input.value) {
            try {
                this.selectedItems = JSON.parse(input.value);
                this.renderSelectedItems();
            } catch (e) {
                console.error('Error parsing selected media items', e);
            }
        }
    }

    openMediaBrowser() {
        // Create modal for media browser
        const modal = document.createElement('div');
        modal.className = 'modal fade';
        modal.id = 'mediaSelectorModal';
        modal.setAttribute('tabindex', '-1');
        modal.setAttribute('aria-labelledby', 'mediaSelectorModalLabel');
        modal.setAttribute('aria-hidden', 'true');

        modal.innerHTML = `
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="mediaSelectorModalLabel">Select Media</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="media-search" placeholder="Search media...">
                                    <button class="btn btn-outline-secondary" type="button" id="media-search-btn">
                                        <i class="ti ti-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="media-items">
                            <div class="col-12 text-center py-5">
                                <div class="spinner-border text-primary" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" id="select-media-btn">Select</button>
                    </div>
                </div>
            </div>
        `;

        document.body.appendChild(modal);

        // Initialize Bootstrap modal
        const modalInstance = new bootstrap.Modal(modal);
        modalInstance.show();

        // Load media items
        this.loadMediaItems();

        // Handle media selection
        const selectBtn = document.getElementById('select-media-btn');
        selectBtn.addEventListener('click', () => {
            this.confirmSelection();
            modalInstance.hide();
            
            // Remove modal from DOM after hiding
            modal.addEventListener('hidden.bs.modal', function () {
                modal.remove();
            });
        });

        // Handle search
        const searchBtn = document.getElementById('media-search-btn');
        const searchInput = document.getElementById('media-search');
        
        searchBtn.addEventListener('click', () => {
            this.loadMediaItems(searchInput.value);
        });
        
        searchInput.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') {
                e.preventDefault();
                this.loadMediaItems(searchInput.value);
            }
        });

        // Clean up when modal is closed
        modal.addEventListener('hidden.bs.modal', () => {
            modal.remove();
        });
    }

    loadMediaItems(search = '') {
        const mediaItemsContainer = document.getElementById('media-items');
        
        // Show loading spinner
        mediaItemsContainer.innerHTML = `
            <div class="col-12 text-center py-5">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        `;
        
        // Fetch media items from server
        fetch(`${this.options.mediaRoute}?format=json&search=${encodeURIComponent(search)}`)
            .then(response => response.json())
            .then(data => {
                if (data.media && data.media.length > 0) {
                    this.renderMediaItems(data.media);
                } else {
                    mediaItemsContainer.innerHTML = `
                        <div class="col-12 text-center py-5">
                            <p class="text-muted">No media items found</p>
                        </div>
                    `;
                }
            })
            .catch(error => {
                console.error('Error loading media items', error);
                mediaItemsContainer.innerHTML = `
                    <div class="col-12 text-center py-5">
                        <p class="text-danger">Error loading media items</p>
                    </div>
                `;
            });
    }

    renderMediaItems(items) {
        const mediaItemsContainer = document.getElementById('media-items');
        mediaItemsContainer.innerHTML = '';
        
        items.forEach(item => {
            const isImage = item.mime_type && item.mime_type.startsWith('image/');
            const isSelected = this.selectedItems.some(selected => selected.id === item.id);
            
            const mediaItem = document.createElement('div');
            mediaItem.className = 'col-md-2 col-sm-3 col-6 mb-3';
            mediaItem.innerHTML = `
                <div class="media-item ${isSelected ? 'selected' : ''}" data-id="${item.id}" data-url="${item.url}" data-name="${item.name}">
                    ${isImage 
                        ? `<img src="${item.url}" alt="${item.name}" class="img-fluid">`
                        : `<div class="file-icon"><i class="ti ti-file"></i><span>${item.extension}</span></div>`
                    }
                    <div class="media-item-name">${item.name}</div>
                </div>
            `;
            
            mediaItemsContainer.appendChild(mediaItem);
            
            // Add click event to select/deselect
            const mediaItemElement = mediaItem.querySelector('.media-item');
            mediaItemElement.addEventListener('click', () => {
                if (this.options.multiple) {
                    if (isSelected) {
                        // Deselect item
                        mediaItemElement.classList.remove('selected');
                        this.selectedItems = this.selectedItems.filter(selected => selected.id !== item.id);
                    } else {
                        // Check if max items reached
                        if (this.selectedItems.length >= this.options.maxItems) {
                            alert(`You can select a maximum of ${this.options.maxItems} items`);
                            return;
                        }
                        
                        // Select item
                        mediaItemElement.classList.add('selected');
                        this.selectedItems.push({
                            id: item.id,
                            url: item.url,
                            name: item.name
                        });
                    }
                } else {
                    // Single selection mode
                    document.querySelectorAll('.media-item').forEach(el => {
                        el.classList.remove('selected');
                    });
                    
                    mediaItemElement.classList.add('selected');
                    this.selectedItems = [{
                        id: item.id,
                        url: item.url,
                        name: item.name
                    }];
                }
            });
        });
    }

    confirmSelection() {
        // Update hidden input with selected items
        const input = document.querySelector(this.options.inputSelector);
        if (input) {
            input.value = JSON.stringify(this.selectedItems);
        }
        
        // Render selected items in container
        this.renderSelectedItems();
        
        // Call onSelect callback if provided
        if (typeof this.options.onSelect === 'function') {
            this.options.onSelect(this.selectedItems);
        }
    }

    renderSelectedItems() {
        const container = document.querySelector(this.options.containerSelector);
        if (!container) return;
        
        container.innerHTML = '';
        
        if (this.selectedItems.length === 0) {
            container.innerHTML = '<p class="text-muted">No items selected</p>';
            return;
        }
        
        const itemsContainer = document.createElement('div');
        itemsContainer.className = 'media-selector-items';
        
        this.selectedItems.forEach((item, index) => {
            const itemElement = document.createElement('div');
            itemElement.className = 'media-selector-item';
            itemElement.innerHTML = `
                <div class="media-item">
                    <img src="${item.url}" alt="${item.name}" class="img-fluid">
                    <button type="button" class="media-remove" data-index="${index}">
                        <i class="ti ti-x"></i>
                    </button>
                </div>
                <div class="media-item-name">${item.name}</div>
            `;
            
            itemsContainer.appendChild(itemElement);
            
            // Add remove button event
            const removeBtn = itemElement.querySelector('.media-remove');
            removeBtn.addEventListener('click', (e) => {
                e.preventDefault();
                e.stopPropagation();
                this.removeItem(index);
            });
        });
        
        container.appendChild(itemsContainer);
    }

    removeItem(index) {
        this.selectedItems.splice(index, 1);
        
        // Update hidden input
        const input = document.querySelector(this.options.inputSelector);
        if (input) {
            input.value = JSON.stringify(this.selectedItems);
        }
        
        // Re-render selected items
        this.renderSelectedItems();
        
        // Call onSelect callback if provided
        if (typeof this.options.onSelect === 'function') {
            this.options.onSelect(this.selectedItems);
        }
    }
}

// Initialize media selectors when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    // Slider images selector
    const sliderSelector = document.getElementById('select-slider-images');
    if (sliderSelector) {
        new MediaSelector({
            containerSelector: '#selected-slider-images',
            inputSelector: '#slider-images-input',
            buttonSelector: '#select-slider-images',
            multiple: true,
            maxItems: 10,
            mediaRoute: '/admin/media'
        });
    }
    
    // Gallery images selector
    const gallerySelector = document.getElementById('select-gallery-images');
    if (gallerySelector) {
        new MediaSelector({
            containerSelector: '#selected-gallery-images',
            inputSelector: '#gallery-images-input',
            buttonSelector: '#select-gallery-images',
            multiple: true,
            maxItems: 20,
            mediaRoute: '/admin/media'
        });
    }
    
    // Testimonial image selectors
    document.querySelectorAll('.select-testimonial-image').forEach((button, index) => {
        new MediaSelector({
            containerSelector: `#testimonial-image-preview-${index}`,
            inputSelector: button.previousElementSibling,
            buttonSelector: `#${button.id}`,
            multiple: false,
            mediaRoute: '/admin/media'
        });
    });
});
