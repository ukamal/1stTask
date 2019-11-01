@extends('layouts.website')
@section('css_content')
<style>
	.tableTitle {
		height: 60px;
		padding-top: 0px;
		padding-left: 0px;
		color: #000000;
		font-size: 30px;
		font-weight: 400;
	}

	.my-header {
		padding: 1em;
		font-size: 25px;
		font-family: 'Calibri';
	}

	@media (max-width: 480px) {
		.tableTitle {
			padding-top: 10px;
			padding-left: 0px;
		}
	}
</style>
@endsection

@section('body_content_top_banner')

<div data-bottom-top="background-position: 50% 50px;" data-center="background-position: 50% 0px;" data-top-bottom="background-position: 50% -50px;" class="page-title page-about-us">
	<div class="container">
		<div class="title-wrapper">
			<div data-top="transform: translateY(0px);opacity:1;" data--20-top="transform: translateY(-5px);" data--50-top="transform: translateY(-15px);opacity:0.8;" data--120-top="transform: translateY(-30px);opacity:0;" data-anchor-target=".page-title" class="title">
				Sign in to your Account
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
		<span class="my-header"><strong> Introduction </strong></span>
	</div>
	<div class="panel-body">
		<form class="form-horizontal form-signin" method="POST" action="{{ route('login') }}">
			{{ csrf_field() }}

			<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
				<div class="col-md-12">
					<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>

					@if ($errors->has('email'))
					<span class="help-block"> <strong>{{ $errors->first('email') }}</strong> </span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

				<div class="col-md-12">
					<input id="password" type="password" class="form-control" name="password" placeholder="Password" required>

					@if ($errors->has('password'))
					<span class="help-block"> <strong>{{ $errors->first('password') }}</strong> </span>
					@endif
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-6">
					<div class="checkbox">
						<label>
							<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
							Remember Me </label>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-12">
					<button type="submit" class="btn btn-lg btn-login btn-block">
						Sign In
					</button>

					<a class="need-help link_text" href="{{ route('password.request') }}"> Forgot Your Password? </a>
				</div>
			</div>
		</form>

	</div>
</div>

@endsection
@section('javascript_content')
@endsection