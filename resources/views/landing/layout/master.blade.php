<!DOCTYPE html>
<html lang="en">

@include('landing.partials.head')

<body>
<div class="boxed_wrapper">

@include('landing.partials.preloader')

@include('landing.partials.header')

@yield('content')

@include('landing.partials.footer')

</div>

<button class="scroll-top scroll-to-target" data-target="html">
    <span class="icon-angle"></span>
</button>

@include('landing.partials.scripts')
</body>

</html>
