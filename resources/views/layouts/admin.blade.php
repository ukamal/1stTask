<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<title>Salsa Catering Service</title>

		<!-- Bootstrap CSS-->
		<link href="{{ URL::asset('css/Admin_css/bootstrap.min.css') }}" rel="stylesheet">
		<!-- Font Awesome-->
		<link rel="stylesheet" href="{{ URL::asset('css/font-awesome.min.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('css/Admin_css/header.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('css/Admin_css/footer.css') }}">
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
		<!-- WARNING: Respond.js doesn't work if you view the page via file://-->
		<!-- IE 9-->
		<!-- Vendors-->
		<!-- Font-icon-->
		<!--link rel="stylesheet" href="{{ URL::asset('css/Website_css/style.css') }}"-->
		<!-- Style-->
		<!--link rel="stylesheet" type="text/css" href="{{ URL::asset('css/Admin_css/layout.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/Admin_css/elements.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/Website_css/extra.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/Website_css/widget.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/Admin_css/responsive.css') }}"-->
		<!-- <link rel="stylesheet" type="text/css" href="assets/css/color.css">-->
		<link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700,700i" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Calibri" rel="stylesheet">
		<!--link rel="stylesheet" type="text/css" href="{{ URL::asset('css/Admin_css/website-sidebar.css') }}"-->
		@yield('css_content')
	</head>
	<body>
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#"><img src="{{ URL::asset('images/logo.png') }}" alt="Salsa Catering"> </a>
				</div>
				<div id="navbar1" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li class="active">
							<a href="{{ url('admin/') }}">Dashboard</a>
						</li>
						
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> Banner Sliders  <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li>
									<a href="{{ url('admin/add_new_banner_slider_form') }}">Add New</a>
								</li>
								<li>
									<a href="{{ url('admin/banner_sliders_list') }}">View List</a>
								</li>
							</ul>
						</li>
						
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> Category <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li>
									<a href="{{ url('admin/add_new_category_form') }}">Add New</a>
								</li>
								<li>
									<a href="{{ url('admin/category_list') }}">View List</a>
								</li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> Products <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li>
									<a href="{{ url('admin/all_products') }}">All Products</a>
								</li>
								<li>
									<a href="{{ url('admin/add_new_product_form') }}">Add New</a>
								</li>
								<!--li class="divider"></li>
								<li>
									<a href="{{ url('admin/tags') }}">Tags</a>
								</li-->
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> Programs <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li>
									<a href="{{ url('admin/add_new_program') }}">Add New</a>
								</li>
								<li>
									<a href="{{ url('admin/program_list') }}">View List</a>
								</li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> Packages <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li>
									<a href="{{ url('admin/add_new_package') }}">Add New</a>
								</li>
								<li>
									<a href="{{ url('admin/package_list') }}">View List</a>
								</li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> Gallery <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li>
									<a href="{{ url('admin/upload_image_form') }}">Upload Image</a>
								</li>
								<li>
									<a href="{{ url('admin/upload_video_form') }}">Upload Video</a>
								</li>
								<li>
									<a href="{{ url('admin/view_gallery_list') }}">View List</a>
								</li>
							</ul>
						</li>
						
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
								Clients <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li>
									<a href="{{ url('admin/clientList') }}">All Clients</a>
								</li>
								<li>
									<a href="{{ url('admin/addclient') }}">Add New</a>
								</li>
							</ul>
						</li>
						
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> Customers <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li>
									<a href="{{ url('admin/view_registered_clients_list') }}">Registered</a>
								</li>
								<li>
									<a href="{{ url('admin/view_unregistered_clients_list') }}">Un-registered</a>
								</li>
							</ul>
						</li>
						
						<li>
							<a href="{{ url('admin/cv_job_list') }}">Candidate's Resume</a>
						</li>
						
						
						
					</ul>
					<ul class="nav navbar-nav navbar-right">
						@if (Auth::guest())
							<li>
								<a href="{{ url('/login') }}">Sign in</a>
							</li>
						@else
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Hello,  {{ Auth::user()->name }} <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<!--li>
										<a href="{{ url('user_account') }}"><i class="fa fa-user" aria-hidden="true"></i> My Account</a>
									</li>
									<li>
										<a href="#"><i class="fa fa-key" aria-hidden="true"></i> Change Password</a>
									</li>
									<li class="divider"></li-->
									<li>
										<a href="{{ url('admin/logout') }}"><i class="fa fa-sign-out" aria-hidden="true"></i>  Sign out</a>
									</li>
								</ul>
							</li>
						@endif
					</ul>
				</div>
				<!--/.nav-collapse -->
			</div>
			<!--/.container-fluid -->
		</nav>

		<div id="pagewrap" class="pagewrap">
			<div id="html-content" class="wrapper-content">

				<div class="page-container">
					<div class="row">
						<div class="container">

							@yield('body_content')

						</div>
					</div>
				</div>

				<footer>
					<div class="footer" id="footer">
						<div class="container">
							<div class="row">
								<div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
									<h3> Lorem Ipsum </h3>
									<ul>
										<li>
											<a href="#"> Lorem Ipsum </a>
										</li>
										<li>
											<a href="#"> Lorem Ipsum </a>
										</li>
										<li>
											<a href="#"> Lorem Ipsum </a>
										</li>
										<li>
											<a href="#"> Lorem Ipsum </a>
										</li>
									</ul>
								</div>
								<div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
									<h3> Lorem Ipsum </h3>
									<ul>
										<li>
											<a href="#"> Lorem Ipsum </a>
										</li>
										<li>
											<a href="#"> Lorem Ipsum </a>
										</li>
										<li>
											<a href="#"> Lorem Ipsum </a>
										</li>
										<li>
											<a href="#"> Lorem Ipsum </a>
										</li>
									</ul>
								</div>
								<div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
									<h3> Lorem Ipsum </h3>
									<ul>
										<li>
											<a href="#"> Lorem Ipsum </a>
										</li>
										<li>
											<a href="#"> Lorem Ipsum </a>
										</li>
										<li>
											<a href="#"> Lorem Ipsum </a>
										</li>
										<li>
											<a href="#"> Lorem Ipsum </a>
										</li>
									</ul>
								</div>
								<div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
									<h3> Lorem Ipsum </h3>
									<ul>
										<li>
											<a href="#"> Lorem Ipsum </a>
										</li>
										<li>
											<a href="#"> Lorem Ipsum </a>
										</li>
										<li>
											<a href="#"> Lorem Ipsum </a>
										</li>
										<li>
											<a href="#"> Lorem Ipsum </a>
										</li>
									</ul>
								</div>
								<div class="col-lg-3  col-md-3 col-sm-6 col-xs-12 ">
									<h3> Lorem Ipsum </h3>
									<ul>
										<li>
											<div class="input-append newsletter-box text-center">
												<input type="text" class="full text-center" placeholder="Email ">
												<button class="btn  bg-gray" type="button">
													Lorem ipsum <i class="fa fa-long-arrow-right"> </i>
												</button>
											</div>
										</li>
									</ul>
									<ul class="social">
										<li>
											<a href="#"> <i class=" fa fa-facebook">   </i> </a>
										</li>
										<li>
											<a href="#"> <i class="fa fa-twitter">   </i> </a>
										</li>
										<li>
											<a href="#"> <i class="fa fa-google-plus">   </i> </a>
										</li>
										<li>
											<a href="#"> <i class="fa fa-pinterest">   </i> </a>
										</li>
										<li>
											<a href="#"> <i class="fa fa-youtube">   </i> </a>
										</li>
									</ul>
								</div>
							</div>
							<!--/.row-->
						</div>
						<!--/.container-->
					</div>
					<!--/.footer-->

					<div class="footer-bottom">
						<div class="container">
							<p class="pull-left">
								Copyright © 2017 <a href="http://www.agilecrafts.com"> Agile Crafts</a>. All right reserved.
							</p>
							<div class="pull-right">
								<ul class="nav nav-pills payments">
									<li>
										<i class="fa fa-cc-visa"></i>
									</li>
									<li>
										<i class="fa fa-cc-mastercard"></i>
									</li>
									<li>
										<i class="fa fa-cc-amex"></i>
									</li>
									<li>
										<i class="fa fa-cc-paypal"></i>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<!--/.footer-bottom-->
				</footer>
			</div>

		</div>
		<!-- jQuery-->
		<script src="{{ URL::asset('js/Admin_js/jquery-1.11.3.min.js') }}"></script>
		<!-- Bootstrap JavaScript-->
		<script src="{{ URL::asset('js/Admin_js/bootstrap.min.js') }}"></script>
		<!-- Vendors-->
		<!--script src="{{ URL::asset('js/Admin_js/website-sidebar.js') }}"></script-->
		<!-- Own script-->
		<!--script src="{{ URL::asset('js/Admin_js/layout.js') }}"></script>
		<script src="{{ URL::asset('js/Website_js/widget.js') }}"></script-->
		@yield('javascript_content')
	</body>
</html>
