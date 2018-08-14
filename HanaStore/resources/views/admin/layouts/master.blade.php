<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <link rel="icon" type="image/png" href="{{asset("img/favicon.ico")}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('page-title')</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>

    {{--CSS form checkbox & radios--}}
    <link href="{{ asset('css/form.css') }}" rel="stylesheet"/>
    {{--Bootstrap core CSS--}}
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet"/>

    {{--Animation library for notifications--}}
    <link href="{{asset('css/animate.min.css')}}" rel="stylesheet"/>

    {{--Light Bootstrap Table core CSS--}}
    <link href=" {{asset("css/light-bootstrap-dashboard.css?v=1.4.0")}}" rel="stylesheet"/>

    {{--CSS for Demo Purpose, don't include it in your project     --}}
    <link href=" {{asset("css/demo.css")}}" rel="stylesheet"/>

    {{--Fonts and icons     --}}
    {{--<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">--}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    {{--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">--}}
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="{{asset("css/pe-icon-7-stroke.css")}}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{asset("css/style.css")}}">

</head>
<body class="">

<div class="wrapper">
    <div class="sidebar" data-image="{{asset("img/bg.jpg")}}">
        {{--Có thể dùng data-color="blue | azure | green | orange | red | purple" --}}
        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="/admin/product" class="simple-text">
                    <img src="{{asset("img/logo.png")}}" style="height: 50px;">
                    {{--<small class="text-muted">{{__('menu.admin')}}</small>--}}
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="/admin/product">
                        <i class="pe-7s-home"></i>
                        <p>{{__('menu.tong.quan')}}</p>
                    </a>
                </li>
                <li class="{{$currentPage=='list-product'?' active':''}}">
                    <a href="/admin/product">
                        <i class="pe-7s-menu"></i>
                        <p>{{__('menu.danh.sach.san.pham')}}</p>
                    </a>
                </li>
                <li class="{{$currentPage=='form-create'?' active':''}}">
                    <a href="/admin/product/create">
                        <i class="pe-7s-plus"></i>
                        <p>{{__('menu.dang.san.pham.moi')}}</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="pe-7s-note2"></i>
                        <p>{{__('menu.don.hang')}}</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="pe-7s-graph"></i>
                        <p>{{__('menu.phan.tich')}}</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="pe-7s-graph3"></i>
                        <p>{{__('menu.doanh.thu')}}</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="pe-7s-note"></i>
                        <p>Article</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="pe-7s-map-marker"></i>
                        <p>Maps</p>
                    </a>
                </li>
                <li class="active-pro">
                    <a href="#" target="_blank">
                        <i class="pe-7s-rocket"></i>
                        <p>{{__('menu.sang.ben.website')}}</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid" style="padding: 8px 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target="#navigation-example-2">
                        <span class="sr-only">{{__('menu.tong.quan')}}</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/admin/product">{{__('menu.danh.sach.san.pham')}}</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-globe"></i>
                                {{--<b class="caret hidden-sm hidden-xs"></b>--}}
                                <span class="notification hidden-sm hidden-xs">6</span>
                                <p class="hidden-lg hidden-md">
                                     {{__('menu.thong.bao')}}
                                    <b class="caret"></b>
                                </p>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Thông báo 1</a></li>
                                <li><a href="#">Thông báo 2</a></li>
                                <li><a href="#">Thông báo 3</a></li>
                                <li><a href="#">Thông báo 4</a></li>
                                <li><a href="#">Thông báo khác</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="">
                                <i class="fa fa-search"></i>
                                <p class="hidden-lg hidden-md">{{__('menu.tim.kiem')}}</p>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#">
                                <p>User Management</p>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <p>
                                    {{__('menu.danh.muc')}}
                                    <b class="caret"></b>
                                </p>
                            </a>
                            <ul class="dropdown-menu">
                                {{--@foreach($categories as $item)--}}
                                    {{--<li class="category-list" id="{{$item-> id}}"><a href="#">{{$item->name}}</a></li>--}}
                                {{--@endforeach--}}
                                <li class="category-list"><a href="#">Category</a></li>
                                <li class="category-list"><a href="#">Category1</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img
                                        src="https://scontent.fhan5-5.fna.fbcdn.net/v/t1.0-9/12106718_434803413381789_4303510610024269186_n.jpg?_nc_cat=0&oh=03951231d9028870451cf034a8051ec9&oe=5BCC0DC1"
                                        alt="" class="avatar-admin">
                                <span>SlowV</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">{{__('menu.thong.tin.tai.khoan')}}</a></li>
                                <li><a href="#">{{__('menu.dang.xuat')}}</a></li>
                            </ul>
                        </li>
                        <li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>

        {{--content--}}
        <div class="content" >
        @section('content')
        @show
        </div>
        {{--end content--}}

        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Company
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Blog
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy;
                    <script>document.write(new Date().getFullYear())</script>
                    <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                </p>
            </div>
        </footer>

        {{--Mess--}}
        <div class="alert alert-success" role="alert" id="messageSuccess" style="border-radius: 5px"></div>
        <div class="alert alert-danger" role="alert" id="messageError" style="border-radius: 5px"></div>
        {{--End Mess--}}

        {{--Modal edit--}}
    <!-- Modal -->
        <div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">{{(__('content.modal.sua.san.pham'))}}</h4>
                    </div>
                    <div class="modal-body">
                        <form action="" name="form-edit">
                            <input type="hidden" name="id-product-edit">
                            <div class="form-group">
                                <label class="control-label">{{__('content.ten')}} :</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="control-label">{{__('content.gia')}} :</label>
                                <input type="text" name="price" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="control-label">{{__('content.anh')}} :</label>
                                <input type="text" name="images" class="form-control">
                                <div id="img-old">

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">{{__('content.trang.thai')}} :</label>
                                <select name="status" class="form-control">
                                    <option value="1">Còn hàng</option>
                                    <option value="2">Hết hàng</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default"
                                data-dismiss="modal">{{__('content.quay.lai')}}</button>
                        <button type="button" class="btn btn-primary"
                                id="btn-update-product">{{__('content.cap.nhat')}}</button>
                    </div>
                </div>
            </div>
        </div>
        {{--End modal edit--}}
    </div>
</div>

</body>

{{--Core JS Files--}}
<script src="{{asset("js/jquery.3.2.1.min.js")}}" type="text/javascript"></script>
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
<script src="{{asset('js/index.js')}}"></script>
</html>


