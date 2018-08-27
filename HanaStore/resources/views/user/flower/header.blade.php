<!-- Header desktop --> <!--Header rên máy tính-->
<div class="container-menu-header">
    <div class="topbar">
        <div class="topbar-social">
            <a href="https://www.facebook.com/HanaStore-376911052841875" class="topbar-social-item fa fa-facebook"
               target="_blank"></a>
            <a href="https://www.instagram.com/hanastore205/" class="topbar-social-item fa fa-instagram"></a>
            <a href="https://www.pinterest.com/hanastore205/hoa-h%E1%BB%93ng/"
               class="topbar-social-item fa fa-pinterest-p"></a>
            <a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
            <a href="#" class="topbar-social-item fa fa-youtube-play"></a>
        </div>

        <span class="topbar-child1">
					{{--Free shipping for standard order over $100--}}
            Giao hàng miễn phí cho tất cả đơn hàng trên 1.000.000 vnđ
				</span>

        <div class="topbar-child2">
					<span class="topbar-email">
						hanastore@gmail.com
					</span>

            <div class="topbar-language rs1-select2">
                <select class="selection-1" name="time">
                    <option value="1">VN</option>
                    <option value="2">EN</option>
                </select>
            </div>
        </div>
    </div>

    <div class="wrap_header">
        <!-- Logo -->
        <a href="/user/home" class="logo">
            <img src="{{asset('images/icons/logo.png')}}" alt="IMG-LOGO">
        </a>

        <!-- Menu --> <!-- Menu máy tính bình thường hoặc nhỏ hơn xíu-->
        <div class="wrap_menu">
            <nav class="menu">
                <ul class="main_menu">
                    <li class="{{url()->current() == route('homeClient')?'sale-noti':''}}">
                        <a href="/user/home">Trang chủ</a>
                    </li>

                    <li class="{{url()->current() == route('listProductClient')?'sale-noti':''}}">
                        <a href="{{route('listProductClient')}}">Danh sách</a>
                    </li>

                    <li class="{{url()->current() == route('saleClient')?'sale-noti':''}}">
                        <a href="{{route('saleClient')}}">Sale</a>
                    </li>

                    <li class="">
                        <a href="javascript:void(0)">Bộ sưu tập</a>
                        <ul class="sub_menu">
                            @foreach($collections as $item)
                                <li><a href="{{route('listProductClient').'?collectionId='.$item->id}}">{{$item->name}}</a></li>
                            @endforeach
                        </ul>
                    </li>

                    <li class="">
                        <a href="javascript:void(0)">Danh mục</a>
                        <ul class="sub_menu">
                            @foreach($categories as $item)
                                <li><a href="{{route('listProductClient').'?categoryId='.$item->id}}">{{$item->name}}</a></li>
                            @endforeach
                        </ul>
                    </li>

                    <li class="">
                        <a href="javascript:void(0)">Bài viết</a>
                    </li>

                    <li class="">
                        <a href="javascript:void(0)">Liên hệ</a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Header Icon --> <!-- Icon User-->
        <div class="header-icons">
            <a href="#" class="header-wrapicon1 dis-block">
                <img src="{{asset('images/icons/icon-header-01.png')}}" class="header-icon1" alt="ICON">
            </a>

            <span class="linedivide1"></span>

            <div class="header-wrapicon2" id="cart-icon-header">
                <img src="{{asset('images/icons/icon-header-02.png')}}" class="header-icon1 js-show-header-dropdown"
                     alt="ICON">
                <span class="header-icons-noti" id="header-icons-noti">{{$countItemCart}}</span>

                <!-- Header cart noti --> <!-- Xem nhanh giỏ hàng -->
                <div class="header-cart header-dropdown">
                    <ul class="header-cart-wrapitem style4" id="header-cart-wrapitem">
                        @foreach($content as $itemCart)
                            <li class="header-cart-item bo10">
                                <div class="header-cart-item-img">
                                    <img src="{{$itemCart->options->img}}" alt="IMG-PRODUCT-CART">
                                </div>

                                <div class="header-cart-item-txt">
                                    <a href="#" class="header-cart-item-name">
                                        {{$itemCart->name}}
                                    </a>

                                    <span class="header-cart-item-info">
                                            {{$itemCart->qty}} x {{number_format($itemCart->price,0,',','.')}}
                                        </span>
                                </div>
                            </li>
                        @endforeach
                    </ul>

                    <div class="header-cart-total" id="header-cart-total">
                        Tổng tiền: {{$total}} vnđ
                    </div>

                    <div class="header-cart-buttons">
                        <div class="header-cart-wrapbtn" style="margin-left: 25%">
                            <!-- Button -->
                            <a href="{{route('giohang')}}"
                               class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                giỏ hàng
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Header Mobile --> <!-- Header dành cho điện thoại -->
<div class="wrap_header_mobile">
    <!-- Logo moblie -->
    <a href="index.html" class="logo-mobile">
        <img src="{{asset('images/icons/logo.png')}}" alt="IMG-LOGO">
    </a>

    <!-- Button show menu -->
    <div class="btn-show-menu">
        <!-- Header Icon mobile -->
        <div class="header-icons-mobile">
            <a href="#" class="header-wrapicon1 dis-block">
                <img src="{{asset('images/icons/icon-header-01.png')}}" class="header-icon1" alt="ICON">
            </a>

            <span class="linedivide2"></span>

            <div class="header-wrapicon2">
                <img src="{{asset('images/icons/icon-header-02.png')}}" class="header-icon1 js-show-header-dropdown"
                     alt="ICON">
                <span class="header-icons-noti">{{$countItemCart}}</span>

                <!-- Header cart noti -->
                <div class="header-cart header-dropdown " id="style-4">
                    <ul class="header-cart-wrapitem style4" id="header-cart-wrapitem">
                        @foreach($content as $itemCart)
                            <li class="header-cart-item bo10">
                                <div class="header-cart-item-img">
                                    <img src="{{$itemCart->options->img}}" alt="IMG-PRODUCT-CART">
                                </div>

                                <div class="header-cart-item-txt">
                                    <a href="#" class="header-cart-item-name">
                                        {{$itemCart->name}}
                                    </a>

                                    <span class="header-cart-item-info">
                                        {{$itemCart->qty}} x {{number_format($itemCart->price,0,',','.')}}
                                    </span>
                                </div>
                            </li>
                        @endforeach
                    </ul>

                    <div class="header-cart-total">
                        Tổng tiền: {{$total}} vnđ
                    </div>

                    <div class="header-cart-buttons">
                        <div class="header-cart-wrapbtn">
                            <!-- Button -->
                            <a href="{{route('giohang')}}" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                giỏ hàng
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </div>
    </div>
