@extends('landing.layout.master')
@section('classBody', 'about_us')
@section('content')
    <section class="breadcrumb-area"
             style="background-image: url('{{asset('vendor/landing')}}/assets/images/breadcrumb/breadcrumb-1.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="inner-content clearfix">
                        <div class="title">
                            <h1>About Us</h1>
                        </div>
                        <div class="breadcrumb-menu">
                            <ul class="clearfix">
                                <li><a href="{{ route('home.index') }}">Home Back</a></li>
                                <li><span class="flaticon-next-1"></span></li>
                                <li class="active">About Us</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End breadcrumb area-->

    <!--Start About Style1 Area-->
    <section class="about-style1-area bg-white">
        <div class="container">
            <div class="row">
                <div class="col-xl-5">
                    <div class="about-style1-image-box clearfix">
                        <div class="shape zoom-fade"></div>
                        <div class="image-box1">
                            <img src="{{ asset('vendor/landing') }}/assets/images/about/about-11.jpg"
                                 alt="Awesome Image">
                        </div>
                        <div class="image-box2">
                            <img src="{{ asset('vendor/landing') }}/assets/images/about/about-10.jpg"
                                 alt="Awesome Image">
                        </div>
                        <div class="video-holder-box"
                             style="background-image:url({{ asset('vendor/landing') }}/assets/images/about/about-9.jpg);">
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-12">
                    <div class="about-style1-text-box">
                        <div class="title">
                            @php
                                $since = date('Y') - 2007;
                            @endphp
                            <h1>Our <b>{{$since}}</b><br> <b>years</b> working<br>
                                experience.</h1>
                        </div>
                        <div class="inner-contant">
                            <p>Semar Gemilang yang lahir pada tanggal 10 April 2007 hadir sebagai solusi atas meningkatnya kebutuhan energi baik di sektor industri maupun rumah tangga. Berbekal legalitas resmi dari pemerintah dan komitmen untuk memberikan pelayanan terbaik, distribusi energi secara efektif dan efisien melalui kekuatan pasokan jaringan yang mencakup wilayah Jawa-Bali menjadikan Kami siap untuk menjawab segala tantangan secara profesional serta berorientasi pada pelanggan. Kami percaya bahwa tumbuh bersama mitra, keluarga, serta pelanggan setia menjadikan kuatnya pondasi kami atas keberlanjutan jangka panjang.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--End About Style1 Area-->

    <!--Start Fact Counter Area-->
    <section class="fact-counter-area pdbottom120">
        <div class="container">
            <div class="row">
                <!--Start Single Fact Counter-->
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                    <div class="single-fact-counter text-left wow fadeInLeft" data-wow-delay="100ms"
                         data-wow-duration="1500ms">
                        <div class="title">
                            <h3>Year of<br> Experience</h3>
                        </div>
                        <div class="count-box">
                            <h1>
                                <span class="timer" data-from="1" data-to="{{$since}}" data-speed="5000"
                                      data-refresh-interval="50">30</span>
                            </h1>
                            <div class="icon"><span class="flaticon-plus"></span></div>
                        </div>
                    </div>
                </div>
                <!--End Single Fact Counter-->
                <!--Start Single Fact Counter-->
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                    <div class="single-fact-counter text-left wow fadeInLeft" data-wow-delay="100ms"
                         data-wow-duration="1500ms">
                        <div class="title">
                            <h3>Completed<br> Total Project</h3>
                        </div>
                        <div class="count-box">
                            <h1>
                                <span class="timer" data-from="1" data-to="99" data-speed="5000"
                                      data-refresh-interval="50">99</span>
                            </h1>
                            <div class="icon"><span class="flaticon-plus"></span></div>
                        </div>
                    </div>
                </div>
                <!--End Single Fact Counter-->
                <!--Start Single Fact Counter-->
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                    <div class="single-fact-counter text-left wow fadeInLeft" data-wow-delay="100ms"
                         data-wow-duration="1500ms">
                        <div class="title">
                            <h3>Total<br> Clients</h3>
                        </div>
                        <div class="count-box">
                            <h1>
                                <span class="timer" data-from="1" data-to="700" data-speed="5000"
                                      data-refresh-interval="50">700</span>
                            </h1>
                            <div class="icon"><span class="flaticon-plus"></span></div>
                        </div>
                    </div>
                </div>
                <!--End Single Fact Counter-->
            </div>
        </div>
    </section>
    <!--End Fact Counter Area-->

    <!--Start Visi and misi Area-->
    <section class="service-style1-area pdtop75">
        <div class="container">
            <div class="title">
                <h1 class="pdtop50">VISI & MISI</h1>
                <h2>Menjadi perusahaan <a href="javascript:void(0)" style="color: #a0c239 ">LPG</a> nasional terdepan, kami berkomitmen memberikan layanan terbaik dan kontribusi nyata bagi pembangunan negeri</h2>
            </div>
            <div class="row">
                <!--Start Single Service Style1-->
                <div class="col-xl-6 col-lg-6">
                    <div class="single-service-style1">
                        <div class="icon-holder lazy-image">
                            <img src="{{asset('vendor/landing')}}/assets/images/icon/services/customer-icon.png" alt="Icon" width="50%">
                        </div>
                        <div class="text-holder">
                            <h3>Fokus pada kepuasan pelanggan</h3>
                            <p>Menjalankan kegiatan distribusi dan pemasaran gas yang berorientasi pada pelanggan (customer oriented)</p>
                            <div class="count-box">1</div>
                        </div>
                    </div>
                </div>
                <!--End Single Service Style1-->
                <!--Start Single Service Style1-->
                <div class="col-xl-6 col-lg-6">
                    <div class="single-service-style1">
                        <div class="icon-holder lazy-image">
                            <img src="{{asset('vendor/landing')}}/assets/images/icon/services/logistics-icon.png" alt="Icon" width="50%;">
                        </div>
                        <div class="text-holder">
                            <h3>Bangun jaringan distribusi andal</h3>
                            <p>Membangun jaringan distribusi yang andal dan terpercaya dalam menjangkau pasar di seluruh wilayah Indonesia</p>
                            <div class="count-box">2</div>
                        </div>
                    </div>
                </div>
                <!--End Single Service Style1-->
                <!--Start Single Service Style1-->
                <div class="col-xl-6 col-lg-6">
                    <div class="single-service-style1">
                        <div class="icon-holder lazy-image">
                            <img src="{{asset('vendor/landing')}}/assets/images/icon/services/trust-icon.png" alt="Icon" width="50%;">
                        </div>
                        <div class="text-holder">
                            <h3>Junjung Integritas dan Kolaborasi dalam pertumbuhan berkelanjutan</h3>
                            <p>Menjunjung tinggi integritas, etika, dan melakukan kolaborasi dalam pertumbuhan berkelanjutan sebagai bagian dari budaya kerja dan pondasi bisnis.
                            </p>
                            <div class="count-box">3</div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-lg-6">
                    <div class="single-service-style1">
                        <div class="icon-holder lazy-image">
                            <img src="{{asset('vendor/landing')}}/assets/images/icon/services/support-icon.png" alt="Icon" width="50%;">
                        </div>
                        <div class="text-holder">
                            <h3>Bersinergi dengan pelanggan & mitra</h3>
                            <p>Bersinergi bersama pelanggan, mitra bisnis, dan keluarga besar Semar Gemilang dalam mewujudkan ekosistem kerja yang kolaboratif</p>
                            <div class="count-box">4</div>
                        </div>
                    </div>
                </div>
                <!--End Single Service Style1-->
            </div>
        </div>
    </section>
