@extends('layouts.admin_login')

@section('body_content')
<form class="form-horizontal form-signin" method="POST" action="{{ route('admin.login.submit') }}">
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

			<!--a class="need-help link_text" href="#"> Forgot Your Password? </a-->
		</div>
	</div>
</form>
@endsection