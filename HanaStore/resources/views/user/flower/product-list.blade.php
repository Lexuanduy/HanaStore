@extends('user.layouts.master')

@section('page-title', 'Danh sách sản phẩm - Hana Store')

@section('css')
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
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/noui/nouislider.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
    <style>
        .img-fly{
            position: absolute;
            z-index: 9999;
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 100%;
            border: 1.5px solid rgba(255, 191, 182, 0.78);
            transition: all 1s ease;
            animation: MyAnimation 1.5s;
        }

        @keyframes MyAnimation {
            0%   {transform: scale(0.4)}
            25%  {transform: scale(1)}
            75%  {transform: scale(1)}
            100% {transform: scale(0.4)}
        }
        .disable-scoll{
            overflow: hidden;
        }
    </style>
    <!--===============================================================================================-->
@endsection

@section('content')
    <!-- Title Page -->
    <section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url('{{asset('img/bg-list.jpg')}}');">
        <h2 class="l-text2 t-center">
            Hana Store
        </h2>
        <p class="m-text13 t-center">
            Danh sách sản phẩm mới nhất năm 2018
        </p>
    </section>


    <!-- Content page -->
    <section class="bgwhite p-t-55 p-b-65">
        <input type="hidden" value="{{route('listProductClient')}}" id="routeListProduct">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
                    <div class="leftbar p-r-20 p-r-0-sm">
                        <!--  -->
                        <h4 class="m-text14 p-b-7">
                            Danh mục
                        </h4>

                        <ul class="p-b-54">
                            <li class="p-t-4">
                                <a href="{{url()->current().'?categoryId=0'}}" class="s-text13{{$selected_categoryId==0?' active1':''}}">
                                    Tất cả
                                </a>
                            </li>
                            @foreach($categories as $item)
                                <li class="p-t-4">
                                    <a href="{{url()->current().'?categoryId='.$item->id}}" class="s-text13{{$selected_categoryId==$item->id?' active1':''}}">
                                        {{$item->name}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                        <h4 class="m-text14 p-b-7">
                            Bộ sưu tập
                        </h4>

                        <ul class="p-b-54">
                            <li class="p-t-4">
                                <a href="{{url()->current().'?collectionId=0'}}" class="s-text13{{$selected_collectionId==0?' active1':''}}">
                                    Tất cả
                                </a>
                            </li>
                            @foreach($collections as $item)
                                <li class="p-t-4">
                                    <a href="{{url()->current().'?collectionId='.$item->id}}" class="s-text13{{$selected_collectionId==$item->id?' active1':''}}">
                                        {{$item->name}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                        <div class="search-product pos-relative bo4 of-hidden">
                            <input class="s-text7 size6 p-l-23 p-r-50" type="text" name="search-product" placeholder="Tìm kiếm sản phẩm. . ." id="srearch-product">

                            <button class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4">
                                <a href="#"><i class="fs-12 fa fa-search" aria-hidden="true"></i></a>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
                    <!--  -->
                    <div class="flex-sb-m flex-w p-b-35">
                        <div class="flex-w">
                            <div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
                                <select class="selection-2" name="filter-price">
                                    <option value="0">Giá</option>
                                    <option value="1">0 - 50.000</option>
                                    <option value="2">50.000 - 100.000</option>
                                    <option value="3">100.000 - 150.000</option>
                                    <option value="4">150.000 - 200.000</option>
                                    <option value="5">200.000+</option>
                                </select>
                            </div>
                        </div>
                        <span class="s-text8 p-t-5 p-b-5">
                            {{$selected_categoryId!=0?'Danh mục "'.$selected_category->name . '"':''}}
                            {{$selected_collectionId!=0?'Bộ sư tập "'.$selected_collection->name.'"':''}}
                        </span>
                    </div>
                    <div style="display: none">
                        <form action="/user/list" method="GET" id="form-filter" enctype="multipart/form-data">
                            @csrf
                            <input type="number" name="startPrice" id="startPrice">
                            <input type="number" name="endPrice" id="endPrice">
                        </form>
                    </div>
                    <!-- Product -->
                    <div class="row">
                        @foreach($products as $item)
                            <div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
                                <!-- Block2 -->
                                <div class="block2">
                                    <div class="block2-img wrap-pic-w img-product-home of-hidden pos-relative{{$item->sale != 0 && $item->new != 1?' block2-labelsale':''}}{{$item->new == 1 && $item->sale == 0? ' block2-labelnew':''}}{{$item->sale != 0 && $item->new == 1 ? ' block2-labelsaleandnew' : ''}}">
                                        <img src="{{$item->images}}" alt="IMG-PRODUCT" style="height: 350px;object-fit: cover;">
                                        <div class="block2-overlay trans-0-4">
                                            <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
                                                <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                                                <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                                            </a>

                                            <div class="block2-btn-addcart w-size1 trans-0-4 add-to-cart" id="add-cart-{{$item->id}}">
                                                <!-- Button -->
                                                <button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                                    Thêm vào giỏ
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="block2-txt p-t-20">
                                        <a href="/user/product/{{$item->id}}" class="block2-name dis-block s-text3 p-b-5">
                                            {{$item->name}}
                                        </a>
                                        @if($item->sale == 0)
                                            <span class="block2-price m-text6 p-r-5">
                                        {{number_format($item->price,0,',','.')}} (VND)
                                    </span>
                                        @else
                                            <span class="block2-price m-text6 p-r-5 text-decoration">
                                        {{number_format($item->price,0,',','.')}} (VND)
                                    </span>
                                            <span class="block2-sale m-text6 p-r-5" style="color: #F8A300">
                                        {{$item->discountPriceString}}
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="row">
                        <div class="col-md-12 mt-5 parent-paginate">
                            {{$products->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('selection')
    <!-- Container Selection -->
    <div id="dropDownSelect1"></div>
    <div id="dropDownSelect2"></div>
@endsection

@section('javascript')
    <!--===============================================================================================-->
    <script type="text/javascript" src="{{asset('vendor/jquery/jquery-3.2.1.min.js')}}"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="{{asset('vendor/animsition/js/animsition.min.js')}}"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="{{asset('vendor/bootstrap/js/popper.js')}}"></script>
    <script type="text/javascript" src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="{{asset('vendor/select2/select2.min.js')}}"></script>
    <script type="text/javascript">
        $(".selection-1").select2({
            minimumResultsForSearch: 20,
            dropdownParent: $('#dropDownSelect1')
        });

        $(".selection-2").select2({
            minimumResultsForSearch: 20,
            dropdownParent: $('#dropDownSelect2')
        });
    </script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="{{asset('vendor/daterangepicker/moment.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('vendor/daterangepicker/daterangepicker.js')}}"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="{{asset('vendor/slick/slick.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/slick-custom.js')}}"></script>
    <script type="text/javascript" src="{{asset('vendor/countdowntime/countdowntime.js')}}"></script>
    <script type="text/javascript" src="{{asset('vendor/slick/slick.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/slick-custom.js')}}"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="{{asset('vendor/lightbox2/js/lightbox.min.js')}}"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="{{asset('vendor/sweetalert/sweetalert.min.js')}}"></script>
    <script type="text/javascript">
        // $('.block2-btn-addcart').each(function(){
        //     var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
        //     $(this).on('click', function(){
        //         swal(nameProduct, "Thêm vào giỏ hàng thành công!", "success");
        //     });
        // });

        $('.block2-btn-addwishlist').each(function(){
            var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
            $(this).on('click', function(){
                swal(nameProduct, "Chức năng đang phát triển (^.^)", "success");
            });
        });
        $('#srearch-product').focus(function () {
            $(this).keypress(function (event) {
                if (event.keyCode == 13) {
                    alert('En tở đc rồi!');
                }
            });
        });

        $('select[name="filter-price"]').change(function () {
            var url =$('#routeListProduct').val();
            switch ($(this).val()){
                case '0':
                    window.location.href = url;
                case '1':
                    $.ajax({
                        method: 'GET',
                        url: url,
                        data: {
                            '_token': $('meta[name="csrf-token"]').attr('content'),
                            'startPrice': '0',
                            'endPrice':'50000'
                        },
                        success: function (resp) {
                            $('#messageSuccess').text('Action success!');
                            $('#messageSuccess').removeClass('d-none');
                            for (var i = 0; i < arrayId.length; i++) {
                                $('#row-item-' + arrayId[i]).remove();
                            }
                            if($('.check-item').length == 0){
                                setTimeout(function(){
                                    window.location.reload(1);
                                }, 3*1000);
                            }
                        },
                        error: function () {
                            $('#messageError').removeClass('d-none');
                            $('#messageError').text('Action fails! Please try again later!');
                        }
                    });
                case '2':
                    window.location.href = url + '?startPrice=50000&endPrice=100000';
                case '3':
                    window.location.href = url + '?startPrice=100000&endPrice=150000';
                case '4':
                    window.location.href = url + '?startPrice=150000&endPrice=200000';
            }
        });
    </script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="{{asset('vendor/noui/nouislider.min.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{asset('js/main.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{asset('js/home-user.js')}}"></script>
@endsection
