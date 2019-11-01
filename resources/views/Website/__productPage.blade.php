@extends('layouts.website')
@section('css_content')
<style>
	.my-header {
		padding: 1em;
		font-size: 25px;
		font-family: 'Calibri';
	}
</style>
@endsection
@section('body_content_top_banner')
<div data-bottom-top="background-position: 50% 50px;" data-center="background-position: 50% 0px;" data-top-bottom="background-position: 50% -50px;" class="page-title page-product">
	<div class="container">
		<div class="title-wrapper">
			<div data-top="transform: translateY(0px);opacity:1;" data--20-top="transform: translateY(-5px);" data--50-top="transform: translateY(-15px);opacity:0.8;" data--120-top="transform: translateY(-30px);opacity:0;" data-anchor-target=".page-title" class="title">
				Mehedi / Haldi Nights
			</div>
			<div data-top="opacity:1;" data--120-top="opacity:0;" data-anchor-target=".page-title" class="divider">
				<span class="line-before"></span><span class="dot"></span><span class="line-after"></span>
			</div>
			<div data-top="transform: translateY(0px);opacity:1;" data--20-top="transform: translateY(5px);" data--50-top="transform: translateY(15px);opacity:0.8;" data--120-top="transform: translateY(30px);opacity:0;" data-anchor-target=".page-title" class="subtitle">
				Available packages
			</div>
		</div>
	</div>
</div>

@endsection

@section('body_content')

