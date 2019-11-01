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
		text-align: center;
		margin-top:10px;
		margin-bottom:20px;
	}
	.group-btn{
		text-align: center;
	}
</style>
@endsection
@section('body_content_top_banner')
<div data-bottom-top="background-position: 50% 50px;" data-center="background-position: 50% 0px;" data-top-bottom="background-position: 50% -50px;" class="page-title {{ $main_category->category_slug }}">
	<div class="container">
		<div class="title-wrapper">
			<div data-top="transform: translateY(0px);opacity:1;" data--20-top="transform: translateY(-5px);" data--50-top="transform: translateY(-15px);opacity:0.8;" data--120-top="transform: translateY(-30px);opacity:0;" data-anchor-target=".page-title" class="title">
				@foreach($product_details as $index => $product)
					@if(1 > $index)
						{{ $product['category_name'] }}
					@endif
				@endforeach
			</div>
			<div data-top="opacity:1;" data--120-top="opacity:0;" data-anchor-target=".page-title" class="divider">
				<span class="line-before"></span><span class="dot"></span><span class="line-after"></span>
			</div>
			<div data-top="transform: translateY(0px);opacity:1;" data--20-top="transform: translateY(5px);" data--50-top="transform: translateY(15px);opacity:0.8;" data--120-top="transform: translateY(30px);opacity:0;" data-anchor-target=".page-title" class="subtitle">
				Available Products
			</div>
		</div>
	</div>
</div>

@endsection

@section('body_content')

<div class="panel panel-default">
	<div class="panel-heading">
		<span class="my-header"><strong> Products </strong></span>
	</div>
	<div class="panel-body">
		<ul class="catCardList">
			@foreach($product_details as $product)
			<li class="catCardList">
				<div class="catCard">
					<!--a href="#"><img src="http://placehold.it/221x200" alt=""></a-->
					@if(isset($product['image']))
						<a href="javascript:void(0)"><img src="{{ URL::asset('images/Product Gallery Images/'.$product['image']) }}" alt=""></a>
					@else
						<a href="javascript:void(0)"><img src="{{ URL::asset('images/Product Gallery Images/no-image-1.jpg') }}" alt=""></a>
					@endif
					<div class="lowerCatCard">
						<h3>{{ $product['name'] }}</h3>
						<div class="startingPrice">
							Price : <span> &#x9f3; {{ $product['price'] }}</span>
						</div>
						<p class="description">
							{{ $product['description'] }}
						</p>
						
						<div class="product-info">
	                      <ul class="list-inline">
	                        <li class="rating">
	                        	<a href="javascript:void(0)">
	                        		<?php  $product_rating = $product['rating'] ?>
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
						<!--div id="catCardButton" class="button">
						<a href="#">View Product</a>
						</div-->
						<form action="{{ url('/add-to-cart') }}" method="post">
							{!! csrf_field() !!}
							<input type="hidden" name="id" value="{{ $product['id'] }}" />
							<input type="hidden" name="redirect_page" value="product_page" />
							
							<div class="quantity">
								<a href="javascript:void(0)" class="minus-btn btn btn-default">
									<i class="fa fa-minus"></i>
								</a>
								<input type="text" name="quantity" value="1">
								
								<a href="javascript:void(0)" class="plus-btn btn btn-default">
									<i class="fa fa-plus"></i>
								</a>
							</div>
							<div class="group-btn">
								<span><a href="{{ url('product_details_page/'.$product['id']) }}" class="swin-btn btn-link" tabindex="0"><i class="icons fa fa-link"></i></a></span>&nbsp;
								<button type="submit" class="swin-btn btn-add-to-card" tabindex="0"> <i class="fa fa-shopping-basket"></i></button>
							</div>
						</form>
					</div>
				</div>
			</li>
			@endforeach
		</ul>
	</div>
</div>

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
</script>
@endsection