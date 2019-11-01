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
</style>
@endsection

@section('body_content')
<div class="panel panel-default">
	<div class="panel-heading">
		<span class="my-header"><strong> Programs List </strong></span>
	</div>
	<div class="panel-body">
		<div class="row">
			<!-- View Category Image -->
			<div class="modal fade" id="viewProgramDetailsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<h4 class="modal-title" id="exampleModalLabel">Program Image</h4>
						</div>
						<div class="modal-body">
							<img id="show_program_image" width="100%" src="" />
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
			<div class="modal fade" id="deleteProgramModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<h4 class="modal-title" id="exampleModalLabel">Delete Program</h4>
						</div>
						<div class="modal-body">
							<form action="{{ url('admin/delete_program') }}" method="post" role="form">
								{!! csrf_field() !!}
								<div class="form-group">
									<input type="hidden" name="delete_program_id" id="delete_program_id" />
									<label class="control-label"> Are you sure you want to delete this Program ?</label>
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
											<th style="text-align: center">Action</th>
										</tr>
									</thead>
									<tbody>
										@if(isset($programs_list))
											@foreach($programs_list as $list)
											<tr>
												<td align="center"> 
													@if($list->program_image=='') 
														<img style="width: 60px;height: 40px;" src="{{ URL::asset('images/no-image-available.jpg') }}" /> 
													@else 
														<img style="width: 60px;height: 40px;" src="{{ URL::asset('images/Programs/'.$list->program_image) }}" /> 
													@endif 
												</td>
												<td>{{ $list->program_name }}</td>
												<td>{{ $list->program_slug }}</td>
												<td align="center">
													<a href="{{ url('admin/edit_program_form/'.$list->id) }}"> 
														<i class="fa fa-pencil"></i> 
													</a>&nbsp; 
													<a href="javascript:void(0)" class="deleteProgram"
														data-backdrop="static"
														data-toggle="modal"
														data-target="#deleteProgramModal"
														data-id = "{{ $list->id }}"
														><i class="fa fa-times"></i> 
													</a>&nbsp; 
												</td>
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

	$('img').on('click', function() {
		var sr = $(this).attr('src');
		$('#show_program_image').attr('src', sr);
		$('#viewProgramDetailsModal').modal('show');
	});

	$('.deleteProgram').click(function() {
		$("#delete_program_id").val($(this).data('id'));
	});

</script>
@endsection