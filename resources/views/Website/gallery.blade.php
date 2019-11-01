@extends('layouts.website')
@section('css_content')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/Website_css/gallery.css') }}">
<style>
	.my-header {
		padding: 1em;
		font-size: 25px;
		font-family: 'Calibri';
	}

	@media (max-width: 480px) {
		.my-header {
			font-size: 22px;
		}
	}
	
	.modal-dialog {
		position: relative;
		display: table; /* This is important */
		overflow-y: auto;
		overflow-x: auto;
		width: auto;
		min-width: 300px;
	}

</style>
@endsection

@section('body_content_top_banner')

<div data-bottom-top="background-position: 50% 50px;" data-center="background-position: 50% 0px;" data-top-bottom="background-position: 50% -50px;" class="page-title page-product">
	<div class="container">
		<div class="title-wrapper">
			<div data-top="transform: translateY(0px);opacity:1;" data--20-top="transform: translateY(-5px);" data--50-top="transform: translateY(-15px);opacity:0.8;" data--120-top="transform: translateY(-30px);opacity:0;" data-anchor-target=".page-title" class="title">
				Gallery
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
		<span class="my-header"><strong> Photos & Videos </strong></span>
	</div>
	<div class="panel-body">
		
		<div class="modal fade" id="viewGalleryImageLargeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-body">
						<img id="show_gallery_image" width="100%" src="" />
					</div>
					<div class="modal-footer">
						<button type="button" class="swin-btn" data-dismiss="modal">
							Close
						</button>
					</div>
				</div>
			</div>
		</div>
		
		
		<div class="gallery_wrapper">
	        <div class="grid">
	        	@foreach($gallery_items as $items)
		        	@if($items->video_link==null)
			            <div class="grid-item">
			                <figure>
			                	@if($items->image=="")
			                  		<a href="javascript:void(0)">
			                  			<img src="{{ URL::asset('images/no-image-1.jpg') }}" alt="">
			                  		</a>
			                  	@else
			                  		<a href="javascript:void(0)">
			                  			<img src="{{ URL::asset('images/Gallery/'.$items->image) }}" alt="">
			                   		</a>
			                     @endif
			                  <figcaption>{{ $items->title }}</figcaption>
			                </figure>
			            </div>
			        @else
			        	<div class="grid-item">
			                <figure>
			                  	<iframe width="263" height="182" src="{{ $items->video_link }}?controls=1;showinfo=1" width="100%" height="100%" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
			                    <figcaption>{{ $items->title }}</figcaption>
			                </figure>
			            </div>
			        @endif
	            @endforeach
	        </div>
	    </div>
	    
	    <div class="col-md-12" align="center">
	    	{{ $gallery_items->links() }}
	    </div>
	    
	    
	    <!--nav aria-label="Page navigation example">
		  <ul class="pagination justify-content-center">
		    <li class="page-item disabled">
		      <a class="page-link" href="#" tabindex="-1">Previous</a>
		    </li>
		    <li class="page-item"><a class="page-link" href="#">1</a></li>
		    <li class="page-item"><a class="page-link" href="#">2</a></li>
		    <li class="page-item"><a class="page-link" href="#">3</a></li>
		    <li class="page-item">
		      <a class="page-link" href="#">Next</a>
		    </li>
		  </ul>
		</nav-->
	    
	</div>
</div>

@endsection
@section('javascript_content')
<script>
	$('img').on('click', function() {
		var sr = $(this).attr('src');
		$('#show_gallery_image').attr('src', sr);
		$('#viewGalleryImageLargeModal').modal('show');
	});
</script>
@endsection