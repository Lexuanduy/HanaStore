<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('page-title')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{asset("img/favicon.ico")}}"/>
    <!--===============================================================================================-->
    @yield('css')
    <!--===============================================================================================-->
</head>
<body class="animsition style4">

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

@yield('selection')

@yield('javascript')

</body>
</html>
