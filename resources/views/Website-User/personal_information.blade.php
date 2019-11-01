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
		<span class="my-header"><strong> Change Account informations </strong></span>
	</div>
	
	@if(session()->has('update_message'))
	<div class="panel-body">
		<div class="row">
			<div class="col-md-12 col-xs-12">
				<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
						&times;
					</button>
					<h4><i class="icon fa fa-check"></i> {{ session()->get('update_message') }} </h4>
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
				<form class="form-horizontal" method="POST" action="{{ url('change_account_informations') }}">
					{{ csrf_field() }}
					<div class="form-group{{ $errors->has('name') ? 'has-error' : '' }}">
						<label>Name</label>&nbsp;<span class="myLabel">*</span>
						<input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
						<div class="col-md-12">
							<input id="name" type="name" class="form-control" name="name" value="{{ Auth::user()->name }}" required>
		
							@if ($errors->has('name'))
							<span class="help-block"> <strong>{{ $errors->first('name') }}</strong> </span>
							@endif
						</div>
					</div>
		
					<div class="form-group{{ $errors->has('email') ? 'has-error' : '' }}">
						<label>Email</label>&nbsp;<span class="myLabel">*</span>
						<div class="col-md-12">
							<input id="email" type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" required>
		
							@if ($errors->has('email'))
							<span class="help-block"> <strong>{{ $errors->first('email') }}</strong> </span>
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
				<p class="description">While you log in, this email address will be used as your username.</p>
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