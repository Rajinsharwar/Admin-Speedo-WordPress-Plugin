<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function admin_speedo_settings(){
    ?>
    
    <div class="wrap">
    <h1><?php echo esc_html( "Manage Settings" ); ?></h1>
    </div>
    </br>
    </br>

    <!-- Section for dropdown of Logged In User -->

    <?php
    print(
        __( 'Select the options which you want to optimize (If you feel any changes here is not taking place, please refresh this page after hitting save) ' ));
        ?>
    <form method=post>
    </br>
    </br>
    <?php
    if(!empty($_POST['adminsp_jquery_to_footer'])) {
          
        $recieved1=sanitize_text_field($_POST['adminsp_jquery_to_footer']);
            update_option('adminsp_jquery_to_footer', $recieved1, $autoload = 'yes');  
          }
    $value1 = get_option( 'adminsp_jquery_to_footer' );
    ?>
    <input type='hidden' name='adminsp_jquery_to_footer' value='no'>
    <label><input type='checkbox' name='adminsp_jquery_to_footer' <?php 
    checked( esc_attr( $value1 ), 'yes' );
    ?> value='yes'> <?php 
    esc_attr_e( 'Move JQuery to Footer' );
    ?></label></br>
    </br>
    <?php
    if(!empty($_POST['adminsp_reduce_queried_fields'])) {
          
        $recieved2=sanitize_text_field($_POST['adminsp_reduce_queried_fields']);
            update_option('adminsp_reduce_queried_fields', $recieved2, $autoload = 'yes');  
          }
    $value2 = get_option( 'adminsp_reduce_queried_fields' );
    ?>
    <input type='hidden' name='adminsp_reduce_queried_fields' value='no'>
    <label><input type='checkbox' name='adminsp_reduce_queried_fields' <?php 
    checked( esc_attr( $value2 ), 'yes' );
    ?> value='yes'> <?php 
    esc_attr_e( 'Reduce Number of Queried Fields' );
    ?></label>
    </br>
    </br>
    <?php
    if(!empty($_POST['adminsp_remove_admin_widgets'])) {
          
        $recieved3=sanitize_text_field($_POST['adminsp_remove_admin_widgets']);
            update_option('adminsp_remove_admin_widgets', $recieved3, $autoload = 'yes');  
          }
    $value3 = get_option( 'adminsp_remove_admin_widgets' );
    ?>
    <input type='hidden' name='adminsp_remove_admin_widgets' value='no'>
    <label><input type='checkbox' name='adminsp_remove_admin_widgets' <?php 
    checked( esc_attr( $value3 ), 'yes' );
    ?> value='yes'> <?php 
    esc_attr_e( 'Remove Admin Widgets from Dashboard' );
    ?></label>
    </br></br>
    <?php
    if(!empty($_POST['adminsp_remove_template_editor'])) {
          
        $recieved4=sanitize_text_field($_POST['adminsp_remove_template_editor']);
            update_option('adminsp_remove_template_editor', $recieved4, $autoload = 'yes');  
          }
    $value4 = get_option( 'adminsp_remove_template_editor' );
    ?>
    <input type='hidden' name='adminsp_remove_template_editor' value='no'>
    <label><input type='checkbox' name='adminsp_remove_template_editor' <?php 
    checked( esc_attr( $value4 ), 'yes' );
    ?> value='yes'> <?php 
    esc_attr_e( 'Remove Template Editor' );
    ?></label>
    </br></br>
    <?php
    if(!empty($_POST['adminsp_limit_wp_heartbeat'])) {
          
        $recieved5=sanitize_text_field($_POST['adminsp_limit_wp_heartbeat']);
            update_option('adminsp_limit_wp_heartbeat', $recieved5, $autoload = 'yes');  
          }
    $value5 = get_option( 'adminsp_limit_wp_heartbeat' );
    ?>
    <input type='hidden' name='adminsp_limit_wp_heartbeat' value='no'>
    <label><input type='checkbox' name='adminsp_limit_wp_heartbeat' <?php 
    checked( esc_attr( $value5 ), 'yes' );
    ?> value='yes'> <?php 
    esc_attr_e( 'Limit WordPress HeartBeat' );
    ?></label>
    </br></br>
    <?php
    if(!empty($_POST['adminsp_turn_off_jetpack_promo'])) {
          
        $recieved6=sanitize_text_field($_POST['adminsp_turn_off_jetpack_promo']);
            update_option('adminsp_turn_off_jetpack_promo', $recieved6, $autoload = 'yes');  
          }
    $value6 = get_option( 'adminsp_turn_off_jetpack_promo' );
    ?>
    <input type='hidden' name='adminsp_turn_off_jetpack_promo' value='no'>
    <label><input type='checkbox' name='adminsp_turn_off_jetpack_promo' <?php 
    checked( esc_attr( $value6 ), 'yes' );
    ?> value='yes'> <?php 
    esc_attr_e( 'Turn Off Jetpack Promotions' );
    ?></label>
    </br></br>
    <?php
    if(!empty($_POST['adminsp_turn_off_ext_http_calls'])) {
          
        $recieved7=sanitize_text_field($_POST['adminsp_turn_off_ext_http_calls']);
            update_option('adminsp_turn_off_ext_http_calls', $recieved7, $autoload = 'yes');  
          }
    $value7 = get_option( 'adminsp_turn_off_ext_http_calls' );
    ?>
    <input type='hidden' name='adminsp_turn_off_ext_http_calls' value='no'>
    <label><input type='checkbox' name='adminsp_turn_off_ext_http_calls' <?php 
    checked( esc_attr( $value7 ), 'yes' );
    ?> value='yes'> <?php 
    esc_attr_e( 'Disable external HTTP API calls in Wordpress Admin' );
    ?></label>
    </br></br>
    <?php
    if(!empty($_POST['adminsp_remove_admin-notices'])) {
          
        $recieved8=sanitize_text_field($_POST['adminsp_remove_admin-notices']);
            update_option('adminsp_remove_admin-notices', $recieved8, $autoload = 'yes');  
          }
    $value8 = get_option( 'adminsp_remove_admin-notices' );
    ?>
    <input type='hidden' name='adminsp_remove_admin-notices' value='no'>
    <label><input type='checkbox' name='adminsp_remove_admin-notices' <?php 
    checked( esc_attr( $value8 ), 'yes' );
    ?> value='yes'> <?php 
    esc_attr_e( 'Remove all Admin Notices' );
    ?>
    </label>
    </br></br>
    <?php
    if(!empty($_POST['adminsp_remove_marketing_hub'])) {
          
        $recieved9=sanitize_text_field($_POST['adminsp_remove_marketing_hub']);
            update_option('adminsp_remove_marketing_hub', $recieved9, $autoload = 'yes');  
          }
    $value9 = get_option( 'adminsp_remove_marketing_hub' );
    ?>
    <input type='hidden' name='adminsp_remove_marketing_hub' value='no'>
    <label><input type='checkbox' name='adminsp_remove_marketing_hub' <?php 
    checked( esc_attr( $value9 ), 'yes' );
    ?> value='yes'> <?php 
    esc_attr_e( 'Remove Marketing HUB of Woocommerce' );
    ?>
    </label>
    </br></br>
    <?php
    if(!empty($_POST['adminsp_remove_woo_metabox'])) {
          
        $recieved10=sanitize_text_field($_POST['adminsp_remove_woo_metabox']);
            update_option('adminsp_remove_woo_metabox', $recieved10, $autoload = 'yes');  
          }
    $value10 = get_option( 'adminsp_remove_woo_metabox' );
    ?>
    <input type='hidden' name='adminsp_remove_woo_metabox' value='no'>
    <label><input type='checkbox' name='adminsp_remove_woo_metabox' <?php 
    checked( esc_attr( $value10 ), 'yes' );
    ?> value='yes'> <?php 
    esc_attr_e( 'Remove Woocommerce MetaBox' );
    ?>
    </label>
    </br></br>
    <?php
    if(!empty($_POST['adminsp_disable_setup_dash_woo'])) {
          
        $recieved11=sanitize_text_field($_POST['adminsp_disable_setup_dash_woo']);
            update_option('adminsp_disable_setup_dash_woo', $recieved11, $autoload = 'yes');  
          }
    $value11 = get_option( 'adminsp_disable_setup_dash_woo' );
    ?>
    <input type='hidden' name='adminsp_disable_setup_dash_woo' value='no'>
    <label><input type='checkbox' name='adminsp_disable_setup_dash_woo' <?php 
    checked( esc_attr( $value11 ), 'yes' );
    ?> value='yes'> <?php 
    esc_attr_e( 'Disable setup dashboard for Woocommerce' );
    ?>
    </label>
    </br></br>
    <?php
    if(!empty($_POST['adminsp_remove_marketplace_sugg_woo'])) {
          
        $recieved12=sanitize_text_field($_POST['adminsp_remove_marketplace_sugg_woo']);
            update_option('adminsp_remove_marketplace_sugg_woo', $recieved12, $autoload = 'yes');  
          }
    $value12 = get_option( 'adminsp_remove_marketplace_sugg_woo' );
    ?>
    <input type='hidden' name='adminsp_remove_marketplace_sugg_woo' value='no'>
    <label><input type='checkbox' name='adminsp_remove_marketplace_sugg_woo' <?php 
    checked( esc_attr( $value12 ), 'yes' );
    ?> value='yes'> <?php 
    esc_attr_e( 'Remove Marketplace suggestions for Woocommerce' );
    ?>
    </label>
    </br></br>
    <?php
    if(!empty($_POST['adminsp_remove_woo_widgets'])) {
          
        $recieved13=sanitize_text_field($_POST['adminsp_remove_woo_widgets']);
            update_option('adminsp_remove_woo_widgets', $recieved13, $autoload = 'yes');  
          }
    $value13 = get_option( 'adminsp_remove_woo_widgets' );
    ?>
    <input type='hidden' name='adminsp_remove_woo_widgets' value='no'>
    <label><input type='checkbox' name='adminsp_remove_woo_widgets' <?php 
    checked( esc_attr( $value13 ), 'yes' );
    ?> value='yes'> <?php 
    esc_attr_e( 'Remove Woocommerce Widgets' );
    ?>
    </label>
    </br></br>
    <?php
    if(!empty($_POST['adminsp_remove_wp_pass_meter'])) {
          
        $recieved14=sanitize_text_field($_POST['adminsp_remove_wp_pass_meter']);
            update_option('adminsp_remove_wp_pass_meter', $recieved14, $autoload = 'yes');  
          }
    $value14 = get_option( 'adminsp_remove_wp_pass_meter' );
    ?>
    <input type='hidden' name='adminsp_remove_wp_pass_meter' value='no'>
    <label><input type='checkbox' name='adminsp_remove_wp_pass_meter' <?php 
    checked( esc_attr( $value14 ), 'yes' );
    ?> value='yes'> <?php 
    esc_attr_e( 'Remove WordPress Password Strength Meter' );
    ?>
    </label>
    </br></br>
    <?php
    if(!empty($_POST['adminsp_remove_elementor_widg_dash'])) {
          
        $recieved15=sanitize_text_field($_POST['adminsp_remove_elementor_widg_dash']);
            update_option('adminsp_remove_elementor_widg_dash', $recieved15, $autoload = 'yes');  
          }
    $value15 = get_option( 'adminsp_remove_elementor_widg_dash' );
    ?>
    <input type='hidden' name='adminsp_remove_elementor_widg_dash' value='no'>
    <label><input type='checkbox' name='adminsp_remove_elementor_widg_dash' <?php 
    checked( esc_attr( $value15 ), 'yes' );
    ?> value='yes'> <?php 
    esc_attr_e( 'Remove Elementor Widgets Dashboard' );
    ?>
    </label>
    </br></br>
    <?php
    if(!empty($_POST['adminsp_sched_transients_clear'])) {
          
        $recieved16=sanitize_text_field($_POST['adminsp_sched_transients_clear']);
            update_option('adminsp_sched_transients_clear', $recieved16, $autoload = 'yes');  
          }
    $value16 = get_option( 'adminsp_sched_transients_clear' );
    ?>
    <input type='hidden' name='adminsp_sched_transients_clear' value='no'>
    <label><input type='checkbox' name='adminsp_sched_transients_clear' <?php 
    checked( esc_attr( $value16 ), 'yes' );
    ?> value='yes'> <?php 
    esc_attr_e( 'Clear Transients every Two days' );
    ?>
    </label>
    </br></br>
    <?php
    if(!empty($_POST['adminsp_remove_shortlink'])) {
          
        $recieved17=sanitize_text_field($_POST['adminsp_remove_shortlink']);
            update_option('adminsp_remove_shortlink', $recieved17, $autoload = 'yes');  
          }
    $value17 = get_option( 'adminsp_remove_shortlink' );
    ?>
    <input type='hidden' name='adminsp_remove_shortlink' value='no'>
    <label><input type='checkbox' name='adminsp_remove_shortlink' <?php 
    checked( esc_attr( $value17 ), 'yes' );
    ?> value='yes'> <?php 
    esc_attr_e( 'Remove Link rel=shortlink from HTTP' );
    ?>
    </label>
    </br></br>
    <?php
    if(!empty($_POST['adminsp_remove_wp_version'])) {
          
        $recieved18=sanitize_text_field($_POST['adminsp_remove_wp_version']);
            update_option('adminsp_remove_wp_version', $recieved18, $autoload = 'yes');  
          }
    $value18 = get_option( 'adminsp_remove_wp_version' );
    ?>
    <input type='hidden' name='adminsp_remove_wp_version' value='no'>
    <label><input type='checkbox' name='adminsp_remove_wp_version' <?php 
    checked( esc_attr( $value18 ), 'yes' );
    ?> value='yes'> <?php 
    esc_attr_e( 'Remove WordPress Version from Header Request' );
    ?>
    </label>
    </br></br>
    <?php
    if(!empty($_POST['adminsp_remove_rsd_link'])) {
          
        $recieved19=sanitize_text_field($_POST['adminsp_remove_rsd_link']);
            update_option('adminsp_remove_rsd_link', $recieved19, $autoload = 'yes');  
          }
    $value19 = get_option( 'adminsp_remove_rsd_link' );
    ?>
    <input type='hidden' name='adminsp_remove_rsd_link' value='no'>
    <label><input type='checkbox' name='adminsp_remove_rsd_link' <?php 
    checked( esc_attr( $value19 ), 'yes' );
    ?> value='yes'> <?php 
    esc_attr_e( 'Remove RSD Link' );
    ?>
    </label>
    </br></br>
    <?php
    if(!empty($_POST['adminsp_remove_wlw_link'])) {
          
        $recieved20=sanitize_text_field($_POST['adminsp_remove_wlw_link']);
            update_option('adminsp_remove_wlw_link', $recieved20, $autoload = 'yes');  
          }
    $value20 = get_option( 'adminsp_remove_wlw_link' );
    ?>
    <input type='hidden' name='adminsp_remove_wlw_link' value='no'>
    <label><input type='checkbox' name='adminsp_remove_wlw_link' <?php 
    checked( esc_attr( $value20 ), 'yes' );
    ?> value='yes'> <?php 
    esc_attr_e( 'Remove WLW Link' );
    ?>
    </label>
    </br></br>
    <?php
    if(!empty($_POST['adminsp_defer_js'])) {
          
        $recieved21=sanitize_text_field($_POST['adminsp_defer_js']);
            update_option('adminsp_defer_js', $recieved21, $autoload = 'yes');  
          }
    $value21 = get_option( 'adminsp_defer_js' );
    ?>
    <input type='hidden' name='adminsp_defer_js' value='no'>
    <label><input type='checkbox' name='adminsp_defer_js' <?php 
    checked( esc_attr( $value21 ), 'yes' );
    ?> value='yes'> <?php 
    esc_attr_e( 'Defer Parsing of JS' );
    ?>
    </label>
    </br></br>
    <?php
    if(!empty($_POST['adminsp_remove_emojis'])) {
          
        $recieved22=sanitize_text_field($_POST['adminsp_remove_emojis']);
            update_option('adminsp_remove_emojis', $recieved22, $autoload = 'yes');  
          }
    $value22 = get_option( 'adminsp_remove_emojis' );
    ?>
    <input type='hidden' name='adminsp_remove_emojis' value='no'>
    <label><input type='checkbox' name='adminsp_remove_emojis' <?php 
    checked( esc_attr( $value22 ), 'yes' );
    ?> value='yes'> <?php 
    esc_attr_e( 'Remove WordPress Emojis' );
    ?>
    </label>
    </br></br>
    <?php
    if(!empty($_POST['adminsp_remove_querystrings'])) {
          
        $recieved23=sanitize_text_field($_POST['adminsp_remove_querystrings']);
            update_option('adminsp_remove_querystrings', $recieved23, $autoload = 'yes');  
          }
    $value23 = get_option( 'adminsp_remove_querystrings' );
    ?>
    <input type='hidden' name='adminsp_remove_querystrings' value='no'>
    <label><input type='checkbox' name='adminsp_remove_querystrings' <?php 
    checked( esc_attr( $value23 ), 'yes' );
    ?> value='yes'> <?php 
    esc_attr_e( 'Remove Query Strings from Static Resources' );
    ?>
    </label>
    </br></br>
    <?php
    if(!empty($_POST['adminsp_disable_xmlrpc'])) {
          
        $recieved24=sanitize_text_field($_POST['adminsp_disable_xmlrpc']);
            update_option('adminsp_disable_xmlrpc', $recieved24, $autoload = 'yes');  
          }
    $value24 = get_option( 'adminsp_disable_xmlrpc' );
    ?>
    <input type='hidden' name='adminsp_disable_xmlrpc' value='no'>
    <label><input type='checkbox' name='adminsp_disable_xmlrpc' <?php 
    checked( esc_attr( $value24 ), 'yes' );
    ?> value='yes'> <?php 
    esc_attr_e( 'Disable XML-RPC API' );
    ?>
    </label>
    </br></br>
    <?php
    if(!empty($_POST['adminsp_remove_admin_footer_text'])) {
          
        $recieved25=sanitize_text_field($_POST['adminsp_remove_admin_footer_text']);
            update_option('adminsp_remove_admin_footer_text', $recieved25, $autoload = 'yes');  
          }
    $value25 = get_option( 'adminsp_remove_admin_footer_text' );
    ?>
    <input type='hidden' name='adminsp_remove_admin_footer_text' value='no'>
    <label><input type='checkbox' name='adminsp_remove_admin_footer_text' <?php 
    checked( esc_attr( $value25 ), 'yes' );
    ?> value='yes'> <?php 
    esc_attr_e( 'Remove Admin Footer TEXT' );
    ?>
    </label>
    </br></br>
    <?php
    if(!empty($_POST['adminsp_remove_sworg_prefetch'])) {
          
        $recieved26=sanitize_text_field($_POST['adminsp_remove_sworg_prefetch']);
            update_option('adminsp_remove_sworg_prefetch', $recieved26, $autoload = 'yes');  
          }
    $value26 = get_option( 'adminsp_remove_sworg_prefetch' );
    ?>
    <input type='hidden' name='adminsp_remove_sworg_prefetch' value='no'>
    <label><input type='checkbox' name='adminsp_remove_sworg_prefetch' <?php 
    checked( esc_attr( $value26 ), 'yes' );
    ?> value='yes'> <?php 
    esc_attr_e( 'Remove DNS Prefetch to S.W.ORG' );
    ?>
    </br>
    </br>
    <?php
    if(!empty($_POST['adminsp_optimize_database_daily'])) {
          
        $recieved27=sanitize_text_field($_POST['adminsp_optimize_database_daily']);
            update_option('adminsp_optimize_database_daily', $recieved27, $autoload = 'yes');  
          }
    $value27 = get_option( 'adminsp_optimize_database_daily' );
    ?>
    <input type='hidden' name='adminsp_optimize_database_daily' value='no'>
    <label><input type='checkbox' name='adminsp_optimize_database_daily' <?php 
    checked( esc_attr( $value27 ), 'yes' );
    ?> value='yes'> <?php 
    esc_attr_e( 'Schedule optimization of Database Daily' );
    ?></label>
    </label>
      <div>
      <?php submit_button(); ?>
      </div>
    </form>

    <?php
}