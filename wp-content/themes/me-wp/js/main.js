jQuery( document ).ready(function( jQuery ) {

    "use strict"

    /*-----------------------------------------------------------------------------------*/

    /* 	LOADER

     /*-----------------------------------------------------------------------------------*/

    jQuery("#loader").delay(500).fadeOut("slow");

    /*-----------------------------------------------------------------------------------*/

    /*		STICKY NAVIGATION

     /*-----------------------------------------------------------------------------------*/

    jQuery(".sticky").sticky({topSpacing:0});

    /*-----------------------------------------------------------------------------------*/

    /*  FULL SCREEN

     /*-----------------------------------------------------------------------------------*/

    jQuery('.full-screen').superslides({});

    /*-----------------------------------------------------------------------------------

     Animated progress bars

     /*-----------------------------------------------------------------------------------*/

    jQuery('.progress-bars').waypoint(function() {

            jQuery('.progress').each(function(){

                jQuery(this).find('.progress-bar').animate({

                    width:jQuery(this).attr('data-percent')

                },200);

            });},

        {

            offset: '100%',

            triggerOnce: true

        });

    /*-----------------------------------------------------------------------------------*/

    /*	ISOTOPE PORTFOLIO

     /*-----------------------------------------------------------------------------------*/

    var jQuerycontainer = jQuery('.port-wrap .items');

    jQuerycontainer.imagesLoaded(function () {

        jQuerycontainer.isotope({

            itemSelector: '.portfolio-item',

            layoutMode: 'masonry'

        });

    });

    jQuery('.portfolio-filter li a').on('click', function () {

        jQuery('.portfolio-filter li a').removeClass('active');

        jQuery(this).addClass('active');

        var selector = jQuery(this).attr('data-filter');

        jQuerycontainer.isotope({

            filter: selector

        });

        return false;

    });

    // Blog ISO

    var Postcontainer = jQuery('.iso-posts');

    Postcontainer.imagesLoaded(function () {

        Postcontainer.isotope({

            layoutMode: 'masonry'

        });

    });





// Toggle Menu on click in Header

    jQuery(".menu-shows").on('click', function(){

        jQuery(".menu-shows, .menu-shows-inner, .menu").toggleClass("active");

    });



    /*-----------------------------------------------------------------------------------*/

    /*    Parallax

     /*-----------------------------------------------------------------------------------*/

    jQuery.stellar({

        horizontalScrolling: false,

        scrollProperty: 'scroll',

        positionProperty: 'position'

    });

    /*-----------------------------------------------------------------------------------*/

    /* 	TESTIMONIAL SLIDER

     /*-----------------------------------------------------------------------------------*/

    jQuery("#testi-slide").owlCarousel({

        items : 1,

        autoplay:true,

        loop:true,

        autoplayTimeout:5000,

        autoplayHoverPause:true,

        singleItem	: true,

        navigation : false,

        navText: ["<i class='lnr lnr-arrow-left'></i>","<i class='lnr lnr-arrow-right'></i>"],

        pagination : true,

        animateOut: 'fadeOut'

    });

    /*-----------------------------------------------------------------------------------*/

    /* 	PORTFOLIO SLIDER

     /*-----------------------------------------------------------------------------------*/

    jQuery("#portfolio-slide").owlCarousel({
        items : 2,
        autoplay:true,
        loop:true,
        margin: 30,
        autoplayTimeout:5000,
        autoplayHoverPause:true,
        singleItem	: true,
        navigation : false,
        navText: ["<i class='lnr lnr-arrow-left'></i>","<i class='lnr lnr-arrow-right'></i>"],
        pagination : true,
		responsive:{
        0:{
            items:1,
        },
        800:{
            items:1,
        },

    },
        animateOut: 'fadeOut'
    });

    /*-----------------------------------------------------------------------------------

     TESTNMONIALS STYLE 1

     /*-----------------------------------------------------------------------------------*/

    jQuery('.home-slide').flexslider({

        mode: 'fade',

        auto: true

    });

    /*-----------------------------------------------------------------------------------*/

    /* 		NAV

     /*-----------------------------------------------------------------------------------*/

    jQuery('ul.nav li.dropdown').hover(function() {

        jQuery(this).find('.dropdown-menu').stop(true, true).delay(100).fadeIn(400);

    }, function() {

        jQuery(this).find('.dropdown-menu').stop(true, true).delay(500).fadeOut(100);

    });

    /*-----------------------------------------------------------------------------------*/

    /* 	ANIMATION

     /*-----------------------------------------------------------------------------------*/

    var wow = new WOW({

        boxClass:     'animate',      // animated element css class (default is wow)

        animateClass: 'animated', 	// animation css class (default is animated)

        offset:       90,          // distance to the element when triggering the animation (default is 0)

        mobile:       false        // trigger animations on mobile devices (true is default)

    });

    wow.init();

    /*-----------------------------------------------------------------------------------*/

    /*	LEFT MENU

     /*-----------------------------------------------------------------------------------*/

    jQuery(document).ready(function(jQuery){

        var jQuerylateral_menu_trigger = jQuery('#cd-menu-trigger'),

            jQuerycontent_wrapper = jQuery('.cd-main-content'),

            jQuerynavigation = jQuery('header');



        //open-close lateral menu clicking on the menu icon

        jQuerylateral_menu_trigger.on('click', function(event){

            event.preventDefault();



            jQuerylateral_menu_trigger.toggleClass('is-clicked');

            jQuerynavigation.toggleClass('lateral-menu-is-open');

            jQuerycontent_wrapper.toggleClass('lateral-menu-is-open').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){

                // firefox transitions break when parent overflow is changed, so we need to wait for the end of the trasition to give the body an overflow hidden

                jQuery('body').toggleClass('overflow-hidden');

            });

            jQuery('#cd-lateral-nav').toggleClass('lateral-menu-is-open');



            //check if transitions are not supported - i.e. in IE9

            if(jQuery('html').hasClass('no-csstransitions')) {

                jQuery('body').toggleClass('overflow-hidden');

            }

        });



        //close lateral menu clicking outside the menu itself

        jQuerycontent_wrapper.on('click', function(event){

            if( !jQuery(event.target).is('#cd-menu-trigger, #cd-menu-trigger span') ) {

                jQuerylateral_menu_trigger.removeClass('is-clicked');

                jQuerynavigation.removeClass('lateral-menu-is-open');

                jQuerycontent_wrapper.removeClass('lateral-menu-is-open').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){

                    jQuery('body').removeClass('overflow-hidden');

                });

                jQuery('#cd-lateral-nav').removeClass('lateral-menu-is-open');

                //check if transitions are not supported

                if(jQuery('html').hasClass('no-csstransitions')) {

                    jQuery('body').removeClass('overflow-hidden');

                }}

        });

        //open (or close) submenu items in the lateral menu. Close all the other open submenu items.

        jQuery('.item-has-children').children('a').on('click', function(event){

            event.preventDefault();

            jQuery(this).toggleClass('submenu-open').next('.sub-menu').slideToggle(200).end().parent('.item-has-children').siblings('.item-has-children').children('a').removeClass('submenu-open').next('.sub-menu').slideUp(200);

        });

    });

    /*-----------------------------------------------------------------------------------*/

    /*	Go TO TOP

     /*-----------------------------------------------------------------------------------*/

    var offset = 300,

    //browser window scroll (in pixels) after which the "back to top" link opacity is reduced

        offset_opacity = 1200,

    //duration of the top scrolling animation (in ms)

        scroll_top_duration = 700,

    //grab the "back to top" link

        jQueryback_to_top = jQuery('.cd-top');



