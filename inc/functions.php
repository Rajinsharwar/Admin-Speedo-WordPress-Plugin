<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Moving JQuery to the Footer

if ( (get_option('adminsp_jquery_to_footer')) == 'yes') {
    function adminsp_move_jquery_to_footer() {
        wp_scripts()->add_data( 'jquery', 'group', 1 );
        wp_scripts()->add_data( 'jquery-core', 'group', 1 );
        wp_scripts()->add_data( 'jquery-migrate', 'group', 1 );
    }
    add_action( 'wp_enqueue_scripts', 'adminsp_move_jquery_to_footer' );
}


// Reducing number of queried fields

if ( (get_option('adminsp_reduce_queried_fields')) == 'yes') {
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
}

// Removing useless Admin Widgets from the admin dashboard main page

if ((get_option('adminsp_remove_admin_widgets')) == 'yes') {
function adminsp_remove_all_widgets() {
  global $wp_meta_boxes;

  // Loop through all dashboard widgets
  foreach ( $wp_meta_boxes['dashboard'] as $context => $priorities ) {
    foreach ( $priorities as $priority => $widgets ) {
      foreach ( $widgets as $widget => $settings ) {
        // Remove the widget
        remove_meta_box( $widget, 'dashboard', $context );
      }
    }
  }
}
add_action( 'wp_dashboard_setup', 'adminsp_remove_all_widgets' );
    }

//Turning the Template editor off

if ((get_option('adminsp_remove_template_editor')) == 'yes') {
remove_theme_support('block-templates');
}

// Limiting WordPress Heartbeat

if ((get_option('adminsp_limit_wp_heartbeat')) == 'yes') {

function adminsp_limit_heartbeat_frequency( $settings ) {
  if (is_admin()) {
    $settings['interval'] = 60;
  }
  return $settings;
}
add_filter( 'heartbeat_settings', 'adminsp_limit_heartbeat_frequency' );

function adminsp_disable_heartbeat_unless_post_edit_screen() {
    global $pagenow;
    if ( $pagenow != 'post.php' && $pagenow != 'post-new.php' )
        wp_deregister_script('heartbeat');
}
add_action( 'init', 'adminsp_disable_heartbeat_unless_post_edit_screen', 1 );
}

//Turning off Jetpack promotions

if ((get_option('adminsp_turn_off_jetpack_promo')) == 'yes') {
add_filter('jetpack_just_in_time_msgs', '__return_false', 20);
add_filter('jetpack_show_promotions', '__return_false', 20);
}

// Disabling External HTTP API calls in WordPress Backend

if ((get_option('adminsp_turn_off_ext_http_calls')) == 'yes') {

add_filter('http_request_host_is_external', 'adminsp_block_external_requests', 10, 2);
function adminsp_block_external_requests($bool, $url) {
  if (is_admin()) {
    $site_url = get_site_url();
    $home_url = get_home_url();
    if (strpos($url, $site_url) === false && strpos($url, $home_url) === false) {
      return false;
    }
  }
  return $bool;
}

}

//Blocking the unwanted admin notices

if ((get_option('adminsp_remove_admin-notices')) == 'yes') {
add_action('in_admin_header', 'adminsp_noticehider', 999);

function adminsp_noticehider(){
    remove_all_actions( 'user_admin_notices' );
    remove_all_actions( 'admin_notices' );
}
}


// optimizing Marketing Hub

if ((get_option('adminsp_remove_marketing_hub')) == 'yes') {
    add_filter('woocommerce_marketing_menu_items', '__return_empty_array');
}

//Turning metabox off

if ((get_option('adminsp_remove_woo_metabox')) == 'yes') {
add_action('wp_dashboard_setup', 'adminsp_disable_woocommerce_status');

function adminsp_disable_woocommerce_status()
{
    remove_meta_box('woocommerce_dashboard_status', 'dashboard', 'normal');
}
}
    
//Turning off setup dash for Woocommerce

if ((get_option('adminsp_disable_setup_dash_woo')) == 'yes') {
    add_action('wp_dashboard_setup', 'disable_admin_dashboard_setup_widget', 80);

    function disable_admin_dashboard_setup_widget()
    {
        remove_meta_box('wc_admin_dashboard_setup', 'dashboard', 'normal');
    }
}
    

//Turning off marketplace suggestions for Woo

if ((get_option('adminsp_remove_marketplace_sugg_woo')) == 'yes') {
    add_filter('woocommerce_allow_marketplace_suggestions', '__return_false', 999);
}

//Turning off Woo widgets

if ((get_option('adminsp_remove_woo_widgets')) == 'yes') {
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
}

//Turning off WP Pass Strength meter

if ((get_option('adminsp_remove_wp_pass_meter')) == 'yes') {
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
}

//Turning off Elementor widgets dash

if ((get_option('adminsp_remove_elementor_widg_dash')) == 'yes') {
    add_action('wp_dashboard_setup', 'disable_elementor_dashboard_overview_widget', 80);

    function disable_elementor_dashboard_overview_widget()
        {
            remove_meta_box('e-dashboard-overview', 'dashboard', 'normal');
        }
}

//Cleaning the transients every 48 hours

