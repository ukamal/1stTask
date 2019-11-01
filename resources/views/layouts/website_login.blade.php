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
		<link rel="stylesheet" href="{{ URL::asset('css/Website_css/login.css') }}">
		<link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700,700i" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Calibri" rel="stylesheet">
		@yield('css_content')
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4 col-md-offset-4 login-form">
					<h1 class="text-center login-title"><span id="company_name"> Salsa Catering Service </span> </h1>
					<div class="account-wall">
						<img class="profile-img" src="{{ URL::asset('images/logo.png') }}"
						alt="">
						<!--p class="profile-name">
							Bhaumik Patel
						</p>
						<span class="profile-email">example@gmail.com</span-->
						@yield('body_content')
					</div>
					<a href="#" class="text-center new-account link_text">Create Account</a>
				</div>
			</div>
		</div>
		<!-- jQuery-->
		<script src="{{ URL::asset('js/Website_js/jquery-1.10.2.min.js') }}"></script>
		<!-- Bootstrap JavaScript-->
		<script src="{{ URL::asset('js/Website_js/bootstrap.min.js') }}"></script>
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
