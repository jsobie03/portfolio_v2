<?php get_header();
while(have_posts()) : the_post();
    $page_layout = me_wp_get_field('page_layout');
    $hide_page_title = me_wp_get_field('hide_page_title'); ?>
    <div id="content" class="inner-pages">
    <?php if($page_layout == 'full-width'){
        the_content();
    } else{ ?>
        <section class="padding-top-200 padding-bottom-100">
            <div class="container">
                <?php if($hide_page_title != 'yes'){ ?>
                <div class="heading-block-2 text-uppercase margin-bottom-50">
                    <h5><?php the_title(); ?></h5>
                </div>
                <?php } the_content(); ?>
                <!-- Comments -->
                <?php comments_template(); ?>
            </div>
        </section>
<?php } ?>
    </div>
<?php endwhile;
get_footer(); ?>