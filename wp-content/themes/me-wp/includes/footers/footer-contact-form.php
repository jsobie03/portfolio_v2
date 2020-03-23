<?php $footer_title = me_wp_option('footer_title');
$footer_title_abv_txt = me_wp_option('footer_title_abv_txt');
$footer_form_shortcode = me_wp_option('footer_form_shortcode');
$footer_email = me_wp_option('footer_email');
$footer_phone = me_wp_option('footer_phone');
$footer_description_txt = me_wp_option('footer_description_txt');

$facebook = me_wp_option('facebook');
$twitter = me_wp_option('twitter');
$dribbble = me_wp_option('dribbble');
$google = me_wp_option('google');
$linkedin = me_wp_option('linkedin');
$pinterest = me_wp_option('pinterest');
$instagram = me_wp_option('instagram');
$youtube = me_wp_option('youtube');
if(is_home() || is_tag() || is_404() || is_author() || is_date() || is_day() || is_year() || is_month() || is_time() || is_search() || is_attachment()){
    $select_footer_type = me_wp_option('select_footer_type');
} else {
    $select_footer_type = me_wp_get_field('select_footer_type');
}
if($select_footer_type == 'footer-diagonal'){
    $class = '';
} else {
    $class = 'home-2';
} ?>
<!-- Footer -->
<div class="<?php echo esc_attr($class); ?>" id="cntact">
    <footer class="footer <?php if($select_footer_type == 'footer-plain'){ echo 'padding-top-bot-300'; } ?>">
        <?php if($select_footer_type == 'footer-diagonal'){ ?>
            <!-- TOP bg Style -->
            <div class="cir-tri-bg"></div>
        <?php } ?>
        <div class="container">
            <!-- Heading Block -->
            <div class="heading-block white <?php if($select_footer_type == 'footer-plain'){ echo 'margin-top-100'; } ?>">
                <?php if(!empty($footer_title_abv_txt)){ ?>
                    <h6><?php echo esc_attr($footer_title_abv_txt); ?></h6>
                <?php } if(!empty($footer_title)){ ?>
                    <span class="huge-tittle"><?php echo esc_attr($footer_title); ?></span>
                <?php } ?>
            </div>
            <?php if(!empty($footer_form_shortcode)){ ?>
                <div class="contact">
                    <!-- FORM -->
                    <div id="contact_form" class="contact-form">
                        <?php echo do_shortcode($footer_form_shortcode); ?>
                    </div>
                </div>
                <!-- OR -->
                <div class="or"> <?php esc_attr_e('OR','me-wp'); ?> </div>
            <?php } ?>

            <!-- Rights -->
            <div class="rights col-md-9 center-auto">
                <?php if(!empty($footer_email)){ ?>
                    <a href="mailto:<?php echo esc_attr($footer_email); ?>" class="mail-to"><?php echo esc_attr($footer_email); ?></a>
                <?php } if(!empty($footer_phone)){ ?>
                    <h3><?php echo esc_attr($footer_phone); ?></h3>
                <?php } ?>
                <div class="social-icons">
                    <?php if(!empty($facebook)){ ?>
                        <a href="<?php echo esc_url($facebook); ?>"><i class="icon-social-facebook"></i></a>
                    <?php } if(!empty($twitter)){ ?>
                        <a href="<?php echo esc_url($twitter); ?>"><i class="icon-social-twitter"></i></a>
                    <?php } if(!empty($dribbble)){ ?>
                        <a href="<?php echo esc_url($dribbble); ?>"><i class="icon-social-dribbble"></i></a>
                    <?php } if(!empty($google)){ ?>
                        <a href="<?php echo esc_url($google); ?>"><i class="ion-social-googleplus-outline"></i></a>
                    <?php } if(!empty($linkedin)){ ?>
                        <a href="<?php echo esc_url($linkedin); ?>"><i class="ion-social-linkedin-outline"></i></a>
                    <?php } if(!empty($pinterest)){ ?>
                        <a href="<?php echo esc_url($pinterest); ?>"><i class="ion-social-pinterest-outline"></i></a>
                    <?php } if(!empty($instagram)){ ?>
                        <a href="<?php echo esc_url($instagram); ?>"><i class="ion-social-instagram-outline"></i></a>
                    <?php } if(!empty($youtube)){ ?>
                        <a href="<?php echo esc_url($youtube); ?>"><i class="ion-social-youtube-outline"></i></a>
                    <?php } ?>
                </div>
                <?php if(!empty($footer_description_txt)){ ?>
                    <p><?php echo esc_attr($footer_description_txt); ?></p>
                <?php } ?>
                <?php $footer_copyright = me_wp_option('footer_copyright');
                if(!empty($footer_copyright)){ ?>
                    <p class="margin-top-30">
                        <small><?php echo do_shortcode($footer_copyright); ?></small>
                    </p>
                <?php } ?>
            </div>
        </div>
    </footer>
</div>
<!-- End Footer -->