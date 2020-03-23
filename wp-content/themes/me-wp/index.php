<?php
/*
 * Index page template
 */
get_header(); ?>
    <!-- Content -->
    <div id="content" class="inner-pages">
        <?php
        get_template_part('includes/post-categories/layout','single-row');
        ?>
    </div>
    <!-- End Content -->
<?php get_footer(); ?>