<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Admin</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('html-admin/images/favicon.png') }}">
    <link href="{{ asset('html-admin/css/style.css') }}" rel="stylesheet">

</head>

<body class="h-100">
    
    @yield('user')


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('html-admin/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('html-admin/js/quixnav-init.js') }}"></script>
    <script src="{{ asset('html-admin/js/custom.min.js') }}"></script>

</body>

</html>