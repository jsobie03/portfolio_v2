<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <?php $favicon = me_wp_option("favicon");
    if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { ?>
        <link rel="icon" href="<?php echo esc_url($favicon); ?>">
    <?php } wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php $disable_site_loader = me_wp_option('disable_site_loader');
if($disable_site_loader != 1){
    $site_loader_img = me_wp_option('site_loader_img'); ?>
    <!-- Loader -->
    <div id="loader">
        <div class="position-center-center">
            <?php if(!empty($site_loader_img)){ ?>
                <img src="<?php echo esc_url($site_loader_img); ?>" alt="<?php bloginfo('name'); ?>" />
            <?php } else{ ?>
                <div class="ldr"></div>
            <?php } ?>
        </div>
    </div>
<?php }
$enable_boxed_layout = me_wp_option('enable_boxed_layout');
$boxed = '';
if($enable_boxed_layout == 1) {
    $boxed = 'class=boxed-layout';
} ?>
<!-- Page Wrapper -->
<div id="wrap" <?php echo esc_attr($boxed); ?>>
    <?php // Menu / Header Type
    if(is_home() || is_tag() || is_404() || is_author() || is_date() || is_day() || is_year() || is_month() || is_time() || is_search() || is_attachment()){
        $header_menu_type = me_wp_option('header_menu_type');
    } else {
        $header_menu_type = me_wp_get_field('header_menu_type');
    }
    if($header_menu_type == 'header-3d'):
        get_template_part('includes/headers/header','3d');
    elseif($header_menu_type == 'header-hamburg'):
        get_template_part('includes/headers/header','hamburg');
    elseif($header_menu_type == 'simple-logo'):
        get_template_part('includes/headers/header','simple-logo');
    elseif($header_menu_type == 'default-transparent'):
        get_template_part('includes/headers/header','default-transparent');
    else:
        get_template_part('includes/headers/header','default');
    endif;
    // Banner Types
    if(is_home() || is_tag() || is_404() || is_author() || is_date() || is_day() || is_year() || is_month() || is_time() || is_search() || is_attachment()){
        $select_page_banner = '';
    } else {
        $select_page_banner = me_wp_get_field('select_page_bnr');
    }
    if($select_page_banner == 'left-view'):
        get_template_part('includes/banners/banner','left-view');
    elseif($select_page_banner == 'center-view'):
        get_template_part('includes/banners/banner','center-view');
    elseif($select_page_banner == 'personal-one'):
        get_template_part('includes/banners/banner','personal-one');
    elseif($select_page_banner == 'personal-two'):
        get_template_part('includes/banners/banner','personal-two');
    elseif($select_page_banner == 'personal-three'):
        get_template_part('includes/banners/banner','personal-three');
    elseif($select_page_banner == 'personal-four'):
        get_template_part('includes/banners/banner','personal-four');
    elseif($select_page_banner == 'slider'):
        get_template_part('includes/banners/banner','slider');
    else:
    endif; ?>
    <div class="clear"></div>
    <?php if ( get_header_image() ) : ?>
        <div id="site-header">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                <img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
            </a>
        </div>
    <?php endif; ?>
    <div class="clear"></div>