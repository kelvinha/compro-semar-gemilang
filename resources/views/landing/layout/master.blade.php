<!DOCTYPE html>
<html lang="en">

@include('landing.partials.head')

<body class="fixed @yield('classBody')">

@include('landing.partials.preloader')

@include('landing.partials.header')

@yield('content')

@include('landing.partials.footer')

<!-- SCROLL TO TOP Start -->
<a href="javascript:void(0);" id="scroll-to-top" class="scroll-to-top" title="Scroll to Top">
    <i class="fas fa-arrow-up"></i>
</a>
<!-- SCROLL TO TOP End -->

@include('landing.partials.scripts')
</body>

</html>
