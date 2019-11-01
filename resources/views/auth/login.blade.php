@extends('layouts.website')
@section('css_content')
<style>
	.my-header {
		padding: 1em;
		font-size: 25px;
		font-family: 'Calibri';
	}
	
	.myLabel {
		color: red;
	}
	
	.header-body{
		color: #f15f2a;
	}
	
	.description{
		margin-left: 12px;
	}
	
	.swin-btn:hover {
		border-bottom: solid 1px #f15f2a;
		box-shadow: 0 2px 3px #a8a8a8;
		transform: scale(1.04);
		-webkit-transform: scale(1.04);
		-moz-transform: scale(1.04);
		-o-transform: scale(1.04);
		-ms-transform: scale(1.04);
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
				Sign in
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
		<span class="my-header"><strong> Enter your informations </strong></span>
	</div>
	<div class="panel-body">
		<div class="col-md-6">
			<div class="form-group col-md-12">
				<h3 class="header-body">Registered Customers</h3>
				<p class="description">If you have an account with us, please log in.</p>
			</div>
			<div class="form-group col-md-10 col-sm-offset-1">
				<form class="form-horizontal" method="POST" action="{{ route('login') }}">
					{{ csrf_field() }}
		
					<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
						<label>Email Address</label>&nbsp;<span class="myLabel">*</span>
						<div class="col-md-12">
							<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
		
							@if ($errors->has('email'))
							<span class="help-block"> <strong>{{ $errors->first('email') }}</strong> </span>
							@endif
						</div>
					</div>
		
					<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
						<label>Password</label>&nbsp;<span class="myLabel">*</span>
						<div class="col-md-12">
							<input id="password" type="password" class="form-control" name="password" required>
		
							@if ($errors->has('password'))
							<span class="help-block"> <strong>{{ $errors->first('password') }}</strong> </span>
							@endif
						</div>
					</div>
		
					<!--div class="form-group">
						<div class="col-md-6">
							<div class="checkbox">
								<label>
									<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
									Remember Me </label>
							</div>
						</div>
					</div-->
		
					<div class="form-group" style="text-align: center">
						<button type="submit" class="swin-btn"> Sign In</button>
						<!--a class="need-help link_text" href="{{ route('password.request') }}"> Forgot Your Password? </a-->
					</div>
				</form>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group col-md-12">
				<h3>New Customers</h3>
				<p class="description">By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
			</div>
			<div class="form-group col-md-10 col-sm-offset-1">
				<div class="form-group">
					<a href="{{ url('register') }}" class="swin-btn"> Register </a>
					<!--a class="need-help link_text" href="{{ route('password.request') }}"> Forgot Your Password? </a-->
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
@section('javascript_content')
@endsection