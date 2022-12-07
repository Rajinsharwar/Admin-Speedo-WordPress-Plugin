<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Rendering the admin menu

add_action( 'admin_menu', 'adminsp_menu' );

 
function adminsp_menu(){
 
    add_menu_page(
        'Admin Speedo', // page <title>Title</title>
        'Admin Speedo', // link text
        'manage_options', // user capabilities
        'admin_speedo', // page slug
        'admin_speedo_settings', // Function to print the page content
        'dashicons-shortcode', // icon (from Dashicons)
        75 // menu position
    );
}