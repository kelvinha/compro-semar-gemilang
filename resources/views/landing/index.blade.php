@extends('landing.layout.master')
@section('classBody', 'index_page')
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
                <div class="slide">
                    <div class="image-layer lazy-image"
                         style="background-image:url({{asset('vendor/landing')}}/assets/images/slides/slide-v2-1.jpg)"></div>
                    <div class="auto-container">
                        <div class="content">
                            <h2>Make <span>Your</span><br> Dream House</h2>
                            <h3><img src="{{asset('vendor/landing')}}/assets/images/icon/slide-title-icon-1.png" alt="">Our
                                Top Construction.</h3>
                            <div class="text">
                                <p>Nunc molestie mi nunc, nec accumsan libero dignissim sit amet. Fusce sit amet
                                    tincidunt metus. Nunc eu risus suscipit massa dapibu.</p>
                            </div>
                            <div class="btns-box">
                                <a href="#" class="btn-two">Get a Quote</a>
                                <a class="btn-one" href="#">View More<span class="flaticon-next"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Slide -->
                <div class="slide">
                    <div class="image-layer lazy-image"
                         style="background-image:url({{asset('vendor/landing')}}/assets/images/slides/slide-v2-1.jpg)"></div>
                    <div class="auto-container">
                        <div class="content">
                            <h2>Make <span>Your</span><br> Dream House</h2>
                            <h3><img src="{{asset('vendor/landing')}}/assets/images/icon/slide-title-icon-1.png" alt="">Our
                                Top Construction.</h3>
                            <div class="text">
                                <p>Nunc molestie mi nunc, nec accumsan libero dignissim sit amet. Fusce sit amet
                                    tincidunt metus. Nunc eu risus suscipit massa dapibu.</p>
                            </div>
                            <div class="btns-box">
                                <a href="#" class="btn-two">Get a Quote</a>
                                <a class="btn-one" href="#">View More<span class="flaticon-next"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Slide -->
                <div class="slide">
                    <div class="image-layer lazy-image"
                         style="background-image:url({{asset('vendor/landing')}}/assets/images/slides/slide-v2-1.jpg)"></div>
                    <div class="auto-container">
                        <div class="content">
                            <h2>Make <span>Your</span><br> Dream House</h2>
                            <h3><img src="{{asset('vendor/landing')}}/assets/images/icon/slide-title-icon-1.png" alt="">Our
                                Top Construction.</h3>
                            <div class="text">
                                <p>Nunc molestie mi nunc, nec accumsan libero dignissim sit amet. Fusce sit amet
                                    tincidunt metus. Nunc eu risus suscipit massa dapibu.</p>
                            </div>
                            <div class="btns-box">
                                <a href="#" class="btn-two">Get a Quote</a>
                                <a class="btn-one" href="#">View More<span class="flaticon-next"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="video-holder-box-style4">
                <a class="video-popup wow zoomIn" data-wow-delay="300ms" data-wow-duration="1500ms"
                   title="RinBuild Video Gallery" href="https://www.youtube.com/watch?v=p25gICT63ek">
                    <span class="flaticon-play-button"></span>
                </a>
                <h6>Play Video</h6>
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
                        <div class="single-partner-logo-box">
                            <a href="#"><img src="{{asset('vendor/landing')}}/assets/images/brand/brand-1.png"
                                             alt="Awesome Image"></a>
                            <div class="overlay-box">
                                <a href="#"><img
                                        src="{{asset('vendor/landing')}}/assets/images/brand/overlay-brand-1.png"
                                        alt="Awesome Image"></a>
                            </div>
                        </div>
                        <!--End Single Partner Logo Box-->
                        <!--Start Single Partner Logo Box-->
                        <div class="single-partner-logo-box">
                            <a href="#"><img src="{{asset('vendor/landing')}}/assets/images/brand/brand-2.png"
                                             alt="Awesome Image"></a>
                            <div class="overlay-box">
                                <a href="#"><img
                                        src="{{asset('vendor/landing')}}/assets/images/brand/overlay-brand-2.png"
                                        alt="Awesome Image"></a>
                            </div>
                        </div>
                        <!--End Single Partner Logo Box-->
                        <!--Start Single Partner Logo Box-->
                        <div class="single-partner-logo-box">
                            <a href="#"><img src="{{asset('vendor/landing')}}/assets/images/brand/brand-3.png"
                                             alt="Awesome Image"></a>
                            <div class="overlay-box">
                                <a href="#"><img
                                        src="{{asset('vendor/landing')}}/assets/images/brand/overlay-brand-3.png"
                                        alt="Awesome Image"></a>
                            </div>
                        </div>
                        <!--End Single Partner Logo Box-->
                        <!--Start Single Partner Logo Box-->
                        <div class="single-partner-logo-box">
                            <a href="#"><img src="{{asset('vendor/landing')}}/assets/images/brand/brand-4.png"
                                             alt="Awesome Image"></a>
                            <div class="overlay-box">
                                <a href="#"><img
                                        src="{{asset('vendor/landing')}}/assets/images/brand/overlay-brand-4.png"
                                        alt="Awesome Image"></a>
                            </div>
                        </div>
                        <!--End Single Partner Logo Box-->
                        <!--Start Single Partner Logo Box-->
                        <div class="single-partner-logo-box">
                            <a href="#"><img src="{{asset('vendor/landing')}}/assets/images/brand/brand-5.png"
                                             alt="Awesome Image"></a>
                            <div class="overlay-box">
                                <a href="#"><img
                                        src="{{asset('vendor/landing')}}/assets/images/brand/overlay-brand-5.png"
                                        alt="Awesome Image"></a>
                            </div>
                        </div>
                        <!--End Single Partner Logo Box-->

                        <!--Start Single Partner Logo Box-->
                        <div class="single-partner-logo-box">
                            <a href="#"><img src="{{asset('vendor/landing')}}/assets/images/brand/brand-6.png"
                                             alt="Awesome Image"></a>
                            <div class="overlay-box">
                                <a href="#"><img
                                        src="{{asset('vendor/landing')}}/assets/images/brand/overlay-brand-6.png"
                                        alt="Awesome Image"></a>
                            </div>
                        </div>
                        <!--End Single Partner Logo Box-->
                        <!--Start Single Partner Logo Box-->
                        <div class="single-partner-logo-box">
                            <a href="#"><img src="{{asset('vendor/landing')}}/assets/images/brand/brand-7.png"
                                             alt="Awesome Image"></a>
                            <div class="overlay-box">
                                <a href="#"><img
                                        src="{{asset('vendor/landing')}}/assets/images/brand/overlay-brand-7.png"
                                        alt="Awesome Image"></a>
                            </div>
                        </div>
                        <!--End Single Partner Logo Box-->
                        <!--Start Single Partner Logo Box-->
                        <div class="single-partner-logo-box">
                            <a href="#"><img src="{{asset('vendor/landing')}}/assets/images/brand/brand-8.png"
                                             alt="Awesome Image"></a>
                            <div class="overlay-box">
                                <a href="#"><img
                                        src="{{asset('vendor/landing')}}/assets/images/brand/overlay-brand-8.png"
                                        alt="Awesome Image"></a>
                            </div>
                        </div>
                        <!--End Single Partner Logo Box-->
                        <!--Start Single Partner Logo Box-->
                        <div class="single-partner-logo-box">
                            <a href="#"><img src="{{asset('vendor/landing')}}/assets/images/brand/brand-9.png"
                                             alt="Awesome Image"></a>
                            <div class="overlay-box">
                                <a href="#"><img
                                        src="{{asset('vendor/landing')}}/assets/images/brand/overlay-brand-9.png"
                                        alt="Awesome Image"></a>
                            </div>
                        </div>
                        <!--End Single Partner Logo Box-->
                        <!--Start Single Partner Logo Box-->
                        <div class="single-partner-logo-box">
                            <a href="#"><img src="{{asset('vendor/landing')}}/assets/images/brand/brand-10.png"
                                             alt="Awesome Image"></a>
                            <div class="overlay-box">
                                <a href="#"><img
                                        src="{{asset('vendor/landing')}}/assets/images/brand/overlay-brand-10.png"
                                        alt="Awesome Image"></a>
                            </div>
                        </div>
                        <!--End Single Partner Logo Box-->
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
                    <div class="about-style2-image-box clearfix">
                        <img src="{{asset('vendor/landing')}}/assets/images/about/about-3.jpg" alt="Awesome Image">
                        <div class="inner-box">
                            <div class="image-box1 lazy-image">
                                <img src="{{asset('vendor/landing')}}/assets/images/about/about-4.jpg"
                                     alt="Awesome Image">
                            </div>
                            <div class="image-box2 lazy-image">
                                <img src="{{asset('vendor/landing')}}/assets/images/about/about-2.jpg"
                                     alt="Awesome Image">
                            </div>
                            <div class="video-holder-box style2">
                                <div class="icon">
                                    <div class="inner">
                                        <a class="video-popup wow zoomIn" data-wow-delay="300ms"
                                           data-wow-duration="1500ms" title="RinBuild Video Gallery"
                                           href="https://www.youtube.com/watch?v=p25gICT63ek">
                                            <span class="flaticon-play-button"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-12">
                    <div class="about-style1-text-box style2">
                        <div class="title">
                            <p>WELCOME</p>
                            <h1>Our 10 <span>RinBuild</span><br> <b>years</b> working<br> experience.</h1>
                        </div>
                        <div class="inner-contant">
                            <p>Donec scelerisque dolor id nunc dictum, interdum gravida mauris rhoncus. Aliquam at
                                ultrices nunc. In sem leo, fermentum at lorem in, porta finibus mauris. Aliquam
                                consectetur, ex in gravida porttitor,</p>
                            <div class="fact-box-style2">
                                <ul>
                                    <li class="single-fact-counter text-center wow fadeInLeft" data-wow-delay="100ms"
                                        data-wow-duration="1500ms">
                                        <div class="count-box">
                                            <h1>
                                                <span class="timer" data-from="1" data-to="30" data-speed="5000"
                                                      data-refresh-interval="50">30</span>
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
                        <!--Start Single Testimonial Style2-->
                        <div class="single-testimonial-style1">
                            <div class="text">
                                <p>Etiam fermentum non turpis in vivera. Nulla facilisis molestie mattis. Nulla
                                    fringilla mollis neque in pretium Nunc posuere ipsum.turpis in vivera. Nulla
                                    facilisis molestie mattis.</p>
                            </div>
                            <div class="client-info">
                                <div class="icon-box">
                                    <span class="flaticon-engineer-1"></span>
                                </div>
                                <div class="title-box">
                                    <h3>Anil Barua</h3>
                                    <p>construction worker</p>
                                </div>
                            </div>
                        </div>
                        <!--End Single Testimonial Style2-->
                        <!--Start Single Testimonial Style2-->
                        <div class="single-testimonial-style1">
                            <div class="text">
                                <p>Etiam fermentum non turpis in vivera. Nulla facilisis molestie mattis. Nulla
                                    fringilla mollis neque in pretium Nunc posuere ipsum.turpis in vivera. Nulla
                                    facilisis molestie mattis.</p>
                            </div>
                            <div class="client-info">
                                <div class="icon-box">
                                    <span class="flaticon-engineer-1"></span>
                                </div>
                                <div class="title-box">
                                    <h3>Anil Barua</h3>
                                    <p>construction worker</p>
                                </div>
                            </div>
                        </div>
                        <!--End Single Testimonial Style2-->
                        <!--Start Single Testimonial Style2-->
                        <div class="single-testimonial-style1">
                            <div class="text">
                                <p>Etiam fermentum non turpis in vivera. Nulla facilisis molestie mattis. Nulla
                                    fringilla mollis neque in pretium Nunc posuere ipsum.turpis in vivera. Nulla
                                    facilisis molestie mattis.</p>
                            </div>
                            <div class="client-info">
                                <div class="icon-box">
                                    <span class="flaticon-engineer-1"></span>
                                </div>
                                <div class="title-box">
                                    <h3>Anil Barua</h3>
                                    <p>construction worker</p>
                                </div>
                            </div>
                        </div>
                        <!--End Single Testimonial Style2-->
                        <!--Start Single Testimonial Style2-->
                        <div class="single-testimonial-style1">
                            <div class="text">
                                <p>Etiam fermentum non turpis in vivera. Nulla facilisis molestie mattis. Nulla
                                    fringilla mollis neque in pretium Nunc posuere ipsum.turpis in vivera. Nulla
                                    facilisis molestie mattis.</p>
                            </div>
                            <div class="client-info">
                                <div class="icon-box">
                                    <span class="flaticon-engineer-1"></span>
                                </div>
                                <div class="title-box">
                                    <h3>Anil Barua</h3>
                                    <p>construction worker</p>
                                </div>
                            </div>
                        </div>
                        <!--End Single Testimonial Style2-->
                        <!--Start Single Testimonial Style2-->
                        <div class="single-testimonial-style1">
                            <div class="text">
                                <p>Etiam fermentum non turpis in vivera. Nulla facilisis molestie mattis. Nulla
                                    fringilla mollis neque in pretium Nunc posuere ipsum.turpis in vivera. Nulla
                                    facilisis molestie mattis.</p>
                            </div>
                            <div class="client-info">
                                <div class="icon-box">
                                    <span class="flaticon-engineer-1"></span>
                                </div>
                                <div class="title-box">
                                    <h3>Anil Barua</h3>
                                    <p>construction worker</p>
                                </div>
                            </div>
                        </div>
                        <!--End Single Testimonial Style2-->
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
                            <p>frequency</p>
                            <div class="big-title black-clr"><h1>Frequency Rinbuild</h1></div>
                        </div>
                        <div class="accordion-box">
                            <!--Start single accordion box-->
                            <div class="accordion accordion-block">
                                <div class="accord-btn active"><h4>What industries do you serve?</h4></div>
                                <div class="accord-content collapsed">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                        Ipsum has when an unknown printer took a galley of type and scrambled it to
                                        make.</p>
                                </div>
                            </div>
                            <!--End single accordion box-->
                            <!--Start single accordion box-->
                            <div class="accordion accordion-block">
                                <div class="accord-btn"><h4>What are your help desk hours?</h4></div>
                                <div class="accord-content">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                        Ipsum has when an unknown printer took a galley of type and scrambled it to
                                        make.</p>
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
                                <div class="accord-btn"><h4>What does having managed it services cost?</h4></div>
                                <div class="accord-content">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                        Ipsum has when an unknown printer took a galley of type and scrambled it to
                                        make.</p>
                                </div>
                            </div>
                            <!--End single accordion box-->
                        </div>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="faq-image-box" data-aos="fade-left" data-aos-duration="0" data-aos-delay="0">
                        <img src="{{asset('vendor/landing')}}/assets/images/resources/faq-image.jpg"
                             alt="Awesome Image">
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--End Faq Content Area-->

    <!--Start Video Gallery Area-->
    <section class="video-gallery-area lazy-image"
             style="background-image:url({{asset('vendor/landing')}}/assets/images/parallax-background/video-gallery-bg.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="video-holder-box-style3">
                        <a class="video-popup wow zoomIn" data-wow-delay="300ms" data-wow-duration="1500ms"
                           title="RinBuild Video Gallery" href="https://www.youtube.com/watch?v=p25gICT63ek">
                            <span class="flaticon-play-button"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Video Gallery Area-->

    <!--Start latest blog area -->
    <section class="latest-blog-area pdtop120">
        <div class="container">
            <div class="sec-title text-center">
                <p>Our Blog</p>
                <div class="big-title black-clr"><h1>Our Letest Posts</h1></div>
            </div>
            <div class="row">
                <!--Start single blog post-->
                <div class="col-xl-7 col-lg-12 col-md-12 col-sm-12">
                    <div class="single-blog-post wow fadeInUp animated" data-wow-delay="0.3s"
                         data-wow-duration="1200ms">
                        <div class="img-holder">
                            <img class="lazy-image" src="{{asset('vendor/landing')}}/assets/images/blog/blog-v1-1.jpg"
                                 alt="Awesome Image">
                            <div class="overlay-style-one bg1"></div>
                            <div class="post-date">
                                <p><span class="flaticon-clock"></span>20/10/19</p>
                            </div>
                        </div>
                        <div class="text-holder">
                            <h3 class="blog-title"><a href="blog-single.html">Fusce convallis enim non magna pharetra
                                    facilisis. Duis lacus nulla dignissim.</a></h3>
                            <p>Nam mollis turpis sed magna vestibulum, pretium imperdiet. Mauris vehicula pellentesque
                                tortor, at vulputate dolor cursus eu. Morbi semper ante at libero ultrices, eget
                                pharetra nunc lacinia.</p>
                            <div class="bottom">
                                <div class="author-name">
                                    <a href="#"><span class="flaticon-user"></span>Richi Moni</a>
                                </div>
                                <div class="read-more-button">
                                    <a href="blog-single.html">Read More<span class="flaticon-next"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End single blog post-->
                <!--Start single blog post-->
                <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12">
                    <div class="single-blog-post style2 wow fadeInUp animated" data-wow-delay="0.4s"
                         data-wow-duration="1300ms">
                        <div class="img-holder">
                            <img class="lazy-image" src="{{asset('vendor/landing')}}/assets/images/blog/blog-v2-1.jpg"
                                 alt="Awesome Image">
                            <div class="overlay-style-one bg1"></div>
                            <div class="post-date">
                                <p><span class="flaticon-clock"></span>20/10/19</p>
                            </div>
                        </div>
                        <div class="text-holder">
                            <h3 class="blog-title"><a href="blog-single.html">Sed volutpat velit purus, eget ultricies
                                    pretium orci pretium id. Quisque.</a></h3>
                        </div>
                    </div>
                    <div class="single-blog-post style2 wow fadeInUp animated" data-wow-delay="0.5s"
                         data-wow-duration="1400ms">
                        <div class="img-holder">
                            <img class="lazy-image" src="{{asset('vendor/landing')}}/assets/images/blog/blog-v2-2.jpg"
                                 alt="Awesome Image">
                            <div class="overlay-style-one bg1"></div>
                            <div class="post-date">
                                <p><span class="flaticon-clock"></span>20/10/19</p>
                            </div>
                        </div>
                        <div class="text-holder">
                            <h3 class="blog-title"><a href="blog-single.html">Sed volutpat velit purus, eget ultricies
                                    pretium orci pretium id. Quisque.</a></h3>
                        </div>
                    </div>
                </div>
                <!--End single blog post-->

            </div>
        </div>
    </section>
    <!--End latest blog area-->

    <!--Start Slogan Area-->
    <section class="slogan-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="slogan-content wow slideInUp" data-wow-delay="100ms">
                        <div class="title">
                            <h1>Contact Us Now in Our Rinbuild</h1>
                        </div>
                        <div class="quote-button">
                            <a href="#">Get a Quote<span class="flaticon-next"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Slogan Area-->
@endsection
