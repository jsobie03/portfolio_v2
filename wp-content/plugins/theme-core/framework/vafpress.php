<?php
/*
  * Theme framework / theme Options
  */
error_reporting(0);
// Setup Contants
defined( 'VP_PLUGIN_VERSION' ) or define( 'VP_PLUGIN_VERSION', '2.0' );
defined( 'VP_PLUGIN_URL' )     or define( 'VP_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
defined( 'VP_PLUGIN_DIR' )     or define( 'VP_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
defined( 'VP_PLUGIN_FILE' )    or define( 'VP_PLUGIN_FILE', __FILE__ );
// Load Languages
add_action('plugins_loaded', 'vp_pl_load_textdomain');
function vp_pl_load_textdomain(){
	load_plugin_textdomain( 'vp_textdomain', false, dirname( plugin_basename( __FILE__ ) . '/lang/' ) ); 
}
// Require Bootstrap
require 'vafpress-framework/bootstrap.php';
/**
 * EOF
 */