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
		<span class="my-header"><strong> List of Curriculum Vitae </strong></span>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-xs-12 col-sm-12">
				<div class="panel">
					<div class="panel-body">
						<div class="box box-info">
							<div class="box-body">
								<table id="example1" class="table table-bordered table-striped table-responsive">
									<thead>
										<tr>
											<th>Application Date</th>
											<th>Applicant's Name</th>
											<th>Email</th>
											<th>Age</th>
											<th>Gender</th>
											<th>Phone</th>
											<th>Address</th>
											<th>Download Attachment</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										@if(isset($cv_list))
											@foreach($cv_list as $list)
												<tr>
													<?php $date_formatted = date('l, jS \of F Y', strtotime ($list->curriculum_vitae_sent_date)); ?>
													<td>{{ $date_formatted  }}</td>
													<td>{{ $list->name }}</td>
													<td>{{ $list->email }}</td>
													<td>{{ $list->age }}</td>
													<td>{{ $list->gender }}</td>
													<td>{{ $list->mobile_number }}</td>
													<td>{{ $list->address }}</td>
													<td>
														<a href="{{ URL::asset('resume/'.$list->resume)  }}" target="_blank">{{ $list->resume }}</a>
													</td>
													<td style="text-align: center">
														<a href="{{ url('admin/view_cv_details/'.$list->id) }}" data-toggle="view-details" title="View previous job experience">
															<i class="fa fa-eye"></i>
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
		
		$('[data-toggle="view-details"]').tooltip();
		
	});
</script>
@endsection