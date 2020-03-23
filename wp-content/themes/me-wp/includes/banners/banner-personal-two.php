<?php global $me_wp_allowedtags;
$small_heading_bnr = me_wp_get_field('small_heading_bnr');
$large_heading_bnr = me_wp_get_field('large_heading_bnr');
$description_text_bnr = me_wp_get_field('description_text_bnr');
$background_image_bnr = me_wp_get_field('background_image_bnr');
$background_size_bnr = me_wp_get_field('background_size_bnr');
$background_position_bnr = me_wp_get_field('background_position_bnr');
?>
<div class="home-agency full-screen" data-bp="<?php echo esc_attr($background_position_bnr); ?>" data-bs="<?php echo esc_attr($background_size_bnr); ?>" <?php if(!empty($background_image_bnr)){ ?>data-image="<?php echo esc_url($background_image_bnr); ?>" <?php } ?>>
    <div class="position-center-center">
        <div class="container">
            <div class="ag-text">
                <?php if(!empty($small_heading_bnr)){ ?>
                    <h3 class="animate fadeInUp" data-wow-delay="0.4s"><?php echo esc_attr($small_heading_bnr); ?></h3>
                <?php } if(!empty($large_heading_bnr)){ ?>
                    <h1 class="animate fadeInUp" data-wow-delay="0.4s"><?php echo esc_attr($large_heading_bnr); ?></h1>
                <?php } if(!empty($description_text_bnr)){ ?>
                    <p class="animate fadeInUp" data-wow-delay="0.8s"><?php echo wp_kses($description_text_bnr,$me_wp_allowedtags); ?></p>
                <?php } ?>
            </div>
        </div>
    </div>
</div>