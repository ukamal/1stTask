@extends('layouts.website')
@section('css_content')
<style>
	.tableTitle {
		height: 60px;
		padding-top: 0px;
		padding-left: 0px;
		color: #000000;
		font-size: 30px;
		font-weight: 400;
	}

	.my-header {
		padding: 1em;
		font-size: 25px;
		font-family: 'Calibri';
	}

	@media (max-width: 480px) {
		.tableTitle {
			padding-top: 10px;
			padding-left: 0px;
		}
	}
</style>
@endsection

@section('body_content_top_banner')

<div data-bottom-top="background-position: 50% 50px;" data-center="background-position: 50% 0px;" data-top-bottom="background-position: 50% -50px;" class="page-title page-product">
	<div class="container">
		<div class="title-wrapper">
			<div data-top="transform: translateY(0px);opacity:1;" data--20-top="transform: translateY(-5px);" data--50-top="transform: translateY(-15px);opacity:0.8;" data--120-top="transform: translateY(-30px);opacity:0;" data-anchor-target=".page-title" class="title">
				About Us
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
		<span class="my-header"><strong> Introduction </strong></span>
	</div>
	<div class="panel-body">

		<p>
			Salsa is the only private company which is successfully serving the aviation industries of Bangladesh for decades. Our clients enjoy Salsa's full range of flexible culinary solutions to suit their custom needs, large or small, casual or elegant, from clambakes and barbeques, to special occasion buffet or elegantly plated and served meals. We focus on the details and help create an amazing event. We work closely with our clients to produce memorable events that hosts can truly enjoy and participate in along with their guests.
		</p>
		

	</div>
</div>

<div class="panel panel-default">
	<div class="panel-heading">
		<span class="my-header"><strong>  Our Specialties </strong></span>
	</div>
	<div class="panel-body">

		<p>
			Salsa's capacity is reflected in our custom menus. Our menus include gourmet, contemporary and traditional selections. We serve special meals to our clients considering their health conscious or prescribed by a medical doctor.
		</p>

	</div>
</div>

<div class="panel panel-default">
	<div class="panel-heading">
		<span class="my-header"><strong> Followings are our main areas of specialty </strong></span>
	</div>
	<div class="panel-body">
		<p>
			Salsa has the most modern kitchen equipment and trained employees who have the experience working abroad. We provide training on food safety and hygiene management to our employees and upon completion of that training, they are allowed to work with us. Following is a brief list of our most sophisticated modern equipment
		</p>
		<div class="col-md-12">
			<div class="col-md-4">
				<div class="swin-widget widget-categories">
					<div class="widget-body widget-content clearfix">
						<a href="javascript:void(0)" class="link"><i class="icons fa fa-angle-right"></i><span class="text">Mehedi Night</span></a>
						<a href="javascript:void(0)" class="link"><i class="icons fa fa-angle-right"></i><span class="text">Picnic</span></a>
						<a href="javascript:void(0)" class="link"><i class="icons fa fa-angle-right"></i><span class="text">Corporate Program</span></a>
						<a href="javascript:void(0)" class="link"><i class="icons fa fa-angle-right"></i><span class="text">Birthday</span></a>
						<a href="javascript:void(0)" class="link"><i class="icons fa fa-angle-right"></i><span class="text">Milad Mehfil</span></a>
					</div>
				</div>
			</div>
			
			<div class="col-md-4">
				<div class="swin-widget widget-categories">
					<div class="widget-body widget-content clearfix">
						<a href="javascript:void(0)" class="link"><i class="icons fa fa-angle-right"></i><span class="text">Wedding Party</span></a>
						<a href="javascript:void(0)" class="link"><i class="icons fa fa-angle-right"></i><span class="text">Anniversary</span></a>
						<a href="javascript:void(0)" class="link"><i class="icons fa fa-angle-right"></i><span class="text">School Programs</span></a>
						<a href="javascript:void(0)" class="link"><i class="icons fa fa-angle-right"></i><span class="text">Holud Shondha</span></a>
						<a href="javascript:void(0)" class="link"><i class="icons fa fa-angle-right"></i><span class="text">House Party</span></a>
					</div>
				</div>
			</div>
			
			<div class="col-md-4">
				<div class="swin-widget widget-categories">
					<div class="widget-body widget-content clearfix">
						
						<a href="javascript:void(0)" class="link"><i class="icons fa fa-angle-right"></i><span class="text">Re Union or Farewell</span></a>
						<a href="javascript:void(0)" class="link"><i class="icons fa fa-angle-right"></i><span class="text">Sports Event</span></a>
						<a href="javascript:void(0)" class="link"><i class="icons fa fa-angle-right"></i><span class="text">Training</span></a>
						<a href="javascript:void(0)" class="link"><i class="icons fa fa-angle-right"></i><span class="text">F&F Party</span></a>
						<a href="javascript:void(0)" class="link"><i class="icons fa fa-angle-right"></i><span class="text">AGM</span></a>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>

<div class="panel panel-default">
	<div class="panel-heading">
		<span class="my-header"><strong> Our Clients </strong></span>
	</div>
	<div class="panel-body">

		<p>
			Salsa has the experience to serve the top most corporate houses of  Bangladesh. “You name it, we did it”. We are serving our clients with dignity and most importantly kept Our Kitchen open for them 24/7. Our clients are our strength, partners, mentors and least but not the last are our inspiration to work harder day & night. 
		</p>

		<div data-item="6" class="swin-sc swin-sc-partner">
			<div class="main-slider">
				<div class="slides">
					@foreach($clients_list as $list)
					<div class="item"><img src="{{ URL::asset('images/clients/'.$list->client_image) }}" alt="salsa-partner" class="img img-responsive">
					</div>
					@endforeach
				</div>
			</div>
		</div>

	</div>
</div>

<div class="panel panel-default">
	<div class="panel-heading">
		<span class="my-header"><strong> Investments in Equipment & Training </strong></span>
	</div>
	<div class="panel-body">
		<p>
			Salsa has the most modern kitchen equipment and trained employees who have the experience working abroad. We provide training on food safety and hygiene management to our employees. 
		</p>

	</div>
</div>

<div class="panel panel-default">
	<div class="panel-heading">
		<span class="my-header"><strong> Our Employee </strong></span>
	</div>
	<div class="panel-body">

		<p>
			"Our employees are our heart ". All of our employees are working hard, day and night to serve our clients to the best level of satisfaction. Each of our employees is hard working, talented and most importantly hygiene conscious. Our employees are ready to serve our clients 24/7 anytime and anywhere they want. It does not matter whether the guest is one or thousands. 
		</p>

	</div>
</div>

@endsection
@section('javascript_content')
@endsection