</div>

<!-- Menu Mobile --> <!--Menu của điện thoại-->
<div class="wrap-side-menu">
    <nav class="side-menu">
        <ul class="main-menu">
            <li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<span class="topbar-child1">
							Free shipping for standard order over $100
						</span>
            </li>

            <li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
                <div class="topbar-child2-mobile">
							<span class="topbar-email">
								fashe@example.com
							</span>

                    <div class="topbar-language rs1-select2">
                        <select class="selection-1" name="time">
                            <option>USD</option>
                            <option>EUR</option>
                        </select>
                    </div>
                </div>
            </li>

            <li class="item-topbar-mobile p-l-10">
                <div class="topbar-social-mobile">
                    <a href="#" class="topbar-social-item fa fa-facebook"></a>
                    <a href="#" class="topbar-social-item fa fa-instagram"></a>
                    <a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
                    <a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
                    <a href="#" class="topbar-social-item fa fa-youtube-play"></a>
                </div>
            </li>

            <li class="item-menu-mobile">
                <a href="/user/home">Trang chủ</a>
            </li>

            <li class="item-menu-mobile">
                <a href="/user/list">Danh sách</a>
            </li>

            <li class="item-menu-mobile">
                <a href="product.html">Sale</a>
            </li>

            <li class="item-menu-mobile">
                <a href="cart.html">Bộ sưu tập</a>
                <ul class="sub-menu">
                    @foreach($collections as $item)
                        <li><a href="user/collection/{{$item->id}}">{{$item->name}}</a></li>
                    @endforeach
                </ul>
                <i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
            </li>

            <li class="item-menu-mobile">
                <a href="product.html">Danh mục</a>
                <ul class="sub-menu">
                    @foreach($categories as $item)
                        <li><a href="user/category/{{$item->id}}">{{$item->name}}</a></li>
                    @endforeach
                </ul>
                <i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
            </li>

            <li class="item-menu-mobile">
                <a href="blog.html">Blog</a>
            </li>

            <li class="item-menu-mobile">
                <a href="about.html">About</a>
            </li>

            <li class="item-menu-mobile">
                <a href="contact.html">Contact</a>
            </li>
        </ul>
    </nav>
</div>
