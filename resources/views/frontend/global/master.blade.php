<!DOCTYPE html>
<html lang="en">
@include('frontend.global.css_support')
@yield('custom_css')

<body>
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <div id="main-wrapper">
        @include('frontend.layout.navabr')
        @include('frontend.layout.header')
        @include('frontend.layout.sidebar')
        <div class="content-body">
            @yield('content')
        </div>
        @include('frontend.layout.footer')
        @yield('custom_scripts')

    </div>
    @include('frontend.global.js_support')
</body>

</html>
