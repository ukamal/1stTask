@extends('layouts.admin')
@section('css_content')
<link rel="stylesheet" href="{{ URL::asset('css/Admin_css/admin-body.css') }}">
<link rel="stylesheet" href="{{ URL::asset('css/Admin_css/dataTables.bootstrap.css') }}">
<style>
	.my-header {
		padding: 1em;
		font-size: 25px;
		font-family: 'Calibri';
		margin-left: -25px;
	}
	
	@media(max-width: 480px){
		.my-header {
			font-size: 22px;
		}
	}
	
	.myLabel{
        text-align : right;
    }
    .showLabel{
        font-weight: lighter;
    }
</style>
@endsection

@section('body_content')
<div class="panel panel-default">
	<div class="panel-heading">
		<span class="my-header"><strong> All Products </strong></span>
	</div>
	<div class="panel-body">
		<div class="row">
			<!-- View Category Image -->
			<div class="modal fade" id="viewProductImageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<h4 class="modal-title" id="exampleModalLabel">Product Image</h4>
						</div>
						<div class="modal-body">
							<img id="show_product_image" width="100%" src="" />
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal">
								Close
							</button>
						</div>
					</div>
				</div>
			</div>
			<!-- END -->
			
			<!-- Update Product Informations -->
			<div class="modal fade" id="viewProductEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
				<div class="modal-dialog" role="document">
					<form action="{{ url('/admin/update_product') }}" method="POST">
		                {!! csrf_field() !!}
		                <div class="modal-content">
		                    <div class="modal-header">
		                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                        <span aria-hidden="true">&times;</span></button>
		                        <h4 class="modal-title" id="defaultModalLabel">Update Product Info</h4>
		                    </div>
		                    <div class="modal-body"> 
		                        <input type="hidden" id="product_id" name="product_id" />
		                        <div class="row">
		                          <div class="col-md-3 myLabel">
		                              <label>Product Name</label>
		                          </div>
		                          <div class="col-md-6">
		                              <input type="text" id="product_name" name="product_name" class="form-control" />
		                          </div>
		                        </div><br />
		                        <div class="row">
		                          <div class="col-md-3 myLabel">
		                              <label>Product Price</label>
		                          </div>
		                          <div class="col-md-6">
		                               <input type="text" id="product_price" name="product_price" class="form-control" />
		                          </div>
		                        </div><br />
		                        <div class="row">
		                          <div class="col-md-3 myLabel">
		                              <label>Rating</label>
		                          </div>
		                          <div class="col-md-6">
		                            <select name="product_rating" id="product_rating" class="form-control">
		                                <option value="1">1</option>
		                                <option value="2">2</option>
		                                <option value="3">3</option>
		                                <option value="4">4</option>
		                                <option value="5">5</option>
		                            </select>
		                          </div>
		                        </div><br />
		                        <div class="row">
		                          <div class="col-md-3 myLabel">
		                              <label>Product Description</label>
		                          </div>
		                          <div class="col-md-6">
		                            <textarea class="form-control" id="product_description" name="product_description"></textarea>
		                          </div>
		                        </div><br />
		                        <div class="row">
		                          <div class="col-md-3 myLabel">
		                              <label>Top Products (Display in the front page)</label>
		                          </div>
		                          <div class="col-md-6">
		                            <select class="form-control" name="top_products" id="top_products">
										<option value="0">Do not show on top products</option>
										<option value="1">Show on top products</option>
									</select>
		                          </div>
		                        </div>
		                    </div>
		                    <div class="modal-footer">
		                        <button type="submit" class="btn btn-info">UPDATE</a>
		                        <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
		                    </div>
		                </div>
		            </form>
				</div>
			</div>
			<!-- END -->

			<div class="col-xs-12 col-sm-12">
				<div class="panel">
					<div class="panel-body">
						<div class="box box-info">
							<div class="box-body">
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
								<table id="example1" class="table table-bordered table-striped table-responsive">
									<thead>
										<tr>
											<th>Image</th>
											<th>Name</th>
											<th>Price</th>
											<th>Main Category</th>
											<th>Sub Category</th>
											<th>Rating</th>
											<th style="text-align: center">Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($product_details as $product)
										<tr>
											<td align="center">
												@if(isset($product['image']))
													<img style="width: 100px;height: 100px;" src="{{ URL::asset('images/Product Gallery Images/'.$product['image']) }}" /> 
												@else
													<img style="width: 100px;height: 100px;" src="{{ URL::asset('images/Product Gallery Images/no-image-1.jpg') }}" />
												@endif
											</td>
											<td>{{ $product['name'] }}</td>
											<?php $product_price = number_format($product['price']) ?>
											<td>{{ $product_price }}</td>												
											<td>{{ $product['main_category'] }}</td>
											<td>{{ $product['sub_category'] }}</td>
											<td>
												<div class="product-info">
							                      <ul class="list-inline">
							                        <li class="rating">
							                        	<a href="javascript:void(0)">
							                        		<?php  $product_rating = $product['rating'] ?>
							                        		@for($i=1;$i<=$product_rating;$i++)
							                        		<i class="fa fa-star"></i>
							                        		<?php $counts = $i ?>
							                        		@endfor
							                        		<?php $remaining_star = 5- $counts; ?>
							                        		@for($j=1;$j<=$remaining_star;$j++)
							                        		<i class="fa fa-star-o"></i>
							                        		@endfor
							                        	</a>
							                        </li>
							                      </ul>
							                    </div>
											</td>
											<td align="center">
												<a href="javascript:void()" title="Edit Product" class="edit_product" data-toggle="modal" data-backdrop="static" data-target="#viewProductEditModal"
		                                            data-product_id="{{ $product['id'] }}"
		                                            data-product_name="{{ $product['name'] }}"
		                                            data-product_price="{{ $product['price'] }}"
		                                            data-product_rating="{{ $product['rating'] }}"
		                                            data-product_description="{{ $product['description'] }}"
		                                            data-top_products="{{ $product['top_products'] }}"
													> 
													<i class="fa fa-pencil-square-o"></i> 
												</a> &nbsp; 
												<a href="{{ url('admin/delete_product/'.$product['id']) }}" data-toggle="delete-product" title="Delete Product"> 
													<i class="fa fa-times"></i> 
												</a> &nbsp; 
												<a href="{{ url('admin/add_product_gallery_images/'.$product['id']) }}" data-toggle="add-gallery-images" title="Add More Gallery Images"> 
													<i class="fa fa-plus-square"></i> 
												</a> &nbsp; 
												<a href="{{ url('admin/view_product_gallery_images/'.$product['id']) }}" data-toggle="view-gallery-images" title="Gallery Images"> 
													<i class="fa fa-eye"></i>
												</a>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
							<!-- /.box-body -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
@section('javascript_content')
<script src="{{ URL::asset('js/Admin_js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('js/Admin_js/dataTables.bootstrap.min.js') }}"></script>
<script>
	$(function() {
		$("#example1").DataTable();
		$('#example2').DataTable({
			"paging" : true,
			"lengthChange" : false,
			"searching" : false,
			"ordering" : true,
			"info" : true,
			"autoWidth" : false
		});
		$('[data-toggle="add-gallery-images"]').tooltip();
		$('[data-toggle="view-gallery-images"]').tooltip();
		$('[data-toggle="modal"]').tooltip();
		$('[data-toggle="delete-product"]').tooltip();
	});

	$('img').on('click', function() {
		var sr = $(this).attr('src');
		$('#show_product_image').attr('src', sr);
		$('#viewProductImageModal').modal('show');
	});
	
	$(".edit_product").click(function() {
        $("#product_id").val($(this).data('product_id'));
        $("#product_name").val($(this).data('product_name'));
        $("#product_price").val($(this).data('product_price'));
        $("#product_rating").val($(this).data('product_rating'));
        $("#product_description").val($(this).data('product_description'));
        $("#top_products").val($(this).data('top_products'));
    });
	
</script>
@endsection