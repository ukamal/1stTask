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

	.header-body {
		margin-left: -6px;
		color: #f15f2a;
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
				Register
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
		<br />
		<div class="form-group col-md-11 col-sm-offset-1">
			<form method="POST" action="{{ route('register') }}" role="form">
				{{ csrf_field() }}
				<div class="form-group col-xs-10 col-sm-4 col-md-12 col-lg-12">
					<h3 class="header-body">Please enter your Personal & Login Informations</h3>
				</div>
				<div class="clearfix"></div><br />
				
				<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }} col-xs-10 col-sm-4 col-md-5 col-lg-5">
					<label for="name">Name</label>&nbsp;<span class="myLabel">*</span>
					<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus />
					@if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
				</div>
				<div class="form-group col-md-1"></div>
				<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }} col-xs-10 col-sm-4 col-md-5 col-lg-5">
					<label for="email">Email</label>&nbsp;<span class="myLabel">*</span>
					<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
					@if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
				</div>
				<div class="clearfix"></div>
				
				<div class="form-group {{ $errors->has('password') ? ' has-error' : '' }} col-xs-10 col-sm-4 col-md-5 col-lg-5">
					<label for="password">Password</label>&nbsp;<span class="myLabel">*</span>
					<input id="password" type="password" class="form-control" name="password" required>
					@if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
				</div>
				<div class="form-group col-md-1"></div>
				<div class="form-group col-xs-10 col-sm-4 col-md-5 col-lg-5">
					<label for="password-confirm">Confirm Password</label>&nbsp;<span class="myLabel">*</span>
					<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
				</div>
				<div class="clearfix"></div><br />
				<div class="col-xs-10 col-sm-4 col-md-11 col-lg-11" style="text-align: center">
					<button type="submit" class="swin-btn">
						Submit
					</button>
				</div>
			</form>
		</div>
		<div class="clearfix"></div>
	</div>
</div>

@endsection
@section('javascript_content')
@endsection