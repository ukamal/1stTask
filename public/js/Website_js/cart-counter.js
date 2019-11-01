var itemCount = 0;

$('.btn-add-to-card').click(function (){
	
	var cart = $('.ala-cart-class');
	var imgtodrag = $(this).parent().parent('.block-img').find("img").eq(0);
	if (imgtodrag) {
	    var imgclone = imgtodrag.clone()
	        .offset({
	        top: imgtodrag.offset().top,
	        left: imgtodrag.offset().left
	    })
	        .css({
	        'opacity': '0.5',
	            'position': 'absolute',
	            'height': '150px',
	            'width': '150px',
	            'z-index': '100'
	    })
	        .appendTo($('body'))
	        .animate({
	        'top': cart.offset().top + 10,
	            'left': cart.offset().left + 10,
	            'width': 75,
	            'height': 75
	    }, 1000, 'easeInOutExpo');
	    
	    
		//shake effect
	    /*setTimeout(function () {
	        cart.effect("shake", {
	            times: 2
	        }, 200);
	    }, 1500);*/
	
	    imgclone.animate({
	        'width': 0,
	            'height': 0
	    }, function () {
	        $(this).detach()
	    });
	}
	
	itemCount ++;
	$('#itemCount').html(itemCount).css('display', 'block');
	
}); 

$('.clear').click(function() {
  itemCount = 0;
  $('#itemCount').html('').css('display', 'none');
  $('#cartItems').html('');
}); 