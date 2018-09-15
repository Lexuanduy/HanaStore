<div class="flex-w p-b-90">
    <div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
        <h4 class="s-text12 p-b-30">
            {{--GET IN TOUCH--}} Liên lạc
        </h4>

        <div>
            <p class="s-text7 w-size27">
                {{--Any questions? Let us know in store at 8th floor, 379 Hudson St, New York, NY 10018 or call us on--}}
                {{--(+1) 96 716 6879--}}
                Bạn có câu hỏi nào không ? Hãy cho chúng tôi biệt tại cửa hàng ở số 8 Tông Thất Thuyết, Quận Cầu Giấy, tp. Hà Nội
                hoặc vào số (+84)164 555 602
            </p>

            <div class="flex-m p-t-30">
                <a href="#" class="fs-18 color1 p-r-20 fa fa-facebook"></a>
                <a href="#" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
                <a href="#" class="fs-18 color1 p-r-20 fa fa-pinterest-p"></a>
                <a href="#" class="fs-18 color1 p-r-20 fa fa-snapchat-ghost"></a>
                <a href="#" class="fs-18 color1 p-r-20 fa fa-youtube-play"></a>
            </div>
        </div>
    </div>

    <div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
        <h4 class="s-text12 p-b-30">
            Danh mục
        </h4>

        <ul>
            @foreach($categories as $item)
            <li class="p-b-9">
                <a href="#" class="s-text7">
                    {{$item->name}}
                </a>
            </li>
            @endforeach
        </ul>
    </div>

    <div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
        <h4 class="s-text12 p-b-30">
            Liên hệ
        </h4>

        <ul>
            <li class="p-b-9">
                <a href="javascript:void(0)" class="s-text7 showPopup">
                    Tìm kiếm
                </a>
            </li>

            <li class="p-b-9">
                <a href="{{route('contactClient')}}" class="s-text7">
                    Liên hệ
                </a>
            </li>
        </ul>
    </div>

    <div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
        <h4 class="s-text12 p-b-30">
            Hỗ trợ
        </h4>

        <ul>
            <li class="p-b-9">
                <a href="javascript:void(0)" class="s-text7 showPopup" >
                    Kiểm tra đơn hàng
                </a>
            </li>

            <li class="p-b-9">
                <a href="javascript:void(0)" class="s-text7 showPopup">
                    Thắc mắc
                </a>
            </li>

            <li class="p-b-9">
                <a href="javascript:void(0)" class="s-text7 showPopup">
                    Báo lỗi
                </a>
            </li>

            <li class="p-b-9">
                <a href="javascript:void(0)" class="s-text7 showPopup" >
                    FAQs
                </a>
            </li>
        </ul>
    </div>

    <div class="w-size8 p-t-30 p-l-15 p-r-15 respon3">
        <h4 class="s-text12 p-b-30">
            Nhận tin mới
        </h4>

        <form action="#">
            <div class="effect1 w-size9">
                <input class="s-text7 bg6 w-full p-b-5" type="text" name="email" placeholder="email@example.com">
                <span class="effect1-line"></span>
            </div>

            <div class="w-size2 p-t-20">
                <!-- Button -->
                <button class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4 showPopup" type="button">
                    Gửi luôn
                </button>
            </div>

        </form>
    </div>
</div>

<div class="t-center p-l-15 p-r-15">
    <a href="javascript:void(0)" class="showPopup">
        <img class="h-size2" src="{{asset('images/icons/paypal.png')}}" alt="IMG-PAYPAL">
    </a>

    <a href="javascript:void(0)" class="showPopup">
        <img class="h-size2" src="{{asset('images/icons/visa.png')}}" alt="IMG-VISA">
    </a>

    <a href="javascript:void(0)" class="showPopup">
        <img class="h-size2" src="{{asset('images/icons/mastercard.png')}}" alt="IMG-MASTERCARD">
    </a>

    <a href="javascript:void(0)" class="showPopup">
        <img class="h-size2" src="{{asset('images/icons/express.png')}}" alt="IMG-EXPRESS">
    </a>

    <a href="javascript:void(0)" class="showPopup">
        <img class="h-size2" src="{{asset('images/icons/discover.png')}}" alt="IMG-DISCOVER">
    </a>

    <div class="t-center s-text8 p-t-20">
        Copyright © 2018 All rights reserved. | This template is made with <i class="fa fa-heart-o"
                                                                              aria-hidden="true"></i> by <a
                href="https://colorlib.com" target="_blank">Colorlib</a>
    </div>
</div>
<div class="alert alert-success " role="alert" id="Popup" style="border-radius: 5px">
    Chức năng đang phát triển. (~.~)
</div>