<?php

/*
Plugin Name: Twin Peaks Digital Custom Post Types
Plugin URI: http://www.twinpeaksdigital.com
Description: Creates the custom post types
Author: Stacy Mark
Version: 1.0
Author URI: http://www.stacymark.com/
*/

add_action('init', 'portfolio_post_type');

function portfolio_post_type(){
    $args = array(
            'labels' => array(
                'name' => __("Portfolio Videos"),
                'singular_name' => __('Portfolio Video'),
                'menu_name' => __('Portfolio Videos'),
                'all_items' => __('See All Videos'),
                'add_new' => __('Add New Video'),
                'add_new_item' => __('Add New Video'),
                'edit' => __('Edit'),
                'edit_item' => __('Edit Video'),
                'new_item' => __('New Video'),
                'view' => __('View Video'),
                'view_item' => __('View Video'),
                'search_items' => __('Search Portfolios'),
                'not_found' => __('No Videos'),
                'not_found_in_trash' => __('None in the trash'),
            ),
            'hierarchichal' => true,
            'supports' => true,
            'public' => true,
            'menu_position' => 20,
            'menu_icon' => plugins_url( 'icon-video.png', __FILE__ ),
            'has_archive' => true,
            'rewrite' => array('slug' => 'video-production-portfolio'),
            'supports' => array('title', 'excerpt', 'editor', 'thumbnail'),
            'description' => "Video and description for the portfolio page",
    );
    register_post_type('portfolio', $args);
}

//place custom fields on admin screen
function add_portfolio_box($post){
    add_meta_box(
            'portfolio_video',
            __('Vimeo Video Id'),
            'portfolio_fields',
            'portfolio',
            'normal',
            'core'
            );
}

add_action( 'add_meta_boxes_portfolio', 'add_portfolio_box' );

//function add_portfolio_box(){
   // add_meta_box('portfolio_video', 'Vimeo Video ID', 'portfolio_fields', 'portfolio', 'normal', 'core');
//}

//create custom fields 
function portfolio_fields (){
    global $post;
    $custom = get_post_custom($post->ID);
    $video_link = $custom['video_link'][0];
    ?>
    <p>
        <label>Vimeo Video ID</label><br />
        <input size='40' name='video_link' id='video_link' value='<?php echo $video_link; ?>' />
    </p>
    <?php
}

// save action
add_action('save_post', 'save_portfolio_attributes');
add_action('publish_post', 'save_portfolio_attributes');

function save_portfolio_attributes(){
    global $post;
    $v_id = intval($_POST["video_link"]);
    update_post_meta($post->ID, "video_link", $v_id);
}