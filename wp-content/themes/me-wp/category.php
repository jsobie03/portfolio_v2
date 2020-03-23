<?php
/*
 * Category Template
 */
get_header();
$category_layout = me_wp_get_field('category_layout'); ?>
    <!-- Content -->
    <div id="content" class="inner-pages">
        <?php
        if($category_layout == '3-column'):
            get_template_part('includes/post-categories/layout','3columns');
        elseif($category_layout == 'single-post'):
            get_template_part('includes/post-categories/layout','single-post');
        else:
            get_template_part('includes/post-categories/layout','single-row');
        endif;
        ?>
    </div>
    <!-- End Content -->
<?php get_footer(); ?>