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
		<span class="my-header"><strong> Gallery List </strong></span>
	</div>
	<div class="panel-body">
		<div class="row">
			<!-- View Gallery Image -->
			<div class="modal fade" id="viewGalleryImageDetailsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<h4 class="modal-title" id="exampleModalLabel">Gallery Image</h4>
						</div>
						<div class="modal-body">
							<img id="show_gallery_image" width="100%" src="" />
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

			<!-- Update Gallery Image -->
			<div class="modal fade" id="updateGalleryImageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
				<div class="modal-dialog" role="document">
					<form method="POST" action="{{ url('/admin/update_gallery_image') }}" enctype="multipart/form-data" role="form">
						{!! csrf_field() !!}
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<h4 class="modal-title" id="exampleModalLabel">Update</h4>
							</div>
							<div class="modal-body">
								<input type="hidden" id="update_image_id" name="update_image_id" />
								<input type="hidden" id="update_image_name" name="update_image_name" />
								<img id="show_update_gallery_image" width="100%" src="" />
								<input id="update_gallery_image_input" name="update_gallery_image_input" type="file" class="file-loading update_gallery_image_input" accept="image/*">
								<br />
								<div class="form-group">
									<div class="col-md-6">
										<input type="text" class="form-control" id="update_title" name="update_title" />
									</div>
									<div class="col-md-6">
										<input type="text" class="form-control" id="update_slug" name="update_slug" />
									</div>
								</div>
								<br />
							</div>
							<div class="modal-footer">
								<button type="submit" class="btn btn-info">Update</a>
								<button type="button" class="btn btn-danger" data-dismiss="modal">
									Cancel
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<!-- END -->
			
			<!-- Update Gallery Video -->
			<div class="modal fade" id="updateGalleryVideoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
				<div class="modal-dialog" role="document">
					<form method="POST" action="{{ url('/admin/update_gallery_video') }}" enctype="multipart/form-data" role="form">
						{!! csrf_field() !!}
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<h4 class="modal-title" id="exampleModalLabel">Update</h4>
							</div>
							<div class="modal-body">
								<input type="hidden" class="form-control" id="update_video_id" name="update_video_id" />
								<div class="form-group">
									<div class="col-md-6">
										<input type="text" class="form-control" id="update_video_title" name="update_video_title" />
									</div>
									<div class="col-md-6">
										<input type="text" class="form-control" id="update_video_slug" name="update_video_slug" />
									</div>
								</div>
								<br />
								<div class="form-group">
									<div class="col-md-12">
										<input type="text" class="form-control" id="update_video_link" name="update_video_link" />
									</div>
								</div>
								<br />
							</div>
							<div class="modal-footer">
								<button type="submit" class="btn btn-info">Update</a>
								<button type="button" class="btn btn-danger" data-dismiss="modal">
									Cancel
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<!-- END -->
			
			<!-- Delete Gallery Image -->
			<div class="modal fade" id="deleteGalleryImageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
				<div class="modal-dialog" role="document">
					<form method="POST" action="{{ url('/admin/delete_gallery_image') }}">
						{!! csrf_field() !!}
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<h4 class="modal-title" id="exampleModalLabel">Delete</h4>
							</div>
							<div class="modal-body">
								<input type="hidden" id="delete_image_id" name="delete_image_id" />
								<input type="hidden" id="delete_image_name" name="delete_image_name" />
								Are you sure you want to remove ?
							</div>
							<div class="modal-footer">
								<button type="submit" class="btn btn-danger">Yes</a>
								<button type="button" class="btn btn-info" data-dismiss="modal">
									No
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<!-- END -->
			
			<!-- Delete Gallery Video -->
			<div class="modal fade" id="deleteGalleryVideoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
				<div class="modal-dialog" role="document">
					<form method="POST" action="{{ url('/admin/delete_gallery_video') }}">
						{!! csrf_field() !!}
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<h4 class="modal-title" id="exampleModalLabel">Delete</h4>
							</div>
							<div class="modal-body">
								<input type="hidden" id="delete_video_id" name="delete_video_id" />
								Are you sure you want to remove ?
							</div>
							<div class="modal-footer">
								<button type="submit" class="btn btn-danger">Yes</a>
								<button type="button" class="btn btn-info" data-dismiss="modal">
									No
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<!-- END -->

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
											<th>Video Link</th>
											<th>Title</th>
											<th>Slug</th>
											<th style="text-align: center">Action</th>
										</tr>
									</thead>
									<tbody>
										@if(isset($gallery_list))
											@foreach($gallery_list as $list)
												@if($list->video_link==null)
													<tr>
														<td align="center"> 
															@if($list->image==null) 
																<img style="width: 60px;height: 40px;" src="{{ URL::asset('images/no-image-available.jpg') }}" /> 
															@else 
																<img style="width: 60px;height: 40px;" src="{{ URL::asset('images/Gallery/'.$list->image) }}" /> 
															@endif 
														</td>
														<td>Not Available</td>
														<td>{{ $list->title }}</td>
														<td>{{ $list->slug }}</td>
														<td align="center">
															<a href="javascript:void(0)" class="edit_gallery_image" data-toggle="modal" data-backdrop="static" data-target="#updateGalleryImageModal"
																data-update_image_id="{{ $list->id }}"
											                    data-update_title="{{ $list->title }}"
											                    data-update_image_name="{{ $list->image }}"
											                    data-update_slug="{{ $list->slug }}"
											                    data-update_image_src="{{ URL::asset('images/Gallery/'.$list->image) }}"
																> 
																<i class="fa fa-pencil"></i> 
															</a>&nbsp; 
															<a href="javascript:void(0)" class="delete_gallery_image" data-toggle="modal" data-backdrop="static" data-target="#deleteGalleryImageModal"
																data-delete_image_id="{{ $list->id }}"
											                    data-delete_image_name="{{ $list->image }}"
																><i class="fa fa-times"></i> 
															</a>&nbsp; 
														</td>
													</tr>
												@else
													<tr>
														<td>Not Available</td>
														<td>{{ $list->video_link }}</td>
														<td>{{ $list->title }}</td>
														<td>{{ $list->slug }}</td>
														<td align="center">
															<a href="javascript:void(0)" class="edit_gallery_video" data-toggle="modal" data-backdrop="static" data-target="#updateGalleryVideoModal"
																data-update_video_id="{{ $list->id }}"
											                    data-update_video_title="{{ $list->title }}"
											                    data-update_video_slug="{{ $list->slug }}"
											                    data-update_video_link="{{ $list->video_link }}"
																><i class="fa fa-pencil"></i> 
															</a>&nbsp; 
															<a href="javascript:void(0)" class="delete_gallery_video" data-toggle="modal" data-backdrop="static" data-target="#deleteGalleryVideoModal"
																data-delete_video_id="{{ $list->id }}"
																><i class="fa fa-times"></i> 
															</a>&nbsp;  
														</td>
													</tr>
												@endif
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
		$('#show_gallery_image').attr('src', sr);
		$('#viewGalleryImageDetailsModal').modal('show');
	});

	$('.delete_gallery_image').on('click', function() {
        $("#delete_image_id").val($(this).data('delete_image_id'));
        $("#delete_image_name").val($(this).data('delete_image_name'));
	});
	
	$('.delete_gallery_video').on('click', function() {
        $("#delete_video_id").val($(this).data('delete_video_id'));
	});
	
	$('.edit_gallery_image').on('click', function(){
		var sr = $(this).data('update_image_src');
		$('#show_update_gallery_image').attr('src', sr);
		$("#update_image_id").val($(this).data('update_image_id'));
        $("#update_image_name").val($(this).data('update_image_name'));
        $("#update_title").val($(this).data('update_title'));
        $("#update_slug").val($(this).data('update_slug'));
	});
	
	$('.edit_gallery_video').on('click', function(){
		$("#update_video_id").val($(this).data('update_video_id'));
        $("#update_video_title").val($(this).data('update_video_title'));
        $("#update_video_link").val($(this).data('update_video_link'));
        $("#update_video_slug").val($(this).data('update_video_slug'));
	});
	
	function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#show_update_gallery_image').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }


    $('#update_gallery_image_input').change(function() {
        readURL(this);
    });

</script>
@endsection