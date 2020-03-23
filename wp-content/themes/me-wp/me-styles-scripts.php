<?php // Styling Options
function me_styling_typography() {
    $so = '';
    $heading_h1 = me_wp_option("heading_h1");
    $heading_h2 = me_wp_option("heading_h2");
    $heading_h3 = me_wp_option("heading_h3");
    $heading_h4 = me_wp_option("heading_h4");
    $heading_h5 = me_wp_option("heading_h5");
    $heading_h6 = me_wp_option("heading_h6");

    $menu_normal = me_wp_option("menu_normal");
    $menu_active = me_wp_option("menu_active");
    $header_bg = me_wp_option("header_bg");
    $sub_menu_bg = me_wp_option("sub_menu_bg");

    $default_color = me_wp_option("default_color");
    $body_color = me_wp_option("body_color");


    $links_normal = me_wp_option("links_normal");
    $links_hover = me_wp_option("links_hover");

    if(!empty($heading_h1)){
        $so .= "h1 {color: {$heading_h1};}";
    } if(!empty($heading_h2)){
        $so .= "h2 {color: {$heading_h2};}";
    } if(!empty($heading_h3)){
        $so .= "h3 {color: {$heading_h3};}";
    } if(!empty($heading_h4)){
        $so .= "h4 {color: {$heading_h4};}";
    } if(!empty($heading_h5)){
        $so .= "h5 {color: {$heading_h5};}";
    } if(!empty($heading_h6)){
        $so .= "h6 { color: {$heading_h6};}";
    }

    if(!empty($menu_normal)){
        $so .= "header .navbar li a,.header.light .navbar li a {color: {$menu_normal} !important;}";
    } if(!empty($menu_active)){
        $so .= "header .navbar li.active a, header .navbar li.current-menu-item a, header .navbar li.current-menu-parent a,
        header .navbar li a:hover
         {color: {$menu_active} !important;}";
        $so .= ".ownmenu .nav .dropdown-menu li a:before,.ownmenu .dropdown-menu li a:hover:before,
        header .navbar li.active a:before, header .navbar li.current-menu-item a:before, header .navbar li.current-menu-parent a:before,
        header .navbar li a:before
         {background: {$menu_active} !important;}";
    } if(!empty($header_bg)){
        $so .= "header .is-sticky .sticky,.header.light .is-sticky .sticky { background: {$header_bg} !important;}";
    } if(!empty($sub_menu_bg)){
        $so .= ".ownmenu .nav .dropdown-menu { background: {$sub_menu_bg} !important;}";
        $so .= ".ownmenu .nav .dropdown-menu:before { color: {$sub_menu_bg} !important;}";
    }

    if(!empty($default_color)){
        $so .= ".blog-list li .com-sec span i,.services-main i,.blog .post-tittle:hover,
         .blog-list-page .list-work article .tittle:hover,.btn-flat,.blog .post-normal .btn-flat,
          .contact-form button,.work-process .process-steps i,.blog .post-tittle:hover,.tabs-sec .tab-content i,
           .profile-main .profile-inn .nav.nav-pills li.active a,.testimonial .icon,
            .btn-large { color: {$default_color} !important;}";
        $so .= ".btn-large:hover,.contact-form button:hover,.testimonial .owl-controls .owl-dots div.active,
         #portfolio-slide .owl-controls .owl-dot.active,.pricing article.med,.pricing article a,
          .no-touch .cd-top:hover { background: {$default_color} !important;}";
        $so .= ".btn-large,.blog .post-normal .btn-flat,.contact-form button,.contact-form button:hover,
         .cd-top,.pricing article a,.btn-flat { border-color: {$default_color} !important;}";
        $so .= ".btn-large-1{ background: #fff !important; }";
    }
    if(!empty($body_color)){
        $so .= "body,p { color: {$body_color} !important;}";
    }

    $footer_default_bg = me_wp_option("footer_default_bg");
    $footer_default_color = me_wp_option("footer_default_color");
    $footer_diagonal_bg = me_wp_option("footer_diagonal_bg");
    $footer_diagonal_color = me_wp_option("footer_diagonal_color");
    $footer_plain_bg = me_wp_option("footer_plain_bg");
    $footer_plain_color = me_wp_option("footer_plain_color");

    if(!empty($footer_default_bg)){
        $so .= ".footer-sub.footer-one { background: {$footer_default_bg} !important;}";
    } if(!empty($footer_default_color)){
        $so .= ".footer-sub.footer-one,.footer-sub.footer-one a,.footer-sub.footer-one p,.footer.footer-sub.footer-one .rights h3 { color: {$footer_default_color} !important; }";
    }

    if(!empty($footer_diagonal_bg)){
        $so .= ".footer { background: {$footer_diagonal_bg} !important;}";
    } if(!empty($footer_diagonal_color)){
        $so .= ".footer .heading-block.white .huge-tittle,.footer .heading-block.white h6,.footer .or,.footer .rights h3,.footer,.footer a,.footer p { color: {$footer_diagonal_color} !important; }";
    }
    if(!empty($footer_plain_bg)){
        $so .= ".home-2 .footer { background: {$footer_plain_bg} !important;}";
    } if(!empty($footer_plain_color)){
        $so .= ".footer .heading-block.white .huge-tittle,.footer .heading-block.white h6,.footer .or,.footer .rights h3,.footer,.footer a,.footer p { color: {$footer_plain_color} !important; }";
    }

    if(!empty($links_normal)){
        $so .= "a { color: {$links_normal};}";
    } if(!empty($links_hover)){
        $so .= "a:hover,a:focus { color: {$links_hover};}";
    }

    // Typography
    $heading_font = me_wp_option("headings_font_face");
    $heading_weight = me_wp_option("headings_font_weight");
    $meta_font = me_wp_option("meta_font_face");
    $meta_weight = me_wp_option("meta_font_weight");
    $body_font = me_wp_option("body_font_face");
    $body_weight = me_wp_option("body_font_weight");

    $body_size = intval(me_wp_option("body_font_size"));
    $h1_size = intval(me_wp_option("h1_font_size"));
    $h2_size = intval(me_wp_option("h2_font_size"));
    $h3_size = intval(me_wp_option("h3_font_size"));
    $h4_size = intval(me_wp_option("h4_font_size"));
    $h5_size = intval(me_wp_option("h5_font_size"));
    $h6_size = intval(me_wp_option("h6_font_size"));
    $menu_size = intval(me_wp_option("menu_font_size"));
    if(!empty($heading_font)){
        $so .= "h1,h2,h3 {
            font-family: {$heading_font};
            font-weight: {$heading_weight};
        }";
    } if(!empty($meta_font)){
        $so .= "h4,h5,h6,.footer-info h6,.side-tittle,.heading h4 {
            font-family: {$meta_font};
            font-weight: {$meta_weight};
        }";
    } if(!empty($body_font)){
        $so .= "html,body,p,header .navbar li a {
            font-family: {$body_font} !important;
            font-weight: {$body_weight};
        }";
    }

    if(!empty($body_size)){
        $so .= "body,p {
            font-size: {$body_size}px;
        }";
    } if(!empty($h1_size)){
        $so .= "h1 {
            font-size: {$h1_size}px;
        }";
    } if(!empty($h2_size)){
        $so .= "h2 {
            font-size: {$h2_size}px;
        }";
    } if(!empty($h3_size)){
        $so .= "h3 {
            font-size: {$h3_size}px;
        }";
    } if(!empty($h4_size)){
        $so .= "h4 {
            font-size: {$h4_size}px;
        }";
    } if(!empty($h5_size)){
        $so .= "h5 {
            font-size: {$h5_size}px;
        }";
    } if(!empty($h6_size)){
        $so .= "h6 {
            font-size: {$h6_size}px;
        }";
    }

    if(!empty($menu_size)){
        $so .= "header .navbar li a {
            font-size: {$menu_size}px;
        }";
    }
    return $so;
}
// Adding Theme Options Styles
function me_theme_options_css(){
    $custom_css = '';
    $custom_css .= me_wp_option("custom_css");
    $footer_form_bg = me_wp_option("footer_form_bg");
    $footer_default_bg = me_wp_option("footer_default_bg");
    if(!empty($footer_form_bg)){
        $custom_css .= ".footer .cir-tri-bg{
            background: url({$footer_form_bg}) center 100px no-repeat;
        }";
        $custom_css .= ".home-2 .footer:before{
            background: url({$footer_form_bg}) top center no-repeat;
        }";
    } if(!empty($footer_default_bg)){
        $custom_css .= ".footer.footer-sub:before{
            background: url({$footer_default_bg}) top center no-repeat;
        }";
    }
    $enable_boxed_layout = me_wp_option('enable_boxed_layout');
    if($enable_boxed_layout == 1){
        $boxed_layout_bg = me_wp_option('boxed_layout_bg');
        $custom_css .= "body{
            background: url({$boxed_layout_bg})  fixed top center no-repeat;
            background-size: cover;
        }";
    }
    if(is_admin_bar_showing()){
        $custom_css .= 'header .is-sticky .sticky{top:32px !important;}';
    }
    return $custom_css;
}
function me_theme_options_styles() {
    $custom_css = '';
    $custom_css .= me_styling_typography();
    $custom_css .= me_theme_options_css();
    wp_add_inline_style( 'me-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'me_theme_options_styles' );

// Theme Options JS
function me_theme_options_js(){
    $custom_js = me_wp_option("custom_js");
    return $custom_js;
}
function me_theme_all_custom_scripts() {
    $custom_js = '';
    $custom_js .= me_theme_options_js();
    wp_add_inline_script( 'me-custom-scripts', $custom_js );
}
add_action( 'wp_enqueue_scripts', 'me_theme_all_custom_scripts' );
// Coming Soon Page Scripts
function me_coming_soon_scripts(){
    $cs = '';
    if ( is_page_template( 'pge-coming-soon.php' )) {
        $launch_date = me_wp_get_field('launch_date');
        $cs .= "
        (function(jQuery) {
        'use strict';
        jQuery('.countdown').downCount({
            date: '{$launch_date} 12:00:00' // M/D/Y
        });
    })(jQuery);
        ";
    }
    return $cs;
}
function me_theme_coming_scripts() {
    $custom_js = '';
    $custom_js .= me_coming_soon_scripts();
    wp_add_inline_script( 'me-main', $custom_js );
}
add_action( 'wp_enqueue_scripts', 'me_theme_coming_scripts' );