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
		<link href="{{ URL::asset('css/Website_css/bootstrap.min.css') }}" rel="stylesheet">
		<!-- Font Awesome-->
		<link rel="stylesheet" href="{{ URL::asset('css/font-awesome.min.css') }}">
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
		<!-- WARNING: Respond.js doesn't work if you view the page via file://-->
		<!-- IE 9-->
		<!-- Vendors-->
		<link rel="stylesheet" href="{{ URL::asset('css/Website_css/flexslider.min.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('css/Website_css/swipebox.min.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('css/Website_css/slick.min.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('css/Website_css/slick-theme.min.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('css/Website_css/animate.min.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('css/Website_css/bootstrap-datepicker.min.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('css/Website_css/component.min.css') }}">
		<!-- Font-icon-->
		<link rel="stylesheet" href="{{ URL::asset('css/Website_css/style.css') }}">
		<!-- Style-->
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/Website_css/layout.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/Website_css/elements.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/Website_css/extra.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/Website_css/widget.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/Website_css/responsive.css') }}">
		<!-- <link rel="stylesheet" type="text/css" href="assets/css/color.css">-->
		<link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700,700i" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Calibri" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/Website_css/website-sidebar.css') }}">
		@yield('css_content')
		<!-- Script Loading Page-->
		<script src="{{ URL::asset('js/Website_js/html5shiv.js') }}"></script>
		<script src="{{ URL::asset('js/Website_js/respond.min.js') }}"></script>
		<script src="{{ URL::asset('js/Website_js/modernizr.custom.js') }}"></script>
	</head>
	<body>
		<div id="pagewrap" class="pagewrap">
			<div id="html-content" class="wrapper-content">
				<header>
					<div class="header-top top-layout-02">
						<div class="container">
							<div class="topbar-left">
								<div class="topbar-content">
									<div class="item">
										<div class="wg-contact">
											<!--i class="fa fa-map-marker"></i><span> Sector-1, Uttara, Dhaka</span-->
										</div>
									</div>
									<div class="item">
										<div class="wg-contact">
											<i class="fa fa-phone"></i><span>01701879637</span>
										</div>
									</div>
								</div>
							</div>
							<div class="topbar-right">
								<div class="topbar-content">
									<div class="item">
										<ul class="socials-nb list-inline wg-social">
											<li>
												<a href="javascript:void(0)"><i class="fa fa-facebook"></i></a>
											</li>
											<!--li>
											<a href="javascript:void(0)"><i class="fa fa-twitter"></i></a>
											</li>
											<li>
											<a href="javascript:void(0)"><i class="fa fa-pinterest"></i></a>
											</li>
											<li>
											<a href="javascript:void(0)"><i class="fa fa-google-plus"></i></a>
											</li-->
										</ul>
									</div>
									<div class="item">
										<div class="wg-social">
											@if (Auth::guest())
											<i class="fa fa-user"></i><a href="{{ url('/login') }}">My Account</a>
											@else
											<i class="fa fa-user"></i><a id="menu1" data-toggle="dropdown" href="javascript:void(0)"> Hello, {{ Auth::user()->name }} <span class="caret"></span></a>
											<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
												<li role="presentation">
													<a role="menuitem" tabindex="-1" href="{{ url('user_account') }}">My Account</a>
												</li>
												<li role="presentation">
													<a role="menuitem" tabindex="-1" href="#">My Orders</a>
												</li>
												<li role="presentation">
													<a role="menuitem" tabindex="-1" href="#">My Saved Items</a>
												</li>
												<li role="presentation" class="divider"></li>
												<li role="presentation">
													<a role="menuitem" tabindex="-1" href="{{ url('/users/logout') }}"><i class="fa fa-power-off" aria-hidden="true"></i> logout</a>
												</li>
											</ul>
											@endif
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="header-main">
						<div class="container">
							<div class="open-offcanvas">
								&#9776;
							</div>
							<!--div class="utility-nav">
								<div class="dropdown">
									<a href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="search-bar dropdown-toggle"><i class="fa fa-search"></i></a>
									<div class="dropdown-menu">
										<div class="search-form">
											<form action="#">
												<div class="input-group">
													<input type="text" placeholder="Search" class="form-control">
													<div class="input-group-addon">
														<i class="fa fa-search"></i>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div-->
							<div class="header-logo">
								<!--a href="index-2.html" class="logo logo-static"><img src="{{ URL::asset('images/logo.png') }}" style="margin-top: 55px;" alt="salsa" class="logo-img"></a--><a href="index-2.html" class="logo logo-fixed"><img src="{{ URL::asset('images/logo.png') }}" style="width: 55px;height: 55px;margin-top: -50px;" alt="salsa" class="logo-img"></a>
							</div>
							<nav id="main-nav-offcanvas" class="main-nav-wrapper">
								<div class="close-offcanvas-wrapper">
									<span class="close-offcanvas">x</span>
								</div>
								<div class="main-nav">
									<ul id="main-nav" class="nav nav-pills">
										<li>
											<a href="{{ url('/') }}">Home</a>
										</li>
										<li>
											<a href="{{ url('about_us') }}">About Us</a>
										</li>
										<li>
											<a href="reservation.html">Food Menu</a>
										</li>
										<li>
											<a href="reservation.html">Our Kitchen</a>
										</li>
										<li>
											<a href="{{ url('gallery') }}">Gallery</a>
										</li>
										<li>
											<a href="{{ url('contact_us') }}">Contact</a>
										</li>
									</ul>
								</div>
							</nav>
						</div>
					</div>
				</header>

				<div class="page-container">

					<section class="padding-top-20 padding-bottom-100">
						<div class="row">
							<div class="container">
								<div class="col-sm-4 col-md-3 sidebar">

									<div class="well col-md-12 col-sm-12">
										<div class="row">
											<div class="panel-header">
												<span class="programs-header-text"><strong> My Account </strong></span>
												<span class="bar-icon"><i class="fa fa-bars"></i></span>
											</div>
										</div>

										<div class="account-content-panel" id="col-navigation">

											<div class="row user-row">
												<div class="col-md-12 col-sm-12">
													 <a class="accountLinks" href="{{ url('user_account') }}" id="account_control_panel"> Account Control Panel </a> <span> &nbsp; </span> <!--i class="fa fa-arrow-right icons" id="account_icon" aria-hidden="true"></i-->
												</div>
											</div>
											
											<div class="row user-row">
												<div class="col-md-12 col-sm-12">
													<a class="accountLinks" href="{{ url('personal_information') }}" id="personal_information"> Personal Information </a> <span> &nbsp; </span> <!--i class="fa fa-arrow-right icons" aria-hidden="true"></i-->
												</div>
											</div>
											
											<div class="row user-row">
												<div class="col-md-12 col-sm-12">
													<a class="accountLinks" href="{{ url('address_book') }}" id="address_book"> Address Book </a> <span> &nbsp; </span>
												</div>
											</div>
											
											<div class="row user-row">
												<div class="col-md-12 col-sm-12">
													<a class="accountLinks" href="{{ url('my_order') }}" id="my_order"> My Orders </a> <span> &nbsp; </span>
												</div>
											</div>

										</div>

									</div>
								</div>

								<div class="col-sm-8 col-md-9">

									@yield('body_content')

								</div>
							</div>
						</div>
					</section>

				</div>

				<footer>

					<div class="footer-top"></div>
					<div class="footer-main">
						<div class="container">
							<div class="row">
								<div class="col-lg-8 col-sm-offset-2">
									<div class="ft-widget-area">
										<div class="ft-area1">
											<div class="swin-wget swin-wget-about">
												<div class="clearfix">
													<a class="wget-logo"><img src="{{ URL::asset('images/logo.png') }}" alt="" class="img img-responsive"></a>
													<ul class="socials socials-about list-unstyled list-inline">
														<li>
															<a href="#"><i class="fa fa-facebook"></i></a>
														</li>
														<li>
															<a href="#"><i class="fa fa-twitter"></i></a>
														</li>
														<li>
															<a href="#"><i class="fa fa-pinterest"></i></a>
														</li>
														<li>
															<a href="#"><i class="fa fa-google-plus"></i></a>
														</li>
													</ul>
												</div>
												<div class="wget-about-content">
													<p>
														Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat Duis aute irure dolor.
													</p>
												</div>
												<div class="about-contact-info clearfix">
													<!--div class="address-info">
														<div class="info-icon">
															<i class="fa fa-map-marker"></i>
														</div>
														<div class="info-content">
															<p>
																Sector-1, Uttara,
															</p>
															<p>
																Dhaka, Bangladesh
															</p>
														</div>
													</div-->
													<div class="phone-info">
														<div class="info-icon">
															<i class="fa fa-mobile-phone"></i>
														</div>
														<div class="info-content">
															<p>
																01701879637
															</p>
															<p>
																01701879638
															</p>
														</div>
													</div>
													<div class="email-info">
														<div class="info-icon">
															<i class="fa fa-envelope"></i>
														</div>
														<div class="info-content">
															<p>
																info@salsa.com.bd
															</p>
															<p>
																admin@salsa.com.bd
															</p>
														</div>
													</div>
												</div>
												
												<div class="address-info">
													<div class="info-content">
														<p>Copyright &copy; 2018 Salsa Catering Service<p>
													</div>
												</div>
												
												<!--br />
												
												<div class="about-contact-info clearfix" style="text-align: center">
													
													<p>Copyright &copy; 2018 Salsa<p>
														
												</div-->
												
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</footer>
				<a id="ala-cart" href="{{ url('cart_checkout_page') }}" class="animated ala-cart-class"> <i class="fa fa-shopping-basket"></i> </a>
				<a id="totop" href="#" class="animated"><i class="fa fa-angle-double-up"></i></a>
			</div>
			
		</div>
		<!-- jQuery-->
		<script src="{{ URL::asset('js/Website_js/jquery-1.10.2.min.js') }}"></script>
		<!-- Bootstrap JavaScript-->
		<script src="{{ URL::asset('js/Website_js/bootstrap.min.js') }}"></script>
		<!-- Vendors-->
		<script src="{{ URL::asset('js/Website_js/jquery.flexslider-min.js') }}"></script>
		<script src="{{ URL::asset('js/Website_js/jquery.swipebox.min.js') }}"></script>
		<script src="{{ URL::asset('js/Website_js/slick.min.js') }}"></script>
		<script src="{{ URL::asset('js/Website_js/isotope.pkgd.min.js') }}"></script>
		<script src="{{ URL::asset('js/Website_js/jquery.countTo.min.js') }}"></script>
		<script src="{{ URL::asset('js/Website_js/jquery.appear.min.js') }}"></script>
		<script src="{{ URL::asset('js/Website_js/parallax.min.js') }}"></script>
		<script src="{{ URL::asset('js/Website_js/gmaps.min.js') }}"></script>
		<script src="{{ URL::asset('js/Website_js/audio.min.js') }}"></script>
		<script src="{{ URL::asset('js/Website_js/jquery.vide.min.js') }}"></script>
		<script src="{{ URL::asset('js/Website_js/svgLoader.min.js') }}"></script>
		<script src="{{ URL::asset('js/Website_js/classie.min.js') }}"></script>
		<script src="{{ URL::asset('js/Website_js/sidebarEffects.min.js') }}"></script>
		<script src="{{ URL::asset('js/Website_js/jquery.nicescroll.min.js') }}"></script>
		<script src="{{ URL::asset('js/Website_js/wow.min.js') }}"></script>
		<script src="{{ URL::asset('js/Website_js/skrollr.min.js') }}"></script>
		<script src="{{ URL::asset('js/Website_js/bootstrap-datepicker.min.js') }}"></script>
		<script src="{{ URL::asset('js/Website_js/website-sidebar.js') }}"></script>
		<!-- Own script-->
		<script src="{{ URL::asset('js/Website_js/cart-counter.js') }}"></script>
		<script src="{{ URL::asset('js/Website_js/layout.js') }}"></script>
		<script src="{{ URL::asset('js/Website_js/elements.js') }}"></script>
		<script src="{{ URL::asset('js/Website_js/widget.js') }}"></script>
		<script src="{{ URL::asset('js/Website_js/jquery.easing.min.js') }}" integrity="sha384-mE6eXfrb8jxl0rzJDBRanYqgBxtJ6Unn4/1F7q4xRRyIw7Vdg9jP4ycT7x1iVsgb" crossorigin="anonymous"></script>
		<script>
			(function(i, s, o, g, r, a, m) {
				i['GoogleAnalyticsObject'] = r;
				i[r] = i[r] ||
				function() {
					(i[r].q = i[r].q || []).push(arguments)
				}, i[r].l = 1 * new Date();
				a = s.createElement(o),
				m = s.getElementsByTagName(o)[0];
				a.async = 1;
				a.src = g;
				m.parentNode.insertBefore(a, m)
			})(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
			ga('create', 'UA-102426561-1', 'auto');
			ga('send', 'pageview');

		</script>
		@yield('javascript_content')
	</body>
</html>
