<?php
/*
  * Coming Soon parallax background layout
  */
$coming_soon_logo = me_wp_get_field('coming_soon_logo');
$coming_soon_heading = me_wp_get_field('coming_soon_heading');
$coming_soon_small_caption = me_wp_get_field('coming_soon_small_caption');
?>
<!-- Coming Soon -->
<div class="coming-soon bg-parallax padding-top-100 padding-bottom-100 text-center">
    <div class="container">
        <?php if(!empty($coming_soon_logo)){ ?>
            <div class="avatar">
                <img src="<?php echo esc_url($coming_soon_logo); ?>" alt="<?php bloginfo('name'); ?>" >
            </div>
        <?php } ?>
        <i class="icon-clock clock-icon"></i>
        <h1 class="margin-top-40"><?php echo esc_attr($coming_soon_heading); ?></h1>
        <h6 class="font-playfair font-normal text-uppercase"><?php echo do_shortcode($coming_soon_small_caption); ?></h6>
        <!-- Timer -->
        <div class="time margin-bottom-80">
            <!-- Countdown-->
            <ul class="row countdown">
                <!--======= Days =========-->
                <li class="col-md-3">
                    <article> <span class="days"><?php esc_attr_e('00','me-wp'); ?></span>
                        <p class="days_ref"><?php esc_attr_e('Days','me-wp'); ?></p>
                    </article>
                </li>
                <!--======= Hours =========-->
                <li class="col-md-3">
                    <article> <span class="hours"><?php esc_attr_e('00','me-wp'); ?></span>
                        <p class="hours_ref"><?php esc_attr_e('Hours','me-wp'); ?></p>
                    </article>
                </li>
                <!--======= Mintes =========-->
                <li class="col-md-3">
                    <article><span class="minutes"><?php esc_attr_e('00','me-wp'); ?></span>
                        <p class="minutes_ref"><?php esc_attr_e('Minutes','me-wp'); ?></p>
                    </article>
                </li>
                <!--======= Seconds =========-->
                <li class="col-md-3">
                    <article><span class="seconds"><?php esc_attr_e('00','me-wp'); ?></span>
                        <p class="seconds_ref"><?php esc_attr_e('Seconds','me-wp'); ?></p>
                    </article>
                </li>
            </ul>
            <!-- Countdown end-->
        </div>
    </div>
</div>