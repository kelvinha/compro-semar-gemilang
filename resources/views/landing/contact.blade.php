@extends('landing.layout.master')

@section('title', $contactPage->seo->title ?? $contactPage->title ?? 'Contact Us')
@section('meta_description', $contactPage->seo->description ?? $contactPage->subtitle ?? 'Get in touch with our team.
We\'re here to help and answer any questions you might have.')
@section('meta_keywords', $contactPage->seo->keywords ?? 'contact, get in touch, help, support, message, email, phone,
address')

@section('og_title', $contactPage->seo->og_title ?? $contactPage->seo->title ?? 'Contact Us')
@section('og_description', $contactPage->seo->og_description ?? $contactPage->seo->description ?? 'Get in touch with our
team. We\'re here to help and answer any questions you might have.')
@section('og_image', asset('storage/' . ($contactPage->seo->og_image ?? '')))

@section('content')
<!-- Start Page Title Area -->
<div class="page-title-area page-title-style-two">
    <div class="container">
        <div class="page-title-content">
            <h2>{{ $contactPage->title ?? 'Contact Us' }}</h2>
            <ul>
                <li>
                    <a href="{{ route('home.index') }}">
                        <i class="bx bx-home"></i>
                        Home
                    </a>
                </li>
                <li class="active">{{ $contactPage->title ?? 'Contact' }}</li>
            </ul>
        </div>
    </div>
</div>
<!-- End Page Title Area -->

<!-- Start Contact Area -->
<section class="main-contact-area ptb-100">
    <div class="container">
        @if($contactPage->content)
        <div class="row mb-5">
            <div class="col-12">
                <div class="about-content">
                    {!! $contactPage->content !!}
                </div>
            </div>
        </div>
        @endif

        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="contact-wrap">
                    <div class="contact-form">
                        <div class="contact-title">
                            <h2>Write Us</h2>
                        </div>

                        <form id="contactMessageForm" method="POST" action="{{ route('home.contact.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-sm-6">
                                    <div class="form-group">
                                        <label class="mb-2">Name</label>
                                        <input type="text" name="name" id="name"
                                            class="form-control @error('name') is-invalid @enderror" required
                                            data-error="Please enter your name" value="{{ old('name') }}">
                                        <div class="help-block with-errors">
                                            @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6">
                                    <div class="form-group">
                                        <label class="mb-2">Email Address</label>
                                        <input type="email" name="email" id="email"
                                            class="form-control @error('email') is-invalid @enderror" required
                                            data-error="Please enter your email" value="{{ old('email') }}">
                                        <div class="help-block with-errors">
                                            @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="mb-2">Subject</label>
                                        <input type="text" name="subject" id="subject"
                                            class="form-control @error('subject') is-invalid @enderror" required
                                            data-error="Please enter your subject" value="{{ old('subject') }}">
                                        <div class="help-block with-errors">
                                            @error('subject')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="mb-2">Message</label>
                                        <textarea name="message"
                                            class="form-control @error('message') is-invalid @enderror" id="message"
                                            cols="30" rows="10" required
                                            data-error="Write your message">{{ old('message') }}</textarea>
                                        <div class="help-block with-errors">
                                            @error('message')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <button type="submit" class="default-btn btn-two">
                                        <span>Send Message</span>
                                    </button>
                                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="contact-info">
                    <h3>Our contact details</h3>
                    @if($contactPage->subtitle)
                    <p>{{ $contactPage->subtitle }}</p>
                    @endif

                    <ul class="address">
                        @if($contactInfo['address'])
                        <li class="location">
                            <i class="bx bxs-location-plus"></i>
                            <span>Address</span>
                            {{ $contactInfo['address'] }}
                        </li>
                        @endif

                        @if($contactInfo['phone'] || $contactInfo['phone_secondary'])
                        <li>
                            <i class="bx bxs-phone-call"></i>
                            <span>Phone</span>
                            @if($contactInfo['phone'])
                            <a href="tel:{{ $contactInfo['phone'] }}">{{ $contactInfo['phone'] }}</a>
                            @endif
                            @if($contactInfo['phone_secondary'])
                            <a href="tel:{{ $contactInfo['phone_secondary'] }}">{{ $contactInfo['phone_secondary']
                                }}</a>
                            @endif
                        </li>
                        @endif

                        @if($contactInfo['email'] || $contactInfo['email_secondary'])
                        <li>
                            <i class="bx bxs-envelope"></i>
                            <span>Email</span>
                            @if($contactInfo['email'])
                            <a href="mailto:{{ $contactInfo['email'] }}">{{ $contactInfo['email'] }}</a>
                            @endif
                            @if($contactInfo['email_secondary'])
                            <a href="mailto:{{ $contactInfo['email_secondary'] }}">{{ $contactInfo['email_secondary']
                                }}</a>
                            @endif
                        </li>
                        @endif
                    </ul>

                    <div class="sidebar-follow-us">
                        <h3>Follow us:</h3>

                        <ul class="social-wrap">
                            @if($contactInfo['social_twitter'])
                            <li>
                                <a href="{{ $contactInfo['social_twitter'] }}" target="_blank">
                                    <i class="bx bxl-twitter"></i>
                                </a>
                            </li>
                            @endif
                            @if($contactInfo['social_instagram'])
                            <li>
                                <a href="{{ $contactInfo['social_instagram'] }}" target="_blank">
                                    <i class="bx bxl-instagram"></i>
                                </a>
                            </li>
                            @endif
                            @if($contactInfo['social_facebook'])
                            <li>
                                <a href="{{ $contactInfo['social_facebook'] }}" target="_blank">
                                    <i class="bx bxl-facebook"></i>
                                </a>
                            </li>
                            @endif
                            @if($contactInfo['social_youtube'])
                            <li>
                                <a href="{{ $contactInfo['social_youtube'] }}" target="_blank">
                                    <i class="bx bxl-youtube"></i>
                                </a>
                            </li>
                            @endif
                            @if($contactInfo['social_linkedin'])
                            <li>
                                <a href="{{ $contactInfo['social_linkedin'] }}" target="_blank">
                                    <i class="bx bxl-linkedin"></i>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Contact Area -->

<!-- Start Map Area -->
@if($contactInfo['map_embed'])
<div class="map-area">
    {!! $contactInfo['map_embed'] !!}
</div>
@endif
<!-- End Map Area -->
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        // Check for flash messages
        @if(session('success'))
            Swal.fire({
                title: 'Success!',
                text: "{{ session('success') }}",
                icon: 'success',
                confirmButtonText: 'OK',
                confirmButtonColor: '#0d6efd'
            });
        @endif

        @if(session('error'))
            Swal.fire({
                title: 'Error!',
                text: "{{ session('error') }}",
                icon: 'error',
                confirmButtonText: 'OK',
                confirmButtonColor: '#0d6efd'
            });
        @endif

        // Display validation errors with SweetAlert if they exist
        @if($errors->any())
            Swal.fire({
                title: 'Validation Error',
                text: 'Please correct the errors in the form.',
                icon: 'error',
                confirmButtonText: 'OK',
                confirmButtonColor: '#0d6efd'
            });
        @endif
    });
</script>
@endsection