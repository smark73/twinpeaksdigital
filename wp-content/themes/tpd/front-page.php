<?php

// Remove page header for front page
remove_action( 'genesis_header', 'genesis_header_markup_open', 5 );
//remove_action( 'genesis_header', 'genesis_do_header' );
remove_action( 'genesis_header', 'child_custom_header' );
remove_action( 'genesis_header', 'genesis_header_markup_close', 15 );

// force full width
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

// Remove Page Title
remove_action( 'genesis_post_title', 'genesis_do_post_title' );

add_action( 'genesis_after_header', 'child_home_top_loop' );

// remove all post info so just video shows
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
remove_action( 'genesis_entry_content', 'genesis_do_post_content' );
remove_action( 'genesis_entry_footer', 'genesis_post_meta' );
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );
//remove_action( 'genesis_before_post_content', 'genesis_post_info' );


        
/**
 * Home Top Content Area
 *
 */
function child_home_top_loop() {
    // ********* top
    ?>
    <div class="wrap home-top-wrap">
        <?php // hide this for now <div class="tagline"><span><?php //echo get_bloginfo('description'); ?><?php //</span></div> ?>
        <div class="home-top">
            <div class="home-left one-third first">
                <a href="/" title="Twin Peaks Digital Video Production">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/twin-peaks-digital.png" style="height:auto;width:auto;" alt="Twin Peaks Digital">
                </a>
                <div class="tagline"><span><?php echo get_bloginfo('description'); ?></span></div>
                <p><a href="/contact-us/" class="contact-ryan yellow">480.789.0619 | Contact &raquo;</a></p>
                
                <div class="home-social-icons">
                    <?php //genesis_widget_area( 'home-social' ); ?>
                </div>
            </div>
            <div class="home-right two-thirds" style="margin:0;padding:0">
                <?php
                    //genesis_widget_area( 'home-slider' );

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
                <br class="clearfix">
            </div>
        </div>
    </div><!--home-top-wrap-->

    <?php
}

genesis();
