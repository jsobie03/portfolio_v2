<?php
/*
  * Category single post layout
  */
?>
<section class="blog blog-list-page padding-top-bot-300">
    <!-- Diagonal Top -->
    <div class="cir-tri-bg"></div>
    <div class="container">
        <!-- Blog -->
        <div class="blog-post">
            <!-- Liast Work -->
            <div class="list-work">
                <?php $count = 1;
                while(have_posts()) : the_post();
                    if($count % 2 != 0){ ?>
                        <!-- Article -->
                        <article <?php post_class(); ?>>
                            <ul class="row">
                                <!-- Img -->
                                <li class="col-md-7">
                                    <?php if(has_post_thumbnail()){
                                        the_post_thumbnail();
                                    } ?>
                                </li>
                                <!-- Text Detail -->
                                <li class="col-md-5">
                                    <div class="text-info text-left">
                                        <span class="date"><?php echo get_the_time('M d. Y'); ?></span>
                                        <span class="tags"><?php the_category(', ',''); ?></span>
                                        <a href="<?php the_permalink(); ?>" class="tittle"><?php the_title(); ?></a>
                                        <?php the_excerpt(); ?>
                                        <div class="text-center">
                                            <a href="<?php the_permalink(); ?>" class="btn-flat"><?php esc_attr_e('READ MORE','me-wp'); ?></a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </article>
                    <?php } else { ?>
                        <!-- Article -->
                        <article <?php post_class(); ?>>
                            <ul class="row">
                                <!-- Text Detail -->
                                <li class="col-md-5">
                                    <div class="text-info text-right">
                                        <span class="date"><?php echo get_the_time('M d. Y'); ?></span>
                                        <span class="tags"><?php the_tags(' ',', '); ?></span>
                                        <a href="<?php the_permalink(); ?>" class="tittle"><?php the_title(); ?></a>
                                        <?php the_excerpt(); ?>
                                        <div class="text-center">
                                            <a href="<?php the_permalink(); ?>" class="btn-flat"><?php esc_attr_e('READ MORE','me-wp'); ?></a>
                                        </div>
                                    </div>
                                </li>
                                <!-- Img -->
                                <li class="col-md-7">
                                    <?php if(has_post_thumbnail()){ ?>
                                        <img class="img-right" src="<?php echo me_feature_image_url(get_the_ID()); ?>" alt="<?php the_title(); ?>" >
                                    <?php } ?>
                                </li>
                            </ul>
                        </article>
                    <?php } $count++;
                endwhile; ?>
                <!-- Load More Work -->
                <div class="clearfix"></div>
                <div class="text-center">
                    <?php // Pagination
                    me_wp_pagination($pages = '', $range = 2); ?>
                </div>
            </div>
        </div>
    </div>
</section>