if ((get_option('adminsp_sched_transients_clear')) == 'yes') {
    function adminsp_custom_cron_schedule( $schedules ) {
    $schedules['every_two_days'] = array(
        'interval' => 172800, // Every 48 hours
        'display'  => __( 'Every 48 hours' ),
    );
    return $schedules;
    }
    add_filter( 'cron_schedules', 'adminsp_custom_cron_schedule' );
    }

    //Schedule the action if it's not already scheduled

    if ((get_option('adminsp_remove_admin-notices')) == 'yes') {
    if ( ! wp_next_scheduled( 'adminsp_cron_hook' ) ) {
    wp_schedule_event( time(), 'every_two_days', 'adminsp_cron_hook' );
    }
    }

    //Hook into the action that'll fire every 48 hours

    if ((get_option('adminsp_remove_admin-notices')) == 'yes') {
     add_action( 'adminsp_cron_hook', 'adminsp_cron_function' );

    //Function of deleting transients via cron
    function adminsp_cron_function() {
        global $wpdb; 
        $sql = 'DELETE FROM ' . $wpdb->options . ' WHERE option_name LIKE ("_transient_%") or (option_name LIKE "_site_transient_%")'; 
        $wpdb->query($sql); 
    }
}

// Remove Link rel=shortlink from http

if ((get_option('adminsp_remove_shortlink')) == 'yes') {
    remove_action('template_redirect', 'wp_shortlink_header', 11);
}

//Remove WordPress version

if ((get_option('adminsp_remove_wp_version')) == 'yes') {
    remove_action('wp_head', 'wp_generator');
}
//Remove RSD Link
if ((get_option('adminsp_remove_rsd_link')) == 'yes') {
    remove_action('wp_head', 'rsd_link');
}
//Remove WLW Link
if ((get_option('adminsp_remove_wlw_link')) == 'yes') {
    remove_action('wp_head', 'wlwmanifest_link');
}

//Defer parsing of JS
if ((get_option('adminsp_defer_js')) == 'yes') {
    function adminsp_defer_parsing_of_js( $url ) {
        if ( is_user_logged_in() ) return $url; //don't break WP Admin
        if ( FALSE === strpos( $url, '.js' ) ) return $url;
        if ( strpos( $url, 'jquery.js' ) ) return $url;
        return str_replace( ' src', ' defer src', $url );
    }
    add_filter( 'script_loader_tag', 'adminsp_defer_parsing_of_js', 10 );
}

//Removing Emojis
if ((get_option('adminsp_remove_emojis')) == 'yes') {
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}

//Removing Query Strings from Static resources

if ((get_option('adminsp_remove_querystrings')) == 'yes') {
    function adminsp_remove_script_version( $src ){ 
        $parts = explode( '?', $src );  
        return $parts[0]; 
    } 
    add_filter( 'script_loader_src', 'adminsp_remove_script_version', 15, 1 ); 
    add_filter( 'style_loader_src', 'adminsp_remove_script_version', 15, 1 );
}

//Disabling XML-RPC API
if ((get_option('adminsp_disable_xmlrpc')) == 'yes') {
    add_filter('xmlrpc_enabled', '__return_false');
}

//Remove Admin footer Text
if ((get_option('adminsp_remove_admin_footer_text')) == 'yes') {
    add_filter( 'admin_footer_text', '__return_false' );
}

//Remove S.W.org DNS prefetch
if ((get_option('adminsp_remove_sworg_prefetch')) == 'yes') {
    add_action( 'init', 'adminsp_remove_dns_prefetch' );

    function  adminsp_remove_dns_prefetch () {
       remove_action( 'wp_head', 'wp_resource_hints', 2, 99 );
    }
}

///////// Optimize the DB every single day

if ((get_option('adminsp_optimize_database_daily')) == 'yes') {
function adminsp_optimize_database() {
  global $wpdb;
  $tables = $wpdb->get_results('SHOW TABLES', ARRAY_N);
  foreach ($tables as $table) {
    $wpdb->query('OPTIMIZE TABLE '.$table[0]);
  }
}

// Schedule the optimization function to run periodically
function adminsp_schedule_database_optimization() {
  if (!wp_next_scheduled('adminsp_wp_optimize_database')) {
    wp_schedule_event(time(), 'daily', 'adminsp_wp_optimize_database');
  }
}

// Hook into the 'wp' action to schedule the optimization function
add_action('wp', 'adminsp_schedule_database_optimization');

// Hook into the 'adminsp_wp_optimize_database' action to run the optimization function
add_action('adminsp_wp_optimize_database', 'adminsp_optimize_database');
}

// Minify HTML, CSS and JS
if ((get_option('adminsp_optimize_html_css_js')) == 'yes') {
function adminsp_minify_html_output( $output ) {
    if ( is_admin() ) {
        return $output;
    }

    $search = array(
        '/\>[^\S ]+/s',  // strip whitespaces after tags, except space
        '/[^\S ]+\</s',  // strip whitespaces before tags, except space
        '/(\s)+/s'       // shorten multiple whitespace sequences
    );
    $replace = array(
        '>',
        '<',
        '\\1'
    );
    $output = preg_replace( $search, $replace, $output );
    return $output;
}
add_filter( 'wp_loaded', 'adminsp_minify_html_output' );
}