1    <!--End Visi and misi  Area-->

    <!--Start Partner Area-->
{{--    <section class="partner-area">--}}
{{--        <div class="container">--}}
{{--            <div class="sec-title text-center">--}}
{{--                <p>Meet Our Clients</p>--}}
{{--                <div class="big-title black-clr"><h1>Our Clients</h1></div>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                <div class="col-xl-12">--}}
{{--                    <div class="partner-box">--}}
{{--                        <!--Start Single Partner Logo Box-->--}}
{{--                        <div class="single-partner-logo-box">--}}
{{--                            <a href="#"><img src="{{ asset('vendor/landing')}}/assets/images/brand/brand-1.png"--}}
{{--                                             alt="Awesome Image"></a>--}}
{{--                            <div class="overlay-box">--}}
{{--                                <a href="#"><img--}}
{{--                                        src="{{ asset('vendor/landing')}}/assets/images/brand/overlay-brand-1.png"--}}
{{--                                        alt="Awesome Image"></a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!--End Single Partner Logo Box-->--}}
{{--                        <!--Start Single Partner Logo Box-->--}}
{{--                        <div class="single-partner-logo-box">--}}
{{--                            <a href="#"><img src="{{ asset('vendor/landing')}}/assets/images/brand/brand-2.png"--}}
{{--                                             alt="Awesome Image"></a>--}}
{{--                            <div class="overlay-box">--}}
{{--                                <a href="#"><img--}}
{{--                                        src="{{ asset('vendor/landing')}}/assets/images/brand/overlay-brand-2.png"--}}
{{--                                        alt="Awesome Image"></a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!--End Single Partner Logo Box-->--}}
{{--                        <!--Start Single Partner Logo Box-->--}}
{{--                        <div class="single-partner-logo-box marleft-minus">--}}
{{--                            <a href="#"><img src="{{ asset('vendor/landing')}}/assets/images/brand/brand-3.png"--}}
{{--                                             alt="Awesome Image"></a>--}}
{{--                            <div class="overlay-box">--}}
{{--                                <a href="#"><img--}}
{{--                                        src="{{ asset('vendor/landing')}}/assets/images/brand/overlay-brand-3.png"--}}
{{--                                        alt="Awesome Image"></a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!--End Single Partner Logo Box-->--}}
{{--                        <!--Start Single Partner Logo Box-->--}}
{{--                        <div class="single-partner-logo-box">--}}
{{--                            <a href="#"><img src="{{ asset('vendor/landing')}}/assets/images/brand/brand-4.png"--}}
{{--                                             alt="Awesome Image"></a>--}}
{{--                            <div class="overlay-box">--}}
{{--                                <a href="#"><img--}}
{{--                                        src="{{ asset('vendor/landing')}}/assets/images/brand/overlay-brand-4.png"--}}
{{--                                        alt="Awesome Image"></a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!--End Single Partner Logo Box-->--}}
{{--                        <!--Start Single Partner Logo Box-->--}}
{{--                        <div class="single-partner-logo-box">--}}
{{--                            <a href="#"><img src="{{ asset('vendor/landing')}}/assets/images/brand/brand-5.png"--}}
{{--                                             alt="Awesome Image"></a>--}}
{{--                            <div class="overlay-box">--}}
{{--                                <a href="#"><img--}}
{{--                                        src="{{ asset('vendor/landing')}}/assets/images/brand/overlay-brand-5.png"--}}
{{--                                        alt="Awesome Image"></a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!--End Single Partner Logo Box-->--}}

