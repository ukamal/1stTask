@extends('layouts.website')
@section('css_content')
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

	.myTh {
		text-align: center;
	}
	.mtTd {
		text-align: center;
	}

	.grand_total {
		font-size: 22px;
		font-family: "Century";
		font-weight: bolder;
		font-style: italic;
		color: #f15f2a;
	}

	.grand_total_text {
		font-size: 22px;
		font-family: "Century";
		font-weight: bolder;
		font-style: italic;
	}
	
	.grand_total_div{
		padding-top: 10px;
	}
	
	.currency{
		font-size: 22px;
		font-family: "Century";
		font-weight: bolder;
		font-style: italic;
		color: #f15f2a;
	}
	
	#menu_quantity{
		width: 85px;
		font-size: 22px;
	}
	
	@media(max-width: 480px){
		.grand_total_text {
			font-size: 18px;
		}
		.currency{
			font-size: 18px;
		}
		.grand_total{
			font-size: 18px;
		}
		#menu_quantity{
			margin-left: 104px;
			font-size: 18px;
		}
	}
</style>
@endsection
@section('body_content_top_banner')
<div data-bottom-top="background-position: 50% 50px;" data-center="background-position: 50% 0px;" data-top-bottom="background-position: 50% -50px;" class="page-title page-product">
	<div class="container">
		<div class="title-wrapper">
			<div data-top="transform: translateY(0px);opacity:1;" data--20-top="transform: translateY(-5px);" data--50-top="transform: translateY(-15px);opacity:0.8;" data--120-top="transform: translateY(-30px);opacity:0;" data-anchor-target=".page-title" class="title">
				Create your own Menu
			</div>
			<div data-top="opacity:1;" data--120-top="opacity:0;" data-anchor-target=".page-title" class="divider">
				<span class="line-before"></span><span class="dot"></span><span class="line-after"></span>
			</div>
			<div data-top="transform: translateY(0px);opacity:1;" data--20-top="transform: translateY(5px);" data--50-top="transform: translateY(15px);opacity:0.8;" data--120-top="transform: translateY(30px);opacity:0;" data-anchor-target=".page-title" class="subtitle">
				Your dish. Your choice !!!
			</div>
		</div>
	</div>
</div>

@endsection

@section('body_content')

<section class="product-sesction-03-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<input type="hidden" id="list-sidebar-active" value="{{ $program->program_slug }}-id" />
			<span class="my-header"><strong> Details </strong></span>
		</div>
		<div class="panel-body">
			<div class="form-group col-md-6">
				<label> Category </label>
				<select class="form-control category_dropdown">
					<option value="0">--------------  Please Select  -------------------------</option>
					@foreach($categories as $category)
					<option value="{{ $category->id }}">{{ $category->category_name }}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group col-md-6">
				<label> Sub Category </label>
				<select class="form-control sub_category_dropdown" id="sub_category_dropdown">

				</select>
			</div>
		</div>
		<hr />
		<h3 class="title-heading">Choose from products & create your own menu</h3>

		<div class="panel-body" id="products_slider">

		</div>
		<hr />
		<form class="form-inline" action="{{ url('add-custom-menu-to-cart') }}" method="post">
		{!! csrf_field() !!}
		<div class="panel-body">
			<div class="col-xs-6 col-sm-12 col-md-12">
				<table class="table table-bordered order-list" id="myTable">
					<thead>
						<tr>
							<td class="myTh">Title</td>
							<td>Product Name</td>
							<td class="myTh">Price in &#x9f3;</td>
							<td class="myTh">Actions</td>
						</tr>
					</thead>
					<tbody>
						<tr class="empty_row">
							<td colspan="4">No Products Selected.</td>
						</tr>
					</tbody>
					<tfoot>
						<tr>
							<td class="mtTd">Total</td>
							<td></td>
							<td class="mtTd total_price" style="font-weight: bold">0</td>
							<td></td>
						</tr>
					</tfoot>
				</table>
			</div>
			
			
				<div class="form-group col-sm-offset-3">
					<label class="grand_total_text">Enter quantity for the menu</label> &nbsp;
					<input type="text" name="menu_quantity" id="menu_quantity" value="1" class="menu_quantity form-control" />
					<input type="hidden" name="grand_total" class="grand_total_input form-control" value="0" />
					<input type="hidden" name="redirect_page" value="create_custom_menu" />
					<input type="hidden" name="program_id" value="{{ $program->id }}" />
					<input type="hidden" name="dish_type" value="{{ $dish_type }}" />
					<input type="hidden" name="total_price_input" class="total_price_input"/>
				</div>
			
			
			<div class="col-md-12 grand_total_div" style="text-align: center">
				<span class="grand_total_text">Your total price for this menu is</span> &nbsp; <span class="currency">&#x9f3;</span> <span class="grand_total"> 0 </span>
			</div>
		</div>
		<hr />
		<div class="panel-body">
			<div class="col-md-12" style="text-align: center">
				<button type="submit" class="swin-btn-square add_to_cart">Add to Cart</button>&nbsp;&nbsp; 
				<a href="{{ url('/product_page_for_programs/'.$program->id.'/'.$dish_type) }}" class="swin-btn-square"><i class="fa fa-step-backward"></i>&nbsp; Back to {{ $program->program_name }}</a>
			</div>
		</div>
		</form>
		<br />
	</div>
</section>

@endsection
@section('javascript_content')
<script>

$(document).ready(function() {
	var id = $('#list-sidebar-active').val();
	$('#' + id).addClass("program-active");
	$(':input[type="submit"]').hide();
});

$('.category_dropdown').on('change', function() {
	var category_id = $('.category_dropdown').val();
	$.ajax({
		type : "get",
		url : "../../get_sub_categories",
		dataType : "html",
		data : {
		'category_id' : category_id
		},
		success : function(result) {
			$('#sub_category_dropdown').html(result);
		}
	});
});

$('.sub_category_dropdown').on('change', function() {
	$('#products_slider').html('<div style="text-align:center"><img src="{{ URL::asset('images/pre-loader-burger.gif') }}"></div>');
	var sub_category_id = $('.sub_category_dropdown').val();
	$.ajax({
			type : "get",
			url : "../../get_sub_category_products",
			dataType : "html",
			data : {
				'sub_category_id' : sub_category_id
			},
			success : function(result) {
				$('#products_slider').html(result);
			}
	});
});

var grand_total = 0; var total_price = 0;

$("#menu_quantity").change(function() {
  	total_price = parseInt($('.total_price').text());
  	
  	var menu_quantity = $('.menu_quantity').val();
  	if(menu_quantity=='' || menu_quantity==0){
  		grand_total = 0;
  	}
  	else{
  		grand_total = total_price*parseInt(menu_quantity);
  	}
  	
  	if(grand_total>0){
  		$(':input[type="submit"]').fadeIn("1000");
  	}
  	else{
  		$(':input[type="submit"]').fadeOut("1000");
  	}
  	
  	var grand_total_comma = numberWithCommas(grand_total);
	
  	$('.grand_total').text(grand_total_comma);
  	$('.grand_total_input').val(grand_total);
  	$('.total_price_input').val(total_price);
});

function numberWithCommas(x) {
	return x.toString().replace(/\B(?=(?:\d{3})+(?!\d))/g, ",");
}

</script>
@endsection