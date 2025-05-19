<!doctype html>
<html lang="zxx">

@include('landing.partials.head')

<body class="body-color-three">

    @include('landing.partials.preloader')

    <!-- Theme Switcher Start -->
    {{-- <div class="switch-theme-mode">
        <label id="switch" class="switch">
            <input type="checkbox" onchange="toggleTheme()" id="slider">
            <span class="slider round"></span>
        </label>
    </div> --}}
    <!-- Theme Switcher End -->

    @include('landing.partials.header')

    @yield('content')

    @include('landing.partials.footer')

    <!-- Start Go Top Area -->
    <div class="go-top">
        <i class="bx bx-chevrons-up"></i>
        <i class="bx bx-chevrons-up"></i>
    </div>
    <!-- End Go Top Area -->


    @include('landing.partials.scripts')
</body>

</html>