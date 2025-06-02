@extends('landing.layout.master')
@section('classBody', 'blog_list_page')
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
    <main class="site-main">
        <!-- START OF MAIN BANNER -->
        <section class="inner-banner back-img" style="background-image: url('{{asset('vendor/landing2')}}/assets/images/inner_banner_image.jpg');">
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
                                <h2 class="h1-title">Blog List</h2>
                            </div>
                            <div class="inner-banner-breadcrumb wow fadeInUp" data-wow-duration=".8s" data-wow-delay=".2s">
                                <ul>
                                    <li>
                                        <a href="index.html" title="Home">Home</a>
                                    </li>
                                    <li>
                                        <span>Blog</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END OF MAIN BANNER -->
        <!-- BLOG MAIN CONTENT START -->
        <section class="blog-listing">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="blog-listing-box wow fadeInLeft" data-wow-duration=".8s" data-wow-delay=".2s">
                            <div class="blog-box">
                                <div class="blog-image">
                                    <a href="blog-detail.html" class="back-img" style="background-image: url('{{asset('vendor/landing2')}}/assets/images/new-machine-details.jpg');" title="New machine will efficient big factory"></a>
                                    <p class="blog-published">7 June, 2024</p>
                                </div>
                                <div class="blog-box-content">
                                    <h4 class="h4-title">
                                        <a href="blog-detail.html" title="New machine will efficient big factory">New
                                            machine will efficient big factory</a>
                                    </h4>
                                    <p>Morbi blandit tincidunt bibendum. In molestie, felis id accumsan pellentesque,
                                        massa metus euismod velit, ut consectetur augue erat sit amet neque.</p>
                                    <a href="blog-detail.html" class="sec-btn" title="New machine will efficient big factory"></a>
                                </div>
                            </div>
                            <div class="blog-box">
                                <div class="blog-image">
                                    <a href="blog-detail.html" class="back-img" style="background-image: url('{{asset('vendor/landing2')}}/assets/images/how-to-build-details.jpg');" title="How to build for best new machinery industry"></a>
                                    <p class="blog-published">7 June, 2024</p>
                                </div>
                                <div class="blog-box-content">
                                    <h4 class="h4-title">
                                        <a href="blog-detail.html" title="How to build for best new machinery industry">How to build for best
                                            new machinery industry</a>
                                    </h4>
                                    <p>Morbi blandit tincidunt bibendum. In molestie, felis id accumsan pellentesque,
                                        massa metus euismod velit, ut consectetur augue erat sit amet neque.</p>
                                    <a href="blog-detail.html" class="sec-btn" title="How to build for best new machinery industry"></a>
                                </div>
                            </div>
                            <div class="blog-box">
                                <div class="blog-image">
                                    <a href="blog-detail.html" class="back-img" style="background-image: url('{{asset('vendor/landing2')}}/assets/images/we-are-best-details.jpg');" title="We are best any industrial & business solution"></a>
                                    <p class="blog-published">7 June, 2024</p>
                                </div>
                                <div class="blog-box-content">
                                    <h4 class="h4-title">
                                        <a href="blog-detail.html" title="We are best any industrial & business solution">We are best any
                                            industrial & business solution</a>
                                    </h4>
                                    <p>Morbi blandit tincidunt bibendum. In molestie, felis id accumsan pellentesque,
                                        massa metus euismod velit, ut consectetur augue erat sit amet neque.</p>
                                    <a href="blog-detail.html" class="sec-btn" title="We are best any industrial & business solution"></a>
                                </div>
                            </div>
                            <div class="blog-box">
                                <div class="blog-image">
                                    <a href="blog-detail.html" class="back-img" style="background-image: url('{{asset('vendor/landing2')}}/assets/images/industry-companies-details.jpg');" title="We are best any industrial & business solution"></a>
                                    <p class="blog-published">7 June, 2024</p>
                                </div>
                                <div class="blog-box-content">
                                    <h4 class="h4-title">
                                        <a href="blog-detail.html" title="We are best any industrial & business solution">Many industry
                                            companies engage in development</a>
                                    </h4>
                                    <p>Morbi blandit tincidunt bibendum. In molestie, felis id accumsan pellentesque,
                                        massa metus euismod velit, ut consectetur augue erat sit amet neque.</p>
                                    <a href="blog-detail.html" class="sec-btn" title="We are best any industrial & business solution"></a>
                                </div>
                            </div>
                        </div>
                        <div class="portfolio-pagination">
                            <a class="pagination-nav pagination-prev" href="javascript:void(0)" title="Previous">
                                <i class="fas fa-chevron-left" aria-hidden="true"></i>
                            </a>
                            <ul>
                                <li class="current-page">
                                    <a href="javascript:void(0)" title="1">1</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" title="2">2</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" title="3">3</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" title="4">4</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" title="5">5</a>
                                </li>
                            </ul>
                            <a class="pagination-nav pagination-next" href="javascript:void(0)" title="Next">
                                <i class="fas fa-chevron-right" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="blog-listing-sidebar wow fadeInRight" data-wow-duration=".8s" data-wow-delay=".2s">
                            <div class="blog-sidebar-box blog-search-box">
                                <h4 class="h4-title">Search Here</h4>
                                <div class="blog-search">
                                    <form>
                                        <div class="blog-search-bar">
                                            <input type="text" placeholder="Search..." required="">
                                            <button type="submit">
                                                <img src="{{asset('vendor/landing2')}}/assets/images/search-icon.svg" width="20" height="20" alt="Search Icon">
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="blog-sidebar-box blog-category-box">
                                <h4 class="h4-title">Categories</h4>
                                <ul>
                                    <li>
                                        <a href="javascript:void(0)" title="Smart Machine">Smart Machine</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" title="Factory & Industry">Factory & Industry</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" title="Fast Production">Fast Production</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" title="Great Technology">Great Technology</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" title="Hydro Power">Hydro Power</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" title="Solar Saving">Solar Saving</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="blog-sidebar-box blog-recent-post-box">
                                <h4 class="h4-title">Recent Post</h4>
                                <div class="blog-recent-post-wp">
                                    <div class="blog-recent-post">
                                        <div class="recent-post-img">
                                            <a class="back-img" href="blog-detail.html" style="background-image: url('{{asset('vendor/landing2')}}/assets/images/off-grid-solar-solution.jpg');" title="Off-grid solar solution energy independence"></a>
                                        </div>
                                        <div class="recent-post-content">
                                            <p class="recent-post-text">
                                                <a href="blog-detail.html" title="Off-grid solar solution energy independence">Off-grid solar
                                                    solution energy independence</a>
                                            </p>
                                            <div class="recent-post-date">7 June, 2024</div>
                                        </div>
                                    </div>
                                    <div class="blog-recent-post">
                                        <div class="recent-post-img">
                                            <a class="back-img" href="blog-detail.html" style="background-image: url('{{asset('vendor/landing2')}}/assets/images/solar-battery-storage.jpg');" title="Solar battery storage power resilience for your home"></a>
                                        </div>
                                        <div class="recent-post-content">
                                            <p class="recent-post-text">
                                                <a href="blog-detail.html" title="Solar battery storage power resilience for your home">Solar
                                                    battery storage power resilience for your home</a>
                                            </p>
                                            <div class="recent-post-date">7 June, 2024</div>
                                        </div>
                                    </div>
                                    <div class="blog-recent-post">
                                        <div class="recent-post-img">
                                            <a class="back-img" href="blog-detail.html" style="background-image: url('{{asset('vendor/landing2')}}/assets/images/benefits-of-solar-power.jpg');" title="The benefits of switching to solar power"></a>
                                        </div>
                                        <div class="recent-post-content">
                                            <p class="recent-post-text">
                                                <a href="blog-detail.html" title="The benefits of switching to solar power">The benefits of
                                                    switching to solar power</a>
                                            </p>
                                            <div class="recent-post-date">7 June, 2024</div>
                                        </div>
                                    </div>
                                    <div class="blog-recent-post">
                                        <div class="recent-post-img">
                                            <a class="back-img" href="blog-detail.html" style="background-image: url('{{asset('vendor/landing2')}}/assets/images/recent-best-in-production.jpg');" title="We are best any industrial & business solution"></a>
                                        </div>
                                        <div class="recent-post-content">
                                            <p class="recent-post-text">
                                                <a href="blog-detail.html" title="We are best any industrial & business solution">We are best
                                                    any industrial & business solution</a>
                                            </p>
                                            <div class="recent-post-date">7 June, 2024</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- BLOG MAIN CONTENT END-->
    </main>
@endsection
