<!-- START OF FOOTER -->
@php
    $settings = \App\Helpers\SettingsHelper::getPublic();
    $data = [];

    foreach ($settings as $setting) {
        switch ($setting->key) {
            case 'social_facebook':
                $data['social_facebook'] = $setting->value;
                break;
            case 'social_twitter':
                $data['social_twitter'] = $setting->value;
                break;
            case 'social_instagram':
                $data['social_instagram'] = $setting->value;
                break;
            case 'social_linkedin':
                $data['social_linkedin'] = $setting->value;
                break;
            case 'social_youtube':
                $data['social_youtube'] = $setting->value;
                break;
            case 'website_logo':
                $data['website_logo'] = $setting->value;
                break;
            case 'contact_email':
                $data['contact_email'] = $setting->value;
                break;
            case 'contact_phone':
                $data['contact_phone'] = $setting->value;
                break;
            case 'contact_address':
                $data['contact_address'] = $setting->value;
                break;
        }
    }
@endphp
    <!--Start footer area-->
<footer class="footer-area">
    <div class="footer">
        <div class="container">
            <div class="row">
                <!--Start single footer widget-->
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 wow animated fadeInUp" data-wow-delay="0.3s">
                    <div class="single-footer-widget">
                        <div class="our-company-info">
                            <div class="footer-logo">
                                <a href="{{ route('home.index') }}">
                                    @if($data['website_logo'])
                                        <img src="{{ ('storage/' . $data['website_logo']) }}" alt="semar gemilang logo">
                                    @else
                                        <img src="assets/images/footer/footer-logo.png" alt="Awesome Footer Logo"
                                             title="Logo">
                                    @endif
                                </a>
                            </div>
                            <div class="text">
                                <p>PT. Semar Gemilang is a trusted Indonesian company specializing in LPG distribution since 2007. We deliver reliable and efficient energy solutions to support industries across the nation.</p>
                            </div>
                            <div class="footer-social-links">
                                <ul class="social-links-style1">
                                    <li>
                                        <a href="{{ $data['social_facebook'] }}"><i class="fa fa-facebook"
                                                                                    aria-hidden="true"></i></a>
                                    </li>
                                    <li>
                                        <a href="{{ $data['social_twitter'] }}"><i class="fa fa-twitter"
                                                                                   aria-hidden="true"></i></a>
                                    </li>
                                    <li>
                                        <a href="{{ $data['social_linkedin'] }}"><i class="fa fa-linkedin"
                                                                                    aria-hidden="true"></i></a>
                                    </li>
                                    <li>
                                        <a href="{{ $data['social_instagram'] }}"><i class="fa fa-instagram"
                                                                                     aria-hidden="true"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End single footer widget-->
                <!--Start single footer widget-->
                <div class="col-xl-6 col-lg-6 col-md-9 col-sm-12 wow animated fadeInUp" data-wow-delay="0.5s">
                    <div class="single-footer-widget margin50-0">
                        <div class="title">
                            <h3>Information</h3>
                        </div>
                        <div class="pages-box">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <ul class="page-links">
                                        @php
                                            // Load main menu directly in the header
                                            $mainMenu = \App\Helpers\MenuHelper::getMainMenu();
                                            $currentPath = "/". Request::path();
                                        @endphp

                                        @if($mainMenu && $mainMenu->submenus && $mainMenu->submenus->count() > 0)
                                            @foreach($mainMenu->submenus as $submenu)
                                                <li class="{{ $currentPath === $submenu->url || Request::path() === $submenu->url ? 'current' : '' }}">
                                                    <a href="{{ $submenu->url }}"
                                                       title="{{ $submenu->name }}">{{ $submenu->name }}</a>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!--End single footer widget-->
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="outer-box">
                <div class="copyright-text">
                    <p>Copyright© All Rights Reserved <a href="#">PT Semar Gemilang.</a></p>
                </div>
                <div class="footer-menu">
                    <ul>
                        <li><a href="#">Career</a></li>
                        <li><a href="#">Terms of service</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--End footer area-->
