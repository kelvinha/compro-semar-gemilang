<!-- [ Sidebar Menu ] end --><!-- [ Header Topbar ] start -->
<header class="pc-header">
    <div class="header-wrapper">
        <!-- [Mobile Media Block] start -->
        <div class="me-auto pc-mob-drp">
            <ul class="list-unstyled">
                <!-- ======= Menu collapse Icon ===== -->
                <li class="pc-h-item pc-sidebar-collapse">
                    <a href="#" class="pc-head-link ms-0" id="sidebar-hide"><i class="ti ti-menu-2"></i></a>
                </li>
                <li class="pc-h-item pc-sidebar-popup">
                    <a href="#" class="pc-head-link ms-0" id="mobile-collapse"><i class="ti ti-menu-2"></i></a>
                </li>
            </ul>
        </div>
        <!-- [Mobile Media Block end] -->
        <div class="ms-auto">
            <ul class="list-unstyled">
                @php
                    $multilingual = \App\Helpers\SettingsHelper::get('multilingual_enabled');
                    $isMultilingual = $multilingual == '1';
                    $currentLocale = app()->getLocale();
                    $availableLanguages = json_decode(
                        \App\Helpers\SettingsHelper::get('available_languages', '{"en":"English","id":"Indonesian"}'),
                        true,
                    );
                @endphp

                @if ($isMultilingual)
                    <li class="pc-h-item">
                        <div class="dropdown">
                            <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown"
                                href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="ti ti-language"></i>
                                <span>{{ $availableLanguages[$currentLocale] ?? 'English' }}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end pc-h-dropdown">
                                @foreach ($availableLanguages as $code => $name)
                                    <a href="{{ route('language.switch', $code) }}" class="dropdown-item">
                                        <i class="ti ti-{{ $code == 'en' ? 'flag' : 'flag-filled' }} me-2"></i>
                                        <span>{{ $name }}</span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</header>
