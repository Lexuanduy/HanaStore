@extends('user.layouts.master')

@section('page-title', 'Liên hệ')
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
@endsection

@section('content')

    <!-- Slide1 --> <!--Slide ảnh-->
    <section class="slide1">
        @include('user.flower.slide')
    </section>
    <!-- content page -->
    <section class="bgwhite p-t-66 p-b-60">
        <div class="container">
            <div class="row">
                <div class="col-md-6 p-b-30">
                    <div class="p-r-20 p-r-0-lg">
                        <div class="contact-map size21" id="google_map" data-map-x="21.028849" data-map-y="105.781734" data-pin="{{asset('images/icons/icon-position-map.png')}}" data-scrollwhell="0" data-draggable="1"></div>
                    </div>
                </div>

                <div class="col-md-6 p-b-30">
                    <form class="leave-comment">
                        <h4 class="m-text26 p-b-36 p-t-15">
                            GỬI LIÊN HỆ VỀ HANASTORE
                        </h4>

                        <div class="bo4 of-hidden size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="name" placeholder="Họ và tên">
                        </div>

                        <div class="bo4 of-hidden size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="phone-number" placeholder="Số điện thoại">
                        </div>

                        <div class="bo4 of-hidden size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="email" placeholder="Email ">
                        </div>

                        <textarea class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20" name="message" placeholder="Tin nhắn"></textarea>

                        <div class="w-size25">
                            <!-- Button -->
                            <button type="submit" value="Submit" class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
                                Gửi
                            </button>
                        </div>
                    </form>
                </div>
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
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes&callback=initMap"></script>
    <script src="{{asset('js/map-custom.js')}}"></script>

    <!--===============================================================================================-->
    <script src="{{asset('js/main.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{asset('js/home-user.js')}}"></script>
@endsection
