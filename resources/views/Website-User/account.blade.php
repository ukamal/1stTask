@extends('layouts.website')
@section('css_content')
<style>
	.my-header {
		padding: 1em;
		font-size: 25px;
		font-family: 'Calibri';
	}
	
	@media(max-width: 480px){
		.my-header {
			font-size: 22px;
		}
	}
</style>
@endsection

@section('body_content')

<div class="panel panel-default">
	<div class="panel-heading">
		<span class="my-header"><strong> Account Control Panel </strong></span>
	</div>
	<div class="panel-body">

		<p>
			<strong class="box_header">Hello {{ Auth::user()->name }}</strong>
		</p>

		<p class="body_text">
			From your My Account Dashboard you have the ability to view a snapshot of your recent account activity and update your account information. Select a link below to view or edit information.
		</p>

		<div class="row">
			<div class="col-md-6">
				<div class="col-md-12 infoBox">
					<span class="box_header">Contact Information</span>
					<br />
					<span class="body_text"> {{ Auth::user()->name }} </span>
					<br />
					<span class="body_text"> {{ Auth::user()->email }} </span> &nbsp; - &nbsp; <strong><a class="emailLinks" href="{{ url('personal_information') }}">Change E-mail</a></strong>
					<br />
					<br />
					<strong><a class="emailLinks" href="{{ url('change_user_password_form') }}">Change Password</a></strong>
				</div>
			</div>
			<div class="col-md-6">
				<div class="col-md-12 infoBox">
					<span class="box_header">Delivery Address</span>
					<br />
					<p class="body_text">
						No Default Address available.
					</p>
					<strong><a class="emailLinks" href="{{ url('change_user_address_form') }}">Change Address</a></strong>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
@section('javascript_content')
<script>
	window.onload = function() {
		$('#account_control_panel').addClass('active');
		$('#account_icon').addClass('active');
	}; 
</script>
@endsection