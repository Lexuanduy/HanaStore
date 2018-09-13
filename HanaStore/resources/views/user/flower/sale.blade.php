@extends('user.layouts.master')

@section('page-title', 'Sản phẩm Sale - Hana Store')

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
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/lightbox2/css/lightbox.min.css')}}">
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
@endsection

@section('content')

    <!-- Slide1 --> <!--Slide ảnh-->
    <section class="slide1">
        @include('user.flower.slide')
    </section>

    <!--Danh sách sản phẩm-->
    <section class="product bgwhite p-t-45 p-b-40">
        <div class="container">
            <div class="sec-title p-b-60">
                <h3 class="m-text5 t-left">
                    Sản phẩm Sale
                </h3>
            </div>
            <div class="row">
                <!--Mỗi cục div trong row là 1 sản phẩm-->
                @foreach($products_sale as $item)
                    <div class=" p-l-15 p-r-15 col-md-3 mt-3">
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
                                <a href="/hanastore/product/{{$item->id}}" class="block2-name dis-block s-text3 p-b-5">
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
            <div class="row">
                <div class="col-md-12 mt-5">
                    {{$products->links()}}
                </div>
            </div>
        </div>
    </section>

    <!-- Shipping -->
    <section class="shipping bgwhite p-t-62 p-b-46">
        <div class="flex-w p-l-15 p-r-15">
            <div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
                <h4 class="m-text12 t-center">
                    Free Delivery Worldwide
                </h4>

                <a href="#" class="s-text11 t-center">
                    Click here for more info
                </a>
            </div>

            <div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 bo2 respon2">
                <h4 class="m-text12 t-center">
                    30 Days Return
                </h4>

                <span class="s-text11 t-center">
					Simply return it within 30 days for an exchange.
				</span>
            </div>

            <div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
                <h4 class="m-text12 t-center">
                    Store Opening
                </h4>

                <span class="s-text11 t-center">
					Shop open from Monday to Sunday
				</span>
            </div>
        </div>
    </section>
@endsection

@section('selection')
    <!-- Container Selection1 -->
    <div id="dropDownSelect1"></div>
@endsection


@section('javascript')
    <!--===============================================================================================-->
    <script type="text/javascript" src="{{asset('')}}vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="{{asset('')}}vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="{{asset('')}}vendor/bootstrap/js/popper.js"></script>
    <script type="text/javascript" src="{{asset('')}}vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="{{asset('')}}vendor/select2/select2.min.js"></script>
    <script type="text/javascript">
        $(".selection-1").select2({
            minimumResultsForSearch: 20,
            dropdownParent: $('#dropDownSelect1')
        });
    </script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="{{asset('vendor/slick/slick.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/slick-custom.js')}}"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="{{asset('vendor/countdowntime/countdowntime.js')}}"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="{{asset('vendor/lightbox2/js/lightbox.min.js')}}"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="{{asset('vendor/sweetalert/sweetalert.min.js')}}"></script>
    <script type="text/javascript">
        $('.block2-btn-addwishlist').each(function () {
            var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
            $(this).on('click', function () {
                swal(nameProduct, "Đã thêm vào yêu thích!", "success");
            });
        });

    </script>

    <!--===============================================================================================-->
    <script src="{{asset('js/main.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{asset('js/home-user.js')}}"></script>
@endsection
