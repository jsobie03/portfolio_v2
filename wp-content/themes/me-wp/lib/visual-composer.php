<?php
// Legacy Update
function me_visual_composer_legacy_update() {
    if ( defined( 'WPB_VC_VERSION' ) && version_compare( WPB_VC_VERSION, '4.3.5', '<' ) ) {
        do_action( 'vc_before_init' );
    }
}
add_action( 'admin_init', 'me_visual_composer_legacy_update' );

/* Set Visual Composer */
// Removes tabs such as the "Design Options" from the Visual Composer Settings & page and disables automatic updates.
function me_visual_composer_set_as_theme() {
    vc_set_as_theme( true );
}
add_action( 'vc_before_init', 'me_visual_composer_set_as_theme' );
// Remove Default Shortcodes
if ( ! function_exists( 'me_visual_composer_remove_default_shortcodes' ) ) {
    function me_visual_composer_remove_default_shortcodes() {
        vc_remove_element( 'vc_pinterest' );
        vc_remove_element( 'vc_toggle' );
        vc_remove_element( 'vc_gallery' );
        vc_remove_element( 'vc_images_carousel' );
        vc_remove_element( 'vc_tabs' );
        vc_remove_element( 'vc_tour' );
        vc_remove_element( 'vc_accordion' );
        vc_remove_element( 'vc_posts_grid' );
        vc_remove_element( 'vc_carousel' );
        vc_remove_element( 'vc_posts_slider' );
        vc_remove_element( 'vc_widget_sidebar' );
        vc_remove_element( 'vc_button' );
        vc_remove_element( 'vc_cta_button' );
        vc_remove_element( 'vc_gmaps' );
        vc_remove_element( 'vc_raw_js' );
        vc_remove_element( 'vc_flickr' );
        vc_remove_element( 'vc_wp_search' );
        vc_remove_element( 'vc_wp_meta' );
        vc_remove_element( 'vc_wp_recentcomments' );
        vc_remove_element( 'vc_wp_calendar' );
        vc_remove_element( 'vc_wp_pages' );
        vc_remove_element( 'vc_wp_tagcloud' );
        vc_remove_element( 'vc_wp_custommenu' );
        vc_remove_element( 'vc_wp_posts' );
        vc_remove_element( 'vc_wp_links' );
        vc_remove_element( 'vc_wp_categories' );
        vc_remove_element( 'vc_wp_archives' );
        vc_remove_element( 'vc_wp_rss' );
        vc_remove_element( 'vc_button2' );
        vc_remove_element( 'vc_cta_button2' );
        vc_remove_element( 'vc_tta_tabs' );
        vc_remove_element( 'vc_tta_tour' );
        vc_remove_element( 'vc_tta_accordion' );
        vc_remove_element( 'vc_tta_pageable' );
        vc_remove_element( 'vc_cta' );
        vc_remove_element( 'vc_round_chart' );
        vc_remove_element( 'vc_line_chart' );
        vc_remove_element( 'vc_basic_grid' );
        vc_remove_element( 'vc_masonry_grid' );
        vc_remove_element( 'vc_acf' );
        vc_remove_element( 'vc_section' );
    }
    add_action( 'vc_before_init', 'me_visual_composer_remove_default_shortcodes' );
}
// Remove Default Templates
if ( ! function_exists( 'me_visual_composer_remove_default_templates' ) ) {
    function me_visual_composer_remove_default_templates( $data ) {
        return array();
    }
    add_filter( 'vc_load_default_templates', 'me_visual_composer_remove_default_templates' );
}
// Remove Meta Boxes
if ( ! function_exists( 'me_visual_composer_remove_meta_boxes' ) ) {
    function me_visual_composer_remove_meta_boxes() {
        if ( is_admin() ) {
            foreach ( get_post_types() as $post_type ) {
                remove_meta_box( 'vc_teaser',  $post_type, 'side' );
            }
        }
    }
    add_action( 'do_meta_boxes', 'me_visual_composer_remove_meta_boxes' );
}
// Disable Frontend Editor
if ( function_exists( 'vc_disable_frontend' ) ) {
    vc_disable_frontend();
}
// Map Shortcodes
if ( ! function_exists( 'me_visual_composer_map_shortcodes' ) ) {
    function me_visual_composer_map_shortcodes() {
        $animations = array(
            'Select' => '',
            'bounce' => 'bounce',
            'bounceIn'     => 'bounceIn',
            'flash'     => 'flash',
            'pulse'     => 'pulse',
            'rubberBand'     => 'rubberBand',
            'shake'     => 'shake',
            'swing'     => 'swing',
            'tada'     => 'tada',
            'wobble'     => 'wobble',
            'jello'     => 'jello',
            'fadeIn'     => 'fadeIn',
            'fadeInDown'     => 'fadeInDown',
            'fadeInDownBig'     => 'fadeInDownBig',
            'fadeInLeft'     => 'fadeInLeft',
            'fadeInLeftBig'     => 'fadeInLeftBig',
            'fadeInRight'     => 'fadeInRight',
            'fadeInRightBig'     => 'fadeInRightBig',
            'fadeInUp'     => 'fadeInUp',
            'fadeInUpBig'     => 'fadeInUpBig',
            'fadeOut'     => 'fadeOut',
            'fadeOutDown'     => 'fadeOutDown',
            'fadeOutDownBig'     => 'fadeOutDownBig',
            'fadeOutLeft'     => 'fadeOutLeft',
            'fadeOutLeftBig'     => 'fadeOutLeftBig',
            'fadeOutRight'     => 'fadeOutRight',
            'fadeOutRightBig'     => 'fadeOutRightBig',
            'fadeOutUp'     => 'fadeOutUp',
            'fadeOutUpBig'     => 'fadeOutUpBig',
            'slideInUp'     => 'slideInUp',
            'slideInDown'     => 'slideInDown',
            'slideInLeft'     => 'slideInLeft',
            'slideInRight'     => 'slideInRight',
            'zoomIn'     => 'zoomIn',
            'zoomInDown'     => 'zoomInDown',
            'zoomInLeft'     => 'zoomInLeft',
            'zoomInRight'     => 'zoomInRight',
            'zoomInUp'     => 'zoomInUp',
        );
        // Container
        vc_map(
            array(
                'base'            => 'container',
                'name'            => esc_html__( 'Container', 'me-wp' ),
                'weight'          => 1,
                'class'           => 'container',
                'icon'            => 'me_vc_container',
                'category'        => esc_html__( 'Me WP', 'me-wp' ),
                'description'     => esc_html__( 'Include a container in your content', 'me-wp' ),
                'as_parent'       => array( 'only' => 'simple_services,services_list,blog_posts,experiences_lists,education_lists,skill_bars,single_testimonial_box,services_box,title_block,personal_info_box,hire_me_box,portfolio,vc_raw_html,rev_slider,rev_slider_vc,vc_video,toggle_services_box,facts,feature_checklists,plain_tabs,feature_lists,feature_services,skill_bars,team_members,time_lines,blog_posts,text_services,title_block,contact_info,img_with_column,social_links,vc_single_image,simple_img_slides,pricing_table,simple_heading,testimonials,counter_box,services_box,vc_column_text,vc_separator,vc_text_separator,vc_message,vc_facebook,vc_tweetmeme,vc_googleplus,vc_progress_bar,vc_pie,contact-form-7,vc_wp_text,vc_custom_heading,vc_empty_space,vc_icon,vc_btn,vc_media_grid,vc_masonry_media_grid,vc_row'),
                'content_element' => true,
                'js_view'         => 'VcColumnView',
                'params'          => array(
                    array(
                        'param_name'  => 'class',
                        'heading'     => esc_html__( 'Class', 'me-wp' ),
                        'description' => esc_html__( '(Optional) Enter a unique class/classes.', 'me-wp' ),
                        'type'        => 'textfield'
                    )
                )
            )
        );
        // Portfolio
        vc_map(
            array(
                'base'            => 'portfolio',
                'name'            => esc_html__( 'Portfolio', 'me-wp' ),
                'class'           => '',
                'icon'            => 'me_vc_porfolio',
                'category'        => esc_html__( 'Me WP', 'me-wp' ),
                'description'     => esc_html__( 'Add portfolio to your content.', 'me-wp' ),
                'params'          => array(
                    // Portfolio Columns
                    array(
                        'param_name'  => 'columns',
                        'heading'     => esc_html__( 'Portfolio Columns', 'me-wp' ),
                        'description' => esc_html__( 'Set portfolio columns.', 'me-wp' ),
                        'type'        => 'dropdown',
                        'value'       => array(
                            'Select' => '',
                            '2 Columns With Space' => '2-col',
                            '3 Columns With Space' => '3-col-space',
                            '3 Columns No Space' => '3-col-no-space',
                            '2 Items Carousel View'     => 'carousel-view'
                        ),
                        'admin_label' => true
                    ),
                    // Portfolio Categories
                    array(
                        'param_name'  => 'portfolio_categories',
                        'heading'     => esc_html__( 'Portfolio Categories ID', 'me-wp' ),
                        'description' => esc_html__( 'Enter category ID separating by single comma else all will be displayed.', 'me-wp' ),
                        'type'        => 'textfield',
                        'admin_label' => true
                    ),
                    // Number Of Posts To display
                    array(
                        'param_name'  => 'number_of_posts',
                        'heading'     => esc_html__( 'Number Of Posts To Display', 'me-wp' ),
                        'description' => esc_html__( 'Number of portfolio items to display.', 'me-wp' ),
                        'type'        => 'textfield',
                        'admin_label' => true
                    ),
                    // Load more page
                    array(
                        'param_name'  => 'load_more_page',
                        'heading'     => esc_html__( 'Load More Page ID', 'me-wp' ),
                        'description' => esc_html__( 'Load more page ID, you can find it by editing load more page in top browser address bar e.g ?post=2, 2 is ID for that page.', 'me-wp' ),
                        'type'        => 'textfield',
                        'admin_label' => true
                    ),
                    // Display Order
                    array(
                        'param_name'  => 'order',
                        'heading'     => esc_html__( 'Display Order', 'me-wp' ),
                        'description' => esc_html__( 'Display order for portfolio items, it should be the same in load more page too else portfolio may repeats.', 'me-wp' ),
                        'type'        => 'dropdown',
                        'value'       => array(
                            'Select' => '',
                            'Ascending' => 'ASC',
                            'Descending'     => 'DESC'
                        ),
                        'admin_label' => true
                    ),
                    // Load More Text
                    array(
                        'param_name'  => 'load_more_txt',
                        'heading'     => esc_html__( 'Load More Button Text', 'me-wp' ),
                        'description' => esc_html__( 'Load more button text.', 'me-wp' ),
                        'type'        => 'textfield',
                        'admin_label' => true
                    ),
                    // Loading Button Text
                    array(
                        'param_name'  => 'loading_txt',
                        'heading'     => esc_html__( 'Loading Button Text', 'me-wp' ),
                        'description' => esc_html__( 'Loading button text.', 'me-wp' ),
                        'type'        => 'textfield',
                        'admin_label' => true
                    ),
                    // No Work Text
                    array(
                        'param_name'  => 'no_work_txt',
                        'heading'     => esc_html__( 'No Work Button Text', 'me-wp' ),
                        'description' => esc_html__( 'No work button text.', 'me-wp' ),
                        'type'        => 'textfield',
                        'admin_label' => true
                    ),
                    // Hide Filters
                    array(
                        'param_name'  => 'hide_filters',
                        'heading'     => esc_html__( 'Hide Filters', 'me-wp' ),
                        'description' => esc_html__( 'You can hide filters for portfolio.', 'me-wp' ),
                        'type'        => 'dropdown',
                        'value'       => array(
                            'Select' => '',
                            'Show' => 'show',
                            'Hide'     => 'hide'
                        ),
                        "admin_label"	=> true
                    )
                )
            )
        );
        // Hire Me Box
        vc_map(
            array(
                'base'            => 'hire_me_box',
                'name'            => esc_html__( 'Hire Me Box', 'me-wp' ),
                'class'           => '',
                'icon'            => '',
                'category'        => esc_html__( 'Me WP', 'me-wp' ),
                'description'     => esc_html__( 'Add hire me box with details to your content.', 'me-wp' ),
                'params'          => array(
                    // Heading Text
                    array(
                        'param_name'  => 'heading',
                        'heading'     => esc_html__( 'Heading', 'me-wp' ),
                        'description' => esc_html__( 'Input heading text.', 'me-wp' ),
                        'type'        => 'textfield',
                        'holder' => 'h3'
                    ),
                    // Heading Above Text
                    array(
                        'param_name'  => 'heading_above_txt',
                        'heading'     => esc_html__( 'Heading Above Text', 'me-wp' ),
                        'description' => esc_html__( 'Input heading above text.', 'me-wp' ),
                        'type'        => 'textfield',
                        'holder' => 'p'
                    ),
                    // Small Description
                    array(
                        'param_name'  => 'small_desc',
                        'heading'     => esc_html__( 'Small Description', 'me-wp' ),
                        'description' => esc_html__( 'Input small description below title.', 'me-wp' ),
                        'type'        => 'textarea',
                        "holder"	=> 'p'
                    ),
                    // Button Text
                    array(
                        'param_name'  => 'btn_text',
                        'heading'     => esc_html__( 'Button Text', 'me-wp' ),
                        'description' => esc_html__( 'Input button text.', 'me-wp' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Button Link
                    array(
                        'param_name'  => 'btn_link',
                        'heading'     => esc_html__( 'Button Link', 'me-wp' ),
                        'description' => esc_html__( 'Input button link.', 'me-wp' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                )
            )
        );
        // Personal Info Box
        vc_map(
            array(
                'base'            => 'personal_info_box',
                'name'            => esc_html__( 'Personal Info Box', 'me-wp' ),
                'class'           => '',
                'icon'            => '',
                'category'        => esc_html__( 'Me WP', 'me-wp' ),
                'description'     => esc_html__( 'Add personal info box with details to your content.', 'me-wp' ),
                'params'          => array(
                    // Heading Text
                    array(
                        'param_name'  => 'heading',
                        'heading'     => esc_html__( 'Heading', 'me-wp' ),
                        'description' => esc_html__( 'Input heading text.', 'me-wp' ),
                        'type'        => 'textfield',
                        'holder' => 'h3'
                    ),
                    // Heading Above Text
                    array(
                        'param_name'  => 'heading_above_txt',
                        'heading'     => esc_html__( 'Heading Above Text', 'me-wp' ),
                        'description' => esc_html__( 'Input heading above text.', 'me-wp' ),
                        'type'        => 'textfield',
                        'holder' => 'p'
                    ),
                    // Small Description
                    array(
                        'param_name'  => 'content',
                        'heading'     => esc_html__( 'Small Description', 'me-wp' ),
                        'description' => esc_html__( 'Input small description below title.', 'me-wp' ),
                        'type'        => 'textarea_html'
                    ),
                    // Person Image
                    array(
                        'param_name'  => 'image',
                        'heading'     => esc_html__( 'Person Image', 'me-wp' ),
                        'description' => esc_html__( 'Upload personal Image image.', 'me-wp' ),
                        'type'        => 'attach_image'
                    ),
                    // Animations
                    array(
                        'param_name'  => 'animations',
                        'heading'     => esc_html__( 'Person Image Animation type', 'me-wp' ),
                        'description' => esc_html__( 'Select animation type.', 'me-wp' ),
                        'type'        => 'dropdown',
                        'value'       => $animations,
                        "admin_label"	=> true
                    ),
                    // Animation Delay
                    array(
                        'param_name'  => 'delay',
                        'heading'     => esc_html__( 'Person Image Animation delay.', 'me-wp' ),
                        'description' => esc_html__( 'Enter numeric value only in milli-seconds.', 'me-wp' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Download Resume Text
                    array(
                        'param_name'  => 'download_btn_txt',
                        'heading'     => esc_html__( 'Download Button Text', 'me-wp' ),
                        'description' => esc_html__( 'Input download button text.', 'me-wp' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Download Resume Link
                    array(
                        'param_name'  => 'download_btn_link',
                        'heading'     => esc_html__( 'Download Button Link', 'me-wp' ),
                        'description' => esc_html__( 'Input download button link.', 'me-wp' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Hire Me Text
                    array(
                        'param_name'  => 'hire_btn_txt',
                        'heading'     => esc_html__( 'Hire Me Button Text', 'me-wp' ),
                        'description' => esc_html__( 'Input hire me button text.', 'me-wp' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Hire Me Link
                    array(
                        'param_name'  => 'hire_btn_link',
                        'heading'     => esc_html__( 'Hire Me Button Link', 'me-wp' ),
                        'description' => esc_html__( 'Input hire me button link.', 'me-wp' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Facebook
                    array(
                        'param_name'  => 'facebook',
                        'heading'     => esc_html__( 'Facebook', 'me-wp' ),
                        'description' => esc_html__( 'Input facebook link.', 'me-wp' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Twitter
                    array(
                        'param_name'  => 'twitter',
                        'heading'     => esc_html__( 'Twitter', 'me-wp' ),
                        'description' => esc_html__( 'Input twitter link.', 'me-wp' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Dribble
                    array(
                        'param_name'  => 'dribble',
                        'heading'     => esc_html__( 'Dribble', 'me-wp' ),
                        'description' => esc_html__( 'Input dribble link.', 'me-wp' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Youtube
                    array(
                        'param_name'  => 'youtube',
                        'heading'     => esc_html__( 'Youtube', 'me-wp' ),
                        'description' => esc_html__( 'Input youtube link.', 'me-wp' ),
                        'type'        => 'textfield',
                        "admin_label" => true
                    ),
                )
            )
        );
        // Title Block
        vc_map(
            array(
                'base'            => 'title_block',
                'name'            => esc_html__( 'Title Block', 'me-wp' ),
                'class'           => '',
                'icon'            => 'me_vc_feature_heading',
                'category'        => esc_html__( 'Me WP', 'me-wp' ),
                'description'     => esc_html__( 'Add simple title block to your content.', 'me-wp' ),
                'params'          => array(
                    // Heading Text
                    array(
                        'param_name'  => 'heading',
                        'heading'     => esc_html__( 'Heading', 'me-wp' ),
                        'description' => esc_html__( 'Input heading text.', 'me-wp' ),
                        'type'        => 'textfield',
                        "admin_label" => true
                    ),
                    // Heading Above Text
                    array(
                        'param_name'  => 'heading_above_txt',
                        'heading'     => esc_html__( 'Heading Above Text', 'me-wp' ),
                        'description' => esc_html__( 'Input heading above text.', 'me-wp' ),
                        'type'        => 'textfield',
                        "admin_label" => true
                    ),
                    // Title Style
                    array(
                        'param_name'  => 'title_style',
                        'heading'     => esc_html__( 'Title Style', 'me-wp' ),
                        'description' => esc_html__( 'Change title style.', 'me-wp' ),
                        'type'        => 'dropdown',
                        'value'       => array(
                            'Select' => '',
                            'Vertical' => 'vertical',
                            'Horizontal'     => 'horizontal'
                        ),
                        'admin_label' => true
                    ),
                    // Description
                    array(
                        'param_name'  => 'desc_text',
                        'heading'     => esc_html__( 'Description Text', 'me-wp' ),
                        'description' => esc_html__( 'Input description text.', 'me-wp' ),
                        'type'        => 'textarea',
                        "dependency" => array(
                            "element" => "title_style",
                            "value" => "horizontal"
                        ),
                    ),
                    // Description Width
                    array(
                        'param_name'  => 'description_width',
                        'heading'     => esc_html__( 'Description Width', 'me-wp' ),
                        'description' => esc_html__( 'Select description paragraph width.', 'me-wp' ),
                        'type'        => 'dropdown',
                        'value'       => array(
                            'Select' => '',
                            'Controlled' => 'col-md-7',
                            'Full'     => 'col-md-12'
                        ),
                        'admin_label' => true
                    ),
                    // Display Color
                    array(
                        'param_name'  => 'color',
                        'heading'     => esc_html__( 'Display Color', 'me-wp' ),
                        'description' => esc_html__( 'Select title block color.', 'me-wp' ),
                        'type'        => 'dropdown',
                        'value'       => array(
                            'Select' => '',
                            'White' => 'white',
                            'Dark'     => ''
                        ),
                        'admin_label' => true
                    ),
                )
            )
        );
        // Services Boxes
        vc_map(
            array(
                'base'            => 'services_box',
                'name'            => esc_html__( 'Services Boxes', 'me-wp' ),
                'class'           => '',
                'icon'            => '',
                'category'        => esc_html__( 'Me WP', 'me-wp' ),
                'description'     => esc_html__( 'Add service boxes with icon, heading & text. ', 'me-wp' ),
                'params'          => array(
                    // Heading
                    array(
                        'param_name'  => 'heading',
                        'heading'     => esc_html__( 'Enter heading.', 'me-wp' ),
                        'description' => esc_html__( 'Heading for the service.', 'me-wp' ),
                        'type'        => 'textfield',
                        'holder'      => 'h3'
                    ),
                    // Text Description
                    array(
                        'param_name'  => 'txt_desc',
                        'heading'     => esc_html__( 'Enter service description.', 'me-wp' ),
                        'description' => esc_html__( 'Enter large description about service.', 'me-wp' ),
                        'type'        => 'textarea',
                        'holder'      => 'div'
                    ),
                    // Icon
                    array(
                        'param_name'  => 'icon',
                        'heading'     => esc_html__( 'Icon Class', 'me-wp' ),
                        'description' => esc_html__( 'Enter icon class from: http://ionicons.com/.', 'me-wp' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Display Style
                    array(
                        'param_name'  => 'display_style',
                        'heading'     => esc_html__( 'Display Style', 'me-wp' ),
                        'description' => esc_html__( 'Select display style.', 'me-wp' ),
                        'type'        => 'dropdown',
                        'value'       => array(
                            'Select' => '',
                            'Plain' => 'services-main',
                            'Border'     => 'services-boxes'
                        ),
                        'admin_label' => true
                    ),
                    // Animations
                    array(
                        'param_name'  => 'animations',
                        'heading'     => esc_html__( 'Icon Animation type', 'me-wp' ),
                        'description' => esc_html__( 'Select animation type.', 'me-wp' ),
                        'type'        => 'dropdown',
                        'value'       => $animations,
                        "admin_label"	=> true
                    ),
                    // Animation Delay
                    array(
                        'param_name'  => 'delay',
                        'heading'     => esc_html__( 'Icon Animation delay.', 'me-wp' ),
                        'description' => esc_html__( 'Enter numeric value only in milli-seconds.', 'me-wp' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),

                )
            )
        );
        // Services List
        vc_map( array(
            "name" => esc_html__("Services List", "me-wp"),
            "base" => "services_list",
            'icon'  => '',
            "content_element" => true,
            'as_parent'       => array( 'only' => 'service_list' ),
            'category'        => esc_html__( 'Me WP', 'me-wp' ),
            "show_settings_on_create" => false,
            "js_view" => 'VcColumnView',
            'description'     => esc_html__( 'Add services list to your content.', 'me-wp' ),
        ) );
        vc_map( array(
            "name" => esc_html__("Service List", "me-wp"),
            "base" => "service_list",
            'as_child'       => array( 'only' => 'services_list' ),
            "content_element" => true,
            "params" => array(
                // Heading
                array(
                    'param_name'  => 'heading',
                    'heading'     => esc_html__( 'Service Heading', 'me-wp' ),
                    'description' => esc_html__( 'Input service large heading.', 'me-wp' ),
                    'type'        => 'textfield',
                    "admin_label"	=> true
                ),
                // Text Above Heading
                array(
                    'param_name'  => 'txt_above_heading',
                    'heading'     => esc_html__( 'Text Above Heading', 'me-wp' ),
                    'description' => esc_html__( 'Input text above heading.', 'me-wp' ),
                    'type'        => 'textfield',
                    "admin_label"	=> true
                ),
                // Description
                array(
                    'param_name'  => 'description',
                    'heading'     => esc_html__( 'Description', 'me-wp' ),
                    'description' => esc_html__( 'Input detailed text.', 'me-wp' ),
                    'type'        => 'textfield'
                )
            )
        ) );
        // Simple Services
        vc_map(
            array(
                'base'            => 'simple_services',
                'name'            => esc_html__( 'Simple Services', 'me-wp' ),
                'class'           => '',
                'icon'            => '',
                'category'        => esc_html__( 'Me WP', 'me-wp' ),
                'description'     => esc_html__( 'Add simple services to your content. ', 'me-wp' ),
                'params'          => array(
                    // Heading
                    array(
                        'param_name'  => 'heading',
                        'heading'     => esc_html__( 'Enter heading.', 'me-wp' ),
                        'description' => esc_html__( 'Heading for the service.', 'me-wp' ),
                        'type'        => 'textfield',
                        'holder'      => 'h3'
                    ),
                    // Text Description
                    array(
                        'param_name'  => 'txt_desc',
                        'heading'     => esc_html__( 'Enter service description.', 'me-wp' ),
                        'description' => esc_html__( 'Enter large description about service.', 'me-wp' ),
                        'type'        => 'textarea',
                        'holder'      => 'div'
                    ),

                )
            )
        );
        // Single Testimonial Box
        vc_map(
            array(
                'base'            => 'single_testimonial_box',
                'name'            => esc_html__( 'Single Testimonial Box', 'me-wp' ),
                'class'           => '',
                'icon'            => '',
                'category'        => esc_html__( 'Me WP', 'me-wp' ),
                'description'     => esc_html__( 'Add single testimonial box to your content. ', 'me-wp' ),
                'params'          => array(
                    // Text Description
                    array(
                        'param_name'  => 'txt_desc',
                        'heading'     => esc_html__( 'Text.', 'me-wp' ),
                        'description' => esc_html__( 'Enter details of testimonial.', 'me-wp' ),
                        'type'        => 'textarea',
                        'holder'      => 'div'
                    ),
                    // Testimonial Author
                    array(
                        'param_name'  => 'testimonial_author',
                        'heading'     => esc_html__( 'Testimonial Author', 'me-wp' ),
                        'description' => esc_html__( 'Input author name.', 'me-wp' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Testimonial Author Company
                    array(
                        'param_name'  => 'testimonial_author_company',
                        'heading'     => esc_html__( 'Testimonial Author Company', 'me-wp' ),
                        'description' => esc_html__( 'Input author company.', 'me-wp' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    )
                )
            )
        );
        // Skill Bars
        vc_map(
            array(
                'base'            => 'skill_bars',
                'name'            => esc_html__( 'Skill Bars', 'me-wp' ),
                'class'           => '',
                'icon'            => '',
                'category'        => esc_html__( 'Me WP', 'me-wp' ),
                'description'     => esc_html__( 'Add skill bars to content. ', 'me-wp' ),
                'params'          => array(
                    // Title
                    array(
                        'param_name'  => 'title',
                        'heading'     => esc_html__( 'Title.', 'me-wp' ),
                        'description' => esc_html__( 'Skill bar title', 'me-wp' ),
                        'type'        => 'textfield',
                        'holder' => 'h3'
                    ),
                    // %age Value
                    array(
                        'param_name'  => 'value',
                        'heading'     => esc_html__( 'Percentage value', 'me-wp' ),
                        'description' => esc_html__( 'Skill bar percentage value', 'me-wp' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Color
                    array(
                        'param_name'  => 'color',
                        'heading'     => esc_html__( 'Fill Color', 'me-wp' ),
                        'description' => esc_html__( 'Skill bar fill color.', 'me-wp' ),
                        'type'        => 'colorpicker',
                        "admin_label"	=> true
                    ),
                    // Animations
                    array(
                        'param_name'  => 'animations',
                        'heading'     => esc_html__( 'Animation type', 'me-wp' ),
                        'description' => esc_html__( 'Select animation type.', 'me-wp' ),
                        'type'        => 'dropdown',
                        'value'       => $animations,
                        "admin_label"	=> true
                    ),
                    // Animation Delay
                    array(
                        'param_name'  => 'delay',
                        'heading'     => esc_html__( 'Animation delay.', 'me-wp' ),
                        'description' => esc_html__( 'Enter numeric value only in milli-seconds.', 'me-wp' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),

                )
            )
        );
        // Education List
        vc_map( array(
            "name" => esc_html__("Education List", "me-wp"),
            "base" => "education_lists",
            'icon'  => '',
            "content_element" => true,
            'as_parent'       => array( 'only' => 'education_list' ),
            'category'        => esc_html__( 'Me WP', 'me-wp' ),
            "show_settings_on_create" => false,
            "js_view" => 'VcColumnView',
            'description'     => esc_html__( 'Add education lists to your content.', 'me-wp' ),
        ) );
        vc_map( array(
            "name" => esc_html__("Education List", "me-wp"),
            "base" => "education_list",
            'as_child'       => array( 'only' => 'education_lists' ),
            "content_element" => true,
            "params" => array(
                // Heading
                array(
                    'param_name'  => 'heading',
                    'heading'     => esc_html__( 'Institution Name', 'me-wp' ),
                    'description' => esc_html__( 'Input institution name.', 'me-wp' ),
                    'type'        => 'textfield',
                    "admin_label"	=> true
                ),
                // Degree
                array(
                    'param_name'  => 'degree',
                    'heading'     => esc_html__( 'Degree', 'me-wp' ),
                    'description' => esc_html__( 'Input degree.', 'me-wp' ),
                    'type'        => 'textfield',
                    "admin_label"	=> true
                ),
                // Year
                array(
                    'param_name'  => 'year',
                    'heading'     => esc_html__( 'Year', 'me-wp' ),
                    'description' => esc_html__( 'Input year value.', 'me-wp' ),
                    'type'        => 'textfield',
                    "admin_label"	=> true
                ),
                // Animations
                array(
                    'param_name'  => 'animations',
                    'heading'     => esc_html__( 'Animation type', 'me-wp' ),
                    'description' => esc_html__( 'Select animation type.', 'me-wp' ),
                    'type'        => 'dropdown',
                    'value'       => $animations,
                    "admin_label"	=> true
                ),
                // Animation Delay
                array(
                    'param_name'  => 'delay',
                    'heading'     => esc_html__( 'Animation delay.', 'me-wp' ),
                    'description' => esc_html__( 'Enter numeric value only in milli-seconds.', 'me-wp' ),
                    'type'        => 'textfield',
                    "admin_label"	=> true
                ),
            )
        ) );
        // Experiences List
        vc_map( array(
            "name" => esc_html__("Experiences List", "me-wp"),
            "base" => "experiences_lists",
            'icon'  => '',
            "content_element" => true,
            'as_parent'       => array( 'only' => 'experiences_list' ),
            'category'        => esc_html__( 'Me WP', 'me-wp' ),
            "show_settings_on_create" => false,
            "js_view" => 'VcColumnView',
            'description'     => esc_html__( 'Add experiences lists to your content.', 'me-wp' ),
        ) );
        vc_map( array(
            "name" => esc_html__("Experiences List", "me-wp"),
            "base" => "experiences_list",
            'as_child'       => array( 'only' => 'experiences_lists' ),
            "content_element" => true,
            "params" => array(
                // Company
                array(
                    'param_name'  => 'heading',
                    'heading'     => esc_html__( 'Institution Name', 'me-wp' ),
                    'description' => esc_html__( 'Input institution name.', 'me-wp' ),
                    'type'        => 'textfield',
                    "admin_label"	=> true
                ),
                // Designation
                array(
                    'param_name'  => 'designation',
                    'heading'     => esc_html__( 'Designation', 'me-wp' ),
                    'description' => esc_html__( 'Input designation.', 'me-wp' ),
                    'type'        => 'textfield',
                    "admin_label"	=> true
                ),
                // Year
                array(
                    'param_name'  => 'year',
                    'heading'     => esc_html__( 'Year', 'me-wp' ),
                    'description' => esc_html__( 'Input year value.', 'me-wp' ),
                    'type'        => 'textfield',
                    "admin_label"	=> true
                ),
                // Description
                array(
                    'param_name'  => 'description',
                    'heading'     => esc_html__( 'Description', 'me-wp' ),
                    'description' => esc_html__( 'Input description.', 'me-wp' ),
                    'type'        => 'textfield'
                ),
                // Animations
                array(
                    'param_name'  => 'animations',
                    'heading'     => esc_html__( 'Animation type', 'me-wp' ),
                    'description' => esc_html__( 'Select animation type.', 'me-wp' ),
                    'type'        => 'dropdown',
                    'value'       => $animations,
                    "admin_label"	=> true
                ),
                // Animation Delay
                array(
                    'param_name'  => 'delay',
                    'heading'     => esc_html__( 'Animation delay.', 'me-wp' ),
                    'description' => esc_html__( 'Enter numeric value only in milli-seconds.', 'me-wp' ),
                    'type'        => 'textfield',
                    "admin_label"	=> true
                ),
            )
        ) );
        // Hello Box
        vc_map(
            array(
                'base'            => 'hello_box',
                'name'            => esc_html__( 'Hello Box', 'me-wp' ),
                'class'           => '',
                'icon'            => '',
                'category'        => esc_html__( 'Me WP', 'me-wp' ),
                'description'     => esc_html__( 'Add detailed personal box to your content. ', 'me-wp' ),
                'params'          => array(
                    // Title
                    array(
                        'param_name'  => 'title',
                        'heading'     => esc_html__( 'Title.', 'me-wp' ),
                        'description' => esc_html__( 'Add main title.', 'me-wp' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Title Above Text
                    array(
                        'param_name'  => 'title_abv_txt',
                        'heading'     => esc_html__( 'Title Above Text', 'me-wp' ),
                        'description' => esc_html__( 'Input text above title.', 'me-wp' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Content
                    array(
                        'param_name'  => 'content',
                        'heading'     => esc_html__( 'Content', 'me-wp' ),
                        'description' => esc_html__( 'Add description text.', 'me-wp' ),
                        'type'        => 'textarea_html'
                    ),
                    // Personal Image
                    array(
                        'param_name'  => 'image',
                        'heading'     => esc_html__( 'Personal Image', 'me-wp' ),
                        'description' => esc_html__( 'Choose to upload image.', 'me-wp' ),
                        'type'        => 'attach_image'
                    ),
                    // Animations
                    array(
                        'param_name'  => 'animations',
                        'heading'     => esc_html__( 'Image Animation type', 'me-wp' ),
                        'description' => esc_html__( 'Select animation type.', 'me-wp' ),
                        'type'        => 'dropdown',
                        'value'       => $animations,
                        "admin_label"	=> true
                    ),
                    // Animation Delay
                    array(
                        'param_name'  => 'delay',
                        'heading'     => esc_html__( 'Image Animation delay.', 'me-wp' ),
                        'description' => esc_html__( 'Enter numeric value only in milli-seconds.', 'me-wp' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Display Style
                    array(
                        'param_name'  => 'display_style',
                        'heading'     => esc_html__( 'Display Style', 'me-wp' ),
                        'description' => esc_html__( 'Select display style.', 'me-wp' ),
                        'type'        => 'dropdown',
                        'value'       => array(
                            'Select' => '',
                            'Plain' => 'plain',
                            'Diagonal'     => 'diagonal'
                        ),
                        'admin_label' => true
                    ),
                    // Background Image
                    array(
                        'param_name'  => 'bg_image',
                        'heading'     => esc_html__( 'Background Image', 'me-wp' ),
                        'description' => esc_html__( 'Choose to upload image.', 'me-wp' ),
                        'type'        => 'attach_image',
                        "dependency" => array(
                            "element" => "display_style",
                            "value" => "diagonal"
                        ),
                    )
                )
            )
        );
        // Awesome Work
        vc_map(
            array(
                'base'            => 'awesome_work',
                'name'            => esc_html__( 'Awesome Work/Portfolio', 'me-wp' ),
                'class'           => '',
                'icon'            => '',
                'category'        => esc_html__( 'Me WP', 'me-wp' ),
                'description'     => esc_html__( 'Add left/right view portfolio elements to your content. ', 'me-wp' ),
                'params'          => array(
                    // Title
                    array(
                        'param_name'  => 'title',
                        'heading'     => esc_html__( 'Title.', 'me-wp' ),
                        'description' => esc_html__( 'Add main title.', 'me-wp' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Title Above Text
                    array(
                        'param_name'  => 'title_abv_txt',
                        'heading'     => esc_html__( 'Title Above Text', 'me-wp' ),
                        'description' => esc_html__( 'Input text above title.', 'me-wp' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Portfolio Categories
                    array(
                        'param_name'  => 'portfolio_categories',
                        'heading'     => esc_html__( 'Portfolio Categories ID.', 'me-wp' ),
                        'description' => esc_html__( 'Input your portfolio category ID separating by single comma.', 'me-wp' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Number Of Posts To display
                    array(
                        'param_name'  => 'number_of_posts',
                        'heading'     => esc_html__( 'Number Of Posts To Display', 'me-wp' ),
                        'description' => esc_html__( 'Number of portfolio items to display.', 'me-wp' ),
                        'type'        => 'textfield',
                        'admin_label' => true
                    ),
                    // Display Order
                    array(
                        'param_name'  => 'order',
                        'heading'     => esc_html__( 'Display Order', 'me-wp' ),
                        'description' => esc_html__( 'Display order for portfolio items.', 'me-wp' ),
                        'type'        => 'dropdown',
                        'value'       => array(
                            'Select' => '',
                            'Ascending' => 'ASC',
                            'Descending'     => 'DESC'
                        ),
                        'admin_label' => true
                    ),
                    // View More Button Text
                    array(
                        'param_name'  => 'view_more_btn_txt',
                        'heading'     => esc_html__( 'View More Button Text', 'me-wp' ),
                        'description' => esc_html__( 'Leave empty if not required.', 'me-wp' ),
                        'type'        => 'textfield',
                        'admin_label' => true
                    ),
                    // View More Button Link
                    array(
                        'param_name'  => 'view_more_btn_link',
                        'heading'     => esc_html__( 'View More Button Link', 'me-wp' ),
                        'description' => esc_html__( 'Input complete URL.', 'me-wp' ),
                        'type'        => 'textfield'
                    ),
                )
            )
        );
        // Process Box
        vc_map(
            array(
                'base'            => 'process_box',
                'name'            => esc_html__( '4 Process Box', 'me-wp' ),
                'class'           => '',
                'icon'            => '',
                'category'        => esc_html__( 'Me WP', 'me-wp' ),
                'description'     => esc_html__( 'Add process box to your content. ', 'me-wp' ),
                'params'          => array(
                    // Title
                    array(
                        'param_name'  => 'title',
                        'heading'     => esc_html__( 'Title.', 'me-wp' ),
                        'description' => esc_html__( 'Add main title.', 'me-wp' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Title Above Text
                    array(
                        'param_name'  => 'title_abv_txt',
                        'heading'     => esc_html__( 'Title Above Text', 'me-wp' ),
                        'description' => esc_html__( 'Input text above title.', 'me-wp' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Process 1 Heading
                    array(
                        'param_name'  => 'process_heading_1',
                        'heading'     => esc_html__( 'Process 1 Heading.', 'me-wp' ),
                        'description' => esc_html__( 'Enter heading text for process 1 box.', 'me-wp' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Process 1 Text
                    array(
                        'param_name'  => 'process_text_1',
                        'heading'     => esc_html__( 'Process 1 Text.', 'me-wp' ),
                        'description' => esc_html__( 'Enter content text for process 1 box.', 'me-wp' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Process 1 Icon
                    array(
                        'param_name'  => 'process_icon_1',
                        'heading'     => esc_html__( 'Process 1 Icon.', 'me-wp' ),
                        'description' => esc_html__( 'Choose icon from here: http://ionicons.com/.', 'me-wp' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Process 2 Heading
                    array(
                        'param_name'  => 'process_heading_2',
                        'heading'     => esc_html__( 'Process 2 Heading.', 'me-wp' ),
                        'description' => esc_html__( 'Enter heading text for process 2 box.', 'me-wp' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Process 2 Text
                    array(
                        'param_name'  => 'process_text_2',
                        'heading'     => esc_html__( 'Process 2 Text.', 'me-wp' ),
                        'description' => esc_html__( 'Enter content text for process 2 box.', 'me-wp' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Process 2 Icon
                    array(
                        'param_name'  => 'process_icon_2',
                        'heading'     => esc_html__( 'Process 2 Icon.', 'me-wp' ),
                        'description' => esc_html__( 'Choose icon from here: http://ionicons.com/.', 'me-wp' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Process 3 Heading
                    array(
                        'param_name'  => 'process_heading_3',
                        'heading'     => esc_html__( 'Process 3 Heading.', 'me-wp' ),
                        'description' => esc_html__( 'Enter heading text for process 3 box.', 'me-wp' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Process 3 Text
                    array(
                        'param_name'  => 'process_text_3',
                        'heading'     => esc_html__( 'Process 3 Text.', 'me-wp' ),
                        'description' => esc_html__( 'Enter content text for process 3 box.', 'me-wp' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Process 3 Icon
                    array(
                        'param_name'  => 'process_icon_3',
                        'heading'     => esc_html__( 'Process 3 Icon.', 'me-wp' ),
                        'description' => esc_html__( 'Choose icon from here: http://ionicons.com/.', 'me-wp' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Process 4 Heading
                    array(
                        'param_name'  => 'process_heading_4',
                        'heading'     => esc_html__( 'Process 4 Heading.', 'me-wp' ),
                        'description' => esc_html__( 'Enter heading text for process 4 box.', 'me-wp' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Process 4 Text
                    array(
                        'param_name'  => 'process_text_4',
                        'heading'     => esc_html__( 'Process 4 Text.', 'me-wp' ),
                        'description' => esc_html__( 'Enter content text for process 4 box.', 'me-wp' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Process 4 Icon
                    array(
                        'param_name'  => 'process_icon_4',
                        'heading'     => esc_html__( 'Process 4 Icon.', 'me-wp' ),
                        'description' => esc_html__( 'Choose icon from here: http://ionicons.com/.', 'me-wp' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Center Image
                    array(
                        'param_name'  => 'center_img',
                        'heading'     => esc_html__( 'Center Image', 'me-wp' ),
                        'description' => esc_html__( 'Choose to upload image.', 'me-wp' ),
                        'type'        => 'attach_image'
                    ),
                    // Top Background Image
                    array(
                        'param_name'  => 'top_background_img',
                        'heading'     => esc_html__( 'Top Background Image', 'me-wp' ),
                        'description' => esc_html__( 'Choose to upload image.', 'me-wp' ),
                        'type'        => 'attach_image'
                    ),
                    // Bottom Background Image
                    array(
                        'param_name'  => 'bottom_background_img',
                        'heading'     => esc_html__( 'Bottom Background Image', 'me-wp' ),
                        'description' => esc_html__( 'Choose to upload image.', 'me-wp' ),
                        'type'        => 'attach_image'
                    ),
                    // Section Background Color
                    array(
                        'param_name'  => 'color',
                        'heading'     => esc_html__( 'Section Background Color', 'me-wp' ),
                        'description' => esc_html__( 'Select background color for process section.', 'me-wp' ),
                        'type'        => 'colorpicker',
                        "admin_label"	=> true
                    ),

                )
            )
        );
        // Plain Process
        vc_map( array(
            "name" => esc_html__("Plain Process", "me-wp"),
            "base" => "plain_processes",
            'icon'  => '',
            "content_element" => true,
            'as_parent'       => array( 'only' => 'plain_process' ),
            'category'        => esc_html__( 'Me WP', 'me-wp' ),
            "show_settings_on_create" => false,
            "js_view" => 'VcColumnView',
            'description'     => esc_html__( 'Add plain processes to your content.', 'me-wp' ),
        ) );
        vc_map( array(
            "name" => esc_html__("Plain Process", "me-wp"),
            "base" => "plain_process",
            'as_child'       => array( 'only' => 'plain_processes' ),
            "content_element" => true,
            "params" => array(
                // Heading
                array(
                    'param_name'  => 'heading',
                    'heading'     => esc_html__( 'Process Heading', 'me-wp' ),
                    'description' => esc_html__( 'Input process heading.', 'me-wp' ),
                    'type'        => 'textfield',
                    "admin_label"	=> true
                ),
                // Description
                array(
                    'param_name'  => 'description',
                    'heading'     => esc_html__( 'Description', 'me-wp' ),
                    'description' => esc_html__( 'Input description.', 'me-wp' ),
                    'type'        => 'textfield'
                ),
                // Process Icon
                array(
                    'param_name'  => 'process_icon',
                    'heading'     => esc_html__( 'Process Icon Image', 'me-wp' ),
                    'description' => esc_html__( 'Choose to upload image.', 'me-wp' ),
                    'type'        => 'attach_image'
                ),
                // Animations
                array(
                    'param_name'  => 'animations',
                    'heading'     => esc_html__( 'Animation type', 'me-wp' ),
                    'description' => esc_html__( 'Select animation type.', 'me-wp' ),
                    'type'        => 'dropdown',
                    'value'       => $animations,
                    "admin_label"	=> true
                ),
                // Animation Delay
                array(
                    'param_name'  => 'delay',
                    'heading'     => esc_html__( 'Animation delay.', 'me-wp' ),
                    'description' => esc_html__( 'Enter numeric value only in milli-seconds.', 'me-wp' ),
                    'type'        => 'textfield',
                    "admin_label"	=> true
                ),
            )
        ) );
        // Blog Posts
        vc_map(
            array(
                'base'            => 'blog_posts',
                'name'            => esc_html__( 'Blog Posts', 'me-wp' ),
                'class'           => '',
                'icon'            => 'me_vc_blog',
                'category'        => esc_html__( 'Me WP', 'me-wp' ),
                'description'     => esc_html__( 'Use to insert blog posts to your content.', 'me-wp' ),
                'params'          => array(
                    // Number Of Posts
                    array(
                        'param_name'  => 'number',
                        'heading'     => esc_html__( 'Number Of Posts', 'me-wp' ),
                        'description' => esc_html__( 'Only numeric values, default is 2.', 'me-wp' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Category ID's
                    array(
                        'param_name'  => 'cat_id',
                        'heading'     => esc_html__( 'Category IDs', 'me-wp' ),
                        'description' => esc_html__( 'Enter category IDs separating by single comma or leave empty for all.', 'me-wp' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Display Order
                    array(
                        'param_name'  => 'order',
                        'heading'     => esc_html__( 'Display Order', 'me-wp' ),
                        'description' => esc_html__( 'Set posts display order.', 'me-wp' ),
                        'type'        => 'dropdown',
                        'value'       => array(
                            'Select' => '',
                            'Ascending' => 'ASC',
                            'Descending'     => 'DESC'
                        ),
                        "admin_label"	=> true
                    ),
                    // Post Columns
                    array(
                        'param_name'  => 'post_columns',
                        'heading'     => esc_html__( 'Post Columns', 'me-wp' ),
                        'description' => esc_html__( 'Choose post columns.', 'me-wp' ),
                        'type'        => 'dropdown',
                        'value'       => array(
                            'Select' => '',
                            '2 Columns' => 'col-md-6',
                            '3 Columns' => 'col-md-4',
                            '4 Columns'     => 'col-md-3'
                        ),
                        "admin_label"	=> true
                    ),
                )
            )
        );
        // Profile Tabs
        vc_map( array(
            "name" => esc_html__("Profile Tabs Box", "me-wp"),
            "base" => "profile_tabs",
            'icon'  => '',
            'category'        => esc_html__( 'Me WP', 'me-wp' ),
            "content_element" => true,
            'as_parent'       => array( 'only' => 'profile_tab' ),
            "show_settings_on_create" => true,
            "params" => array(
                // Section Title
                array(
                    'param_name'  => 'section_title',
                    'heading'     => esc_html__( 'Section Title', 'me-wp' ),
                    'description' => esc_html__( 'Input section title text.', 'me-wp' ),
                    'type'        => 'textfield',
                    "admin_label"	=> true
                ),
                // Section Title Above Text
                array(
                    'param_name'  => 'section_title_abv_txt',
                    'heading'     => esc_html__( 'Section Title Above Text', 'me-wp' ),
                    'description' => esc_html__( 'Input text over section main title.', 'me-wp' ),
                    'type'        => 'textfield',
                    "admin_label"	=> true
                ),
                // Tab Headings
                array(
                    'param_name'  => 'tab_headings',
                    'heading'     => esc_html__( 'Tab Headings', 'me-wp' ),
                    'description' => esc_html__( 'Separate tab icon classes by double plus sign ++ like: icon-trophy ++ icon-book-open ++ icon-moustache etc. You can pick icon class from here: http://ionicons.com/', 'me-wp' ),
                    'type'        => 'textfield',
                    "admin_label"	=> true
                ),
                // Main Title
                array(
                    'param_name'  => 'title',
                    'heading'     => esc_html__( 'Top Main Title', 'me-wp' ),
                    'description' => esc_html__( 'Input main title text.', 'me-wp' ),
                    'type'        => 'textfield',
                    "admin_label"	=> true
                ),
                // Description
                array(
                    'param_name'  => 'description',
                    'heading'     => esc_html__( 'Top Description', 'me-wp' ),
                    'description' => esc_html__( 'Input description text.', 'me-wp' ),
                    'type'        => 'textarea'
                ),
                // Bottom Description
                array(
                    'param_name'  => 'bottom_description',
                    'heading'     => esc_html__( 'Bottom Description', 'me-wp' ),
                    'description' => esc_html__( 'Input description text at bottom of section.', 'me-wp' ),
                    'type'        => 'textarea'
                ),
                // Hire Me Button Text
                array(
                    'param_name'  => 'hire_btn_txt',
                    'heading'     => esc_html__( 'Hire Me Button Text', 'me-wp' ),
                    'description' => esc_html__( 'Leave empty if not required.', 'me-wp' ),
                    'type'        => 'textfield',
                    "admin_label"	=> true
                ),
                // Hire Me Button Link
                array(
                    'param_name'  => 'hire_btn_link',
                    'heading'     => esc_html__( 'Hire Me Button Link', 'me-wp' ),
                    'description' => esc_html__( 'Input complete URL.', 'me-wp' ),
                    'type'        => 'textfield'
                ),
                // Download Button Text
                array(
                    'param_name'  => 'download_btn_txt',
                    'heading'     => esc_html__( 'Download Button Text', 'me-wp' ),
                    'description' => esc_html__( 'Leave empty if not required.', 'me-wp' ),
                    'type'        => 'textfield',
                    "admin_label"	=> true
                ),
                // Download Button Link
                array(
                    'param_name'  => 'download_btn_link',
                    'heading'     => esc_html__( 'Download Button Link', 'me-wp' ),
                    'description' => esc_html__( 'Input complete URL.', 'me-wp' ),
                    'type'        => 'textfield'
                ),
                // Section Background Image
                array(
                    'param_name'  => 'section_background_img',
                    'heading'     => esc_html__( 'Section Background Image', 'me-wp' ),
                    'description' => esc_html__( 'Choose to upload image.', 'me-wp' ),
                    'type'        => 'attach_image'
                ),
            ),
            "js_view" => 'VcColumnView',
            'description'     => esc_html__( 'Add profile tabs to your content with details.', 'me-wp' ),
        ) );
        vc_map( array(
            "name" => esc_html__("Profile Tab", "me-wp"),
            "base" => "profile_tab",
            'as_child'       => array( 'only' => 'profile_tabs' ),
            "content_element" => true,
            "params" => array(
                // Description
                array(
                    'param_name'  => 'content',
                    'heading'     => esc_html__( 'Description.', 'me-wp' ),
                    'description' => esc_html__( 'Enter tabs info/description. Default layout is Un-ordered list style: http://www.w3schools.com/tags/tag_ul.asp', 'me-wp' ),
                    'type'        => 'textarea_html'
                ),
                // Tab Large Icon, On Right Side
                array(
                    'param_name'  => 'content_icon',
                    'heading'     => esc_html__( 'Content Icon', 'me-wp' ),
                    'description' => esc_html__( 'Input icon class for right side large icon, pick from here: http://ionicons.com/', 'me-wp' ),
                    'type'        => 'textfield',
                    "admin_label"	=> true
                ),
            )
        ) );
        // Client Testimonials
        vc_map(
            array(
                'base'            => 'testimonials',
                'name'            => esc_html__( 'Client Testimonials', 'me-wp' ),
                'class'           => '',
                'icon'            => 'me_vc_testimonials',
                'category'        => esc_html__( 'Me WP', 'me-wp' ),
                'description'     => esc_html__( 'Add testimonials to your content.', 'me-wp' ),
                'params'          => array(
                    // Number Of Testimonials
                    array(
                        'param_name'  => 'number',
                        'heading'     => esc_html__( 'Number Of Testimonials', 'me-wp' ),
                        'description' => esc_html__( 'Only numeric values, default is 3.', 'me-wp' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Display Order
                    array(
                        'param_name'  => 'order',
                        'heading'     => esc_html__( 'Display Order', 'me-wp' ),
                        'description' => esc_html__( 'Set testimonials display order.', 'me-wp' ),
                        'type'        => 'dropdown',
                        'value'       => array(
                            'Select' => '',
                            'Ascending' => 'ASC',
                            'Descending'     => 'DESC'
                        ),
                        "admin_label"	=> true
                    ),
                    // Group Slug
                    array(
                        'param_name'  => 'grp_slug',
                        'heading'     => esc_html__( 'Group Slug', 'me-wp' ),
                        'description' => esc_html__( 'Enter group slug or leave empty for all.', 'me-wp' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                )
            )
        );
        // Pricing Table
        vc_map(
            array(
                'base'            => 'pricing_table',
                'name'            => esc_html__( 'Pricing Table', 'me-wp' ),
                'class'           => '',
                'icon'            => '',
                'category'        => esc_html__( 'Me WP', 'me-wp' ),
                'description'     => esc_html__( 'Use to add pricing table to your content.', 'me-wp' ),
                'params'          => array(
                    // Heading
                    array(
                        'param_name'  => 'heading',
                        'heading'     => esc_html__( 'Heading', 'me-wp' ),
                        'description' => esc_html__( 'Input heading text.', 'me-wp' ),
                        'type'        => 'textfield',
                        "admin_label"   => true
                    ),
                    // Currency
                    array(
                        'param_name'  => 'currency_symbol',
                        'heading'     => esc_html__( 'Currency Symbol', 'me-wp' ),
                        'description' => esc_html__( 'Input currency symbol.', 'me-wp' ),
                        'type'        => 'textfield',
                        "admin_label"   => true
                    ),
                    // Price
                    array(
                        'param_name'  => 'price',
                        'heading'     => esc_html__( 'Price', 'me-wp' ),
                        'description' => esc_html__( 'Input price value.', 'me-wp' ),
                        'type'        => 'textfield',
                        "admin_label"   => true
                    ),
                    // Period Text
                    array(
                        'param_name'  => 'period_text',
                        'heading'     => esc_html__( 'Period Text', 'me-wp' ),
                        'description' => esc_html__( 'Input period text value.', 'me-wp' ),
                        'type'        => 'textfield',
                        "admin_label"   => true
                    ),
                    // Description
                    array(
                        'param_name'  => 'content',
                        'heading'     => esc_html__( 'Description', 'me-wp' ),
                        'description' => esc_html__( 'Input description text, use paragraph p tag for default style.', 'me-wp' ),
                        'type'        => 'textarea_html'
                    ),
                    // Style
                    array(
                        'param_name'  => 'style',
                        'heading'     => esc_html__( 'Display Style', 'me-wp' ),
                        'description' => esc_html__( 'Set display style for pricing table.', 'me-wp' ),
                        'type'        => 'dropdown',
                        'value'       => array(
                            'Select' => '',
                            'Normal' => '',
                            'Active'     => 'med'
                        ),
                        "admin_label"	=> true
                    ),
                    // Button Text
                    array(
                        'param_name'  => 'button_text',
                        'heading'     => esc_html__( 'Button Text', 'me-wp' ),
                        'description' => esc_html__( 'Input button text value.', 'me-wp' ),
                        'type'        => 'textfield',
                        "admin_label"   => true
                    ),
                    // Button Link
                    array(
                        'param_name'  => 'button_link',
                        'heading'     => esc_html__( 'Button Link', 'me-wp' ),
                        'description' => esc_html__( 'Input button link value.', 'me-wp' ),
                        'type'        => 'textfield',
                        "admin_label"   => true
                    ),
                    // Animations
                    array(
                        'param_name'  => 'animations',
                        'heading'     => esc_html__( 'Animation type', 'me-wp' ),
                        'description' => esc_html__( 'Select animation type.', 'me-wp' ),
                        'type'        => 'dropdown',
                        'value'       => $animations,
                        "admin_label"	=> true
                    ),
                    // Animation Delay
                    array(
                        'param_name'  => 'delay',
                        'heading'     => esc_html__( 'Animation delay.', 'me-wp' ),
                        'description' => esc_html__( 'Enter numeric value only in milli-seconds.', 'me-wp' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                )
            )
        );
    }
    add_action( 'vc_before_init', 'me_visual_composer_map_shortcodes' );
    // Extend container class (parents).
    if(class_exists('WPBakeryShortCodesContainer')){
        class WPBakeryShortCode_Container extends WPBakeryShortCodesContainer { }
        class WPBakeryShortCode_Education_lists extends WPBakeryShortCodesContainer { }
        class WPBakeryShortCode_Experiences_lists extends WPBakeryShortCodesContainer { }
        class WPBakeryShortCode_Profile_tabs extends WPBakeryShortCodesContainer { }
        class WPBakeryShortCode_Plain_processes extends WPBakeryShortCodesContainer { }
        class WPBakeryShortCode_Services_list extends WPBakeryShortCodesContainer { }
    }
    // Extend shortcode class (children).
    if(class_exists('WPBakeryShortCode')){
        class WPBakeryShortCode_Portfolio extends WPBakeryShortCode { }
        class WPBakeryShortCode_Hire_me_box extends WPBakeryShortCode { }
        class WPBakeryShortCode_Personal_info_box extends WPBakeryShortCode { }
        class WPBakeryShortCode_Title_block extends WPBakeryShortCode { }
        class WPBakeryShortCode_Services_box extends WPBakeryShortCode { }
        class WPBakeryShortCode_Single_testimonial_box extends WPBakeryShortCode { }
        class WPBakeryShortCode_Skill_bars extends WPBakeryShortCode { }
        class WPBakeryShortCode_Education_list extends WPBakeryShortCode { }
        class WPBakeryShortCode_Experiences_list extends WPBakeryShortCode { }
        class WPBakeryShortCode_Hello_box extends WPBakeryShortCode { }
        class WPBakeryShortCode_Awesome_work extends WPBakeryShortCode { }
        class WPBakeryShortCode_Process_box extends WPBakeryShortCode { }
        class WPBakeryShortCode_Blog_posts extends WPBakeryShortCode { }
        class WPBakeryShortCode_Profile_tab extends WPBakeryShortCode { }
        class WPBakeryShortCode_Testimonials extends WPBakeryShortCode { }
        class WPBakeryShortCode_Plain_process extends WPBakeryShortCode { }
        class WPBakeryShortCode_Service_list extends WPBakeryShortCode { }
        class WPBakeryShortCode_Pricing_table extends WPBakeryShortCode { }
        class WPBakeryShortCode_Simple_services extends WPBakeryShortCode { }
    }

}

// Update Existing Elements
if ( ! function_exists( 'me_visual_composer_update_existing_shortcodes' ) ) {
    function me_visual_composer_update_existing_shortcodes() {
    }
    add_action( 'admin_init', 'me_visual_composer_update_existing_shortcodes' );
}
// Incremental ID Counter for Templates
if ( ! function_exists( 'me_visual_composer_templates_id_increment' ) ) {
    function me_visual_composer_templates_id_increment() {
        static $count = 0; $count++;
        return $count;
    }
}