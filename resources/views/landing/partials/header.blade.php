<!-- START OF HEADER -->
<header id="site_header" class="site-header">
    <div class="header-top">
        <div class="container">
            <div class="top-hader-main-box white-text">
                <p class="m-0">Welcome To Sadikun Niagamas Raya</p>
                <ul class="header-social">
                    <li>
                        <a href="mailto:marketing_official@sadikun.com"
                           title="Mail on marketing_official@sadikun.com">
                            <img src="{{asset('vendor/landing2')}}/assets/images/mail-icon.svg" width="18" height="13"
                                 alt="Mail Icon">
                            <span>marketing_official@sadikun.com</span>
                        </a>
                    </li>
                    <li>
                        <a href="tel:+6221-3864386" title="Call on +62 213 864 386">
                            <img src="{{asset('vendor/landing2')}}/assets/images/phone-icon.svg"  width="18" height="18"
                                 alt="Phone Icon">
                            <span>+62 213 864 386</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="heder-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="site-branding">
                        <a href="{{ route('home.index') }}" title="PT Sadikun BBM">
                            <img src="{{asset('vendor/landing2')}}/assets/images/sadikun-logo.png" width="152" height="35"
                                 alt="Induris Logo">
                        </a>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="header-menu">
                        <nav class="main-navigation">
                            <button class="menu-toggle for-mob-flex">
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                            <div class="header-mobile-menu">
                                <ul class="main-menu">
                                    <li class="active-menu">
                                        <a href="{{ route('home.index') }}" title="Home">Home</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('home.about') }}" title="About Us">About Us</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('home.products') }}" title="Products">Products</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('home.blog') }}" title="Blog">Blog</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('home.contact') }}" title="Contact">Contact Us</a>
                                    </li>
                                </ul>
                                <div class="header-cta">
                                    <div class="header-search-button">
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#searchModal">
                                            <img src="{{asset('vendor/landing2')}}/assets/images/search-icon.svg"
                                                 width="20" height="20" alt="Search Icon">
                                        </button>
                                    </div>
                                    <a href="{{asset('vendor/landing2')}}/contact-us.html" class="sec-btn"
                                       title="Get a Quote">Get a Quote</a>
                                </div>
                            </div>
                        </nav>
                        <div class="black-shadow"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- END OF HEADER -->
