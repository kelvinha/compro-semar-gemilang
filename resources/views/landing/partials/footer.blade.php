<!-- Start Footer Area -->
<footer class="footer-area pt-100 pb-70 jarallax" data-jarallax='{"speed": 0.3}'>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="single-footer-widget">
                    <a href="{{ route('home.index') }}" class="logo">
                        @php
                        $websiteLogo = null;
                        $websiteLogoFooter = null;
                        $websiteName = 'PT Industri Teknologi Torsi';

                        foreach($settings as $setting) {
                        if($setting->key === 'website_logo') {
                        $websiteLogo = $setting->value;
                        } elseif($setting->key === 'website_logo_footer') {
                        $websiteLogoFooter = $setting->value;
                        } elseif($setting->key === 'website_name') {
                        $websiteName = $setting->value;
                        }
                        }
                        @endphp

                        @if($websiteLogoFooter)
                        <img src="{{ asset('storage/' . $websiteLogoFooter) }}" alt="{{ $websiteName }}">
                        @elseif($websiteLogo)
                        <img src="{{ asset('storage/' . $websiteLogo) }}" alt="{{ $websiteName }}">
                        @else
                        <img src="{{ asset('vendor/landing/assets/img/logo.png') }}" alt="{{ $websiteName }}">
                        @endif
                    </a>

                    <p>PT Industri Teknologi Torsi adalah produsen khusus komponen otomasi dan katup yang menyediakan
                        produk berkualitas tinggi untuk memenuhi kebutuhan industri, seperti pada minyak & gas, kilang,
                        petrokimia, dan pembangkit listrik.</p>

                    <ul class="social-icon">
                        @if(isset($settings['social_facebook']))
                        <li>
                            <a href="{{ $settings['social_facebook'] }}" target="_blank">
                                <i class="bx bxl-facebook"></i>
                            </a>
                        </li>
                        @endif
                        @if(isset($settings['social_instagram']))
                        <li>
                            <a href="{{ $settings['social_instagram'] }}" target="_blank">
                                <i class="bx bxl-instagram"></i>
                            </a>
                        </li>
                        @endif
                        @if(isset($settings['social_linkedin']))
                        <li>
                            <a href="{{ $settings['social_linkedin'] }}" target="_blank">
                                <i class="bx bxl-linkedin-square"></i>
                            </a>
                        </li>
                        @endif
                        @if(isset($settings['social_twitter']))
                        <li>
                            <a href="{{ $settings['social_twitter'] }}" target="_blank">
                                <i class="bx bxl-twitter"></i>
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="single-footer-widget">
                    <h3>{{ $settings['footer_address_title'] ?? 'Address' }}</h3>

                    <ul class="address">
                        @if(isset($settings['company_address']))
                        <li class="location">
                            <i class="bx bxs-location-plus"></i>
                            {{ $settings['company_address'] }}
                        </li>
                        @endif
                        <li>
                            <i class="bx bxs-envelope"></i>
                            @if(isset($settings['company_email']))
                            <a href="mailto:{{ $settings['company_email'] }}">{{ $settings['company_email'] }}</a>
                            @endif
                            @if(isset($settings['company_skype']))
                            <a href="skype:{{ $settings['company_skype'] }}?call">skype: {{ $settings['company_skype']
                                }}</a>
                            @endif
                        </li>
                        <li>
                            <i class="bx bxs-phone-call"></i>
                            @if(isset($settings['company_phone']))
                            <a href="tel:{{ $settings['company_phone'] }}">{{ $settings['company_phone'] }}</a>
                            @endif
                            @if(isset($settings['company_phone_secondary']))
                            <a href="tel:{{ $settings['company_phone_secondary'] }}">{{
                                $settings['company_phone_secondary'] }}</a>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="single-footer-widget">
                    <h3>Produk & Layanan</h3>

                    <ul class="import-link">
                        @php
                        // Load footer menu directly in the footer
                        $footerMenu = \App\Helpers\MenuHelper::getFooterMenu();
                        @endphp

                        @if($footerMenu && $footerMenu->submenus && $footerMenu->submenus->count() > 0)
                        @foreach($footerMenu->submenus->take(6) as $menu)
                        <li>
                            <a href="{{ $menu->url }}">{{ $menu->name }}</a>
                        </li>
                        @endforeach
                        @else
                        <li>
                            <a href="#">Aktuator Pneumatik</a>
                        </li>
                        <li>
                            <a href="#">Aktuator Elektrik</a>
                        </li>
                        <li>
                            <a href="#">Aktuator Hidrolik</a>
                        </li>
                        <li>
                            <a href="#">Katup Kontrol</a>
                        </li>
                        <li>
                            <a href="#">Sistem Otomasi</a>
                        </li>
                        <li>
                            <a href="#">Layanan Purna Jual</a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="single-footer-widget">
                    <h3>Informasi</h3>

                    <ul class="import-link">
                        @php
                        // Load secondary footer menu directly in the footer
                        $footerMenuSecondary = \App\Helpers\MenuHelper::getFooterMenuSecondary();
                        @endphp

                        @if($footerMenuSecondary && $footerMenuSecondary->submenus &&
                        $footerMenuSecondary->submenus->count() > 0)
                        @foreach($footerMenuSecondary->submenus->take(6) as $menu)
                        <li>
                            <a href="{{ $menu->url }}">{{ $menu->name }}</a>
                        </li>
                        @endforeach
                        @else
                        <li>
                            <a href="{{ route('home.about') }}">Tentang Kami</a>
                        </li>
                        <li>
                            <a href="#">Industri & Aplikasi</a>
                        </li>
                        <li>
                            <a href="#">Proyek & Referensi</a>
                        </li>
                        <li>
                            <a href="{{ route('home.blog') }}">Berita & Artikel</a>
                        </li>
                        <li>
                            <a href="#">Karir</a>
                        </li>
                        <li>
                            <a href="#">Hubungi Kami</a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End Footer Area -->
<!-- Start Copy Right Area -->
<div class="copy-right-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6">
                <p>© {{ date('Y') }} PT Industri Teknologi Torsi. All Rights Reserved.</p>
            </div>

            <div class="col-lg-6 col-md-6">
                <ul class="footer-menu">
                    @if(isset($settings['privacy_policy_url']))
                    <li>
                        <a href="{{ $settings['privacy_policy_url'] }}" target="_blank">
                            {{ $settings['privacy_policy_text'] ?? 'Privacy Policy' }}
                        </a>
                    </li>
                    @endif
                    @if(isset($settings['terms_conditions_url']))
                    <li>
                        <a href="{{ $settings['terms_conditions_url'] }}" target="_blank">
                            {{ $settings['terms_conditions_text'] ?? 'Terms & Conditions' }}
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Copy Right Area -->