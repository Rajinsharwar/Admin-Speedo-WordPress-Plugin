<?php
/**
 * Plugin Name: Admin Speedo
 * Description: A super light-weight WordPress plugin to automatically and drastically improve loading time for your WordPress admin dashboard. No configurations needed. Just activate it, and your admin panel will be boosted.
 * Author: Rajin Sharwar
 * Author URI: https://linkedin.com/in/rajinsharwar
 * Version: 1.0.0
 * Text Domain: adminsp
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Moving JQuery to the Footer
function adminsp_move_jquery_to_footer() {
    wp_scripts()->add_data( 'jquery', 'group', 1 );
    wp_scripts()->add_data( 'jquery-core', 'group', 1 );
    wp_scripts()->add_data( 'jquery-migrate', 'group', 1 );
}
add_action( 'wp_enqueue_scripts', 'adminsp_move_jquery_to_footer' );


// Reducing number of queried fields
add_filter( 'posts_fields', 'adminsp_limit_post_fields_cb', 0, 2 );
function adminsp_limit_post_fields_cb( $fields, $query )
{
  if (
        ! is_admin()
    OR ! $query->is_main_query()
        OR ( defined( 'DOING_AJAX' ) AND DOING_AJAX )
        OR ( defined( 'DOING_CRON' ) AND DOING_CRON )
    )
        return $fields;

    $p = $GLOBALS['wpdb']->posts;
    return implode( ",", array(
        "{$p}.ID",
        "{$p}.post_title",
        "{$p}.post_date",
        "{$p}.post_author",
        "{$p}.post_name",
        "{$p}.comment_status",
        "{$p}.ping_status",
        "{$p}.post_password",
    ) );
}


// Removing useless Admin Widgets from the admin dashboard main page
add_action( 'wp_dashboard_setup', function()
{
    remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_primary', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
    remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
    remove_meta_box( 'dashboard_browser_nag', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
    remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
} );


// Limiting WordPress Heartbeat

function adminsp_optimize_heartbeat_settings( $settings ) {
    $settings['autostart'] = false;
    $settings['interval'] = 60;
    return $settings;
}
add_filter( 'heartbeat_settings', 'adminsp_optimize_heartbeat_settings' );

function adminsp_disable_heartbeat_unless_post_edit_screen() {
    global $pagenow;
    if ( $pagenow != 'post.php' && $pagenow != 'post-new.php' )
        wp_deregister_script('heartbeat');
}
add_action( 'init', 'adminsp_disable_heartbeat_unless_post_edit_screen', 1 );


// Disabling External HTTP API calls in WordPress Backend

add_action( 'muplugins_loaded', 'adminsp_block_external_if_not_dashboard' );
function adminsp_block_external_if_not_dashboard() {

    /* bug out conditions */
    if ( wp_doing_ajax() ) {return;}
    if ( defined( 'REST_REQUEST' ) && REST_REQUEST ) {return;}
    if ( !is_admin() ) {return;}
    if ( isset( $_REQUEST['page'] ) ) {return;}
    if ( '/wp-admin/' === substr( $_SERVER['REQUEST_URI'], -10, 10 ) ) {return;}

    /* block access to external HTTP requests */
    if ( !defined( 'WP_HTTP_BLOCK_EXTERNAL' ) && !defined( 'WP_ACCESSIBLE_HOSTS' ) ) {
        define( 'WP_HTTP_BLOCK_EXTERNAL', true );
        define( 'WP_ACCESSIBLE_HOSTS', 'api.wordpress.org' );
    }
}


//Blocking the unwanted admin notices

function adminsp_noticehider(){
    remove_all_actions( 'user_admin_notices' );
    remove_all_actions( 'admin_notices' );
}
add_action('in_admin_header', 'adminsp_noticehider', 99);