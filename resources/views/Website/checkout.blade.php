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

	.info {
		font-style: italic;
		font-weight: lighter;
		text-align: right;
	}

	.myLabel {
		color: red;
	}

	#create_password_div {
		display: none;
	}

	#create_an_account_div {
		margin-left: 23px;
	}

	.table.table-unruled > tbody > tr > td, .table.table-unruled > tbody > tr > th {
		border-top: 0 none transparent;
		border-bottom: 0 none transparent;
	}
	
	.right-align{
		text-align: right;
	}
	
	.middle-align{
		text-align: center;
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
		<span class="my-header"><strong> Your Order Details</strong></span>
	</div>
	<div class="panel-body">

		
			<div class="col-xs-12 col-md-12">
				<div class="table-responsive">
					<table class="table table-unruled">
						<thead>
							<tr>
								<th>Title</th>
								<th>Details</th>
								<th class="middle-align">&#x9f3; Unit Price</th>
								<th class="middle-align">Quatity</th>
								<th class="right-align">&#x9f3; Price</th>
							</tr>
						</thead>
						<tbody>
							@if(isset($product_details))
								@foreach($product_details as $products)
									@if($products['qty']>0)
										<tr>
											<td>{{ $products['item']->product_name }}</td>
											<td>Product</td>
											<td class="middle-align">{{ $products['item']->product_price }}</td>
											<td class="middle-align">x {{ $products['qty'] }}</td>
											<?php $product_price = number_format($products['price']) ?>
											<td class="right-align">{{ $product_price }}</td>
										</tr>
									@endif
								@endforeach
							@endif
							
							@if(isset($package_details))
								@foreach($package_details as $package_detail)
									@if($package_detail['qty']>0)
										<tr>
											<td>{{ $package_detail['item']->package_name }}</td>
											<td>Package &nbsp; ( {{ $package_detail['package_type'] }} )</td>
											<td class="middle-align">{{ $package_detail['item']->product_price }}</td>
											<td class="middle-align">x {{ $package_detail['qty'] }}</td>
											<?php $package_price = number_format($package_detail['price']) ?>
											<td class="right-align">{{ $package_price }}</td>
										</tr>
										@foreach($package_detail['products'] as $products)
											<tr>
												<td></td>
												<td>&nbsp; &nbsp; - &nbsp; {{ $products->product->product_name }}</td>
												<td></td>
												<td></td>
												<td></td>
											</tr>
										@endforeach
									@endif
								@endforeach
							@endif
							
							@if(isset($custom_menu_details))
								@foreach($custom_menu_details as $main_index_custom_menu => $custom_menu)
									@if($custom_menu['qty']>0)
										<tr>
											<td>Your own Menu {{ ++$main_index_custom_menu }}</td>
											<td>Custom</td>
											<?php $total_price = number_format($custom_menu['total_price']) ?>
											<td class="middle-align">{{ $total_price }}</td>
											<td class="middle-align">x {{ $custom_menu['qty'] }}</td>
											<?php $grand_total = number_format($custom_menu['grand_total']) ?>
											<td class="right-align">{{ $grand_total }}</td>
										</tr>
										@foreach($custom_menu['item'] as $custom_menu_products)
											<tr>
												<td></td>
												<td>&nbsp; &nbsp; - &nbsp; {{ $custom_menu_products->product_name }}</td>
												<td></td>
												<td></td>
												<td></td>
											</tr>
										@endforeach
									@endif
								@endforeach
							@endif
							<tr>
								<td>Subtotal</td>
								<td></td>
								<td></td>
								<td></td>
								<?php $subtotal = number_format($subtotal) ?>
								<td class="right-align"> {{ $subtotal }}</td>
							</tr>
							<tr>
								<td>Vat will be added upon confirmation of the order</td>
								<td></td>
								<td></td>
								<td></td>
								<!-- add php tag $vat = number_format($vat) -->
								<td class="right-align"> <!-- add the curly braces for the laravel variables $vat --> </td>
							</tr>
							<!--tr>
								<td>Service Charge (10%)</td>
								<td></td>
								<td></td>
								<td></td>
								add php tag -> $service_charge = number_format($service_charge) 
								<td class="right-align"> <!-- add the curly braces for the laravel variables $service_charge </td>
							</tr-->
						</tbody>
						<tfoot>
							<tr>
								<th>Total</th>
								<th></th>
								<th></th>
								<th></th>
								<?php $totalPrice = number_format($totalPrice) ?>
								<th class="right-align">{{ $totalPrice }}</th>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		
		<hr />

		<?php
			if(Auth::check()) {
			    $username = Auth::user()->name;
			    $email = Auth::user()->email;
			    $addr = Auth::user()->delivery_address;
			}
		?>
		
		<div class="panel-body">
		<div class="form-group col-md-10 col-sm-offset-1">
			<form action="{{ url('checkout') }}" method="post">
				{!! csrf_field() !!}
				<div class="form-group">
					<label for="name" class="col-md-4">Name</label>
					<input type="text" name="name" value="{{ isset($username)? $username : '' }}" class="form-control" placeholder="Enter Your Name">
				</div>
				<div class="form-group">
					<label for="email" class="col-md-4"> Email <span class="myLabel">*</span></label><span class="info col-md-8"> <span class="myLabel">*</span> Invoice would be sent to this email address.</span>
					<input type="email" name="email" value="{{ isset($username)? $email : '' }}" class="form-control" placeholder="Enter your email">
					@if ($errors->has('email'))
					<p class="help-block myLabel">
						<span class="myLabel"> {{ $errors->first('email') }} </span>
					</p>
					@endif
				</div>
				<div class="form-group">
					<label for="number" class="col-md-4">Phone Number <span class="myLabel">*</span></label>
					<input type="text" name="phone_number" class="form-control" placeholder="Enter your phone number">
					@if ($errors->has('phone_number'))
					<p class="help-block myLabel">
						<span class="myLabel"> {{ $errors->first('phone_number') }} </span>
					</p>
					@endif
				</div>
				<div class="form-group">
					<label for="address" class="col-md-4">Adress <span class="myLabel">*</span></label>
					<textarea class="form-control" name="address" placeholder="Enter Shipping Address">{{ isset($username)? $addr : '' }}</textarea>
					@if ($errors->has('address'))


					<p class="help-block myLabel">
						<span class="myLabel"> {{ $errors->first('address') }} </span>
					</p>
					@endif
				</div>
				@if(Auth::user()==null)
				<div class="form-group" id="create_an_account_div">
					<label class="col-sm-offset-4">
						<input type="checkbox" name="add_account" class="create_an_account" value="1">
						&nbsp; Create an Account?</label>
				</div>
				<div class="form-group" id="create_password_div">
					<label for="address" class="col-md-4">Password</label>
					<input name="password"  type="password" class="form-control">
					@if ($errors->has('password'))
					<p class="help-block myLabel">
						<span class="myLabel"> {{ $errors->first('password') }} </span>
					</p>
					@endif
				</div>
				@endif
				<br />
				<div class="col-md-12" align="center">
					<button type="submit" class="swin-btn center">
						Place Order
					</button>
				</div>
			</form>
		</div>
		</div>
	</div>
</div>
@endsection
@section('javascript_content')
<script>
	$('.create_an_account').click(function() {
		if ($(this).is(':checked')) {
			$("#create_password_div").slideDown("slow");
		} else {
			$("#create_password_div").slideUp("slow");
		}
	}); 
</script>
@endsection
