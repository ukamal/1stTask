@extends('layouts.website')
@section('css_content')
<link rel="stylesheet" href="{{ URL::asset('css/Website_css/magnify.css') }}">
<style>
	.my-header {
		padding: 1em;
		font-size: 25px;
		font-family: 'Calibri';
	}
	.slick-slide img {
		margin: auto;
		width: 333px;
		padding: 5px;
	}

	.meta-info-caption {
		font-size: 22px;
		color: #29272e;
	}

	.is-active {
		animation-name: animate;
		animation-duration: .8s;
		animation-iteration-count: 1;
		animation-timing-function: steps(28);
		animation-fill-mode: forwards;
	}

	.active {
		background: #f15f2a !important;
		color: white
	}

	.active .mytext {
		color: white
	}
	
	.information{
		margin-bottom: 20px;
	}
	
	.btn-cart{
		margin-top: 20px;
	}
	
	.active-image{
		font-size: 22px;
		color : #f15f2a;
		-webkit-transition: all .5s ease;
		-moz-transition: all .5s ease;
		transition: all .5s ease;
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
	
	.group-btn{
		text-align: center;
	}
	
	div.header-list{
		font-size: 22px;
		padding-bottom: 8px;
	}
	
	.header-list span{
		color: #f15f2a;
	}
	
	.list_icons{
		font-size: 12px;
	}
	
	.quantity{
		margin-top: 20px;
		margin-bottom: 20px;
		text-align: center;
	}
	
	div.product-info {
	    text-align: left;
	}
	
	@media(max-width:480px){
		.my-header {
			font-size: 22px;
		}
	}
	
</style>
@endsection
@section('body_content_top_banner')
<div data-bottom-top="background-position: 50% 50px;" data-center="background-position: 50% 0px;" data-top-bottom="background-position: 50% -50px;" class="page-title page-product">
	<div class="container">
		<div class="title-wrapper">
			<div data-top="transform: translateY(0px);opacity:1;" data--20-top="transform: translateY(-5px);" data--50-top="transform: translateY(-15px);opacity:0.8;" data--120-top="transform: translateY(-30px);opacity:0;" data-anchor-target=".page-title" class="title">
				{{ $program->program_name }}
			</div>
			<div data-top="opacity:1;" data--120-top="opacity:0;" data-anchor-target=".page-title" class="divider">
				<span class="line-before"></span><span class="dot"></span><span class="line-after"></span>
			</div>
			<div data-top="transform: translateY(0px);opacity:1;" data--20-top="transform: translateY(5px);" data--50-top="transform: translateY(15px);opacity:0.8;" data--120-top="transform: translateY(30px);opacity:0;" data-anchor-target=".page-title" class="subtitle">
				Package Details
			</div>
		</div>
	</div>
</div>

@endsection

@section('body_content')
<section class="product-single padding-top-0">
	<div class="panel panel-default">
		<div class="panel-heading">
			<input type="hidden" id="list-sidebar-active" value="{{ $program->program_slug }}-id" />
			<span class="my-header"><strong> Package Details </strong></span>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-6">
					<div class="product-image">
						<div class="product-featured-image">
							<div class="main-slider">
								<div class="slides">
									@foreach($product_images as $images)
										@if($images['images']=='')
											<div class="featured-image-item mag"><img data-toggle="magnify" src="{{ URL::asset('images/Product Gallery Images/no-image-1.jpg') }}" alt="" class="img img-responsive">
											</div>
										@else
											<div class="featured-image-item mag"><img data-toggle="magnify" src="{{ URL::asset('images/Product Gallery Images/'.$images['images']) }}" alt="" class="img img-responsive">
											</div>
										@endif
									@endforeach
								</div>
							</div>
							<div data-width="150" class="nav-slider">
								<ul class="slides list-inline">
									@foreach($product_images as $index => $images)
										@if($images['images']=='')
											<li class="swin-transition thumbnail-image-item">
												<a href="javascript:void(0)" class="testimonial-nav-item"><img id="{{ ++$index }}_image" src="{{ URL::asset('images/Product Gallery Images/no-image-1.jpg') }}" alt="" class="img img-responsive swin-transition gallery_images"></a>
											</li>
										@else
											<li class="swin-transition thumbnail-image-item">
												<a href="javascript:void(0)" class="testimonial-nav-item"><img id="{{ ++$index }}_image" src="{{ URL::asset('images/Product Gallery Images/'.$images['images']) }}" alt="" class="img img-responsive swin-transition gallery_images"></a>
											</li>
										@endif
									@endforeach
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="product-summary">
						<div class="product-title">
							<div class="title">
								{{ $package->package_name }}
							</div>
						</div>
						<div class="product-price">
							<div class="price">
								@if($dish_type=="Box")
									&#x9f3; {{ $package->box_price }} 
								@else
									&#x9f3; {{ $package->buffet_price }}
								@endif
							</div>
						</div>

						<div class="col-md-8 information">
							<ul class="list-inline">
								@foreach($package_products as $index => $products)
								<li class="author">
									<span id="{{ ++$index }}_text" class="text-name"> {{ $index }}) &nbsp; {{ $products->product->product_name }} </span>
								</li>
								<br />
								@endforeach
								<!--li class="rating">
								<a href="javascript:void(0)"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></a>
								</li-->
							</ul>
						</div>
						
						<div class="col-md-12 information">
							<div class="meta-info-caption col-md-5">
								Type 
							</div>

							<div class="meta-info-text btn-group col-md-6" data-toggle="buttons" id="modelselect">
								<label class="btn btn-default {{ ($dish_type=="Box")? 'active' : '' }}">
									<form action="{{ url('/get_package_details') }}" method="post">
										{!! csrf_field() !!}
										<input type="hidden" name="package_id" value="{{ $package->id }}" />
										<input type="hidden" name="dish_type" value="Box" />
										<input type="radio" name="options" id="option1" value="Opt-1" onchange="this.form.submit()" />
									</form>
									
									
									<span class="mytext"> Box </span> </label>
								<label class="btn btn-default {{ ($dish_type=="Buffet")? 'active' : '' }}">
									<form action="{{ url('/get_package_details') }}" method="post">
										{!! csrf_field() !!}
										<input type="hidden" name="package_id" value="{{ $package->id }}" />
										<input type="hidden" name="dish_type" value="Buffet" />
										<input type="radio" name="options" id="option2" value="Opt-2" onchange="this.form.submit()" />
									</form>
									<span class="mytext"> Buffet </span> </label>
							</div>
						</div>
						
						
						<form action="{{ url('/add-package-to-cart') }}" method="post">
							{!! csrf_field() !!}
							<input type="hidden" name="id" value="{{ $package->id }}" />
							<input type="hidden" name="redirect_page" value="product_details_page_for_programs" />
							<input type="hidden" name="dish_type" value="{{ $dish_type }}" />
							
							<div class="col-md-12 information">
								<div class="meta-info-caption col-md-5">
									
									@if($dish_type=="Box")
										Quantity
									@else
										Attendants
									@endif
									
								</div>
								<div class="quantity col-md-5">
									<a href="javascript:void(0)" class="minus-btn btn btn-default">
										<i class="fa fa-minus"></i>
									</a>
									<input type="text" name="quantity" value="1">
									
									<a href="javascript:void(0)" class="plus-btn btn btn-default">
										<i class="fa fa-plus"></i>
									</a>
								</div>
							</div>
							
							<div class="col-md-12 btn-cart">
								<button type="submit" class="swin-btn btn-add-to-card"> <span>Add To Cart</span></button>
							</div>
						</form>
					</div>
				</div>

			</div>
		</div>
	</div>
