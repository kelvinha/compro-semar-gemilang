<head>
    <title>{{ \App\Helpers\SettingsHelper::get('website_name', config('app.name')) }} - Company Profile CMS</title>
    <!-- [Meta] -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description"
        content="{{ \App\Helpers\SettingsHelper::get('website_name', config('app.name')) }} - Company Profile CMS Dashboard" />
    <meta name="keywords" content="company profile, cms, dashboard, admin panel, content management system" />
    <meta name="author" content="{{ \App\Helpers\SettingsHelper::get('website_name', config('app.name')) }}" />
    <!-- [Favicon] icon -->
    @if (\App\Helpers\SettingsHelper::get('website_favicon'))
        <link rel="icon" href="{{ asset('storage/' . \App\Helpers\SettingsHelper::get('website_favicon')) }}"
            type="image/x-icon" />
    @else
        <link rel="icon" href="{{ asset('vendor/dashboard') }}/assets/images/favicon.svg" type="image/x-icon" />
    @endif
    <!-- [Font] Family -->
    <link rel="stylesheet" href="{{ asset('vendor/dashboard') }}/assets/fonts/inter/inter.css" id="main-font-link" />
    <!-- [Tabler Icons] https://tablericons.com -->
    <link rel="stylesheet" href="{{ asset('vendor/dashboard') }}/assets/fonts/tabler-icons.min.css" />
    <!-- [Feather Icons] https://feathericons.com -->
    <link rel="stylesheet" href="{{ asset('vendor/dashboard') }}/assets/fonts/feather.css" />
    <!-- [Font Awesome Icons] https://fontawesome.com/icons -->
    <link rel="stylesheet" href="{{ asset('vendor/dashboard') }}/assets/fonts/fontawesome.css" />
    <!-- [Material Icons] https://fonts.google.com/icons -->
    <link rel="stylesheet" href="{{ asset('vendor/dashboard') }}/assets/fonts/material.css" />
    <!-- [Template CSS Files] -->
    <link rel="stylesheet" href="{{ asset('vendor/dashboard') }}/assets/css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <script src="{{ asset('vendor/dashboard') }}/assets/js/tech-stack.js"></script>
    <link rel="stylesheet" href="{{ asset('vendor/dashboard') }}/assets/css/style-preset.css" />

    <!-- Color Picker CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.8.1/spectrum.min.css">

    <!-- Dashboard Theme CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/dashboard') }}/assets/css/style.css">
    <link rel="stylesheet" href="{{ asset('vendor/dashboard') }}/assets/css/style-preset.css">
    <!-- End Dashboard Theme CSS -->

    <!-- Dynamic Theme Colors -->
    <style>
        @php $primaryColor =\App\Helpers\SettingsHelper::get('primary_color', '#4361ee');
        $rgb =sscanf($primaryColor, "#%02x%02x%02x");
        @endphp
        :root {
            --pc-primary: {{ $primaryColor }};
            --pc-primary-rgb: {{ implode(', ', $rgb) }};
        }

        .btn-primary,
        .bg-primary {
            background-color: var(--pc-primary) !important;
            border-color: var(--pc-primary) !important;
        }

        .text-primary {
            color: var(--pc-primary) !important;
        }

        .btn-primary:hover,
        .btn-primary:focus {
            background-color: {{ \App\Helpers\SettingsHelper::get('primary_color', '#4361ee') }}dd !important;
            border-color: {{ \App\Helpers\SettingsHelper::get('primary_color', '#4361ee') }}dd !important;
        }

        .pc-sidebar .pc-navbar>.pc-item.active>.pc-link {
            color: var(--pc-primary);
        }

        .pc-sidebar .pc-navbar>.pc-item.active>.pc-link .pc-micon {
            color: var(--pc-primary);
        }

        .nav-tabs .nav-link.active {
            border-bottom-color: var(--pc-primary) !important;
        }

        .nav-tabs .nav-link:hover:not(.active) {
            border-color: transparent;
            color: var(--pc-primary) !important;
        }

        .nav-link {
            color: var(--pc-primary) !important;
        }

        .nav-link.active,
        .nav-pills .nav-link.active {
            background-color: var(--pc-primary) !important;
            border-color: var(--pc-primary) !important;
            color: #fff !important;
        }

        /* Toastr styling */
        #toast-container>div {
            opacity: 1;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            border-radius: 0.5rem;
        }

        .toast-success {
            background-color: #2dce89 !important;
        }

        .toast-error {
            background-color: #e63757 !important;
        }

        .toast-info {
            background-color: var(--pc-primary) !important;
        }

        .toast-warning {
            background-color: #fb6340 !important;
        }

        .toast-message {
            font-size: 0.875rem;
            font-weight: 400;
        }

        .toast-title {
            font-weight: 600;
            font-size: 0.9375rem;
            margin-bottom: 0.25rem;
        }

        .toast-close-button {
            font-weight: 400;
            text-shadow: none;
            opacity: 0.8;
        }

        /* Color picker styling */
        .color-picker-container {
            display: flex;
            align-items: stretch;
            gap: 0;
        }

        .color-picker-container .form-control {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }

        .color-picker-container .color-swatch {
            width: 40px;
            border: 1px solid var(--pc-primary);
            border-left: none;
            cursor: pointer;
            border-top-right-radius: 4px;
            border-bottom-right-radius: 4px;
            transition: all 0.2s ease;
        }

        .color-picker-container .color-swatch:hover {
            opacity: 0.9;
        }

        .sp-container {
            border-color: var(--border-color);
            background: #fff;
            border-radius: 4px;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }

        .sp-picker-container {
            border-left: none;
        }

        .sp-cancel,
        .sp-choose {
            border-radius: 4px;
            border: none;
            padding: 4px 8px;
            text-align: center;
            font-size: 13px;
        }

        .sp-cancel {
            background: #e9ecef;
            color: #495057 !important;
            margin-right: 4px;
        }

        .sp-choose {
            background: var(--pc-primary);
            color: #fff;
        }

        .toast-progress {
            opacity: 1;
            height: 0.25rem;
            background: rgba(255, 255, 255, 0.7);
        }
    </style>

    <!-- Pickr Color Picker CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/themes/nano.min.css">
    <!-- 'nano' theme -->

    <!-- CompRo CMS Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin-settings.css') }}">
    <!-- End CompRo CMS Custom CSS -->
</head>
