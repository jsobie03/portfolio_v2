<?php get_header(); ?>
<div id="content" class="inner-pages">
    <section class="padding-top-150">
        <div class="container">
            <div class="col-md-9 center-auto text-center">
                <?php $error_404 = me_wp_option('error_404');
                if(!empty($error_404)){
                    echo do_shortcode($error_404);
                } else{ ?>
                    <h3><?php esc_html_e('OH MY GOSH! YOU FOUND IT !!!','me-wp'); ?></h3>
                    <p><?php esc_html_e("Looks like the page you're trying to visit doesn't exist. Please check the URL and try your luck again.","me-wp"); ?></p>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-flat margin-top-40 margin-bottom-100"><?php esc_html_e('TAKE ME  HOME','me-wp'); ?></a>
                <?php } ?>
            </div>
        </div>
    </section>
</div>
<?php get_footer(); ?>