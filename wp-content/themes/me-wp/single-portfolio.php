<?php
/*
  * Portfolio single layouts
  */
$portfolio_layout = me_wp_get_field('portfolio_layout');
if($portfolio_layout == 'layout-one' || $portfolio_layout == 'layout-two' || $portfolio_layout == 'layout-three'){
    get_header();
} global $me_wp_allowedtags;
while(have_posts()) : the_post();
    $banner_background_image_portfolio = me_wp_get_field('banner_background_image_portfolio');
    $banner_large_heading_portfolio = me_wp_get_field('banner_large_heading_portfolio');
    $banner_small_caption_portfolio = me_wp_get_field('banner_small_caption_portfolio');
    if(!empty($banner_background_image_portfolio)){ ?>
        <div class="sub-bnr" data-image="<?php echo esc_url($banner_background_image_portfolio); ?>">
            <div class="position-center-center">
                <div class="container">
                    <div class="ag-text">
                        <?php if(!empty($banner_large_heading_portfolio)){ ?>
                            <h1><?php echo esc_attr($banner_large_heading_portfolio); ?></h1>
                        <?php } if(!empty($banner_small_caption_portfolio)){ ?>
                            <p><?php echo wp_kses($banner_small_caption_portfolio,$me_wp_allowedtags); ?></p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- Content -->
    <div id="content" class="inner-pages">
        <?php if($portfolio_layout == 'layout-two' || $portfolio_layout == 'layout-two-pop'):
            get_template_part('includes/single-portfolio/layout','two');
        elseif($portfolio_layout == 'layout-three' || $portfolio_layout == 'layout-three-pop'):
            get_template_part('includes/single-portfolio/layout','three');
        elseif($portfolio_layout == 'layout-one' || $portfolio_layout == 'layout-one-pop'):
            get_template_part('includes/single-portfolio/layout','one');
        else:
        endif; ?>
    </div>
    <!-- End Content -->
<?php endwhile;
if($portfolio_layout == 'layout-one' || $portfolio_layout == 'layout-two' || $portfolio_layout == 'layout-three'){
    get_footer();
} ?>