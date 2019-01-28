<?php
/**
 *Plugin Name: Support Message Plugin (smp)
 *Description: Add Support Message post type
 *Version: 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// define the absolute plugin path for includes

define( 'SMP_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );

//Includes

include( SMP_PLUGIN_PATH . 'admin/queries-cpt.php' ); // registration CPT
include( SMP_PLUGIN_PATH . 'admin/queries-page.php' ); // creating custom page in menu
include( SMP_PLUGIN_PATH . 'admin/queries-settings.php' ); // creating settings page in queries plugin
include( SMP_PLUGIN_PATH . 'admin/queries-delete.php' ); // delete queries massage
include( SMP_PLUGIN_PATH . 'public/queries-send-form.php' ); // send form

// Include support template page

add_filter('template_include', 'smp_support_page_template');
function smp_support_page_template( $template ){
    if( is_page('support') ){
        return wp_normalize_path( WP_PLUGIN_DIR ) . '/support-message/template/page-support.php';
    }
    return $template;
}