</section>

<section class="product-related padding-top-0 padding-bottom-20">

	<div class="swin-sc swin-sc-product products-02 carousel-01 woocommerce">
		<div class="panel panel-default">
			<div class="panel-heading">
				<span class="my-header"><strong> You may also like </strong></span>
			</div>
			<div class="panel-body">
				<div class="products nav-slider">
					@foreach($other_package_with_products as $packages)
						<div class="blog-item item swin-transition">
							<div class="block-content">
								<h6 class="title">{{ $packages['package_info']->package_name }}</h6>
								<hr />
								<div class="header-list">
									Price : 
									<span> 
										@if($dish_type=="Box")
											&#x9f3; {{ $packages['package_info']->box_price }}
										@else
											&#x9f3; {{ $packages['package_info']->buffet_price }}
										@endif
									</span>
								</div>
								<div class="header-list">
									Menu 
								</div> 
								<div class="product-info">
									<ul class="list-inline">
										@foreach($packages['package_products'] as $index => $package_products)
											<?php $product = $package_products->product ?> 
											@if($product!=null)
												<li class="author">
													{{ ++$index }}) &nbsp; {{ $product->product_name }}
												</li>
											@else
												<li class="author">
													{{ ++$index }}) &nbsp; Not Available
												</li>
											@endif
										@endforeach
										<!--li class="rating">
										<a href="javascript:void(0)"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></a>
										</li-->
									</ul>
								</div>
								<form action="{{ url('/add-package-to-cart') }}" method="post">
									{!! csrf_field() !!}
									<input type="hidden" name="id" value="{{ $packages['package_info']->id }}" />
									<input type="hidden" name="redirect_page" value="product_details_page_for_programs" />
									<input type="hidden" name="dish_type" value="{{ $dish_type }}" />
								<div class="quantity">
									<a href="javascript:void(0)" class="minus-btn btn btn-default">
										<i class="fa fa-minus"></i>
									</a>
									<input type="text" name="quantity" value="1">
									
									<a href="javascript:void(0)" class="plus-btn btn btn-default">
										<i class="fa fa-plus"></i>
									</a>
								</div>
							</div>
							<div class="group-btn">
								<span><a href="{{ url('/product_details_page_for_programs/'.$packages['package_info']->id.'/'.$dish_type) }}" class="swin-btn btn-link" tabindex="0"><i class="icons fa fa-link"></i></a></span>&nbsp;
								<button type="submit" class="swin-btn btn-add-to-card" tabindex="0"><i class="fa fa-shopping-basket"></i></button>
							</div>
							</form>
							<br />
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
@section('javascript_content')
<script src="{{ URL::asset('js/Website_js/magnify.js') }}"></script>
<script>

	$(document).ready(function(){
	    $(".gallery_images").hover(function() { 
	    
	    	var image_id = $(this).attr('id');
			var str = image_id.split("_");
			var value = str[0];
			var text_id = value+'_text';
				
		    $('.text-name').removeClass('active-image');
		    
	  		if($('#'+text_id).hasClass( "active-image" )){
				$('#'+text_id).removeClass( "active-image" );
			}else{
				$('#'+text_id).addClass( "active-image" );
			}
	    });
	    
	   
		var id = $('#list-sidebar-active').val();
		$('#'+id).addClass("program-active");
	
	});
	
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