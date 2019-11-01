@extends('layouts.admin')
@section('css_content')
<link rel="stylesheet" href="{{ URL::asset('css/Admin_css/admin-body.css') }}">
<style>
	.my-header {
		padding: 1em;
		font-size: 25px;
		font-family: 'Calibri';
		margin-left: -25px;
	}
	.product {
		color: red;
	}
	
	.product-line{
		font-size: 18px;
	}
	
	.product_heading {
		font-family: 'Century';
		color: #000000;
		padding: 1em;
	}
	
	@media(max-width: 480px){
		.my-header {
			font-size: 22px;
		}
	}
</style>
@endsection

@section('body_content')
<div class="panel panel-default">
	<div class="panel-heading">
		<span class="my-header"><strong> Product Gallery Images </strong></span>
	</div>
	<div class="panel-body">
		
		<!-- Update Product Image -->
		<div class="modal fade" id="updateProductImageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
			<div class="modal-dialog" role="document">
				<form method="POST" action="{{ url('/admin/update_product_gallery_image') }}" enctype="multipart/form-data" role="form">
					{!! csrf_field() !!}
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<h4 class="modal-title" id="exampleModalLabel">Update Image</h4>
						</div>
						<div class="modal-body">
							<input type="hidden" id="update_product_gallery_image_id" name="update_product_gallery_image_id" />
							<input type="hidden" id="update_product_gallery_image_name" name="update_product_gallery_image_name" />
							<input type="hidden" id="update_product_id" name="update_product_id" />
							<img id="show_product_image" width="100%" src="" />
							<input id="update_product_image" name="update_product_image" type="file" class="file-loading update_product_image" accept="image/*">
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-info">Update</a>
							<button type="button" class="btn btn-danger" data-dismiss="modal">
								Cancel
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<!-- END -->
		
		<!-- Delete Product Image -->
		<div class="modal fade" id="deleteProductImageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
			<div class="modal-dialog" role="document">
				<form method="POST" action="{{ url('/admin/delete_product_gallery_image') }}">
					{!! csrf_field() !!}
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<h4 class="modal-title" id="exampleModalLabel">Delete Image</h4>
						</div>
						<div class="modal-body">
							<input type="hidden" id="product_gallery_image_id" name="product_gallery_image_id" />
							<input type="hidden" id="product_gallery_image_name" name="product_gallery_image_name" />
							<input type="hidden" id="product_id" name="product_id" />
							Are you sure you want to Delete this Image ?
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-danger">Yes</a>
							<button type="button" class="btn btn-info" data-dismiss="modal">
								No
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<!-- END -->
			
		<div class="panel">
			<div class="product_heading">
				<span class="product-line"> Gallery Images for <span class="product"> {{ $products->product_name }} </span> </span>
				<br />
			</div>
			
			<div class="panel-body">
				@if(session()->has('deleted_message'))
					<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
							&times;
						</button>
						<h4><i class="icon fa fa-check"></i> {{ session()->get('deleted_message') }} </h4>
					</div>
					<br />
				@endif
				@if(session()->has('update_message'))
					<div class="alert alert-info">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
							&times;
						</button>
						<h4><i class="icon fa fa-check"></i> {{ session()->get('update_message') }} </h4>
					</div>
					<br />
				@endif
				
				<?php $check_if_gallery_images_empty = $gallery_images->isEmpty(); ?>
				@if($check_if_gallery_images_empty==false)
					@foreach($gallery_images as $images)
					<div class="col-xs-4 col-sm-4 col-md-4">
						<div class="form-group">
							<img class="img-thumbnail" src="{{ URL::asset('images/Product Gallery Images/'.$images->gallery_image) }}" width="370px;" height="255px;" />
						</div>
						<div class="form-group" align="center">
							<a href="javascript:void(0)" class="btn btn-info edit_gallery_image" data-toggle="modal" data-backdrop="static" data-target="#updateProductImageModal"
								data-update_product_id="{{ $images->product_id }}"
			                    data-update_product_gallery_image_id="{{ $images->id }}"
			                    data-update_product_gallery_image_name="{{ $images->gallery_image }}"
			                    data-update_product_gallery_image_src="{{ URL::asset('images/Product Gallery Images/'.$images->gallery_image) }}"
								> 
								<i class="fa fa-pencil-square-o"></i> Edit 
							</a> &nbsp; 
							<a href="javascript:void(0)" class="btn btn-danger delete_gallery_image" data-toggle="modal" data-backdrop="static" data-target="#deleteProductImageModal"
								data-product_id="{{ $images->product_id }}"
			                    data-product_gallery_image_id="{{ $images->id }}"
			                    data-product_gallery_image_name="{{ $images->gallery_image }}"
								><i class="fa fa-times"></i> Delete 
							</a>
						</div>
					</div>
					@endforeach
				@else
					<div class="col-md-12">
						<strong><h3>No gallery images available for this product.</h3></strong>
					</div>
				@endif
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-xs-12 col-sm-12" align="center">
				<a href="{{ url('admin/add_product_gallery_images/'.$product_id) }}" class="btn btn-default"> <i class="fa fa-plus-square"></i> Add Gallery Images </a> &nbsp;
				<a href="{{ url('admin/all_products') }}" class="btn btn-default"> <i class="fa fa-step-backward"></i> Back </a>
			</div>
		</div>

	</div>
</div>

@endsection
@section('javascript_content')
<script type="text/javascript">
	window.onload = function() {
		$('#products').addClass('active');
		$('#all_products').addClass('active');
	}; 
	
	$('.delete_gallery_image').on('click', function() {
		$("#product_id").val($(this).data('product_id'));
        $("#product_gallery_image_id").val($(this).data('product_gallery_image_id'));
        $("#product_gallery_image_name").val($(this).data('product_gallery_image_name'));
	});
	
	$('.edit_gallery_image').on('click', function(){
		var sr = $(this).data('update_product_gallery_image_src');
		$('#show_product_image').attr('src', sr);
		$("#update_product_id").val($(this).data('update_product_id'));
        $("#update_product_gallery_image_id").val($(this).data('update_product_gallery_image_id'));
        $("#update_product_gallery_image_name").val($(this).data('update_product_gallery_image_name'));
	});
	
	function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#show_product_image').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }


    $('#update_product_image').change(function() {
        readURL(this);
    });
	
</script>
@endsection