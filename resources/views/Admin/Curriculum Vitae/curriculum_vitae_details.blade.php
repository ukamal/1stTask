@extends('layouts.admin')
@section('css_content')
<link rel="stylesheet" href="{{ URL::asset('css/Admin_css/dashboard.css') }}">
<link rel="stylesheet" href="{{ URL::asset('css/Admin_css/dataTables.bootstrap.css') }}">
<style>
	.my-header {
		padding: 1em;
		font-size: 25px;
		font-family: 'Calibri';
	}
</style>
@endsection

@section('body_content')

<div class="panel panel-default">
	<div class="panel-heading">
		<span class="my-header"><strong> Previous Job Experience </strong></span>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-xs-12 col-sm-12">
				<div class="panel">
					<div class="panel-body">
						<div class="box box-info">
							<div class="box-body">
								<table id="example1" class="table table-bordered table-striped table-responsive">
									<thead>
										<tr>
											<th>Company</th>
											<th>Job Title</th>
											<th>Years of Experience </th>
										</tr>
									</thead>
									<tbody>
										@if(isset($curriculum_vitae_job_experiences->curriculum_vitae_job_experiences))
											@foreach($curriculum_vitae_job_experiences->curriculum_vitae_job_experiences as $experience)
												<tr>
													<td>{{ $experience->company }}</td>
													<td>{{ $experience->job_title }}</td>
													<td>{{ $experience->years_of_exp }}</td>
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
		<div class="col-md-12" align="center">
			<a href="{{ route('admin.view-cv-job-list') }}" class="btn btn-default">
				<i class="fa fa-step-backward"></i> Back
			</a>
		</div>
	</div>
</div>

@endsection
@section('javascript_content')
@endsection