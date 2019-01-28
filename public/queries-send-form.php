<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// smp new queries send function

add_action( 'admin_post_handler', 'smp_queries_send' );
add_action( 'admin_post_nopriv_handler', 'smp_queries_send' );

function smp_queries_send(){
    if(isset($_POST['queries-title'])){
        $queriesTitle = $_POST['queries-title'];
    }
    if(isset($_POST['queries-author'])){
        $queriesAuthor = $_POST['queries-author'];
    }
    if(isset($_POST['queries-text'])){
        $queriesText = $_POST['queries-text'];
    }
    if(isset($_POST['queries-priority'])){
        $queriesPriority = $_POST['queries-priority'];
    }
    $post_data = array(
        'post_title'    => $queriesTitle,
        'post_status'   => 'publish',
        'post_type'     => 'support',
        'meta_input'    => array(
            'support_message_author'  => $queriesAuthor,
            'support_message_description'  => $queriesText,
            'support_message_priority'  => $queriesPriority ,
        ),
    );
    $location = $_SERVER['HTTP_REFERER'];
    wp_insert_post( wp_slash($post_data) );
    wp_redirect( $location );
    die();
}