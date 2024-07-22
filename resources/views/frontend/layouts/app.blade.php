<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->currentLocale()) }}" dir="{{ language_direction() }}">

<head>
    <meta charset="utf-8" />
    <link href="{{ asset('img/favicon.png') }}" rel="apple-touch-icon" sizes="76x76">
    <link type="image/png" href="{{ asset('img/favicon.png') }}" rel="icon">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>@yield('title') | {{ config('app.name') }}</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />

    @include('frontend.includes.meta')

    <!-- Shortcut Icon -->
    <link href="{{ asset('img/favicon.png') }}" rel="shortcut icon">
    <link type="image/ico" href="{{ asset('img/favicon.png') }}" rel="icon" />

    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/animated_barfiller.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/summernote.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/scroll_button.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/utilities.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.simple-bar-graph.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/aryann.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/reset.css') }}" />

    @yield('CustomCss')

    <!--jquery library js-->
    <script src="/assets/js/jquery-3.7.1.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css" />

    @include('frontend.layouts.style')

    {{-- @yield('style') --}}
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    @include('frontend.includes.nav')
    @include('frontend.includes.cart')
    <main class="bg-white dark:bg-gray-800">
        @yield('content')
    </main>

    @include('frontend.includes.footer')

    <!-- Scripts -->
    @livewireScripts
    @stack('after-scripts')
    @yield('script')

</body>

</html>
