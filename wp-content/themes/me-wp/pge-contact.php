<?php
/*
 * Template Name: Contact Page
 */
get_header();
while(have_posts()) : the_post();
    $visit_us_str = me_wp_get_field('visit_us_str');
    $email_str_cn = me_wp_get_field('email_str_cn');

    $contact_form_shortcode_ct = me_wp_get_field('contact_form_shortcode_ct');
    $contact_address = me_wp_get_field('contact_address');
    $contact_email = me_wp_get_field('contact_email');
    $contact_phone = me_wp_get_field('contact_phone');
    $map_latitude = me_wp_get_field('map_latitude');
    $map_longitude = me_wp_get_field('map_longitude');
    $map_zoom = me_wp_get_field('map_zoom');
    $map_marker = me_wp_get_field('map_marker');
    ?>
    <!-- Content -->
    <div id="content" class="inner-pages">
        <!-- Conatct List -->
        <section class="padding-bottom-150 padding-top-150">
            <div class="container">
                <div class="row">
                    <?php if(!empty($contact_form_shortcode_ct)){ ?>
                        <div class="col-md-7">
                            <div class="contact">
                                <!-- FORM -->
                                <div id="contact_form" class="contact-form">
                                    <?php echo do_shortcode($contact_form_shortcode_ct); ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="col-md-5">
                        <div class="offc-info">
                            <ul>
                                <?php if(!empty($contact_address)){ ?>
                                    <li>
                                        <h4><?php echo esc_attr($visit_us_str); ?></h4>
                                        <p><?php echo esc_attr($contact_address); ?></p>
                                    </li>
                                <?php } if(!empty($contact_email)){ ?>
                                    <li>
                                        <h4><?php echo esc_attr($email_str_cn); ?></h4>
                                        <p><?php echo esc_attr($contact_email); ?></p>
                                    </li>
                                <?php } if(!empty($contact_phone)){ ?>
                                    <li>
                                        <h4><?php echo esc_attr($contact_phone); ?></h4>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php if(!empty($map_latitude) && !empty($map_longitude)){ ?>
            <!-- MAP -->
            <section class="map-block">
                <div class="map-wrapper" id="map-canvas" data-lat="<?php echo esc_attr($map_latitude); ?>" data-lng="<?php echo esc_attr($map_longitude); ?>" data-zoom="<?php echo esc_attr($map_zoom); ?>" data-style="1" data-marker="<?php echo esc_url($map_marker); ?>"></div>
                <div class="markers-wrapper addresses-block"> <a class="marker" data-rel="map-canvas" data-lat="<?php echo esc_attr($map_latitude); ?>" data-lng="<?php echo esc_attr($map_longitude); ?>" data-string="<?php bloginfo('name'); ?>"></a> </div>
            </section>
        <?php } ?>
    </div>
    <!-- End Content -->
<?php endwhile;
get_footer(); ?>