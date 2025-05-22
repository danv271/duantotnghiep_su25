<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@yield('title', 'eStore - Bootstrap Template')</title>
    <meta name="description" content="@yield('description', '')">
    <meta name="keywords" content="@yield('keywords', '')">

    <!-- Favicons -->
    <link href="{{ asset('estore/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('estore/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('estore/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('estore/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('estore/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('estore/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('estore/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('estore/assets/vendor/drift-zoom/drift-basic.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('estore/assets/css/main.css') }}" rel="stylesheet">

    @stack('styles')
</head>
<body class="@yield('body-class', 'index-page')">
    @include('partials.header')

    <main class="main">
        @yield('content')
    </main>

    @include('partials.footer')

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('estore/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('estore/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('estore/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('estore/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('estore/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('estore/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('estore/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('estore/assets/vendor/drift-zoom/Drift.min.js') }}"></script>
    <script src="{{ asset('estore/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('estore/assets/js/main.js') }}"></script>

    @stack('scripts')
</body>
</html>