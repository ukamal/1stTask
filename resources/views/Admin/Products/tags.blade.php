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
</style>
@endsection

@section('body_content')
<div class="panel panel-default">
	<div class="panel-heading">
		<span class="my-header"><strong> Tags </strong></span>
	</div>
	<div class="panel-body">
		<div class="row">
			<!-- Delete Tag -->
			<div class="modal fade" id="deleteTagModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<h4 class="modal-title" id="exampleModalLabel">Delete Tag</h4>
						</div>
						<div class="modal-body">
							<form action="{{ url('admin/delete_tag') }}" method="post" role="form">
								{!! csrf_field() !!}
								<div class="form-group">
									<input type="hidden" name="delete_tag_id" id="delete_tag_id" />
									<label class="control-label"> Are you sure you want to delete this Tag ?</label>
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
					<div class="sub-panel-heading">
						Add Tags
					</div>
					<hr />
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
								<form class="form-horizontal" action="{{ url('admin/create_tag') }}" method="POST" enctype="multipart/form-data" role="form">
									{!! csrf_field() !!}
									<div class="form-group">
										<div class="col-xs-12 col-sm-12">
											<span class="narration">The “Slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens. </span>
										</div>
									</div>

									<div class="form-group">
										<div class="col-xs-6 col-sm-6">
											<label>Name</label>
											<input type="text" name="tag_name" class="form-control" placeholder="Add Tag Name">
										</div>

										<div class="col-xs-6 col-sm-6">
											<label>Slug</label>
											<input type="text" name="tag_slug" class="form-control" placeholder="Tag Slug">
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

			<div class="col-xs-12 col-sm-12">
				<div class="panel">
					<div class="sub-panel-heading">
						Tags List
					</div>
					<div class="panel-body">
						<div class="box box-info">
							<div class="box-body">
								<table id="example1" class="table table-bordered table-striped table-responsive">
									<thead>
										<tr>
											<th>Name</th>
											<th>Slug</th>
											<th>Count</th>
											<th style="text-align: center">Action</th>
										</tr>
									</thead>
									<tbody>
										@if(isset($tags_list))
										@foreach($tags_list as $list)
										<tr>
											<td>{{ $list->tag_name }}</td>
											<td>{{ $list->tag_slug }}</td>
											<td></td>
											<td align="center"><a href="{{ url('admin/edit_tag_form/'.$list->id) }}"> <i class="fa fa-pencil"></i> </a>&nbsp; <a href="javascript:void(0)" class="deleteTag"
											data-backdrop="static"
											data-toggle="modal"
											data-target="#deleteTagModal"
											data-id = "{{ $list->id }}"
											> <i class="fa fa-times"></i> </a>&nbsp; </td>
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

	window.onload = function() {
		$('#products').addClass('active');
		$('#all_products').addClass('active');
	};

	$('.deleteTag').click(function() {
		$("#delete_tag_id").val($(this).data('id'));
	});

</script>
@endsection