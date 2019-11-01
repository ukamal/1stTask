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
		<span class="my-header"><strong> Update Tag </strong></span>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-xs-12 col-sm-12">
				<div class="panel">
					<div class="panel-body">
						<div class="box box-info">
							<div class="box-body">
								<form class="form-horizontal" action="{{ url('admin/update_tag') }}" method="POST" enctype="multipart/form-data" role="form">
									{!! csrf_field() !!}
									<input type="hidden" class="form-control" name="tag_id" value="{{ isset($tag_info->id)? $tag_info->id : '' }}">
									<div class="form-group">
										<div class="col-xs-12 col-sm-12">
											<span class="narration">The “Slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens. </span>
										</div>
									</div>

									<div class="form-group">
										<div class="col-xs-6 col-sm-6">
											<label>Name</label>
											<input type="text" name="tag_name" class="form-control" value="{{ isset($tag_info->tag_name)? $tag_info->tag_name : '' }}">
										</div>

										<div class="col-xs-6 col-sm-6">
											<label>Slug</label>
											<input type="text" name="tag_slug" class="form-control" value="{{ isset($tag_info->tag_slug)? $tag_info->tag_slug : '' }}">
										</div>
									</div>
									<br />
									<div class="form-group">
										<div class="col-xs-12 col-sm-12" align="center">
											<button type="submit" class="btn btn-default">
												Update
											</button>
											&nbsp; <a href="{{ url('admin/tags') }}" class="btn btn-default"> <i class="fa fa-step-backward"></i> Back </a>
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
	window.onload = function() {
		$('#products').addClass('active');
		$('#all_products').addClass('active');
	};

</script>
@endsection