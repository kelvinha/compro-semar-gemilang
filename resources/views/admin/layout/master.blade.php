<!doctype html>
<html lang="{{ app()->getLocale() }}" class="pc-{{ \App\Helpers\SettingsHelper::get('theme', 'light') }}"
    data-pc-theme="{{ \App\Helpers\SettingsHelper::get('theme', 'light') }}"
    data-pc-direction="{{ \App\Helpers\SettingsHelper::get('direction', 'ltr') }}"
    data-pc-sidebar_type="{{ \App\Helpers\SettingsHelper::get('sidebar_type', 'default') }}">
@include('admin.partials.head')

<body data-pc-preset="preset-1" data-pc-sidebar-caption="true" data-pc-layout="vertical" data-pc-direction="ltr"
    data-pc-theme_contrast="" data-pc-theme="light">
    @include('admin.partials.preloader')
    @include('admin.partials.navbar')
    @include('admin.partials.header')
    <div class="pc-container">
        <div class="pc-content">
            @yield('content')
        </div>
    </div>
    @include('admin.partials.footer')
    @include('admin.partials.scripts')
</body>

</html>
