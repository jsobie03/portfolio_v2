<?php
/*
Plugin Name: Theme Core
Plugin URI: http://gomalthemes.com/
Description: Do not Delete/De-activate plugin, having all core data of theme.
Version: 1.1
Author: Gomal Themes
Author URI: http://gomalthemes.com/
License: GPLv2
*/
// Theme Shortcodes
include_once('shortcodes.php');
// Theme Custom Post Types
include_once('cpt.php');
// Theme Options Framework
include_once('framework/vafpress.php');
$tmpl_opt  = plugin_dir_path( __FILE__ ).'admin/option.php';
// Create instance of Options
$theme_options = new VP_Option(array(
    'is_dev_mode'           => false,
    'option_key'            => 'vpt_option',
    'page_slug'             => 'vpt_option',
    'template'              => $tmpl_opt,
    'menu_page'             => 'themes.php',
    'use_auto_group_naming' => true,
    'use_util_menu'         => true,
    'minimum_role'          => 'edit_theme_options',
    'layout'                => 'fixed',
    'page_title'            => esc_html__( 'Theme Options', 'theme-core' ),
    'menu_label'            => esc_html__( 'Theme Options', 'theme-core' ),
));
// Advanced Custom Fields
function regal_wp_register_fields(){
    include_once('advanced-custom-fields/add-ons/acf-gallery/gallery.php');
    include_once('advanced-custom-fields/add-ons/acf-repeater/repeater.php');
}
add_action('acf/register_fields', 'regal_wp_register_fields');
define( 'ACF_LITE', true );
include_once('advanced-custom-fields/custom-fields.php');
// Text Widget Shortcode Readable
add_filter( 'widget_text', 'shortcode_unautop');
add_filter( 'widget_text', 'do_shortcode');
?>