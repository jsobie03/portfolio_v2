<?php // Creating me Portfolio CPT
function me_addScripts(){
    // Register JavaScript.
    wp_register_script('cubeportfolio', plugins_url('js/jquery.cubeportfolio.min.js', __FILE__), array('jquery'));
    wp_register_script('portfolio', plugins_url('js/portfolio.js', __FILE__), array('jquery'));
    // Enqueue JavaScript.
    wp_enqueue_script('cubeportfolio');
    wp_enqueue_script('portfolio');
}
add_action('wp_enqueue_scripts','me_addScripts');
function portfolio() {
    register_post_type( 'portfolio',
        array(
            'labels' => array(
                'name' => 'Portfolio',
                'singular_name' => 'Portfolio',
                'add_new' => 'Add New',
                'add_new_item' => 'Add New Portfolio',
                'edit' => 'Edit',
                'edit_item' => 'Edit Portfolio',
                'new_item' => 'New Portfolio',
                'view' => 'View',
                'view_item' => 'View Portfolio',
                'search_items' => 'Search Portfolio',
                'not_found' => 'No Portfolio found',
                'not_found_in_trash' => 'No Portfolio found in Trash',
                'parent' => 'Parent Portfolio'
            ),

            'public' => true,
            'menu_position' => 21,
            'show_in_nav_menus' => false,
            'supports' => array( 'title','editor','thumbnail'),
            'menu_icon' => plugins_url( 'img/portfolio.png', __FILE__ ),
            'has_archive' => true,
            'exclude_from_search' => true,
        )
    );
}
add_action( 'init', 'portfolio' );
add_action( 'init', 'me_taxonomies', 0 );
function me_taxonomies() {
    register_taxonomy(
        'me_genre',
        'portfolio',
        array(
            'labels' => array(
                'name' => 'Categories',
                'add_new_item' => 'Add Portfolio Category',
                'new_item_name' => "New Portfolio Category"
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'show_in_nav_menus' => false,
            'hierarchical' => true
        )
    );
}
// Setting Custom Column For Portfolio
add_filter( 'manage_edit-portfolio_columns', 'my_edit_portfolio_columns' ) ;
function my_edit_portfolio_columns( $columns ) {
    $columns = array(
        'cb' => '<input type="checkbox" />',
        'title' => __( 'Title' ),
        'portfolio_layout' => __( 'Single Page Layout' ),
        'portfolio_item_width' => __( 'Item Width' ),
        'me_genre' => __( 'Categories' ),
        'feature_img' => __( 'Image' )
    );
    return $columns;
}
add_action( 'manage_portfolio_posts_custom_column', 'my_manage_portfolio_columns', 10, 2 );
function my_manage_portfolio_columns( $column, $post_id ) {
    global $post;
    switch( $column ) {
        case 'portfolio_layout' :
            $single_page_layout_meta = get_post_meta( $post_id, 'portfolio_layout', true );
            $single_page_layout = get_field_object( 'portfolio_layout', $post_id );
            if ( empty( $single_page_layout['choices'][$single_page_layout_meta] ) )
                echo __( 'Unknown' );
            else
                printf( __( '%s' ), $single_page_layout['choices'][$single_page_layout_meta] );
            break;
        case 'portfolio_item_width' :
            $portfolio_item_width_meta = get_post_meta( $post_id, 'portfolio_item_width', true );
            $portfolio_item_width = get_field_object( 'portfolio_item_width', $post_id );
            if ( empty( $portfolio_item_width['choices'][$portfolio_item_width_meta] ) )
                echo __( 'Unknown' );
            else
                printf( __( '%s' ), $portfolio_item_width['choices'][$portfolio_item_width_meta] );
            break;
        case 'feature_img' :
            $feature_img = me_feature_image_url($post_id);
            if ( empty( $feature_img ) )
                echo '<img src="http://placehold.it/50x50" alt=""/>';
            else
                echo '<img src="'.$feature_img.'" alt="" width="50" height="50"/>';
            break;
        case 'me_genre' :
            $terms = get_the_terms( $post_id, 'me_genre' );
            if ( !empty( $terms ) ) {
                $out = array();
                foreach ( $terms as $term ) {
                    $out[] = sprintf( '<a href="%s">%s</a>',
                        esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'me_genre' => $term->slug ), 'edit.php' ) ),
                        esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'me_genre', 'display' ) )
                    );
                }
                echo join( ', ', $out );
            }
            else {
                _e( 'No Categories.' );
            }
            break;
        default :
            break;
    }
}
// Creating Testimonial CPT
function me_testimonials() {
    register_post_type( 'me-testimonials',
        array(
            'labels' => array(
                'name' => 'Testimonials',
                'singular_name' => 'Testimonial',
                'add_new' => 'Add New',
                'add_new_item' => 'Add New Testimonial',
                'edit' => 'Edit',
                'edit_item' => 'Edit Testimonial',
                'new_item' => 'New Testimonial',
                'view' => 'View',
                'view_item' => 'View Testimonial',
                'search_items' => 'Search Testimonial',
                'not_found' => 'No Testimonial found',
                'not_found_in_trash' => 'No Testimonial found in Trash',
                'parent' => 'Parent Testimonial'
            ),

            'public' => true,
            'supports' => array( 'title','editor','thumbnail'),
            'show_in_nav_menus' => false,
            'taxonomies' => array( '' ),
            'menu_icon' => plugins_url( 'img/testimonials.png', __FILE__ ),
            'has_archive' => true,
            'exclude_from_search' => true,
        )
    );
}
add_action( 'init', 'me_testimonials' );
add_action( 'init', 'me_test_taxonomies', 0 );
function me_test_taxonomies() {
    register_taxonomy(
        'me_testimonials_genre',
        'me-testimonials',
        array(
            'labels' => array(
                'name' => 'Groups',
                'add_new_item' => 'Add New Group',
                'new_item_name' => "New Group"
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'show_in_nav_menus' => false,
            'hierarchical' => true
        )
    );
}