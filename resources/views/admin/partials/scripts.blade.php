<script src="{{ asset('vendor/dashboard') }}/assets/js/plugins/popper.min.js"></script>
<script src="{{ asset('vendor/dashboard') }}/assets/js/plugins/simplebar.min.js"></script>
<script src="{{ asset('vendor/dashboard') }}/assets/js/plugins/bootstrap.min.js"></script>
<script src="{{ asset('vendor/dashboard') }}/assets/js/fonts/custom-font.js"></script>
<script src="{{ asset('vendor/dashboard') }}/assets/js/pcoded.js"></script>
<script src="{{ asset('vendor/dashboard') }}/assets/js/plugins/feather.min.js"></script>
<!-- [Page Specific JS] start -->
<script src="{{ asset('vendor/dashboard') }}/assets/js/plugins/simple-datatables.js"></script>
<script>
    const dataTable = new simpleDatatables.DataTable("#pc-dt-simple", {
        sortable: false,
        perPage: 5,
    });
</script>
<script>
    layout_change("light");
</script>
<script>
    change_box_container("false");
</script>
<script>
    layout_caption_change("true");
</script>
<script>
    layout_rtl_change("false");
</script>
<script>
    preset_change("preset-1");
</script>
<script>
    main_layout_change("vertical");
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/pickr.min.js"></script>
@include('vendor.toastr.toastr')
@include('admin.partials.ckeditor')

<!-- CompRo CMS Custom JS -->
<script src="{{ asset('js/compro-cms-admin.js') }}"></script>

<!-- Update CSS Variables from Settings -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get primary and secondary colors from HTML data attributes
        const primaryColor = document.documentElement.getAttribute('data-primary-color') || '#1c582c';
        const secondaryColor = document.documentElement.getAttribute('data-secondary-color') || '#6c757d';

        // Convert hex to RGB for rgba values
        const hexToRgb = (hex) => {
            const shorthandRegex = /^#?([a-f\d])([a-f\d])([a-f\d])$/i;
            hex = hex.replace(shorthandRegex, (m, r, g, b) => r + r + g + g + b + b);
            const result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
            return result ? {
                r: parseInt(result[1], 16),
                g: parseInt(result[2], 16),
                b: parseInt(result[3], 16)
            } : null;
        };

        // Calculate darker shade for hover states
        const getDarkerShade = (hex) => {
            const rgb = hexToRgb(hex);
            if (!rgb) return '#164623';

            const darken = (val) => Math.max(0, Math.floor(val * 0.85));
            return `#${darken(rgb.r).toString(16).padStart(2, '0')}${darken(rgb.g).toString(16).padStart(2, '0')}${darken(rgb.b).toString(16).padStart(2, '0')}`;
        };

        // Set CSS variables
        document.documentElement.style.setProperty('--primary-color', primaryColor);
        document.documentElement.style.setProperty('--primary-color-dark', getDarkerShade(primaryColor));

        const primaryRgb = hexToRgb(primaryColor);
        if (primaryRgb) {
            document.documentElement.style.setProperty('--primary-color-light',
                `rgba(${primaryRgb.r}, ${primaryRgb.g}, ${primaryRgb.b}, 0.1)`);
            document.documentElement.style.setProperty('--primary-color-focus',
                `rgba(${primaryRgb.r}, ${primaryRgb.g}, ${primaryRgb.b}, 0.25)`);
        }

        document.documentElement.style.setProperty('--secondary-color', secondaryColor);
    });
</script>
<script>
    // Initialize tooltips
    document.addEventListener('DOMContentLoaded', function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</script>
<!-- End CompRo CMS Custom JS -->
@yield('scripts')
