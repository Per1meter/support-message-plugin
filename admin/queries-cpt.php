<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// registration CPT

add_action( 'init', 'smp_cpt_activation' );

function smp_cpt_activation(){
    register_post_type('support', array(
        'label'  => null,
        'labels' => array(
            'name'               => 'Support message',
            'singular_name'      => 'Support message',
            'add_new'            => 'Add new message',
            'add_new_item'       => 'Add new message',
            'edit_item'          => 'Edit message',
            'new_item'           => 'New message',
            'view_item'          => 'Show message',
            'search_items'       => 'Search message',
            'not_found'          => 'Message not found',
            'not_found_in_trash' => 'Message not found in trash',
            'parent_item_colon'  => '',
            'menu_name'          => 'Support messages',
        ),
        'description'         => '',
        'public'              => true,
        'menu_position'       => 98,
        'menu_icon'           => 'dashicons-groups',
        'hierarchical'        => false,
        'supports'            => array('title','page-attributes'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies'          => array(),
        'has_archive'         => false,
        'rewrite'             => true,
        'query_var'           => true,
    ) );
}

