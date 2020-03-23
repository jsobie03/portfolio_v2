<?php
/*
  * Portfolio single layout 1
  */
$role_portfolio = me_wp_get_field('role_portfolio');
$technology_portofolio = me_wp_get_field('technology_portofolio');
$client_portfolio = me_wp_get_field('client_portfolio');
$year_portfolio = me_wp_get_field('year_portfolio');
$project_link = me_wp_get_field('project_link');
$project_right_image = me_wp_get_field('project_right_image');

// Strings
$description_string = me_wp_get_field('description_string');
$role_string = me_wp_get_field('role_string');
$technology_string = me_wp_get_field('technology_string');
$client_string = me_wp_get_field('client_string');
$year_string = me_wp_get_field('year_string');
$launch_string = me_wp_get_field('launch_string');
?>
<!-- Portfolio -->
<section class="portfolio-details padding-top-bot-300">
    <!-- Diagonal Top -->
    <div class="cir-tri-bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <!-- Project Info -->
                <div class="project-info">
                    <?php if(!empty($description_string)){ ?>
                        <h5><?php echo esc_attr($description_string); ?></h5>
                    <?php }
                    the_content(); ?>
                    <div class="clearfix"></div>
                    <?php if(!empty($role_string)){ ?>
                        <h5><?php echo esc_attr($role_string); ?></h5>
                    <?php }
                    if(!empty($role_portfolio)){ ?>
                        <p><?php echo esc_attr($role_portfolio); ?></p>
                    <?php }
                    if(!empty($technology_string)){ ?>
                        <h5><?php echo esc_attr($technology_string); ?></h5>
                    <?php }
                    if(!empty($technology_portofolio)){ ?>
                        <p><?php echo esc_attr($technology_portofolio); ?></p>
                    <?php }
                    if(!empty($client_string)){ ?>
                        <h5><?php echo esc_attr($client_string); ?></h5>
                    <?php }
                    if(!empty($client_portfolio)){ ?>
                        <p><?php echo esc_attr($client_portfolio); ?></p>
                    <?php }
                    if(!empty($year_string)){ ?>
                        <h5><?php echo esc_attr($year_string); ?></h5>
                    <?php }
                    if(!empty($year_portfolio)){ ?>
                        <p><?php echo esc_attr($year_portfolio); ?></p>
                    <?php } ?>
                    <div class="social-icons">
                        <a target="_blank" href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title(); ?>"><i class="icon-social-facebook"></i></a>
                        <a target="_blank" href="https://twitter.com/intent/tweet?original_referer=<?php the_permalink(); ?>&amp;text=<?php the_title(); ?>&tw_p=tweetbutton&url=<?php the_permalink(); ?>&via=<?php bloginfo( 'name' ); ?>"><i class="icon-social-twitter"></i></a>
                        <a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink();?>&amp;title=<?php the_title(); ?>&amp;source=<?php bloginfo( 'name' ); ?>"><i class="fa fa-linkedin"></i></a>
                        <a target="_blank" href="https://plusone.google.com/_/+1/confirm?hl=en-US&amp;url=<?php the_permalink() ?>"><i class="fa fa-google-plus"></i></a>
                    </div>
                    <?php if(!empty($project_link)){ ?>
                        <a href="<?php echo esc_url($project_link); ?>" class="btn-large"><?php echo esc_attr($launch_string); ?></a>
                    <?php } ?>
                </div>
            </div>
            <?php if(!empty($project_right_image)){ ?>
                <!-- Project Img -->
                <div class="col-md-8">
                    <img class="img-responsive" src="<?php echo esc_url($project_right_image); ?>" alt="" >
                </div>
            <?php } ?>
        </div>
    </div>
</section>