<?php
/**
 * Plugin Name: Admin Speedo
 * Description: Speed-up your slow WordPress Admin Dashboard with one click. Turn off most of the unnecessary opions for your admin panel.
 * Author: Rajin Sharwar
 * Author URI: https://linkedin.com/in/rajinsharwar
 * Version: 2.0.0
 * Text Domain: adminsp
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}


require_once (plugin_dir_path(__FILE__). 'inc/validate.php');
require_once (plugin_dir_path(__FILE__). 'admin/admin-menu.php');
require_once (plugin_dir_path(__FILE__). 'admin/settings.php');
require_once (plugin_dir_path(__FILE__). 'inc/functions.php');