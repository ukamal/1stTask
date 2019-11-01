@component('mail::layout')

@slot('header')
    @component('mail::header', ['url' => config('app.url')])
        Thank you for your order
    @endcomponent
@endslot


@component('mail::subcopy')

Your order has been received and is now in process. Your order details are shown below for further references:

**ID** : **{{ $orders->order_id }}**
<?php $date_time =  $orders->order_date_time;
  $date_time_split = explode(" ", $date_time);
  $date = $date_time_split[0];
  $time = $date_time_split[1];
  $date_formatted = date('l, jS \of F Y', strtotime ($date));
  $time_formatted = date('h:i A', strtotime($time));
 ?>
 
 **Order Date** : **{{ $date_formatted }}**
 
 **Time** : **{{ $time_formatted }}**

@endcomponent

@component('mail::table')

| Title           | Details    | Unit Price         | Quantity          | Total      |
|:-------------   | :--------  | :-------------:    | :-------------:   | ---------: | 
@if(isset($product_details))
@foreach($product_details as $products)
<?php $product_total_price = number_format($products['price']) ?>
<?php $product_price = number_format($products['item']->product_price) ?>
@if($products['qty']>0)
| {{ $products['item']->product_name }} | Product |  {{ $product_price }}   | x {{ $products['qty'] }} | {{ $product_total_price }} TK |
@endif
@endforeach
@endif
@if(isset($package_details))
@foreach($package_details as $package_detail)
<?php $package_price = number_format($package_detail['item']->product_price) ?>
<?php $package_total_price = number_format($package_detail['price']) ?>
@if($package_detail['qty']>0)
| {{ $package_detail['item']->package_name }} |  Package ( {{ $package_detail['package_type'] }} )  | {{ $package_price }} | x {{ $package_detail['qty'] }} | {{ $package_total_price }} TK |
@foreach($package_detail['products'] as $products)
|   |  * {{ $products->product->product_name }}  |   |   |   |
@endforeach
@endif
@endforeach
@endif
@if(isset($custom_menu_details))
@foreach($custom_menu_details as $main_index_custom_menu => $custom_menu)
<?php $total_custom_price = number_format($custom_menu['total_price']) ?>
<?php $grand_total = number_format($custom_menu['grand_total']) ?>
@if($custom_menu['qty']>0)
| Your own Menu {{ ++$main_index_custom_menu }} |  Custom  | {{ $total_custom_price }} |  x {{ $custom_menu['qty'] }} | {{ $grand_total }} TK |
@foreach($custom_menu['item'] as $custom_menu_products)
|   | * {{ $custom_menu_products->product_name }}  |   |   |   |
@endforeach
@endif
@endforeach
@endif
<?php $subtotal = number_format($subtotal) ?>
<?php //$vat = number_format($vat) ?>
<?php //$service_charge = number_format($service_charge) ?>
<?php $totalPrice = number_format($totalPrice) ?>
| Subtotal		  				                                            |                   |  |    | {{ $subtotal }} TK          | 
| VAT will be added upon the confirmation of the order		  				|                   |  |    |          	                  |
| Payment Method  				                                            | Cash on delivery  |  |    |                             |
| **Total**       				                                            |                   |  |    | ** {{ $totalPrice }} TK **  |
@endcomponent

@slot('footer')
    @component('mail::footer')
        &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
    @endcomponent
@endslot

@endcomponent
