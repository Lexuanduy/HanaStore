<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('page-title')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{asset("img/favicon.ico")}}"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/bootstrap/css/bootstrap.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('fonts/themify/themify-icons.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('fonts/elegant-font/html-css/style.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/animate/animate.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/css-hamburgers/hamburgers.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/animsition/css/animsition.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/select2/select2.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/daterangepicker/daterangepicker.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/slick/slick.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/lightbox2/css/lightbox.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/user-cart.css')}}">
    <!--===============================================================================================-->
</head>
<body class="animsition">

<!-- Header -->
<header class="header1">
    @include('user.flower.header')
</header>

<!--Content-->
@section('content')
@show

<!-- Footer -->
<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
    @include('user.flower.footer')
</footer>


<!-- Back to top -->
<div class="btn-back-to-top bg0-hov" id="myBtn">
    <span class="symbol-btn-back-to-top">
        <i class="fa fa-angle-double-up" aria-hidden="true"></i>
    </span>
</div>

@if(Session::has('delete'))
    <div class="alert alert-success " role="alert" id="messageDeleteCart" style="border-radius: 5px">
        {{Session::get('delete')}}
    </div>
@endif
@yield('selection')

@yield('javascript')

</body>
</html>
