@extends('layouts.website')
@section('css_content')
<style>
	.my-header {
		padding: 1em;
		font-size: 25px;
		font-family: 'Calibri';
	}
	.header_tite {
		font-size: 18px;
		font-weight: 400;
	}

	.heading {
		border-bottom: 1px solid #E1E8EE;
	}

	.order_details {
		padding-top: 18px;
		padding-bottom: 65px;
	}

	.order_form {
		padding-top: 16px;
		padding-bottom: 40px;
	}

	.price {
		text-align: right;
	}

	.type {
		text-align: center;
	}
	.quantity {
		text-align: center;
	}
	
	.swin-sc-contact-form .form-group {
	    padding: 11px 15px;
	    margin-bottom: 30px;
	}
	@media (max-width: 800px) {
		.tableTitle {
			font-size: 22px;
		}
		.header_tite {
			font-size: 16px;
		}

		.order_form {
			padding-top: 30px;
			padding-bottom: 40px;
		}

		.items {
			padding-bottom: 30px;
		}
	}
</style>
@endsection
@section('body_content_top_banner')
<div data-bottom-top="background-position: 50% 50px;" data-center="background-position: 50% 0px;" data-top-bottom="background-position: 50% -50px;" class="page-title page-product">
	<div class="container">
		<div class="title-wrapper">
			<div data-top="transform: translateY(0px);opacity:1;" data--20-top="transform: translateY(-5px);" data--50-top="transform: translateY(-15px);opacity:0.8;" data--120-top="transform: translateY(-30px);opacity:0;" data-anchor-target=".page-title" class="title">
				Checkout
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

<div class="panel panel-default">
	<div class="panel-heading">
		<span class="my-header"><strong> Your Order Details </strong></span>
	</div>
	<div class="panel-body">
		<div class="reservation-form style-02">
			<div class="swin-sc swin-sc-contact-form light mtl style-full">
				<div class="col-md-12 col-xs-12 col-sm-12 order_details">
					<div class="form-group heading">
						<div class="col-md-6 col-xs-6 col-sm-6 header_tite">
							<strong> Products </strong>
						</div>
						<div class="price col-md-6 col-xs-6 col-sm-6 header_tite">
							<strong> Price </strong>
						</div>
					</div>
					<div class="form-group col-md-12 col-xs-12 col-sm-12 items">
						<div class="col-md-6 col-xs-6 col-sm-6">
							Khichuri &nbsp; &nbsp; <strong> x 2 </strong> &nbsp; &nbsp; &nbsp; &nbsp; Buffet
						</div>
						<div class="price col-md-6 col-xs-6 col-sm-6">
							700 TK
						</div>
					</div>
					<br />
					<div class="form-group col-md-12 col-xs-12 col-sm-12">
						<div class="col-md-6 col-xs-6 col-sm-6">
							Khichuri &nbsp; &nbsp; <strong> x 1 </strong> &nbsp; &nbsp; &nbsp;  &nbsp; Box
						</div>
						<div class="price col-md-6 col-xs-6 col-sm-6">
							700 TK
						</div>
					</div>
					<br />
					<div class="form-group col-md-12 col-xs-12 col-sm-12">
						<div class="col-md-6 col-xs-6 col-sm-6 header_tite">
							<strong> Total </strong>
						</div>
						<div class="price col-md-6 col-xs-6 col-sm-6 header_tite">
							<strong> 1,200 TK </strong>
						</div>
					</div>
				</div>
				<form>
					<div class="form-group heading">
						<div class="col-md-12 col-xs-12 col-sm-12 header_tite">
							<strong> Enter Your Details </strong>
						</div>
					</div>
					<div class="col-md-12 col-xs-12 col-sm-12 order_form">
						<div class="form-group col-md-12 col-xs-12 col-sm-12">
							<div class="input-group">
								<div class="input-group-addon">
									<div class="fa fa-envelope"></div>
								</div>
								<input type="text" placeholder="Email" class="form-control">
							</div>
						</div>

						<div class="form-group col-md-12 col-xs-12 col-sm-12">
							<div class="input-group">
								<div class="input-group-addon">
									<div class="fa fa-phone"></div>
								</div>
								<input type="text" placeholder="Phone" class="form-control" value="+880">
							</div>
						</div>

						<div class="form-group col-md-12 col-xs-12 col-sm-12">
							<textarea placeholder="Address" class="form-control"></textarea>
						</div>
						<br />
						<div class="form-group">
							<div class="swin-btn-wrap">
								<a href="#" class="swin-btn center form-submit"><span>Place Order</span></a>
							</div>
						</div>
					</div>
				</form>
			</div>
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