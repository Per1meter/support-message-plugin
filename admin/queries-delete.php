<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// js script initialization

add_action('admin_init', 'smp_enqueue_js_scripts');

function smp_enqueue_js_scripts(){
    wp_enqueue_script( 'script' , plugins_url( 'assets/script.js',dirname(__FILE__)));
}

add_action( 'wp_ajax_delete_post', 'my_action_callback' );
function my_action_callback() {
    wp_delete_post( $_POST['id'], false );
    wp_die();
}