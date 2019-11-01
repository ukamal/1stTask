<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Salsa Catering</title>
		<link href="{{ URL::asset('css/Website_css/bootstrap.min.css') }}" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/Website_css/menu_book_css/jquery.jscrollpane.custom.css') }}" />
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/Website_css/menu_book_css/bookblock.css') }}" />
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/Website_css/menu_book_css/custom.css') }}" />
		<style>
		    body {
		    	font-family: "Calibri";
		    }

			h1{
				font-weight: lighter;
				color: #f15f2a;
				font-size: 25px;
			}

		    table {
			    width: 90%;
			    margin:15px auto;
			    table-layout:fixed;
			    border-collapse: collapse;
		    }

		    td {
			    padding:1em 0 0 0;
			    vertical-align:bottom;
			    background-image:radial-gradient(black 1px, white 0px);
			    background-size: 8px 8px;
			    background-repeat:repeat-x;
			    background-position: left bottom;
		    }

		    td span{
		    	background-color:#fff;
		    	font-size: 22px;
		    	font-weight: lighter;
		    }

		    td span.price{
		    	background-color:#fff;
		    	font-size: 22px;
		    	color: #f15f2a;
		    	font-weight: bolder;
		    }

		    td:first-child {
			    text-align: left;
			    font-weight: 700;
		    }

		    td:first-child span{
		    	padding-right:.25em;
		    }

		    td:last-child {
			    text-align:right;
			    width:10em;
		    }

		    td:last-child span{
		    	padding-left:-.75em;
		    }

		    img{
		    	width: 80px;
		    }

		    .main_category{
		    	margin-bottom: 40px;
		    	margin-top: 40px;
		    }

		    h2{
		    	font-family: "century";
		    }

		    @media(max-width: 480px){
		    	.content h2{
		    		font-size: 25px;
		    	}

		    	img{
			    	width: 60px;
			    }

			    h1 {
				    font-size: 22px;
				}

				td span{
				    font-size: 20px;
				}

				td span.price {
				    font-size: 20px;
				}

		    }

		</style>
		<script src="{{ URL::asset('js/Website_js/menu_book_js/modernizr.custom.79639.js') }}"></script>
	</head>
	<body>
		<div id="container" class="container">

			<div class="menu-panel">
				<h3>Categories</h3>
				<ul id="menu-toc" class="menu-toc">
					<?php $main_categories = \App\Category::where('parent_id', 'none')->get() ?>
					@foreach($main_categories as $categories)
					<li>
						<a href="#{{ $categories->category_slug }}">{{ $categories->category_name }} </a>
					</li>
					@endforeach
				</ul>
				<div>
					<a href="{{ url('/') }}">&larr; Back to Home</a>
				</div>
			</div>

			<div class="bb-custom-wrapper">
				<div id="bb-bookblock" class="bb-bookblock">
					<?php $main_categories = \App\Category::where('parent_id', 'none')->get() ?>
					@foreach($main_categories as $categories)
					<div class="bb-item" id="{{ $categories->category_slug }}">
						<div class="content">
							<div class="scroller">
								<div class="col-md-12 main_category">
									<div class="col-md-1">
										<img src="{{ URL::asset('images/logo.png') }}" alt=""/>
									</div>
									<div class="col-md-4">
										<h2>{{ $categories->category_name }}</h2>
									</div>
								</div>

								<?php $sub_categories = \App\Category::where('parent_id', $categories->id)->with('products')->get(); ?>
								@foreach($sub_categories as $category)
								<h1>{{ $category->category_name }}</h1>
								<table>
									@foreach($category->products as  $index => $products)
										<tr>
											<td><span>{{ $products->product_name }}</span></td>
											<?php $product_price = number_format($products->product_price) ?>
											<td><span class="price">&#x9f3; {{ $product_price }}</span></td>
										</tr>
									@endforeach
								</table>
								<br />
								@endforeach
							</div>
						</div>
					</div>
					@endforeach
				</div>

				<nav>
					<span id="bb-nav-prev">&larr;</span>
					<span id="bb-nav-next">&rarr;</span>
				</nav>

				<span id="tblcontents" class="menu-button">Table of Contents</span>

			</div>

		</div><!-- /container -->
		<script src="{{ URL::asset('js/Website_js/menu_book_js/jquery.min.js') }}"></script>
		<!-- Bootstrap JavaScript-->
		<script src="{{ URL::asset('js/Website_js/bootstrap.min.js') }}"></script>
		<script src="{{ URL::asset('js/Website_js/menu_book_js/jquery.mousewheel.js') }}"></script>
		<script src="{{ URL::asset('js/Website_js/menu_book_js/jquery.jscrollpane.min.js') }}"></script>
		<script src="{{ URL::asset('js/Website_js/menu_book_js/jquerypp.custom.js') }}"></script>
		<script src="{{ URL::asset('js/Website_js/menu_book_js/jquery.bookblock.js') }}"></script>
		<script src="{{ URL::asset('js/Website_js/menu_book_js/page.js') }}"></script>
		<script>
			$(function() {

				Page.init();

			});
		</script>
	</body>
</html>
