@extends('layouts.website')
@section('css_content')
<style>
	.myLabel {
		color: red;
	}
	
	.header-body{
		color: #f15f2a;
	}
	
	.description{
		margin-left: 12px;
	}
	.my-header {
		padding: 1em;
		font-size: 25px;
		font-family: 'Calibri';
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
	@media(max-width: 480px) {
		.my-header {
			font-size: 19px;
		}
	}
</style>
@endsection

@section('body_content')
<div class="panel panel-default">
	<div class="panel-heading">
		<span class="my-header"><strong> Change Password </strong></span>
	</div>
	
	@if(session()->has('message'))
	<div class="panel-body">
		<div class="row">
			<div class="col-md-12 col-xs-12">
				<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
						&times;
					</button>
					<h4><i class="icon fa fa-check"></i> {{ session()->get('message') }} </h4>
				</div>
			</div>
		</div>
	</div>
	@else
	<br />
	@endif
	
	<div class="panel-body">
		<div class="col-md-6">
			<div class="form-group col-md-10 col-sm-offset-1">
				<form class="form-horizontal" method="POST" action="{{ url('change_user_password') }}">
					{{ csrf_field() }}
					<div class="form-group {{ $errors->has('current_password') ? 'has-error' : '' }}">
						<label>Current Password</label>&nbsp;<span class="myLabel">*</span>
						<div class="col-md-12">
							<input id="current_password" type="password" class="form-control" name="current_password">
		
							@if ($errors->has('current_password')) 
								<span class="help-block"><strong> {{ $errors->first('current_password') }} </strong></span> 
							@endif
							
							@if(session()->has('mismatch_message'))
								<span class="help-block">
									<strong>{{ session()->get('mismatch_message') }}</strong>
								</span> 
							@endif
							
						</div>
					</div>
		
					<div class="form-group {{ $errors->has('new_password') ? 'has-error' : '' }}">
						<label>New Password</label>&nbsp;<span class="myLabel">*</span>
						<div class="col-md-12">
							<input id="new_password" type="password" class="form-control" name="new_password">
		
							@if ($errors->has('new_password')) 
								<span class="help-block"><strong> {{ $errors->first('new_password') }}</strong></span>
							@endif
						</div>
					</div>
					
					<div class="form-group {{ $errors->has('confirm_password') ? 'has-error' : '' }}">
						<label>Confirm Password</label>&nbsp;<span class="myLabel">*</span>
						<div class="col-md-12">
							<input id="confirm_password" type="password" class="form-control" name="confirm_password">
		
							@if ($errors->has('confirm_password')) 
								<span class="help-block">{{ $errors->first('confirm_password') }}</span> 
							@endif
						</div>
					</div>
		
					<div class="form-group" style="text-align: center">
						<button type="submit" class="swin-btn"> Update </button>
						<!--a class="need-help link_text" href="{{ route('password.request') }}"> Forgot Your Password? </a-->
					</div>
				</form>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group col-md-12">
				<h3>Note :</h3>
				<p class="description">Make sure to use a difficult password to keep your account safe.</p>
			</div>
		</div>
	</div>
</div>

@endsection
@section('javascript_content')
<script>
	window.onload = function() {
		$('#personal_information').addClass('active');
	}; 
</script>
@endsection