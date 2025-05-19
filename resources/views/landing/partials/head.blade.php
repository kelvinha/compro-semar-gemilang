<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @php
    // Load settings directly in the head
    $settings = \App\Helpers\SettingsHelper::getPublic();

    // Extract common settings
    $websiteName = 'Company Website';
    $metaDescription = 'Company website description';
    $metaKeywords = 'company, website, business';
    $ogImage = null;
    $websiteLogo = null;

    foreach($settings as $setting) {
    if($setting->key === 'website_name') {
    $websiteName = $setting->value;
    } elseif($setting->key === 'meta_description') {
    $metaDescription = $setting->value;
    } elseif($setting->key === 'meta_keywords') {
    $metaKeywords = $setting->value;
    } elseif($setting->key === 'og_image') {
    $ogImage = $setting->value;
    } elseif($setting->key === 'website_logo') {
    $websiteLogo = $setting->value;
    }
    }

    // Determine current page based on the URL
    $currentUrl = request()->path();
    $currentUrl = $currentUrl === '/' ? '/' : '/' . $currentUrl;

    // Load page content based on URL
    $activePage = null;

    // Check for home page
    if ($currentUrl === '/') {
    $activePage = \App\Helpers\PageHelper::getHomePage();
    }
    // Check for about page
    elseif ($currentUrl === '/about') {
    $activePage = \App\Helpers\PageHelper::getAboutPage();
    }
    // Check for blog post
    elseif (strpos($currentUrl, '/blog/') === 0) {
    $slug = substr($currentUrl, 6); // Remove '/blog/' prefix
    $activePage = \App\Models\Blog::where('slug', $slug)
    ->where('status', 'published')
    ->first();

    if ($activePage) {
    $activePage->load('seo');
    }
    }
    // Check for other pages
    else {
    // Try to find by URL first
    $activePage = \App\Helpers\PageHelper::getByUrl($currentUrl);

    // If not found, check if it's a submenu page
    if (!$activePage && strpos($currentUrl, '/page/') === 0) {
    $slug = substr($currentUrl, 6); // Remove '/page/' prefix
    $activePage = \App\Helpers\PageHelper::getBySubmenuSlug($slug);
    }
    }

    // Set default SEO values
    $pageTitle = $websiteName;
    $pageDescription = $metaDescription;
    $pageKeywords = $metaKeywords;
    $pageOgTitle = $websiteName;
    $pageOgDescription = $metaDescription;
    $pageOgImage = $ogImage ?: $websiteLogo;

    // If we have an active page with SEO settings, use them
    if ($activePage && isset($activePage->seo)) {
    $pageTitle = $activePage->seo->title;
    $pageDescription = $activePage->seo->description ?: $metaDescription;
    $pageKeywords = $activePage->seo->keywords ?: $metaKeywords;
    $pageOgTitle = $activePage->seo->og_title ?: $activePage->seo->title;
    $pageOgDescription = $activePage->seo->og_description ?: $activePage->seo->description;
    $pageOgImage = $activePage->seo->og_image ?: ($ogImage ?: $websiteLogo);
    }
    @endphp

    <!-- SEO Meta Tags -->
    <meta name="description" content="@yield('meta_description', $pageDescription)">
    <meta name="keywords" content="@yield('meta_keywords', $pageKeywords)">
    <title>@yield('title', $pageTitle) - {{ $websiteName }}</title>

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="@yield('og_title', $pageOgTitle)">
    <meta property="og:description" content="@yield('og_description', $pageOgDescription)">
    @if(View::hasSection('og_image'))
    <meta property="og:image" content="@yield('og_image')">
    @elseif($pageOgImage)
    <meta property="og:image" content="{{ asset('storage/' . $pageOgImage) }}">
    @endif
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    <!-- Links of CSS files -->
    <link rel="stylesheet" href="{{asset('vendor/landing')}}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('vendor/landing')}}/assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{asset('vendor/landing')}}/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('vendor/landing')}}/assets/css/animate.min.css">
    <link rel="stylesheet" href="{{asset('vendor/landing')}}/assets/css/boxicons.min.css">
    <link rel="stylesheet" href="{{asset('vendor/landing')}}/assets/css/magnific-popup.min.css">
    <link rel="stylesheet" href="{{asset('vendor/landing')}}/assets/css/flaticon.css">
    <link rel="stylesheet" href="{{asset('vendor/landing')}}/assets/css/meanmenu.min.css">
    <link rel="stylesheet" href="{{asset('vendor/landing')}}/assets/css/nice-select.min.css">
    <link rel="stylesheet" href="{{asset('vendor/landing')}}/assets/css/odometer.min.css">
    <link rel="stylesheet" href="{{asset('vendor/landing')}}/assets/css/style.css">
    <link rel="stylesheet" href="{{asset('vendor/landing')}}/assets/css/responsive.css">
    <link rel="stylesheet" href="{{asset('vendor/landing')}}/assets/css/dark-theme.css">

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- Custom CSS if defined in settings -->
    @php
    $customCss = null;
    foreach($settings as $setting) {
    if($setting->key === 'custom_css') {
    $customCss = $setting->value;
    break;
    }
    }
    @endphp

    @if($customCss)
    <style>
        {
             ! ! $customCss  ! !
        }
    </style>
    @endif

    <!-- Custom colors -->
    @php
    $primaryColor = null;
    $secondaryColor = null;

    foreach($settings as $setting) {
    if($setting->key === 'primary_color') {
    $primaryColor = $setting->value;
    } elseif($setting->key === 'secondary_color') {
    $secondaryColor = $setting->value;
    }
    }
    @endphp

    @if($primaryColor || $secondaryColor)
    <style>
        :root {
            @if($primaryColor) --primary-color: {
                    {
                    $primaryColor
                }
            }

            ;

            @endif @if($secondaryColor) --secondary-color: {
                    {
                    $secondaryColor
                }
            }

            ;
            @endif
        }
    </style>
    @endif

    <!-- Favicons -->
    @php
    $websiteFavicon = null;
    $websiteFaviconApple = null;
    $websiteFavicon32 = null;
    $websiteFavicon16 = null;
    $websiteManifest = null;

    foreach($settings as $setting) {
    if($setting->key === 'website_favicon') {
    $websiteFavicon = $setting->value;
    } elseif($setting->key === 'website_favicon_apple') {
    $websiteFaviconApple = $setting->value;
    } elseif($setting->key === 'website_favicon_32') {
    $websiteFavicon32 = $setting->value;
    } elseif($setting->key === 'website_favicon_16') {
    $websiteFavicon16 = $setting->value;
    } elseif($setting->key === 'website_manifest') {
    $websiteManifest = $setting->value;
    }
    }
    @endphp

    @if($websiteFavicon)
    <link rel="icon" type="image/png" href="{{ asset('storage/' . $websiteFavicon) }}">
    <link rel="apple-touch-icon" href="{{ asset('storage/' . $websiteFavicon) }}">
    @elseif($websiteFaviconApple)
    <link rel="apple-touch-icon" href="{{ asset('storage/' . $websiteFaviconApple) }}">
    <link rel="icon" type="image/png" href="{{ asset('vendor/landing/assets/img/favicon.png') }}">
    @else
    <link rel="icon" type="image/png" href="{{ asset('vendor/landing/assets/img/favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('vendor/landing/assets/img/favicon.png') }}">
    @endif

    @if($websiteFavicon32)
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('storage/' . $websiteFavicon32) }}">
    @endif

    @if($websiteFavicon16)
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('storage/' . $websiteFavicon16) }}">
    @endif

    @if($websiteManifest)
    <link rel="manifest" href="{{ asset('storage/' . $websiteManifest) }}">
    @endif

    <!-- Theme Color -->
    <meta name="theme-color" content="{{ $primaryColor ?? '#0d6efd' }}">
    <meta name="msapplication-TileColor" content="{{ $primaryColor ?? '#0d6efd' }}">
</head>