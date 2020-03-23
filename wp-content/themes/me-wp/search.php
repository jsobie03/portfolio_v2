<?php
/*
 * Search page template
 */
get_header(); ?>
    <!-- Content -->
    <div id="content" class="inner-pages">
        <section class="padding-bottom-100">
            <div class="blog-list">
                <ul>
                    <?php if(have_posts()):
                    while(have_posts()) : the_post(); ?>
                        <!-- Blog Post -->
                        <li <?php post_class(); ?>>
                            <div class="container">
                                <a href="<?php the_permalink(); ?>" class="post-tittle"><?php the_title(); ?></a>
                                <?php the_excerpt(); ?>
                                <!-- Post link -->
                                <a href="<?php the_permalink(); ?>" class="go">
                                    <i class="lnr lnr-arrow-right"></i>
                                </a>
                            </div>
                        </li>
                    <?php endwhile;
                    else: ?>
                       <li>
                           <div class="container">
                               <h5><?php esc_attr_e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'me-wp' ); ?></h5>
                           </div>
                       </li>
                   <?php endif; ?>
                </ul>
                <div class="container">
                    <?php // Pagination
                    me_wp_pagination($pages = '', $range = 2); ?>
                </div>
            </div>
        </section>
    </div>
    <!-- End Content -->
<?php get_footer(); ?>