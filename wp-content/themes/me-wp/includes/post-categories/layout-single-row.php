<?php
/*
 * Category Single Row Layout
 */
?>
<!-- Blog List -->
<section class="padding-bottom-100">
    <div class="blog-list">
        <ul>
            <?php while(have_posts()) : the_post(); ?>
                <!-- Blog Post -->
                <li <?php post_class(); ?>>
                    <div class="container">
                        <!-- Tags -->
                        <div class="list-tags">
                            <?php the_category(', ',''); ?>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="post-tittle"><?php the_title(); ?></a>
                        <?php the_excerpt(); ?>
                        <!-- Comment Sec -->
                        <div class="com-sec">
                            <span> <i class="icon-clock"></i> <?php echo get_the_time('d F'); ?> </span>
                            <span> <i class="icon-user"></i><?php esc_attr_e('Posted by ','me-wp'); the_author(); ?> </span>
                            <span> <i class="icon-bubble"></i><?php echo get_comments_number( '0', '1', '%' ); esc_attr_e(' Comments','me-wp'); ?></span>
                        </div>

                        <!-- Post link -->
                        <a href="<?php the_permalink(); ?>" class="go">
                            <i class="lnr lnr-arrow-right"></i>
                        </a>
                    </div>
                </li>
            <?php endwhile; ?>
        </ul>
        <div class="container">
            <?php // Pagination
            me_wp_pagination($pages = '', $range = 2); ?>
        </div>
    </div>
</section>