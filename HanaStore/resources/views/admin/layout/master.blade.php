<!doctype html>
<html lang="en">


<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 21:29:18 GMT -->
<head>
    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png"/>
    <link rel="icon" type="image/png" href="{{ asset('img/hanastore.png') }}"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>@yield('page-title')</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap core CSS     -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet"/>
    <!--  Material Dashboard CSS    -->
    <link href="/assets/css/material-dashboard.css" rel="stylesheet"/>
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="/assets/css/demo.css" rel="stylesheet"/>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"
          integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link href="/assets/css/google-roboto-300-700.css" rel="stylesheet"/>
    <script src="/assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
    <!-- Jquery preview image upload-->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>

<body>
<div class="wrapper">
    <div class="sidebar" data-active-color="rose" data-background-color="black" data-image="/assets/img/side.jpg">
        <!--
    Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
    Tip 2: you can also add an image using data-image tag
    Tip 3: you can change the color of the sidebar with data-background-color="white | black"
-->
        <div class="logo">
            <a href="/admin" class="simple-text">
                Hana Store
            </a>
        </div>
        <div class="logo logo-mini">
            <a href="" class="simple-text">
                Hana Store
            </a>
        </div>
        <div class="sidebar-wrapper">
            <div class="user">
                <div class="photo">
                    <img src="/assets/img/faces/avatar.jpg"/>
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                        Admin
                        <b class="caret"></b>
                    </a>
                    <div class="collapse" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="#">Informations</a>
                            </li>
                            <li>
                                <a href="#">Edit</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!--dashboard-->
            <ul class="nav">
                <li>
                    <a href="">
                        <i class="material-icons">dashboard</i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!--Product-->
                <li class="{{ $current_menu == 'product_manager' ? 'active' : '' }}">
                    <a data-toggle="collapse" href="#pagesExamples">
                        <i class="material-icons">image</i>
                        <p>Products Management
                            <b class="caret"></b>
                        </p>
                    </a>
                    @if($current_menu == 'product_manager')
                        <div class="collapse in" id="pagesExamples">
                            <ul class="nav">
                                @if($current_menu == 'product_manager' && $current_sub_menu == 'edit')
                                    <li class="active">
                                        <a href="{{ url()->current() }}">Edit Info</a>
                                    </li>
                                @endif
                                <li class="{{ ($current_menu == 'product_manager' && $current_sub_menu == 'create_new') ? 'active' : ''}}">
                                    <a href="/admin/product/create">Create New Flower</a>
                                </li>
                                <li class="{{ ($current_menu == 'product_manager' && $current_sub_menu == 'list_item') ? 'active' : ''}}">
                                    <a href="/admin/product">List Flower</a>
                                </li>
                            </ul>
                        </div>
                    @else
                        <div class="collapse" id="pagesExamples">
                            <ul class="nav">
                                @if($current_menu == 'product_manager' && $current_sub_menu == 'edit')
                                    <li class="active">
                                        <a href="{{ url()->current() }}">Edit Info</a>
                                    </li>
                                @endif
                                <li class="{{ ($current_menu == 'product_manager' && $current_sub_menu == 'create_new') ? 'active' : ''}}">
                                    <a href="/admin/product/create">Create New Flower</a>
                                </li>
                                <li class="{{ ($current_menu == 'product_manager' && $current_sub_menu == 'list_item') ? 'active' : ''}}">
                                    <a href="/admin/product">List Flower</a>
                                </li>
                            </ul>
                        </div>
                    @endif
                </li>

                <!--Category-->
                <li class="{{ $current_menu == 'category_manager' ? 'active' : '' }}">
                    <a data-toggle="collapse" href="#componentsExamples">
                        <i class="material-icons">apps</i>
                        <p>Category
                            <b class="caret"></b>
                        </p>
                    </a>
                    @if($current_menu == 'category_manager')
                        <div class="collapse in" id="componentsExamples">
                            <ul class="nav">
                                @if($current_menu == 'category_manager' && $current_sub_menu == 'edit')
                                    <li class="active">
                                        <a href="{{ url()->current() }}">Edit Info</a>
                                    </li>
                                @endif
                                <li class="{{ ($current_menu == 'category_manager' && $current_sub_menu == 'create_new') ? 'active' : ''}}">
                                    <a href="/admin/category/create">Create New Category</a>
                                </li>
                                <li class="{{ ($current_menu == 'category_manager' && $current_sub_menu == 'list_item') ? 'active' : ''}}">
                                    <a href="/admin/category">List Category</a>
                                </li>
                            </ul>
                        </div>
                    @else
                        <div class="collapse" id="componentsExamples">
                            <ul class="nav">
                                @if($current_menu == 'category_manager' && $current_sub_menu == 'edit')
                                    <li class="active">
                                        <a href="{{ url()->current() }}">Edit Info</a>
                                    </li>
                                @endif
                                <li class="{{ ($current_menu == 'category_manager' && $current_sub_menu == 'create_new') ? 'active' : ''}}">
                                    <a href="/admin/category/create">Create New Category</a>
                                </li>
                                <li class="{{ ($current_menu == 'category_manager' && $current_sub_menu == 'list_item') ? 'active' : ''}}">
                                    <a href="/admin/category">List Category</a>
                                </li>
                            </ul>
                        </div>
                    @endif
                </li>

                <!--Collection-->
                <li class="{{ $current_menu == 'collection_manager' ? 'active' : '' }}">
                    <a data-toggle="collapse" href="#formsExamples">
                        <i class="material-icons">apps</i>
                        <p>Collection
                            <b class="caret"></b>
                        </p>
                    </a>
                    @if($current_menu == 'collection_manager')
                        <div class="collapse in" id="formsExamples">
                            <ul class="nav">
                                @if($current_menu == 'collection_manager' && $current_sub_menu == 'edit')
                                    <li class="active">
                                        <a href="{{ url()->current() }}">Edit Info</a>
                                    </li>
                                @endif
                                <li class="{{ ($current_menu == 'collection_manager' && $current_sub_menu == 'create_new') ? 'active' : ''}}">
                                    <a href="/admin/collection/create">Create New Collection</a>
                                </li>
                                <li class="{{ ($current_menu == 'collection_manager' && $current_sub_menu == 'list_item') ? 'active' : ''}}">
                                    <a href="/admin/collection">List Collection</a>
                                </li>
                            </ul>
                        </div>
                    @else
                        <div class="collapse" id="formsExamples">
                            <ul class="nav">
                                @if($current_menu == 'collection_manager' && $current_sub_menu == 'edit')
                                    <li class="active">
                                        <a href="{{ url()->current() }}">Edit Info</a>
                                    </li>
                                @endif
                                <li class="{{ ($current_menu == 'collection_manager' && $current_sub_menu == 'create_new') ? 'active' : ''}}">
                                    <a href="/admin/collection/create">Create New Collection</a>
                                </li>
                                <li class="{{ ($current_menu == 'collection_manager' && $current_sub_menu == 'list_item') ? 'active' : ''}}">
                                    <a href="/admin/collection">List Collection</a>
                                </li>
                            </ul>
                        </div>
                    @endif
                </li>

                <!--Order-->
                <li>
                    <a data-toggle="collapse" href="#">
                        <i class="fab fa-first-order pb-4"></i>
                        <p>Order</p>
                    </a>
                </li>

                <!--Chart-->
                <li>
                    <a data-toggle="collapse" href="#">
                        <i class="fas fa-chart-line"></i>
                        <p>Chart</p>
                    </a>
                </li>

                <!--Revenue-->
                <li>
                    <a data-toggle="collapse" href="#">
                        <i class="fas fa-chart-bar"></i>
                        <p>Revenue</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-panel">
        <nav class="navbar navbar-transparent navbar-absolute">
            <div class="container-fluid">
                <div class="navbar-minimize">
                    <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                        <i class="material-icons visible-on-sidebar-regular">more_vert</i>
                        <i class="material-icons visible-on-sidebar-mini">view_list</i>
                    </button>
                </div>
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"> Dashboard </a>
                </div>
                <div class="collapse navbar-collapse">
                    <form class="navbar-form navbar-right" role="search">
                        <div class="form-group form-search is-empty">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="material-input"></span>
                        </div>
                        <button type="submit" class="btn btn-white btn-round btn-just-icon">
                            <i class="material-icons">search</i>
                            <div class="ripple-container"></div>
                        </button>
                    </form>
                </div>
            </div>
        </nav>
        <div class="content" style="background-color: white">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
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
                                Store
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Articles
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>
                    <a href="http://www.creative-tim.com/">Flower for happiness</a>, made with love for a better web
                </p>
            </div>
        </footer>
    </div>
