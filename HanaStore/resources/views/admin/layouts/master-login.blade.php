<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('page-title')</title>
    <link rel="icon" type="image/png" href="{{asset("img/favicon.ico")}}">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet"/>

    {{--Animation library for notifications--}}
    <link href="{{asset('css/animate.min.css')}}" rel="stylesheet"/>

    {{--Light Bootstrap Table core CSS--}}
    <link href=" {{asset('css/light-bootstrap-dashboard.css?v=1.4.0')}}" rel="stylesheet"/>

    {{--CSS for Demo Purpose, don't include it in your project     --}}
    <link href=" {{asset('css/demo.css')}}" rel="stylesheet"/>
    {{--Fonts and icons     --}}
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link href="{{asset('css/pe-icon-7-stroke.css')}}" rel="stylesheet"/>

    {{--My css--}}
    <link rel="stylesheet" href="{{asset('css/login-register.css')}}">
</head>
<body>
<div class="container-fluid">
    <div class="content">
        @section('content')
        @show
    </div>
</div>

{{--Core JS Files--}}
<script src="{{asset("js/jquery.3.2.1.min.js")}}" type="text/javascript"></script>
<script src="{{asset('js/jquery.validate.js')}}}"></script>
<script src="{{asset("js/bootstrap.min.js")}}" type="text/javascript"></script>

{{--Charts Plugin--}}
<script src="{{asset("js/chartist.min.js")}}"></script>

{{--Notifications Plugin--}}
<script src="{{asset("js/bootstrap-notify.js")}}"></script>

{{--Google Maps Plugin--}}
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

{{--Light Bootstrap Table Core javascript and methods for Demo purpose--}}
<script src="{{asset("js/light-bootstrap-dashboard.js?v=1.4.0")}}"></script>

{{--Light Bootstrap Table DEMO methods, don't include it in your project! --}}
<script src="{{asset("js/demo.js")}}"></script>

{{--My javascript--}}
<script src="{{asset("js/login-register.js")}}"></script>
</body>
</html>