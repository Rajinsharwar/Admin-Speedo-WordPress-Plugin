<?php

/** Trigger this file when plugin is Uninstalled

*/

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! defined( 'WP_UNINSTALL_PLUGIN' )){
	die;
}

global $wpdb; 
$adminsp_uninstall_sql = 'DELETE FROM ' . $wpdb->options . ' WHERE option_name LIKE "adminsp_%"'; 
$wpdb->query($adminsp_uninstall_sql);
