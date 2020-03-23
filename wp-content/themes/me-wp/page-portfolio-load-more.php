<?php
/*
 * Template Name: Portfolio Load More Page
 */
$number_of_portfolio_items_to_display = me_wp_get_field('number_of_portfolio_items_to_display');
$portfolio_items_display_order = me_wp_get_field('portfolio_items_display_order');
$select_portfolio_categories = $_REQUEST['select_portfolio_categories']; // From Main Portfolio Page
$portfolio_layout = $_REQUEST['portfolio_layout'];
if($select_portfolio_categories != 'no_cat'){
    $expo_cats = explode(',',$select_portfolio_categories);
} else {
    $expo_cats = '';
}
$previously_loaded_posts = $_REQUEST['number_of_posts'];
if(is_array($expo_cats)){
    $categories = get_terms( 'me_genre', array(
        'orderby'    => 'count',
        'hide_empty' => 1,
        'include'    => $expo_cats
    ) );
}else{
    $categories = get_terms( 'me_genre', array(
        'orderby'    => 'count',
        'hide_empty' => 1
    ) );
} $portfolio_term_array = array();
foreach($categories as $cat) {
    $portfolio_term_array[] = $cat->slug;
}
$portfolio = array(
    'post_type' => 'portfolio',
    'posts_per_page' => -1,
    'order' => $portfolio_items_display_order,
    'tax_query' => array(
        array(
            'taxonomy' => 'me_genre',
            'field'    => 'slug',
            'terms'    => $portfolio_term_array,
        ),
    ),
);
$portfolio_loop = new WP_Query($portfolio); ?>
    <!-- BLOCK -->
<?php $portfolio_count = 1;
$z = 0;
$block = 1;
while ( $portfolio_loop->have_posts() ) : $portfolio_loop->the_post();
    $count_posts = wp_count_posts();
    $pub_posts = $count_posts->publish;
    $published_posts = $pub_posts - $previously_loaded_posts;
    $portfolio_item_width = me_wp_get_field('portfolio_item_width');
    $portfolio_page_layout = me_wp_get_field('portfolio_layout');
    if($portfolio_page_layout == 'layout-one' || $portfolio_page_layout == 'layout-two' || $portfolio_page_layout == 'layout-three'){
        $link_class = '';
    } else {
        $link_class = 'cbp-singlePage';
    }
    $terms = get_the_terms(get_the_ID(), 'me_genre');
    if($portfolio_loop->current_post >= $previously_loaded_posts){ ?>
        <?php if($portfolio_count == 1){ ?>
            <div class="cbp-loadMore-block1">
        <?php }
        $b = $portfolio_count - $z;
    if(($b == 1) && ($portfolio_count != 1)){
        $block++; ?>
        <div class="cbp-loadMore-block<?php echo esc_attr($block); ?>">
    <?php } ?>
        <!-- Item -->
        <?php if($portfolio_layout == '2-col'){ ?>
            <div class="cbp-item portfolio-item <?php echo esc_attr($portfolio_item_width).' '; foreach ($terms as $ter){ echo esc_attr($ter->slug). ' '; } ?>">
                <article>
                    <div class="portfolio-image">
                        <?php if(has_post_thumbnail()){
                            the_post_thumbnail();
                        } ?>
                        <div class="portfolio-overlay"> </div>
                        <div class="position-bottom">
                            <?php if(has_post_thumbnail()){ ?>
                                <a href="<?php echo me_feature_image_url(get_the_ID()); ?>" class="cbp-lightbox icon" data-title="<?php the_title(); ?>">
                                    <i class="icon-magnifier"></i>
                                </a>
                            <?php } ?>
                            <p>
                                <?php $term_counter = 0;
                                $len = count($terms);
                                foreach ($terms as $ter){
                                    if ($term_counter == $len - 1) {
                                        echo esc_attr($ter->name);
                                    } else {
                                        echo esc_attr($ter->name). ', ';
                                    }
                                    $term_counter++;
                                } ?>
                            </p>
                            <h4><a href="<?php the_permalink(); ?>" class="<?php echo esc_attr($link_class); ?>" rel="nofollow"><?php the_title(); ?></a></h4>
                        </div>
                    </div>
                </article>
            </div>
        <?php } elseif($portfolio_layout == '3-col-space'){ ?>
            <div class="cbp-item portfolio-item <?php echo esc_attr($portfolio_item_width).' '; foreach ($terms as $ter){ echo esc_attr($ter->slug). ' '; } ?>">
                <article>
                    <div class="portfolio-image">
                        <?php if(has_post_thumbnail()){
                            the_post_thumbnail();
                        } ?>
                        <div class="portfolio-overlay">
                            <div class="position-center-center">
                                <?php if(has_post_thumbnail()){ ?>
                                    <a href="<?php echo me_feature_image_url(get_the_ID()); ?>" class="cbp-lightbox icon" data-title="<?php the_title(); ?>">
                                        <i class="icon-magnifier"></i>
                                    </a>
                                <?php } ?>
                                <h4><a href="<?php the_permalink(); ?>" class="<?php echo esc_attr($link_class); ?>" rel="nofollow"><?php the_title(); ?></a></h4>
                                <p><?php $term_counter = 0;
                                    $len = count($terms);
                                    foreach ($terms as $ter){
                                        if ($term_counter == $len - 1) {
                                            echo esc_attr($ter->name);
                                        } else {
                                            echo esc_attr($ter->name). ', ';
                                        }
                                        $term_counter++;
                                    } ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        <?php } elseif($portfolio_layout == '3-col-no-space'){ ?>
            <div class="cbp-item portfolio-item <?php echo esc_attr($portfolio_item_width).' '; foreach ($terms as $ter){ echo esc_attr($ter->slug). ' '; } ?>">
                <article>
                    <div class="portfolio-image">
                        <?php if(has_post_thumbnail()){
                            the_post_thumbnail();
                        } ?>
                        <div class="portfolio-overlay"></div>
                        <div class="position-bottom">
                            <?php if(has_post_thumbnail()){ ?>
                                <a href="<?php echo me_feature_image_url(get_the_ID()); ?>" class="cbp-lightbox icon" data-title="<?php the_title(); ?>">
                                    <i class="icon-magnifier"></i>
                                </a>
                            <?php } ?>
                            <p>
                                <?php $term_counter = 0;
                                $len = count($terms);
                                foreach ($terms as $ter){
                                    if ($term_counter == $len - 1) {
                                        echo esc_attr($ter->name);
                                    } else {
                                        echo esc_attr($ter->name). ', ';
                                    }
                                    $term_counter++;
                                } ?>
                            </p>
                            <h4>
                                <a href="<?php the_permalink(); ?>" class="<?php echo esc_attr($link_class); ?>" rel="nofollow"><?php the_title(); ?></a>
                            </h4>
                        </div>
                    </div>
                </article>
            </div>
        <?php } ?>
        <?php if($portfolio_count % $number_of_portfolio_items_to_display == 0) {
        $z = $portfolio_count; ?>
        </div>
    <?php }
        if($portfolio_count == $published_posts){ ?>
            </div>
        <?php }
        $portfolio_count++; ?>
    <?php }
endwhile; ?>