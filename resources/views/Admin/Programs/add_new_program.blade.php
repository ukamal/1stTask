@extends('layouts.admin')
@section('css_content')
<link rel="stylesheet" href="{{ URL::asset('css/Admin_css/admin-body.css') }}">
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
		<span class="my-header"><strong>Add New Program</strong></span>
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
								<form class="form-horizontal" action="{{ url('admin/create_program') }}" method="POST" enctype="multipart/form-data" role="form">
									{!! csrf_field() !!}
									<div class="col-xs-12 col-sm-12">
										<div class="form-group">
											<img id="program_image_img" src="{{ URL::asset('images/no-image-available.jpg') }}" width="200px;" />
										</div>
										<div class="form-group">
											<input id="program_image" name="program_image" type="file" class="file-loading program_image" accept="image/*">
										</div>
									</div>

									<div class="form-group">
										<div class="col-xs-12 col-sm-12">
											<span class="narration">The “Slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens. </span>
										</div>
									</div>

									<div class="form-group">
										<div class="col-xs-6 col-sm-6">
											<label>Name</label>
											<input type="text" name="program_name" class="form-control" placeholder="Add Program Name">
										</div>

										<div class="col-xs-6 col-sm-6">
											<label>Slug</label>
											<input type="text" name="program_slug" class="form-control" placeholder="Program Slug">
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
<script>
	function readURL(input) {

		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function(e) {
				$('#program_image_img').attr('src', e.target.result);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}


	$('#program_image').change(function() {
		readURL(this);
	});

</script>
@endsection