{{--                        <!--Start Single Partner Logo Box-->--}}
{{--                        <div class="single-partner-logo-box">--}}
{{--                            <a href="#"><img src="{{ asset('vendor/landing')}}/assets/images/brand/brand-6.png"--}}
{{--                                             alt="Awesome Image"></a>--}}
{{--                            <div class="overlay-box">--}}
{{--                                <a href="#"><img--}}
{{--                                        src="{{ asset('vendor/landing')}}/assets/images/brand/overlay-brand-6.png"--}}
{{--                                        alt="Awesome Image"></a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!--End Single Partner Logo Box-->--}}
{{--                        <!--Start Single Partner Logo Box-->--}}
{{--                        <div class="single-partner-logo-box">--}}
{{--                            <a href="#"><img src="{{ asset('vendor/landing')}}/assets/images/brand/brand-7.png"--}}
{{--                                             alt="Awesome Image"></a>--}}
{{--                            <div class="overlay-box">--}}
{{--                                <a href="#"><img--}}
{{--                                        src="{{ asset('vendor/landing')}}/assets/images/brand/overlay-brand-7.png"--}}
{{--                                        alt="Awesome Image"></a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!--End Single Partner Logo Box-->--}}
{{--                        <!--Start Single Partner Logo Box-->--}}
{{--                        <div class="single-partner-logo-box">--}}
{{--                            <a href="#"><img src="{{ asset('vendor/landing')}}/assets/images/brand/brand-8.png"--}}
{{--                                             alt="Awesome Image"></a>--}}
{{--                            <div class="overlay-box">--}}
{{--                                <a href="#"><img--}}
{{--                                        src="{{ asset('vendor/landing')}}/assets/images/brand/overlay-brand-8.png"--}}
{{--                                        alt="Awesome Image"></a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!--End Single Partner Logo Box-->--}}
{{--                        <!--Start Single Partner Logo Box-->--}}
{{--                        <div class="single-partner-logo-box marleft-minus">--}}
{{--                            <a href="#"><img src="{{ asset('vendor/landing')}}/assets/images/brand/brand-9.png"--}}
{{--                                             alt="Awesome Image"></a>--}}
{{--                            <div class="overlay-box">--}}
{{--                                <a href="#"><img--}}
{{--                                        src="{{ asset('vendor/landing')}}/assets/images/brand/overlay-brand-9.png"--}}
{{--                                        alt="Awesome Image"></a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!--End Single Partner Logo Box-->--}}
{{--                        <!--Start Single Partner Logo Box-->--}}
{{--                        <div class="single-partner-logo-box">--}}
{{--                            <a href="#"><img src="{{ asset('vendor/landing')}}/assets/images/brand/brand-10.png"--}}
{{--                                             alt="Awesome Image"></a>--}}
{{--                            <div class="overlay-box">--}}
{{--                                <a href="#"><img--}}
{{--                                        src="{{ asset('vendor/landing')}}/assets/images/brand/overlay-brand-10.png"--}}
{{--                                        alt="Awesome Image"></a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!--End Single Partner Logo Box-->--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
    <!--End Partner Area-->
@endsection
