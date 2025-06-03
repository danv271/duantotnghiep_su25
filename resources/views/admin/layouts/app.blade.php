<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Title Meta -->
    <meta charset="utf-8" />
    <title>@yield('title', 'Dashboard | Larkon - Admin Dashboard')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully responsive premium admin dashboard template" />
    <meta name="author" content="Techzaa" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.ico') }}">

    <!-- Vendor css (Require in all Page) -->
    <link href="{{ asset('admin/assets/css/vendor.min.css') }}?v={{ time() }}" rel="stylesheet" type="text/css" />

    <!-- Icons css (Require in all Page) -->
    <link href="{{ asset('admin/assets/css/icons.min.css') }}?v={{ time() }}" rel="stylesheet" type="text/css" />

    <!-- App css (Require in all Page) -->
    <link href="{{ asset('admin/assets/css/app.min.css') }}?v={{ time() }}" rel="stylesheet" type="text/css" />

    <!-- Theme Config js (Require in all Page) -->
    <script src="{{ asset('admin/assets/js/config.js') }}"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    @yield('styles') <!-- Nơi để thêm CSS tùy chỉnh -->
</head>

<body>

    <!-- START Wrapper -->
    <div class="wrapper">
        @include('admin.partials.topbar')
        <!-- Activity Timeline -->
        @include('admin.partials.activity-offcanvas')

        <!-- Right Sidebar (Theme Settings) -->
        @include('admin.partials.settings-offcanvas')
        @include('admin.partials.sidebar')

        <!-- ==================================================== -->
        <!-- Start Page Content here -->
        <!-- ==================================================== -->
        <div class="page-content">
            <div class="container-fluid">
                @yield('content')
            </div>

            @include('admin.partials.footer')
        </div>
        <!-- ==================================================== -->
        <!-- End Page Content -->
        <!-- ==================================================== -->
    </div>
    <!-- END Wrapper -->

    <!-- Vendor Javascript (Require in all Page) -->
    <script src="{{ asset('admin/assets/js/vendor.js') }}"></script>

    <!-- App Javascript (Require in all Page) -->
    <script src="{{ asset('admin/assets/js/app.js') }}"></script>

    <!-- Vector Map Js -->
    <script src="{{ asset('admin/assets/vendor/jsvectormap/js/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/jsvectormap/maps/world-merc.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/jsvectormap/maps/world.js') }}"></script>

    <!-- Dashboard Js -->
    <script src="{{ asset('admin/assets/js/pages/dashboard.js') }}"></script>

    @yield('scripts') <!-- Nơi để thêm JS tùy chỉnh -->
</body>

</html>
