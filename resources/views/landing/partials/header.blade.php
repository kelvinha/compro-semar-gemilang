<!-- Start Header Area -->
<header class="header-area p-relative">

    <!-- Start Top Header -->
    <div class="top-header bg-dark">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-sm-6">
                    <ul class="header-left-content">
                        @if(isset($settings['company_phone']))
                        <li>
                            <i class="bx bx-phone-call"></i>
                            <a href="tel:{{ $settings['company_phone'] }}">{{ $settings['company_phone'] }}</a>
                        </li>
                        @endif
                        @if(isset($settings['company_email']))
                        <li>
                            <i class="bx bx-envelope"></i>
                            <a href="mailto:{{ $settings['company_email'] }}">{{ $settings['company_email'] }}</a>
                        </li>
                        @endif
                    </ul>
                </div>

                <div class="col-lg-6 col-sm-6">
                    <ul class="header-right-content">
                        @if(isset($settings['social_facebook']))
                        <li>
                            <a href="{{ $settings['social_facebook'] }}" target="_blank">
                                <i class="bx bxl-facebook"></i>
                            </a>
                        </li>
                        @endif
                        @if(isset($settings['social_instagram']))
                        <li>
                            <a href="{{ $settings['social_instagram'] }}" target="_blank">
                                <i class="bx bxl-instagram"></i>
                            </a>
                        </li>
                        @endif
                        @if(isset($settings['social_linkedin']))
                        <li>
                            <a href="{{ $settings['social_linkedin'] }}" target="_blank">
                                <i class="bx bxl-linkedin"></i>
                            </a>
                        </li>
                        @endif
                        @if(isset($settings['social_twitter']))
                        <li>
                            <a href="{{ $settings['social_twitter'] }}" target="_blank">
                                <i class="bx bxl-twitter"></i>
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Start Top Header -->

    <!-- Start Navbar Area -->
    <div class="navbar-area navbar-area-two">
        <div class="mobile-nav">
            <div class="container">
                <a href="{{ route('home.index') }}" class="logo">
                    @php
                    $websiteLogo = null;
                    $websiteLogoDark = null;
                    $websiteName = 'Logo';

                    foreach($settings as $setting) {
                    if($setting->key === 'website_logo') {
                    $websiteLogo = $setting->value;
                    } elseif($setting->key === 'website_logo_dark') {
                    $websiteLogoDark = $setting->value;
                    } elseif($setting->key === 'website_name') {
                    $websiteName = $setting->value;
                    }
                    }
                    @endphp

                    @if($websiteLogo)
                    <img src="{{ asset('storage/' . $websiteLogo) }}" alt="{{ $websiteName }}" class="logo-light"
                        style="width:170px;">
                    @else
                    <img src="{{ asset('vendor/landing/assets/img/black-logo.png') }}" alt="Logo" class="logo-light">
                    @endif

                    @if($websiteLogoDark)
                    <img src="{{ asset('storage/' . $websiteLogoDark) }}" alt="{{ $websiteName }}" class="logo-dark">
                    @else
                    <img src="{{ asset('vendor/landing/assets/img/logo.png') }}" alt="Logo" class="logo-dark">
                    @endif
                </a>
            </div>
        </div>

        <div class="main-nav">
            <div class="container">
                <nav class="navbar navbar-expand-md">
                    <a class="navbar-brand" href="{{ route('home.index') }}">
                        @if($websiteLogo)
                        <img src="{{ asset('storage/' . $websiteLogo) }}" alt="{{ $websiteName }}" class="logo-light"
                            style="width:170px;">
                        @else
                        <img src="{{ asset('vendor/landing/assets/img/black-logo.png') }}" alt="Logo"
                            class="logo-light">
                        @endif

                        @if($websiteLogoDark)
                        <img src="{{ asset('storage/' . $websiteLogoDark) }}" alt="{{ $websiteName }}"
                            class="logo-dark">
                        @else
                        <img src="{{ asset('vendor/landing/assets/img/logo.png') }}" alt="Logo" class="logo-dark">
                        @endif
                    </a>

                    <div class="collapse navbar-collapse mean-menu">
                        <ul class="navbar-nav m-auto">
                            @php
                            // Load main menu directly in the header
                            $mainMenu = \App\Helpers\MenuHelper::getMainMenu();
                            @endphp

                            @if($mainMenu && $mainMenu->submenus && $mainMenu->submenus->count() > 0)
                            @foreach($mainMenu->submenus as $submenu)
                            <li class="nav-item">
                                <a href="{{ $submenu->url }}"
                                    class="nav-link {{ request()->is($submenu->url) ? 'active' : '' }}">
                                    {{ $submenu->name }}
                                    @if($submenu->children && $submenu->children->count() > 0)
                                    <i class="bx bx-chevron-down"></i>
                                    @endif
                                </a>

                                @if($submenu->children && $submenu->children->count() > 0)
                                <ul class="dropdown-menu">
                                    @foreach($submenu->children as $child)
                                    <li class="nav-item">
                                        <a href="{{ $child->url }}"
                                            class="nav-link {{ request()->is($child->url) ? 'active' : '' }}">
                                            {{ $child->name }}
                                            @if($child->children && $child->children->count() > 0)
                                            <i class="bx bx-chevron-right"></i>
                                            @endif
                                        </a>

                                        @if($child->children && $child->children->count() > 0)
                                        <ul class="dropdown-menu">
                                            @foreach($child->children as $grandchild)
                                            <li class="nav-item">
                                                <a href="{{ $grandchild->url }}"
                                                    class="nav-link {{ request()->is($grandchild->url) ? 'active' : '' }}">
                                                    {{ $grandchild->name }}
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                        @endif
                                    </li>
                                    @endforeach
                                </ul>
                                @endif
                            </li>
                            @endforeach
                            @else
                            <!-- Fallback menu if no menu is defined in CMS -->
                            <li class="nav-item">
                                <a href="{{ route('home.index') }}"
                                    class="nav-link {{ request()->is('/') ? 'active' : '' }}">
                                    Home
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('home.about') }}"
                                    class="nav-link {{ request()->is('about') ? 'active' : '' }}">
                                    About
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('home.blog') }}"
                                    class="nav-link {{ request()->is('blog') ? 'active' : '' }}">
                                    Blog
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('home.projects') }}"
                                    class="nav-link {{ request()->is('projects') || request()->is('projects/*') ? 'active' : '' }}">
                                    Projects
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('home.products') }}"
                                    class="nav-link {{ request()->is('products') || request()->is('products/*') ? 'active' : '' }}">
                                    Products
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('home.contact') }}"
                                    class="nav-link {{ request()->is('contact') ? 'active' : '' }}">
                                    Contact
                                </a>
                            </li>
                            @endif
                        </ul>

                        <div class="others-option">
                            @if(isset($settings['show_cart']) && $settings['show_cart'])
                            <div class="cart-icon">
                                <a href="{{ route('home.cart') }}">
                                    <i class="bx bx-cart"></i>
                                    <span>0</span>
                                </a>
                            </div>
                            @endif

                            @if(isset($settings['cta_button_text']) && $settings['cta_button_text'])
                            <div class="get-quote">
                                <a href="{{ $settings['cta_button_url'] ?? '#' }}" class="default-btn">
                                    <span>{{ $settings['cta_button_text'] }}</span>
                                </a>
                            </div>
                            @endif
                        </div>
                    </div>
                </nav>
            </div>
        </div>

        <div class="others-option-for-responsive">
            <div class="container">
                <div class="dot-menu">
                    <div class="inner">
                        <div class="circle circle-one"></div>
                        <div class="circle circle-two"></div>
                        <div class="circle circle-three"></div>
                    </div>
                </div>

                <div class="container">
                    <div class="option-inner">
                        <div class="others-option justify-content-center d-flex align-items-center">
                            @if(isset($settings['cta_button_text']) && $settings['cta_button_text'])
                            <div class="get-quote">
                                <a href="{{ $settings['cta_button_url'] ?? '#' }}" class="default-btn">
                                    <span>{{ $settings['cta_button_text'] }}</span>
                                </a>
                            </div>
                            @endif

                            @if(isset($settings['show_cart']) && $settings['show_cart'])
                            <div class="cart-icon">
                                <a href="{{ route('home.cart') }}">
                                    <i class="bx bx-cart"></i>
                                    <span>0</span>
                                </a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Navbar Area -->

</header>
<!-- End Header Area -->