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
		color: #f15f2a;
		margin-left: -26px;
	}

	.description {
		margin-left: 12px;
	}
	
	.myTh{
        text-align : center;
    }
    .mtTd{
        text-align : center;
    }
    
    .btn-danger {
	    color: #f15f2a;
	    background-color: #fff;
	    border-color: #f15f2a;
	}
	.btn-danger:hover {
	    color: #f15f2a;
	    background-color: #fff;
	    border-color: #f15f2a;
	    box-shadow: 0 0 2px rgba(0, 0, 0, 0.5);
	}
	
	.btn-primary {
	    color: #f15f2a;
	    background-color: #fff;
	    border-color: #f15f2a;
	}
	.btn-primary:hover {
	    color: #f15f2a;
	    background-color: #fff;
	    border-color: #f15f2a;
	    box-shadow: 0 0 2px rgba(0, 0, 0, 0.5);
	}
	.btn{
		border-radius: 50px;
	}

	@media (max-width: 480px) {
		.my-header {
			font-size: 22px;
		}
		.header-body {
			margin-left: 0px;
			font-size: 20px;
		}
	}
</style>
@endsection

@section('body_content_top_banner')

<div data-bottom-top="background-position: 50% 50px;" data-center="background-position: 50% 0px;" data-top-bottom="background-position: 50% -50px;" class="page-title page-product">
	<div class="container">
		<div class="title-wrapper">
			<div data-top="transform: translateY(0px);opacity:1;" data--20-top="transform: translateY(-5px);" data--50-top="transform: translateY(-15px);opacity:0.8;" data--120-top="transform: translateY(-30px);opacity:0;" data-anchor-target=".page-title" class="title">
				Career
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
		<span class="my-header"><strong> Candidate Form </strong></span>
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

		<br />
		<div class="form-group col-md-11 col-sm-offset-1">
			<form method="POST" action="{{ url('submit_cv') }}" role="form" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="form-group col-xs-10 col-sm-4 col-md-12 col-lg-12">
					<h3 class="header-body">General Informations </h3>
				</div>
				<div class="clearfix"></div>
				<br />

				<div class="form-group col-xs-10 col-sm-4 col-md-5 col-lg-5">
					<label>Name</label>&nbsp;<span class="myLabel">*</span>
					<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required />
					@if ($errors->has('name'))
					<span class="help-block"> <strong>{{ $errors->first('name') }}</strong> </span>
					@endif
				</div>
				<div class="form-group col-md-1"></div>
				<div class="form-group col-xs-10 col-sm-4 col-md-5 col-lg-5">
					<label>Email</label>&nbsp;<span class="myLabel">*</span>
					<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
					@if ($errors->has('email'))
					<span class="help-block"> <strong>{{ $errors->first('email') }}</strong> </span>
					@endif
				</div>
				<div class="clearfix"></div>

				<div class="form-group col-xs-10 col-sm-4 col-md-5 col-lg-5">
					<label>Age</label>&nbsp;<span class="myLabel">*</span>
					<input id="age" type="text" class="form-control" name="age" required>
					@if ($errors->has('age'))
					<span class="help-block"> <strong>{{ $errors->first('age') }}</strong> </span>
					@endif
				</div>
				<div class="form-group col-md-1"></div>
				<div class="form-group col-xs-10 col-sm-4 col-md-5 col-lg-5">
					<label>Mobile Number</label>&nbsp;<span class="myLabel">*</span>
					<input id="mobile_number" type="text" class="form-control" name="mobile_number" required>
					@if ($errors->has('mobile_number'))
					<span class="help-block"> <strong>{{ $errors->first('mobile_number') }}</strong> </span>
					@endif
				</div>
				<div class="clearfix"></div>
				<div class="form-group col-xs-10 col-sm-4 col-md-5 col-lg-5">
					<label>Gender</label>&nbsp;<span class="myLabel">*</span>
					<select class="form-control" name="gender">
						<option value="male">Male</option>
						<option value="female">Female</option>
					</select>
				</div>
				<div class="form-group col-md-1"></div>
				<div class="form-group col-xs-10 col-sm-4 col-md-5 col-lg-5">
					<label>Address</label>&nbsp;<span class="myLabel">*</span>
					<textarea class="form-control" name="address"></textarea>
					@if ($errors->has('address'))
					<span class="help-block"> <strong>{{ $errors->first('address') }}</strong> </span>
					@endif
				</div>
				<div class="clearfix"></div>
				<div class="form-group col-xs-10 col-sm-4 col-md-5 col-lg-5">
					<label>Upload Resume</label>
					<input type="file" id="resume" placeholder="Resume" name="resume" />
				</div>
				<br />
				<div class="form-group col-xs-10 col-sm-4 col-md-12 col-lg-12">
					<h3 class="header-body">Job Experience </h3>
				</div>
				<div class="clearfix"></div>
				<br />
				<div class="form-group col-xs-10 col-sm-4 col-md-11 col-lg-11">
					<table class="table table-bordered order-list" id="myTable">
						<thead>
							<tr>
								<td class="myTh" style="width: 70px">Serial #</td>
								<td class="myTh">Company</td>
								<td class="myTh">Job Title</td>
								<td class="myTh">Years of Experience</td>
								<td class="myTh">Actions</td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="mtTd">1</td>
								<td><input type="text" name="company[]" class="form-control" /></td>
								<td><input type="text" name="job_title[]" class="form-control" /></td>
								<td><input type="text" name="years_of_exp[]" class="form-control" /></td>
								<td class="mtTd"><a class="btn btn-danger deleteRow"><i class="fa fa-minus"></i></a></td>
							</tr>
						</tbody>
						<tfoot>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td class="mtTd"><a class="btn btn-primary" id="addrow"><i class="fa fa-plus"></i></a></td>
							</tr>
						</tfoot>
					</table>
				</div>
				<div class="clearfix"></div>
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
<script>
	$(document).ready(function() {
        
        var counter = 0;
        
        var myCount = 2;

        $("#addrow").on("click", function () {
        	
            counter = $('#myTable tr').length - 2;
            
            var newRow = $("<tr>");
            var cols = "";
            
            cols += '<td class="mtTd">'+myCount+++'</td>';
            cols += '<td><input type="text" name="company[]" class="form-control" /></td>';
    		cols += '<td><input type="text" name="job_title[]" class="form-control" /></td>';
    		cols += '<td><input type="text" name="years_of_exp[]" class="form-control" /></td>';
            cols += '<td class="mtTd"><a class="btn btn-danger ibtnDel"><i class="fa fa-minus"></i></a></td>';
            
            newRow.append(cols);
            
            $("table.order-list").append(newRow);
            counter++;
        });
    
        $("table.order-list").on("click", ".ibtnDel", function (event) {
            $(this).closest("tr").remove();
            
            counter -= 1;
            
        });
        
    });
</script>
@endsection