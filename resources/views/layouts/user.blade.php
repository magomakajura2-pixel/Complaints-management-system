<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title', 'Complaint Management System')</title>
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
    @yield('styles')
</head>
<body class="">
    @yield('sidebar')
    @yield('header')
    
    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            @yield('breadcrumb')
            @yield('content')
        </div>
    </div>
    
    <div class="footer">
        <div class="container">
            <b class="copyright">&copy; {{ date('Y') }} CMS </b> All rights reserved.
            <br>
            <small>Developed by <strong>KAJURA MAGOMA</strong></small>
        </div>
    </div>
    
    <script src="{{ asset('admin/assets/js/vendor-all.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/plugins/bootstrap.min.js') }}"></script>
    @yield('scripts')
</body>
</html>
