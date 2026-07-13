<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title', 'Complaint Management System')</title>
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
    @yield('styles')
</head>
<body class="">
    @yield('preloader')
    @yield('sidebar')
    @yield('header')
    
    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            @yield('breadcrumb')
            @yield('content')
        </div>
    </div>
    
    <script src="{{ asset('admin/assets/js/vendor-all.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/pcoded.min.js') }}"></script>
    @yield('scripts')
</body>
</html>
