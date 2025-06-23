@extends('landing.layout.master')
@section('content')
    @php
        // Load home page content directly in the view
        $homePage = \App\Helpers\PageHelper::getHomePage();

        // If home page doesn't exist, create a fallback
        if (!$homePage) {
        $homePage = \App\Helpers\PageHelper::createFallbackPage(
        'Home',
        'Welcome to our website. Discover our products and services.',
        'home, welcome, products, services'
        );
        }
    @endphp
    <section class="main-slider style2">
        <div class="slider-box">
            <!-- Banner Carousel -->
            <div class="banner-carousel owl-theme owl-carousel">
                <!-- Slide -->
                @foreach($banners as $banner)
                    <div class="slide">
                        @if($banner->image)
                            <div class="image-layer lazy-image"
                                 style="background-image:url({{asset('storage/' . $banner->image)}}"></div>
                            <div class="overlay"></div>
                        @else
                            <div class="image-layer lazy-image"
                                 style="background-image:url({{asset('vendor/landing')}}/assets/images/slides/slide-v2-1.jpg)"></div>
                        @endif
                        <div class="auto-container">
                            <div class="content">
                                @php
                                    $words = array_filter(explode(" ", trim($banner->title)));
                                    $words = array_values($words); // reset index biar mulai dari 0

                                    $firstWord = $words[0] ?? '';
                                    $secondWord = $words[1] ?? '';
                                    $remainingWords = implode(" ", array_slice($words, 2));
                                @endphp

                                <h2 style="color:white;">{{ $firstWord }} <span>{{ $secondWord }}</span><br> {{ $remainingWords }}</h2>
                                <div class="text">
                                    <p>{{ $banner->description  }}</p>
                                </div>
                                <div class="btns-box">
                                    <a class="btn-one" href="{{ route('home.products') }}">View More<span class="flaticon-next"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Main Slider -->

    <!--Start Partner Style2 Area-->
    <section class="partner-area partner-style2-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="partner-box">
                        <!--Start Single Partner Logo Box-->
                        @foreach($clients as $client)
                            @if($client->logo)
                                <div class="single-partner-logo-box">
                                    <a href="javascript:void(0);"><img src="{{ asset('storage/' . $client->logo) }}"
                                                                       alt="{{ $client->name }}"></a>
                                    <div class="overlay-box">
                                        <a href="javascript:void(0);"><img
                                                src="{{ asset('storage/' . $client->logo) }}"
                                                alt="{{ $client->name }}"></a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Partner Style2 Area-->

    <!--Start Service Style1 Area-->
    <section class="service-style1-area pdtop75">
        <div class="container">
            <div class="title">
                <h1>Technology to take products from<br> an idea all the way to the end consumer.<br> <a href="#">#Request
                        a quote.</a></h1>
            </div>
            <div class="row">
                <!--Start Single Service Style1-->
                <div class="col-xl-4 col-lg-4">
                    <div class="single-service-style1">
                        <div class="icon-holder lazy-image">
                            <img src="{{asset('vendor/landing')}}/assets/images/icon/services/service-icon-1.png"
                                 alt="Icon">
                        </div>
                        <div class="text-holder">
                            <h3><a href="#">Our Automobile<br> Manufactur</a></h3>
                            <p>Nunc aliquet nulla nec dapibus max imus. Nam aliquam neque.</p>
                            <div class="count-box">1</div>
                        </div>
                    </div>
                </div>
                <!--End Single Service Style1-->
                <!--Start Single Service Style1-->
                <div class="col-xl-4 col-lg-4">
                    <div class="single-service-style1">
                        <div class="icon-holder lazy-image">
                            <img src="{{asset('vendor/landing')}}/assets/images/icon/services/service-icon-2.png"
                                 alt="Icon">
                        </div>
                        <div class="text-holder">
                            <h3><a href="#">Construction &<br> Engineering</a></h3>
                            <p>Nunc aliquet nulla nec dapibus max imus. Nam aliquam neque.</p>
                            <div class="count-box">2</div>
                        </div>
                    </div>
                </div>
                <!--End Single Service Style1-->
                <!--Start Single Service Style1-->
                <div class="col-xl-4 col-lg-4">
                    <div class="single-service-style1">
                        <div class="icon-holder lazy-image">
                            <img src="{{asset('vendor/landing')}}/assets/images/icon/services/service-icon-3.png"
                                 alt="Icon">
                        </div>
                        <div class="text-holder">
                            <h3><a href="#">Interior Expert<br> Engineers</a></h3>
                            <p>Nunc aliquet nulla nec dapibus max imus. Nam aliquam neque.</p>
                            <div class="count-box">3</div>
                        </div>
                    </div>
                </div>
                <!--End Single Service Style1-->
            </div>
        </div>
    </section>
    <!--End Service Style1 Area-->

    <!--Start About Style2 Area-->
    <section class="about-style2-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-5">
                    <div class="about-style2-image-box">
                        <img src="{{asset('vendor/landing')}}/assets/images/about/about-7.jpg" height="50%" width="100%" alt="Awesome Image">
                    </div>
                </div>
                <div class="col-xl-7 col-lg-12">
                    <div class="about-style1-text-box style2">
                        <div class="title">
                            <p>WELCOME</p>
                            @php
                                $since = date('Y') - 2007;
                            @endphp
                            <h1>Our {{ $since }}<br> <b>years</b> working<br> experience.</h1>
                        </div>
                        <div class="inner-contant">
                            <p>Since 2007, PT. Semar Gemilang has delivered reliable LPG solutions for industries nationwide — from manufacturing to hospitality. We are committed to safety, quality, and operational excellence.</p>
                            <div class="fact-box-style2">
                                <ul>
                                    <li class="single-fact-counter text-center wow fadeInLeft" data-wow-delay="100ms"
                                        data-wow-duration="1500ms">
                                        <div class="count-box">
                                            <h1>
                                                <span class="timer" data-from="1" data-to="{{$since}}" data-speed="5000"
                                                      data-refresh-interval="50">{{$since}}</span>
                                            </h1>
                                            <div class="icon"><span class="flaticon-plus"></span></div>
                                        </div>
                                        <div class="title">
                                            <h3>Year of Experience</h3>
                                        </div>
                                    </li>
                                    <li class="single-fact-counter text-center wow fadeInLeft" data-wow-delay="100ms"
                                        data-wow-duration="1500ms">
                                        <div class="count-box">
                                            <h1>
                                                <span class="timer" data-from="1" data-to="25" data-speed="5000"
                                                      data-refresh-interval="50">25</span>
                                            </h1>
                                            <div class="icon"><span class="flaticon-plus"></span></div>
                                        </div>
                                        <div class="title">
                                            <h3>Winning Awards</h3>
                                        </div>
                                    </li>
                                    <li class="single-fact-counter text-center wow fadeInLeft" data-wow-delay="100ms"
                                        data-wow-duration="1500ms">
                                        <div class="count-box">
                                            <h1>
                                                <span class="timer" data-from="1" data-to="99" data-speed="5000"
                                                      data-refresh-interval="50">99</span>
                                            </h1>
                                            <div class="icon"><span class="flaticon-plus"></span></div>
                                        </div>
                                        <div class="title">
                                            <h3>Complet Project</h3>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--End About Style2 Area-->

    <!--Start Latest Portfolio Area-->
    <section class="latest-portfolio-area pdtop120">
        <div class="container">
            <div class="sec-title text-center">
                <p>Our Global Work Industries!</p>
                <div class="big-title black-clr"><h1>Latest Portfolio</h1></div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="project-menu-box wow fadeInUp" data-wow-delay="100ms" data-wow-duration="1500ms">
                        <ul class="project-filter clearfix post-filter has-dynamic-filters-counter">
                            <li data-filter=".filter-item" class="active"><span class="filter-text"><i
                                        class="flaticon-menu"></i>All Cases</span></li>
                            <li data-filter=".build"><span class="filter-text"><i class="flaticon-building"></i>Buildings</span>
                            </li>
                            <li data-filter=".bridge"><span class="filter-text"><i
                                        class="flaticon-modern-bridge-road-symbol"></i>Modern Bridge</span></li>
                            <li data-filter=".houses"><span class="filter-text"><i
                                        class="flaticon-house"></i>Houses</span></li>
                            <li data-filter=".interior"><span class="filter-text"><i class="flaticon-chair"></i>Interiors</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row filter-layout masonary-layout">
                <!--Start Single portfolio Style1-->
                <div class="col-xl-4 col-lg-6 col-md-6 filter-item bridge interior">
                    <div class="single-portfolio-style1">
                        <div class="img-holder">
                            <div class="inner-box">
                                <img class="lazy-image"
                                     src="{{asset('vendor/landing')}}/assets/images/portfolio/portfolio-v1-1.jpg"
                                     alt="Awesome Image">
                                <div class="overlay-style-one">
                                    <div class="box">
                                        <div class="inner">
                                            <div class="zoom-button">
                                                <a class="lightbox-image" data-fancybox="gallery"
                                                   href="assets/images/portfolio/portfolio-v1-1.jpg">
                                                    <span class="flaticon-plus"></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="title-holder">
                                <span class="tag">Building</span>
                                <h5><a href="#">Building A Sports City</a></h5>
                                <p><span class="flaticon-location-pin"></span>KA-62/1, Kuril, Progoti</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Single portfolio Style1-->
                <!--Start Single portfolio Style1-->
                <div class="col-xl-4 col-lg-6 col-md-6 filter-item build houses">
                    <div class="single-portfolio-style1">
                        <div class="img-holder">
                            <div class="inner-box">
                                <img class="lazy-image"
                                     src="{{asset('vendor/landing')}}/assets/images/portfolio/portfolio-v1-2.jpg"
                                     alt="Awesome Image">
                                <div class="overlay-style-one">
                                    <div class="box">
                                        <div class="inner">
                                            <div class="zoom-button">
                                                <a class="lightbox-image" data-fancybox="gallery"
                                                   href="assets/images/portfolio/portfolio-v1-2.jpg">
                                                    <span class="flaticon-plus"></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="title-holder">
                                <span class="tag">Building</span>
                                <h5><a href="#">Building A Sports City</a></h5>
                                <p><span class="flaticon-location-pin"></span>KA-62/1, Kuril, Progoti</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Single portfolio Style1-->
                <!--Start Single portfolio Style1-->
                <div class="col-xl-4 col-lg-6 col-md-6 filter-item build houses">
                    <div class="single-portfolio-style1">
                        <div class="img-holder">
                            <div class="inner-box">
                                <img class="lazy-image"
                                     src="{{asset('vendor/landing')}}/assets/images/portfolio/portfolio-v1-3.jpg"
                                     alt="Awesome Image">
                                <div class="overlay-style-one">
                                    <div class="box">
                                        <div class="inner">
                                            <div class="zoom-button">
                                                <a class="lightbox-image" data-fancybox="gallery"
                                                   href="assets/images/portfolio/portfolio-v1-3.jpg">
                                                    <span class="flaticon-plus"></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="title-holder">
                                <span class="tag">Building</span>
                                <h5><a href="#">Building A Sports City</a></h5>
                                <p><span class="flaticon-location-pin"></span>KA-62/1, Kuril, Progoti</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Single portfolio Style1-->

                <!--Start Single portfolio Style1-->
                <div class="col-xl-4 col-lg-6 col-md-6 filter-item bridge interior">
                    <div class="single-portfolio-style1">
                        <div class="img-holder">
                            <div class="inner-box">
                                <img class="lazy-image"
                                     src="{{asset('vendor/landing')}}/assets/images/portfolio/portfolio-v1-4.jpg"
                                     alt="Awesome Image">
                                <div class="overlay-style-one">
                                    <div class="box">
                                        <div class="inner">
                                            <div class="zoom-button">
                                                <a class="lightbox-image" data-fancybox="gallery"
                                                   href="assets/images/portfolio/portfolio-v1-4.jpg">
                                                    <span class="flaticon-plus"></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="title-holder">
                                <span class="tag">Building</span>
                                <h5><a href="#">Building A Sports City</a></h5>
                                <p><span class="flaticon-location-pin"></span>KA-62/1, Kuril, Progoti</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Single portfolio Style1-->
                <!--Start Single portfolio Style1-->
                <div class="col-xl-4 col-lg-6 col-md-6 filter-item build houses">
                    <div class="single-portfolio-style1">
                        <div class="img-holder">
                            <div class="inner-box">
                                <img class="lazy-image"
                                     src="{{asset('vendor/landing')}}/assets/images/portfolio/portfolio-v1-5.jpg"
                                     alt="Awesome Image">
                                <div class="overlay-style-one">
                                    <div class="box">
                                        <div class="inner">
                                            <div class="zoom-button">
                                                <a class="lightbox-image" data-fancybox="gallery"
                                                   href="assets/images/portfolio/portfolio-v1-5.jpg">
                                                    <span class="flaticon-plus"></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="title-holder">
                                <span class="tag">Building</span>
                                <h5><a href="#">Building A Sports City</a></h5>
                                <p><span class="flaticon-location-pin"></span>KA-62/1, Kuril, Progoti</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Single portfolio Style1-->
                <!--Start Single portfolio Style1-->
                <div class="col-xl-4 col-lg-6 col-md-6 filter-item build houses">
                    <div class="single-portfolio-style1">
                        <div class="img-holder">
                            <div class="inner-box">
                                <img class="lazy-image"
                                     src="{{asset('vendor/landing')}}/assets/images/portfolio/portfolio-v1-6.jpg"
                                     alt="Awesome Image">
                                <div class="overlay-style-one">
                                    <div class="box">
                                        <div class="inner">
                                            <div class="zoom-button">
                                                <a class="lightbox-image" data-fancybox="gallery"
                                                   href="assets/images/portfolio/portfolio-v1-6.jpg">
                                                    <span class="flaticon-plus"></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="title-holder">
                                <span class="tag">Building</span>
                                <h5><a href="#">Building A Sports City</a></h5>
                                <p><span class="flaticon-location-pin"></span>KA-62/1, Kuril, Progoti</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Single portfolio Style1-->
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="all-portfolio-button text-center">
                        <a class="btn-one" href="#">Our All Portfolio<span class="flaticon-next"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Latest Portfolio Area-->

    <!--Start Service Style3 Area-->
    <section class="service-style3-area">
        <div class="container">
            <div class="sec-title">
                <p>Provided Services</p>
                <div class="big-title black-clr"><h1>Our Latest Services</h1></div>
            </div>
        </div>
        <div class="auto-container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="rinbuild-carousel service-carousel owl-carousel owl-theme owl-nav-style-one"
                         data-options='{"loop":true, "margin":30, "autoheight":true, "nav":true, "dots":false, "autoplay":true, "autoplayTimeout":6000, "smartSpeed":500, "responsive":{ "0":{"items": "1"}, "768":{"items": "2"}, "1000":{"items": "3" }}}'>
                        <!--Start Single Service Style3-->
                        <div class="single-service-style3">
                            <div class="img-holder">
                                <img class="lazy-image"
                                     src="{{asset('vendor/landing')}}/assets/images/services/service-v2-1.jpg"
                                     alt="Awesome Image">
                                <div class="overlay-content">
                                    <div class="icon-holder"><span class="flaticon-house"></span></div>
                                    <div class="title-holder">
                                        <p>Building Wood Arcitect</p>
                                        <h3><a href="#">Just because you work hard<br> and successful.</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End Single Service Style3-->
                        <!--Start Single Service Style3-->
                        <div class="single-service-style3">
                            <div class="img-holder">
                                <img class="lazy-image"
                                     src="{{asset('vendor/landing')}}/assets/images/services/service-v2-2.jpg"
                                     alt="Awesome Image">
                                <div class="overlay-content">
                                    <div class="icon-holder"><span class="flaticon-house"></span></div>
                                    <div class="title-holder">
                                        <p>Building Wood Arcitect</p>
                                        <h3><a href="#">Just because you work hard<br> and successful.</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End Single Service Style3-->
                        <!--Start Single Service Style3-->
                        <div class="single-service-style3">
                            <div class="img-holder">
                                <img class="lazy-image"
                                     src="{{asset('vendor/landing')}}/assets/images/services/service-v2-3.jpg"
                                     alt="Awesome Image">
                                <div class="overlay-content">
                                    <div class="icon-holder"><span class="flaticon-house"></span></div>
                                    <div class="title-holder">
                                        <p>Building Wood Arcitect</p>
                                        <h3><a href="#">Just because you work hard<br> and successful.</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End Single Service Style3-->

                        <!--Start Single Service Style3-->
                        <div class="single-service-style3">
                            <div class="img-holder">
                                <img class="lazy-image"
                                     src="{{asset('vendor/landing')}}/assets/images/services/service-v2-2.jpg"
                                     alt="Awesome Image">
                                <div class="overlay-content">
                                    <div class="icon-holder"><span class="flaticon-house"></span></div>
                                    <div class="title-holder">
                                        <p>Building Wood Arcitect</p>
                                        <h3><a href="#">Just because you work hard<br> and successful.</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End Single Service Style3-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Service Style3 Area-->

    <!--Start Testimonial style2 Area-->
    <section class="testimonial-style2-area">
        <div class="container">
            <div class="sec-title text-center">
                <p>Testimonials</p>
                <div class="big-title black-clr"><h1>What client says?</h1></div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="rinbuild-carousel testimonial-carousel owl-carousel owl-theme owl-dot-style1"
                         data-options='{"loop":true, "margin":30, "autoheight":true, "nav":false, "dots":true, "autoplay":true, "autoplayTimeout":6000, "smartSpeed":500, "responsive":{ "0":{"items": "1"}, "768":{"items": "1"}, "1000":{"items": "2" }}}'>
                        @foreach($testimonials as $testimonial)
                            <div class="single-testimonial-style1">
                                <div class="text">
                                    <p>{{$testimonial->quote}}.</p>
                                </div>
                                <div class="client-info">
                                    <div class="icon-box">
                                        <span class="flaticon-engineer-1"></span>
                                    </div>
                                    <div class="title-box">
                                        <h3>{{ $testimonial->name }}</h3>
                                        <p>{{ $testimonial->company  }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--End Testimonial Style2 Area-->

    <!--Start Faq Content Area-->
    <section class="faq-content-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="faq-content-box">
                        <div class="sec-title">
                            <p>Faq</p>
                            <div class="big-title black-clr"><h1>FREQUENTLY ASKED QUESTIONS (PT. SEMAR GEMILANG)</h1></div>
                        </div>
                        <div class="accordion-box">
                            <!--Start single accordion box-->
                            <div class="accordion accordion-block">
                                <div class="accord-btn active"><h4>What industries do you serve?</h4></div>
                                <div class="accord-content collapsed">
                                    <p>We serve a wide range of industries including manufacturing, hospitality, F&B (food & beverage), ceramics, and the automotive sector — providing both LPG cylinders and bulk supply solutions across Indonesia. .</p>
                                </div>
                            </div>
                            <!--End single accordion box-->
                            <!--Start single accordion box-->
                            <div class="accordion accordion-block">
                                <div class="accord-btn"><h4>What are your operating hours??</h4></div>
                                <div class="accord-content">
                                    <p>Our office and distribution services operate from Monday to Saturday, 08.00 – 17.00 WIB. For bulk delivery schedules, our team is ready to coordinate based on client needs.</p>
                                </div>
                            </div>
                            <!--End single accordion box-->
                            <!--Start single accordion box-->
                            <div class="accordion accordion-block">
                                <div class="accord-btn"><h4>What types of systems do you support?</h4></div>
                                <div class="accord-content">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                        Ipsum has when an unknown printer took a galley of type and scrambled it to
                                        make.</p>
                                </div>
                            </div>
                            <!--End single accordion box-->
                            <!--Start single accordion box-->
                            <div class="accordion accordion-block marginbottom0">
                                <div class="accord-btn"><h4>What types of LPG products do you offer?</h4></div>
                                <div class="accord-content">
                                    <p>We offer: </p>
                                        <ul>
                                            <li>LPG 50 KG – Ideal for hotels, restaurants, and small-scale industries.</li>
                                            <li>LPG Bulk (1,000–9,000 kg) – Suited for large-scale industrial needs like ceramics, automotive, and food production..</li>
                                            <li>Mini Bulk – Upon request and project basis..</li>
                                        </ul>
                                </div>
                            </div>
                            <!--End single accordion box-->
                        </div>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="faq-image-box" data-aos="fade-left" data-aos-duration="0" data-aos-delay="0">
                        <img src="{{asset('vendor/landing')}}/assets/images/about/about-8.jpg"
                             alt="Awesome Image">
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--End Faq Content Area-->

    <!--Start Slogan Area-->
    <section class="slogan-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="slogan-content wow slideInUp" data-wow-delay="100ms">
                        <div class="title">
                            <h1>Contact Us Now</h1>
                        </div>
                        <div class="quote-button">
                            <a href="{{ route('home.index') }}">Get a Quote<span class="flaticon-next"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Slogan Area-->
@endsection
