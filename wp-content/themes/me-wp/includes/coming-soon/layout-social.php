<?php
/*
  * Coming Soon social icons layout
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
        <h1 class="margin-top-100 text-white"><?php echo esc_attr($coming_soon_heading); ?></h1>
        <h6 class="font-normal margin-bottom-100"><?php echo do_shortcode($coming_soon_small_caption); ?></h6>
        <!-- Timer -->
        <div class="time margin-bottom-100">
            <!-- Countdown-->
            <ul class="row countdown style-2 text-white">
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
            <?php
            $facebook_coming = me_wp_get_field('facebook_coming');
            $twitter_coming = me_wp_get_field('twitter_coming');
            $dribbble_coming = me_wp_get_field('dribbble_coming');
            $linkedin_coming = me_wp_get_field('linkedin_coming');
            $pinterest_coming = me_wp_get_field('pinterest_coming');
            $instagram_coming = me_wp_get_field('instagram_coming');
            ?>
            <ul class="social">
                <?php if(!empty($facebook_coming)){ ?>
                    <li><a target="_blank" href="<?php echo esc_url($facebook_coming); ?>"><i class="icon-social-facebook"></i></a></li>
                <?php } if(!empty($twitter_coming)){ ?>
                    <li><a target="_blank" href="<?php echo esc_url($twitter_coming); ?>"><i class="icon-social-twitter"></i></a></li>
                <?php } if(!empty($dribbble_coming)){ ?>
                    <li><a target="_blank" href="<?php echo esc_url($dribbble_coming); ?>"><i class="icon-social-dribbble"></i></a></li>
                <?php } if(!empty($linkedin_coming)){ ?>
                    <li><a target="_blank" href="<?php echo esc_url($linkedin_coming); ?>"><i class="fa fa-linkedin"></i></a></li>
                <?php } if(!empty($pinterest_coming)){ ?>
                    <li><a target="_blank" href="<?php echo esc_url($pinterest_coming); ?>"><i class="fa fa-pinterest"></i></a></li>
                <?php } if(!empty($instagram_coming)){ ?>
                    <li><a target="_blank" href="<?php echo esc_url($instagram_coming); ?>"><i class="fa fa-instagram"></i></a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>