<!DOCTYPE html>
<html lang="en" data-primary-color="{{ \App\Helpers\SettingsHelper::get('primary_color', '#4361ee') }}"
    data-secondary-color="{{ \App\Helpers\SettingsHelper::get('secondary_color', '#7239ea') }}">

<head>
    <title>{{ \App\Helpers\SettingsHelper::get('website_name', 'Company Profile CMS') }} - Login</title>
    <!-- [Meta] -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description"
        content="{{ \App\Helpers\SettingsHelper::get('meta_description', 'Company Profile CMS Login') }}" />
    <meta name="keywords"
        content="{{ \App\Helpers\SettingsHelper::get('meta_keywords', 'company profile, cms, login') }}" />
    <meta name="author" content="{{ \App\Helpers\SettingsHelper::get('website_name', 'Company Profile CMS') }}" />
    <!-- [Favicon] icon -->
    @if (\App\Helpers\SettingsHelper::get('website_favicon'))
        <link rel="icon" href="{{ asset('storage/' . \App\Helpers\SettingsHelper::get('website_favicon')) }}"
            type="image/x-icon" />
    @else
        <link rel="icon" href="{{ asset('vendor/dashboard') }}/assets/images/favicon.svg" type="image/x-icon" />
    @endif
    <!-- [Font] Family -->
    <link rel="stylesheet" href="{{ asset('vendor/dashboard') }}/assets/fonts/inter/inter.css" id="main-font-link" />
    <!-- [phosphor Icons] https://phosphoricons.com/ -->
    <link rel="stylesheet" href="{{ asset('vendor/dashboard') }}/assets/fonts/phosphor/duotone/style.css" />
    <!-- [Tabler Icons] https://tablericons.com -->
    <link rel="stylesheet" href="{{ asset('vendor/dashboard') }}/assets/fonts/tabler-icons.min.css" />
    <!-- [Feather Icons] https://feathericons.com -->
    <link rel="stylesheet" href="{{ asset('vendor/dashboard') }}/assets/fonts/feather.css" />
    <!-- [Font Awesome Icons] https://fontawesome.com/icons -->
    <link rel="stylesheet" href="{{ asset('vendor/dashboard') }}/assets/fonts/fontawesome.css" />
    <!-- [Material Icons] https://fonts.google.com/icons -->
    <link rel="stylesheet" href="{{ asset('vendor/dashboard') }}/assets/fonts/material.css" />
    <!-- [Template CSS Files] -->
    <link rel="stylesheet" href="{{ asset('vendor/dashboard') }}/assets/css/style.css" id="main-style-link" />
    <script src="{{ asset('vendor/dashboard') }}/assets/js/tech-stack.js"></script>
    <link rel="stylesheet" href="{{ asset('vendor/dashboard') }}/assets/css/style-preset.css" />
    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/compro-cms-admin.css') }}" />
</head><!-- [Head] end --><!-- [Body] Start -->

<body data-pc-preset="preset-1" data-pc-sidebar-caption="true" data-pc-layout="vertical" data-pc-direction="ltr"
    data-pc-theme_contrast="" data-pc-theme="light">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
    <div class="auth-main">
        <div class="auth-wrapper v1">
            <div class="auth-form">
                <div class="card my-5">
                    <div class="card-body">
                        <div class="text-center">
                            @if (\App\Helpers\SettingsHelper::get('website_logo'))
                                <a href="{{ url('/') }}"><img
                                        src="{{ asset('storage/' . \App\Helpers\SettingsHelper::get('website_logo')) }}"
                                        style="max-width:300px; max-height:100px;"
                                        alt="{{ \App\Helpers\SettingsHelper::get('website_name', 'Company Profile CMS') }}" /></a>
                            @else
                                <a href="{{ url('/') }}"><img src="{{ asset('logo.png') }}"
                                        style="max-width:300px; max-height:100px;"
                                        alt="{{ \App\Helpers\SettingsHelper::get('website_name', 'Company Profile CMS') }}" /></a>
                            @endif
                        </div>
                        <h4 class="text-center f-w-500 mb-3">
                            Login with your email
                        </h4>
                        <form action="{{ route('auth.submit') }}" method="post">
                            {{ csrf_field() }}
                            <div class="mb-3">
                                <input type="email" name="email" class="form-control" id="floatingInput"
                                    placeholder="Email Address" />
                            </div>
                            <div class="mb-3">
                                <input type="password" name="password" class="form-control" id="floatingInput1"
                                    placeholder="Password" />
                            </div>
                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end --><!-- Required Js -->
    <script src="{{ asset('vendor/dashboard') }}/assets/js/plugins/popper.min.js"></script>
    <script src="{{ asset('vendor/dashboard') }}/assets/js/plugins/simplebar.min.js"></script>
    <script src="{{ asset('vendor/dashboard') }}/assets/js/plugins/bootstrap.min.js"></script>
    <script src="{{ asset('vendor/dashboard') }}/assets/js/fonts/custom-font.js"></script>
    <script src="{{ asset('vendor/dashboard') }}/assets/js/pcoded.js"></script>
    <script src="{{ asset('vendor/dashboard') }}/assets/js/plugins/feather.min.js"></script>
    <!-- jQuery and Toastr -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{ asset('js/compro-cms-admin.js') }}"></script>

    <script>
        $(document).ready(function() {
            // Apply dynamic colors
            applyDynamicColors();

            // Configure Toastr
            toastr.options = {
                closeButton: true,
                progressBar: true,
                positionClass: 'toast-top-right',
                timeOut: 5000
            };

            @if (session('error'))
                toastr.error('{{ session('error') }}');
            @endif

            @if (session('success'))
                toastr.success('{{ session('success') }}');
            @endif

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    toastr.error('{{ $error }}');
                @endforeach
            @endif
        });
    </script>
</body>

</html>
