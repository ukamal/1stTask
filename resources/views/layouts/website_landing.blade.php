<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<meta name="description" content="The best catering service provider in town.Order online and enjoy our free home delivery and other complementary services.">

		<meta name="keywords" content="salsa,salsa catering service,catering,catering service,wedding catering,outdoor catering,catering menu,food catering,corporate catering,catering companies,birthday party catering,catering websites,party catering,best catering service,best catering service in Uttara,best catering service in Dhaka,best catering service in Bangladesh,catering online,buffet catering,event catering,corporate catering service,catering service in Bangladesh">

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
		<!--link rel="stylesheet" type="text/css" href="{{ URL::asset('css/Website_css/slider-carousal.css') }}"-->
		<!--link rel="stylesheet" href="{{ URL::asset('css/Website_css/flexslider.min.css') }}"-->
		<!--link rel="stylesheet" href="{{ URL::asset('css/Website_css/swipebox.min.css') }}"-->
		<link rel="stylesheet" href="{{ URL::asset('css/Website_css/slick.min.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('css/Website_css/slick-theme.min.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('css/Website_css/animate.min.css') }}">
		<!--link rel="stylesheet" href="{{ URL::asset('css/Website_css/bootstrap-datepicker.min.css') }}"-->
		<link rel="stylesheet" href="{{ URL::asset('css/Website_css/component.min.css') }}">
		<!-- Font-icon-->
		<link rel="stylesheet" href="{{ URL::asset('css/Website_css/style.css') }}">
		<!-- Style-->
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/Website_css/layout.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/Website_css/elements.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/Website_css/extra.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/Website_css/widget.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/Website_css/responsive.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/Website_css/webslidemenu.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/Website_css/demo.css') }}">
		<!-- <link rel="stylesheet" type="text/css" href="assets/css/color.css">-->
		<link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700,700i" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Calibri" rel="stylesheet">
		<link rel="shortcut icon" href="{{ URL::asset('images/favicon.ico') }}" type="image/x-icon" sizes="16x16">

        <!--------sidebar.css---->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <link rel="stylesheet" href="{{ asset('css/Website_css/simplesidebar.css') }}">

        @yield('css_content')
		<!-- Script Loading Page-->
		<script src="{{ URL::asset('js/Website_js/html5shiv.js') }}"></script>
		<script src="{{ URL::asset('js/Website_js/respond.min.js') }}"></script>
		<script src="{{ URL::asset('js/Website_js/snap.svg-min.js') }}"></script>
		<script src="{{ URL::asset('js/Website_js/modernizr.custom.js') }}"></script>

		<style>

			/*.ui-autocomplete*/
			/*{*/
				/*position:absolute;*/
				/*cursor:default;*/
				/*z-index:1001 !important;*/
                /*list-style: none;*/
				/*top: 0;*/
				/*left: 0;*/
			/*}*/

			/*.ui-autocomplete.ui-menu {*/
				/*background: white;*/
				/*width: 20vh;*/
				/*list-style: none;*/
				/*padding: 0;*/
				/*margin: 0;*/
				/*display: block;*/
				/*outline: 0;*/
			/*}*/

			.ui-autocomplete {
				background: white;
				height: auto;
				max-height: 200px;
				width: 300px;
				overflow-y: auto;
				padding-left: 1%;
				z-index:1001;
			}

			.ui-autocomplete li {
				list-style: none;
				margin: 8px;
			}

			#itemCount {
				z-index: 2;
			}

			#ala-cart {
				z-index: 1;
			}

			#backButton {
				position: fixed;
				bottom: 40px;
				left: 1.5%;
				height: 47px;
				width: 47px;
				background: #f15f2a;
				border: 3px solid #ffffff;
				border-radius: 50%;
				box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.2);
				text-align: center;
				display: inline;
				z-index: 1;
			}

			#backButton > i {
				margin-top: 10px;
				color: white;
				font-size: 20px;
			}

			#backButton:hover {
				text-align: left;
				padding-left: 12px;
			}

		</style>

		<style>
			.wsmenu {
				width: 100%;
			}

            /*****Style of Navbar Area**********/
            li{
                list-style-type: none;
            }
            li.clearfix {
                width: 50%;
                margin-top: -18px;
                margin-left: 25px;
            }
            .topmenusearch input{
                background: #ffffff;
                color: #000000;
            }
            .topmenusearch .btnstyle{
                background: #ffffff;
                color: #000000;
                font-size: 16px;
            }
            span.website_tabs button {
                position: absolute;
                right: 0;
                top: -1px;
                width: 11%;
                padding: 16px;
                background: #ff686e;
                border-bottom: 1px solid #ff4e56;
                color: #ffffff;
                font-size: 15px;
            }
            span.website_tabs button:hover{
                background: #e04f54;
            }
            li.language {
                line-height: 55px;
                padding: 0;
                height: 100%;
                margin-bottom: 0;
                font-weight: 700;
                float: left;
                font-size: 14px;
                transition: all .1s ease-in-out;
                cursor: pointer;
                position: absolute;
                top: 0;
                right: 170px;
                text-decoration: none;
                list-style-type: none;
            }
            li.needHelp a{
                color: #000000;
            }
            li.needHelp:hover {
                background: #eeb529;
                transition: 1s;
            }
            li.needHelp {
                font-size: 16px;
                text-align: center;
                list-style-type: none;
                margin-left: 16px;
                margin-top: -5px;
                border-left: 1px solid #ECC766;
                border-right: 1px solid #ECC766;
                cursor: pointer;
                padding: 15px;
                color: #000000;
            }
        </style>
	</head>
	<body>



        <!-------------------------Start of Sidebar Area--------------->

        <div id="my-sidebar-context" class="widget-sidebar-context">
            <!------headerArea------>
            <header id="this-header" class="navbar justify-content-start align-items-center navbar-dark page-header" style="margin-top: 0;">
                <a href="#" class="navbar-toggler widget-sidebar-toggler" style="color: #000000;margin-top: -10px;font-size: 20px">
                    <i class="fas fa-bars"></i>
                </a>
                <a class="navbar-brand" href="{{ url('/') }}" style="color: #000;font-weight: bold;padding-top: 10px;">
                    Salsa Catering Service
                </a>
                <!-------search--------->
                  <li class="clearfix">
                      <form class="topmenusearch" method="get" action="{{ url('searchProduct') }}">
                          <input name="searchText" id="searchText" placeholder="Search for products (e.g. eggs,milk,alu)">
                          <button type="submit" class="btnstyle"><i class="searchicon fa fa-search" aria-hidden="true"></i></button>
                      </form>
                  </li>
                  <!----Nedd help--->
                  <li class="needHelp">
                      <div class="helpArea area hidden-sm hidden-xs" data-reactid=".12vnohkta8c.4.0.0.4" style="">
                          <a href="/t/Help" data-reactid=".12vnohkta8c.4.0.0.4.0">
                              <span data-reactid=".12vnohkta8c.4.0.0.4.0.0">Need Help</span>
                              <span class="questionIcon" data-reactid=".12vnohkta8c.4.0.0.4.0.1">?</span>
                          </a></div>
                  </li>
                  <!-------Language ------>
                  <li class="language">
                      <div class="localeSwitch area hidden-sm hidden-xs" data-reactid=".1cw2x50uetq.4.0.0.5">
                          <span class="selectedLocale" data-reactid=".1cw2x50uetq.4.0.0.5.0"><a href="" style="color: #ff686e">EN&nbsp;</a></span>
                          |
                          <span class="" data-reactid=".1cw2x50uetq.4.0.0.5.2"><a href="" style="color: #000000">&nbsp;বাং</a></span>
                      </div>
                  </li>
                <!----------login---------->
                  <li>
                      <a href="{{ url('/login') }}" class="navtext">
                        <span class="website_tabs">
                           <button type="submit" class="btn btn-lg btn-block">Sign in</button>
                        </span>
                      </a>
                  </li>

                <!---------HeaderArea------->
            </header>

            <div class="page-body">
                <!-----sidebar----->
                <nav class="widget-sidebar">
                    <ul class="list-unstyled mt-2">
                        <li class="active">
                            <a href="#">
                                <i class="fas fa-bars"></i><span> Dashboard </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-pencil-alt"></i><span> jQueryScript.net </span>
                            </a>
                        </li>
                        <li>
                            <a href="#sidebar-link-mycomponents" data-toggle="collapse"
                               aria-expanded="true"
                               class="dropdown-toggle">
                                <i class="fas fa-shapes"></i><span> Posts </span>
                            </a>
                            <ul class="collapse list-unstyled show"
                                id="sidebar-link-mycomponents">
                                <li>
                                    <a href="#">All Posts</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-----mainContent------>
                <div class="page-main">
                    <div id="pagewrap" class="pagewrap">
                        <div id="loader" class="pageload-overlay">
                            <div class="loader-wrapper">
                                <svg style="margin: 0;padding: 0;position: absolute" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewbox="0 0 80 60" preserveaspectratio="none">
                                    <path d="m -5,-5 0,70 90,0 0,-70 z m 5,5 c 0,0 7.9843788,0 40,0 35,0 40,0 40,0 l 0,60 c 0,0 -3.944487,0 -40,0 -30,0 -40,0 -40,0 z"></path>
                                </svg>
                            </div>
                        </div>

                        <div id="html-content" class="wrapper-content">

                            @yield('body_content')

                            <div id="backButton" class="animated zoomIn">
                                <i class="fa fa-angle-double-left"></i>
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
                                                            <!--a class="wget-logo"><img src="{{ URL::asset('images/background/footer-banner-2.png') }}" alt="" class="img img-responsive"></a-->
                                                                <!--ul class="socials socials-about list-unstyled list-inline">
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
                                                                </ul-->
                                                            </div>
                                                            <!--div class="wget-about-content">
                                                                <p>
                                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat Duis aute irure dolor.
                                                                </p>
                                                            </div-->
                                                            <br />
                                                            <div class="about-contact-info clearfix">

                                                                <!--div class="address-info">
                                                                    <div class="info-icon">
                                                                        <i class="fa fa-map-marker"></i>
                                                                    </div>
                                                                    <div class="info-content">
                                                                        <p>
                                                                            Sector - 1
                                                                        </p>
                                                                        <p>
                                                                            Uttara, Dhaka, Bangladesh
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

                                                                <div class="address-info">
                                                                    <div class="info-content">
                                                                        <p>Copyright &copy; 2018 Salsa Catering Service<p>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <!--br /-->

                                                            <!--div class="about-contact-info clearfix" style="text-align: center">

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

                            <div id="itemCountDiv">
                                <span id="itemCount"> {{ Session::has('cart') ? Session::get('cart')->totalQty : '0' }} </span>
                                <a id="ala-cart" href="{{ route('product.shoppingCart') }}" class="animated ala-cart-class"> <i class="fa fa-shopping-basket"></i> </a>
                            </div>
                            <a id="totop" href="#" class="animated"><i class="fa fa-angle-double-up"></i></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!---------End  of Sidebar Area--------->

        <!---------forSidebarArea-------->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha384-vk5WoKIaW/vJyUAd9n/wmopsmNhiy+L2Z+SBxGYnUkunIxVxAv/UtMOhba/xskxh" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <script>
            $(document).ready(function () {
                $("#my-sidebar-context").simpleSidebar();
            });

        </script>

        <script type="text/javascript">
            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-36251023-1']);
            _gaq.push(['_setDomainName', 'jqueryscript.net']);
            _gaq.push(['_trackPageview']);

            (function() {
                var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();
        </script>

		<!-- jQuery-->
		<script src="{{ URL::asset('js/Website_js/jquery-1.10.2.min.js') }}"></script>
		<!-- Bootstrap JavaScript-->
		<script src="{{ URL::asset('js/Website_js/bootstrap.min.js') }}"></script>
		<script src="{{ URL::asset('js/Website_js/webslidemenu.js') }}"></script>
		<!-- Vendors-->
		<!--script src="{{ URL::asset('js/Website_js/jquery.flexslider-min.js') }}"></script-->
		<!--script src="{{ URL::asset('js/Website_js/jquery.swipebox.min.js') }}"></script-->
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
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<!-- Own script-->
		<!--script src="{{ URL::asset('js/Website_js/cart-counter.js') }}"></script-->
		<script src="{{ URL::asset('js/Website_js/layout.js') }}"></script>
		<script src="{{ URL::asset('js/Website_js/elements.js') }}"></script>
		<script src="{{ URL::asset('js/Website_js/widget.js') }}"></script>
		<script src="{{ URL::asset('js/Website_js/jquery.easing.min.js') }}" integrity="sha384-mE6eXfrb8jxl0rzJDBRanYqgBxtJ6Unn4/1F7q4xRRyIw7Vdg9jP4ycT7x1iVsgb" crossorigin="anonymous"></script>
        <!------Sidebar------>
        <script src="{{ asset('js/Website_js/simplesidebar.js') }}"></script>



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

		<script>
			$(document).ready(function () {
			    $(".menuText").on('click', function() {
			        console.log("OK");
			        $(".wsmenu-click").click();
				});

                $("#username").on('click', function () {
                    $(".wsmenu-submenu").toggle();
                });

			    $("#searchText").autocomplete({
                    source: "{{ url('getSuggestion') }}"
                }).data("ui-autocomplete")._renderItem = function (ul, item) {

                    var url = "{{ url('product_details_page') }}/" + item.id;

                    return $("<li></li>")
                        .data("item.autocomplete", item)
                        .append("<a href='" + url + "' >" + item.label + "</a>")
                        .appendTo(ul);
                }

                $("#backButton").on('click', function () {
                    window.history.back();
                });
            });
		</script>
		@yield('javascript_content')
	</body>
</html>
