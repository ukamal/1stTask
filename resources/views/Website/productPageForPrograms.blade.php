@extends('layouts.website')
@section('css_content')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/Website_css/product-list.css') }}">
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
	
	.swin-btn-square {
	    min-width: 50px;
	    min-height: 20px;
	    padding: 10px 35px;
	    background-color: #ffffff;
	    border: 1px solid #f15f2a;
        border-bottom-width: 1px;
        border-bottom-style: solid;
        border-bottom-color: rgb(241, 95, 42);
	    text-transform: uppercase;
	    display: inline-block;
	    position: relative;
	    color: #f15f2a;
	}
	
	.swin-btn-square:hover {
		border-bottom: solid 1px #f15f2a;
		box-shadow: 0 2px 3px #a8a8a8;
		transform: scale(1.04);
		-webkit-transform: scale(1.04);
		-moz-transform: scale(1.04);
		-o-transform: scale(1.04);
		-ms-transform: scale(1.04);
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
	
	.swin-sc-product.products-02 .products .item .title {
	    margin-top: 0;
	    margin-bottom: 8px;
	    font-size: 26px;
	    text-transform: capitalize;
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
				Available Packages
			</div>
		</div>
	</div>
</div>

@endsection

@section('body_content')
<section class="product-related padding-top-0 padding-bottom-0">

	<div class="swin-sc swin-sc-product products-02 carousel-01 woocommerce">
		<div class="panel panel-default">
			<div class="panel-heading">
				<input type="hidden" id="list-sidebar-active" value="{{ $program->program_slug }}-id" />
				<span class="my-header"><strong> List of Packages</strong></span>
			</div>
			<div class="panel-body">
				@foreach($package_with_products as $packages)
				<div class="col-md-6">
					<div class="products">
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
									<ul style="list-style-type: none;">
										@foreach($packages['package_products'] as $index => $package_products)
											<?php $product = $package_products->product ?>
												<li class="author">
													{{ ++$index }}) &nbsp; {{ $product->product_name }}
												</li>
										@endforeach
										<!--li class="rating">
										<a href="javascript:void(0)"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></a>
										</li-->
									</ul>
								</div>
								<form action="{{ url('/add-package-to-cart') }}" method="post">
									{!! csrf_field() !!}
									<input type="hidden" name="id" value="{{ $packages['package_info']->id }}" />
									<input type="hidden" name="redirect_page" value="product_page_for_programs" />
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
								<span><a href="{{ url('/product_details_page_for_programs/'.$packages['package_info']->id.'/'.$dish_type) }}" class="swin-btn btn-link" tabindex="0" data-toggle="popover" data-trigger="hover" data-content="Details"><i class="icons fa fa-link"></i></a></span>&nbsp;
								<button type="submit" class="swin-btn btn-add-to-card" tabindex="0" data-toggle="popover" data-trigger="hover" data-content="Add to Cart"><i class="fa fa-shopping-basket"></i></button>
							</div>
							</form>
							<br />
						</div>
					</div>
				</div>
				@endforeach
			</div>
			<hr />
			<div class="panel-body">
				<div class="col-md-12" style="text-align: center">
					<a href="{{ url('/create_custom_menu/'.$program->id.'/'.$dish_type) }}" class="swin-btn-square"><i class="fa fa-plus"></i>&nbsp; Create your own menu</a>
				</div>
			</div>
			<br />
		</div>
	</div>
</section>
@endsection
@section('javascript_content')
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
	
	$(document).ready(function(){
		
		$('[data-toggle="popover"]').popover();  
		
		var id = $('#list-sidebar-active').val();
		$('#'+id).addClass("program-active");
	});
</script>
@endsection