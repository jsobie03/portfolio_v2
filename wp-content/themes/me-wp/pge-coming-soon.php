<?php
/*
  * Template Name: Coming Soon
  */
?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="content-type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>" />
    <!-- Favicon -->
    <?php $favicon = me_wp_option("favicon");
    if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { ?>
        <link rel="icon" href="<?php echo esc_url($favicon); ?>">
    <?php }
    wp_head(); ?>
</head>
<?php $coming_soon_layout = me_wp_get_field('coming_soon_layout');
$background_color_social = me_wp_get_field('background_color_social');
$parallax_background_image_coming = me_wp_get_field('parallax_background_image_coming'); ?>
<body <?php body_class(); ?> data-stellar-background-ratio="0.5" style="
<?php if($coming_soon_layout == 'parallax-bg'){ ?>
    background:url(<?php echo esc_url($parallax_background_image_coming); ?>) center center no-repeat;
<?php } else{ ?>
    background: <?php echo esc_attr($background_color_social); ?>;
    <?php } ?>
    ">
<!-- Page Wrapper -->
<div id="wrap">
    <?php if($coming_soon_layout == 'newsletter'):
        get_template_part('includes/coming-soon/layout','newsletter');
    elseif($coming_soon_layout == 'social-icons'):
        get_template_part('includes/coming-soon/layout','social');
    else:
        get_template_part('includes/coming-soon/layout','parallax');
    endif; ?>
</div>
<!-- End Page Wrapper -->
<?php wp_footer(); ?>
</body>
</html>