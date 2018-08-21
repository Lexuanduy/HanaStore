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

    {{--Bootstrap core CSS--}}
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet"/>

    {{--Animation library for notifications--}}
    <link href="{{asset('css/animate.min.css')}}" rel="stylesheet"/>

    {{--Light Bootstrap Table core CSS--}}
    <link href=" {{asset("css/light-bootstrap-dashboard.css?v=1.4.0")}}" rel="stylesheet"/>

    {{--CSS for Demo Purpose, don't include it in your project     --}}
    <link href=" {{asset("css/demo.css")}}" rel="stylesheet"/>

    {{--Fonts and icons     --}}
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="{{asset("css/pe-icon-7-stroke.css")}}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{asset("css/style.css")}}">

</head>
<body class="">

<div class="wrapper">
    <div class="sidebar" data-image="{{asset("img/bg-menu.jpg")}}">
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
                        <p>Trang chủ</p>
                    </a>
                </li>
                <li class="{{$currentPage=='list-product'?' active':''}}">
                    <a href="/admin/product">
                        <i class="pe-7s-menu"></i>
                        <p>Danh sách sản phẩm</p>
                    </a>
                </li>
                <li class="{{$currentPage=='form-create'?' active':''}}">
                    <a href="/admin/product/create">
                        <i class="pe-7s-plus"></i>
                        <p>Đăng sản phẩm</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="pe-7s-note2"></i>
                        <p>Đơn hàng</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="pe-7s-graph"></i>
                        <p>Phân tích</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="pe-7s-graph3"></i>
                        <p>Doanh thu</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="pe-7s-note"></i>
                        <p>Bài viết</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="pe-7s-trash"></i>
                        <p>Thùng rác</p>
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
                        <span class="sr-only">Trang chủ</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">@yield('title-content')</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-globe"></i>
                                {{--<b class="caret hidden-sm hidden-xs"></b>--}}
                                <span class="notification hidden-sm hidden-xs">6</span>
                                <p class="hidden-lg hidden-md">
                                    Thông báo
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
                                <p class="hidden-lg hidden-md">Tìm kiếm</p>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#">
                                <p>Quản lý khách hàng</p>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <p>
                                    Danh mục
                                    <b class="caret"></b>
                                </p>
                            </a>
                            <ul class="dropdown-menu">
                                @foreach($categories as $item)
                                    <li class="category-list" id="{{$item-> id}}"><a href="#">{{$item->name}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <p>
                                    Bộ sưu tập
                                    <b class="caret"></b>
                                </p>
                            </a>
                            <ul class="dropdown-menu">
                                @foreach($collections as $item)
                                    <li class="collection-list" id="{{$item-> id}}"><a href="#">{{$item->name}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img
                                        src='{{asset('img/faces/'.Auth::user()->avatar)}}'
                                        alt="" class="avatar-admin">
                                <span>{{Auth::user()->name}}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Thông tin tài khoản</a></li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                        Đăng xuất
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                        <li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>

        {{--content--}}
        <div class="content">
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
                    <a href="http://localhost:8000/admin/product">Hana Store</a>, sắc màu cuộc sống.
                </p>
            </div>
        </footer>

        {{--Mess--}}
        <div class="alert alert-success" role="alert" id="messageSuccess" style="border-radius: 5px"></div>
        <div class="alert alert-danger" role="alert" id="messageError" style="border-radius: 5px"></div>
        @if(Session::has('update_success'))
            <div class="alert alert-{{Session::get('level_update')}}" role="alert" id="messageUpdateSuccess" style="border-radius: 5px">
                {{Session::get('update_success')}}
            </div>
        @endif
        @if(Session::has('product_success'))
            <div class="alert alert-{{Session::get('level_product')}}" role="alert" id="messageProductSuccess" style="border-radius: 5px">
                {{Session::get('product_success')}}
            </div>
        @endif
        @if(Session::has('delete_success'))
            <div class="alert alert-{{Session::get('level_delete')}}" role="alert" id="messageDeleteSuccess" style="border-radius: 5px">
                {{Session::get('delete_success')}}
            </div>
        @endif
        {{--End Mess--}}

        {{--Modal edit--}}
    <!-- Modal -->
        <div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Sửa sản phẩm</h4>
                    </div>
                    <div class="modal-body">
                        <form action="" name="form-edit" method="post" enctype="multipart/form-data" id="form-edit">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id-product-edit">
                            <div class="row has-warning">
                                <div class="form-group col-xs-6">
                                    <label class="control-label">Tên</label>
                                    <input type="text" name="name-edit" class="form-control">
                                </div>
                                <div class="form-group col-xs-6">
                                    <label class="control-label">Giá</label>
                                    <input type="text" name="price-edit" class="form-control">
                                </div>
                            </div>

                            <div class="row has-warning">
                                <div class="form-group col-xs-6">
                                    <label class="control-label">Danh mục</label>
                                    <select name="categoryId-edit" id="categoryId" class="form-control">
                                        @foreach($categories as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-xs-6">
                                    <label class="control-label">Bộ sưu tập</label>
                                    <select name="collectionId-edit" id="collectionId" class="form-control">
                                        @foreach($collections as $item)
                                            <option value="{{$item->id}}" class="form-control">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row has-warning">
                                <div class="form-group col-xs-6">
                                    <label class="control-label">Thông tin</label>
                                    <input type="text" name="description-edit" value="" class="form-control">
                                </div>
                                <div class="form-group col-xs-3">
                                    <label class="control-label">Trang thái</label>
                                    <select name="status-edit" class="form-control">
                                        <option value="1">Còn hàng</option>
                                        <option value="2">Hết hàng</option>
                                    </select>
                                </div>
                                <div class="form-group col-xs-3">
                                    <label class="control-label">Hàng mới</label>
                                    <select name="new-edit" id="product-new" class="form-control">
                                        <option value="1">Mới đăng</option>
                                        <option value="0">Đã đăng lâu</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row has-warning">
                                <div class="form-group col-xs-6">
                                    <label class="control-label">Giá khuyến mãi</label>
                                    <input type="text" name="sale-edit" value="" class="form-control">
                                </div>

                                <div class="form-group col-xs-6">
                                    <label class="control-label" style="display: block">Ảnh</label>
                                    {{--<input type="text" name="images" class="form-control">--}}
                                    <span class="btn btn-default btn-file">
                                        <i class="pe-7s-upload"></i> Choose...<input type="file" name="images-edit" directory multiple>
                                    </span>
                                    <span class="filename text-muted small" id="file-name">Nothing selected...</span>

                                </div>
                            </div>
                            <div class="row has-warning">
                                <div class="form-group col-xs-6">
                                    <label class="control-label">Chi tiết</label>
                                    <textarea name="detail-edit" id="" cols="30" rows="7" class="form-control">

                                    </textarea>
                                </div>
                                <div class="form-group col-xs-6">
                                    <label class="control-label"></label>
                                    <img src="" id="review-image" class="thumbnail hidden "
                                         style="height: 120px; margin-top: 10px;">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default"
                                data-dismiss="modal" style="width: 100px">Quay lại</button>
                        <button type="submit" class="btn btn-primary"
                                id="btn-update-product" style="width: 100px">Cập nhật</button>
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


