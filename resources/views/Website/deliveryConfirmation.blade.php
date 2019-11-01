@extends('layouts.website')
@section('css_content')
<style>
	.my-header {
		padding: 1em;
		font-size: 25px;
		font-family: 'Calibri';
	}
	
	@media(max-width: 480px){
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
				Delivery Confirmations.
			</div>
			<div data-top="opacity:1;" data--120-top="opacity:0;" data-anchor-target=".page-title" class="divider">
				<span class="line-before"></span><span class="dot"></span><span class="line-after"></span>
			</div>
			<div data-top="transform: translateY(0px);opacity:1;" data--20-top="transform: translateY(5px);" data--50-top="transform: translateY(15px);opacity:0.8;" data--120-top="transform: translateY(30px);opacity:0;" data-anchor-target=".page-title" class="subtitle">
				We hope you enjoy the meal.
			</div>
		</div>
	</div>
</div>

@endsection

@section('body_content')
<section class="product-single padding-top-0">
	<div class="panel panel-default">
		<div class="panel-heading">
			<span class="my-header"><strong> Delivery Confirmation </strong></span>
		</div>
		<div class="panel-body">
			<div class="col-md-12">
				<div class="alert alert-success">
				  <strong>Order Placed!</strong> Please wait while we process your order. Thank you for your patience.
				</div>
			</div>
			<div class="col-md-12">
				<div class="col-xs-6 col-sm-6 col-md-6">
					<address>
						<strong>{{ $shipping_details->name }}</strong>
						<br>
						 {{ $shipping_details->address }}
						<br>
						<abbr title="Phone">Phone:</abbr>&nbsp; {{ $shipping_details->phone_number }}
					</address>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6 text-right">
					<?php $date_time =  $shipping_details->order_date_time;
						  $date_time_split = explode(" ", $date_time);
						  $date = $date_time_split[0];
						  $time = $date_time_split[1];
						  $date_formatted = date('l, jS \of F Y', strtotime ($date));
						  $time_formatted = date('h:i A', strtotime($time));
					 ?>
					<p>
						<em>Date: &nbsp;{{ $date_formatted }}</em>
					</p>
					<p>
						<em>Time: &nbsp;{{ $time_formatted }}</em>
					</p>
					<p>
						<em>ID : &nbsp;{{ $shipping_details->order_id }}</em>
					</p>
				</div>
			</div>
			<div class="col-md-12">
				<div class="text-center">
					<h1>Order Details</h1>
				</div>
				</span>
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Title</th>
							<th>Details</th>
							<th class="text-center">&#x9f3; Unit Price</th>
							<th style="text-align: center">Quantity</th>
							<th style="text-align: right">&#x9f3; Total</th>
						</tr>
					</thead>
					<tbody>
						@if(isset($product_details))
							@foreach($product_details as $products)
								@if($products['qty']>0)
									<tr>
										<td class="col-md-3"><em>{{ $products['item']->product_name }}</em></h4></td>
										<td class="col-md-4">Product</td>
										<?php $product_price = number_format($products['item']->product_price) ?>
										<td class="col-md-2 text-center">{{ $product_price }}</td>
										<td class="col-md-1" style="text-align: center"> x {{ $products['qty'] }} </td>
										<?php $product_total_price = number_format($products['price']) ?>
										<td class="col-md-2" style="text-align: right">{{ $product_total_price }}</td>
									</tr>
								@endif
							@endforeach
						@endif
						
						@if(isset($package_details))
							@foreach($package_details as $package_detail)
								@if($package_detail['qty']>0)
									<tr>
										<td class="col-md-3"><em>{{ $package_detail['item']->package_name }}</em> </td>
										<td class="col-md-4">Package &nbsp; ( {{ $package_detail['package_type'] }} )</td>
										<?php $package_price = number_format($package_detail['item']->product_price) ?>
										<td class="col-md-2 text-center">{{ $package_price }}</td>
										<td class="col-md-1" style="text-align: center">  x {{ $package_detail['qty'] }} </td>
										<?php $package_total_price = number_format($package_detail['price']) ?>
										<td class="col-md-2" style="text-align: right">{{ $package_total_price }}</td>
									</tr>
									@foreach($package_detail['products'] as $products)
										<tr>
											<td class="col-md-3"></td>
											<td class="col-md-4">&nbsp; &nbsp; - &nbsp; {{ $products->product->product_name }}</td>
											<td class="col-md-2"></td>
											<td class="col-md-1"></td>
											<td class="col-md-2"></td>
										</tr>
									@endforeach
								@endif
							@endforeach
						@endif
						
						@if(isset($custom_menu_details))
							@foreach($custom_menu_details as $main_index_custom_menu => $custom_menu)
								@if($custom_menu['qty']>0)
									<tr>
										<td class="col-md-3"><em>Your own Menu {{ ++$main_index_custom_menu }}</em> </td>
										<td class="col-md-4">Custom</td>
										<?php $total_custom_price = number_format($custom_menu['total_price']) ?>
										<td class="col-md-2 text-center">{{ $total_custom_price }}</td>
										<td class="col-md-1" style="text-align: center">  x {{ $custom_menu['qty'] }} </td>
										<?php $grand_total = number_format($custom_menu['grand_total']) ?>
										<td class="col-md-2" style="text-align: right">{{ $grand_total }}</td>
									</tr>
									@foreach($custom_menu['item'] as $custom_menu_products)
										<tr>
											<td class="col-md-3"></td>
											<td class="col-md-4">&nbsp; &nbsp; - &nbsp; {{ $custom_menu_products->product_name }}</td>
											<td class="col-md-2"></td>
											<td class="col-md-1"></td>
											<td class="col-md-2"></td>
										</tr>
									@endforeach
								@endif
							@endforeach
						@endif
						<tr>
							<td> </td>
							<td></td>
							<td colspan="2" class="text-right"> 
								<p>
									<strong>Subtotal : </strong>
								</p>
								<p>
									<strong>Vat will be added upon confirmation of the order : </strong>
								</p>
								<!--p>
									<strong>Service Charge (10%) : </strong>
								</p-->
							</td>
							<td style="text-align: right">
								<?php $subtotal = number_format($subtotal) ?>
								<?php //$vat = number_format($vat) ?> 
								<?php //$service_charge = number_format($service_charge) ?> 
								<p>
									<strong> {{ $subtotal }}</strong>
								</p>
								<p>
									<strong><!-- add curly braces for variables $vat --></strong>
								</p>
								<!--p>
									<strong> add curly braces for laravel variables $service_charge </strong>
								</p-->
							</td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td class="text-right"><h4><strong>Total : </strong></h4></td>
							<?php $totalPrice = number_format($totalPrice) ?>
							<td style="text-align: right"><h4><strong>{{ $totalPrice }}</strong></h4></td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="col-md-12" align="center">
				<a href="{{ url('/') }}" class="swin-btn center">
					<i class="fa fa-home"></i> Return Home
				</a>
			</div>
		</div>
	</div>
</section>
@endsection
@section('javascript_content')
@endsection