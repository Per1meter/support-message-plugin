<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// creating custom page in menu

add_action('admin_menu', 'smp_queries_page_create');

function smp_queries_page_create() {
    $page_title = 'Queries';
    $menu_title = 'Queries';
    $capability = 'edit_posts';
    $menu_slug = 'queries';
    $function = 'smp_queries_general_page';
    $icon_url = '';
    $position = 98;

    add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
}

// style initialization

add_action('admin_init', 'smp_enqueue_style');

function smp_enqueue_style(){
    wp_enqueue_style( 'style' , plugins_url( 'assets/style.css',dirname(__FILE__)));
}


function smp_queries_general_page(){
$args = array(
    'post_type' => 'support',
    'post_status' => 'publish',
    'orderby'   => 'meta_value_num',
    'meta_key'  => 'support_message_priority',
    'order'   => 'DESC',
    'posts_per_page' => -1,
    );
    ?>
    <div class="queries-container">
        <h1 class="queries-title">Queries message</h1>
        <div class="message-block">
            <div class="message-success">Request added successfully</div>
            <div class="message-deleted">Request deleted successfully</div>
        </div>
        <table class="queries-table">
            <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Description</th>
                <th>Priority</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $query = new WP_Query($args);
            while ( $query->have_posts() ) {
                $query->the_post(); ?>
                <tr class="queries-post" post-id="<?php the_ID() ?>">
                    <td><?php the_title(); ?></td>
                    <td><?php echo get_field('support_message_author'); ?></td>
                    <td><?php echo get_field('support_message_description'); ?></td>
                    <td><?php echo get_field('support_message_priority'); ?></td>
                    <td><button class="queries-delete-button btn btn-danger">Delete</button></td>
                </tr>
                <?php
            }
            wp_reset_postdata(); ?>
            </tbody>
        </table>
    </div>
    <h2 class="queries-form-title">Add new queries message</h2>
    <form action = "<?php echo admin_url('admin-post.php');?>" method="post" class="queries-form">
        <input type="hidden" name="action" value="handler">
        <div class="row">
            <label for="queries-title">Title</label>
            <input type="text" name="queries-title">
        </div>
        <div class="row">
            <label for="queries-author">Author</label>
            <input type="text" name="queries-author">
        </div>
        <div class="row">
            <label for="queries-text">Message</label>
            <textarea name="queries-text"></textarea>
        </div>
        <div class="row row-flex">
            <select name="queries-priority" id="queries-priority">
                <option value="0">Low</option>
                <option value="1">High</option>
                <option value="2">Urgent</option>
            </select>

            <button type="submit" class="btn btn-primary" id="queries-submit">Add Queries</button>
        </div>
    </form><?php
}
