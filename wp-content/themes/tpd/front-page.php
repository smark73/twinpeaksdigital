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

// Only use pagination on custom loop
remove_action( 'genesis_after_endwhile', 'genesis_posts_nav' );
//customize the text in the pagination
add_filter('genesis_next_link_text', 'our_next_pagination_text');
function our_next_pagination_text( $text ){
    return 'Next';
}

        
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

                        global $post;
                        // get slug of home page
                        // in case someone changes permalink - which breaks the following fn's that rely on it
                        $hp_slug = $post->post_name;

                        $home_top_post_args = array(
                            'post_type' => 'page',
                            'pagename' => $hp_slug,
                            //'post_name__in' => ['home', 'twin-peaks-digital'],
                            //'post_status' => 'publish',
                            //'posts_per_page' => 1,
                        );
                        $home_top_post = new WP_Query( $home_top_post_args );
                        if( $home_top_post->have_posts() ){
                            while ( $home_top_post->have_posts() ) {
                                $home_top_post->the_post();
                                //global $post;
                                echo get_the_content( $post->ID, 'home-top-post' );
                            }
                        } else {
                            //echo "no posts";
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
                        'post_type' => 'page',
                        'pagename' => $hp_slug . '/home-btm-p',
                        //'pagename' => 'home/home-btm-p'
                        //didnt work 'post_name__in' => ['home/home-btm-p', 'twin-peaks-digital/home-btm-p'],
                        //'post_status' => 'publish',
                        //'posts_per_page' => 1,
                    );
                    $home_mid_post = new WP_Query( $home_mid_post_args );
                    if( $home_mid_post->have_posts() ){
                        while ( $home_mid_post->have_posts() ) {
                            $home_mid_post->the_post();
                            //global $post;
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
                    //if query var is set use it; otherwise, initialize it to 1
                    $page = get_query_var('page') ? get_query_var( 'page' ) : 1;
                    //how many to show
                    $display_count = 1;
                    //calc offset
                    $offset = ( $page - 1 ) * $display_count;
            
                    $home_btm_post_args = array(
                        'post_type' => 'post',
                        //'pagename' => 'home/home-btm-p',
                        'orderby' => 'date',
                        'order' => 'desc',
                        'post_status' => 'publish',
                        'offset' => $offset,
                        'posts_per_page' => $display_count,
                        'paged' => $page,
                    );
                    // in order to get pagination to work - must overwrite global wp_query here
                    global $wp_query;
                    $wp_query = new WP_Query( $home_btm_post_args );
                    if( $wp_query->have_posts() ){
                        while ( $wp_query->have_posts() ) {
                            $wp_query->the_post();
                            global $post;
                            //the_post();
                            the_title('<h4>', '</h4>');
                            the_content();
                        }
                        genesis_posts_nav();
                    }
                    wp_reset_query();
            ?>
        </div>
        
    </div>

    <?php
}


// footer scripts
    // add Google "sitelinks search box"
add_action('genesis_after_footer', 'add_scripts_to_btm');
function add_scripts_to_btm() {
    ?>
    <script type="application/ld+json">
    {
       "@context": "http://schema.org",
       "@type": "WebSite",
       "url": "https://twinpeaksdigital.com",
       "potentialAction": {
         "@type": "SearchAction",
         "target": "https://twinpeaksdigital.com/?s={search_term_string}",
         "query-input": "required name=search_term_string"
       }
    }
    </script>
    <script type="text/javascript">
        jQuery(document).ready(function(){
            // genesis post nav for the btm post pagination "Next" doesn't work so hide it
            jQuery('div.archive-pagination ul li.pagination-next').hide();
            // genesis post nav for the btm post pagination doesn't change active btn correctly here so we do it
            var curActivePg = <?php $cur_active_pg = get_query_var('page') ? get_query_var( 'page' ) : 1; echo $cur_active_pg; ?>;
            if(curActivePg !== 1){
                //change active btn from #1 to this one
                jQuery('div.archive-pagination ul li.active').removeClass('active');
                jQuery('div.archive-pagination ul li a:contains("<?php echo $cur_active_pg; ?>")').parent().addClass('active');
            }
        });
    </script>
    <?php
}

genesis();