</div>

</body>
<!--   Core JS Files   -->
<script src="/assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="/assets/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="/assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/assets/js/material.min.js" type="text/javascript"></script>
<script src="/assets/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="/assets/js/jquery.validate.min.js"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="/assets/js/moment.min.js"></script>
<!--  Charts Plugin -->
<script src="/assets/js/chartist.min.js"></script>
<!--  Plugin for the Wizard -->
<script src="/assets/js/jquery.bootstrap-wizard.js"></script>
<!--  Notifications Plugin    -->
<script src="/assets/js/bootstrap-notify.js"></script>
<!--   Sharrre Library    -->
<script src="/assets/js/jquery.sharrre.js"></script>
<!-- DateTimePicker Plugin -->
<script src="/assets/js/bootstrap-datetimepicker.js"></script>
<!-- Vector Map plugin -->
<script src="/assets/js/jquery-jvectormap.js"></script>
<!-- Sliders Plugin -->
<script src="/assets/js/nouislider.min.js"></script>
<!--  Google Maps Plugin    -->
<!--<script src="/assets/js/jquery.select-bootstrap.js"></script>-->
<!-- Select Plugin -->
<script src="/assets/js/jquery.select-bootstrap.js"></script>
<!--  DataTables.net Plugin    -->
<script src="/assets/js/jquery.datatables.js"></script>
<!-- Sweet Alert 2 plugin -->
<script src="/assets/js/sweetalert2.js"></script>
<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="/assets/js/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin    -->
<script src="/assets/js/fullcalendar.min.js"></script>
<!-- TagsInput Plugin -->
<script src="/assets/js/jquery.tagsinput.js"></script>
<!-- Material Dashboard javascript methods -->
<script src="/assets/js/material-dashboard.js"></script>
<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 21:32:16 GMT -->
</html>
