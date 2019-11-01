@extends('layouts.admin')
@section('css_content')
<link rel="stylesheet" href="{{ URL::asset('css/Admin_css/dashboard.css') }}">
<link rel="stylesheet" href="{{ URL::asset('css/Admin_css/dataTables.bootstrap.css') }}">
<style>
	.my-header {
		padding: 1em;
		font-size: 25px;
		font-family: 'Calibri';
		margin-left: -25px;
	}
</style>
@endsection

@section('body_content')

<div class="panel panel-default">
	<div class="panel-heading">
		<span class="my-header"><strong> List of Orders </strong></span>
	</div>
	<div class="panel-body">

		<!--div class="row">

			<div class="col-xs-12 col-sm-12">
				<div class="panel">
					<div class="sub-panel-heading">
						Statistics
					</div>
					<div class="panel-body">
						<div class="col-xs-6 col-sm-3">
							<div class="panel panel-warning dasboard-widgets">
								<div class="panel-body">
									<h4 align="center" class="subheader">Orders</h4>
									<div align="center">
										<a href="#" class="conten-number">5</a>
									</div>
								</div>
							</div>
						</div>

						<div class="col-xs-6 col-sm-3">
							<div class="panel panel-success dasboard-widgets">
								<div class="panel-body">
									<h4 align="center" class="subheader">Pending Delivery</h4>
									<div align="center">
										<a href="#" class="conten-number">2</a>
									</div>
								</div>
							</div>
						</div>

						<div class="col-xs-6 col-sm-3">
							<div class="panel panel-danger dasboard-widgets">
								<div class="panel-body">
									<h4 align="center" class="subheader">Net Profit</h4>
									<p class="content-amount">
										5,000 TK
									</p>
								</div>
							</div>
						</div>

						<div class="col-xs-6 col-sm-3">
							<div class="panel panel-warning dasboard-widgets">
								<div class="panel-body">
									<h4 align="center" class="subheader">Customers</h4>
									<div align="center">
										<a href="#" class="conten-number">200</a>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div-->

			<div class="col-xs-12 col-sm-12">
				<div class="panel">
					<!--div class="sub-panel-heading">
						Orders List
					</div-->
					<div class="panel-body">
						<div class="box box-info">
							<div class="box-body">
								<table id="example1" class="table table-bordered table-striped table-responsive">
									<thead>
										<tr>
											<th>Order Id</th>
											<th>Date</th>
											<th>Time</th>
											<th style="display: none;">Date Raw</th>
											<th>Name</th>
											<th>Email</th>
											<th style="text-align: center">Action</th>
										</tr>
									</thead>
									<tbody>
										@if(isset($all_orders))
											@foreach($all_orders as $orders)
												@if($orders->order_date_time!=null)
													<?php $date_time =  $orders->order_date_time;
														  $date_time_split = explode(" ", $date_time);
														  $date = $date_time_split[0];
														  $time = $date_time_split[1];
														  $date_formatted = date('l, jS \of F Y', strtotime ($date));
														  $time_formatted = date('h:i A', strtotime($time));
													 ?>
												 @else
												 	 <?php  $date_formatted = "Not Available";
												 	 		$time_formatted = "Not Available";
												 	 		$date_time      = "Not Available";
													 ?>
												 @endif
											<tr>
												<td>{{ $orders->order_id }}</td>
												<td>{{ $date_formatted }}</td>
												<td>{{ $time_formatted }}</td>
												<td style="display: none;">{{ $date_time }}</td>
												<td>{{ $orders->name }}</td>
												<td>{{ $orders->email }}</td>
												<td style="text-align: center">
													<a href="{{ url('admin/view_registered_clients_order_details/'.$orders->id.'/'.$user_id) }}" class="swin-btn-square" data-toggle="view-order-details" title="View Orders Details">
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
			
			<div class="col-md-12" align="center">
				<a href="{{ url('admin/view_registered_clients_list') }}" class="btn btn-default">
					<i class="fa fa-step-backward"></i> Back
				</a>
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
		$("#example1").DataTable({
			"order": [[3, "desc"]]
		});
		$('#example2').DataTable({
			"paging" : true,
			"lengthChange" : false,
			"searching" : false,
			"ordering" : true,
			"info" : true,
			"autoWidth" : false
		});
		
		$('[data-toggle="view-order-details"]').tooltip();
	});

</script>
@endsection