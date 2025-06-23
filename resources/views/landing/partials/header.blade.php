<!-- START OF HEADER -->
@php
       $settings = \App\Helpers\SettingsHelper::getPublic();
       $data = [];

       foreach ($settings as $setting) {
           switch ($setting->key) {
               case 'contact_email':
                   $data['contact_email'] = $setting->value;
                   break;
               case 'contact_phone':
                   $data['contact_phone'] = $setting->value;
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
                        <h6><span class="flaticon-chat thm_clr1"></span>Our company has <b class="thm_clr1">20 years' experience!</b></h6>
                    </div>
                </div>
                <div class="header-top-middle">
                    <div class="header-social-links">
                        <ul class="social-links-style1">
                            <li>
                                <a href="#"><span class="flaticon-facebook-1 fb"></span></a>
                            </li>
                            <li>
                                <a href="#"><span class="flaticon-twitter-1"></span></a>
                            </li>
                            <li>
                                <a href="#"><span class="flaticon-instagram-1"></span></a>
                            </li>
                            <li>
                                <a href="#"><span class="flaticon-linkedin-1"></span></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="header-top-right">
                    <div class="header-menu">
                        <ul>
                            <li><a href="#">Career</a></li>
                            <li><a href="#">Terms of service</a></li>
                            <li><a href="#">Refund policy</a></li>
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
                        <a href="index.html"><img src="{{asset('storage/' . $data['website_logo'])}}" alt="Awesome Logo" title="Logo PT Semar Gemilang"></a>
                        @else
                        <a href="index.html"><img src="{{asset('vendor/landing')}}/assets/images/resources/logo.png" alt="Awesome Logo" title=""></a>
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
                                    <li class="dropdown current">
                                        <a class="home-icon" href="#"><span class="hometext">Home</span><span class="flaticon-real-estate homeicon"></span></a>
                                        <ul>
                                            <li><a href="index.html">Home Page 01</a></li>
                                            <li><a href="index-2.html">Home Page 02</a></li>
                                            <li><a href="index-3.html">Home Page 03</a></li>
                                            <li><a href="index-4.html">Home Page 04</a></li>
                                            <li><a href="index-5.html">Home Page 05</a></li>
                                            <li><a href="index-box-layout.html">Home Boxed Layout</a></li>
                                            <li><a href="index-rtl.html">Home RTL</a></li>
                                            <li><a href="index-onepage.html">Home OnePage</a></li>
                                            <li class="dropdown"><a href="#">Header Styles</a>
                                                <ul>
                                                    <li><a href="index.html">Header Style One</a></li>
                                                    <li><a href="index-2.html">Header Style Two</a></li>
                                                    <li><a href="index-3.html">Header Style Three</a></li>
                                                    <li><a href="index-4.html">Header Style Four</a></li>
                                                    <li><a href="index-5.html">Header Style Five</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="#">Services</a>
                                        <ul>
                                            <li><a href="services.html">Services Style1 Page</a></li>
                                            <li><a href="services-v2.html">Services Style2 page</a></li>
                                            <li><a href="services-single.html">Services Details</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="#">Pages</a>
                                        <ul class="megamenu">
                                            <li><a href="about.html">About Style1 Page</a></li>
                                            <li><a href="about-v2.html">About Style2 Page</a></li>
                                            <li><a href="portfolio-v1.html">Portfolio Style1 Page</a></li>
                                            <li><a href="portfolio-v2.html">Portfolio Style2 Page</a></li>
                                            <li><a href="portfolio-single-v1.html">Portfolio Details Style1</a></li>
                                            <li><a href="portfolio-single-v2.html">Portfolio Details Style2</a></li>
                                            <li><a href="team.html">Team Page</a></li>
                                            <li><a href="team-single.html">Team Single Page</a></li>
                                            <li><a href="client.html">Client Page</a></li>
                                            <li><a href="faq.html">Faq Page</a></li>
                                            <li><a href="404-page.html">Error Page</a></li>
                                            <li><a href="testimonials.html">Testimonials</a></li>
                                            <li><a href="shop.html">Shop Products</a></li>
                                            <li><a href="shop-single.html">Products Single</a></li>
                                            <li><a href="shopping-cart.html">Shopping Cart</a></li>
                                            <li><a href="checkout.html">Checkout</a></li>
                                            <li><a href="account.html">My Account</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="#">Elements</a>
                                        <ul>
                                            <li class="dropdown"><a href="#">About Elements</a>
                                                <ul>
                                                    <li><a href="about-elem1.html">About Elements 01</a></li>
                                                    <li><a href="about-elem2.html">About Elements 02</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown"><a href="#">Service Elements</a>
                                                <ul>
                                                    <li><a href="service-elem1.html">Service Elements 01</a></li>
                                                    <li><a href="service-elem2.html">Service Elements 02</a></li>
                                                    <li><a href="service-elem3.html">Service Elements 03</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown"><a href="#">Portfolio Elements</a>
                                                <ul>
                                                    <li><a href="portfolio-elem1.html">Portfolio Elements 01</a>
                                                    </li>
                                                    <li><a href="portfolio-elem2.html">Portfolio Elements 02</a>
                                                    </li>
                                                    <li><a href="portfolio-elem3.html">Portfolio Elements 03</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="dropdown"><a href="#">Team Elements</a>
                                                <ul>
                                                    <li><a href="team-elem1.html">Team Elements 01</a></li>
                                                    <li><a href="team-elem2.html">Team Elements 02</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown"><a href="#">Testimonials Elements</a>
                                                <ul>
                                                    <li><a href="testimonial-elem1.html">Testimonials Elements
                                                            01</a></li>
                                                    <li><a href="testimonial-elem2.html">Testimonials Elements
                                                            02</a></li>
                                                    <li><a href="testimonial-elem3.html">Testimonials Elements
                                                            03</a></li>
                                                    <li><a href="testimonial-elem4.html">Testimonials Elements
                                                            04</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown"><a href="#">Client Elements</a>
                                                <ul>
                                                    <li><a href="client-elem1.html">Client Elements 01</a></li>
                                                    <li><a href="client-elem2.html">Client Elements 02</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="faq-elem.html">Faq Elements</a></li>
                                            <li><a href="fact-counter-elem.html">Fact Counter Elements</a></li>
                                            <li class="dropdown"><a href="#">Blog Elements</a>
                                                <ul>
                                                    <li><a href="blog-elem1.html">Blog Elements 01</a></li>
                                                    <li><a href="blog-elem2.html">Blog Elements 02</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="shop-elem.html">Shop Elements</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="#">Blog</a>
                                        <ul>
                                            <li><a href="blog.html">Blog Grid View</a></li>
                                            <li><a href="blog-v2.html">Blog Arcive View</a></li>
                                            <li><a href="blog-single.html">Blog Single</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="contact.html">Contact</a></li>
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
                        <a href="index.html" class="img-responsive"><img src="{{asset('storage/' . $data['website_logo'])}}" alt="Awesome Logo" title="Logo PT Semar Gemilang"></a>
                    @else
                        <a href="index.html" class="img-responsive"><img src="{{asset('vendor/landing')}}/assets/images/resources/logo.png" alt="Awesome Logo" title=""></a>
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
            <div class="nav-logo"><a href="index.html"><img src="{{asset('vendor/landing')}}/assets/images/footer/footer-logo.png" alt="" title=""></a></div>
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