//hide or show the "back to top" link

    jQuery(window).scroll(function(){

        ( jQuery(this).scrollTop() > offset ) ? jQueryback_to_top.addClass('cd-is-visible') : jQueryback_to_top.removeClass('cd-is-visible cd-fade-out');

        if( jQuery(this).scrollTop() > offset_opacity ) {

            jQueryback_to_top.addClass('cd-fade-out');

        }

    });

//smooth scroll to top

    jQueryback_to_top.on('click', function(event){

        event.preventDefault();

        jQuery('body,html').animate({

                scrollTop: 0

            }, scroll_top_duration

        );

    });

});

/*-----------------------------------------------------------------------------------*/

/* 		Active Menu Item on Page Scroll

 /*-----------------------------------------------------------------------------------*/

jQuery(window).scroll(function(event) {

    Scroll();

});

jQuery('.scroll a').click(function() {

    jQuery('html, body').animate({scrollTop: jQuery(this.hash).offset().top -0}, 1000);

    return false;

});

// User define function

function Scroll() {

    var contentTop      =   [];

    var contentBottom   =   [];

    var winTop      =   jQuery(window).scrollTop();

    var rangeTop    =   5;

    var rangeBottom =   1000;

    jQuery('nav').find('.scroll a').each(function(){

        contentTop.push( jQuery( jQuery(this).attr('href') ).offset().top);

        contentBottom.push( jQuery( jQuery(this).attr('href') ).offset().top + jQuery( jQuery(this).attr('href') ).height() );

    })

    jQuery.each( contentTop, function(i){

            if ( winTop > contentTop[i] - rangeTop ){

                jQuery('nav li.scroll')

                    .removeClass('active')

                    .eq(i).addClass('active');

            }}

    )};