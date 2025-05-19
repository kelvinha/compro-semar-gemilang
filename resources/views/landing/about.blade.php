@extends('landing.layout.master')

@section('content')
@php
// Load about page content directly in the view for SEO purposes only
$aboutPage = \App\Helpers\PageHelper::getAboutPage();

// If about page doesn't exist, create a fallback
if (!$aboutPage) {
$aboutPage = \App\Helpers\PageHelper::createFallbackPage(
'Tentang Kami',
'PT Industri Teknologi Torsi adalah produsen khusus komponen otomasi dan katup yang menyediakan produk berkualitas
tinggi untuk memenuhi kebutuhan industri.',
'otomasi katup, komponen otomasi, minyak dan gas, kilang, petrokimia, pembangkit listrik'
);
}

// Load testimonials directly in the view
$testimonials = \App\Helpers\TestimonialHelper::getAll();
@endphp

<!-- Start Page Title Area -->
<div class="page-title-area">
    <div class="container">
        <div class="page-title-content">
            <h2>{{ $aboutPage->name }}</h2>
            <ul>
                <li>
                    <a href="{{ route('home.index') }}">
                        <i class="bx bx-home"></i>
                        Home
                    </a>
                </li>
                <li class="active">{{ $aboutPage->name }}</li>
            </ul>
        </div>
    </div>
</div>
<!-- End Page Title Area -->

<!-- Start About Us Area -->
<section class="about-us-area pt-100 pb-70">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about-img">
                    <img src="{{ asset('vendor/landing/assets/img/about-img.jpg') }}" alt="PT Industri Teknologi Torsi">
                </div>
            </div>

            <div class="col-lg-6">
                <div class="about-content">
                    <div class="about-title">
                        <span>Tentang Kami</span>
                        <h2>PT Industri Teknologi Torsi</h2>
                    </div>

                    <div class="tab">
                        <ul class="tabs">
                            <li>Deskripsi Perusahaan</li>
                            <li>Visi Kami</li>
                            <li>Misi Kami</li>
                        </ul>

                        <div class="tab_content">
                            <div class="tabs_item">
                                <p>PT Industri Teknologi Torsi adalah produsen khusus komponen otomasi dan katup yang
                                    menyediakan produk berkualitas tinggi untuk memenuhi kebutuhan industri, seperti
                                    pada minyak & gas, kilang, petrokimia, dan pembangkit listrik. Dengan fokus pada
                                    inovasi dan keandalan, kami berkomitmen untuk memberikan solusi yang efisien dan
                                    aman bagi pelanggan kami.</p>

                                <div class="mt-4">
                                    <a href="{{asset('documents/ITT - Company Profile.pdf')}}" target="_blank"
                                        class="btn btn-primary">Unduh Company Profile</a>
                                </div>
                            </div>

                            <div class="tabs_item">
                                <p>Menjadi penyedia solusi otomasi katup terkemuka di Indonesia, dengan produk
                                    berkualitas tinggi yang diproduksi secara lokal dan mematuhi peraturan industri.</p>
                            </div>

                            <div class="tabs_item">
                                <ul>
                                    <li>
                                        <i class="bx bx-check-circle"></i>
                                        Memberikan solusi otomasi katup yang inovatif dan berkinerja tinggi.
                                    </li>
                                    <li>
                                        <i class="bx bx-check-circle"></i>
                                        Meningkatkan kandungan lokal dalam setiap produk yang kami produksi.
                                    </li>
                                    <li>
                                        <i class="bx bx-check-circle"></i>
                                        Memberikan layanan purna jual terbaik untuk memastikan keandalan sistem.
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End About Us Area -->

