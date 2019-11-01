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

</style>
@endsection

@section('body_content')
<div class="panel panel-default">
	<div class="panel-heading">
		<span class="my-header"><strong> Packages List </strong></span>
	</div>
	<div class="panel-body">
		<div class="row">
			<!-- Update Package Informations -->
			<div class="modal fade" id="editPackageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
				<div class="modal-dialog" role="document">
					<form action="{{ url('/admin/update_package_information') }}" method="POST">
		                {!! csrf_field() !!}
		                <div class="modal-content">
		                    <div class="modal-header">
		                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                        <span aria-hidden="true">&times;</span></button>
		                        <h4 class="modal-title" id="defaultModalLabel">Update Package Info</h4>
		                    </div>
		                    <div class="modal-body"> 
		                        <input type="hidden" id="update_package_id" name="update_package_id" />
		                        <input type="hidden" id="program_id" name="program_id" />
		                        <div class="row">
		                          <div class="col-md-3 myLabel">
		                              <label>Package Name</label>
		                          </div>
		                          <div class="col-md-6">
		                              <input type="text" id="update_package_name" name="update_package_name" class="form-control" />
		                          </div>
		                        </div><br />
		                        
		                        <div class="row">
		                          <div class="col-md-3 myLabel">
		                              <label>Box Price</label>
		                          </div>
		                          <div class="col-md-6">
		                               <input type="text" id="update_box_price" name="update_box_price" class="form-control" />
		                          </div>
		                        </div><br />
		                        
		                        <div class="row">
		                          <div class="col-md-3 myLabel">
		                              <label>Buffet Price</label>
		                          </div>
		                          <div class="col-md-6">
		                               <input type="text" id="update_buffet_price" name="update_buffet_price" class="form-control" />
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

			<!-- Delete Package -->
			<div class="modal fade" id="deletePackageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<h4 class="modal-title" id="exampleModalLabel">Delete Package</h4>
						</div>
						<div class="modal-body">
							<form action="{{ url('/admin/delete_package') }}" method="post">
								{!! csrf_field() !!}
								<div class="form-group">
									<input type="hidden" name="delete_package_id" id="delete_package_id" />
									<input type="hidden" name="delete_program_id" id="delete_program_id" />
									<label class="control-label"> Are you sure you want to delete this Package ?</label>
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
								<form class="form-horizontal" action="{{ url('admin/get_packages_for_program') }}" method="POST" enctype="multipart/form-data" role="form">
									{!! csrf_field() !!}
									<div class="form-group">
										<div class="col-xs-4 col-sm-4">
											<label>Programs</label>
											<select class="form-control program_dropdown" name="program_id" onchange="this.form.submit()">
												<option value="0">---------- Please Select  ----------</option>
												@foreach($programs_list as $list)
												<option {{ isset($program_id) && ($list->id==$program_id)? "selected='selected'" : '' }} value="{{ $list->id }}">{{ $list->program_name }}</option>
												@endforeach
											</select>
										</div>
									</div>
								</form>
							</div>
							<div class="box-body">
								<table id="example1" class="table table-bordered table-striped table-responsive">
									<thead>
										<tr>
											<th>Package Name</th>
											<th>Box Price</th>
											<th>Buffet Price</th>
											<th style="text-align: center">Action</th>
										</tr>
									</thead>
									<tbody>
										@if(isset($packages_list))
											@foreach($packages_list as $list)
											<tr>
												<td>{{ $list->package_name }}</td>
												<td>{{ $list->box_price }}</td>
												<td>{{ $list->buffet_price  }}</td>
												<td align="center">
													<a href="javascript:void(0)" class="editPackage"
														data-backdrop="static"
														data-toggle="modal"
														data-target="#editPackageModal"
														data-id = "{{ $list->id }}"
														data-program_id = "{{ $program_id }}"
														data-package_name = "{{ $list->package_name }}"
														data-box_price = "{{ $list->box_price }}"
														data-buffet_price = "{{ $list->buffet_price }}"
														><i class="fa fa-pencil"></i> 
													</a>&nbsp; 
													<a href="javascript:void(0)" class="deletePackage"
														data-backdrop="static"
														data-toggle="modal"
														data-target="#deletePackageModal"
														data-id = "{{ $list->id }}"
														data-program_id = "{{ $program_id }}"
														><i class="fa fa-times"></i> 
													</a>&nbsp; 
													<a href="{{ url('admin/get_products_for_package/'.$list->id) }}"
														><i class="fa fa-eye"></i> 
													</a>
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
	
	$('.editPackage').click(function(){
		$("#update_package_id").val($(this).data('id'));
		$("#program_id").val($(this).data('program_id'));
		$("#update_package_name").val($(this).data('package_name'));
		$("#update_box_price").val($(this).data('box_price'));
		$("#update_buffet_price").val($(this).data('buffet_price'));
	});

	$('.deletePackage').click(function() {
		$("#delete_package_id").val($(this).data('id'));
		$("#delete_program_id").val($(this).data('program_id'));
	});

</script>
@endsection