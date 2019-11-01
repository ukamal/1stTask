@extends('layouts.admin')
@section('css_content')
<link rel="stylesheet" href="{{ URL::asset('css/Admin_css/admin-body.css') }}">
<link rel="stylesheet" href="{{ URL::asset('css/Admin_css/dropzone.css') }}">
<style>
	.product_heading {
		font-family: 'Century';
		color: #000000;
		padding: 1em;
	}

	.my-header {
		padding: 1em;
		font-size: 25px;
		font-family: 'Calibri';
		margin-left: -25px;
	}

	.product {
		color: red;
	}
	
	.product-line{
		font-size: 18px;
	}
	
	.asterik {
		color: red;
	}
</style>
@endsection

@section('body_content')
<div class="panel panel-default">
	<div class="panel-heading">
		<span class="my-header"><strong> Add Product Gallery Images </strong></span>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-xs-12 col-sm-12">
				<div class="panel">
					<div class="product_heading">
						<span class="product-line"> Add <span class="product"> {{ $products->product_name }} </span> Thumbnails </span>
						<br />
					</div>
					<div class="panel-body">
						<div class="box box-info">
							<div class="box-body">
								<form action="{{ url('admin/upload_product_gallery_images') }}" method="post" class="form-horizontal dropzone dz-clickable" enctype="multipart/form-data" role="form">
									{!! csrf_field() !!}
									<input type="hidden" name="product_id" value="{{ $product_id }}" />
									<div class="dz-message">
										<h4>Drag Photos to Upload</h4>
										<span>Or click to browse</span>
									</div>
									<div class="fallback">
										<input name="file" type="file" multiple />
									</div>
								</form>
								<br />
								<div class="form-group">
									<div class="col-xs-12 col-sm-12" align="center">
										<a href="{{ url('admin/all_products') }}" class="btn btn-default"> <i class="fa fa-step-backward"></i> Go to Product List </a>&nbsp;

										<a href="{{ url('admin/add_new_product_form') }}" class="btn btn-default"> <i class="fa fa-plus-square"></i> Add Another Product </a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</section>

@endsection
@section('javascript_content')
<script src="{{ URL::asset('js/Admin_js/dropzone.js') }}"></script>
<script type="text/javascript">
	window.onload = function() {
		$('#products').addClass('active');
		$('#all_products').addClass('active');
	}; 
</script>
@endsection