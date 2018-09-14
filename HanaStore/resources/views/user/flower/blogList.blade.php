@extends('user.layouts.master')

@section('page-title', 'Bài viết - Hana Store')

@section('css')

	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
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
	<link rel="stylesheet" type="text/css" href="{{asset('vendor/slick/slick.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
@endsection

@section('content')
	<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url({{asset('img/banner-blog.png')}});">
	</section>

	<!-- content page -->
	<section class="bgwhite p-t-60">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-lg-9 p-b-75">
					<div class="p-r-50 p-r-0-lg">
					@foreach($article as $item)
						<!-- item blog -->
							<div class="item-blog p-b-80">
								<a href="/hanastore/blog/{{$item->id}}" class="item-blog-img pos-relative dis-block hov-img-zoom" style="height: 550px">
									<img src="{{$item->images}}" alt="IMG-BLOG">

									<span class="item-blog-date dis-block flex-c-m pos1 size17 bg4 s-text1">
                                        {{$item->created_at->format('d-m-Y')}}
                                    </span>
								</a>

								<div class="item-blog-txt p-t-33">
									<h4 class="p-b-11">
										<a href="/hanastore/blog/{{$item->id}}" class="m-text24">
											{{$item->title}}
										</a>
									</h4>

									<div class="s-text8 flex-w flex-m p-b-21">
                                        <span>
                                            By SlowV
                                            <span class="m-l-3 m-r-6">|</span>
                                        </span>

										<span>
                                            Hoa
                                        </span>
									</div>

									<p class="p-b-12">
										{{$item->content}}...
									</p>

									<a href="/hanastore/blog/{{$item->id}}" class="s-text20">
										{{--Continue Reading--}}
										Xem thêm
										<i class="fa fa-long-arrow-right m-l-8" aria-hidden="true"></i>
									</a>
								</div>
							</div>
						@endforeach
					</div>

					<div class="row">
						<div class="col-md-12 mt-5">
							{{$article->links()}}
						</div>
					</div>
				</div>

				<div class="col-md-4 col-lg-3 p-b-75">
					<div class="rightbar">
						<!-- Search -->
						<div class="pos-relative bo11 of-hidden">
							<input class="s-text7 size16 p-l-23 p-r-50" type="text" name="search-product" placeholder="Tìm kiếm">

							<button class="flex-c-m size5 ab-r-m color1 color0-hov trans-0-4">
								<i class="fs-13 fa fa-search" aria-hidden="true"></i>
							</button>
						</div>

						<!-- Categories -->
						<h4 class="m-text23 p-t-56 p-b-34">
							Danh mục
						</h4>

						<ul>
							@foreach($categories as $item)
								<li class="p-t-6 p-b-8 bo6">
									<a href="{{route('listProductClient').'?categoryId='.$item->id}}" class="s-text13 p-t-5 p-b-5">
										{{$item->name}}
									</a>
								</li>
							@endforeach
						</ul>

						<!-- Featured Products -->
						<h4 class="m-text23 p-t-65 p-b-34">
							Sản phẩm
						</h4>

						<ul class="bgwhite">
							@foreach($products as $item)
								<li class="flex-w p-b-20">
									<a href="/hanastore/product/{{$item->id}}" class="dis-block wrap-pic-w w-size22 m-r-20 trans-0-4 hov4">
										<img src="{{$item->images}}" alt="IMG-PRODUCT">
									</a>

									<div class="w-size23 p-t-5">
										<a href="/hanastore/product/{{$item->id}}" class="s-text20">
											{{$item->name}}
										</a>

										<span class="dis-block s-text17 p-t-6">
											@if($item->sale == 0)
												{{number_format($item->price,0,',','.')}}
												<span style="text-transform: lowercase">vnđ</span>
											@else
												{{$item->discountPriceString}}
											@endif
										</span>
									</div>
								</li>
							@endforeach
						</ul>
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
	<script src="{{asset('js/main.js')}}"></script>
@endsection

