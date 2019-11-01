@extends('layouts.admin')
@section('css_content')
<link rel="stylesheet" href="{{ URL::asset('css/Admin_css/admin-body.css') }}">
<link rel="stylesheet" href="{{ URL::asset('css/Admin_css/dataTables.bootstrap.css') }}">
<link rel="stylesheet" href="{{ URL::asset('css/Admin_css/bootstrap-select.min.css') }}">
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
	.narration {
		font-style: italic;
	}

	.modal-dialog {
		position: relative;
		display: table; /* This is important */
		overflow-y: auto;
		overflow-x: auto;
		width: auto;
		min-width: 300px;
	}
	.dropdown-menu {
		position: absolute;
		top: 100%;
		left: 0px;
		z-index: 1000;
		display: none;
		float: left;
		padding: 5px 0;
		margin: 2px 0 0;
		font-size: 14px;
		text-align: left;
		list-style: none;
		background-color: #fff;
		-webkit-background-clip: padding-box;
		background-clip: padding-box;
		border: 1px solid #ccc;
		border: 1px solid rgba(0,0,0,.15);
		border-radius: 4px;
		-webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
		box-shadow: 0 6px 12px rgba(0,0,0,.175);
	}
</style>
@endsection

@section('body_content')
<div class="panel panel-default">
	<div class="panel-heading">
		<span class="my-header"><strong>Add New Category</strong></span>
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
								<form class="form-horizontal" action="{{ url('admin/create_category') }}" method="POST" enctype="multipart/form-data" role="form">
									{!! csrf_field() !!}
									<div class="col-xs-12 col-sm-12">
										<div class="form-group">
											<img id="category_image_img" src="{{ URL::asset('images/no-image-available.jpg') }}" width="200px;" />
										</div>
										<div class="form-group">
											<input id="category_image" name="category_image" type="file" class="file-loading category_image" accept="image/*">
										</div>
									</div>

									<div class="form-group">
										<div class="col-xs-12 col-sm-12">
											<span class="narration">The “Slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens. </span>
										</div>
									</div>

									<div class="form-group">
										<div class="col-xs-6 col-sm-6">
											<label>Name</label>
											<input type="text" name="category_name" class="form-control" placeholder="Add Category Name">
										</div>

										<div class="col-xs-6 col-sm-6">
											<label>Slug</label>
											<input type="text" name="category_slug" class="form-control" placeholder="Category Slug">
										</div>
									</div>
									<div class="form-group">
										<div class="col-xs-6 col-sm-6">
											<label>Parent</label>
											<select class="form-control selectpicker" name="parent_id" data-live-search="true">
												<option value="none">None</option>
												@foreach($categories_list as $list)
												<option value="{{ $list->id }}">{{ $list->category_name }}</option>
												@endforeach
											</select>
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
<script src="{{ URL::asset('js/Admin_js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('js/Admin_js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('js/Admin_js/bootstrap-select.min.js') }}"></script>
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
	});

	function readURL(input) {

		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function(e) {
				$('#category_image_img').attr('src', e.target.result);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}


	$('#category_image').change(function() {
		readURL(this);
	});

	$('img').on('click', function() {
		var sr = $(this).attr('src');
		$('#show_category_image').attr('src', sr);
		$('#viewCategoryDetailsModal').modal('show');
	});

	$('.deleteCategory').click(function() {
		$("#delete_category_id").val($(this).data('id'));
	});

</script>
@endsection