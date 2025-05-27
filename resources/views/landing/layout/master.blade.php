<!DOCTYPE html>
<html lang="en">

@include('landing.partials.head2')

<body class="fixed @yield('classBody')">

    @include('landing.partials.preloader2')

    @include('landing.partials.header2')

    @yield('content')

    @include('landing.partials.footer2')

    <!-- SCROLL TO TOP Start -->
    <a href="javascript:void(0);" id="scroll-to-top" class="scroll-to-top" title="Scroll to Top">
        <i class="fas fa-arrow-up"></i>
    </a>
    <!-- SCROLL TO TOP End -->

    @include('landing.partials.scripts2')
</body>

</html>
