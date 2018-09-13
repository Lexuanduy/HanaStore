<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="{{ asset('img/hanastore.png') }}"/>
    <title>@yield('page-title')</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" media="all"/>
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <!-- Bootstrap core Css -->
    <!-- Common Css -->
    <link href="{{ asset('css/my-style.css') }}" rel="stylesheet" type="text/css" media="all" />
    <!--// Common Css -->
    <!-- Nav Css -->
    <link rel="stylesheet" href="{{ asset('css/style4.css') }}">
    <!--// Nav Css -->
    <!-- Fontawesome Css -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
          integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!--// Fontawesome Css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main-table.css') }}">

    <!--web-fonts-->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    <!--//web-fonts-->

    <!--CSS Date range picker-->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <!--CSS Date range picker-->

    <!-- Jquery preview image upload-->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Sweet Alert 2 plugin -->
    <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
    <!-- Sweet Alert 2 plugin -->
</head>
<script>
    // Wait for window load
    $(window).load(function () {
        // Animate loader off screen
        $(".se-pre-con").fadeOut("slow");
    });
</script>
<body>
    <div class="se-pre-con"></div>
    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h1>
                    <a href="/admin">Hanastore</a>
                </h1>
                <span>H</span>
            </div>
            <div class="profile-bg"></div>
            <ul class="list-unstyled components">
                <li class="{{ $current_menu == 'Home' ? 'active' : '' }}">
                    <a href="/admin">
                        <i class="fas fa-th"></i>
                        Dashboard
                    </a>
                </li>

                <!-- Products Menu-->
                <li class="{{ $current_menu == 'product_manager' ? 'active' : '' }}">
                    <a href="#sub-product" data-toggle="collapse" aria-expanded="false">
                        <i class="fab fa-product-hunt"></i>
                        Products Management
                        <i class="fas fa-angle-down fa-pull-right"></i>
                    </a>
                    @if($current_menu == 'product_manager')
                        <ul class="collapse in list-unstyled" id="sub-product">
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
                    @else
                        <ul class="collapse list-unstyled" id="sub-product">
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
                    @endif
                </li>
                <!-- Products Menu-->

                <!-- Categories Menu-->
                <li class="{{ $current_menu == 'category_manager' ? 'active' : '' }}">
                    <a href="#sub-category" data-toggle="collapse" aria-expanded="false">
                        <i class="fas fa-folder-minus"></i>
                        Categories
                        <i class="fas fa-angle-down fa-pull-right"></i>
                    </a>
                    @if($current_menu == 'category_manager')
                        <ul class="collapse in list-unstyled" id="sub-category">
                            @if($current_menu == 'category_manager' && $current_sub_menu == 'edit')
                                <li class="active">
                                    <a href="{{ url()->current() }}">Edit Info</a>
                                </li>
                            @endif
                            <li class="{{ ($current_menu == 'category_manager' && $current_sub_menu == 'create_new') ? 'active' : ''}}">
                                <a href="/admin/category/create">Create New Category</a>
                            </li>
                            <li class="{{ ($current_menu == 'category_manager' && $current_sub_menu == 'list_item') ? 'active' : ''}}">
                                <a href="/admin/category">List Categories</a>
                            </li>
                        </ul>
                    @else
                        <ul class="collapse list-unstyled" id="sub-category">
                            @if($current_menu == 'category_manager' && $current_sub_menu == 'edit')
                                <li class="active">
                                    <a href="{{ url()->current() }}">Edit Info</a>
                                </li>
                            @endif
                            <li class="{{ ($current_menu == 'category_manager' && $current_sub_menu == 'create_new') ? 'active' : ''}}">
                                <a href="/admin/category/create">Create New Category</a>
                            </li>
                            <li class="{{ ($current_menu == 'category_manager' && $current_sub_menu == 'list_item') ? 'active' : ''}}">
                                <a href="/admin/category">List Categories</a>
                            </li>
                        </ul>
                    @endif
                </li>
                <!-- Categories Menu-->

                <!-- Collections Menu-->
                <li class="{{ $current_menu == 'collection_manager' ? 'active' : '' }}">
                    <a href="#sub-collection" data-toggle="collapse" aria-expanded="false">
                        <i class="far fa-list-alt"></i>
                        Collections
                        <i class="fas fa-angle-down fa-pull-right"></i>
                    </a>
                    @if($current_menu == 'collection_manager')
                        <ul class="collapse in list-unstyled" id="sub-collection">
                            @if($current_menu == 'collection_manager' && $current_sub_menu == 'edit')
                                <li class="active">
                                    <a href="{{ url()->current() }}">Edit Info</a>
                                </li>
                            @endif
                            <li class="{{ ($current_menu == 'collection_manager' && $current_sub_menu == 'create_new') ? 'active' : ''}}">
                                <a href="/admin/collection/create">Create New Collection</a>
                            </li>
                            <li class="{{ ($current_menu == 'collection_manager' && $current_sub_menu == 'list_item') ? 'active' : ''}}">
                                <a href="/admin/collection">List Collections</a>
                            </li>
                        </ul>
                    @else
                        <ul class="collapse list-unstyled" id="sub-collection">
                            @if($current_menu == 'collection_manager' && $current_sub_menu == 'edit')
                                <li class="active">
                                    <a href="{{ url()->current() }}">Edit Info</a>
                                </li>
                            @endif
                            <li class="{{ ($current_menu == 'collection_manager' && $current_sub_menu == 'create_new') ? 'active' : ''}}">
                                <a href="/admin/collection/create">Create New Collection</a>
                            </li>
                            <li class="{{ ($current_menu == 'collection_manager' && $current_sub_menu == 'list_item') ? 'active' : ''}}">
                                <a href="/admin/collection">List Collections</a>
                            </li>
                        </ul>
                    @endif
                </li>
                <!-- Collections Menu-->

                <!-- Orders Menu-->
                <li class="{{ $current_menu == 'order_manager' ? 'active' : '' }}">
                    <a href="#sub-order" data-toggle="collapse" aria-expanded="false">
                        <i class="fas fa-clipboard-list"></i>
                        Orders
                        <i class="fas fa-angle-down fa-pull-right"></i>
                    </a>
                    @if($current_menu == 'order_manager')
                        <ul class="collapse in list-unstyled" id="sub-order">
                            <li class="{{ ($current_menu == 'order_manager' && $current_sub_menu == 'list_item') ? 'active' : ''}}">
                                <a href="/admin/order">List Orders</a>
                            </li>
                        </ul>
                    @else
                        <ul class="collapse list-unstyled" id="sub-order">
                            <li class="{{ ($current_menu == 'order_manager' && $current_sub_menu == 'list_item') ? 'active' : ''}}">
                                <a href="/admin/order">List Orders</a>
                            </li>
                        </ul>
                    @endif
                </li>
                <!-- Orders Menu-->

                <!--Revenue-->
                <li class="{{ $current_menu == 'chart_manager' ? 'active' : '' }}">
                    <a href="/admin/chart">
                        <i class="fas fa-chart-line"></i>
                        Revenue
                    </a>
                </li>
                <!--Revenue-->
            </ul>
        </nav>

        <!-- Page Content Holder -->
        <div id="content">
            <!-- top-bar -->
            <nav class="navbar mb-xl-5 mb-4">
                <div class="container-fluid">

                    <div class="navbar-header">
                        <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>
                    <!-- Search-from -->
                    <form action="#" method="post" class="form-inline mx-auto search-form">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" required="">
                        <button class="btn btn-style my-2 my-sm-0" type="submit">Search</button>
                    </form>
                    <!--// Search-from -->

                    <div class="nav-item mx-3">
                        <a href="/hanastore/home" class="btn btn-outline-info" target="_blank">Visit website</a>
                    </div>

                    <!--Admin profile-->
                    <ul class="top-icons-agileits-w3layouts float-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true"
                               aria-expanded="false">
                                <i class="far fa-user"></i>
                            </a>
                            <div class="dropdown-menu drop-3">
                                <div class="profile d-flex mr-o">
                                    <div class="profile-l align-self-center">
                                        <img src="{{ asset('img/hanastore.png') }}" class="img-fluid mb-3" alt="Responsive image">
                                    </div>
                                    <div class="profile-r align-self-center">
                                        <h3 class="sub-title-w3-agileits">Super Admin</h3>
                                        <a href="mailto:info@example.com">hanastore.dev@gmail.com</a>
                                    </div>
                                </div>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <!--// top-bar -->

            <div class="container-fluid">
                @yield('content')
            </div>

            <!-- Copyright -->
            <footer class="copyright-w3layouts py-xl-3 py-2 mt-xl-5 mt-4 mb-1 text-center">
                <p>© 2018 Hanastore . All Rights Reserved | Customize by
                    <a href="/admin"> Hana Team </a>
                </p>
            </footer>
            <!--// Copyright -->
        </div>
    </div>


    <!-- Required common Js -->
    <script src='{{ asset('js/jquery-2.2.3.min.js') }}'></script>
    <!-- //Required common Js -->

    <!-- loading-gif Js -->
    <script src="{{ asset('js/modernizr.js') }}"></script>
    <!--// loading-gif Js -->

    <!-- Sidebar-nav Js -->
    <script>
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
    <!--// Sidebar-nav Js -->

    <!-- profile-widget-dropdown js-->
    <script src="{{ asset('js/script.js') }}"></script>
    <!--// profile-widget-dropdown js-->

    <!-- dropdown nav -->
    <script>
        $(document).ready(function () {
            $(".dropdown").hover(
                function () {
                    $('.dropdown-menu', this).stop(true, true).slideDown("fast");
                    $(this).toggleClass('open');
                },
                function () {
                    $('.dropdown-menu', this).stop(true, true).slideUp("fast");
                    $(this).toggleClass('open');
                }
            );
        });
    </script>
    <!-- //dropdown nav -->

    <!-- Js for bootstrap working-->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- //Js for bootstrap working -->

    <!--JS date range picker-->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <!--JS date range picker-->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

</body>
</html>
