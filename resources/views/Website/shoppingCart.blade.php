@extends('layouts.website')
@section('css_content')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/Website_css/shopping-cart.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/Website_css/custom-label.css') }}">
<!--link rel="stylesheet" type="text/css" href="{{ URL::asset('css/Website_css/jquery-ui.css') }}"-->
<style>
	.my-header {
		padding: 1em;
		font-size: 25px;
		font-family: 'Calibri';
	}
	
	.panel-body {
	    padding: 0px 20px 10px 20px;
	}
	.quantity-div {
		padding-top: 20px;
		margin-right: 60px;
		width: 100%;
		text-align: center;
		margin: 6px 0;
	}
	
	.quantity-div input {
		-webkit-appearance: none;
		border: none;
		text-align: center;
		width: 32px;
		font-size: 16px;
		color: #43484D;
		font-weight: 300;
	}
	
	.cart-info{
		font-weight: lighter;
		color: #f15f2a;
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
			<span class="my-header"><strong> Shopping Basket </strong></span>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-12">
					<div class="table-responsive">
						<table class="items">
							<!--thead>
								<tr>
									<th>Product</th>
									<th>Price</th>
									<th>Quantity</th>
									<th>Total</th>
								</tr>
							</thead-->
							<tbody>
								@if(isset($product_details))
									@foreach($product_details as $index_product => $products)
										@if($products['qty']>0)
											<tr>
												<td>
													<div class="item">
														@if($products['item']->product_gallery_images->isEmpty()!="true")
															@foreach($products['item']->product_gallery_images as $index => $images)
																@if($index<1)
																	<div class="item-front">
																		<img class="prodt-img" src="{{ URL::asset('images/Product Gallery Images/'.$images->gallery_image) }}" />
																	</div>
																	<div class="item-back">
																		<img class="prodt-img" src="{{ URL::asset('images/Product Gallery Images/'.$images->gallery_image) }}" />
																	</div>
																@endif
															@endforeach
														@else
															<div class="item-front">
																<img class="prodt-img" src="{{ URL::asset('images/Product Gallery Images/no-image-1.jpg') }}" />
															</div>
															<div class="item-back">
																<img class="prodt-img" src="{{ URL::asset('images/Product Gallery Images/no-image-1.jpg') }}" />
															</div>
														@endif
													</div>
												<p>
													<span class="itemNum category">{{ $products['item']->category->category_name }}</span>
													<br />
													<span class="product-name">{{ $products['item']->product_name }}</span><!--sup>&reg;</sup-->
												</p>
												<p class="description">
													@if($products['item']->product_description==null)
														Product description not available
													@else
														{{ $products['item']->product_description }}
													@endif
												</p></td>
												<?php $product_price = number_format($products['item']->product_price) ?>
												<td>&#x9f3; {{ $product_price }}</td>
												<td>
													<div class="quantity-div">
														<a href="{{ route('product.updateAddToCart', ['id' => $products['item']->id]) }}" class="plus-btn btn btn-default">
															<i class="fa fa-plus"></i>
														</a>
														
														
														<form action="{{ route('product.updateChangeToCart') }}" method="POST">
		                									{!! csrf_field() !!}
		                									<input type="hidden" name="id" value="{{ $products['item']->id }}" />
		                									<input type="text" name="product_quantity" value="{{ $products['qty'] }}" onchange="this.form.submit()" />
														</form>
														
														<a href="{{ route('product.updateSubtractToCart', ['id' => $products['item']->id]) }}" class="minus-btn btn btn-default">
															<i class="fa fa-minus"></i>
														</a>
														
													</div>
													
													<a href="{{ route('product.removeFromCart', ['id' => $products['item']->id, 'redirect_page' => 'shopping-cart']) }}" class="remove">Remove</a></td>
													<?php $products_grand_total = number_format($products['price']) ?>
												<td class="itemTotal">&#x9f3; {{ $products_grand_total }}</td>
											</tr>
										@endif
									@endforeach
								@endif
							</tbody>
						</table>
						</div>
						<div class="table-responsive">
						<table class="items">
							<tbody>
								@if(isset($package_details))
									@foreach($package_details as $index_package => $package_detail)
										@if($package_detail['qty']>0)
											<tr>
												<td>
													<div class="package-list">
														<div class="package-name">
															{{ $package_detail['item']->package_name }}
														</div>
														<div class="package_type">
															<span class="label label-large label-grey arrowed-in-right arrowed-in">{{ $package_detail['package_type'] }}</span>
														</div>
														<div class="single">
															<ul class="list-unstyled">
																@foreach($package_detail['products'] as $index => $products)
																	<li>{{ ++$index }} &nbsp; - &nbsp; {{ $products->product->product_name }}</li>
																@endforeach
															</ul>
													   </div>
													</div>
												</td>
												<?php $package_price = number_format($package_detail['item']->product_price) ?>
												<td>&#x9f3; {{ $package_price }}</td>
												<td>
													<div class="quantity-div">
														<a href="{{ route('package.updateAddToCart', ['id' => $package_detail['id'], 'package_price' => $package_detail['item']->product_price ]) }}" class="plus-btn btn btn-default">
															<i class="fa fa-plus"></i>
														</a>
														
														<form action="{{ route('package.updateChangeToCart') }}" method="POST">
		                									{!! csrf_field() !!}
		                									<input type="hidden" name="id" value="{{ $package_detail['id'] }}" />
		                									<input type="hidden" name="package_price" value="{{ $package_detail['item']->product_price }}" />
															<input type="text" name="package_quantity" value="{{ $package_detail['qty'] }}" onchange="this.form.submit()" />
														</form>
														
														<a href="{{ route('package.updateSubtractToCart', ['id' => $package_detail['id'], 'package_price' => $package_detail['item']->product_price ]) }}" class="minus-btn btn btn-default">
															<i class="fa fa-minus"></i>
														</a>
									
														
													</div>
													<a href="{{ route('package.removeFromCart', ['id' => $package_detail['id'], 'quantity' => $package_detail['qty'], 'package_price' => $package_detail['price'],'redirect_page' => 'shopping-cart']) }}" class="remove">Remove</a></td>
													<?php $package_details_grand_total = number_format($package_detail['price']) ?>
												<td class="itemTotal">&#x9f3; {{ $package_details_grand_total }}</td>
											</tr>
										@endif
									@endforeach
								@endif
							</tbody>
						</table>
						</div>
						<div class="table-responsive">
						<table class="items">
							<tbody>
								@if(isset($custom_menu_details))
									@foreach($custom_menu_details as $main_index_custom_menu => $custom_menu)
										@if($custom_menu['qty']>0)
											<tr>
												<td>
													<div class="package-list">
														<div class="package-name">
															Custom Menu - {{ ++$main_index_custom_menu }}
														</div>
														<div class="single">
															<ul class="list-unstyled">
																@foreach($custom_menu['item'] as $sub_index_custom_menu => $custom_menu_products)
																	<li>{{ ++$sub_index_custom_menu }} &nbsp; - &nbsp; {{ $custom_menu_products->product_name }}</li>
																@endforeach
															</ul>
													   </div>
													</div>
												</td>
												<?php $custom_menu_total_price = number_format($custom_menu['total_price']) ?>
												<td>&#x9f3; {{ $custom_menu_total_price }}</td>
												<td>
													<div class="quantity-div">
														
														<a href="{{ route('custom-menu.updateAddToCart', ['id' => $custom_menu['id'], 'custom_menu_price' => $custom_menu['total_price'] ]) }}" class="plus-btn btn btn-default">
															<i class="fa fa-plus"></i>
														</a>
														
														<form action="{{ route('custom-menu.updateChangeToCart') }}" method="POST">
		                									{!! csrf_field() !!}
		                									<input type="hidden" name="id" value="{{ $custom_menu['id'] }}" />
		                									<input type="hidden" name="custom_menu_price" value="{{ $custom_menu['total_price'] }}" />
															<input type="text" name="custom_menu_quantity" value="{{ $custom_menu['qty'] }}" onchange="this.form.submit()" />
														</form>
														
														<a href="{{ route('custom-menu.updateSubtractToCart', ['id' => $custom_menu['id'], 'custom_menu_price' => $custom_menu['total_price'] ]) }}" class="minus-btn btn btn-default">
															<i class="fa fa-minus"></i>
														</a>
									
														
													</div>
													<a href="{{ route('custom-menu.removeFromCart', ['id' => $custom_menu['id'], 'quantity' => $custom_menu['qty'], 'custom_price' => $custom_menu['grand_total'],'redirect_page' => 'shopping-cart']) }}" class="remove">Remove</a></td>
													<?php $custom_menu_grand_total = number_format($custom_menu['grand_total']) ?>
												<td class="itemTotal">&#x9f3; {{ $custom_menu_grand_total }}</td>
											</tr>
										@endif
									@endforeach
								@endif
							</tbody>
						</table>
					</div>
					
					@if($totalPrice>0)

					<div class="cost">
						
						<h2>Order Overview</h2>

						<table class="pricing">
							<tbody>
								<tr>
									<td>Subtotal</td>
									<?php $subtotal = number_format($subtotal) ?>
									<td class="subtotal">&#x9f3; {{ $subtotal }}</td>
								</tr>
								<!--tr>
									<td>Tax (5%)</td>
									<td class="tax"></td>
								</tr-->
								<!--tr>
									<td>VAT (15%)</td>
									add php tag -> $vat = number_format($vat)
									<td class="shipping">&#x9f3; add laravel curly brackets for the variables $vat </td>
								</tr-->
								<!--tr>
									<td>Service Charge (10%)</td>
									add php tag -> $service_charge = number_format($service_charge)
									<td class="shipping">&#x9f3; add laravel curly brackets for the variables $service_charge</td>
								</tr-->
								
								<tr>
									<td>VAT will be added upon the confirmation of the order</td>
									<td></td>
								</tr>
								
								<tr>
									<td><strong>Total:</strong></td>
									<?php $totalPrice = number_format($totalPrice) ?>
									<td class="orderTotal">&#x9f3; {{ $totalPrice }}</td>
								</tr>
							</tbody>
						</table>
						<br />
						<div style="text-align: center">
							<a href="{{ route('checkout') }}" class="swin-btn">
								Checkout Now &raquo;
							</a>
						</div>
					</div>
					@else
					<br />
						<div class="table-responsive">          
						  <table>
						      <tr>
						        <td><i class="fa fa-shopping-basket"></i>&nbsp; Your cart is currently empty.</td>
						      </tr>
						  </table>
						</div>
					<br />
					@endif
				</div>
			</div>
		</div>
	</div>
	</div>
</section>

@endsection
@section('javascript_content')
@endsection