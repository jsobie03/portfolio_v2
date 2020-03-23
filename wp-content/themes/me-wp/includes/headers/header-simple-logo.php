<!-- End Header -->
<div class="logo-center">
    <a href="<?php echo esc_url(home_url('/')); ?>">
        <?php $image_logo = me_wp_option('image_logo');
        if(!empty($image_logo)){ ?>
            <img src="<?php echo esc_url($image_logo); ?>" alt="<?php bloginfo('name'); ?>">
        <?php } else{ ?>
            <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="<?php bloginfo('name'); ?>">
        <?php } ?>
    </a>
</div>