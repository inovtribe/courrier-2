<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Dipvision Editor">
    <meta name="author" content="Conids Sarl">
    <link rel="icon" href="{{ asset('imgs/conids-logo_black_85x85.png') }}">

    <title>MINDDEVEL-COURRIER</title>

    <!--===============================================================================================-->
	    <link rel="stylesheet" type="text/css" href="{{ asset('style_login/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ asset('style_login/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ asset('style_login/fonts/iconic/css/material-design-iconic-font.min.css') }}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ asset('style_login/vendor/animate/animate.css') }}">
    <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="{{ asset('style_login/vendor/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ asset('style_login/vendor/animsition/css/animsition.min.css') }}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ asset('style_login/vendor/select2/select2.min.css') }}">
    <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="{{ asset('style_login/vendor/daterangepicker/daterangepicker.css') }}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ asset('style_login/css/util.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('style_login/css/main.css') }}">
    <!--===============================================================================================-->


</head>
<body>
     

    @yield('content')
    

    <!-- Scripts -->
    <!--===============================================================================================-->
	    <script src="{{ asset('style_login/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <!--===============================================================================================-->
        <script src="{{ asset('style_login/vendor/animsition/js/animsition.min.js') }}"></script>
    <!--===============================================================================================-->
        <script src="{{ asset('style_login/vendor/bootstrap/js/popper.js') }}"></script>
        <script src="{{ asset('style_login/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <!--===============================================================================================-->
        <script src="{{ asset('style_login/vendor/select2/select2.min.js') }}"></script>
    <!--===============================================================================================-->
        <script src="{{ asset('style_login/vendor/daterangepicker/moment.min.js') }}"></script>
        <script src="{{ asset('style_login/vendor/daterangepicker/daterangepicker.js') }}"></script>
    <!--===============================================================================================-->
        <script src="{{ asset('style_login/vendor/countdowntime/countdowntime.js') }}"></script>
    <!--===============================================================================================-->
        <script src="{{ asset('style_login/js/main.js') }}"></script>

    @yield('customJS')

</body>
</html>
