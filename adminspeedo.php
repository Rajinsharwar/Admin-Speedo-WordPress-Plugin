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

//Turning the Template editor off

remove_theme_support('block-templates');

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

//Turning off Jetpack promotions

add_filter('jetpack_just_in_time_msgs', '__return_false', 20);
add_filter('jetpack_show_promotions', '__return_false', 20);

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

add_action('in_admin_header', 'adminsp_noticehider', 999);

function adminsp_noticehider(){
    remove_all_actions( 'user_admin_notices' );
    remove_all_actions( 'admin_notices' );
}



// optimizing Marketing Hub

add_filter('woocommerce_marketing_menu_items', '__return_empty_array');


//Removing Woocommerce promotional admin notice

add_filter('woocommerce_helper_suppress_admin_notices', '__return_true');

//Turning metabox off

add_action('wp_dashboard_setup', 'adminsp_disable_woocommerce_status');

function adminsp_disable_woocommerce_status()
{
    remove_meta_box('woocommerce_dashboard_status', 'dashboard', 'normal');
}

    
//Turning off Woo Fragments

add_action('wp_enqueue_scripts', 'adminsp_disable_woocommerce_cart_fragments', 70);

function adminsp_disable_woocommerce_cart_fragments()
{
    if (function_exists('is_woocommerce')) {
        wp_dequeue_script('wc-cart-fragments');
    }
}


//Turning off setup dash for Woocommerce

add_action('wp_dashboard_setup', 'disable_admin_dashboard_setup_widget', 80);

function disable_admin_dashboard_setup_widget()
{
    remove_meta_box('wc_admin_dashboard_setup', 'dashboard', 'normal');
}

    

//Turning off marketplace suggestions for Woo

add_filter('woocommerce_allow_marketplace_suggestions', '__return_false', 999);


//Turning off Woo widgets

add_action('widgets_init', 'adminsp_disable_woocommerce_widgets', 90);
    
function adminsp_disable_woocommerce_widgets()
{

    unregister_widget('WC_Widget_Products');
    unregister_widget('WC_Widget_Product_Categories');
    unregister_widget('WC_Widget_Product_Tag_Cloud');
    unregister_widget('WC_Widget_Product_Search');
    unregister_widget('WC_Widget_Top_Rated_Products');
    unregister_widget('WC_Widget_Rating_Filter');
    unregister_widget('WC_Widget_Cart');
    unregister_widget('WC_Widget_Recently_Viewed');
    unregister_widget('WC_Widget_Layered_Nav');
    unregister_widget('WC_Widget_Layered_Nav_Filters');
    unregister_widget('WC_Widget_Price_Filter');
    unregister_widget('WC_Widget_Recent_Reviews');
    unregister_widget('WC_Widget_Cart');
}


//Turning off WP Pass Strength meter

add_action('wp_print_scripts', 'adminsp_disable_password_strength_meter', 999);

function adminsp_disable_password_strength_meter()
{
    global $wp;

    $wp_check = isset($wp->query_vars['lost-password']) || (isset($_GET['action']) && $_GET['action'] === 'lostpassword') || is_page('lost_password');

    $wc_check = (class_exists('WooCommerce') && (is_account_page() || is_checkout()));

    if (!$wp_check && !$wc_check) {
        if (wp_script_is('zxcvbn-async', 'enqueued')) {
            wp_dequeue_script('zxcvbn-async');
        }

        if (wp_script_is('password-strength-meter', 'enqueued')) {
            wp_dequeue_script('password-strength-meter');
        }

        if (wp_script_is('wc-password-strength-meter', 'enqueued')) {
            wp_dequeue_script('wc-password-strength-meter');
        }
    }
}


//Turning off Elementor widgets dash

add_action('wp_dashboard_setup', 'disable_elementor_dashboard_overview_widget', 80);

function disable_elementor_dashboard_overview_widget()
    {
        remove_meta_box('e-dashboard-overview', 'dashboard', 'normal');
    }


//Cleaning the transients every 48 hours

function adminsp_custom_cron_schedule( $schedules ) {
$schedules['every_two_days'] = array(
    'interval' => 172800, // Every 48 hours
    'display'  => __( 'Every 48 hours' ),
);
return $schedules;
}
add_filter( 'cron_schedules', 'adminsp_custom_cron_schedule' );

//Schedule the action if it's not already scheduled
if ( ! wp_next_scheduled( 'adminsp_cron_hook' ) ) {
wp_schedule_event( time(), 'every_two_days', 'adminsp_cron_hook' );
}

//Hook into the action that'll fire every 48 hours
 add_action( 'adminsp_cron_hook', 'adminsp_cron_function' );

//Function of deleting transients via cron
function adminsp_cron_function() {
    global $wpdb; 
    $sql = 'DELETE FROM ' . $wpdb->options . ' WHERE option_name LIKE ("_transient_%") or (option_name LIKE "_site_transient_%")'; 
    $wpdb->query($sql); 
}