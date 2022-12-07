<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Adding values in the DB
if ( !isset( get_option( 'adminsp_jquery_to_footer' )['no'] ) ) {
    add_option ('adminsp_jquery_to_footer', 'no');
}
if ( !isset( get_option( 'adminsp_reduce_queried_fields' )['no'] ) ) {
    add_option ('adminsp_reduce_queried_fields', 'no');
}
if ( !isset( get_option( 'adminsp_remove_admin_widgets' )['no'] ) ) {
    add_option ('adminsp_remove_admin_widgets', 'no');
}
if ( !isset( get_option( 'adminsp_remove_template_editor' )['no'] ) ) {
    add_option ('adminsp_remove_template_editor', 'no');
}
if ( !isset( get_option( 'adminsp_limit_wp_heartbeat' )['no'] ) ) {
    add_option ('adminsp_limit_wp_heartbeat', 'no');
}
if ( !isset( get_option( 'adminsp_turn_off_jetpack_promo' )['no'] ) ) {
    add_option ('adminsp_turn_off_jetpack_promo', 'no');
}
if ( !isset( get_option( 'adminsp_turn_off_ext_http_calls' )['no'] ) ) {
    add_option ('adminsp_turn_off_ext_http_calls', 'no');
}
if ( !isset( get_option( 'adminsp_remove_admin-notices' )['no'] ) ) {
    add_option ('adminsp_remove_admin-notices', 'no');
}
if ( !isset( get_option( 'adminsp_remove_marketing_hub' )['no'] ) ) {
    add_option ('adminsp_remove_marketing_hub', 'no');
}
if ( !isset( get_option( 'adminsp_remove_woo_metabox
' )['no'] ) ) {
    add_option ('adminsp_remove_woo_metabox
', 'no');
}
if ( !isset( get_option( 'adminsp_disable_setup_dash_woo' )['no'] ) ) {
    add_option ('adminsp_disable_setup_dash_woo', 'no');
}
if ( !isset( get_option( 'adminsp_remove_marketplace_sugg_woo' )['no'] ) ) {
    add_option ('adminsp_remove_marketplace_sugg_woo', 'no');
}
if ( !isset( get_option( 'adminsp_remove_woo_widgets' )['no'] ) ) {
    add_option ('adminsp_remove_woo_widgets', 'no');
}
if ( !isset( get_option( 'adminsp_remove_wp_pass_meter' )['no'] ) ) {
    add_option ('adminsp_remove_wp_pass_meter', 'no');
}
if ( !isset( get_option( 'adminsp_remove_elementor_widg_dash' )['no'] ) ) {
    add_option ('adminsp_remove_elementor_widg_dash', 'no');
}
if ( !isset( get_option( 'adminsp_sched_transients_clear' )['no'] ) ) {
    add_option ('adminsp_sched_transients_clear', 'no');
}
if ( !isset( get_option( 'adminsp_remove_shortlink' )['no'] ) ) {
    add_option ('adminsp_remove_shortlink', 'no');
}
if ( !isset( get_option( 'adminsp_remove_wp_version' )['no'] ) ) {
    add_option ('adminsp_remove_wp_version', 'no');
}
if ( !isset( get_option( 'adminsp_remove_rsd_link' )['no'] ) ) {
    add_option ('adminsp_remove_rsd_link', 'no');
}
if ( !isset( get_option( 'adminsp_remove_wlw_link' )['no'] ) ) {
    add_option ('adminsp_remove_wlw_link', 'no');
}
if ( !isset( get_option( 'adminsp_defer_js' )['no'] ) ) {
    add_option ('adminsp_defer_js', 'no');
}
if ( !isset( get_option( 'adminsp_remove_emojis' )['no'] ) ) {
    add_option ('adminsp_remove_emojis', 'no');
}
if ( !isset( get_option( 'adminsp_remove_querystrings' )['no'] ) ) {
    add_option ('adminsp_remove_querystrings', 'no');
}
if ( !isset( get_option( 'adminsp_disable_xmlrpc' )['no'] ) ) {
    add_option ('adminsp_disable_xmlrpc', 'no');
}
if ( !isset( get_option( 'adminsp_remove_admin_footer_text' )['no'] ) ) {
    add_option ('adminsp_remove_admin_footer_text', 'no');
}
if ( !isset( get_option( 'adminsp_remove_sworg_prefetch' )['no'] ) ) {
    add_option ('adminsp_remove_sworg_prefetch', 'no');
}