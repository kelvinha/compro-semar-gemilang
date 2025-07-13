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
                            <p>WELCOME</p>
                            @php
                                $since = date('Y') - 2007;
                            @endphp
                            <h1>Our <b>{{$since}}</b> <span>Semar Gemilang</span><br> <b>years</b> working<br>
                                experience.</h1>
                        </div>
                        <div class="inner-contant">
                            <p>Sejak berdiri tahun 2007, kami berkomitmen menyediakan solusi energi yang berkualitas,
                                andal,
                                dan efisien bagi berbagai sektor industri — termasuk manufaktur, perhotelan, F&B,
                                keramik, dan otomotif.
                                Dengan jaringan distribusi yang luas dan pelayanan profesional, kami terus mendukung
                                pembangunan nasional melalui energi yang bersih dan berkelanjutan.</p>
                            <div class="signature-box">
                                <img src="{{ asset('vendor/landing')}}/assets/images/resources/signature.png"
                                     alt="Signature">
                            </div>
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
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
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
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                    <div class="single-fact-counter text-left wow fadeInLeft" data-wow-delay="100ms"
                         data-wow-duration="1500ms">
                        <div class="title">
                            <h3>Winning<br> Our Awards</h3>
                        </div>
                        <div class="count-box">
                            <h1>
                                <span class="timer" data-from="1" data-to="25" data-speed="5000"
                                      data-refresh-interval="50">25</span>
                            </h1>
                            <div class="icon"><span class="flaticon-plus"></span></div>
                        </div>
                    </div>
                </div>
                <!--End Single Fact Counter-->
                <!--Start Single Fact Counter-->
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                    <div class="single-fact-counter text-left wow fadeInLeft" data-wow-delay="100ms"
                         data-wow-duration="1500ms">
                        <div class="title">
                            <h3>Complet<br> Total Project</h3>
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
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                    <div class="single-fact-counter text-left wow fadeInLeft" data-wow-delay="100ms"
                         data-wow-duration="1500ms">
                        <div class="title">
                            <h3>Happy<br> Our Clients</h3>
                        </div>
                        <div class="count-box">
                            <h1>
                                <span class="timer" data-from="1" data-to="74" data-speed="5000"
                                      data-refresh-interval="50">74</span>
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
                <h2>Menjadi perusahaan <a href="#" style="color: #a0c239 ">LPG</a> nasional terdepan dengan layanan terbaik dan kontribusi nyata bagi pembangunan negeri.</h2>
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
                            <p>Menjalankan kegiatan distribusi dan pemasaran gas yang berorientasi pada pelanggan (customer satisfaction)</p>
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
                            <h3>Bangun jaringan distribusi handal</h3>
                            <p>Membangun jaringan distribusi yang handal dan terpercaya dalam menjangkau pasar di seluruh wilayah Indonesia</p>
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
                            <h3>Junjung integritas & tanggung jawab sosial</h3>
                            <p>Menjunjung tinggi integritas, etika, dan tanggung jawab sosial sebagai bagian dari budaya kerja dan pondasi bisnis</p>
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

    <!--Start Team Area-->
    <section class="team-area">
        <div class="container">
            <div class="sec-title text-center">
                <p>Meet Our Team</p>
                <div class="big-title black-clr"><h1>Our Experts Team</h1></div>
            </div>
            <div class="row">
                <!--Start Single Team Member-->
                @foreach($teams as $team)
                    <div class="col-xl-4 col-lg-4 wow fadeInUp animated" data-wow-delay="0.3s"
                         data-wow-duration="1300ms">
                        <div class="single-team-member wow fadeInUp" data-wow-delay="100ms" data-wow-duration="1500ms">
                            <div class="img-holder" style="height: 350px; width: auto; object-fit: contain;">
                                @if($team->photo)
                                    <img src="{{ asset('storage/' . $team->photo)}}" alt="{{$team->name}}">
                                @else
                                    <img src="{{ asset('vendor/landing')}}/assets/images/team/team-v1-1.jpg"
                                         alt="Awesome Image">
                                @endif
                            </div>
                            <div class="title-holder">
                                <div class="inner">
                                    <div class="left">
                                        <h3>{{$team->name}}</h3>
                                        <strong>{{$team->position}}</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--End Team Area-->

    <!--Start Partner Area-->
    <section class="partner-area">
        <div class="container">
            <div class="sec-title text-center">
                <p>Meet Our Clients</p>
                <div class="big-title black-clr"><h1>Our Clients</h1></div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="partner-box">
                        <!--Start Single Partner Logo Box-->
                        <div class="single-partner-logo-box">
                            <a href="#"><img src="{{ asset('vendor/landing')}}/assets/images/brand/brand-1.png"
                                             alt="Awesome Image"></a>
                            <div class="overlay-box">
                                <a href="#"><img
                                        src="{{ asset('vendor/landing')}}/assets/images/brand/overlay-brand-1.png"
                                        alt="Awesome Image"></a>
                            </div>
                        </div>
                        <!--End Single Partner Logo Box-->
                        <!--Start Single Partner Logo Box-->
                        <div class="single-partner-logo-box">
                            <a href="#"><img src="{{ asset('vendor/landing')}}/assets/images/brand/brand-2.png"
                                             alt="Awesome Image"></a>
                            <div class="overlay-box">
                                <a href="#"><img
                                        src="{{ asset('vendor/landing')}}/assets/images/brand/overlay-brand-2.png"
                                        alt="Awesome Image"></a>
                            </div>
                        </div>
                        <!--End Single Partner Logo Box-->
                        <!--Start Single Partner Logo Box-->
                        <div class="single-partner-logo-box marleft-minus">
                            <a href="#"><img src="{{ asset('vendor/landing')}}/assets/images/brand/brand-3.png"
                                             alt="Awesome Image"></a>
                            <div class="overlay-box">
                                <a href="#"><img
                                        src="{{ asset('vendor/landing')}}/assets/images/brand/overlay-brand-3.png"
                                        alt="Awesome Image"></a>
                            </div>
                        </div>
                        <!--End Single Partner Logo Box-->
                        <!--Start Single Partner Logo Box-->
                        <div class="single-partner-logo-box">
                            <a href="#"><img src="{{ asset('vendor/landing')}}/assets/images/brand/brand-4.png"
                                             alt="Awesome Image"></a>
                            <div class="overlay-box">
                                <a href="#"><img
                                        src="{{ asset('vendor/landing')}}/assets/images/brand/overlay-brand-4.png"
                                        alt="Awesome Image"></a>
                            </div>
                        </div>
                        <!--End Single Partner Logo Box-->
                        <!--Start Single Partner Logo Box-->
                        <div class="single-partner-logo-box">
                            <a href="#"><img src="{{ asset('vendor/landing')}}/assets/images/brand/brand-5.png"
                                             alt="Awesome Image"></a>
                            <div class="overlay-box">
                                <a href="#"><img
                                        src="{{ asset('vendor/landing')}}/assets/images/brand/overlay-brand-5.png"
                                        alt="Awesome Image"></a>
                            </div>
                        </div>
                        <!--End Single Partner Logo Box-->

                        <!--Start Single Partner Logo Box-->
                        <div class="single-partner-logo-box">
                            <a href="#"><img src="{{ asset('vendor/landing')}}/assets/images/brand/brand-6.png"
                                             alt="Awesome Image"></a>
                            <div class="overlay-box">
                                <a href="#"><img
                                        src="{{ asset('vendor/landing')}}/assets/images/brand/overlay-brand-6.png"
                                        alt="Awesome Image"></a>
                            </div>
                        </div>
                        <!--End Single Partner Logo Box-->
                        <!--Start Single Partner Logo Box-->
                        <div class="single-partner-logo-box">
                            <a href="#"><img src="{{ asset('vendor/landing')}}/assets/images/brand/brand-7.png"
                                             alt="Awesome Image"></a>
                            <div class="overlay-box">
                                <a href="#"><img
                                        src="{{ asset('vendor/landing')}}/assets/images/brand/overlay-brand-7.png"
                                        alt="Awesome Image"></a>
                            </div>
                        </div>
                        <!--End Single Partner Logo Box-->
                        <!--Start Single Partner Logo Box-->
                        <div class="single-partner-logo-box">
                            <a href="#"><img src="{{ asset('vendor/landing')}}/assets/images/brand/brand-8.png"
                                             alt="Awesome Image"></a>
                            <div class="overlay-box">
                                <a href="#"><img
                                        src="{{ asset('vendor/landing')}}/assets/images/brand/overlay-brand-8.png"
                                        alt="Awesome Image"></a>
                            </div>
                        </div>
                        <!--End Single Partner Logo Box-->
                        <!--Start Single Partner Logo Box-->
                        <div class="single-partner-logo-box marleft-minus">
                            <a href="#"><img src="{{ asset('vendor/landing')}}/assets/images/brand/brand-9.png"
                                             alt="Awesome Image"></a>
                            <div class="overlay-box">
                                <a href="#"><img
                                        src="{{ asset('vendor/landing')}}/assets/images/brand/overlay-brand-9.png"
                                        alt="Awesome Image"></a>
                            </div>
                        </div>
                        <!--End Single Partner Logo Box-->
                        <!--Start Single Partner Logo Box-->
                        <div class="single-partner-logo-box">
                            <a href="#"><img src="{{ asset('vendor/landing')}}/assets/images/brand/brand-10.png"
                                             alt="Awesome Image"></a>
                            <div class="overlay-box">
                                <a href="#"><img
                                        src="{{ asset('vendor/landing')}}/assets/images/brand/overlay-brand-10.png"
                                        alt="Awesome Image"></a>
                            </div>
                        </div>
                        <!--End Single Partner Logo Box-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Partner Area-->
@endsection
