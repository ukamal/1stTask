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
	.label-info {
		background-color: #f15f2a
	}
	.label {
		display: inline;
		padding: .2em .6em .3em;
		font-size: 100%;
		font-weight: lighter;
		line-height: 1;
		color: #fff;
		text-align: center;
		white-space: nowrap;
		vertical-align: baseline;
		border-radius: .25em
	}
</style>
@endsection

@section('body_content')

<div class="panel panel-default">
	<div class="panel-heading">
		<span class="my-header"><strong> Add New Product </strong></span>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-xs-12 col-sm-12">
				<div class="panel">
					@if(session()->has('message'))
					<div class="row">
						<div class="col-md-12 col-xs-12">
							<div class="alert alert-success">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
									&times;
								</button>
								<h4><i class="icon fa fa-check"></i> {{ session()->get('message') }} </h4>
							</div>
						</div>
					</div>
					@endif
					<div class="panel-body">
						<div class="box box-info">
							<div class="box-body">
								<form class="form-horizontal" action="{{ url('admin/create_product') }}" method="POST" enctype="multipart/form-data" role="form">
									{!! csrf_field() !!}
									<div class="form-group">
										<div class="col-xs-6 col-sm-6">
											<label>Name</label>
											<input type="text" name="product_name" class="form-control" placeholder="Add Product Name">
										</div>

										<div class="col-xs-6 col-sm-6">
											<label>Price</label>
											<input type="text" name="product_price" class="form-control" placeholder="Product Price">
										</div>
									</div>

									<div class="form-group">
										<div class="col-xs-6 col-sm-6">
											<label>Category</label>
											<select class="form-control category_dropdown">
												<option value="0">---------- Please Select  ----------</option>
												@foreach($categories_list as $list)
												<option value="{{ $list->id }}">{{ $list->category_name }}</option>
												@endforeach
											</select>
										</div>

										<div class="col-xs-6 col-sm-6">
											<label>Sub Category</label>
											<select class="form-control" id="sub_category_dropdown" name="category_id">

											</select>
										</div>
									</div>

									<div class="form-group">
										<div class="col-xs-6 col-sm-6">
											<label>Rating</label>
											<select class="form-control" name="product_rating">
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
											</select>
										</div>
										<div class="col-xs-6 col-sm-6">
											<label>Top Products (Display in the front page)</label>
											<select class="form-control" name="top_products">
												<option value="0">Do not show on top products</option>
												<option value="1">Show on top products</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<div class="col-xs-6 col-sm-6">
											<label>Description</label>
											<textarea name="product_description" class="form-control"></textarea>
										</div>
									</div>
									<br />
									<div class="form-group">
										<div class="col-xs-12 col-sm-12" align="center">
											<button type="submit" class="btn btn-default">
												Submit
											</button>
										</div>
									</div>
								</form>
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
<script>
	$('.category_dropdown').on('change',function(){
		var category_id = $('.category_dropdown').val();
		$.ajax({
			type        :    "GET",
			url         :    "get_sub_category_list",
			dataType    :    "html",
			data        :    { 'category_id' : category_id },
			success     :    function (result) {
				$('#sub_category_dropdown').html(result);
			}
		});
	});</script>
@endsection