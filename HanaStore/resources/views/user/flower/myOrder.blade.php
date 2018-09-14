@extends('user.layouts.master')

@section('page-title', 'Đơn hàng - Hana Store')

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
		@if(Count($myOrder) != 0)
			<!-- Cart item -->
				<div class="container-table-cart pos-relative">
					<div class="wrap-table-shopping-cart bgwhite">
						<table class="table-shopping-cart">
							<tr class="table-head">
								<th class="column-1"></th>
								<th class="column-2 text-center">Mã</th>
								<th class="column-3 text-center">Người đặt</th>
								<th class="column-4 text-center">Tên sản phẩm</th>
								<th class="column-5 text-center">Tổng tiền</th>
								<th>Trạng thái</th>
							</tr>
							@foreach($myOrder as $item)
								<tr class="table-row">
									<td class="column-1 text-center">
										<div class="cart-img-product b-rad-4 o-f-hidden">
											<img src="{{($item->images)}}" alt="IMG-PRODUCT">
										</div>
									</td>
									<td class="column-2 text-center name-product">{{$item->id}}</td>
									<td class="column-3 text-center unit-price">{{$item->shipName}}</td>
									<td class="column-4 text-center unit-price">{{$item->name}}</td>
									<td class="column-5 text-center price">{{number_format( $item->totalPrice,0,',','.')}} vnđ</td>
									@if($item->status == 0)
									<td style="padding-right: 20px; font-size: 10px; text-align: center">
										<div class="alert alert-warning" role="alert" style="border-radius: 30px">Chờ</div>
									</td>
									@elseif($item->status == 1)
										<td style="padding-right: 20px;font-size: 10px; text-align: center">
											<div class="alert alert-info" role="alert" style="border-radius: 30px">Đã nhận</div>
										</td>
									@elseif($item->status == 2)
										<td style="padding-right: 20px;font-size: 10px; text-align: center">
											<div class="alert alert-success" role="alert" style="border-radius: 30px">Hoàn thành</div>
										</td>
									@endif
								</tr>
							@endforeach
						</table>
					</div>
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