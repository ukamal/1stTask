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
	
	.myTh{
        text-align : center;
    }
    .mtTd{
        text-align : center;
    }
</style>
@endsection

@section('body_content')
<div class="panel panel-default">
	<div class="panel-heading">
		<span class="my-header"> Products List For <strong> {{ $package->package_name }} </strong></span>
	</div>
	<div class="panel-body">
		<div class="row">
			
			<!-- Add Product for Package Informations -->
			<div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
				<div class="modal-dialog" role="document">
					<form action="{{ url('/admin/add_product_for_package') }}" method="POST">
		                {!! csrf_field() !!}
		                <div class="modal-content">
		                    <div class="modal-header">
		                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                        <span aria-hidden="true">&times;</span></button>
		                        <h4 class="modal-title" id="defaultModalLabel">Add Product</h4>
		                    </div>
		                    <div class="modal-body">
		                        <div class="row">
		                          <div class="col-md-12">
		                          	<input type="hidden" name="package_id" value="{{ $package_id }}" />
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
		                                          <select class="form-control selectpicker2" name="add_product_id[]" data-live-search="true">
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
		                    </div>
		                    <div class="modal-footer">
		                        <button type="submit" class="btn btn-info">Submit</a>
		                        <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
		                    </div>
		                </div>
		            </form>
				</div>
			</div>
			<!-- END -->
			
			<!-- Update Product for Package Informations -->
			<div class="modal fade" id="changeProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
				<div class="modal-dialog" role="document">
					<form action="{{ url('/admin/change_product_for_package') }}" method="POST">
		                {!! csrf_field() !!}
		                <div class="modal-content">
		                    <div class="modal-header">
		                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                        <span aria-hidden="true">&times;</span></button>
		                        <h4 class="modal-title" id="defaultModalLabel">Change Product</h4>
		                    </div>
		                    <div class="modal-body"> 
		                    	<input type="hidden" name="package_id" value="{{ $package_id }}" />
		                        <input type="hidden" id="package_product_id" name="package_product_id" />
		                        <div class="row">
		                          <div class="col-md-6">
		                              <select class="form-control selectpicker product_id" name="product_id" id="product_id" data-live-search="true">
											@foreach($products_list as $list)
											<option value="{{ $list->id }}">{{ $list->product_name }}</option>
											@endforeach
									  </select>
		                          </div>
		                        </div>
		                    </div>
		                    <div class="modal-footer">
		                        <button type="submit" class="btn btn-info">Change</a>
		                        <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
		                    </div>
		                </div>
		            </form>
				</div>
			</div>
			<!-- END -->

			<!-- Delete Product for package -->
			<div class="modal fade" id="removeProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<h4 class="modal-title" id="exampleModalLabel">Remove Product from this Package</h4>
						</div>
						<div class="modal-body">
							<form action="{{ url('/admin/remove_product_from_package') }}" method="post">
								{!! csrf_field() !!}
								<div class="form-group">
									<input type="hidden" name="package_id" value="{{ $package_id }}" />
									<input type="hidden" id="delete_package_product_id" name="delete_package_product_id" />
									<label class="control-label"> Are you sure ?</label>
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
					@if(session()->has('added_message'))
					<div class="row">
						<div class="col-md-12 col-xs-12">
							<div class="alert alert-success">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
									&times;
								</button>
								<h4><i class="icon fa fa-check"></i> {{ session()->get('added_message') }} </h4>
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
								<a href="javascript:void(0)" class="btn btn-primary"
									data-backdrop="static"
									data-toggle="modal"
									data-target="#addProductModal"
								><i class="fa fa-plus"></i> Add more products </a>&nbsp;
								<a href="{{ url('admin/get_packages_list_for_program/'.$program_id) }}" class="btn btn-default"><i class="fa fa-step-backward"></i> Back </a>
							</div>
							<br />
							<div class="box-body">
								<table id="example1" class="table table-bordered table-striped table-responsive">
									<thead>
										<tr>
											<th>#</th>
											<th>Products</th>
											<th style="text-align: center">Action</th>
										</tr>
									</thead>
									<tbody>
										@if(isset($package_products))
											@foreach($package_products as $index => $list)
											<tr>
												<td>{{ ++$index }}</td>
												<td>{{ $list->product->product_name }}</td>
												<td align="center">
													<a href="javascript:void(0)" class="changeProduct"
														data-backdrop="static"
														data-toggle="modal"
														data-target="#changeProductModal"
														data-id = "{{ $list->id }}"
														data-product_id = "{{ $list->product->id }}"
														data-product_name = "{{ $list->product->product_name }}"
														><i class="fa fa-pencil"></i> 
													</a>&nbsp; 
													<a href="javascript:void(0)" class="removeProduct"
														data-backdrop="static"
														data-toggle="modal"
														data-target="#removeProductModal"
														data-id = "{{ $list->id }}"
														data-product_id = "{{ $list->product->id }}"
														><i class="fa fa-times"></i> 
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
	});
	
	$('.changeProduct').click(function(){
		$("#package_product_id").val($(this).data('id'));
		$("#product_id").val($(this).data('product_id'));
		$('.selectpicker').selectpicker('refresh')
	});

	$('.removeProduct').click(function() {
		$("#delete_package_product_id").val($(this).data('id'));
	});
	
	$(document).ready(function() {
        
        var counter = 0;
        
        var myCount = 2;

        $("#addrow").on("click", function () {
        	
        	$('.selectpicker2').selectpicker('render');
        	
            counter = $('#myTable tr').length - 2;
            
            var newRow = $("<tr>");
            var cols = "";
            
            cols += '<td class="mtTd">'+myCount+++'</td>';
            cols += '<td>'+
            			'<select class="form-control selectpicker2" name="add_product_id[]" data-live-search="true">'+
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