jQuery(document).ready(function(){
    "use strict"
    // Comments Reply
    jQuery(".comment-reply-link").on('click',function(e) {
        e.preventDefault();
        jQuery('html,body').animate({
                scrollTop: jQuery(".add-comments").offset().top
            },
            'slow');
        var cID = jQuery(this).next().val();
        jQuery('#comment_parent').val(cID);
    });
    jQuery(".comment-reply-link").each(function(){
        jQuery(this).removeAttr('onclick');
    });
    // Generals Backgrounds
    jQuery('section,div').each(function(){
        var url = jQuery(this).attr("data-image");
        if(url){
            jQuery(this).css("background-image", "url(" + url + ")");
        }
    });
    // Sub Menu's
    jQuery('.menu-item-has-children > a').each(function(){
        jQuery(this).addClass('dropdown-toggle');
        jQuery(this).attr('data-toggle','dropdown');
    });
    jQuery('.menu-item-has-children').each(function(){
        jQuery(this).addClass('dropdown');
    });
    // Generals Backgrounds
    jQuery('section,div').each(function(){
        var url = jQuery(this).attr("data-image");
        if(url){
            jQuery(this).css("background-image", "url(" + url + ")");
        }
        var bs = jQuery(this).attr("data-bs");
        if(bs){
            jQuery(this).css("background-size", "" + bs + "");
        }
        var bp = jQuery(this).attr("data-bp");
        if(bp){
            jQuery(this).css("background-attachment", "" + bp + "");
        }
    });
});

jQuery(function ($) {
  var $window = $(window);
  var $buttonTop = $('.button-top');
  var scrollTimer;

  $buttonTop.on('click', function () {
    $('html, body').animate({
      scrollTop: 0,
    }, 400);
  });

  $window.on('scroll', function () {
    clearTimeout(scrollTimer);
    scrollTimer = setTimeout(function() {
     if ($window.scrollTop() > 100) {
        $buttonTop.addClass('button-top-visible');
      } else {
        $buttonTop.removeClass('button-top-visible');
      }         
    }, 250);
  });  
})