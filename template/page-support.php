<?php get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <div class="post-wrap">
            <?php
                $showQueries = get_option( 'option_name',  "1");
                if(!isset($showQueries['checkbox'])){
                    echo "<div><h2>You can not leave a queries today</h2></div>";
                }else{
                    $args = array(
                        'post_type' => 'support',
                        'post_status' => 'publish',
                        'orderby'   => 'meta_value_num',
                        'meta_key'  => 'support_message_priority',
                        'order'   => 'DESC',
                    );
                    $query = new WP_Query($args);
                    while ( $query->have_posts() ) {
                        $query->the_post(); ?>
                        <div class="post">
                            <h3 class="post-title"><?php the_title(); ?></h3>
                            <div>author : <?php echo get_field('support_message_author'); ?></div>
                            <div>description : <?php echo get_field('support_message_description'); ?></div>
                            <div>priority : <?php echo get_field('support_message_priority'); ?></div>
                        </div>
                        <?php
                    }
                    wp_reset_postdata();?>
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
                            <button type="submit" id="queries-submit">Add Queries</button>
                        </div>
                    </form><?php
                }?>
        </div>
    </main>
</div>

<?php get_footer(); ?>
