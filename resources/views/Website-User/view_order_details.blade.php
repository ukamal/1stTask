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
				Order Details.
			</div>
			<div data-top="opacity:1;" data--120-top="opacity:0;" data-anchor-target=".page-title" class="divider">
				<span class="line-before"></span><span class="dot"></span><span class="line-after"></span>
			</div>
			<div data-top="transform: translateY(0px);opacity:1;" data--20-top="transform: translateY(5px);" data--50-top="transform: translateY(15px);opacity:0.8;" data--120-top="transform: translateY(30px);opacity:0;" data-anchor-target=".page-title" class="subtitle">
				Salsa Catering Service.
			</div>
		</div>
	</div>
</div>

@endsection

@section('body_content')
<section class="product-single padding-top-0">
	<div class="panel panel-default">
		<div class="panel-heading">
			<span class="my-header"><strong> Details </strong></span>
		</div>
		<div class="panel-body">
			<div class="col-md-12">
				<div class="col-xs-6 col-sm-6 col-md-6">
					<address>
						<span style="font-style: italic">{{ $order->order_status }}</span>
					</address>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6 text-right">
					<?php $date_time =  $order->order_date_time;
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
						<em>ID : &nbsp;{{ $order->order_id }}</em>
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
							<tr>
								<td class="col-md-3"><em>{{ $products['item']->product_name }}</em></h4></td>
								<td class="col-md-4">Product</td>
								<?php $product_price = number_format($products['item']->product_price) ?>
								<td class="col-md-2 text-center">{{ $product_price }}</td>
								<td class="col-md-1" style="text-align: center"> x {{ $products['qty'] }} </td>
								<?php $product_total_price = number_format($products['price']) ?>
								<td class="col-md-2" style="text-align: right">{{ $product_total_price }}</td>
							</tr>
							@endforeach
						@endif
						
						@if(isset($package_details))
							@foreach($package_details as $package_detail)
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
							@endforeach
						@endif
						
						@if(isset($custom_menu_details))
							@foreach($custom_menu_details as $main_index_custom_menu => $custom_menu)
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
							@endforeach
						@endif
						<tr>
							<td> </td>
							<td></td>
							<td colspan="2" class="text-right"> 
								<p>
									<strong>Subtotal: </strong>
								</p>
								<p>
									<strong>Shipping Charge: </strong>
								</p>
							</td>
							<td style="text-align: right">
							<?php $subtotal = $totalPrice - 10 ?>
							<?php $subtotal = number_format($subtotal) ?> 
							<p>
								<strong> {{ $subtotal }}</strong>
							</p>
							<p>
								<strong>10</strong>
							</p></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td class="text-right"><h4><strong>Total: </strong></h4></td>
							<?php $total_price = number_format($totalPrice) ?>
							<td style="text-align: right"><h4><strong>{{ $total_price }}</strong></h4></td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="col-md-12" align="center">
				<a href="{{ url('get_user_orders') }}" class="swin-btn center">
					<i class="fa fa-step-backward"></i> Back
				</a>
			</div>
		</div>
	</div>
</section>
@endsection
@section('javascript_content')
@endsection