<section class="product-sesction-02 padding-bottom-20 padding-top-0">
	
		<div class="swin-sc swin-sc-product products-02 carousel-02">
			<div class="row">
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<span class="my-header"><strong> Packages </strong></span>
				</div>
				<div class="panel-body">
					<div class="products nav-slider">
						<div class="row slick-padding">
							<div class="col-md-4 col-sm-6 col-xs-12">
								<div class="blog-item item swin-transition">
									<div class="block-img"><img src="{{ URL::asset('images/product/product-2a.jpg') }}" alt="" class="img img-responsive">
										<div class="block-circle price-wrapper">
											<span class="package-products-price"> 1,150 TK </span>
										</div>
										<div class="group-btn">
											<a href="{{ url('product_details_page') }}" class="swin-btn btn-link"><i class="icons fa fa-link"></i></a><a href="javascript:void(0)" class="swin-btn btn-add-to-card"><i class="fa fa-shopping-basket"></i></a>
										</div>
									</div>
									<div class="block-content">
										<h6 class="title">Package 1</h6>
										<div class="product-info">
											<ul class="list-inline">
												<li class="author">
													<span><h4>1 ) Beef Teheri</h4></span>
													<span><h4>2 ) Jali / Shami Kabab</h4></span>
													<span><h4>3 ) Salad</h4></span>
													<span><h4>4 ) Borhani</h4></span>
												</li>
												<!--li class="rating">
												<a href="javascript:void(0)"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></a>
												</li-->
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-sm-6 col-xs-12">
								<div class="blog-item item swin-transition">
									<div class="block-img"><img src="{{ URL::asset('images/product/product-2b.jpg') }}" alt="" class="img img-responsive">
										<div class="block-circle price-wrapper">
											<span class="package-products-price"> 250 TK </span>
										</div>
										<div class="group-btn">
											<a href="javascript:void(0)" class="swin-btn btn-link"><i class="icons fa fa-link"></i></a><a href="javascript:void(0)" class="swin-btn btn-add-to-card"><i class="fa fa-shopping-basket"></i></a>
										</div>
									</div>
									<div class="block-content">
										<h6 class="title">Package 2</h6>
										<div class="product-info">
											<ul class="list-inline">
												<li class="author">
													<span><h4>1 ) Beef Teheri</h4></span>
													<span><h4>2 ) Jali / Shami Kabab</h4></span>
													<span><h4>3 ) Salad</h4></span>
													<span><h4>4 ) Borhani</h4></span>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-sm-6 col-xs-12">
								<div class="blog-item item swin-transition">
									<div class="block-img"><img src="{{ URL::asset('images/product/product-2c.jpg') }}" alt="" class="img img-responsive">
										<div class="block-circle price-wrapper">
											<span class="package-products-price"> 100 TK </span>
										</div>
										<div class="group-btn">
											<a href="javascript:void(0)" class="swin-btn btn-link"><i class="icons fa fa-link"></i></a><a href="javascript:void(0)" class="swin-btn btn-add-to-card"><i class="fa fa-shopping-basket"></i></a>
										</div>
									</div>
									<div class="block-content">
										<h6 class="title">Package 3</h6>
										<div class="product-info">
											<ul class="list-inline">
												<li class="author">
													<span><h4>1 ) Beef Teheri</h4></span>
													<span><h4>2 ) Jali / Shami Kabab</h4></span>
													<span><h4>3 ) Salad</h4></span>
													<span><h4>4 ) Borhani</h4></span>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-sm-6 col-xs-12">
								<div class="blog-item item swin-transition">
									<div class="block-img"><img src="{{ URL::asset('images/product/product-2e.jpg') }}" alt="" class="img img-responsive">
										<div class="block-circle price-wrapper">
											<span class="package-products-price"> 300 TK </span>
										</div>
										<div class="group-btn">
											<a href="javascript:void(0)" class="swin-btn btn-link"><i class="icons fa fa-link"></i></a><a href="javascript:void(0)" class="swin-btn btn-add-to-card"><i class="fa fa-shopping-basket"></i></a>
										</div>
									</div>
									<div class="block-content">
										<h6 class="title">Package 4</h6>
										<div class="product-info">
											<ul class="list-inline">
												<li class="author">
													<span><h4>1 ) Beef Teheri</h4></span>
													<span><h4>2 ) Jali / Shami Kabab</h4></span>
													<span><h4>3 ) Salad</h4></span>
													<span><h4>4 ) Borhani</h4></span>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-sm-6 col-xs-12">
								<div class="blog-item item swin-transition">
									<div class="block-img"><img src="{{ URL::asset('images/product/product-2f.jpg') }}" alt="" class="img img-responsive">
										<div class="block-circle price-wrapper">
											<span class="package-products-price"> 470 TK </span>
										</div>
										<div class="group-btn">
											<a href="javascript:void(0)" class="swin-btn btn-link"><i class="icons fa fa-link"></i></a><a href="javascript:void(0)" class="swin-btn btn-add-to-card"><i class="fa fa-shopping-basket"></i></a>
										</div>
									</div>
									<div class="block-content">
										<h6 class="title">Package 5</h6>
										<div class="product-info">
											<ul class="list-inline">
												<li class="author">
													<span><h4>1 ) Beef Teheri</h4></span>
													<span><h4>2 ) Jali / Shami Kabab</h4></span>
													<span><h4>3 ) Salad</h4></span>
													<span><h4>4 ) Borhani</h4></span>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-sm-6 col-xs-12">
								<div class="blog-item item swin-transition">
									<div class="block-img"><img src="{{ URL::asset('images/product/product-2d.jpg') }}" alt="" class="img img-responsive">
										<div class="block-circle price-wrapper">
											<span class="package-products-price"> 550 TK </span>
										</div>
										<div class="group-btn">
											<a href="javascript:void(0)" class="swin-btn btn-link"><i class="icons fa fa-link"></i></a><a href="javascript:void(0)" class="swin-btn btn-add-to-card"><i class="fa fa-shopping-basket"></i></a>
										</div>
									</div>
									<div class="block-content">
										<h6 class="title">Package 6</h6>
										<div class="product-info">
											<ul class="list-inline">
												<li class="author">
													<span><h4>1 ) Beef Teheri</h4></span>
													<span><h4>2 ) Jali / Shami Kabab</h4></span>
													<span><h4>3 ) Salad</h4></span>
													<span><h4>4 ) Borhani</h4></span>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-sm-6 col-xs-12">
								<div class="blog-item item swin-transition">
									<div class="block-img"><img src="{{ URL::asset('images/product/product-2k.jpg') }}" alt="" class="img img-responsive">
										<div class="block-circle price-wrapper">
											<span class="package-products-price"> 799 TK </span>
										</div>
										<div class="group-btn">
											<a href="javascript:void(0)" class="swin-btn btn-link"><i class="icons fa fa-link"></i></a><a href="javascript:void(0)" class="swin-btn btn-add-to-card"><i class="fa fa-shopping-basket"></i></a>
										</div>
									</div>
									<div class="block-content">
										<h6 class="title">Package 7</h6>
										<div class="product-info">
											<ul class="list-inline">
												<li class="author">
													<span><h4>1 ) Beef Teheri</h4></span>
													<span><h4>2 ) Jali / Shami Kabab</h4></span>
													<span><h4>3 ) Salad</h4></span>
													<span><h4>4 ) Borhani</h4></span>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-sm-6 col-xs-12">
								<div class="blog-item item swin-transition">
									<div class="block-img"><img src="{{ URL::asset('images/product/product-2l.jpg') }}" alt="" class="img img-responsive">
										<div class="block-circle price-wrapper">
											<span class="package-products-price"> 470 TK </span>
										</div>
										<div class="group-btn">
											<a href="javascript:void(0)" class="swin-btn btn-link"><i class="icons fa fa-link"></i></a><a href="javascript:void(0)" class="swin-btn btn-add-to-card"><i class="fa fa-shopping-basket"></i></a>
										</div>
									</div>
									<div class="block-content">
										<h6 class="title">Package 8</h6>
										<div class="product-info">
											<ul class="list-inline">
												<li class="author">
													<span><h4>1 ) Beef Teheri</h4></span>
													<span><h4>2 ) Jali / Shami Kabab</h4></span>
													<span><h4>3 ) Salad</h4></span>
													<span><h4>4 ) Borhani</h4></span>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-sm-6 col-xs-12">
								<div class="blog-item item swin-transition">
									<div class="block-img"><img src="{{ URL::asset('images/product/product-2n.jpg') }}" alt="" class="img img-responsive">
										<div class="block-circle price-wrapper">
											<span class="package-products-price"> 350 TK </span>
										</div>
										<div class="group-btn">
											<a href="javascript:void(0)" class="swin-btn btn-link"><i class="icons fa fa-link"></i></a><a href="javascript:void(0)" class="swin-btn btn-add-to-card"><i class="fa fa-shopping-basket"></i></a>
										</div>
									</div>
									<div class="block-content">
										<h6 class="title">Package 9</h6>
										<div class="product-info">
											<ul class="list-inline">
												<li class="author">
													<span><h4>1 ) Beef Teheri</h4></span>
													<span><h4>2 ) Jali / Shami Kabab</h4></span>
													<span><h4>3 ) Salad</h4></span>
													<span><h4>4 ) Borhani</h4></span>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-sm-6 col-xs-12">
								<div class="blog-item item swin-transition">
									<div class="block-img"><img src="{{ URL::asset('images/product/create+your+own+menu.jpg') }}" alt="" class="img img-responsive">

										<div class="group-btn">
											<a href="javascript:void(0)" class="swin-btn btn-link"><i class="fa fa-plus"></i></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	
</section>

@endsection
@section('javascript_content')
<script src="{{ URL::asset('js/Website_js/jquery-ui.js') }}"></script>
@endsection