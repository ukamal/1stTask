jQuery(function($) {
    "use strict";
    var fooday = window.fooday || {};

    /*------------------------------------------------------------------
    This file include js code for shortcode, element in main content
    -------------------------------------------------------------------*/

    fooday.mainlayoutFuntion = function() {

        // Top Slider
        $(".top-slider").slick({
            dots: false,
            arrow: true,
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            fade: true,
            speed: 1000,
            nextArrow: "<div class='next-slide'><a class='arrow-slide'><i class='fa fa-chevron-right'></i></a></div>",
            prevArrow: "<div class='prev-slide'><a class='arrow-slide'><i class='fa fa-chevron-left'></i></a></div>",
        });

        // Init Animation for top slider
        $('.top-bg-parallax, .top-bg-video').each(function(){
            var caption = $(this).find('.animated');

            caption.each(function(){
                var $this = $(this);
                if($this.attr('data-ani-delay') != '') {
                    setTimeout(function(){
                        $this.removeClass($this.attr('data-ani-out')).addClass($this.attr('data-ani-in'));
                    }, $this.attr('data-ani-delay'));
                } else {
                    $this.removeClass($this.attr('data-ani-out')).addClass($this.attr('data-ani-in'));
                }
            });
        });
        // On before slide change
        $('.top-slider').on('beforeChange', function(event, slick, currentIndex, nextIndex){
            var nextSlide = $(this).find("div[data-slick-index='"+nextIndex+"']");
            var next_caption = nextSlide.find('.animated');
            var caption_current = $(this).find('.slick-current .animated');

            caption_current.each(function(){
                var $this = $(this);
                $this.removeClass($this.attr('data-ani-in'));//.addClass($this.attr('data-ani-out'));
            });

            next_caption.each(function(){
                var $this = $(this);
                if($this.attr('data-ani-delay') != '') {
                    setTimeout(function(){
                        $this.removeClass($this.attr('data-ani-out')).addClass($this.attr('data-ani-in'));
                    }, $this.attr('data-ani-delay'));
                } else {
                    $this.removeClass($this.attr('data-ani-out')).addClass($this.attr('data-ani-in'));
                }
            });
        });
        // Auto Play Video Background
        $('.top-bg-video').each(function(){
            var $video = $(this).find('video');
            var $slide = $(this).find('.slides');
            setTimeout(function(){
                $slide.addClass('playing');
                $video[0].play();
            },3000);
        });

        //one page
        $('.home-one-page #main-nav li a').bind('click', function(event){
            var $anchor = $(this);
            $('html, body').stop().animate({
                scrollTop: ($($anchor.attr('href')).offset().top )
            }, 1000, 'easeInOutExpo');
           event.preventDefault();s
        });

        // Highlight the top nav as scrolling occurs
        $('body').scrollspy({
            target: '.main-nav-wrapper',
            offset: 50
        });

        //to top
        $('#totop').on('click', function(e){
            e.preventDefault();
            $('html, body').animate({scrollTop:0}, 'slow');
            return false;
        });

        $('.parallax-window').each(function(){
            var $this = $(this);
            var image_src = $this.attr('data-image-src');
            setTimeout(function(){
                $this.parallax({
                    imageSrc: image_src
                })
            },200);
        });
    }

    fooday.niceScroll = function() {
        // Smooth Scroll
        var nice = $("html").niceScroll({
            cursorborder:"",
            horizrailenabled:false,
            smoothscroll: true,
            scrollspeed: 100,
            mousescrollstep: 80
        });
    }

    // Set menu fixed when scroll
    fooday.menuScroll = function() {
        var window_height = $(window).height();
        $(window).bind('scroll load', function() {
            if ($(this).scrollTop() > window_height) {
                $("header").addClass("header-fixed");
                $('#totop').removeClass('zoomOut');
                $('#totop').addClass('zoomIn');
                $('#totop') .fadeIn();
            } else {
                $('#totop').addClass('zoomOut');
                $('#totop').removeClass('zoomIn');
                $('#totop').fadeOut();
                $("header").removeClass("header-fixed");
            }
        });
    }

    // Menu Hover
    fooday.menuHover = function() {

        // Using class swin-transition to check function menuOffcanvas run already or not - Avoid run double time
        $(".wrapper-content").remove('swin-transition');

        // Dropdown Hover
        $('ul#main-nav li.dropdown').hover(function() {
          $(this).addClass('open');
        }, function() {
          $(this).removeClass('open')
        });
    }

    // Menu Offcanvas for table and mobile device
    fooday.menuOffcanvas = function() {

        // Using class swin-transition to check this function run already or not - Avoid run double time
        $(".wrapper-content").addClass('swin-transition');

        // Task in Offcanvas
        function openNav() {
            $('body').addClass('offcanvas-on');
        }

        function closeNav() {
            $('body').removeClass('offcanvas-on');
        }
        $('.open-offcanvas').on('click', function(){
            openNav();
        });
        $('.close-offcanvas').on('click', function(){
            closeNav();
        });
        $('#main-nav .btn-open-dropdown').on('click',function(e){
            e.preventDefault();
            $(this).next().toggleClass('open');
        });
    }

    /*------------------------------------------------------------------
    Initialize Function
    -------------------------------------------------------------------*/
    $(document).ready(function(){

        //page loader
        var loader = new SVGLoader( document.getElementById( 'loader' ), { speedIn : 500, easingIn : mina.easeinout } );
        loader.show();

        // Main function
        fooday.mainlayoutFuntion();
        fooday.menuScroll();

        // Check Menu Style
        if ($(window).width() < 1025) {
            // active offcanvas menu
            fooday.menuOffcanvas();
        } else {
            // active hover menu
            fooday.menuHover();
            var s = skrollr.init({forceHeight: false});
        }
        new WOW().init();

        // Close loader and active Nicescroll
        setTimeout(function(){
            loader.hide();
            $("#loader").css('display','none');
            $('.pageload-overlay').css('background-color','transparent');
            //fooday.niceScroll();
        }, 800);
    });

    $( window ).resize(function() {
        if ($(window).width() < 1025) {
            if ( !$(".wrapper-content").hasClass('swin-transition') ) {
                // active offcanvas menu
                $(".wrapper-content").addClass('swin-transition');
                fooday.menuOffcanvas();
            }
        } else {
            // active hover menu
            fooday.menuHover();
        }
    });

});