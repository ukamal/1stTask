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
	
	.quantity input {
		-webkit-appearance: none;
		border: none;
		text-align: center;
		width: 32px;
		font-size: 16px;
		color: #43484D;
		font-weight: 300;
	}
	
	.meta-info-caption {
		font-size: 22px;
		color: #29272e;
	}
	
	.informations{
		margin-top: 20px;
		margin-bottom: 20px;
	}
	
	.btn-cart{
		margin-top: 30px;
	}

</style>
@endsection
@section('body_content_top_banner')
<div data-bottom-top="background-position: 50% 50px;" data-center="background-position: 50% 0px;" data-top-bottom="background-position: 50% -50px;" class="page-title {{ $main_category->category_slug }}">
	<div class="container">
		<div class="title-wrapper">
			<div data-top="transform: translateY(0px);opacity:1;" data--20-top="transform: translateY(-5px);" data--50-top="transform: translateY(-15px);opacity:0.8;" data--120-top="transform: translateY(-30px);opacity:0;" data-anchor-target=".page-title" class="title">
				{{ $sub_category->category_name }}
			</div>
			<div data-top="opacity:1;" data--120-top="opacity:0;" data-anchor-target=".page-title" class="divider">
				<span class="line-before"></span><span class="dot"></span><span class="line-after"></span>
			</div>
			<div data-top="transform: translateY(0px);opacity:1;" data--20-top="transform: translateY(5px);" data--50-top="transform: translateY(15px);opacity:0.8;" data--120-top="transform: translateY(30px);opacity:0;" data-anchor-target=".page-title" class="subtitle">
				Product Details
			</div>
		</div>
	</div>
</div>

@endsection

@section('body_content')
<section class="product-single padding-top-0">
	<div class="panel panel-default">
		<div class="panel-heading">
			<span class="my-header"><strong> Product Details </strong></span>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-6">
					<div class="product-image">
						<div class="product-featured-image">
							<div class="main-slider">
								<div class="slides">
									@foreach($product_details as $product_images)
									<?php $check_details_image = $product_images -> product_gallery_images -> isEmpty(); ?>
									@if($check_details_image==true)
										<div class="featured-image-item"><img src="{{ URL::asset('images/Product Gallery Images/no-image-1.jpg') }}" alt="" class="img img-responsive">
										</div>
									@else
									@foreach($product_images->product_gallery_images as $images)
										<div class="featured-image-item mag"><img data-toggle="magnify" src="{{ URL::asset('images/Product Gallery Images/'.$images->gallery_image) }}" alt="" class="img img-responsive">
										</div>
									@endforeach
									@endif
									@endforeach
								</div>
							</div>
							<div data-width="150" class="nav-slider">
								<ul class="slides list-inline">
									@foreach($product_details as $product_images)
									@foreach($product_images->product_gallery_images as $images)
									<li class="swin-transition thumbnail-image-item">
										<a href="javascript:void(0)" class="testimonial-nav-item"><img src="{{ URL::asset('images/Product Gallery Images/'.$images->gallery_image) }}" alt="" class="img img-responsive swin-transition"></a>
									</li>
									@endforeach
									@endforeach
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="product-summary">
						@foreach($product_details as $product)
						<div class="product-title">
							<div class="title">
								{{ $product->product_name }}
							</div>
						</div>
						<div class="product-price">
							<div class="price">
								<?php $product_price = number_format($product->product_price) ?>
								&#x9f3; {{ $product_price }}
							</div>
						</div>
						
						<br />
						<div class="col-md-12 informations">
							<div class="meta-info-caption col-md-5">
								Description 
							</div>

							<div class="col-md-5">
								<p>
									{{ $product->product_description }}
								</p>
							</div>
							
							<div class="col-md-5"></div>
							<div class="product-info col-md-5">
		                      	<ul class="list-inline">
		                        	<li class="rating">
			                        	<a href="javascript:void(0)">
			                        		<?php  $product_rating = $product->product_rating ?>
			                        		@for($i=1;$i<=$product_rating;$i++)
			                        		<i class="fa fa-star"></i>
			                        		<?php $counts = $i ?>
			                        		@endfor
			                        		<?php $remaining_star = 5- $counts; ?>
			                        		@for($j=1;$j<=$remaining_star;$j++)
			                        		<i class="fa fa-star-o"></i>
			                        		@endfor
			                        	</a>
		                        	</li>
		                      	</ul>
		                    </div>
						</div>
						
						
						<form action="{{ url('/add-to-cart') }}" method="post">
							{!! csrf_field() !!}
							<input type="hidden" name="id" value="{{ $product->id }}" />
							<input type="hidden" name="redirect_page" value="product_details_page" />
							<div class="col-md-12 informations">
								<div class="meta-info-caption col-md-5">
									Quantity
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
						
						@endforeach
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
					@if($check_if_empty!=true)
					@foreach($other_products as $products)
						<div class="blog-item item swin-transition col" style="position: relative;">
							<div class="block-img">
								<?php $check_other_image = $products -> product_gallery_images -> isEmpty(); ?>
								@if($check_other_image==true)
								<img src="{{ URL::asset('images/Product Gallery Images/no-image-1.jpg') }}" alt="" class="img img-responsive ">
								@else
								@foreach($products->product_gallery_images as $index => $gallery_images )
								@if($index<1)
								<img src="{{ URL::asset('images/Product Gallery Images/'.$gallery_images->gallery_image) }}" alt="" class="img img-responsive">
								@endif
								@endforeach
								@endif
								<div class="block-circle price-wrapper">
									<span class="package-products-price">&#x9f3; {{ $products->product_price }} </span>
								</div>
								<div class="group-btn">
									<a href="{{ url('product_details_page/'.$products->id) }}" class="swin-btn btn-link"><i class="icons fa fa-link"></i></a>
									<!--a href="{{ url('add-to-cart/'.$products->id.'/'.'product_details_page') }}" class="swin-btn btn-add-to-card"><i class="fa fa-shopping-basket"></i></a-->
								</div>
							</div>
							<div class="block-content">
								<h6 class="title">{{ $products->product_name }}</h6>

								<div class="product-info">
									<ul class="list-inline">
										<li class="author">
											<span>{{ $products->product_description }}</span>
										</li>
										<!--li class="rating">
										<a href="javascript:void(0)"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></a>
										</li-->
									</ul>
								</div>

								<div class="product-info rtrt" style="position: absolute; bottom: 0;">
			                      <ul class="list-inline">
			                        <li class="rating">
			                        	<a href="javascript:void(0)">
			                        		<?php  $product_rating = $products->product_rating ?>
			                        		@for($i=1;$i<=$product_rating;$i++)
			                        		<i class="fa fa-star"></i>
			                        		<?php $counts = $i ?>
			                        		@endfor
			                        		<?php $remaining_star = 5- $counts; ?>
			                        		@for($j=1;$j<=$remaining_star;$j++)
			                        		<i class="fa fa-star-o"></i>
			                        		@endfor
			                        	</a>
			                        </li>
			                      </ul>
			                    </div>
							</div>
						</div>
					@endforeach
					@endif
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
@section('javascript_content')
<script src="{{ URL::asset('js/Website_js/magnify.js') }}"></script>
<script>
    $(window).load(function () {
        var maxHeight = 0;

        $(".col").each(function (index, element) {
            if(element.clientHeight > maxHeight) {
                maxHeight = $(element).height();
            }
        });


        $(".col").each(function () {
            $(this).height(maxHeight);
        });
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