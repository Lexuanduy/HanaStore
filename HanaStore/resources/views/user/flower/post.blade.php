@extends('user.layouts.master')

@section('page-title', 'Mẫu hoa cưới đẹp nhất 2018')

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
    <section>
        <div class="container" style="margin-top: 30px">
            <h2 style="">MẪU HOA CƯỚI ĐẸP NHẤT 2018</h2>
            <div class="text-center">
                <img src="{{asset('img/post/post-1.jpg')}}" alt="" style="margin-top: 50px; margin-bottom: 20px ; width: 800px ; height: 500px">
            </div>
            <p>Trong ngày trọng đại, áo cưới thường được các cô dâu đầu tư nhiều thời gian và lựa chọn kỹ càng nhất.  Nhiều cô dâu lựa chọn tới 2-3 bộ váy cưới để thay đổi trong buổi tiệc vừa để tạo ấn tượng đối với khách mời, vừa để có thêm những bức hình đẹp của dịp cả đời có một ấy. Tuy nhiên, ít ai biết rằng hoa cưới cũng không kém phần quan trọng. Theo các nhiếp ảnh gia, một bó hoa cưới đẹp chiếm tới 50% sự thành công và thẩm mỹ của bức ảnh. Theo khảo sát, hoa cưới (hoa cầm tay cô dâu) mới là thứ tạo được ấn tượng nhiều nhất cho khách mời ngay ánh nhìn đầu tiên.</p>
            <br>
            <p>Dưới đây là những mẫu hoa cưới đẹp từ HanaStore có thể khiến cô dâu thêm lộng lẫy trong ngày vui của mình:</p>
            <br>
            <p>Bó hoa cưới bằng hồng đỏ: Tình yêu mãnh liệt  </p>
            <br>
            <p>Hoa hồng là biểu tượng của tình yêu. Vì thế một bó hoa cưới làm từ hoa hồng đỏ sẽ là lời khẳng định tình yêu mãnh liệt của cô dâu và chú rể. Không còn nghi ngờ gì nữa, một bó hoa cưới bằng hoa hồng đỏ trên nền váy cưới màu trắng sẽ mang đến sự nổi bật cho cô dâu nhờ sự tương phản của màu sắc.</p>
            <br>
            <div class="text-center">
                <img src="{{asset('img/post/post-2.jpg')}}" alt="" style="width: 500px ; height: 600px">
                <p>Bó hoa cưới từ hoa hồng đỏ đại diện cho tình yêu mãnh liệt</p>
            </div>
            <br>

            <p>Bó hoa cưới từ hoa hồng tím: Sự mộng mơ và chung thủy</p>
            <br>
            <p>Không quá nổi bật như hồng đỏ, nhưng những bó hoa cô dâu cầm tay làm từ hoa hồng tím lại mang tới vẻ đẹp nhẹ nhàng, lãng mạn. Bởi ý nghĩa hoa hồng tím là chung thủy và mộng mơ đúng như tâm trạng của người con gái đang đi “xây mộng cuộc đời” với người mình yêu thương.</p>
            <br>
            <div class="text-center">
                <img src="{{asset('img/post/post-3.jpg')}}" alt="" style="width: 500px ; height: 600px">
                <p>Bó hoa cưới từ hoa hồng tím đại diện cho tình yêu thủy chung</p>
            </div>
            <br>

            <p>Bó hoa cưới từ hoa hồng trắng: Trái tim chân thành và trong sáng </p>
            <br>
            <p>Như chúng ta đã biết, màu trắng là màu thể hiện sự ngây thơ, nguyên vẹn và trong sạch. Do đó, một bó hoa hồng màu trắng sáng thể hiện sự ngây thơ và tình yêu trong sáng, không lẫn vật chất, vô cùng thiêng liêng. Hoa hồng trắng thể hiện một tình yêu không có những cám dỗ xác thịt, vật chất mà bởi sự gắn bó của hai tâm hồn đồng điệu. Xét về khía cạnh này thì hoa hồng trắng đối lập hoàn toàn với hoa hồng đỏ – loài hoa ẩn chứa sự đam mê cháy bỏng trong tình yêu.</p>
            <br>
            <div class="text-center">
                <img src="{{asset('img/post/post-4.jpg')}}" alt="" style="width: 500px ; height: 600px">
                <p>Bó hoa cưới từ hoa hồng trắng thể hiện tình cảm  chân thành và trong sáng </p>
            </div>
            <br>
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
