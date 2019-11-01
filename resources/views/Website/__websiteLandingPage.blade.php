@extends('layouts.website_landing')
@section('css_content')
<style>
	.my-header {
		padding: 1em;
		font-size: 25px;
		font-family: 'Calibri';
	}
	.swin-btn:hover {
		border-bottom: solid 1px #f15f2a;
		box-shadow: 0 2px 3px #a8a8a8;
		transform: scale(1.04);
		-webkit-transform: scale(1.04);
		-moz-transform: scale(1.04);
		-o-transform: scale(1.04);
		-ms-transform: scale(1.04);
	}

	a {
		color: #000000;
	}

	.quantity input {
		-webkit-appearance: none;
		border: none;
		text-align: center;
		width: 32px;
		font-size: 16px;
		color: #43484D;
		font-weight: 300;
	}

	.quantity {
		text-align: center;
		margin-top: 10px;
		margin-bottom: 20px;
	}

	@media (max-width: 480px) {
		.my-header {
			font-size: 22px;
		}
	}

	.offer_image {
		float: left;
	}
</style>
@endsection
@section('body_content')
<div class="page-container">
	<section class="slide-wrapper padding-top-10">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div id="myCarousel" class="carousel slide" data-ride="carousel">
						<!-- Indicators -->
						<ol class="carousel-indicators">
							<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
							<li data-target="#myCarousel" data-slide-to="1"></li>
							<li data-target="#myCarousel" data-slide-to="2"></li>
						</ol>

						<!-- Wrapper for slides -->
						<div class="carousel-inner">
							<div class="item active">
								<img src="{{ URL::asset('images/slider/Slider Images/main-slider-banner-1.jpg') }}" alt="Slider 1" style="width:100%;">
							</div>

							<div class="item">
								<img src="{{ URL::asset('images/slider/Slider Images/main-slider-banner-3.jpg') }}" alt="Slider 2" style="width:100%;">
							</div>

							<div class="item">
								<img src="{{ URL::asset('images/slider/Slider Images/main-slider-banner-4.jpg') }}" alt="Slider 3" style="width:100%;">
							</div>
						</div>

						<!-- Left and right controls -->
						<!--a class="left carousel-control" href="#myCarousel" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span> <span class="sr-only">Previous</span> </a>
						<a class="right carousel-control" href="#myCarousel" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span> <span class="sr-only">Next</span> </a-->
					</div>

				</div>
			</div>
		</div>
	</section>

	<section class="padding-top-10">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<!--img src="{{ URL::asset('images/slider/Offer-Add.jpg') }}" alt="" class="img img-responsive"-->
					<div class="panel panel-default">
						<div>
							<a href="javascript:void(0)"> <img src="{{ URL::asset('images/Offer-Add.jpg') }}" alt="" class="img img-responsive offer_image"> </a>

							<img src="{{ URL::asset('images/GIF.gif') }}" alt="" class="img img-responsive">
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="team-section">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<span class="my-header"><strong> Programs We Serve </strong></span>
						</div>
						<div class="swin-sc swin-sc-team-slider">
							@foreach($programs as $program)
							<div class="team-item swin-transition wow fadeInLeft">
								<div class="team-img-wrap">
									<div class="team-img"><img src="{{ URL::asset('images/Programs/'.$program->program_image) }}" alt="Image" class="img img-responsive">
									</div>
								</div>
								<p class="team-name">
									{{ $program->program_name }}
								</p>
								<p class="team-position">
									<a href="{{ url('/product_page_for_programs/'.$program->id.'/'.'Box') }}" class="swin-btn btn-sm">Box</a>&nbsp; <a href="{{ url('/product_page_for_programs/'.$program->id.'/'.'Buffet') }}" class="swin-btn btn-sm">Buffet</a>
								</p>
								<hr>
							</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="team-section">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<span class="my-header"><strong> Our Top Products </strong></span>
						</div>
						<div class="swin-sc swin-sc-team-slider">
							@foreach($product_details as $product)
							<div class="team-item swin-transition wow fadeInLeft">
								<div class="team-img-wrap">
									<div class="team-img">
										@if(isset($product['image']))
										<img width="280px" height="240px" src="{{ URL::asset('images/Product Gallery Images/'.$product['image']) }}" alt="Image" class="img img-responsive">
										@else
										<img width="280px" height="240px" src="{{ URL::asset('images/Product Gallery Images/no-image-1.jpg') }}" alt="Image" class="img img-responsive">
										@endif
									</div>
								</div>
								<p class="team-name">
									{{ $product['name'] }}
								</p>
								<form action="{{ url('/add-to-cart') }}" method="post">
									{!! csrf_field() !!}
									<input type="hidden" name="id" value="{{ $product['id'] }}" />
									<input type="hidden" name="redirect_page" value="/" />
									<div class="quantity">
										<a href="javascript:void(0)" class="minus-btn btn btn-default"> <i class="fa fa-minus"></i> </a>
										<input type="text" name="quantity" value="1">

										<a href="javascript:void(0)" class="plus-btn btn btn-default"> <i class="fa fa-plus"></i> </a>
									</div>
									<div class="product-info">
										<ul class="list-inline">
											<li class="rating">
												<a href="javascript:void(0)"> <?php  $product_rating = $product['rating'] ?>
												@for($i=1;$i<=$product_rating;$i++) <i class="fa fa-star"></i> <?php $counts = $i ?>
												@endfor
												<?php $remaining_star = 5 - $counts; ?>
												@for($j=1;$j<=$remaining_star;$j++) <i class="fa fa-star-o"></i> @endfor </a>
											</li>
										</ul>
									</div>
									<p class="team-position">
										<a href="{{ url('product_details_page/'.$product['id']) }}" class="swin-btn btn-sm">Details</a>&nbsp;
										<button type="submit" class="swin-btn btn-sm" tabindex="0">
											Add to Cart
										</button>
									</p>
								</form>
								<hr>
							</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

</div>
@endsection
@section('javascript_content')
<script src="{{ URL::asset('js/Website_js/slider-carousal.js') }}"></script>
<script>
	$('.minus-btn').on('click', function(e) {
		e.preventDefault();
		var $this = $(this);
		var $input = $this.closest('div').find('input');
		var value = parseInt($input.val());

		if (value > 1) {
			value = value - 1;
		} else {
			value = 1;
		}

		$input.val(value);

	});

	$('.plus-btn').on('click', function(e) {
		e.preventDefault();
		var $this = $(this);
		var $input = $this.closest('div').find('input');
		var value = parseInt($input.val());

		if (value < 1000) {
			value = value + 1;
		} else {
			value = value + 1;
		}

		$input.val(value);
	}); 
</script>
@endsection