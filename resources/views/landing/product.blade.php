@extends('landing.layout.master')
@section('classBody', 'services_listing_page')
@section('content')
    <main class="site-main">
        <!-- START OF BANNER -->
        <section class="inner-banner back-img" style="background-image: url('{{asset('vendor/landing')}}/assets/images/inner_banner_image.jpg');">
            <div class="banner-stripes">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="banner-shape-wp wow fadeInRight for-des" data-wow-duration=".8s">
                <div class="banner-shape">
                    <span class="stripe"></span>
                    <span class="stripe stripe-secondary"></span>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="inner-banner-content-wp white-text text-center">
                            <div class="inner-banner-content wow fadeInUp" data-wow-duration=".8s">
                                <h1 class="h1-title">Our Products</h1>
                            </div>
                            <div class="inner-banner-breadcrumb wow fadeInUp" data-wow-duration=".8s" data-wow-delay=".2s">
                                <ul>
                                    <li>
                                        <a href="index.html" title="Home">Home</a>
                                    </li>
                                    <li>
                                        <span>Services</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END OF BANNER -->
        <!-- START OF SERVICES LISTING -->
        <section class="main-services-grid">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-xxl-3 col-sm-6">
                        <div class="services-box wow fadeInUp" data-wow-duration=".8s" data-wow-delay=".2s">
                            <div class="services-image">
                                <div class="back-img" style="background-image: url('{{asset('vendor/landing')}}/assets/images/service-list-card-1.jpg');"></div>
                            </div>
                            <div class="services-box-icon">
                                <img src="{{asset('vendor/landing')}}/assets/images/all-maintenance-icon.svg" width="38" height="38" alt="All Maintenance Icon">
                            </div>
                            <div class="services-box-content">
                                <h4 class="h4-title">
                                    <a href="service-details.html" title="All Maintenance">All Maintenance</a>
                                </h4>
                                <p>Vivamus vari fermentum vestibulum consectetur morbi at odio.</p>
                                <a href="service-details.html" class="sec-btn icon-lg" title="Go to All Maintenance"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xxl-3 col-sm-6">
                        <div class="services-box wow fadeInUp" data-wow-duration=".8s" data-wow-delay=".2s">
                            <div class="services-image">
                                <div class="back-img" style="background-image: url('{{asset('vendor/landing')}}/assets/images/service-list-card-2.jpg');"></div>
                            </div>
                            <div class="services-box-icon">
                                <img src="{{asset('vendor/landing')}}/assets/images/general-contract-icon.svg" width="33" height="37" alt="General Contract Icon">
                            </div>
                            <div class="services-box-content">
                                <h4 class="h4-title">
                                    <a href="service-details.html" title="General Contract">General Contract</a>
                                </h4>
                                <p>Vivamus vari fermentum vestibulum consectetur morbi at odio.</p>
                                <a href="service-details.html" class="sec-btn icon-lg" title="Go to General Contract"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xxl-3 col-sm-6">
                        <div class="services-box wow fadeInUp" data-wow-duration=".8s" data-wow-delay=".2s">
                            <div class="services-image">
                                <div class="back-img" style="background-image: url('{{asset('vendor/landing')}}/assets/images/service-list-card-3.jpg');"></div>
                            </div>
                            <div class="services-box-icon">
                                <img src="{{asset('vendor/landing')}}/assets/images/automobiles-icon.svg" width="35" height="35" alt="Automobiles Icon">
                            </div>
                            <div class="services-box-content">
                                <h4 class="h4-title">
                                    <a href="service-details.html" title="Automobiles">Automobiles</a>
                                </h4>
                                <p>Vivamus vari fermentum vestibulum consectetur morbi at odio.</p>
                                <a href="service-details.html" class="sec-btn icon-lg" title="Go to Automobiles"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xxl-3 col-sm-6">
                        <div class="services-box wow fadeInUp" data-wow-duration=".8s" data-wow-delay=".2s">
                            <div class="services-image">
                                <div class="back-img" style="background-image: url('{{asset('vendor/landing')}}/assets/images/service-list-card-4.jpg');"></div>
                            </div>
                            <div class="services-box-icon">
                                <img src="{{asset('vendor/landing')}}/assets/images/mechanical-parts-icon.svg" width="35" height="35" alt="Mechanical Parts Icon">
                            </div>
                            <div class="services-box-content">
                                <h4 class="h4-title">
                                    <a href="service-details.html" title="Mechanical Parts">Mechanical Parts</a>
                                </h4>
                                <p>Vivamus vari fermentum vestibulum consectetur morbi at odio.</p>
                                <a href="service-details.html" class="sec-btn icon-lg" title="Go to Mechanical Parts"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xxl-3 col-sm-6">
                        <div class="services-box wow fadeInUp" data-wow-duration=".8s" data-wow-delay=".2s">
                            <div class="services-image">
                                <div class="back-img" style="background-image: url('{{asset('vendor/landing')}}/assets/images/service-list-card-5.jpg');"></div>
                            </div>
                            <div class="services-box-icon">
                                <img src="{{asset('vendor/landing')}}/assets/images/petroleum-gas-icon.svg" width="34" height="34" alt="Petroleum & Gas Icon">
                            </div>
                            <div class="services-box-content">
                                <h4 class="h4-title">
                                    <a href="service-details.html" title="Petroleum & Gas">Petroleum & Gas</a>
                                </h4>
                                <p>Vivamus vari fermentum vestibulum consectetur morbi at odio.</p>
                                <a href="service-details.html" class="sec-btn icon-lg" title="Go to Petroleum & Gas"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xxl-3 col-sm-6">
                        <div class="services-box wow fadeInUp" data-wow-duration=".8s" data-wow-delay=".2s">
                            <div class="services-image">
                                <div class="back-img" style="background-image: url('{{asset('vendor/landing')}}/assets/images/service-list-card-6.jpg');"></div>
                            </div>
                            <div class="services-box-icon">
                                <img src="{{asset('vendor/landing')}}/assets/images/electric-engineer-icon.svg" width="33" height="33" alt="Electric Engineer Icon">
                            </div>
                            <div class="services-box-content">
                                <h4 class="h4-title">
                                    <a href="service-details.html" title="Electric Engineer">Electric Engineer</a>
                                </h4>
                                <p>Vivamus vari fermentum vestibulum consectetur morbi at odio.</p>
                                <a href="service-details.html" class="sec-btn icon-lg" title="Go to Electric Engineer"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xxl-3 col-sm-6">
                        <div class="services-box wow fadeInUp" data-wow-duration=".8s" data-wow-delay=".2s">
                            <div class="services-image">
                                <div class="back-img" style="background-image: url('{{asset('vendor/landing')}}/assets/images/service-list-card-7.jpg');"></div>
                            </div>
                            <div class="services-box-icon">
                                <img src="{{asset('vendor/landing')}}/assets/images/smart-technology.svg" width="26" height="39" alt="smart technology Icon">
                            </div>
                            <div class="services-box-content">
                                <h4 class="h4-title">
                                    <a href="service-details.html" title="Smart Technology">Smart Technology</a>
                                </h4>
                                <p>Vivamus vari fermentum vestibulum consectetur morbi at odio.</p>
                                <a href="service-details.html" class="sec-btn icon-lg" title="Go to Smart Technology"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xxl-3 col-sm-6">
                        <div class="services-box wow fadeInUp" data-wow-duration=".8s" data-wow-delay=".2s">
                            <div class="services-image">
                                <div class="back-img" style="background-image: url('{{asset('vendor/landing')}}/assets/images/service-list-card-8.jpg');"></div>
                            </div>
                            <div class="services-box-icon">
                                <img src="{{asset('vendor/landing')}}/assets/images/support-24x7-icon.svg" width="32" height="32" alt="Support 24x7 Icon">
                            </div>
                            <div class="services-box-content">
                                <h4 class="h4-title">
                                    <a href="service-details.html" title="24x7 Support">24x7 Support</a>
                                </h4>
                                <p>Vivamus vari fermentum vestibulum consectetur morbi at odio.</p>
                                <a href="service-details.html" class="sec-btn icon-lg" title="Go to 24x7 Support"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END OF SERVICES LISTING -->
        <!-- START OF OUR WORK SECTION -->
        <section class="our-work">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="our-work-content-wp">
                            <div class="sec-title wow fadeInUp" data-wow-duration=".8s" data-wow-delay=".2s">
                                <span class="sub-title">
                                    <img src="{{asset('vendor/landing')}}/assets/images/setting-icon.svg" width="18" height="18" alt="Setting Icon">
                                    PORTFOLIO
                                </span>
                                <h2 class="h2-title m-0">Explore Our Work</h2>
                            </div>
                            <div class="more-work">
                                <a href="portfolio.html" class="sec-btn wow fadeInUp" data-wow-duration=".8s" data-wow-delay=".2s" title="Discover More">Discover More</a>
                            </div>
                            <div class="our-work-slider-wp wow fadeInUp" data-wow-duration=".8s" data-wow-delay=".2s">
                                <div class="swiper our-work-slider">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="our-work-box">
                                                <div class="back-img" style="background-image: url('{{asset('vendor/landing')}}/assets/images/work-1.jpg');"></div>
                                                <div class="our-work-content">
                                                    <div class="our-work-name">
                                                        <h4 class="h4-title">
                                                            <a href="portfolio.html" title="Electronic Material">Electronic Material</a>
                                                        </h4>
                                                        <span class="work-category">Industry Work</span>
                                                    </div>
                                                    <a href="portfolio.html" class="read-more-services sec-btn icon-lg" title="Go to Electronic Material"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="our-work-box">
                                                <div class="back-img" style="background-image: url('{{asset('vendor/landing')}}/assets/images/work-2.jpg');"></div>
                                                <div class="our-work-content">
                                                    <div class="our-work-name">
                                                        <h4 class="h4-title">
                                                            <a href="portfolio.html" title="Electronic Material">Electronic Material</a>
                                                        </h4>
                                                        <span class="work-category">Industry Work</span>
                                                    </div>
                                                    <a href="portfolio.html" class="read-more-services sec-btn icon-lg" title="Go to Electronic Material"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="our-work-box">
                                                <div class="back-img" style="background-image: url('{{asset('vendor/landing')}}/assets/images/work-3.jpg');"></div>
                                                <div class="our-work-content">
                                                    <div class="our-work-name">
                                                        <h4 class="h4-title">
                                                            <a href="portfolio.html" title="Electronic Material">Electronic Material</a>
                                                        </h4>
                                                        <span class="work-category">Industry Work</span>
                                                    </div>
                                                    <a href="portfolio.html" class="read-more-services sec-btn icon-lg" title="Go to Electronic Material"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="our-work-box">
                                                <div class="back-img" style="background-image: url('{{asset('vendor/landing')}}/assets/images/explore-work-1-min.jpg');">
                                                </div>
                                                <div class="our-work-content">
                                                    <div class="our-work-name">
                                                        <h4 class="h4-title">
                                                            <a href="portfolio.html" title="Electronic Material">Electronic Material</a>
                                                        </h4>
                                                        <span class="work-category">Industry Work</span>
                                                    </div>
                                                    <a href="portfolio.html" class="read-more-services sec-btn icon-lg" title="Go to Electronic Material"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="our-work-box">
                                                <div class="back-img" style="background-image: url('{{asset('vendor/landing')}}/assets/images/explore-work-2-min.jpg');">
                                                </div>
                                                <div class="our-work-content">
                                                    <div class="our-work-name">
                                                        <h4 class="h4-title">
                                                            <a href="portfolio.html" title="Electronic Material">Electronic Material</a>
                                                        </h4>
                                                        <span class="work-category">Industry Work</span>
                                                    </div>
                                                    <a href="portfolio.html" class="read-more-services sec-btn icon-lg" title="Go to Electronic Material"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="our-work-box">
                                                <div class="back-img" style="background-image: url('{{asset('vendor/landing')}}/assets/images/explore-work-3-min.jpg');">
                                                </div>
                                                <div class="our-work-content">
                                                    <div class="our-work-name">
                                                        <h4 class="h4-title">
                                                            <a href="portfolio.html" title="Electronic Material">Electronic Material</a>
                                                        </h4>
                                                        <span class="work-category">Industry Work</span>
                                                    </div>
                                                    <a href="portfolio.html" class="read-more-services sec-btn icon-lg" title="Go to Electronic Material"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END OF OUR WORK SECTION -->
        <!-- START OF QUALITY SECTION -->
        <section class="best-quality">
            <div class="container">
                <div class="sec-title text-center wow fadeInUp" data-wow-duration=".8s" data-wow-delay=".2s">
                    <span class="sub-title">
                        <img src="{{asset('vendor/landing')}}/assets/images/setting-icon.svg" width="18" height="18" alt="Setting Icon">
                        WHAT WE PROVIDE
                    </span>
                    <h2 class="h2-title">We Provide Best Quality</h2>
                </div>
                <div class="sec-content">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="best-quality-box wow fadeInUp" data-wow-duration=".8s" data-wow-delay=".2s">
                                <span class="quality-icon">
                                    <img src="{{asset('vendor/landing')}}/assets/images/all-maintenance-icon.svg" width="38" height="38" alt="All Maintenance Icon">
                                </span>
                                <div class="quality-content">
                                    <h4 class="h4-title">All Maintenance</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu nisi ut sem
                                        maximus suscipit. Donec malesuada ultricies eleifend. Duis hendrerit augue sit
                                        amet quam mollis.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="best-quality-box wow fadeInUp" data-wow-duration=".8s" data-wow-delay=".2s">
                                <span class="quality-icon">
                                    <img src="{{asset('vendor/landing')}}/assets/images/general-contract-icon.svg" width="33" height="37" alt="General Contract Icon">
                                </span>
                                <div class="quality-content">
                                    <h4 class="h4-title">General Contract</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu nisi ut sem
                                        maximus suscipit. Donec malesuada ultricies eleifend. Duis hendrerit augue sit
                                        amet quam mollis.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="best-quality-box wow fadeInUp" data-wow-duration=".8s" data-wow-delay=".2s">
                                <span class="quality-icon">
                                    <img src="{{asset('vendor/landing')}}/assets/images/automobiles-icon.svg" width="35" height="35" alt="Automobiles Icon">
                                </span>
                                <div class="quality-content">
                                    <h4 class="h4-title">Automobiles</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu nisi ut sem
                                        maximus suscipit. Donec malesuada ultricies eleifend. Duis hendrerit augue sit
                                        amet quam mollis.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="best-quality-box wow fadeInUp" data-wow-duration=".8s" data-wow-delay=".2s">
                                <span class="quality-icon">
                                    <img src="{{asset('vendor/landing')}}/assets/images/mechanical-parts-icon.svg" width="35" height="35" alt="Mechanical Parts Icon">
                                </span>
                                <div class="quality-content">
                                    <h4 class="h4-title">Mechanical Parts</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu nisi ut sem
                                        maximus suscipit. Donec malesuada ultricies eleifend. Duis hendrerit augue sit
                                        amet quam mollis.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END OF QUALITY SECTION -->
        <!-- START OF FAQ SECTION -->
        <section class="faq-section dark-bg">
            <div class="banner-shape">
                <span class="stripe"></span>
                <span class="stripe stripe-secondary"></span>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 order-lg-1 order-2 align-self-center">
                        <div class="faq-content wow fadeInLeft" data-wow-duration=".8s" data-wow-delay=".2s">
                            <div class="sec-title">
                                <span class="sub-title">
                                    <img src="{{asset('vendor/landing')}}/assets/images/setting-icon.svg" width="18" height="18" alt="Setting Icon">
                                    FAQ
                                </span>
                                <h2 class="h2-title m-0">Do You Have Any Question ?</h2>
                            </div>
                            <div class="faq-accordian white-text">
                                <div class="faq-accordian-box">
                                    <div class="faq-accordian-title">
                                        <h6 class="h6-title">Compliance crucial in product design ?</h6>
                                        <span class="icon"></span>
                                    </div>
                                    <div class="faq-accordian-content">
                                        <p>Quisque sed risus gravida, condimentum risus ac, euismod arcu. Proin ornare
                                            arcu non finibus finibus. Nullam et fringilla quam, sit amet feugiat eros.
                                            Maecenas scelerisque, libero at malesuada tempus, nulla ante sollicitudin
                                            tortor, sed placerat leo lacus ac nisi.</p>
                                    </div>
                                </div>
                                <div class="faq-accordian-box">
                                    <div class="faq-accordian-title">
                                        <h6 class="h6-title">Et harum quidem rerum facilis est et expedita?</h6>
                                        <span class="icon"></span>
                                    </div>
                                    <div class="faq-accordian-content">
                                        <p>Quisque sed risus gravida, condimentum risus ac, euismod arcu. Proin ornare
                                            arcu non finibus finibus. Nullam et fringilla quam, sit amet feugiat eros.
                                            Maecenas scelerisque, libero at malesuada tempus, nulla ante sollicitudin
                                            tortor, sed placerat leo lacus ac nisi.</p>
                                    </div>
                                </div>
                                <div class="faq-accordian-box">
                                    <div class="faq-accordian-title">
                                        <h6 class="h6-title">How do I choose right factory for manufacturing ?</h6>
                                        <span class="icon"></span>
                                    </div>
                                    <div class="faq-accordian-content">
                                        <p>Quisque sed risus gravida, condimentum risus ac, euismod arcu. Proin ornare
                                            arcu non finibus finibus. Nullam et fringilla quam, sit amet feugiat eros.
                                            Maecenas scelerisque, libero at malesuada tempus, nulla ante sollicitudin
                                            tortor, sed placerat leo lacus ac nisi.</p>
                                    </div>
                                </div>
                                <div class="faq-accordian-box">
                                    <div class="faq-accordian-title">
                                        <h6 class="h6-title">What is the process of product manufacturing ?</h6>
                                        <span class="icon"></span>
                                    </div>
                                    <div class="faq-accordian-content">
                                        <p>Quisque sed risus gravida, condimentum risus ac, euismod arcu. Proin ornare
                                            arcu non finibus finibus. Nullam et fringilla quam, sit amet feugiat eros.
                                            Maecenas scelerisque, libero at malesuada tempus, nulla ante sollicitudin
                                            tortor, sed placerat leo lacus ac nisi.</p>
                                    </div>
                                </div>
                                <div class="faq-accordian-box">
                                    <div class="faq-accordian-title">
                                        <h6 class="h6-title">Do we have the best business services ?</h6>
                                        <span class="icon"></span>
                                    </div>
                                    <div class="faq-accordian-content">
                                        <p>Quisque sed risus gravida, condimentum risus ac, euismod arcu. Proin ornare
                                            arcu non finibus finibus. Nullam et fringilla quam, sit amet feugiat eros.
                                            Maecenas scelerisque, libero at malesuada tempus, nulla ante sollicitudin
                                            tortor, sed placerat leo lacus ac nisi.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 order-lg-2 order-1">
                        <div class="in-touch-form wow fadeInRight" data-wow-duration=".8s" data-wow-delay=".2s">
                            <h3 class="h3-title">Get In Touch Now !</h3>
                            <form>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-field">
                                            <input type="text" class="input-field" placeholder="Full Name" required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-field">
                                            <input type="email" class="input-field" placeholder="Email Address" required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-field">
                                            <input type="number" class="input-field" placeholder="Phone No." required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-field">
                                            <textarea name="message" class="input-field" placeholder="Message..."></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-field form-submit-btn">
                                            <button type="submit" class="sec-btn">Submit now</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END OF FAQ SECTION -->
    </main>
@endsection
