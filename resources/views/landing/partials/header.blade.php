<!-- START OF HEADER -->
@php
    $settings = \App\Helpers\SettingsHelper::getPublic();
    $data = [];

    foreach ($settings as $setting) {
        switch ($setting->key) {
         case 'social_facebook':
             $data['social_facebook'] = $setting->value;
             break;
         case 'social_twitter':
             $data['social_twitter'] = $setting->value;
             break;
         case 'social_instagram':
             $data['social_instagram'] = $setting->value;
             break;
         case 'social_linkedin':
             $data['social_linkedin'] = $setting->value;
             break;
         case 'social_youtube':
             $data['social_youtube'] = $setting->value;
             break;
         case 'contact_email':
             $data['contact_email'] = $setting->value;
             break;
         case 'contact_phone':
             $data['contact_phone'] = $setting->value;
             break;
         case 'contact_address':
             $data['contact_address'] = $setting->value;
             break;
         case 'website_logo':
            $data['website_logo'] = $setting->value;
            break;
        }
    }
@endphp
<header class="main-header header-style2">
    <div class="header-top">
        <div class="container">
            <div class="outer-box">
                <div class="header-top-left">
                    <div class="welcome-text">
                        <h6><span class="flaticon-chat thm_clr1"></span>Our company has
                            @php
                                $since = date('Y') - 2007;
                            @endphp
                            <b class="thm_clr1"> {{ $since }} years' experience!</b>
                        </h6>
                    </div>
                </div>
                <div class="header-top-middle">
                    <div class="header-social-links">
                        <ul class="social-links-style1">
                            <li>
                                <a href="{{ $data['social_facebook'] }}"><i class="fa fa-facebook"
                                                                            aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a href="{{ $data['social_twitter'] }}"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a href="{{ $data['social_linkedin'] }}"><i class="fa fa-linkedin"
                                                                            aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a href="{{ $data['social_instagram'] }}"><i class="fa fa-instagram"
                                                                             aria-hidden="true"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="header-top-right">
                    <div class="header-menu">
                        <ul>
                            <li><a href="#">Career</a></li>
                            <li><a href="#">Terms of service</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Start Header upper -->
    <div class="header-upper header-upper-style2">
        <div class="container clearfix">
            <div class="outer-box clearfix">
                <div class="header-upper-left header-upper-left-style2 float-left clearfix">
                    <div class="logo">
                        @if($data['website_logo'])
                            <a href="index.html"><img src="{{asset('storage/' . $data['website_logo'])}}"
                                                      alt="Awesome Logo" title="Logo PT Semar Gemilang"></a>
                        @else
                            <a href="index.html"><img src="{{asset('vendor/landing')}}/assets/images/resources/logo.png"
                                                      alt="Awesome Logo" title=""></a>
                        @endif
                    </div>
                </div>
                <div class="header-upper-right header-upper-right-style2 float-right clearfix">
                    <div class="nav-outer clearfix">
                        <!--Mobile Navigation Toggler-->
                        <div class="mobile-nav-toggler">
                            <div class="inner">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </div>
                        </div>
                        <!-- Main Menu -->
                        <nav class="main-menu style2 navbar-expand-md navbar-light">
                            <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                <ul class="navigation clearfix">
                                    @php
                                        // Load main menu directly in the header
                                        $mainMenu = \App\Helpers\MenuHelper::getMainMenu();
                                        $currentPath = "/". Request::path();
                                    @endphp

                                    @if($mainMenu && $mainMenu->submenus && $mainMenu->submenus->count() > 0)
                                        @foreach($mainMenu->submenus as $submenu)
                                            <li class="{{ $currentPath === $submenu->url || Request::path() === $submenu->url ? 'current' : '' }}">
                                                @if($submenu->url === '/')
                                                    <a href="{{ $submenu->url }}" class="home-icon"
                                                       title="{{ $submenu->name }}"><span
                                                            class="hometext">Home</span><span
                                                            class="flaticon-real-estate homeicon"></span></a>
                                                @else
                                                    <a href="{{ $submenu->url }}"
                                                       title="{{ $submenu->name }}">{{ $submenu->name }}</a>
                                                @endif
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </nav>
                        <!-- Main Menu End-->
                    </div>
                    <div class="menu-right-content clearfix">
                        <div class="outer-search-box-style1">
                            <div class="seach-toggle"><i class="fa fa-search"></i></div>
                            <ul class="search-box">
                                <li>
                                    <form method="post" action="index.html">
                                        <div class="form-group">
                                            <input type="search" name="search" placeholder="Search Here"
                                                   required="">
                                            <button type="submit"><i class="fa fa-search"></i></button>
                                        </div>
                                    </form>
                                </li>
                            </ul>
                        </div>
                        <div class="quote-button style2">
                            <a href="#">Get a Quote</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--End Header Upper-->

    <!--Sticky Header-->
    <div class="sticky-header">
        <div class="container">
            <div class="clearfix">
                <!--Logo-->
                <div class="logo float-left">
                    @if($data['website_logo'])
                        <a href="index.html" class="img-responsive"><img
                                src="{{asset('storage/' . $data['website_logo'])}}" alt="Awesome Logo"
                                title="Logo PT Semar Gemilang"></a>
                    @else
                        <a href="index.html" class="img-responsive"><img
                                src="{{asset('vendor/landing')}}/assets/images/resources/logo.png" alt="Awesome Logo"
                                title=""></a>
                    @endif
                </div>
                <!--Right Col-->
                <div class="right-col float-right">
                    <!-- Main Menu -->
                    <nav class="main-menu clearfix">
                        <!--Keep This Empty / Menu will come through Javascript-->
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!--End Sticky Header-->
    <!-- Mobile Menu  -->
    <div class="mobile-menu">
        <div class="menu-backdrop"></div>
        <div class="close-btn"><span class="icon flaticon-multiply"></span></div>

        <nav class="menu-box">
            <div class="nav-logo"><a href="index.html"><img
                        src="{{asset('vendor/landing')}}/assets/images/footer/footer-logo.png" alt="" title=""></a>
            </div>
            <div class="menu-outer">
                <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
            <!--Social Links-->
            <div class="social-links">
                <ul class="clearfix">
                    <li><a href="#"><span class="fab fa fa-facebook-square"></span></a></li>
                    <li><a href="#"><span class="fab fa fa-twitter-square"></span></a></li>
                    <li><a href="#"><span class="fab fa fa-pinterest-square"></span></a></li>
                    <li><a href="#"><span class="fab fa fa-google-plus-square"></span></a></li>
                    <li><a href="#"><span class="fab fa fa-youtube-square"></span></a></li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- End Mobile Menu -->
</header>
