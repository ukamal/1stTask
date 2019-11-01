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
		<span class="my-header"><strong> Categories List </strong></span>
	</div>
	<div class="panel-body">
		<div class="row">
			<!-- View Category Image -->
			<div class="modal fade" id="viewCategoryDetailsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<h4 class="modal-title" id="exampleModalLabel">Category Image</h4>
						</div>
						<div class="modal-body">
							<img id="show_category_image" width="100%" src="" />
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

			<!-- Delete Category -->
			<div class="modal fade" id="deleteCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<h4 class="modal-title" id="exampleModalLabel">Delete Category</h4>
						</div>
						<div class="modal-body">
							<form action="{{ url('admin/delete_category') }}" method="post" role="form">
								{!! csrf_field() !!}
								<div class="form-group">
									<input type="hidden" name="delete_category_id" id="delete_category_id" />
									<label class="control-label"> Are you sure you want to delete this Category ?</label>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">
										No
									</button>
									<button type="submit" class="btn btn-danger">
										Yes
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- End -->

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
					@if(session()->has('deleted_message'))
					<div class="row">
						<div class="col-md-12 col-xs-12">
							<div class="alert alert-danger">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
									&times;
								</button>
								<h4><i class="icon fa fa-check"></i> {{ session()->get('deleted_message') }} </h4>
							</div>
						</div>
					</div>
					@endif
					@if(session()->has('update_message'))
					<div class="row">
						<div class="col-md-12 col-xs-12">
							<div class="alert alert-info">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
									&times;
								</button>
								<h4><i class="icon fa fa-check"></i> {{ session()->get('update_message') }} </h4>
							</div>
						</div>
					</div>
					@endif
					<div class="panel-body">
						<div class="box box-info">
							<div class="box-body">
								<table id="example1" class="table table-bordered table-striped table-responsive">
									<thead>
										<tr>
											<th>Image</th>
											<th>Name</th>
											<th>Slug</th>
											<!--th>Count</th-->
											<th style="text-align: center">Action</th>
										</tr>
									</thead>
									<tbody>
										@if(isset($categories_list))
										@foreach($categories_list as $list)
										<tr>
											<td align="center"> @if($list->category_image=='') <img style="width: 60px;height: 40px;" src="{{ URL::asset('images/no-image-available.jpg') }}" /> @else <img style="width: 60px;height: 40px;" src="{{ URL::asset('images/Categories/'.$list->category_image) }}" /> @endif </td>
											<td>{{ $list->category_name }}</td>
											<td>{{ $list->category_slug }}</td>
											<!--td></td-->
											@if($list->parent_id!='none')
											<td align="center"><a href="{{ url('admin/edit_category_form/'.$list->id) }}"> <i class="fa fa-pencil"></i> </a>&nbsp; <a href="javascript:void(0)" class="deleteCategory"
											data-backdrop="static"
											data-toggle="modal"
											data-target="#deleteCategoryModal"
											data-id = "{{ $list->id }}"
											> <i class="fa fa-times"></i> </a>&nbsp; </td>
											@else
											<td align="center"> N/A </td>
											@endif
										</tr>
										@endforeach
										@endif
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

	window.onload = function() {
		$('#products').addClass('active');
		$('#all_products').addClass('active');
	};

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