/*$(function() {

  $('#slide-submenu').on('click', function() {
    $(this).closest('.list-group').fadeOut('slide', function() {
      $('.mini-submenu').fadeIn();
    });

  });

  $('.mini-submenu').on('click', function() {
    $(this).next('.list-group').toggle('slide');
    $('.mini-submenu').hide();
  })
})*/

$(document).ready(function() {
    var panels = $('.user-infos');
    var panelsButton = $('.dropdown-user');
    panels.hide();

    //Click dropdown
    panelsButton.click(function() {
        //get data-for attribute
        var dataFor = $(this).attr('data-for');
        //alert(dataFor);
        var idFor = $(dataFor);
		
        //current button
        var currentButton = $(this);
        
        idFor.slideToggle(400, function() {
            //Completed slidetoggle
        })
    });


    $('[data-toggle="tooltip"]').tooltip();
    
    $(".bar-icon").click(function(){
        $(".sidebar-content-panel").toggle(400, function() {});
    });
    
    
});