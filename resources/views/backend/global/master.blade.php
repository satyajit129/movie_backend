<!DOCTYPE html>
<html lang="en">
@include('backend.global.css_support')
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
        @include('backend.layout.navabr')
        @include('backend.layout.header')
        @include('backend.layout.sidebar')
        <div class="content-body">
            @yield('content')
        </div>
        @include('backend.layout.footer')
        @yield('custom_scripts')

    </div>
    @include('backend.global.js_support')
</body>

</html>
