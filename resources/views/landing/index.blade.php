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
{{--    <section class="partner-area partner-style2-area">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-xl-12">--}}
{{--                    <div class="partner-box">--}}
{{--                        <!--Start Single Partner Logo Box-->--}}
{{--                        @foreach($clients as $client)--}}
{{--                            @if($client->logo)--}}
{{--                                <div class="single-partner-logo-box">--}}
{{--                                    <a href="javascript:void(0);"><img src="{{ asset('storage/' . $client->logo) }}"--}}
{{--                                                                       alt="{{ $client->name }}"></a>--}}
{{--                                    <div class="overlay-box">--}}
{{--                                        <a href="javascript:void(0);"><img--}}
{{--                                                src="{{ asset('storage/' . $client->logo) }}"--}}
{{--                                                alt="{{ $client->name }}"></a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @endif--}}
{{--                        @endforeach--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
    <!--End Partner Style2 Area-->

    <!--Start Service Style1 Area-->
    <section class="service-style1-area pdtop75">
        <div class="container">
            <div class="title">
                <h1>Energy solutions for every industry. <br> From sourcing to safe delivery — Supporting your operations for every steps of yours.<br> <a href="{{ route('home.contact') }}">#Request
                        a quote.</a></h1>
            </div>
            <div class="row">
                <!--Start Single Service Style1-->
                <div class="col-xl-4 col-lg-4">
                    <div class="single-service-style1">
                        <div class="icon-holder lazy-image">
                            <img src="{{asset('vendor/landing')}}/assets/images/icon/services/industrial-icon.png" alt="Icon" width="50%">
                        </div>
                        <div class="text-holder">
                            <h3>Industrial & <br> Manufacturing</h3>
                            <p>Kami melayani kebutuhan LPG skala besar untuk sektor manufaktur, seperti industri makanan, industri keramik, industri tekstil, dll.</p>
                            <div class="count-box">1</div>
                        </div>
                    </div>
                </div>
                <!--End Single Service Style1-->
                <!--Start Single Service Style1-->
                <div class="col-xl-4 col-lg-4">
                    <div class="single-service-style1">
                        <div class="icon-holder lazy-image">
                            <img src="{{asset('vendor/landing')}}/assets/images/icon/services/hotel-icon.png" alt="Icon" width="50%;">
                        </div>
                        <div class="text-holder">
                            <h3>Hospitality & <br> Commercial</h3>
                            <p>Kami melayani kebutuhan LPG 50 KG untuk perhotelan, restoran, bisnis F&B maupun peternakan dengan layanan cepat dan aman.</p>
                            <div class="count-box">2</div>
                        </div>
                    </div>
                </div>
                <!--End Single Service Style1-->
                <!--Start Single Service Style1-->
                <div class="col-xl-4 col-lg-4">
                    <div class="single-service-style1">
                        <div class="icon-holder lazy-image">
                            <img src="{{asset('vendor/landing')}}/assets/images/icon/services/gas-truck-icon.png" alt="Icon" width="50%;">
                        </div>
                        <div class="text-holder">
                            <h3>Automotive & <br> Logistics</h3>
                            <p>Pasokan LPG bulk untuk industri otomotif dan logistik yang membutuhkan efisiensi energi dalam skala tinggi.</p>
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
                            @php
                                $since = date('Y') - 2007;
                            @endphp
                            <h1>Our {{ $since }}<br> <b>years</b> working<br> experience.</h1>
                        </div>
                        <div class="inner-contant">
                            <p>Sejak tahun 2007, PT. Semar Gemilang telah menyediakan solusi LPG yang andal untuk berbagai industri di seluruh Indonesia — mulai dari manufaktur industri, perhotelan hingga bisnis F&B. Kami berkomitmen terhadap pelayanan, keunggulan operasional dan after sales service.</p>
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
                                                <span class="timer" data-from="1" data-to="99" data-speed="5000"
                                                      data-refresh-interval="50">99</span>
                                            </h1>
                                            <div class="icon"><span class="flaticon-plus"></span></div>
                                        </div>
                                        <div class="title">
                                            <h3>Completed Project</h3>
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
    <!--End Latest Portfolio Area-->

    <!--Start Service Style3 Area-->
    <section class="service-style3-area mt-5">
        <div class="container">
            <div class="sec-title">
                <div class="big-title black-clr"><h1>Our Gallery</h1></div>
            </div>
        </div>
        <div class="auto-container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="rinbuild-carousel service-carousel owl-carousel owl-theme owl-nav-style-one"
                         data-options='{"loop":true, "margin":30, "autoheight":true, "nav":true, "dots":false, "autoplay":true, "autoplayTimeout":6000, "smartSpeed":500, "responsive":{ "0":{"items": "1"}, "768":{"items": "2"}, "1000":{"items": "3" }}}'>
                        <!--Start Single Service Style3-->
                        @foreach($medias as $media)
                            <div class="single-service-style3">
                                <div class="img-holder ">
                                    <img class="lazy-image"
                                         src="{{asset('storage/' . $media->path)}}"
                                         alt="{{ $media->alt_text }}"
                                         style="height: 500px; width: 100%; object-fit: cover; display: block;">
{{--                                    <div class="overlay-content">--}}
{{--                                        <div class="icon-holder"><span class="flaticon-house"></span></div>--}}
{{--                                        <div class="title-holder">--}}
{{--                                            <p>Building Wood Arcitect</p>--}}
{{--                                            <p>{{ $media->caption  }}</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                        @endforeach
                        <!--End Single Service Style3-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Service Style3 Area-->

    <!--Start Testimonial style2 Area-->
{{--    <section class="testimonial-style2-area">--}}
{{--        <div class="container">--}}
{{--            <div class="sec-title text-center">--}}
{{--                <p>Testimonials</p>--}}
{{--                <div class="big-title black-clr"><h1>What client says?</h1></div>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                <div class="col-xl-12">--}}
{{--                    <div class="rinbuild-carousel testimonial-carousel owl-carousel owl-theme owl-dot-style1"--}}
{{--                         data-options='{"loop":true, "margin":30, "autoheight":true, "nav":false, "dots":true, "autoplay":true, "autoplayTimeout":6000, "smartSpeed":500, "responsive":{ "0":{"items": "1"}, "768":{"items": "1"}, "1000":{"items": "2" }}}'>--}}
{{--                        @foreach($testimonials as $testimonial)--}}
{{--                            <div class="single-testimonial-style1">--}}
{{--                                <div class="text">--}}
{{--                                    <p>{{$testimonial->quote}}.</p>--}}
{{--                                </div>--}}
{{--                                <div class="client-info">--}}
{{--                                    <div class="icon-box">--}}
{{--                                        <span class="flaticon-engineer-1"></span>--}}
{{--                                    </div>--}}
{{--                                    <div class="title-box">--}}
{{--                                        <h3>{{ $testimonial->name }}</h3>--}}
{{--                                        <p>{{ $testimonial->company  }}</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endforeach--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
    <!--End Testimonial Style2 Area-->

    <!--Start Faq Content Area-->
    <section class="faq-content-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="faq-content-box">
                        <div class="sec-title">
                            <p>Faq</p>
                            <div class="big-title black-clr"><h1>FREQUENTLY ASKED QUESTIONS</h1></div>
                        </div>
                        <div class="accordion-box">
                            <!--Start single accordion box-->
                            <div class="accordion accordion-block">
                                <div class="accord-btn active"><h4>Apa itu Semar Gemilang?</h4></div>
                                <div class="accord-content collapsed">
                                    <p>Semar Gemilang merupakan perusahaan pemasok LPG swasta yang berkomitmen dalam memprioritaskan pada pelayanan pelanggan.</p>
                                </div>
                            </div>
                            <!--End single accordion box-->

                            <div class="accordion accordion-block">
                                <div class="accord-btn"><h4>Apa saja produk yang ditawarkan?</h4></div>
                                <div class="accord-content">
                                    <p>Kami menawarkan LPG dalam bentuk:</p>
                                    <ul>
                                        <li>Tabung 50 kg</li>
                                        <li>Curah</li>
                                        <li>Mini bulk kapasitas 450 kg</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="accordion accordion-block">
                                <div class="accord-btn"><h4>Bagaimana cara melakukan pembelian produk LPG?</h4></div>
                                <div class="accord-content">
                                    <p>Anda dapat melakukan pembelian dengan menghubungi nomor WhatsApp kami di <strong>0811-9848-904</strong>.</p>
                                </div>
                            </div>

                            <div class="accordion accordion-block">
                                <div class="accord-btn"><h4>Apakah Semar Gemilang melayani pengiriman luar kota?</h4></div>
                                <div class="accord-content">
                                    <p>Kami melayani pengiriman dengan jangkauan Pulau Jawa.</p>
                                </div>
                            </div>

                            <div class="accordion accordion-block">
                                <div class="accord-btn"><h4>Apakah Semar Gemilang membuka peluang kerja sama atau partnership?</h4></div>
                                <div class="accord-content">
                                    <p>Kami membuka peluang kerja sama atau partnership, silakan email ke <a href="mailto:marketing_ho@semargemilang.com">marketing_ho@semargemilang.com</a>.</p>
                                </div>
                            </div>

                            <div class="accordion accordion-block">
                                <div class="accord-btn"><h4>Bagaimana cara melamar kerja di Semar Gemilang?</h4></div>
                                <div class="accord-content">
                                    <p>Silakan email ke <a href="mailto:marketing_ho@semargemilang.com">marketing_ho@semargemilang.com</a>.</p>
                                </div>
                            </div>

                            <div class="accordion accordion-block">
                                <div class="accord-btn"><h4>Bagaimana jika saya mengalami masalah dengan produk atau layanan?</h4></div>
                                <div class="accord-content">
                                    <p>Silakan menghubungi kami pada WhatsApp di <strong>0811-9848-904</strong>.</p>
                                </div>
                            </div>

                            <div class="accordion accordion-block marginbottom0">
                                <div class="accord-btn"><h4>Bagaimana saya bisa mendapatkan informasi terbaru tentang Semar Gemilang?</h4></div>
                                <div class="accord-content">
                                    <p>Anda dapat membuka media sosial kami di Instagram: <a href="https://www.instagram.com/semargemilang_official/" target="_blank" style="color: #a0c239; text-decoration: none;">@semargemilang_official</a>.</p>
                                </div>
                            </div>
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
                            <a href="https://wa.me/628119848904?text=Halo%21%20Saya%20menemukan%20kontak%20ini%20dari%20website%20dan%20tertarik%20dengan%20layanan%2Fproduk%20yang%20ditawarkan.%20Boleh%20minta%20informasi%20lebih%20lengkapnya%3F%20Terima%20kasih%20sebelumnya." target="_blank" title="Get a Quote">Get a Quote<span class="flaticon-next"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Slogan Area-->
@endsection
