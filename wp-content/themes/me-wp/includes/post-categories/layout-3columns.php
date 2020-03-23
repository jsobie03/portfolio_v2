<?php
/*
  * Category 3 columns layout
  */
?>
<section class="blog  blog-list-page padding-top-bot-300">
    <!-- Diagonal Top -->
    <div class="cir-tri-bg"></div>
    <div class="container">
        <!-- Blog -->
        <div class="blog-post port-wrap">
            <ul class="items row">
                <?php $count = 1;
                while(have_posts()) : the_post(); ?>
                <!-- Post -->
                <li <?php post_class('portfolio-item'); ?>>
                    <article class="post-normal">
                        <?php if(has_post_thumbnail()){ ?>
                            <!-- Image -->
                            <img class="img-responsive" src="<?php echo me_feature_image_url(get_the_ID()); ?>" alt="<?php the_title(); ?>" >
                        <?php } ?>
                        <!-- Post -->
                        <span class="tag"><?php the_category(', ',''); ?></span>
                        <a href="<?php the_permalink(); ?>" class="post-tittle"><?php the_title(); ?></a>
                        <?php the_excerpt(); ?>
                        <span class="comm"><?php echo get_the_time('d M, Y'); ?> / <?php echo get_comments_number( '0', '1', '%' ); esc_attr_e(' Comments','me-wp'); ?></span>
                        <a href="<?php the_permalink(); ?>" class="btn-flat margin-top-15"><?php esc_attr_e('READ MORE','me-wp'); ?></a>
                    </article>
                </li>
                <?php if($count % 3 == 0){ ?>
                <li class="w100 clearfix">&nbsp;</li>
                <?php } $count++;
                endwhile; ?>
            </ul>
            <div class="clearfix"></div>
            <!-- Load More Work -->
            <div class="text-center margin-top-100">
                <?php // Pagination
                me_wp_pagination($pages = '', $range = 2); ?>
            </div>
        </div>
    </div>
</section>