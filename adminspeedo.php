<?php
/**
 * Plugin Name: Admin Speedo
 * Description: Speed-up your slow WordPress Admin Dashboard with one click. Turn off most of the unnecessary opions for your admin panel.
 * Author: Rajin Sharwar
 * Author URI: https://linkedin.com/in/rajinsharwar
 * Version: 2.2.2
 * Text Domain: adminsp
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function adminsp_activation_redirect( $plugin ) {
    if( $plugin == plugin_basename( __FILE__ ) ) {
        exit( wp_redirect( admin_url( 'admin.php?page=admin_speedo' ) ) );
    }
}
add_action( 'activated_plugin', 'adminsp_activation_redirect' );

require_once (plugin_dir_path(__FILE__). 'inc/validate.php');
require_once (plugin_dir_path(__FILE__). 'admin/admin-menu.php');
require_once (plugin_dir_path(__FILE__). 'admin/settings.php');
require_once (plugin_dir_path(__FILE__). 'inc/functions.php');