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
		<link rel="stylesheet" href="{{ URL::asset('css/Website_css/flexslider.min.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('css/Website_css/swipebox.min.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('css/Website_css/slick.min.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('css/Website_css/slick-theme.min.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('css/Website_css/animate.min.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('css/Website_css/bootstrap-datepicker.min.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('css/Website_css/component.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/Website_css/webslidemenu.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/Website_css/demo.css') }}">
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
		<link rel="shortcut icon" href="{{ URL::asset('images/favicon.ico') }}" type="image/x-icon" sizes="16x16">

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

			.wsmenu {
				width: 100%;
			}

		</style>
	</head>
	<body>

		<div class="wsmenucontainer clearfix">
			<div class="overlapblackbg"></div>
			<div class="wsmobileheader clearfix">
				<a id="wsnavtoggle" class="animated-arrow"><span></span></a><a class="smallogo"><img src="{{ URL::asset('images/mobile_sm_logo.gif') }}"  alt="" /></a>
				<a class="callusicon" href="tel:01701879637"><span class="fa fa-phone"></span></a>
			</div>
			<div class="headtoppart clearfix">
				<div class="headerwp">
					<div class="headertopleft">
						<div class="address clearfix">
							<!--span><i class="fa fa-map-marker" aria-hidden="true"></i> Sector 1, Uttara, Dhaka, Bangladesh </span--><a href="#"><i class="fa fa-phone" aria-hidden="true"></i> 01701879637 </a>
						</div>
					</div>
					<div class="headertopright">
						<a class="facebookicon" title="Facebook" target="_blank" href="https://www.facebook.com/Salsabd"><i aria-hidden="true" class="fa fa-facebook"></i> <span class="mobiletext02">Facebook</span></a>
						<a class="youtubeicon" title="You Tube" target="_blank" href="https://www.youtube.com/channel/UCHR0b6UTeGBeXkby84Ue0CQ"><i aria-hidden="true" class="fa fa-youtube"></i> <span class="mobiletext02">You Tube</span></a>
						<a class="linkedinicon" title="Linkedin" target="_blank" href="https://linkedin.com/in/salsa-catering-service-451599154"><i aria-hidden="true" class="fa fa-linkedin"></i> <span class="mobiletext02">Linkedin</span></a>
						<a class="googleicon" title="Google" target="_blank" href="#"><i aria-hidden="true" class="fa fa-google"></i> <span class="mobiletext02">Google</span></a>
						<a class="instagramicon" title="Instagram" target="_blank" href="https://www.instagram.com/salsacateringservice"><i aria-hidden="true" class="fa fa-instagram"></i> <span class="mobiletext02">Instagram</span></a>
						<a class="twittericon" title="Twitter" target="_blank" href="https://twitter.com/salsabangladesh"><i aria-hidden="true" class="fa fa-twitter"></i> <span class="mobiletext02">Twitter</span></a>
						<a class="pinteresticon" title="Pinterest" target="_blank" href="https://www.pinterest.com/salsabd"><i aria-hidden="true" class="fa fa-pinterest"></i> <span class="mobiletext02">Pinterest</span></a>
						<a class="shopping_cart" href="{{ route('product.shoppingCart') }}"><i aria-hidden="true" class="fa fa-shopping-basket"></i>
							<span id="itemCountMobile"> {{ Session::has('cart') ? Session::get('cart')->totalQty : '0' }} </span>
						</a>
					</div>
				</div>
			</div>

			<div class="headerfull">
				<!--Main Menu HTML Code-->
				<div class="wsmain">
				<!--div class="smllogo">
						<a href="#"><img src="{{ URL::asset('images/Salsa-Logo.png') }}" alt=""/></a>
					</div-->


					<nav class="wsmenu clearfix">
						<ul class="mobile-sub wsmenu-list">
							<li>
								<a href="javascript:void(0)" class="navtext menuText">
									<span></span>
									<span style="color: #f15f2a;" >Menu
									</span>
								</a>

								<div class="wsshoptabing wtsdepartmentmenu clearfix">
									<div class="wsshopwp clearfix">
										<ul class="wstabitem clearfix">

											<li class="wsshoplink-active">
												<a href="javascript:void(0)"><img width="24px" src="{{ URL::asset('images/main menu/snacks-fast-food.png') }}" /> Snacks & Fast Food</a>
												<div class="wstitemright clearfix computermenubg">
													<div class="wstmegamenucoll01 clearfix">
                                                        <?php $snacks_and_fast_food = \App\Category::where('category_slug','snacks-and-fast-food')->first(); ?>
                                                        <?php $sancks_and_fast_food_products = \App\Category::where('parent_id',$snacks_and_fast_food->id)->with('products')->get(); ?>
														@foreach($sancks_and_fast_food_products as $category)
															<div class="wstheading">
																<a href="{{ url('product_page/'.$category->id) }}">{{ $category->category_name }}</a> <a href="{{ url('product_page/'.$category->id) }}" class="wstmorebtn">View All</a>
															</div>
															@foreach($category->products as  $index => $products)
																@if($index<3)
																	<ul class="wstliststy03">
																		<li>
																			<a href="{{ url('product_details_page/'.$products->id) }}"> {{ $products->product_name }} <!--span class="wstmenutag greentag">New</span--></a>
																		</li>
																	</ul>
																@endif
															@endforeach
															<div class="cl" style="height:8px;"></div>
														@endforeach
													</div>
												</div>
											</li>


											<li>
												<a href="javascript:void(0)"><img width="24px" src="{{ URL::asset('images/main menu/appitizer.png') }}" /> Appetizers</a>
												<div class="wstitemright clearfix">
													<div class="wstmegamenucoll clearfix">
                                                        <?php $appitizers = \App\Category::where('category_slug','appetizers')->first(); ?>
                                                        <?php $appitizers_products = \App\Category::where('parent_id',$appitizers->id)->with('products')->get(); ?>
														@foreach($appitizers_products as $category)
															<div class="wstheading">
																<a href="{{ url('product_page/'.$category->id) }}">{{ $category->category_name }} List</a> <a href="{{ url('product_page/'.$category->id) }}" class="wstmorebtn"> View All </a>
															</div>
															<ul class="wstliststy01">
																@foreach($category->products as  $index => $products)
																	<li>
																		<a href="{{ url('product_details_page/'.$products->id) }}">{{ $products->product_name }} </a>
																	</li>
																@endforeach
															</ul>
														@endforeach
													</div>
													<div class="wstmegamenucolr clearfix">
														<a href="#"><img src="{{ URL::asset('images/main menu/appetizer-side.jpg') }}" alt="" ></a>
													</div>
												</div>
											</li>

											<li>
												<a href="javascript:void(0)"><img width="24px" src="{{ URL::asset('images/main menu/Rice-&-biriani.png') }}" /> Rice & Biriyani</a>
												<div class="wstitemright clearfix wstpngsml">
													<div class="wstmegamenucolr03 clearfix">
														<img src="{{ URL::asset('images/main menu/rice-side-photo.png') }}" alt="">
													</div>
													<div class="wstmegamenucoll04 clearfix">
                                                        <?php $rice_and_biriyani = \App\Category::where('category_slug','rice-and-biriyani')->first(); ?>
                                                        <?php $rice_and_biriyani_products = \App\Category::where('parent_id',$rice_and_biriyani->id)->with('products')->get(); ?>
														@foreach($rice_and_biriyani_products as $category)
															<ul class="wstliststy05 clearfix">
																@if($category->category_slug=="indian-and-deshi-rice")
																	<li><img src="{{ URL::asset('images/main menu/Indian-&-Deshi.png') }}" alt=" ">
																	</li>
																@elseif($category->category_slug=="thai-and-chinese-rice")
																	<li><img src="{{ URL::asset('images/main menu/Thai-&-Chinese.png') }}" alt=" ">
																	</li>
																@else
																	<li><img src="{{ URL::asset('images/main menu/BIRIYANI.png') }}" alt=" ">
																	</li>
																@endif
																<li class="wstheading">
																	<a href="{{ url('product_page/'.$category->id) }}">{{ $category->category_name }}</a> <br /> <br /> <a href="{{ url('product_page/'.$category->id) }}"> View All </a>
																</li>
																@foreach($category->products as  $index => $products)
																	@if($index<8)
																		<li>
																			<a href="{{ url('product_details_page/'.$products->id) }}">{{ $products->product_name }} </a>
																		</li>
																	@endif
																@endforeach
															</ul>
														@endforeach
													</div>
												</div>
											</li>

											<li>
												<a href="javascript:void(0)"><img width="24px" src="{{ URL::asset('images/main menu/Curries-&-kabab.png') }}" /> Curries & Kabab</a>
												<div class="wstitemright clearfix">
                                                    <?php $curries_and_kabab = \App\Category::where('category_slug','curries-and-kabab')->first(); ?>
                                                    <?php $curries_and_kabab_products = \App\Category::where('parent_id',$curries_and_kabab->id)->with('products')->get(); ?>
													@foreach($curries_and_kabab_products as $category)
														<ul class="wstliststy02">
															<li class="wstheading">
																<a href="{{ url('product_page/'.$category->id) }}">{{ $category->category_name }}</a><a href="{{ url('product_page/'.$category->id) }}" class="wstmorebtn"> View All </a>
															</li>
															@foreach($category->products as  $index => $products)
																@if($index<9)
																	<li>
																		<a href="{{ url('product_details_page/'.$products->id) }}">{{ $products->product_name }}  </a>
																	</li>
																@endif
															@endforeach
														</ul>
													@endforeach
													<div class="wstadsize01 clearfix">
														<a href="#"><img src="{{ URL::asset('images/main menu/Grilled-kabab.jpg') }}" alt="" ></a>
													</div>
												</div>
											</li>


											<li>
												<a href="javascript:void(0)"><img width="24px" src="{{ URL::asset('images/main menu/Continental.png') }}" /> Continental</a>
												<div class="wstitemright clearfix">
													<div class="wstmegamenucoll clearfix">
                                                        <?php $continental = \App\Category::where('category_slug','continental')->first(); ?>
                                                        <?php $continental_products = \App\Category::where('parent_id',$continental->id)->with('products')->get(); ?>
														@foreach($continental_products as $category)
															<div class="wstheading">
																<a href="{{ url('product_page/'.$category->id) }}">{{ $category->category_name }}  Food Items</a> <a href="{{ url('product_page/'.$category->id) }}" class="wstmorebtn"> View All </a>
															</div>
															<ul class="wstliststy01">
																@foreach($category->products as  $index => $products)
																	<li>
																		<a href="{{ url('product_details_page/'.$products->id) }}">{{ $products->product_name }} </a>
																	</li>
																@endforeach
															</ul>
													</div>
													@endforeach
													<div class="wstmegamenucolr clearfix">
														<a href="#"><img src="{{ URL::asset('images/main menu/Continental-1.png') }}" alt="" ></a>
													</div>
												</div>
											</li>

											<li>
												<a href="javascript:void(0)"><img width="24px" src="{{ URL::asset('images/main menu/vegetable.png') }}" /> Vegetables</a>
												<div class="wstitemright clearfix">
													<div class="wstmegamenucoll clearfix">
                                                        <?php $vegetables = \App\Category::where('category_slug','vegetables')->first(); ?>
                                                        <?php $vegetables_products = \App\Category::where('parent_id',$vegetables->id)->with('products')->get(); ?>
														@foreach($vegetables_products as $category)
															<div class="wstheading">
																<a href="{{ url('product_page/'.$category->id) }}">{{ $category->category_name }} List</a>  <a href="{{ url('product_page/'.$category->id) }}" class="wstmorebtn"> View All </a>
															</div>
															<ul class="wstliststy01">
																@foreach($category->products as  $index => $products)
																	<li>
																		<a href="{{ url('product_details_page/'.$products->id) }}">{{ $products->product_name }} </a>
																	</li>
																@endforeach

															</ul>
													</div>
													@endforeach
													<div class="wstmegamenucolr clearfix">
														<a href="#"><img src="{{ URL::asset('images/main menu/vegetables-side-photo.png') }}" alt="" ></a>
													</div>
												</div>
											</li>

											<li>
												<a href="javascript:void(0)"><img width="24px" src="{{ URL::asset('images/main menu/salad.png') }}" /> Salad & Chatni</a>
												<div class="wstitemright clearfix">
													<div class="wstmegamenucoll clearfix">
                                                        <?php $salad = \App\Category::where('category_slug','salad-and-chatni')->first(); ?>
                                                        <?php $salad_products = \App\Category::where('parent_id',$salad->id)->with('products')->get(); ?>
														@foreach($salad_products as $category)
															<div class="wstheading">
																<a href="{{ url('product_page/'.$category->id) }}">{{ $category->category_name }}</a> <a href="{{ url('product_page/'.$category->id) }}" class="wstmorebtn"> View All </a>
															</div>
															<ul class="wstliststy01">
																@foreach($category->products as  $index => $products)
																	<li>
																		<a href="{{ url('product_details_page/'.$products->id) }}">{{ $products->product_name }} </a>
																	</li>
																@endforeach

															</ul>
													</div>
													@endforeach
													<div class="wstmegamenucolr clearfix">
														<a href="#"><img src="{{ URL::asset('images/main menu/Salad-side-1.png') }}" alt="" ></a>
													</div>
												</div>
											</li>

											<li>
												<a href="javascript:void(0)"><img width="24px" src="{{ URL::asset('images/main menu/dessart.png') }}" /> Dessert & Drinks</a>
												<div class="wstitemright clearfix">
													<div class="wstmegamenucoll clearfix">
                                                        <?php $dessert = \App\Category::where('category_slug', 'dessert-and-drinks') -> first(); ?>
                                                        <?php $dessert_products = \App\Category::where('parent_id', $dessert->id)->with('products')->get(); ?>
														@foreach($dessert_products as $category)
															<div class="wstheading">
																<a href="{{ url('product_page/'.$category->id) }}">{{ $category->category_name }}</a> <a href="{{ url('product_page/'.$category->id) }}" class="wstmorebtn"> View All </a>
															</div>
															@foreach($category->products as $products)
																<ul class="wstliststy01">
																	<li>
																		<a href="{{ url('product_details_page/'.$products->id) }}"> {{ $products->product_name }} <!--span class="wstmenutag greentag">New</span--></a>
																	</li>
																</ul>
															@endforeach
													</div>
													@endforeach
													<div class="wstmegamenucolr clearfix">
														<a href="#"><img src="{{ URL::asset('images/main menu/Dessert-side-2.jpg') }}" alt="" ></a>
													</div>
												</div>
											</li>

										</ul>
									</div>
								</div>
							</li>
							<li>
								<a href="{{ url('/') }}" class="navtext"> <span class="website_tabs" style="color: #f15f2a;">Home</span></a>
							</li>
							<li>
								<a href="{{ url('about_us') }}" class="navtext"> <span class="website_tabs" style="color: #f15f2a;">About Us</span></a>
							</li>
							<li>
								<a href="{{ url('menu_book') }}" class="navtext" target="_blank"><span class="website_tabs" style="color: #f15f2a;">Menu Book</span></a>
							</li>
							<li>
								<a href="{{ url('career') }}" class="navtext"><span class="website_tabs" style="color: #f15f2a;">Career</span></a>
							</li>
							<li>
								<a href="{{ url('gallery') }}" class="navtext"><span class="website_tabs" style="color: #f15f2a;">Gallery</span></a>
							</li>
							<li>
								<a href="{{ url('contact_us') }}" class="navtext"><span class="website_tabs" style="color: #f15f2a;">Contact Us</span></a>
							</li>


						<!--li>
								<a href="#" class="navtext"><span></span> <span>Visit Salsa</span></a>
								<div class="wsshoptabing wtsbrandmenu clearfix">
									<div class="wsshoptabingwp clearfix">
										<ul class="wstabitem02 clearfix">
											<li class="wsshoplink-active">
												<a href="{{ url('/') }}"><i class="fa fa-home brandcolor01" aria-hidden="true"></i>Home</a>
											</li>
											<li>
												<a href="{{ url('about_us') }}"><i class="fa fa-user brandcolor05" aria-hidden="true"></i> About Us</a>
											</li>
											<li>
												<a href="#"><i class="fa fa-coffee brandcolor06" aria-hidden="true"></i> Food Menu</a>
											</li>
											<li>
												<a href="#"><i class="fa fa-cutlery brandcolor07" aria-hidden="true"></i>Our Kitchen</a>
											</li>
											<li>
												<a href="{{ url('contact_us') }}"><i class="fa fa-phone brandcolor08" aria-hidden="true"></i>Contact Informations</a>
											</li>
										</ul>
									</div>
								</div>
							</li-->

							<!--li class="wssearchbar clearfix">
								<form class="topmenusearch">
									<input placeholder="Search Product By Name, Category...">
									<button class="btnstyle">
										<i class="searchicon fa fa-search" aria-hidden="true"></i>
									</button>
								</form>
							</li-->
							<!--li class="wscarticon clearfix">
								<a href="#"><i class="fa fa-shopping-basket"></i> <em class="roundpoint">8</em><span class="mobiletext">Shopping Cart</span></a>
							</li-->

							<li class="clearfix" style="width: 215px;">
								<form class="topmenusearch" method="get" action="{{ url('searchProduct') }}" >
									<input name="searchText" id="searchText" placeholder="Search">
									<button type="submit" class="btnstyle"><i class="searchicon fa fa-search" aria-hidden="true"></i></button>
								</form>
							</li>
							<li>
								@if (Auth::guest())
									<a href="{{ url('/login') }}" class="navtext">
									<span class="website_tabs" style="color: #f15f2a;">
										<i class="fa fa-lock" aria-hidden="true"></i>
										My Account
									</span>
									</a>

								@else
									<a href="javascript:void(0)" id="username" class="navtext"><span></span>
										<span style="color: #f15f2a;">
											<i class="fa fa-unlock-alt" aria-hidden="true">
											</i>
                                            <?php
                                            $name = explode(" ", Auth::user()->name);
                                            ?>
											Welcome, {{ $name[0] }}
										</span>
									</a>
									<ul class="wsmenu-submenu">
										<li>
											<a href="{{ url('user_account') }}"><i class="fa fa-black-tie"></i>Account Informations</a>
										</li>
										<li>
											<a href="{{ url('change_user_password_form') }}"><i class="fa fa-key"></i>Change Password</a>
										</li>
										<!--li>
                                            <a href="#"><i class="fa fa-heart"></i>My Saved Items</a>
                                        </li-->
										<li>
											<a href="{{ url('get_user_orders') }}"><i class="fa fa-bell"></i>My Orders</a>
										</li>
										<!--li>
                                            <a href="#"><i class="fa fa-question-circle"></i>Any Questions</a>
                                        </li-->
										<li>
											<a href="{{ url('/users/logout') }}"><i class="fa fa-sign-out"></i>Logout</a>
										</li>
									</ul>
								@endif
							</li>
							{{--<li class="wssearchbar clearfix">--}}
							{{--<form class="topmenusearch">--}}
							{{--<input placeholder="Search Product By Name, Category...">--}}
							{{--<a href="http://www.google.com" class="btnstyle"><i class="searchicon fa fa-search" aria-hidden="true"></i></a>--}}
							{{--</form>--}}
							{{--</li>--}}
						</ul>
					</nav>
				</div>
				<!--Menu HTML Code-->
			</div>
		</div>

		<div id="pagewrap" class="pagewrap">
			<div id="loader" data-opening="m -5,-5 0,70 90,0 0,-70 z m 5,35 c 0,0 15,20 40,0 25,-20 40,0 40,0 l 0,0 C 80,30 65,10 40,30 15,50 0,30 0,30 z" class="pageload-overlay">
				<div class="loader-wrapper">
					<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewbox="0 0 80 60" preserveaspectratio="none">
						<path d="m -5,-5 0,70 90,0 0,-70 z m 5,5 c 0,0 7.9843788,0 40,0 35,0 40,0 40,0 l 0,60 c 0,0 -3.944487,0 -40,0 -30,0 -40,0 -40,0 z"></path>
					</svg>
					<div class="sk-circle">
						<div class="sk-circle1 sk-child"></div>
						<div class="sk-circle2 sk-child"></div>
						<div class="sk-circle3 sk-child"></div>
						<div class="sk-circle4 sk-child"></div>
						<div class="sk-circle5 sk-child"></div>
						<div class="sk-circle6 sk-child"></div>
						<div class="sk-circle7 sk-child"></div>
						<div class="sk-circle8 sk-child"></div>
						<div class="sk-circle9 sk-child"></div>
						<div class="sk-circle10 sk-child"></div>
						<div class="sk-circle11 sk-child"></div>
						<div class="sk-circle12 sk-child"></div>
					</div>
					<div class="sk-circle sk-circle-out">
						<div class="sk-circle1 sk-child"></div>
						<div class="sk-circle2 sk-child"></div>
						<div class="sk-circle3 sk-child"></div>
						<div class="sk-circle4 sk-child"></div>
						<div class="sk-circle5 sk-child"></div>
						<div class="sk-circle6 sk-child"></div>
						<div class="sk-circle7 sk-child"></div>
						<div class="sk-circle8 sk-child"></div>
						<div class="sk-circle9 sk-child"></div>
						<div class="sk-circle10 sk-child"></div>
						<div class="sk-circle11 sk-child"></div>
						<div class="sk-circle12 sk-child"></div>
					</div>
				</div>
			</div>
			<div id="html-content" class="wrapper-content">

				<div class="page-container">

					@yield('body_content_top_banner')

					<section class="padding-top-20">
						<div class="row">
							<div class="container">
								<div class="col-sm-4 col-md-3 sidebar">

									<div class="well col-md-12 col-sm-12">
										<div class="row">
											<div class="panel-header">
												<span class="programs-header-text"><strong> Programs </strong></span>
												<span class="bar-icon"><i class="fa fa-bars"></i></span>
											</div>
										</div>

										<div class="programs-content-panel">

											<?php $programs = \App\Program::all(); ?>
											@if(isset($programs))
											@foreach($programs as $program)
											<div class="row user-row">
												<div class="col-md-12 col-sm-12 dropdown-user" data-for=".{{ $program->program_slug }}">
													<img class="img-circle" width="50px" height="42px" src="{{ URL::asset('images/Programs/'.$program->program_image) }}" alt="Program Pic">
													<span class="programs-name" id="{{ $program->program_slug }}-id"> {{ $program->program_name }} </span>
												</div>
											</div>

											<div class="row user-infos {{ $program->program_slug }} btn-div">
												<div class="col-md-12 col-sm-12 col-xs-12">
													<div class="col-md-6 col-sm-6 col-xs-6">
														<a href="{{ url('/product_page_for_programs/'.$program->id.'/'.'Box') }}" class="btn swin-btn"> Box </a>
													</div>
													<div class="col-md-6 col-sm-6 col-xs-6">
														<a href="{{ url('/product_page_for_programs/'.$program->id.'/'.'Buffet') }}" class="btn swin-btn"> Buffet </a>
													</div>
												</div>
											</div>
											@endforeach
											@endif
										</div>

									</div>
								</div>

								<div class="col-sm-8 col-md-9">

									@yield('body_content')

									<div id="backButton">
										<i class="fa fa-angle-double-left"></i>
									</div>

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
				<span id="itemCount"> {{ Session::has('cart') ? Session::get('cart')->totalQty : '0' }} </span>
				<a id="ala-cart" href="{{ route('product.shoppingCart') }}" class="animated ala-cart-class"> <i class="fa fa-shopping-basket"></i> </a>
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
		<script src="{{ URL::asset('js/Website_js/webslidemenu.js') }}"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<!-- Own script-->
		<!--script src="{{ URL::asset('js/Website_js/cart-counter.js') }}"></script-->
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

		<script>
			$(document).ready(function () {
                $(".menuText").on('click', function() {
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
