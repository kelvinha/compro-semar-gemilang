@extends('landing.layout.master')
@section('classBody', 'contact_us_page')
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
    <!--Start breadcrumb area-->
    <section class="breadcrumb-area" style="background-image: url({{asset('vendor/landing')}}/assets/images/breadcrumb/breadcrumb-3.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="inner-content clearfix">
                        <div class="title">
                            <h1>Contact Us</h1>
                        </div>
                        <div class="breadcrumb-menu">
                            <ul class="clearfix">
                                <li><a href="{{ route('home.index') }}">Home Back</a></li>
                                <li><span class="flaticon-next-1"></span></li>
                                <li class="active">Contact</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End breadcrumb area-->

    <!--Start Contact Info Area-->
    <section class="contact-info-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4">
                    <div class="single-contact-info-box text-center">
                        <div class="icon"><span class="flaticon-headphones"></span></div>
                        <div class="title">
                            <h3>Our Phone</h3>
                            <ul>
                                <li><a href="tel:{{ $contactInfo['phone'] }}">{{ $contactInfo['phone'] }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <div class="single-contact-info-box text-center">
                        <div class="icon"><span class="flaticon-mail-1"></span></div>
                        <div class="title">
                            <h3>Our Mail Box</h3>
                            <ul>
                                <li><a href="mailto:{{ $contactInfo['email'] }}">{{ $contactInfo['email'] }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <div class="single-contact-info-box text-center">
                        <div class="icon"><span class="flaticon-pin-1"></span></div>
                        <div class="title">
                            <h3>Our Location</h3>
                            <p>{{ $contactInfo['address'] }}</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--End Contact Info Area-->

    <!--Start Contact Form Section-->
    <section class="contact-form-area">
        <div class="auto-container">
            <div class="row clearfix">

                <div class="col-xl-7 col-lg-7 col-md-12">
                    <div class="contact-form">
                        <div class="title">
                            <h3>Leave Reply</h3>
                        </div>
                        <div class="inner-box">
                            <form id="contact-form" name="contact_form" class="default-form2" action="" method="post">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="input-box">
                                            <p>Name:</p>
                                            <input type="text" name="form_name" value="" placeholder="" required="">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="input-box">
                                            <p>Email Address:</p>
                                            <input type="email" name="form_email" value="" placeholder="" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="input-box">
                                            <p>Subject:</p>
                                            <input type="text" name="form_subject" value="" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="input-box">
                                            <p>Phone:</p>
                                            <input type="text" name="form_phone" value="" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="input-box">
                                            <p>Message:</p>
                                            <textarea name="form_message" placeholder="" required=""></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="button-box">
                                            <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="">
                                            <button class="btn-one" type="submit" data-loading-text="Please wait...">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-xl-5 col-lg-5 col-md-12">
                    <div class="contact-information-box">
                        <div class="title">
                            <h3>Contact Info</h3>
                        </div>
                        <ul class="contact-us">
                            <li>
                                <div class="icon">
                                    <span class="flaticon-pin-1"></span>
                                </div>
                                <div class="text">
                                    <p>{{ $contactInfo['address'] }}</p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <span class="flaticon-open-envelope-with-letter"></span>
                                </div>
                                <div class="text">
                                    <a href="mailto:{{ $contactInfo['email'] }}"> {{ $contactInfo['email'] }}</a>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <span class="flaticon-smartphone"></span>
                                </div>
                                <div class="text">
                                    <a href="tel:{{ $contactInfo['phone'] }}">{{ $contactInfo['phone'] }}</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--End Contact Form Section-->

    <section class="google-map-area">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3967.2693676285967!2d107.08601327498936!3d-6.094372693891977!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6a27cd6f1ec2d1%3A0x387364b040a65954!2sPt.%20Semar%20gemilang!5e0!3m2!1sen!2sid!4v1752420743018!5m2!1sen!2sid" width="100%" height="950" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>
@endsection
