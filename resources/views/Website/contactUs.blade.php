@extends('layouts.website')
@section('css_content')
<style>
	.my-header {
		padding: 1em;
		font-size: 25px;
		font-family: 'Calibri';
	}

	@media (max-width: 480px) {
		.my-header {
			font-size: 22px;
		}
	}

</style>
@endsection
@section('body_content_top_banner')
<div data-bottom-top="background-position: 50% 50px;" data-center="background-position: 50% 0px;" data-top-bottom="background-position: 50% -50px;" class="page-title page-product">
	<div class="container">
		<div class="title-wrapper">
			<div data-top="transform: translateY(0px);opacity:1;" data--20-top="transform: translateY(-5px);" data--50-top="transform: translateY(-15px);opacity:0.8;" data--120-top="transform: translateY(-30px);opacity:0;" data-anchor-target=".page-title" class="title">
				Contact Us
			</div>
			<div data-top="opacity:1;" data--120-top="opacity:0;" data-anchor-target=".page-title" class="divider">
				<span class="line-before"></span><span class="dot"></span><span class="line-after"></span>
			</div>
			<div data-top="transform: translateY(0px);opacity:1;" data--20-top="transform: translateY(5px);" data--50-top="transform: translateY(15px);opacity:0.8;" data--120-top="transform: translateY(30px);opacity:0;" data-anchor-target=".page-title" class="subtitle">
				Salsa Catering Service
			</div>
		</div>
	</div>
</div>

@endsection

@section('body_content')

<div class="panel panel-default">
	<div class="panel-heading">
		<span class="my-header"><strong> Get in touch </strong></span>
	</div>
	<div class="panel-body">
		@if(session()->has('message'))
		<div class="col-md-12 col-xs-12">
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
					&times;
				</button>
				<h4><i class="icon fa fa-check"></i> {{ session()->get('message') }} </h4>
			</div>
		</div>
		<br />
		@endif

		@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif

		<div class="reservation-form style-02">
			<div class="swin-sc swin-sc-contact-form light mtl style-full">
				<form method="POST" action="{{ url('submit_query') }}">
					{{ csrf_field() }}
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-user"></i>
							</div>
							<input type="text" name="name" placeholder="Username" class="form-control" required>
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-envelope"></i>
							</div>
							<input type="text" name="email" placeholder="Email" class="form-control" required>
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-addon">
								<div class="fa fa-phone"></div>
							</div>
							<input type="text" name="phone" placeholder="Phone" class="form-control" required>
						</div>
					</div>
					<div class="form-group">
						<textarea placeholder="Message" name="message" class="form-control" required></textarea>
					</div>
					<div class="form-group">
						<div class="swin-btn-wrap">
							<button type="submit" class="swin-btn center form-submit">Send</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!--div class="panel panel-default">
	<div class="panel-heading">
		<span class="my-header"><strong> Our Location </strong></span>
	</div>
	<div class="panel-body">
		<div id="map"></div>
	</div>
</div-->

@endsection
@section('javascript_content')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCdXpLSJ3Ibdu-Phs9QOvpqb9d1DtPf7wQ"></script>
<script src="{{ URL::asset('js/Website_js/map.js') }}"></script>
@endsection