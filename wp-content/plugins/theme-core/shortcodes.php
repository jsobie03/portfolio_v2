<?php
// Content filter used ONLY on custom theme shortcodes to remove
add_filter("the_content", "the_content_filter");
function the_content_filter($content) {
    // array of custom shortcodes requiring the fix
    $block = join("|",array(
        "pricing_table",
    ));
// opening tag
    $rep = preg_replace("/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/","[$2$3]",$content);
// closing tag
    $rep = preg_replace("/(<p>)?\[\/($block)](<\/p>|<br \/>)?/","[/$2]",$rep);
    return $rep;
}
// Container Shortcode
function container_shortcode( $atts, $content = null ) {
    extract(shortcode_atts(array(
    ), $atts));
    if(!empty($atts['class'])){
        $class = $atts['class'];
    } else {
        $class = '';
    }
    $out = '';
    $out .= '<div class="container '.$class.'">';
    $out .= do_shortcode($content);
    $out .= '</div>';
    return $out;
}
add_shortcode('container', 'container_shortcode');
// Portfolio Shortcode
function portfolio_shortcode( $atts, $content = null ) {
    extract(shortcode_atts(array(
    ), $atts));
    if(!empty($atts['columns'])){
        $columns = $atts['columns'];
    } else {
        $columns = '3-col-space';
    }
    // Column Classes
    $col_class = '';
    if($columns == '3-col-space'){
        $col_class = 'class="items row col-3 with-space"';
    } elseif($columns == '3-col-no-space'){
        $col_class = 'class="items ma-3b"';
    } elseif($columns == '2-col'){
        $col_class = 'class="items ma-3d col-2"';
    } elseif($columns == 'carousel-view'){
        $col_class = '';
    }
    if(!empty($atts['portfolio_categories'])){
        $portfolio_categories = $atts['portfolio_categories'];
    } else {
        $portfolio_categories = '';
    }
    if(!empty($atts['number_of_posts'])){
        $number_of_posts = $atts['number_of_posts'];
    } else {
        $number_of_posts = 6;
    }
    if(!empty($atts['load_more_page'])){
        $load_more_page = $atts['load_more_page'];
    } else {
        $load_more_page = '';
    }
    if(!empty($atts['order'])){
        $order = $atts['order'];
    } else {
        $order = 'ASC';
    }
    if(!empty($atts['load_more_txt'])){
        $load_more_txt = $atts['load_more_txt'];
    } else {
        $load_more_txt = '';
    }
    if(!empty($atts['loading_txt'])){
        $loading_txt = $atts['loading_txt'];
    } else {
        $loading_txt = '';
    }
    if(!empty($atts['no_work_txt'])){
        $no_work_txt = $atts['no_work_txt'];
    } else {
        $no_work_txt = '';
    }
    if(!empty($atts['hide_filters'])){
        $hide_filters = $atts['hide_filters'];
    } else {
        $hide_filters = 'show';
    }
    $out = '';

    if(!empty($portfolio_categories)){
        $ex_portfolio_categories = explode(",",$portfolio_categories);
        $categories = get_terms( 'me_genre', array(
            'orderby'    => 'count',
            'hide_empty' => 1,
            'include'    => $ex_portfolio_categories
        ) );
        // For Load More Page
        $sp_cats = $portfolio_categories;
    }else{
        $sp_cats = 'no_cat';
        $categories = get_terms( 'me_genre', array(
            'orderby'    => 'count',
            'hide_empty' => 1
        ) );
    }
    // Loop Arguments
    $term_array = array();
    foreach($categories as $cat) {
        $term_array[] = $cat->slug;
    }
    $portfolio = array(
        'post_type' => 'portfolio',
        'posts_per_page' => $number_of_posts,
        'order' => $order,
        'tax_query' => array(
            array(
                'taxonomy' => 'me_genre',
                'field'    => 'slug',
                'terms'    => $term_array,
            ),
        ),
    );
    $portfolio_loop = new WP_Query($portfolio);
    if($columns == 'carousel-view'){
        $out .= '<section class="portfolio">';
        $out .= '<div id="portfolio-slide">';
        while ( $portfolio_loop->have_posts() ) : $portfolio_loop->the_post();
            $portfolio_layout = me_wp_get_field('portfolio_layout');
            if($portfolio_layout == 'layout-one' || $portfolio_layout == 'layout-two' || $portfolio_layout == 'layout-three'){
                $link_class = '';
            } else {
                $link_class = 'cbp-singlePage';
            }
            $terms = get_the_terms(get_the_ID(), 'me_genre');
            $classes = '';
            foreach ($terms as $ter){
                $classes .= esc_attr($ter->slug). ' ';
            }
            $out .= '<article class="portfolio-item">';
            $out .= '<div class="portfolio-image">';
            if(has_post_thumbnail()){
                $out .= get_the_post_thumbnail();
            }
            $out .= '<div class="portfolio-overlay"> </div>';
            $out .= '<div class="position-center-center">';
            $out .= '<h4>';
            $out .= '<a href="'.get_the_permalink().'" class="'.$link_class.'" rel="nofollow">'.get_the_title().'</a>';
            $out .= '</h4>';
            $out .= '<p>';
            $term_counter = 0;
            $len = count($terms);
            foreach ($terms as $ter){
                if ($term_counter == $len - 1) {
                    $out .= esc_attr($ter->name);
                } else {
                    $out .= esc_attr($ter->name). ', ';
                }
                $term_counter++;
            }
            $out .= '</p>';
            $out .= '</div>';
            $out .= '</div>';
            $out .= '</article>';
        endwhile;
        wp_reset_postdata();
        $out .= '</div>';
        $out .= '</section>';
    } else {
        $out .= '<section class="portfolio">';
        if($hide_filters != 'hide' && $columns != 'carousel-view'){
            // Start Filter
            $out .= '<div class="text-center">';
            $out .= '<div id="js-filters-agency" class="cbp-l-filters-buttonCenter portfolio-filter margin-bottom-80">';
            $out .= '<div data-filter="*" class="cbp-filter-item-active cbp-filter-item">';
            $out .= esc_html__('All','me-wp');
            $out .= '<div class="cbp-filter-counter"></div>';
            $out .= '</div>';
            foreach($categories as $cats){
                $out .= '<div data-filter=".'.esc_attr($cats->slug).'" class="cbp-filter-item">';
                $out .= esc_attr($cats->name);
                $out .= '<div class="cbp-filter-counter"></div>';
                $out .= '</div>';
            }
            $out .= '</div>';
            $out .= '</div>';
            // End Filters
        }
        $out .= '<div id="js-grid-agency" '.$col_class.'>';
        while ( $portfolio_loop->have_posts() ) : $portfolio_loop->the_post();
            $portfolio_layout = me_wp_get_field('portfolio_layout');
            if($portfolio_layout == 'layout-one' || $portfolio_layout == 'layout-two' || $portfolio_layout == 'layout-three'){
                $link_class = '';
            } else {
                $link_class = 'cbp-singlePage';
            }
            $portfolio_item_width = me_wp_get_field('portfolio_item_width');
            $terms = get_the_terms(get_the_ID(), 'me_genre');
            $classes = '';
            foreach ($terms as $ter){
                $classes .= esc_attr($ter->slug). ' ';
            }
            // Start Item
            if($columns == '2-col'){
                $out .= '<div class="cbp-item portfolio-item '.$portfolio_item_width.' '.$classes.'">';
                $out .= '<article>';
                $out .= '<div class="portfolio-image">';
                if(has_post_thumbnail()){
                    $out .= get_the_post_thumbnail();
                }
                $out .= '<div class="portfolio-overlay"> </div>';
                $out .= '<div class="position-bottom">';
                if(has_post_thumbnail()){
                    $out .= '<a href="'.me_feature_image_url(get_the_ID()).'" class="cbp-lightbox icon" data-title="'.get_the_title().'">';
                    $out .= '<i class="icon-magnifier"></i>';
                    $out .= '</a>';
                }
                $out .= '<p>';
                $term_counter = 0;
                $len = count($terms);
                foreach ($terms as $ter){
                    if ($term_counter == $len - 1) {
                        $out .= esc_attr($ter->name);
                    } else {
                        $out .= esc_attr($ter->name). ', ';
                    }
                    $term_counter++;
                }
                $out .= '</p>';
                $out .= '<h4>';
                $out .= '<a href="'.get_the_permalink().'" class="'.$link_class.'" rel="nofollow">'.get_the_title().'</a>';
                $out .= '</h4>';
                $out .= '</div>';
                $out .= '</div>';
                $out .= '</article>';
                $out .= '</div>';
            } elseif($columns == '3-col-space'){
                $out .= '<div class="cbp-item portfolio-item '.$portfolio_item_width.' '.$classes.'">';
                $out .= '<article>';
                $out .= '<div class="portfolio-image">';
                if(has_post_thumbnail()){
                    $out .= get_the_post_thumbnail();
                }
                $out .= '<div class="portfolio-overlay">';
                $out .= '<div class="position-center-center">';
                if(has_post_thumbnail()){
                    $out .= '<a href="'.me_feature_image_url(get_the_ID()).'" class="cbp-lightbox icon" data-title="'.get_the_title().'">';
                    $out .= '<i class="icon-magnifier"></i>';
                    $out .= '</a>';
                }
                $out .= '<h4>';
                $out .= '<a href="'.get_the_permalink().'" class="'.$link_class.'" rel="nofollow">Fun for Kids</a>';
                $out .= '</h4>';
                $out .= '<p>';
                $term_counter = 0;
                $len = count($terms);
                foreach ($terms as $ter){
                    if ($term_counter == $len - 1) {
                        $out .= esc_attr($ter->name);
                    } else {
                        $out .= esc_attr($ter->name). ', ';
                    }
                    $term_counter++;
                }
                $out .= '</p>';
                $out .= '</div>';
                $out .= '</div>';
                $out .= '</div>';
                $out .= '</article>';
                $out .= '</div>';
            } elseif($columns == '3-col-no-space'){
                $out .= '<div class="cbp-item portfolio-item '.$portfolio_item_width.' '.$classes.'">';
                $out .= '<article>';
                $out .= '<div class="portfolio-image">';
                if(has_post_thumbnail()){
                    $out .= get_the_post_thumbnail();
                }
                $out .= '<div class="portfolio-overlay"></div>';
                $out .= '<div class="position-bottom">';
                if(has_post_thumbnail()){
                    $out .= '<a href="'.me_feature_image_url(get_the_ID()).'" class="cbp-lightbox icon" data-title="'.get_the_title().'">';
                    $out .= '<i class="icon-magnifier"></i>';
                    $out .= '</a>';
                }
                $out .= '<p>';
                $term_counter = 0;
                $len = count($terms);
                foreach ($terms as $ter){
                    if ($term_counter == $len - 1) {
                        $out .= esc_attr($ter->name);
                    } else {
                        $out .= esc_attr($ter->name). ', ';
                    }
                    $term_counter++;
                }
                $out .= '</p>';
                $out .= '<h4>';
                $out .= '<a href="'.get_the_permalink().'" class="'.$link_class.'" rel="nofollow">'.get_the_title().'</a>';
                $out .= '</h4>';
                $out .= '</div>';
                $out .= '</div>';
                $out .= '</article>';
                $out .= '</div>';
            }
            // End Item
        endwhile;
        wp_reset_postdata();
        $out .= '</div>';
        // Load More
        if(!empty($load_more_txt)){
            $out .= '<div class="text-center margin-top-100 margin-bottom-100 animate fadeInUp" data-wow-delay="0.4s">';
            $out .= '<div id="js-loadMore-agency">';
            $out .= '<a href="'.esc_url(home_url('/')).'?page_id='.$load_more_page.'&number_of_posts='.$number_of_posts.'&select_portfolio_categories='.$sp_cats.'&portfolio_layout='.$columns.'" class="cbp-l-loadMore-link btn-large" rel="nofollow">';
            $out .= '<span class="cbp-l-loadMore-defaultText">'.$load_more_txt.'</span>';
            $out .= '<span class="cbp-l-loadMore-loadingText">'.$loading_txt.'</span>';
            $out .= '<span class="cbp-l-loadMore-noMoreLoading">'.$no_work_txt.'</span>';
            $out .= '</a>';
            $out .= '</div>';
            $out .= '</div>';
        }
        // End Load More
        $out .= '</section>';
    }
    // End Portfolio
    return $out;
}
add_shortcode('portfolio', 'portfolio_shortcode');
// Hire Me Box Shortcode
function hire_me_box_shortcode( $atts, $content = null ) {
    extract(shortcode_atts(array(
    ), $atts));
    if(!empty($atts['heading'])){
        $heading = $atts['heading'];
    } else {
        $heading = '';
    }
    if(!empty($atts['heading_above_txt'])){
        $heading_above_txt = $atts['heading_above_txt'];
    } else {
        $heading_above_txt = '';
    }
    if(!empty($atts['small_desc'])){
        $small_desc = $atts['small_desc'];
    } else {
        $small_desc = '';
    }
    if(!empty($atts['btn_text'])){
        $btn_text = $atts['btn_text'];
    } else {
        $btn_text = '';
    }
    if(!empty($atts['btn_link'])){
        $btn_link = $atts['btn_link'];
    } else {
        $btn_link = '';
    }
    $out = '';
    $out .= '<div class="project-mind">';
    $out .= '<div class="huge-head">';
    if(!empty($heading_above_txt)){
        $out .= '<span>'.$heading_above_txt.'</span>';
    }
    if(!empty($heading)){
        $out .= $heading;
    }
    $out .= '</div>';
    $out .= '<div class="col-md-8 center-auto">';
    $out .= '<p>'.$small_desc.'</p>';
    $out .= '</div>';
    if(!empty($btn_text)){
        $out .= '<a href="'.esc_url($btn_link).'" class="btn-large-1">'.$btn_text.'</a>';
    }
    $out .= '</div>';
    return $out;
}
add_shortcode('hire_me_box', 'hire_me_box_shortcode');
// Personal Info Box Shortcode
function personal_info_box_shortcode( $atts, $content = null ) {
    extract(shortcode_atts(array(
    ), $atts));
    if(!empty($atts['heading'])){
        $heading = $atts['heading'];
    } else {
        $heading = '';
    }
    if(!empty($atts['heading_above_txt'])){
        $heading_above_txt = $atts['heading_above_txt'];
    } else {
        $heading_above_txt = '';
    }
    if(!empty($atts['image'])){
        $image_info = wp_get_attachment_image_src( $atts['image'], 'full' );
        $image = $image_info[0];
    } else {
        $image = '';
    }
    if(!empty($atts['animations'])){
        $animations = $atts['animations'];
    } else {
        $animations = '';
    }
    if(!empty($atts['delay'])){
        $delay = $atts['delay'];
    } else {
        $delay = '';
    }

    if(!empty($atts['download_btn_txt'])){
        $download_btn_txt = $atts['download_btn_txt'];
    } else {
        $download_btn_txt = '';
    }
    if(!empty($atts['download_btn_link'])){
        $download_btn_link = $atts['download_btn_link'];
    } else {
        $download_btn_link = '';
    }
    if(!empty($atts['hire_btn_txt'])){
        $hire_btn_txt = $atts['hire_btn_txt'];
    } else {
        $hire_btn_txt = '';
    }
    if(!empty($atts['hire_btn_link'])){
        $hire_btn_link = $atts['hire_btn_link'];
    } else {
        $hire_btn_link = '';
    }
    if(!empty($atts['facebook'])){
        $facebook = $atts['facebook'];
    } else {
        $facebook = '';
    }
    if(!empty($atts['twitter'])){
        $twitter = $atts['twitter'];
    } else {
        $twitter = '';
    }
    if(!empty($atts['dribble'])){
        $dribble = $atts['dribble'];
    } else {
        $dribble = '';
    }
    if(!empty($atts['youtube'])){
        $youtube = $atts['youtube'];
    } else {
        $youtube = '';
    }
    $out = '';
    $out .= '<div class="hello-i-am">';
    if(!empty($image)){
        $out .= '<div class="col-md-5 img-large">';
        $out .= '<img class="img-responsive animate '.$animations.'" data-wow-delay="'.$delay.'s" src="'.esc_url($image).'" alt="">';
        $out .= '</div>';
    }
    $out .= '<div class="col-md-7">';
    $out .= '<div class="heading-block-2 margin-bottom-50">';
    if(!empty($heading_above_txt)){
        $out .= '<h5>'.$heading_above_txt.'</h5>';
    }
    if(!empty($heading)){
        $out .= '<h3 class="letter-space-5">'.$heading.'</h3>';
    }
    $out .= '</div>';
    $out .= '<div class="test-sec">';
    $out .= do_shortcode($content);
    $out .= '</div>';
    $out .= '<!-- BTN SECTION -->';
    $out .= '<div class="text-right">';
    if(!empty($download_btn_txt)){
        $out .= '<a href="'.esc_url($download_btn_link).'" class="btn-large btn-round">'.$download_btn_txt.'</a>';
    } if(!empty($hire_btn_txt)){
        $out .= '<a href="'.esc_url($hire_btn_link).'" class="btn-large-1 btn-round">'.$hire_btn_txt.'</a>';
    }
    $out .= '</div>';
    $out .= '<!-- Social Icons -->';
    $out .= '<div class="social-icons animate fadeInUp" data-wow-delay="0.4s">';
    if(!empty($facebook)){
        $out .= '<a href="'.esc_url($facebook).'" target="_blank"><i class="icon-social-facebook"></i></a>';
    } if(!empty($twitter)){
        $out .= '<a href="'.esc_url($twitter).'" target="_blank"><i class="icon-social-twitter"></i></a>';
    } if(!empty($dribble)){
        $out.= '<a href="'.esc_url($dribble).'" target="_blank"><i class="icon-social-dribbble"></i></a>';
    } if(!empty($youtube)){
        $out .= '<a href="'.esc_url($youtube).'" target="_blank"><i class="icon-social-youtube"></i></a>';
    }
    $out .= '</div>';

    $out .= '</div>';
    $out .= '</div>';
    return $out;
}
add_shortcode('personal_info_box', 'personal_info_box_shortcode');
// Title Block Shortcode
function title_block_shortcode( $atts, $content = null ) {
    extract(shortcode_atts(array(
    ), $atts));
    if(!empty($atts['heading'])){
        $heading = $atts['heading'];
    } else {
        $heading = '';
    }
    if(!empty($atts['heading_above_txt'])){
        $heading_above_txt = $atts['heading_above_txt'];
    } else {
        $heading_above_txt = '';
    }
    if(!empty($atts['desc_text'])){
        $desc_text = $atts['desc_text'];
    } else {
        $desc_text = '';
    }
    if(!empty($atts['color'])){
        $color = $atts['color'];
    } else {
        $color = '';
    }
    if(!empty($atts['title_style'])){
        $title_style = $atts['title_style'];
    } else {
        $title_style = '';
    }
    if(!empty($atts['description_width'])){
        $description_width = $atts['description_width'];
    } else {
        $description_width = 'col-md-7';
    }
    $out = '';
    if($title_style == 'vertical'){
        $out .= '<div class="heading-block '.$color.'">';
        if(!empty($heading_above_txt)){
            $out .= '<h6>'.$heading_above_txt.'</h6>';
        }
        if(!empty($heading)){
            $out .= '<span class="huge-tittle">'.$heading.'</span>';
        }
        $out .= '</div>';
    } else {
        $out .= '<div class="heading-block-2 '.$color.'">';
        if(!empty($heading_above_txt)){
            $out .= '<h5>'.$heading_above_txt.'</h5>';
        }
        if(!empty($heading)){
            $out .= '<h3 class="letter-space-5">'.$heading.'</h3>';
        }
        if(!empty($desc_text)){
            $out .= '<div class="row">';
            $out .= '<p class="margin-top-20 '.$description_width.'">'.$desc_text.'</p>';
            $out .= '</div>';
        }
        $out .= '</div>';
    }

    return $out;
}
add_shortcode('title_block', 'title_block_shortcode');
// Services Box
function services_box_shortcode( $atts, $content = null ) {
    extract(shortcode_atts(array(
    ), $atts));
    if(!empty($atts['heading'])){
        $heading = $atts['heading'];
    } else {
        $heading = '';
    }
    if(!empty($atts['txt_desc'])){
        $txt_desc = $atts['txt_desc'];
    } else {
        $txt_desc = '';
    }
    if(!empty($atts['icon'])){
        $icon = $atts['icon'];
    } else {
        $icon = '';
    }
    if(!empty($atts['animations'])){
        $animations = $atts['animations'];
    } else {
        $animations = '';
    }
    if(!empty($atts['delay'])){
        $delay = $atts['delay'];
    } else {
        $delay = '';
    }
    if(!empty($atts['display_style'])){
        $display_style = $atts['display_style'];
    } else {
        $display_style = 'services-main';
    }

    $out = '';
    if($display_style == 'services-boxes'){
        $out .= '<div class="services">';
    }
    $out .= '<div class="'.$display_style.'">';
    $out .= '<article>';
    $out .= '<i class="'.$icon.' animate '.$animations.'" data-wow-delay="'.$delay.'s"></i>';
    $out .= '<h5>'.$heading.'</h5>';
    $out .= '<p>'.$txt_desc.'</p>';
    $out .= '</article>';
    $out .= '</div>';
    if($display_style == 'services-boxes'){
        $out .= '</div>';
    }
    return $out;
}
add_shortcode('services_box', 'services_box_shortcode');
// Single Testimonial Box
function single_testimonial_box_shortcode( $atts, $content = null ) {
    extract(shortcode_atts(array(
    ), $atts));
    if(!empty($atts['txt_desc'])){
        $txt_desc = $atts['txt_desc'];
    } else {
        $txt_desc = '';
    }
    if(!empty($atts['testimonial_author'])){
        $testimonial_author = $atts['testimonial_author'];
    } else {
        $testimonial_author = '';
    }
    if(!empty($atts['testimonial_author_company'])){
        $testimonial_author_company = $atts['testimonial_author_company'];
    } else {
        $testimonial_author_company = '';
    }

    $out = '';
    $out .= '<div class="testi-sim"> <i class="qua">“</i>';
    $out .= '<p>'.$txt_desc.'</p>';
    $out .= '<h6>'.$testimonial_author.'</h6>';
    $out .= '<span>'.$testimonial_author_company.'</span>';
    $out .= '</div>';
    return $out;
}
add_shortcode('single_testimonial_box', 'single_testimonial_box_shortcode');
// Skill bars Shortcode
function skill_bars_shortcode( $atts, $content = null ) {
    extract(shortcode_atts(array(
    ), $atts));
    if(!empty($atts['title'])){
        $title = $atts['title'];
    } else {
        $title = '';
    }
    if(!empty($atts['value'])){
        $value = $atts['value'];
    } else {
        $value = '';
    }
    if(!empty($atts['animations'])){
        $animations = $atts['animations'];
    } else {
        $animations = '';
    }
    if(!empty($atts['delay'])){
        $delay = $atts['delay'];
    } else {
        $delay = '';
    }
    if(!empty($atts['color'])){
        $color = 'style="background:'.$atts['color'].';"';
    } else {
        $color = '';
    }
    $out = '';
    $out .= '<div class="skills">';
    $out .= '<div class="progress-bars">';
    $out .= '<div class="bar animate '.$animations.'" data-wow-delay="'.$delay.'s">';
    $out .= '<p>'.$title.'</p>';
    $out .= '<div class="progress" data-percent="'.$value.'%">';
    $out .= '<div class="progress-bar" '.$color.'>';
    $out .= '<span class="progress-bar-tooltip">'.$value.'%</span>';
    $out .= '</div>';
    $out .= '</div>';
    $out .= '</div>';
    $out .= '</div>';
    $out .= '</div>';
    return $out;
}
add_shortcode('skill_bars', 'skill_bars_shortcode');
// Education List Shortcode
function education_lists_shortcode( $atts, $content = null ) {
    extract(shortcode_atts(array(
    ), $atts));
    $out = '';
    $out .= '<div class="education">';
    $out .= '<ul class="edu-list">';
    $out .= do_shortcode($content);
    $out .= '</ul>';
    $out .= '</div>';
    return $out;
}
add_shortcode('education_lists', 'education_lists_shortcode');
add_shortcode('education_list', 'education_list_shortcode');
function education_list_shortcode( $atts, $content = null ) {
    extract(shortcode_atts(array(
    ), $atts));
    if(!empty($atts['heading'])){
        $heading = $atts['heading'];
    } else {
        $heading = '';
    }
    if(!empty($atts['degree'])){
        $degree = $atts['degree'];
    } else {
        $degree = '';
    }
    if(!empty($atts['year'])){
        $year = $atts['year'];
    } else {
        $year = '';
    }
    if(!empty($atts['animations'])){
        $animations = $atts['animations'];
    } else {
        $animations = '';
    }
    if(!empty($atts['delay'])){
        $delay = $atts['delay'];
    } else {
        $delay = '';
    }
    $out = '';
    $out .= '<li class="animate '.$animations.'" data-wow-delay="'.$delay.'s">';
    if(!empty($year)){
        $out .= '<span>'.$year.'</span>';
    }
    if(!empty($heading)){
        $out .= '<h5>'.$heading.'</h5>';
    } if(!empty($degree)){
        $out .= '<p>'.$degree.'</p>';
    }
    $out .= '</li>';
    return $out;
}
// Experiences List Shortcode
function experiences_lists_shortcode( $atts, $content = null ) {
    extract(shortcode_atts(array(
    ), $atts));
    $out = '';
    $out .= '<div class="experience">';
    $out .= '<ul class="exp-list">';
    $out .= do_shortcode($content);
    $out .= '</ul>';
    $out .= '</div>';
    return $out;
}
add_shortcode('experiences_lists', 'experiences_lists_shortcode');
add_shortcode('experiences_list', 'experiences_list_shortcode');
function experiences_list_shortcode( $atts, $content = null ) {
    extract(shortcode_atts(array(
    ), $atts));
    if(!empty($atts['heading'])){
        $heading = $atts['heading'];
    } else {
        $heading = '';
    }
    if(!empty($atts['designation'])){
        $designation = $atts['designation'];
    } else {
        $designation = '';
    }
    if(!empty($atts['description'])){
        $description = $atts['description'];
    } else {
        $description = '';
    }
    if(!empty($atts['year'])){
        $year = $atts['year'];
    } else {
        $year = '';
    }
    if(!empty($atts['animations'])){
        $animations = $atts['animations'];
    } else {
        $animations = '';
    }
    if(!empty($atts['delay'])){
        $delay = $atts['delay'];
    } else {
        $delay = '';
    }
    $out = '';
    $out .= '<li>';
    if(!empty($year)){
        $out .= '<div class="media-left animate '.$animations.'" data-wow-delay="'.$delay.'s">';
        $out .= '<span>'.$year.'</span>';
        $out .= '</div>';
    }
    $out .= '<div class="media-body">';
    if(!empty($heading)){
        $out .= '<h5>'.$heading.'</h5>';
    } if(!empty($designation)){
        $out .= '<span>'.$designation.'</span>';
    } if(!empty($description)){
        $out .= '<p>'.$description.'</p>';
    }
    $out .= '</div>';
    $out .= '</li>';
    return $out;
}
// Hello Box Shortcode
function hello_box_shortcode( $atts, $content = null ) {
    extract(shortcode_atts(array(
    ), $atts));
    if(!empty($atts['title'])){
        $title = $atts['title'];
    } else {
        $title = '';
    }
    if(!empty($atts['title_abv_txt'])){
        $title_abv_txt = $atts['title_abv_txt'];
    } else {
        $title_abv_txt = '';
    }
    if(!empty($atts['image'])){
        $image_info = wp_get_attachment_image_src( $atts['image'], 'full' );
        $image = $image_info[0];
    } else {
        $image = '';
    }
    if(!empty($atts['animations'])){
        $animations = $atts['animations'];
    } else {
        $animations = '';
    }
    if(!empty($atts['delay'])){
        $delay = $atts['delay'];
    } else {
        $delay = '';
    }
    if(!empty($atts['bg_image'])){
        $image_info = wp_get_attachment_image_src( $atts['bg_image'], 'full' );
        $bg_image = 'style="background: url('.$image_info[0].') bottom no-repeat;"';
    } else {
        $bg_image = '';
    }
    if(!empty($atts['display_style'])){
        $display_style = $atts['display_style'];
    } else {
        $display_style = '';
    }
    if($display_style == 'plain'){
        $color = 'white';
    } else {
        $color = '';
    }

    $out = '';
    if($display_style == 'plain'){
        $out .= '<div class="home-2">';
    }
    $out .= '<div class="hello">';
    $out .= '<!-- Diagonal Top -->';
    if($display_style == 'diagonal'){
        $out .= '<div class="cir-tri-bg" '.$bg_image.'></div>';
    }
    $out .= '<div class="container">';
    $out .= '<!-- Heading Block -->';
    $out .= '<div class="heading-block '.$color.'">';
    if(!empty($title_abv_txt)){
        $out .= '<h6>'.$title_abv_txt.'</h6>';
    }
    if(!empty($title)){
        $out .= '<span class="huge-tittle">'.$title.'</span>';
    }
    $out .= '</div>';
    if(!empty($image)){
        $out .= '<!-- HELLO IMG -->';
        $out .= '<div class="col-sm-5">';
        $out .= '<img class="hello-img animate '.$animations.'" data-wow-delay="'.$delay.'s" src="'.$image.'" alt="" >';
        $out .= '</div>';
    }
    $out .= '<!-- CONTENT INFO -->';
    $out .= '<div class="col-sm-7">';
    $out .= $content;
    $out .= '</div>';
    $out .= '</div>';
    if($display_style == 'diagonal'){
        $out .= '<!-- Bottom BG Style -->';
        $out .= '<div class="cir-bottom-bg"></div>';
    }
    $out .= '</div>';
    if($display_style == 'plain'){
        $out .= '</div>';
    }
    return $out;
}
add_shortcode('hello_box', 'hello_box_shortcode');
// Awesome Work Shortcode
function awesome_work_shortcode( $atts, $content = null ) {
    extract(shortcode_atts(array(
    ), $atts));
    if(!empty($atts['title'])){
        $title = $atts['title'];
    } else {
        $title = '';
    }
    if(!empty($atts['title_abv_txt'])){
        $title_abv_txt = $atts['title_abv_txt'];
    } else {
        $title_abv_txt = '';
    }
    if(!empty($atts['portfolio_categories'])){
        $portfolio_categories = $atts['portfolio_categories'];
    } else {
        $portfolio_categories = '';
    }
    if(!empty($atts['number_of_posts'])){
        $number_of_posts = $atts['number_of_posts'];
    } else {
        $number_of_posts = '';
    }
    if(!empty($atts['order'])){
        $order = $atts['order'];
    } else {
        $order = '';
    }
    if(!empty($atts['view_more_btn_txt'])){
        $view_more_btn_txt = $atts['view_more_btn_txt'];
    } else {
        $view_more_btn_txt = '';
    }
    if(!empty($atts['view_more_btn_link'])){
        $view_more_btn_link = $atts['view_more_btn_link'];
    } else {
        $view_more_btn_link = '';
    }
    if(!empty($portfolio_categories)){
        $ex_portfolio_categories = explode(",",$portfolio_categories);
        $categories = get_terms( 'me_genre', array(
            'orderby'    => 'count',
            'hide_empty' => 1,
            'include'    => $ex_portfolio_categories
        ) );
        // For Load More Page
        $sp_cats = $portfolio_categories;
    }else{
        $sp_cats = 'no_cat';
        $categories = get_terms( 'me_genre', array(
            'orderby'    => 'count',
            'hide_empty' => 1
        ) );
    }
    // Loop Arguments
    $term_array = array();
    foreach($categories as $cat) {
        $term_array[] = $cat->slug;
    }
    $portfolio = array(
        'post_type' => 'portfolio',
        'posts_per_page' => $number_of_posts,
        'order' => $order,
        'tax_query' => array(
            array(
                'taxonomy' => 'me_genre',
                'field'    => 'slug',
                'terms'    => $term_array,
            ),
        ),
    );
    $portfolio_loop = new WP_Query($portfolio);
    $count = 1;
    $out = '';
    $out .= '<div class="our-work" data-stellar-background-ratio="0.4">';
    $out .= '<div class="container">';
    $out .= '<!-- Heading Block -->';
    $out .= '<div class="heading-block">';
    if(!empty($title_abv_txt)){
        $out .= '<h6>'.$title_abv_txt.'</h6>';
    }
    if(!empty($title)){
        $out .= '<span class="huge-tittle">'.$title.'</span>';
    }
    $out .= '</div>';
    $out .= '<div class="list-work">';
    while($portfolio_loop->have_posts()) : $portfolio_loop->the_post();
        $project_link = me_wp_get_field('project_link');
        if($count % 2 != 0){
            $out .= '<article>';
            $out .= '<ul class="row">';
            $out .= '<!-- Text Detail -->';
            $out .= '<li class="col-md-5">';
            $out .= '<div class="text-info text-right">';
            $out .= '<h3 class="tittle">'.get_the_title().'</h3>';
            $out .= '<p>'.me_wp_shortcode_excerpt(100).'</p>';
            if(!empty($project_link)){
                $out .= '<div class="text-center">';
                $out .= '<a href="'.esc_url($project_link).'" class="btn-flat">'.esc_html__('LIVE PROJECT','me-wp').'</a>';
                $out .= '</div>';
            }
            $out .= '</div>';
            $out .= '</li>';
            if(has_post_thumbnail()){
                $out .= '<!-- Img -->';
                $out .= '<li class="col-md-7">';
                $out .= '<img class="img-right animate fadeInRight" data-wow-delay="0.4s" src="'.me_feature_image_url(get_the_ID()).'" alt="" >';
                $out .= '</li>';
            }
            $out .= '</ul>';
            $out .= '</article>';
        } else{
            $out .= '<article>';
            $out .= '<ul class="row">';
            if(has_post_thumbnail()){
                $out .= '<!-- Img -->';
                $out .= '<li class="col-md-7">';
                $out .= '<img class="animate fadeInLeft" data-wow-delay="0.4s" src="'.me_feature_image_url(get_the_ID()).'" alt="" >';
                $out .= '</li>';
            }
            $out .= '<!-- Text Detail -->';
            $out .= '<li class="col-md-5">';
            $out .= '<div class="text-info text-left">';
            $out .= '<h3 class="tittle">'.get_the_title().'</h3>';
            $out .= '<p>'.me_wp_shortcode_excerpt(100).'</p>';
            if(!empty($project_link)){
                $out .= '<div class="text-center">';
                $out .= '<a href="'.esc_url($project_link).'" class="btn-flat">'.esc_html__('LIVE PROJECT','me-wp').'</a>';
                $out .= '</div>';
            }
            $out .= '</div>';
            $out .= '</li>';
            $out .= '</ul>';
            $out .= '</article>';
        }
        $count++;
    endwhile;
    if(!empty($view_more_btn_txt)){
        $out .= '<div class="text-center"> <a href="'.esc_url($view_more_btn_link).'" class="btn-large">'.$view_more_btn_txt.'</a> </div>';
    }
    $out .= '</div>';

    $out .= '</div>';
    $out .= '</div>';

    return $out;
}
add_shortcode('awesome_work', 'awesome_work_shortcode');
// Hello Box Shortcode
function process_box_shortcode( $atts, $content = null ) {
    extract(shortcode_atts(array(
    ), $atts));
    if(!empty($atts['title'])){
        $title = $atts['title'];
    } else {
        $title = '';
    }
    if(!empty($atts['title_abv_txt'])){
        $title_abv_txt = $atts['title_abv_txt'];
    } else {
        $title_abv_txt = '';
    }if(!empty($atts['process_heading_1'])){
        $process_heading_1 = $atts['process_heading_1'];
    } else {
        $process_heading_1 = '';
    } if(!empty($atts['process_text_1'])){
        $process_text_1 = $atts['process_text_1'];
    } else {
        $process_text_1 = '';
    } if(!empty($atts['process_icon_1'])){
        $process_icon_1 = $atts['process_icon_1'];
    } else {
        $process_icon_1 = '';
    } if(!empty($atts['process_heading_2'])){
        $process_heading_2 = $atts['process_heading_2'];
    } else {
        $process_heading_2 = '';
    } if(!empty($atts['process_text_2'])){
        $process_text_2 = $atts['process_text_2'];
    } else {
        $process_text_2 = '';
    } if(!empty($atts['process_icon_2'])){
        $process_icon_2 = $atts['process_icon_2'];
    } else {
        $process_icon_2 = '';
    } if(!empty($atts['process_heading_3'])){
        $process_heading_3 = $atts['process_heading_3'];
    } else {
        $process_heading_3 = '';
    } if(!empty($atts['process_text_3'])){
        $process_text_3 = $atts['process_text_3'];
    } else {
        $process_text_3 = '';
    } if(!empty($atts['process_icon_3'])){
        $process_icon_3 = $atts['process_icon_3'];
    } else {
        $process_icon_3 = '';
    } if(!empty($atts['process_heading_4'])){
        $process_heading_4 = $atts['process_heading_4'];
    } else {
        $process_heading_4 = '';
    } if(!empty($atts['process_text_4'])){
        $process_text_4 = $atts['process_text_4'];
    } else {
        $process_text_4 = '';
    } if(!empty($atts['process_icon_4'])){
        $process_icon_4 = $atts['process_icon_4'];
    } else {
        $process_icon_4 = '';
    }
    if(!empty($atts['top_background_img'])){
        $image_info = wp_get_attachment_image_src( $atts['top_background_img'], 'full' );
        $top_background_img = 'style="background: url('.$image_info[0].') center right no-repeat;"';
    } else {
        $top_background_img = '';
    }
    if(!empty($atts['center_img'])){
        $image_info = wp_get_attachment_image_src( $atts['center_img'], 'full' );
        $center_img = $image_info[0];
    } else {
        $center_img = '';
    }
    if(!empty($atts['bottom_background_img'])){
        $image_info = wp_get_attachment_image_src( $atts['bottom_background_img'], 'full' );
        $bottom_background_img = 'style="background: url('.$image_info[0].') left 0px no-repeat;"';
    } else {
        $bottom_background_img = '';
    } if(!empty($atts['color'])){
        $color = 'style="background: '.$atts['color'].';"';
    } else {
        $color = '';
    }

    $out = '';
    $out .= '<div class="work-process" '.$color.'>';
    $out .= '<!-- TOP bg Style -->';
    $out .= '<div class="cir-tri-bg" data-stellar-background-ratio="0.4" '.$top_background_img.'></div>';
    $out .= '<div class="container">';
    $out .= '<!-- Heading Block -->';
    $out .= '<div class="heading-block white">';
    if(!empty($title_abv_txt)){
        $out .= '<h6>'.$title_abv_txt.'</h6>';
    }
    if(!empty($title)){
        $out .= '<span class="huge-tittle">'.$title.'</span>';
    }
    $out .= '</div>';
    $out .= '<!-- Process Steps -->';
    $out .= '<div class="process-steps">';

    $out .= '<!-- Steps 1 -->';
    $out .= '<div class="step-1">';
    $out .= '<div class="col-md-4 center-auto animate fadeInUp" data-wow-delay="0.6s">';
    $out .= '<span class="tittle-back">1</span>';
    if(!empty($process_heading_1)){
        $out .= '<h4>'.$process_heading_1.'</h4>';
    } if(!empty($process_text_1)){
        $out .= '<p>'.$process_text_1.'</p>';
    } if(!empty($process_icon_1)){
        $out .= '<i class="'.$process_icon_1.'"></i>';
    }
    $out .= '</div>';
    $out .= '</div>';
    $out .= '<div class="row">';

    $out .= '<!-- Steps 2 -->';
    $out .= '<div class="col-md-4 pull-right step-2 animate fadeInLeft" data-wow-delay="0.6s">';
    $out .= '<span class="tittle-back">2</span>';
    if(!empty($process_icon_2)){
        $out .= '<div class="media-left media-middle"> <i class="'.$process_icon_2.'"></i> </div>';
    }
    $out .= '<div class="media-body">';
    if(!empty($process_heading_2)){
        $out .= '<h4>'.$process_heading_2.'</h4>';
    } if(!empty($process_text_2)){
        $out .= '<p>'.$process_text_2.'</p>';
    }
    $out .= '</div>';
    $out .= '</div>';

    $out .= '<!-- Steps 4 -->';
    $out .= '<div class="col-md-4 pull-left text-right step-4 animate fadeInRight" data-wow-delay="0.6s">';
    $out .= '<div class="media-body"> <span class="tittle-back">4</span>';
    if(!empty($process_heading_4)){
        $out .= '<h4>'.$process_heading_4.'</h4>';
    } if(!empty($process_text_4)){
        $out .= '<p>'.$process_text_4.'</p>';
    }
    $out .= '</div>';
    if(!empty($process_icon_4)){
        $out .= '<div class="media-right media-middle"> <i class="'.$process_icon_4.'"></i> </div>';
    }
    $out .= '</div>';

    $out .= '<!-- Center Image -->';
    $out .= '<div class="col-md-4 step-img text-center animate fadeIn" data-wow-delay="0.3s">';
    if(!empty($center_img)){
        $out .= '<img src="'.$center_img.'" class="img-responsive" alt="">';
    }
    $out .= '</div>';

    $out .= '</div>';

    $out .= '<!-- Steps 3 -->';
    $out .= '<div class="step-3 animate fadeInDown" data-wow-delay="0.6s">';
    $out .= '<span class="tittle-back">3</span>';
    if(!empty($process_icon_3)){
        $out .= '<i class="'.$process_icon_3.'"></i>';
    } if(!empty($process_heading_3)){
        $out .= '<h4>'.$process_heading_3.'</h4>';
    } if(!empty($process_text_3)){
        $out .= '<div class="col-md-4 center-auto">';
        $out .= '<p>'.$process_text_3.'</p>';
        $out .= '</div>';
    }
    $out .= '</div>';
    $out .= '</div>';
    $out .= '</div>';

    $out .= '<!-- Bottom BG Style -->';
    $out .= '<div class="cir-bottom-bg" '.$bottom_background_img.'></div>';
    $out .= '</div>';
    return $out;
}
add_shortcode('process_box', 'process_box_shortcode');
// Blog Posts Shortcode
function blog_posts_shortcode( $atts, $content = null ) {
    extract(shortcode_atts(array(
    ), $atts));
    if(!empty($atts['number'])){
        $number = $atts['number'];
    } else {
        $number = 3;
    }
    if(!empty($atts['order'])){
        $order = $atts['order'];
    } else {
        $order = 'ASC';
    }
    if(!empty($atts['post_columns'])){
        $post_columns = $atts['post_columns'];
    } else {
        $post_columns = 'col-md-3';
    }
    if(!empty($atts['cat_id'])){
        $cat_id = $atts['cat_id'];
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => $number,
            'order' => $order,
            'cat' => $cat_id
        );
    } else {
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => $number,
            'order' => $order
        );
    }
    $out = '';
    $blog_query = new WP_Query($args);
    $out .= '<div class="blog">';
    $out .= '<div class="blog-post iso-posts">';
    $count = 1;
    while($blog_query->have_posts()): $blog_query->the_post();
        $out .= '<div class="'.$post_columns.'">';
        $out .= '<article class="post-normal">';
        if(has_post_thumbnail()){
            $out .= '<!-- Image -->';
            $out .= '<img class="img-responsive animate fadeIn" data-wow-delay="0.4s" src="'.me_feature_image_url(get_the_ID()).'" alt="" >';
        }
        $out .= '<!-- Post -->';
        $out .= '<span class="tag">';
        $cats = get_the_category(get_the_ID());
        $post_count = 0;
        $len = count($cats);
        foreach($cats as $cat){
            if ($post_count == $len - 1) {
                $out .= $cat->cat_name;
            } else {
                $out .= $cat->cat_name. ', ';
            }
            $post_count++;
        }
        $out .= '</span>';
        $out .= '<a href="'.get_the_permalink().'" class="post-tittle">'.get_the_title().'</a>';
        $out .= '<p>'.get_the_excerpt().'</p>';
        $out .= '<span class="comm">'.get_the_time('d M, Y').' / '.get_comments_number( '0', '1', '%' ).' '.esc_html__('Comments','me-wp').'</span>';
        $out .= '<a href="'.get_the_permalink().'" class="btn-flat margin-top-15">'.esc_html__('READ MORE','me-wp').'</a>';
        $out .= '</article>';
        $out .= '</div>';
        $count++;
    endwhile;
    wp_reset_query();
    $out .= '</div>';
    $out .= '</div>';
    return $out;
}
add_shortcode('blog_posts', 'blog_posts_shortcode');
// Profile Tabs Shortcode
function profile_tabs_shortcode( $atts, $content = null ) {
    extract(shortcode_atts(array(
    ), $atts));
    if(!empty($atts['section_title'])){
        $section_title = $atts['section_title'];
    } else {
        $section_title = '';
    }
    if(!empty($atts['section_title_abv_txt'])){
        $section_title_abv_txt = $atts['section_title_abv_txt'];
    } else {
        $section_title_abv_txt = '';
    }
    if(!empty($atts['tab_headings'])){
        $tab_headings = $atts['tab_headings'];
    } else {
        $tab_headings = '';
    }
    if(!empty($atts['title'])){
        $title = $atts['title'];
    } else {
        $title = '';
    }
    if(!empty($atts['description'])){
        $description = $atts['description'];
    } else {
        $description = '';
    }
    if(!empty($atts['bottom_description'])){
        $bottom_description = $atts['bottom_description'];
    } else {
        $bottom_description = '';
    }
    if(!empty($atts['hire_btn_txt'])){
        $hire_btn_txt = $atts['hire_btn_txt'];
    } else {
        $hire_btn_txt = '';
    }
    if(!empty($atts['hire_btn_link'])){
        $hire_btn_link = $atts['hire_btn_link'];
    } else {
        $hire_btn_link = '';
    }
    if(!empty($atts['download_btn_txt'])){
        $download_btn_txt = $atts['download_btn_txt'];
    } else {
        $download_btn_txt = '';
    }
    if(!empty($atts['download_btn_link'])){
        $download_btn_link = $atts['download_btn_link'];
    } else {
        $download_btn_link = '';
    }
    if(!empty($atts['section_background_img'])){
        $image_info = wp_get_attachment_image_src( $atts['section_background_img'], 'full' );
        $section_background_img = 'style="background: #f7f7f7 url('.$image_info[0].') center left no-repeat;"';
    } else {
        $section_background_img = '';
    }
    $out = '';

    $out .= '<div class="profile-main" data-stellar-background-ratio="0.5" '.$section_background_img.'>';
    $out .= '<!-- TOP bg Style -->';
    $out .= '<div class="cir-tri-bg"></div>';
    $out .= '<div class="container">';
    $out .= '<!-- Heading Block -->';
    $out .= '<div class="heading-block">';
    if(!empty($section_title_abv_txt)){
        $out .= '<h6>'.$section_title_abv_txt.'</h6>';
    }
    if(!empty($section_title)){
        $out .= '<span class="huge-tittle">'.$section_title.'</span>';
    }
    $out .= '</div>';

    $out .= '<div class="profile-inn">';
    $out .= '<div class="row">';

    $out .= '<div class="col-md-5 text-right test-sec animate fadeInLeft" data-wow-delay="0.4s">';
    if(!empty($title)){
        $out .= '<h3>'.$title.'</h3>';
    } if(!empty($description)){
        $out .= '<p>'.$description.'</p>';
    }
    $out .= '</div>';
    $out .= '<div class="col-md-6">';
    $out .= '<div class="tabs-sec  animate fadeIn" data-wow-delay="0.4s">';
    $out .= '<div class="tab-content">';
    $out .= do_shortcode($content);
    $out .= '</div>';
    $out .= '</div>';

    $out .= '<ul class="nav nav-pills" role="tablist">';
    $ex_tab_headings = explode('++',$tab_headings);
    $heading_count = 1;
    foreach ($ex_tab_headings as $heading) {
        if($heading_count == 1){
            $active = 'class="active"';
        } else {
            $active = '';
        }
        $out .= '<li role="presentation" '.$active.'><a href="#tab-'. $heading_count .'" role="tab" data-toggle="tab" aria-controls="tab-'. $heading_count .'"><i class="'.$heading.'"></i></a></li>';
        $heading_count++;
    }
    $out .= '</ul>';

    $out .= '</div>';

    $out .= '</div>'; // Row
    if(!empty($bottom_description)){
        $out .= '<!-- Detail Text -->';
        $out .= '<div class="col-md-10 center-auto text-center">';
        $out .= '<p>'.$bottom_description.'</p>';
        $out .= '</div>';
    }
    $out .= '<!-- BTN -->';
    $out .= '<div class="btn-part">';
    if(!empty($hire_btn_txt)){
        $out .= '<a href="'.esc_url($hire_btn_link).'" class="btn-large">'.$hire_btn_txt.'</a>';
    } if(!empty($download_btn_txt)){
        $out .= '<a href="'.esc_url($download_btn_link).'" class="btn-large btn-large-1 ">'.$download_btn_txt.'</a>';
    }
    $out .= '</div>';
    $out .= '</div>'; // Profile In
    $out .= '</div>'; // Container
    $out .= '<div class="cir-bottom-bg"></div>';
    $out .= '</div>';
    return $out;
}
add_shortcode('profile_tabs', 'profile_tabs_shortcode');
add_shortcode('profile_tab', 'profile_tab_shortcode');
function profile_tab_shortcode( $atts, $content = null ) {
    extract(shortcode_atts(array(
    ), $atts));
    $out = '';
    STATIC $id = 0;
    $id++;
    if($id == 1){
        $class = 'in active';
    } else {
        $class = '';
    }
    if(!empty($atts['content_icon'])){
        $content_icon = $atts['content_icon'];
    } else {
        $content_icon = '';
    }
    $out .= '<div role="tabpanel" class="tab-pane fade '.$class.'" id="tab-' . $id . '">';
    $out .= do_shortcode($content);
    if(!empty($content_icon)){
        $out .= '<i class="'.$content_icon.'"></i>';
    }
    $out .= '</div>';
    return $out;
}
// Testimonials Shortcode
function testimonials_shortcode( $atts, $content = null ) {
    extract(shortcode_atts(array(
    ), $atts));
    if(!empty($atts['number'])){
        $number = $atts['number'];
    } else {
        $number = 3;
    }
    if(!empty($atts['order'])){
        $order = $atts['order'];
    } else {
        $order = 'ASC';
    }
    if(!empty($atts['grp_slug'])){
        $grp_slug = $atts['grp_slug'];
        $args = array(
            'post_type' => 'me-testimonials',
            'posts_per_page' => $number,
            'order' => $order,
            'tax_query' => array(
                array(
                    'taxonomy' => 'me_testimonials_genre',
                    'field'    => 'slug',
                    'terms'    => $grp_slug,
                ),
            ),
        );
    } else {
        $args = array(
            'post_type' => 'me-testimonials',
            'posts_per_page' => $number,
            'order' => $order
        );
    }
    $out = '';
    $out .= '<div class="testimonial">';
    $out .= '<div class="slider-sec">';
    $out .= '<div id="testi-slide">';
    $testimonials_query = new WP_Query($args);
    while($testimonials_query->have_posts()): $testimonials_query->the_post();
        $author_image_testimonials = me_wp_get_field('author_image_testimonials');
        $author_designation_testimonials = me_wp_get_field('author_designation_testimonials');
        $out .= '<div class="item">';
        $out .= '<div class="media-body">';
        $out .= '<div class="tesi-text">';
        $out .= '<div class="icon">';
        $out .= '<i class="icon-bubbles"></i>';
        $out .= '</div>';
        $out .= get_the_content();
        $out .= '</div>';
        $out .= '</div>';
        $out .= '<div class="media-right">';
        $out .= '<div class="avatar-sec">';
        if(!empty($author_image_testimonials)){
            $out .= '<img class="img-responsive" src="'.$author_image_testimonials.'" alt="" >';
        }
        $out .= '<h4>'.get_the_title().'</h4>';
        if(!empty($author_designation_testimonials)){
            $out .= '<p>'.$author_designation_testimonials.'</p>';
        }
        $out .= '</div>';
        $out .= '</div>';
        $out .= '</div>';
    endwhile;
    wp_reset_query();
    $out .= '</div>';
    $out .= '</div>';
    $out .= '</div>';
    return $out;
}
add_shortcode('testimonials', 'testimonials_shortcode');
// Plain Processes Shortcode
function plain_processes_shortcode( $atts, $content = null ) {
    extract(shortcode_atts(array(
    ), $atts));
    $out = '';
    $out .= '<div class="work-process wprocess">';
    $out .= '<div class="container">';
    $out .= '<div class="process-style-2">';
    $out .= '<ul class="row">';
    $out .= do_shortcode($content);
    $out .= '</ul>';
    $out .= '</div>';
    $out .= '</div>';
    $out .= '</div>';
    return $out;
}
add_shortcode('plain_processes', 'plain_processes_shortcode');
add_shortcode('plain_process', 'plain_process_shortcode');
function plain_process_shortcode( $atts, $content = null ) {
    extract(shortcode_atts(array(
    ), $atts));
    if(!empty($atts['heading'])){
        $heading = $atts['heading'];
    } else {
        $heading = '';
    }
    if(!empty($atts['description'])){
        $description = $atts['description'];
    } else {
        $description = '';
    }
    if(!empty($atts['animations'])){
        $animations = $atts['animations'];
    } else {
        $animations = '';
    }
    if(!empty($atts['delay'])){
        $delay = $atts['delay'];
    } else {
        $delay = '';
    }
    if(!empty($atts['process_icon'])){
        $image_info = wp_get_attachment_image_src( $atts['process_icon'], 'full' );
        $process_icon = $image_info[0];
    } else {
        $process_icon = '';
    }
    $out = '';
    $out .= '<li>';
    if(!empty($process_icon)){
        $out .= '<div class="media-left">';
        $out .= '<div class="icon animate '.$animations.'" data-wow-delay="'.$delay.'s">';
        $out .= '<img src="'.$process_icon.'" alt="" >';
        $out .= '</div>';
        $out .= '</div>';
    }
    $out .= '<div class="media-body">';
    if(!empty($heading)){
        $out .= '<h4>'.$heading.'</h4>';
    } if(!empty($description)){
        $out .= '<p>'.$description.'</p>';
    }
    $out .= '</div>';
    $out .= '</li>';
    return $out;
}
// Services Lists Shortcode
function services_list_shortcode( $atts, $content = null ) {
    extract(shortcode_atts(array(
    ), $atts));
    $out = '';

    $out .= '<ul class="services-list">';
    $out .= do_shortcode($content);
    $out .= '</ul>';
    return $out;
}
add_shortcode('services_list', 'services_list_shortcode');
add_shortcode('service_list', 'service_list_shortcode');
function service_list_shortcode( $atts, $content = null ) {
    extract(shortcode_atts(array(
    ), $atts));
    if(!empty($atts['heading'])){
        $heading = $atts['heading'];
    } else {
        $heading = '';
    }
    if(!empty($atts['txt_above_heading'])){
        $txt_above_heading = $atts['txt_above_heading'];
    } else {
        $txt_above_heading = '';
    }
    if(!empty($atts['description'])){
        $description = $atts['description'];
    } else {
        $description = '';
    }

    $out = '';
    $out .= '<li>';
    if(!empty($txt_above_heading)){
        $out .= '<span>'.$txt_above_heading.'</span>';
    }
    if(!empty($heading)){
        $out .= '<h5>'.$heading.'</h5>';
    } if(!empty($description)){
        $out .= '<p>'.$description.'</p>';
    }
    $out .= '</li>';
    return $out;
}
// Pricing Table Shortcode
function pricing_table_shortcode( $atts, $content = null ) {
    extract(shortcode_atts(array(
    ), $atts));
    if(!empty($atts['heading'])){
        $heading = $atts['heading'];
    } else {
        $heading = '';
    }
    if(!empty($atts['currency_symbol'])){
        $currency_symbol = $atts['currency_symbol'];
    } else {
        $currency_symbol = '';
    }
    if(!empty($atts['price'])){
        $price = $atts['price'];
    } else {
        $price = '';
    }
    if(!empty($atts['period_text'])){
        $period_text = $atts['period_text'];
    } else {
        $period_text = '';
    }
    if(!empty($atts['button_text'])){
        $button_text = $atts['button_text'];
    } else {
        $button_text = '';
    }
    if(!empty($atts['button_link'])){
        $button_link = $atts['button_link'];
    } else {
        $button_link = '';
    }
    if(!empty($atts['style'])){
        $style = $atts['style'];
    } else {
        $style = '';
    }
    if(!empty($atts['animations'])){
        $animations = $atts['animations'];
    } else {
        $animations = '';
    }
    if(!empty($atts['delay'])){
        $delay = $atts['delay'];
    } else {
        $delay = '';
    }
    $out = '';
    $out .= '<div class="pricing">';
    $out .= '<div class="price-table">';
    $out .= '<article class="'.$style.' animate '.$animations.'" data-wow-delay="'.$delay.'s">';
    $out .= '<div class="price-head">';
    if(!empty($heading)){
        $out .= '<span class="plan-tittle">'.$heading.'</span>';
    }
    $out .= '<span class="plan-price">';
    if(!empty($currency_symbol)){
        $out .= '<span>'.$currency_symbol.'</span>';
    }
    if(!empty($price)){
        $out .= $price;
    }
    $out .= '</span>';
    if(!empty($period_text)){
        $out .= '<span class="plan-month">'.$period_text.'</span>';
    }
    $out .= '</div>';
    $out .= do_shortcode($content);
    if(!empty($button_text)){
        $out .= '<a href="'.esc_url($button_link).'">'.$button_text.'</a>';
    }
    $out .= '</article>';
    $out .= '</div>';
    $out .= '</div>';
    return $out;
}
add_shortcode('pricing_table', 'pricing_table_shortcode');
// Simple Services
function simple_services_shortcode( $atts, $content = null ) {
    extract(shortcode_atts(array(
    ), $atts));
    if(!empty($atts['heading'])){
        $heading = $atts['heading'];
    } else {
        $heading = '';
    }
    if(!empty($atts['txt_desc'])){
        $txt_desc = $atts['txt_desc'];
    } else {
        $txt_desc = '';
    }

    $out = '';
    $out .= '<div class="services">';
    $out .= '<div class="services-grid">';
    $out .= '<div>';
    if(!empty($heading)){
        $out .= '<h5>'.$heading.'</h5>';
    } if(!empty($txt_desc)){
        $out .= '<p>'.$txt_desc.'</p>';
    }
    $out .= '</div>';
    $out .= '</div>';
    $out .= '</div>';
    return $out;
}
add_shortcode('simple_services', 'simple_services_shortcode');

// Text Widget Shortcode Readable
add_filter( 'widget_text', 'shortcode_unautop');
add_filter( 'widget_text', 'do_shortcode');