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

	.narration {
		font-style: italic;
	}
</style>
@endsection

@section('body_content')
<div class="panel panel-default">
	<div class="panel-heading">
		<span class="my-header"><strong> Update Banner Slider </strong></span>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-xs-12 col-sm-12">
				<div class="panel">
					<div class="panel-body">
						<div class="box box-info">
							<div class="box-body">
								<form class="form-horizontal" action="{{ url('admin/update_banner_slider') }}" method="POST" enctype="multipart/form-data" role="form">
									{!! csrf_field() !!}
									<input type="hidden" class="form-control" name="banner_slider_id" value="{{ isset($banner_slider_info->id)? $banner_slider_info->id : '' }}">
									<div class="col-xs-12 col-sm-12">
										@if($banner_slider_info->banner_slider_image!='')
										<div class="form-group">
											<img id="banner_slider_image_img" src="{{ URL::asset('images/Banner Sliders/'.$banner_slider_info->banner_slider_image) }}" width="200px;" />
										</div>
										@else
										<div class="form-group">
											<img id="banner_slider_image_img" src="{{ URL::asset('images/no-image-available.jpg') }}" width="200px;" />
										</div>
										@endif
										<div class="form-group">
											<input id="banner_slider_image" name="banner_slider_image" type="file" class="file-loading banner_slider_image" accept="image/*">
										</div>
									</div>

									<div class="form-group">

										<div class="col-xs-6 col-sm-6">
											<label>Name</label>
											<input type="text" name="banner_slider_name" class="form-control" value="{{ isset($banner_slider_info->banner_slider_name)? $banner_slider_info->banner_slider_name : '' }}">
										</div>

									</div>
									<br />
									<div class="form-group">
										<div class="col-xs-12 col-sm-12" align="center">
											<button type="submit" class="btn btn-default">
												Update
											</button>
											&nbsp; <a href="{{ url('admin/banner_sliders_list') }}" class="btn btn-default"> <i class="fa fa-step-backward"></i> Back </a>
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