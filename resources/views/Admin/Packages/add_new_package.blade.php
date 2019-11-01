@extends('layouts.admin')
@section('css_content')
<link rel="stylesheet" href="{{ URL::asset('css/Admin_css/admin-body.css') }}">
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
		font-weight:lighter;
	}

	.modal-dialog {
		position: relative;
		display: table; /* This is important */
		overflow-y: auto;
		overflow-x: auto;
		width: auto;
		min-width: 300px;
	}
	.myTh{
        text-align : center;
    }
    .mtTd{
        text-align : center;
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
		<span class="my-header"><strong>Add New Package</strong></span>
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
								<form class="form-horizontal" action="{{ url('admin/create_package') }}" method="POST" enctype="multipart/form-data" role="form">
									{!! csrf_field() !!}
									<div class="form-group">
										<div class="col-xs-6 col-sm-6">
											<label>Programs</label>
											<select class="form-control program_dropdown" name="program_id">
												<option value="0">---------- Please Select  ----------</option>
												@foreach($programs_list as $list)
												<option value="{{ $list->id }}">{{ $list->program_name }}</option>
												@endforeach
											</select>
										</div>

										<div class="col-xs-6 col-sm-6">
											<label>Package Name</label>
											<input type="text" name="package_name" class="form-control" placeholder="Enter Package Name">
										</div>
									</div>
									<div class="form-group">
										<div class="col-xs-6 col-sm-6">
											<label>Box Price &nbsp; - &nbsp; <span class="narration">in taka</span></label>
											<input type="text" name="box_price" class="form-control" placeholder="Enter Box Price">
										</div>

										<div class="col-xs-6 col-sm-6">
											<label>Buffet Price &nbsp; - &nbsp; <span class="narration">in taka</span></label>
											<input type="text" name="buffet_price" class="form-control" placeholder="Enter Buffet Price">
										</div>
									</div>
									<div class="form-group">
										<div class="col-xs-6 col-sm-6">
											<table class="table table-bordered order-list" id="myTable">
				                                <thead>
				                                    <tr>
				                                      <td class="myTh" style="width: 70px">Serial #</td>
				                                      <td class="myTh">Product Name</td>
				                                      <td class="myTh">Actions</td>
				                                    </tr>
				                                </thead>
				                                <tbody>
				                                    <tr>
				                                      <td class="mtTd">1</td>
				                                      <td>
				                                          <select class="form-control selectpicker" name="product_id[]" data-live-search="true">
																<option value="none">None</option>
																@foreach($products_list as $list)
																<option value="{{ $list->id }}">{{ $list->product_name }}</option>
																@endforeach
														  </select>
				                                      </td>
				                                      <td class="mtTd">
				                                          <a class="btn btn-danger deleteRow"><i class="fa fa-minus"></i></a>
				                                      </td>
				                                    </tr>
				                                </tbody>
				                                <tfoot>
				                                    <tr>
				                                        <td></td>
				                                        <td></td>
				                                        <td class="mtTd">
				                                            <a class="btn btn-primary" id="addrow"><i class="fa fa-plus"></i></a>
				                                        </td>
				                                    </tr>
				                                </tfoot>
				                              </table>
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
<script src="{{ URL::asset('js/Admin_js/bootstrap-select.min.js') }}"></script>
<script>
	
	$(document).ready(function() {
        
        var counter = 0;
        
        var myCount = 2;

        $("#addrow").on("click", function () {
        	
        	$('.selectpicker').selectpicker('render');
        	
            counter = $('#myTable tr').length - 2;
            
            var newRow = $("<tr>");
            var cols = "";
            
            cols += '<td class="mtTd">'+myCount+++'</td>';
            cols += '<td>'+
            			'<select class="form-control selectpicker" name="product_id[]" data-live-search="true">'+
							'<option value="none">None</option>'+
								'@foreach($products_list as $list)'+
									'<option value="{{ $list->id }}">'+
										'{{ $list->product_name }}'+
									'</option>'+
								'@endforeach'+
					  	'</select>'+
					'</td>';
    
            cols += '<td class="mtTd"><a class="btn btn-danger ibtnDel"><i class="fa fa-minus"></i></a></td>';
            
            newRow.append(cols);
            
            $("table.order-list").append(newRow);
            counter++;
        });
    
        $("table.order-list").on("click", ".ibtnDel", function (event) {
            $(this).closest("tr").remove();
            
            counter -= 1;
            
        });
        
    });

</script>
@endsection