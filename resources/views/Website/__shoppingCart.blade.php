@extends('layouts.website')
@section('css_content')
<style>
	.shopping-cart {
		width: 1150px;
		height: auto;
		overflow: hidden;
		margin: 80px auto;
		background: #FFFFFF;
		/*box-shadow: 1px 2px 3px 0px rgba(0,0,0,0.10);*/
		box-shadow: 0 0 10px rgba(0, 0, 0, 0.21);
		border-radius: 6px;
		display: flex;
		flex-direction: column;
	}

	.tableTitle {
		height: 60px;
		border-bottom: 1px solid #E1E8EE;
		padding: 10px 30px;
		color: #5E6977;
		font-size: 25px;
		font-weight: 400;
	}

	.shop_items {
		padding: 20px 30px;
		height: 120px;
		display: flex;
		border-bottom: 1px solid #E1E8EE;
	}
	.buttons {
		position: relative;
		padding-top: 30px;
		margin-right: 60px;
	}

	.delete-btn, .like-btn {
		display: inline-block;
		Cursor: pointer;
	}
	.delete-btn {
		width: 18px;
		height: 17px;
		/*background: url("{{ URL::asset('img/icons8-Delete.svg') }}") no-repeat center;*/
	}

	.like-btn {
		position: absolute;
		top: 9px;
		left: 15px;
		/*background: url('twitter-heart.png');*/
		width: 60px;
		height: 60px;
		background-size: 2900%;
		background-repeat: no-repeat;
	}

	.is-active {
		animation-name: animate;
		animation-duration: .8s;
		animation-iteration-count: 1;
		animation-timing-function: steps(28);
		animation-fill-mode: forwards;
	}

	.active {
		background: #D32512 !important;
		color: white
	}

	.active .mytext {
		color: white
	}

	@keyframes animate {
	0%   { background-position: left;  }
	50%  { background-position: right; }
	100% { background-position: right; }
	}

	.image {
		margin-right: 50px;
	}

	/*Let's add some basic style to  product name and description.*/
	.description {
		padding-top: 10px;
		margin-right: 60px;
		width: 115px;
	}

	.description span {
		display: block;
		font-size: 14px;
		color: #43484D;
		font-weight: 400;
	}

	.description span:first-child {
		margin-bottom: 5px;
	}
	.description span:last-child {
		font-weight: 300;
		margin-top: 8px;
		color: #86939E;
	}

	.quantity {
		padding-top: 20px;
		margin-right: 60px;
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

	.menuType {
		padding-top: 20px;
		margin-right: 60px;
	}

	button[class*=btn] {
		width: 30px;
		height: 30px;
		background-color: #E1E8EE;
		border-radius: 6px;
		border: none;
		cursor: pointer;
	}
	/*.minus-btn img {
	 margin-bottom: 3px;
	 }
	 .plus-btn img {
	 margin-top: 2px;
	 }*/

	button:focus, input:focus {
		outline: 0;
	}

	.total-price {
		width: 83px;
		padding-top: 27px;
		text-align: center;
		font-size: 16px;
		color: #43484D;
		font-weight: 300;
		margin-right: 60px;
	}

	.final-price {
		width: 83px;
		padding-top: 27px;
		text-align: right;
		font-size: 16px;
		color: #43484D;
		font-weight: 400;
		margin-right: 60px;
	}

	.net-price {
		width: 83px;
		padding-top: 24px;
		text-align: right;
		font-size: 18px;
		color: #43484D;
		margin-left: 715px;
	}

	.shopping_continue {
		padding-top: 24px;
		text-align: right;
		margin-left: 641px;
	}

	.image img {
		width: 128px;
	}

	.total-text {
		text-align: center;
		padding-top: 22px;
		font-size: 20px;
		color: #43484D;
		margin-left: 72px;
	}

	.checkout_btn {
		text-align: center;
		padding-top: 22px;
		margin-left: 24px;
	}

	@media (max-width: 800px) {
		.shopping-cart {
			width: 100%;
			height: auto;
			overflow: hidden;
		}

		.net-price {
			text-align: right;
			font-size: 18px;
			margin-left: 0px;
		}

		.total-text {
			text-align: left;
			font-size: 20px;
			margin-left: -11px;
		}

		.checkout_btn {
			text-align: left;
			margin-left: -11px;
		}

		.shopping_continue {
			text-align: right;
			margin-left: 0px;
		}

		.total-price {
			margin-right: 0px;
		}

		.final-price {
			margin-right: 28px;
		}

		.shop_items {
			height: auto;
			flex-wrap: wrap;
			justify-content: center;
		}
		.image img {
			width: 110px;
		}
		.image, .quantity, .description {
			width: 100%;
			text-align: center;
			margin: 6px 0;
		}
		.buttons {
			margin-right: -9px;
		}

		.menuType {
			padding-top: 20px;
			margin-right: 0px;
		}

	}

</style>
@endsection
@section('body_content_top_banner')
<div data-bottom-top="background-position: 50% 50px;" data-center="background-position: 50% 0px;" data-top-bottom="background-position: 50% -50px;" class="page-title page-product">
	<div class="container">
		<div class="title-wrapper">
			<div data-top="transform: translateY(0px);opacity:1;" data--20-top="transform: translateY(-5px);" data--50-top="transform: translateY(-15px);opacity:0.8;" data--120-top="transform: translateY(-30px);opacity:0;" data-anchor-target=".page-title" class="title">
				Shopping List
			</div>
			<div data-top="opacity:1;" data--120-top="opacity:0;" data-anchor-target=".page-title" class="divider">
				<span class="line-before"></span><span class="dot"></span><span class="line-after"></span>
			</div>
			<div data-top="transform: translateY(0px);opacity:1;" data--20-top="transform: translateY(5px);" data--50-top="transform: translateY(15px);opacity:0.8;" data--120-top="transform: translateY(30px);opacity:0;" data-anchor-target=".page-title" class="subtitle">
				Salsa Catering Service
			</div>
		</div>
	</div>
</div>

@endsection

@section('body_content')

<section class="padding-top-0">
	<div class="panel panel-default">
		<div class="panel-heading">
			<span class="my-header"><strong> Product Details </strong></span>
		</div>
		<div class="shopping-cart">
			<!-- Title -->
			<div class="tableTitle">
				Shopping Bag
			</div>

			@foreach($product_details as $products)
			<div class="shop_items">
				<div class="buttons">
					<span class="delete-btn"> <i class="fa fa-times"></i> </span>
					<!--span class="like-btn"></span-->
				</div>

				<div class="image">
					@foreach($products['item']->product_gallery_images as $index => $images)
					@if($index<1)
					<img src="{{ URL::asset('images/Product Gallery Images/'.$images->gallery_image) }}" alt="Product Image" />
					@endif
					@endforeach
				</div>

				<div class="description">
					<span>Common Projects</span>
					<span>Bball High</span>
					<span>White</span>
				</div>

				<div class="btn-group menuType" data-toggle="buttons" id="modelselect">
					<label class="btn btn-default active">
						<input type="radio" name="options" id="option1" value="Opt-1" />
						<span class="mytext"> Box </span> </label>
					<label class="btn btn-default">
						<input type="radio" name="options" id="option2" value="Opt-2" />
						<span class="mytext"> Buffet </span> </label>

				</div>

				<div class="total-price">
					549 TK
				</div>

				<div class="quantity">
					<button class="minus-btn" type="button" name="button">
						<i class="fa fa-minus"></i>
					</button>
					<input type="text" name="name" value="0">

					<button class="plus-btn" type="button" name="button">
						<i class="fa fa-plus"></i>
					</button>
				</div>

				<div class="final-price">
					549 TK
				</div>

			</div>
			@endforeach
			<!-- Grand Total -->

			<div class="shop_items">
				<div class="total-text">
					Total Amount
					<!--span class="like-btn"></span-->
				</div>

				<div class="net-price">
					549 TK
				</div>

			</div>

			<div class="shop_items">
				<div class="checkout_btn">
					<a href="{{ url('cart_checkout_info_page') }}" class="swin-btn btn-sm">Proceed to Checkout</a>
				</div>

				<div class="shopping_continue">
					<a href="#" class="swin-btn btn-sm">Continue Shopping</a>
				</div>
			</div>

		</div>

		@endsection
		@section('javascript_content')
		<script>
			$('.like-btn').on('click', function() {
				$(this).toggleClass('is-active');
			});

			$('.minus-btn').on('click', function(e) {
				e.preventDefault();
				var $this = $(this);
				var $input = $this.closest('div').find('input');
				var value = parseInt($input.val());

				if (value > 1) {
					value = value - 1;
				} else {
					value = 0;
				}

				$input.val(value);

			});

			$('.plus-btn').on('click', function(e) {
				e.preventDefault();
				var $this = $(this);
				var $input = $this.closest('div').find('input');
				var value = parseInt($input.val());

				if (value < 100) {
					value = value + 1;
				} else {
					value = 100;
				}

				$input.val(value);
			});
		</script>
		@endsection
