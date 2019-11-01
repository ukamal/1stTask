@extends('layouts.website')
@section('css_content')
<link rel="stylesheet" href="{{ URL::asset('css/Admin_css/dashboard.css') }}">
<link rel="stylesheet" href="{{ URL::asset('css/Admin_css/dataTables.bootstrap.css') }}">
<style>
	.my-header {
		padding: 1em;
		font-size: 25px;
		font-family: 'Calibri';
	}

	.panel-body {
		padding: 35px;
	}
	
	.swin-btn-square {
	    min-width: 50px;
	    min-height: 20px;
	    padding: 10px 35px;
	    background-color: #ffffff;
	    border: 1px solid #f15f2a;
        border-bottom-width: 1px;
        border-bottom-style: solid;
        border-bottom-color: rgb(241, 95, 42);
       	display: inline-block;
	    position: relative;
	    color: #f15f2a;
	}
	
	.swin-btn-square:hover {
		border-bottom: solid 1px #f15f2a;
		box-shadow: 0 2px 3px #a8a8a8;
		transform: scale(1.04);
		-webkit-transform: scale(1.04);
		-moz-transform: scale(1.04);
		-o-transform: scale(1.04);
		-ms-transform: scale(1.04);
	}
	
	@media(max-width:480px){
		.my-header {
			font-size: 22px;
		}
	}
</style>
@endsection

@section('body_content')
<div class="panel panel-default">
	<div class="panel-heading">
		<span class="my-header"><strong> My Orders </strong></span>
	</div>
	<div class="panel-body">
		<div class="box box-info">
			<div class="box-body">
				<table id="example1" class="table table-bordered table-striped table-responsive">
					<thead>
						<tr>
							<th>Order Id</th>
							<th>Date</th>
							<th>Time</th>
							<th>Status</th>
							<th style="text-align: center">Action</th>
						</tr>
					</thead>
					<tbody>
						@if(isset($all_orders))
							@foreach($all_orders as $orders)
							<?php $date_time =  $orders->order_date_time;
								  $date_time_split = explode(" ", $date_time);
								  $date = $date_time_split[0];
								  $time = $date_time_split[1];
								  $date_formatted = date('l, jS \of F Y', strtotime ($date));
								  $time_formatted = date('h:i A', strtotime($time));
							 ?>
							<tr>
								<td>{{ $orders->order_id }}</td>
								<td>{{ $date_formatted }}</td>
								<td>{{ $time_formatted }}</td>
								<td>{{ $orders->order_status }}</td>
								<td style="text-align: center">
									<a href="{{ url('view_order_details/'.$orders->id) }}" class="swin-btn-square"> Details</a>
								</td>
							</tr>
							@endforeach
						@endif
					</tbody>
				</table>
			</div>
		</div>
		<!-- /.box-body -->
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
		$('#my_order').addClass('active');
	}; 
</script>
@endsection