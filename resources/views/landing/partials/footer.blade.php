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
        }
    }
@endphp
<footer class="site-footer white-text">
    <div class="top-footer">
        <div class="banner-shape">
            <span class="stripe"></span>
            <span class="stripe stripe-secondary"></span>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-left">
                        <div class="footer-branding">
                            <a href="index.html" title="Induris">
                                @if($data['website_logo'])
                                    <img src="{{ asset('storage/' . $data['website_logo']) }}" width="152" height="35"
                                         alt="PT Sadikun Niagamas Raya Logo">
                                @else
                                    <img src="{{asset('vendor/landing')}}/assets/images/logo.svg" width="152" height="35"
                                         alt="PT Sadikun Niagamas Raya Logo">
                                @endif
                            </a>
                            <p>Empowering Indonesia with reliable, innovative, and heartfelt energy solutions</p>
                        </div>
                        <div class="mail-form">
                            <form>
                                <input type="email" placeholder="Email Address" required="">
                                <button type="submit" class="sec-btn icon-lg"></button>
                            </form>
                        </div>
                        <div class="footer-socials">
                            <ul>
                                <li>
                                    <a href="{{ $data['social_facebook'] }}" title="Follow on Facebook" target="_blank">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href={{ $data['social_instagram'] }}" title="Follow on Instagram" target="_blank">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ $data['social_linkedin'] }}" title="Follow on Linkedin" target="_blank">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="footer-links">
                        <h4 class="h4-title">Our Links</h4>
                        <ul>
                            @php
                                // Load main menu directly in the header
                                $mainMenu = \App\Helpers\MenuHelper::getMainMenu();
                                $currentPath = "/". Request::path();
                            @endphp

                            @if($mainMenu && $mainMenu->submenus && $mainMenu->submenus->count() > 0)
                                @foreach($mainMenu->submenus as $submenu)
                                    <li class="{{ $currentPath === $submenu->url || Request::path() === $submenu->url ? 'active-footer-menu' : '' }}">
                                        <a href="{{ $submenu->url }}"
                                           title="{{ $submenu->name }}">{{ $submenu->name }}</a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="footer-contact">
                        <h4 class="h4-title">Contact Us</h4>
                        <ul>
                            <li>
                                <div class="contact-item">
                                        <span class="contact-icon">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </span>
                                    <div class="contact-link">
                                        <a href="https://maps.app.goo.gl/ZwA6bivb8dijZNoAA" title="145 45j Street Office 789 De14563, Western Australia" target="_blank">Perkantoran Menara Era,
                                            10th Floor, Room 03
                                            Jl. Raya Senen Kav 135-137
                                            Jakarta 10410
                                            Indonesia</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="contact-item">
                                        <span class="contact-icon">
                                            <i class="fas fa-envelope"></i>
                                        </span>
                                    <div class="contact-link">
                                        <a href="mailto:marketing_official@sadikun.com"
                                           title="Mail on marketing_official@sadikun.com">marketing_official@sadikun.com</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="contact-item">
                                        <span class="contact-icon">
                                            <i class="fas fa-phone-alt"></i>
                                        </span>
                                    <div class="contact-link">
                                        <a href="tel:+6221-3864386" title="Call on +62 213 864 386">
                                            +62 213 864 386
                                        </a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <h4 class="h4-title">Gallery</h4>
                    <div class="footer-gallery">
                        <ul>
                            <li>
                                <a href="{{asset('vendor/landing')}}/assets/images/footer-gallery-1-min.jpg" class="popup-image" title="Gallery Image">
                                    <div class="back-img" style="background-image: url('{{asset('vendor/landing')}}/assets/images/footer-gallery-1-min.jpg');">
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{asset('vendor/landing')}}/assets/images/footer-gallery-2-min.jpg" class="popup-image" title="Gallery Image">
                                    <div class="back-img" style="background-image: url('{{asset('vendor/landing')}}/assets/images/footer-gallery-2-min.jpg');">
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{asset('vendor/landing')}}/assets/images/footer-gallery-3-min.jpg" class="popup-image" title="Gallery Image">
                                    <div class="back-img" style="background-image: url('{{asset('vendor/landing')}}/assets/images/footer-gallery-3-min.jpg');">
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{asset('vendor/landing')}}/assets/images/footer-gallery-4-min.jpg" class="popup-image" title="Gallery Image">
                                    <div class="back-img" style="background-image: url('{{asset('vendor/landing')}}/assets/images/footer-gallery-4-min.jpg');">
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{asset('vendor/landing')}}/assets/images/footer-gallery-5-min.jpg" class="popup-image" title="Gallery Image">
                                    <div class="back-img" style="background-image: url('{{asset('vendor/landing')}}/assets/images/footer-gallery-5-min.jpg');">
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{asset('vendor/landing')}}/assets/images/footer-gallery-6-min.jpg" class="popup-image" title="Gallery Image">
                                    <div class="back-img" style="background-image: url('assets/images/footer-gallery-6-min.jpg');">
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom-footer">
        <div class="container">
            <div class="bottom-footer-content">
                <p class="bottom-footer-text m-0">
                    Copyright © <span id="copy-right-year">2025</span>
                    <a href="https://themeforest.net/user/geekcodelab" title="Geekcodelab" target="_blank">Geekcodelab.</a>
                    All rights reserved.
                </p>
                <ul>
                    <li>
                        <a href="javascript:void(0)" title="Privacy Policy">Privacy Policy</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" title="Terms Of Service">Terms Of Service</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- END OF FOOTER -->