<!-- Start Our Capabilities Area -->
<section class="challenges-area pt-100 pb-70 jarallax" data-jarallax='{"speed": 0.3}'>
    <div class="container">
        <div class="section-title white-title">
            <span>Kemampuan Kami</span>
            <h2>Solusi Otomasi Katup Berkualitas Tinggi</h2>
        </div>

        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="single-challenges overly-one">
                    <div class="overly-two">
                        <i class="flaticon-threat"></i>
                        <h3>Kualitas Terjamin</h3>
                        <p>Kami memastikan kualitas tertinggi dalam semua produk dan layanan kami.</p>
                        <span class="flaticon-threat"></span>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="single-challenges overly-one">
                    <div class="overly-two">
                        <i class="flaticon-cyber"></i>
                        <h3>Inovasi</h3>
                        <p>Kami terus berinovasi untuk tetap terdepan dalam industri.</p>
                        <span class="flaticon-cyber"></span>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="single-challenges overly-one">
                    <div class="overly-two">
                        <i class="flaticon-cyber-security-1"></i>
                        <h3>Fokus pada Pelanggan</h3>
                        <p>Kami menempatkan pelanggan sebagai pusat dari semua yang kami lakukan.</p>
                        <span class="flaticon-cyber-security-1"></span>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="single-challenges overly-one">
                    <div class="overly-two">
                        <i class="flaticon-password"></i>
                        <h3>Layanan Purna Jual</h3>
                        <p>Kami menyediakan layanan purna jual terbaik untuk memastikan keandalan sistem.</p>
                        <span class="flaticon-password"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Our Capabilities Area -->

<!-- Start Testimonials Area -->
<section class="testimonials-area ptb-100 jarallax" data-jarallax='{"speed": 0.3}'>
    <div class="container">
        <div class="testimonials">
            <span>Apa Kata Klien Kami</span>

            <div class="testimonials-slider owl-carousel owl-theme">
                @if($testimonials->count() > 0)
                @foreach($testimonials as $testimonial)
                <div class="testimonials-item">
                    <i class="flaticon-quote"></i>
                    <p>"{{ $testimonial->quote }}"</p>

                    <ul>
                        @for($i = 0; $i < 5; $i++) <li>
                            <i class="bx bxs-star"></i>
                            </li>
                            @endfor
                    </ul>

                    <h3>{{ $testimonial->name }}</h3>
                    <span>{{ $testimonial->title }}{{ $testimonial->company ? ', ' . $testimonial->company : ''
                        }}</span>
                </div>
                @endforeach
                @else
                <!-- Fallback testimonials if none are in the database -->
                <div class="testimonials-item">
                    <i class="flaticon-quote"></i>
                    <p>"PT Industri Teknologi Torsi telah menjadi mitra kami selama bertahun-tahun, dan mereka selalu
                        memberikan hasil yang luar biasa. Tim mereka profesional, responsif, dan benar-benar peduli
                        dengan kesuksesan kami."</p>

                    <ul>
                        <li><i class="bx bxs-star"></i></li>
                        <li><i class="bx bxs-star"></i></li>
                        <li><i class="bx bxs-star"></i></li>
                        <li><i class="bx bxs-star"></i></li>
                        <li><i class="bx bxs-star"></i></li>
                    </ul>

                    <h3>Budi Santoso</h3>
                    <span>Direktur Operasional, PT Energi Nusantara</span>
                </div>
                <div class="testimonials-item">
                    <i class="flaticon-quote"></i>
                    <p>"Pendekatan inovatif mereka dalam memecahkan masalah telah membantu kami mengatasi berbagai
                        tantangan. Kami sangat merekomendasikan layanan mereka kepada siapa pun yang mencari mitra yang
                        andal."</p>

                    <ul>
                        <li><i class="bx bxs-star"></i></li>
                        <li><i class="bx bxs-star"></i></li>
                        <li><i class="bx bxs-star"></i></li>
                        <li><i class="bx bxs-star"></i></li>
                        <li><i class="bx bxs-star"></i></li>
                    </ul>

                    <h3>Siti Rahayu</h3>
                    <span>Manajer Proyek, PT Mitra Industri</span>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
<!-- End Testimonials Area -->
@endsection