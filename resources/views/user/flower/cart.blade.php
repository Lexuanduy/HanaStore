@extends('user.layouts.master')

@section('page-title', 'Giỏ hàng - Hana Store')

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
    <link rel="stylesheet" type="text/css" href="{{asset('css/user-cart.css')}}">
@endsection

@section('content')
    <!-- Title Page -->
    <section class="bg-title-page p-t-40 p-b-50 flex-col-c-m"
             style="background-image: url('{{asset('img/bg-cart.jpg')}}');width: 100%;height: 239px">
        {{--<h1 class="t-center" style="color: #010101;font-size: 100px;">--}}
        {{--Giỏ hàng <i class="fa fa-shopping-cart" aria-hidden="true" style="color: #ff9b69;"></i>--}}
        {{--</h1>--}}
    </section>

    <!-- Cart -->
    <section class="cart bgwhite p-t-70 p-b-100">
        <div class="container">
        @if(Count($content) != 0)
            <!-- Cart item -->
                <div class="container-table-cart pos-relative">
                    <div class="wrap-table-shopping-cart bgwhite">
                        <table class="table-shopping-cart">
                            <tr class="table-head">
                                <th class="column-1"></th>
                                <th class="column-2 text-center">Tên</th>
                                <th class="column-3 text-center">Giá</th>
                                <th class="column-4 text-center">Số lượng</th>
                                <th class="column-5 text-center">Tổng tiền</th>
                                <th></th>
                            </tr>
                            @foreach($content as $item)
                                <tr class="table-row">
                                    <td class="column-1 text-center">
                                        <div class="cart-img-product b-rad-4 o-f-hidden">
                                            <img src="{{asset('img/product/'.($item->options->has('img') ? $item->options->img : ''))}}"
                                                 alt="IMG-PRODUCT">
                                        </div>
                                    </td>
                                    <td class="column-2 text-center name-product">{{$item->name}}</td>
                                    <td class="column-3 text-center unit-price">{{number_format( $item->price,0,',','.')}}</td>
                                    <td class="column-4 p-l-70">
                                        <div class="flex-w bo5 of-hidden w-size17 ">
                                            <button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2 btn-num">
                                                <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                                            </button>

                                            <input class="size8 m-text18 t-center num-product qty" type="number"
                                                   name="num-product[{{$item->id}}]" value="{{$item->qty}}">

                                            <button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2 btn-num">
                                                <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="column-5 text-center price">{{number_format($item->price * $item->qty,0,',','.')}}</td>
                                    <td style="padding-right: 20px;">
                                        <button type="button" data-toggle="tooltip" title="Xóa"
                                                class="btn btn-xs btn-delete" id="{{$item-> rowId}}"
                                                style="background-color: transparent; border: 1px solid transparent">
                                            <i class="fa fa-trash-o icon" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>

                <div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
                    <div class="flex-w flex-m w-full-sm">
                        <div class="size12 trans-0-4 m-t-10 m-b-10 m-r-10">
                            <!-- Button -->

                            <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                                <a href="{{route('listProductClient')}}" class="nextPhopping">Tiếp tục mua sắm</a>
                            </button>
                        </div>
                    </div>

                    <div class="size10 trans-0-4 m-t-10 m-b-10">
                        <!-- Button -->
                        <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" type="submit">
                            Cập nhật giỏ hàng
                        </button>
                    </div>
                </div>
                <!-- Total -->
                <div class="bo9 w-size28 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
                    <h5 class="m-text20 p-b-24">
                        Tổng tiền đơn hàng
                    </h5>

                    <!--  -->
                    <div class="flex-w flex-sb-m p-b-12">
					<span class="s-text18 w-size19 w-full-sm">
						Số tiền:
					</span>

                        <span class="m-text21 w-size20 w-full-sm">
						 {{$total}} vnđ
					</span>
                    </div>


                    <!--  -->
                    <form action="{{route('checkoutCart')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="flex-w flex-sb bo10 p-t-15 p-b-20">
                        <span class="s-text23 w-size19 w-full-sm">
                            Tên người nhận:
                        </span>
                            <div class="w-size20 w-full-sm">
                                <div class="size25 bo4 m-b-12">
                                    <input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="ship-name"
                                           placeholder="Tên người nhận" required>
                                </div>
                            </div>

                            <span class="s-text23 w-size19 w-full-sm">
                            Email:
                        </span>
                            <div class="w-size20 w-full-sm">
                                <div class="size25 bo4 m-b-12">
                                    <input class="sizefull s-text7 p-l-15 p-r-15" type="email" name="ship-email"
                                           placeholder="Email" required>
                                </div>
                            </div>

                            <span class="s-text23 w-size19 w-full-sm">
                            Số điện thoại:
                        </span>
                            <div class="w-size20 w-full-sm">
                                <div class="size25 bo4 m-b-12">
                                    <input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="ship-phone"
                                           placeholder="Số điện thoại" required>
                                </div>
                            </div>

                            <span class="s-text23 w-size19 w-full-sm">
                            Địa chỉ:
                        </span>
                            <div class="w-size20 w-full-sm">
                                <div class="size25 bo4 m-b-12">
                                    <input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="ship-address"
                                           placeholder="Địa chỉ người nhận" required>
                                </div>
                            </div>
                            <span class="s-text23 w-size19 w-full-sm">
                            Lời nhắn:
                        </span>
                            <div class="w-size20 w-full-sm">
                                <div class="bo4 m-b-12">
                                    <textarea class="sizefull p-l-15 p-r-15 s-text7" type="text" name="note" required
                                              rows="4"
                                              style="border: none" placeholder="Something....."></textarea>
                                </div>
                            </div>
                        </div>


                        <!--  -->
                        <div class="flex-w flex-sb-m p-t-26 p-b-30">
                        <span class="m-text22 w-size19 w-full-sm">
                            Tổng tiền:
                        </span>
                            <span class="m-text21 w-size20 w-full-sm">
                            {{$total}} vnđ
                        </span>
                        </div>

                        <div class="size15 trans-0-4">
                            <!-- Button -->
                            <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" type="submit">
                                Đặt Hàng
                            </button>
                        </div>
                    </form>
                </div>
            @else
                <div>
                    <div class="alert alert-success " role="alert" style="border-radius: 5px">
                        Hiện chưa có sản phẩm nào trong giỏ hàng, bấm vào <a href="{{route('listProductClient')}}"
                                                                             style="color: red; font-size: 1rem">đây</a>
                        để mua hàng.
                    </div>
                </div>
            @endif
        </div>
        <form action="" method="post" enctype="multipart/form-data" id="form-dalete-to-cart" name="form-delete">
            @method('DELETE')
            @csrf
        </form>
        @if(Session::has('delete'))
            <div class="alert alert-success " role="alert" id="messageDeleteCart" style="border-radius: 5px">
                {{Session::get('delete')}}
            </div>
        @endif
        @if(Session::has('order-success'))
            <div class="alert alert-success " role="alert" id="messageOrderCart" style="border-radius: 5px">
                {{Session::get('order-success')}}
            </div>
        @endif
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
    <script type="text/javascript" src="{{asset('vendor/sweetalert/sweetalert.min.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{asset('js/main.js')}}"></script>
    <script src="{{asset('js/cart.js')}}"></script>
@endsection