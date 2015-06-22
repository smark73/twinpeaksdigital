<?php

// Remove page header for front page
//remove_action( 'genesis_header', 'genesis_header_markup_open', 5 );
//remove_action( 'genesis_header', 'genesis_do_header' );
//remove_action( 'genesis_header', 'child_custom_header' );
//remove_action( 'genesis_header', 'genesis_header_markup_close', 15 );

// force full width
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

// Remove Page Title
remove_action( 'genesis_post_title', 'genesis_do_post_title' );

// remove default loop
remove_action( 'genesis_loop', 'genesis_do_loop' );

add_action( 'genesis_after_header', 'child_home_loop' );

// remove all post info so just video shows
//remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
//remove_action( 'genesis_entry_content', 'genesis_do_post_content' );
//remove_action( 'genesis_entry_footer', 'genesis_post_meta' );
//remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
//remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );
//remove_action( 'genesis_before_post_content', 'genesis_post_info' );


        
/**
 * Home Top Content Area
 *
 */
function child_home_loop() {
    ?>
    <div class="wrap home-top-wrap">
        <div class="home-top">
            <div class="home-top-left one-third first">
                <div class="home-top-post">
                    <?php 
                        $home_top_post_args = array(
                            //'post_type' => 'page',
                            'pagename' => 'home'
                            //'post_status' => 'publish',
                            //'posts_per_page' => 1,
                        );
                        $home_top_post = new WP_Query( $home_top_post_args );
                        if( $home_top_post->have_posts() ){
                            while ( $home_top_post->have_posts() ) {
                                $home_top_post->the_post();
                                global $post;
                                echo get_the_content( $post->ID, 'home-top-post' );
                            }
                        }
                        wp_reset_query();
                    ?>
                </div>
            </div>
            <div class="home-top-right two-thirds">
                <?php
                    // video slider
                    genesis_widget_area( 'home-video-slider' );

                    $home_mid_post_args = array(
                        //'post_type' => 'page',
                        'pagename' => 'home/home-btm-p'
                        //'post_status' => 'publish',
                        //'posts_per_page' => 1,
                    );
                    $home_mid_post = new WP_Query( $home_mid_post_args );
                    if( $home_mid_post->have_posts() ){
                        while ( $home_mid_post->have_posts() ) {
                            $home_mid_post->the_post();
                            global $post;
                            echo get_the_content( $post->ID, 'home-btm-post' );
                        }
                    }
                    wp_reset_query();

                ?>
            </div>
            <br class="clearfix">
        </div>
        <div class="client-strip">
            <img src="<?php echo get_stylesheet_directory_uri();?>/images/client-logos.jpg" alt="Clients of Twin Peaks Digital">
        </div>

    </div><!--home-top-wrap-->
    
    <div class="wrap home-btm-wrap">
        <div class="home-btm-left one-third first">
            <?php
                genesis_widget_area( 'home-photo-slider' );
            ?>
        </div>
        <div class="home-btm-right two-thirds">
            <?php 
                    $home_btm_post_args = array(
                        'post_type' => 'post',
                        //'pagename' => 'home/home-btm-p'
                        //'post_status' => 'publish',
                        'posts_per_page' => 1,
                    );
                    $home_btm_post = new WP_Query( $home_btm_post_args );
                    if( $home_btm_post->have_posts() ){
                        while ( $home_btm_post->have_posts() ) {
                            $home_btm_post->the_post();
                            global $post;
                            //the_post();
                            the_title('<h4>', '</h4>');
                            the_content();
                        }
                    }
                    wp_reset_query();
            ?>
        </div>
        
    </div>

    <?php
}

genesis();
