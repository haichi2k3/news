<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Admin Dashboard </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('html-admin/images/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('html-admin/vendor/owl-carousel/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('html-admin/vendor/owl-carousel/css/owl.theme.default.min.css') }}">
    <link href="{{ asset('html-admin/vendor/jqvmap/css/jqvmap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('html-admin/css/style.css') }}" rel="stylesheet">
    {{-- <link rel="stylesheet" href=" https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"> --}}

    <link href="{{ asset('html-admin/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="{{ asset('html-admin/css/style.css" rel="stylesheet') }}">

</head>

<body>
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
    
    @include('admin.layouts.nav-header')

    @include('admin.layouts.header')

    @include('admin.layouts.sidebar')

    @yield('content')

    @include('admin.layouts.footer')


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('html-admin/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('html-admin/js/quixnav-init.js') }}"></script>
    <script src="{{ asset('html-admin/js/custom.min.js') }}"></script>


    <!-- Vectormap -->
    <script src="{{ asset('html-admin/vendor/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('html-admin/vendor/morris/morris.min.js') }}"></script>


    <script src="{{ asset('html-admin/vendor/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('html-admin/vendor/chart.js/Chart.bundle.min.js') }}"></script>

    <script src="{{ asset('html-admin/vendor/gaugeJS/dist/gauge.min.js') }}"></script>

    <!--  flot-chart js -->
    <script src="{{ asset('html-admin/vendor/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('html-admin/vendor/flot/jquery.flot.resize.js') }}"></script>

    <!-- Owl Carousel -->
    <script src="{{ asset('html-admin/vendor/owl-carousel/js/owl.carousel.min.js') }}"></script>

    <!-- Counter Up -->
    <script src="{{ asset('html-admin/vendor/jqvmap/js/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('html-admin/vendor/jqvmap/js/jquery.vmap.usa.js') }}"></script>
    <script src="{{ asset('html-admin/vendor/jquery.counterup/jquery.counterup.min.js') }}"></script>

    <script src="{{ asset('html-admin/js/dashboard/dashboard-1.js') }}"></script>
    
    {{-- table --}}
    <script src="{{ asset('html-admin/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('html-admin/js/quixnav-init.js') }}"></script>
    <script src="{{ asset('html-admin/js/custom.min.js') }}"></script>
    


    <!-- Datatable -->
    <script src="{{ asset('html-admin/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('html-admin/js/plugins-init/datatables.init.js') }}"></script>


</body>

</html>