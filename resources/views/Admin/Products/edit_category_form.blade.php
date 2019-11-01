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
		<span class="my-header"><strong> Update Category </strong></span>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-xs-12 col-sm-12">
				<div class="panel">
					<div class="panel-body">
						<div class="box box-info">
							<div class="box-body">
								<form class="form-horizontal" action="{{ url('admin/update_category') }}" method="POST" enctype="multipart/form-data" role="form">
									{!! csrf_field() !!}
									<input type="hidden" class="form-control" name="category_id" value="{{ isset($category_info->id)? $category_info->id : '' }}">
									<div class="col-xs-12 col-sm-12">
										@if($category_info->category_image!='')
										<div class="form-group">
											<img id="category_image_img" src="{{ URL::asset('images/Categories/'.$category_info->category_image) }}" width="200px;" />
										</div>
										@else
										<div class="form-group">
											<img id="category_image_img" src="{{ URL::asset('images/no-image-available.jpg') }}" width="200px;" />
										</div>
										@endif
										<div class="form-group">
											<input id="category_image" name="category_image" type="file" class="file-loading category_image" accept="image/*">
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
											<input type="text" name="category_name" class="form-control" value="{{ isset($category_info->category_name)? $category_info->category_name : '' }}">
										</div>

										<div class="col-xs-6 col-sm-6">
											<label>Slug</label>
											<input type="text" name="category_slug" class="form-control" value="{{ isset($category_info->category_slug)? $category_info->category_slug : '' }}">
										</div>
									</div>
									<div class="form-group">
										<div class="col-xs-6 col-sm-6">
											<label>Parent</label>
											<select class="form-control" name="parent_id">
												<option value="none">None</option>
												@foreach($categories_list as $list)
												<option {{ ($list->id==$category_info->parent_id)? "selected='selected'" : '' }} value="{{ $list->id }}">{{ $list->category_name }}</option>
												@endforeach
											</select>
										</div>
									</div>
									<br />
									<div class="form-group">
										<div class="col-xs-12 col-sm-12" align="center">
											<button type="submit" class="btn btn-default">
												Update
											</button>
											&nbsp; <a href="{{ url('admin/categories') }}" class="btn btn-default"> <i class="fa fa-step-backward"></i> Back </a>
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
				$('#category_image_img').attr('src', e.target.result);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}


	$('#category_image').change(function() {
		readURL(this);
	});

	window.onload = function() {
		$('#products').addClass('active');
		$('#all_products').addClass('active');
	};

</script>
@endsection