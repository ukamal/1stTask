<style>
	.btn-danger {
	    color: #f15f2a;
	    background-color: #fff;
	    border-color: #f15f2a;
	}
	.btn-danger:hover {
	    color: #f15f2a;
	    background-color: #fff;
	    border-color: #f15f2a;
	    box-shadow: 0 0 2px rgba(0, 0, 0, 0.5);
	}
	.btn{
		border-radius: 50px;
	}
</style>
@if($check_if_empty!="true")
<div class="col-md-12">
	<div class="swin-sc swin-sc-product products-01 style-04 light swin-vetical-slider">
		<div class="row">
			<div class="col-md-12">
				<div data-height="200" class="products nav-slider">
					@foreach($products as $index_product => $product)
					<div class="item product-01">
						<div class="item-left">
							<?php $check_other_image = $product -> product_gallery_images -> isEmpty(); ?>
							@if($check_other_image==true)
								<a href="javascript:void(0)" class="selected_product" data-product-id="{{ $product->id }}" data-product-name="{{ $product->product_name }}" data-product-price="{{ $product->product_price }}"><img src="{{ URL::asset('images/Product Gallery Images/no-image-1.jpg') }}" alt="" class="img img-responsive" /></a>
							@else
								@foreach($product->product_gallery_images as $index => $gallery_images )
									@if($index<1)
										<a href="javascript:void(0)" class="selected_product" data-product-id="{{ $product->id }}" data-product-name="{{ $product->product_name }}" data-product-price="{{ $product->product_price }}"><img src="{{ URL::asset('images/Product Gallery Images/'.$gallery_images->gallery_image) }}" alt="" class="img img-responsive" /></a>
									@endif
								@endforeach
							@endif
							<div class="content-wrapper">
								<a href="javascript:void(0)" class="title selected_product" data-product-id="{{ $product->id }}" data-product-name="{{ $product->product_name }}" data-product-price="{{ $product->product_price }}">{{ $product->product_name }} </a>
								<div class="dot">
									.....................................................................
								</div>
								<div class="des">
									{{ $product->product_description }}
								</div>
							</div>
						</div>
						<div class="item-right">
							<span class="price woocommerce-Price-amount amount"><span class="price-symbol">&#x9f3;</span>{{ $product->product_price }} </span>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
@else
<h4>No products available.</h4>
@endif

<script>
	$('.products-01.style-04').each(function(){
		var $nav_slider = $(this).find('.nav-slider');
		var item = $nav_slider.data('item');
		if (!item) {
			item = 3;
		}

		$nav_slider.slick({
			fade: false,
		 	dots: false,
		 	arrows: true,
	        infinite: false,
	        slidesToShow: item,
	        slidesToScroll: 1,
	        vertical: true,
	        focusOnSelect: false,
	        nextArrow: "<div class='next-slide slide-vertical'><a class='arrow-slide'><i class='fa fa-chevron-down'></i></a></div>",
        	prevArrow: "<div class='prev-slide slide-vertical'><a class='arrow-slide'><i class='fa fa-chevron-up'></i></a></div>",
        	responsive: [
	         	{
			       breakpoint: 1025,
			       settings: {
			        slidesToShow: 2,
			      }
			    },
		    ]
		});
	});
	
	
	
	$(document).ready(function(){
		
		$('.selected_product').on('click',function(){
			
			var product_id = $(this).data('product-id');
			var product_name = $(this).data('product-name');
			var product_price = $(this).data('product-price');
			
			var total_price = 0; 
			
			counter = $('#myTable tr').length - 2;
			
			var newRow = $("<tr>");
	        var cols = "";
	        
	        cols += '<td><input type="hidden" name="product_id[]" class="product_input_id'+product_id+'"/></td>';
	        cols += '<td>'+product_name+'</td>';
			cols += '<td class="mtTd price_td">'+product_price+'</td>';
	        cols += '<td class="mtTd"><a class="btn btn-danger ibtnDel"><i class="fa fa-times"></i></a></td>';
	        
	        newRow.append(cols);
	        
	        $("table.order-list").append(newRow);
	        
	        $('.product_input_id'+product_id).val(product_id);
	        
	        counter++;
	        
	        var sum = 0;
	        var num_of_rows = 0;
	        
	      	$(".price_td").each(function()
	      	{
	          	sum += parseInt($(this).text());
	          	num_of_rows++;
	      	});
	      	
	      	var quantity = $('.menu_quantity').val();
	      	
	      	var grand_total = quantity*sum;
	      	
	      	if(grand_total>0){
		  		$(':input[type="submit"]').fadeIn("1000");
		  	}
		  	else{
		  		$(':input[type="submit"]').fadeOut("1000");
		  	}
	      	
	      	var grand_total_comma = numberWithCommas(grand_total);
	      	
	      	$('.grand_total').text(grand_total_comma);
	      	$('.grand_total_input').val(grand_total);
	      	
	      	//sum = numberWithCommas(sum);
	      	$('.total_price').text(sum);
	      	$('.total_price_input').val(sum);
	      	
	      	if(num_of_rows>=0){
	        	$('.empty_row').hide();
	        	$('.final-rows').fadeIn(1000);
	        }
	        
	        
		});
		
		$("table.order-list").on("click", ".ibtnDel", function (event) {
			//$(this).parents("td").prev("td").text();
            $(this).closest("tr").remove();
            
            counter -= 1;
	        
	        var sum = 0;
	        var num_of_rows = 0;
	      	$(".price_td").each(function()
	      	{
	          	sum += parseInt($(this).text());
	          	num_of_rows++;
	      	});
	      	
	      	var quantity = $('.menu_quantity').val();
	      	
	      	var grand_total = quantity*sum;
	      	
	      	if(grand_total>0){
		  		$(':input[type="submit"]').fadeIn("1000");
		  	}
		  	else{
		  		$(':input[type="submit"]').fadeOut("1000");
		  	}
	      	
	      	var grand_total_comma = numberWithCommas(grand_total);
	      	
	      	$('.grand_total').text(grand_total_comma);
	      	$('.grand_total_input').val(grand_total);
	      	
	      	//sum = numberWithCommas(sum);
	      	$('.total_price').text(sum);
	      	$('.total_price_input').val(sum);
	      	
	      	if(num_of_rows==0){
	        	$('.empty_row').show();
	        	$('.final-rows').hide();
	        }
	        
        });
        
        function numberWithCommas(x) {
    		return x.toString().replace(/\B(?=(?:\d{3})+(?!\d))/g, ",");
        }
	});
	
</script>

