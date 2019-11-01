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

	.sizeColor{
		color: red;
	}

</style>
@endsection

@section('body_content')
<div class="panel panel-default">
	<div class="panel-heading">
		<span class="my-header"><strong>Add New Banner Slider</strong></span>
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
								<form class="form-horizontal" action="{{ url('admin/create_banner_slider') }}" method="POST" enctype="multipart/form-data" role="form">
									{!! csrf_field() !!}
									<div class="col-xs-12 col-sm-12">
										<div class="form-group">
											<label>Please select the Banner size ( <span class="sizeColor">1158</span> x <span class="sizeColor">238</span>).</label><br />
											<label>Please make sure to enter the image "<span class="sizeColor">Name</span>".</label>
										</div>
										<div class="form-group">
											<img id="banner_slider_image_img" src="{{ asset('images/background/banner/dessert-banner.jpg') }}" width="200px;" />
										</div>
										<div class="form-group">
											<input id="banner_slider_image" name="banner_slider_image" type="file" class="file-loading banner_slider_image" accept="image/*">
										</div>
									</div>

									<div class="form-group">
										<div class="col-xs-6 col-sm-6">
											<label>Name</label>
											<input type="text" name="banner_slider_name" class="form-control" placeholder="Add Banner Slider Name">
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
				$('#banner_slider_image_img').attr('src', e.target.result);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}


	$('#banner_slider_image').change(function() {
		readURL(this);
	});

</script>
@endsection