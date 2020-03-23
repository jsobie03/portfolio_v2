<?php
/*
 * Single Post Template
 */
get_header();
$single_banner_bg = me_wp_option('single_banner_bg');
$hide_banner_categories = me_wp_option('hide_banner_categories');
$hide_banner_comments = me_wp_option('hide_banner_comments');
$hide_complete_banner = me_wp_option('hide_complete_banner');
$hide_author = me_wp_option('hide_author');
$hide_social_share_tags = me_wp_option('hide_social_share_tags');
while(have_posts()) : the_post();
    if($hide_complete_banner != 1){ ?>
        <!--======= SU Banner =========-->
        <div class="sub-bnr-home" <?php if(!empty($single_banner_bg)) {?>data-image="<?php echo esc_url($single_banner_bg); ?>"<?php } ?>>
            <div class="position-center-center">
                <div class="container">
                    <div class="ag-text">
                        <?php if($hide_banner_categories != 1){ ?>
                            <h5><?php the_category(', ',''); ?></h5>
                        <?php } ?>
                        <h1><?php the_title(); ?></h1>
                        <?php if($hide_banner_comments != 1){ ?>
                            <span><?php echo get_the_time('F d, Y'); ?>  -  <?php echo get_comments_number( '0', '1', '%' ); esc_attr_e(' Comments','me-wp'); ?></span>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- Content -->
    <div id="content" class="inner-pages">
        <!-- Blog Details -->
        <section class="padding-top-100 padding-bottom-100">
            <div class="container">
                <div class="blog-detail">
                    <?php $hide_feature_image = me_wp_option('hide_feature_image');
                    if(has_post_thumbnail() && $hide_feature_image != 1){ ?>
                        <img src="<?php echo me_feature_image_url(get_the_ID()); ?>" class="feature-img" alt="" />
                    <?php } the_content(); ?>
                    <div class="clear"></div>
                    <?php posts_nav_link(); ?>
                    <?php wp_link_pages( array( 'before' => '<div class="page-link">' . esc_html__( 'Pages:', 'me-wp' ), 'after' => '</div>' ) ); ?>
                    <?php if(!empty($hide_social_share_tags)){ ?>
                        <!-- Share Info Blog -->
                        <div class="shr-info">
                            <div class="row">
                                <div class="col-sm-8">
                                    <h6><?php esc_attr_e('SHARE THIS:','me-wp'); ?></h6>
                                    <div class="social-icons">
                                        <a target="_blank" href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title(); ?>"><i class="icon-social-facebook"></i></a>
                                        <a target="_blank" href="https://twitter.com/intent/tweet?original_referer=<?php the_permalink(); ?>&amp;text=<?php the_title(); ?>&tw_p=tweetbutton&url=<?php the_permalink(); ?>&via=<?php bloginfo( 'name' ); ?>"><i class="icon-social-twitter"></i></a>
                                        <a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink();?>&amp;title=<?php the_title(); ?>&amp;source=<?php bloginfo( 'name' ); ?>"><i class="fa fa-linkedin"></i></a>
                                        <a target="_blank" href="https://plusone.google.com/_/+1/confirm?hl=en-US&amp;url=<?php the_permalink() ?>"><i class="fa fa-google-plus"></i></a>
                                    </div>
                                </div>
                                <?php if(has_tag()){ ?>
                                    <div class="col-sm-4">
                                        <h6><?php esc_attr_e('TAGS:','me-wp'); ?></h6>
                                        <?php the_tags(' ',', '); ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php }
                    global $me_wp_allowedtags;
                    $author_title = me_wp_get_user_field('author_title');
                    $author_skills = me_wp_get_user_field('author_skills');
                    $author_short_description = me_wp_get_user_field('author_short_description');
                    if($hide_author != 1 && !empty($author_short_description)){ ?>
                        <!-- Admin Info Blog -->
                        <div class="admin-info">
                            <div class="admin-avatar">
                                <?php echo get_avatar( get_the_author_meta( 'ID' ), 150 ); ?>
                            </div>
                            <?php if(!empty($author_title)){ ?>
                                <h5><?php echo esc_attr($author_title); ?></h5>
                            <?php } if(!empty($author_skills)){ ?>
                                <p class="margin-bottom-30"><?php echo wp_kses($author_skills,$me_wp_allowedtags); ?></p>
                            <?php } if(!empty($author_short_description)){ ?>
                                <p><?php echo wp_kses($author_short_description,$me_wp_allowedtags); ?></p>
                            <?php } ?>
                        </div>
                    <?php } ?>
                    <!-- Comments -->
                    <?php comments_template(); ?>
                </div>
            </div>
        </section>
    </div>
    <!-- End Content -->
<?php endwhile;
get_footer(); ?>