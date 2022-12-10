<?php
/**
 * Plugin Name: Admin Speedo
 * Description: Speed-up your slow WordPress Admin Dashboard with one click. Turn off most of the unnecessary opions for your admin panel.
 * Author: Rajin Sharwar
 * Author URI: https://linkedin.com/in/rajinsharwar
 * Version: 2.4.0
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

if ( ! function_exists( 'adminsp_' ) ) {
    // Create a helper function for easy SDK access.
    function adminsp_() {
        global $adminsp_;

        if ( ! isset( $adminsp_ ) ) {
            // Include Freemius SDK.
            require_once dirname(__FILE__) . '/inc/vendor/start.php';

            $adminsp_ = fs_dynamic_init( array(
                'id'                  => '11603',
                'slug'                => 'admin-speedo',
                'type'                => 'plugin',
                'public_key'          => 'pk_275596ba75a97a8bcbcd625edfb11',
                'is_premium'          => false,
                'has_addons'          => false,
                'has_paid_plans'      => false,
                'menu'                => array(
                    'slug'           => 'admin-speedo',
                    'first-path'     => 'admin.php?page=admin_speedo',
                    'account'        => false,
                    'support'        => false,
                ),
            ) );
        }

        return $adminsp_;
    }

    // Init Freemius.
    adminsp_();
    // Signal that SDK was initiated.
    do_action( 'adminsp__loaded' );
}

require_once (plugin_dir_path(__FILE__). 'inc/validate.php');
require_once (plugin_dir_path(__FILE__). 'admin/admin-menu.php');
require_once (plugin_dir_path(__FILE__). 'admin/settings.php');
require_once (plugin_dir_path(__FILE__). 'inc/functions.php');