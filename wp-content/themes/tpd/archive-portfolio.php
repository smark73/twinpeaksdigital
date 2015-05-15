<?php


add_action( 'genesis_after_header', 'portfolio_intro' );

function portfolio_intro(){
    ?>
    <div class="portfolio-intro">
        <h3><span style="font-style:italic;color:#2095f2;">Experience Makes the Difference</span>  <span class="vert-sep">|</span>  For additional videos visit our <a href="https://vimeo.com/channels/42610" target="_blank" class="terracotta bold">Vimeo channel</a> or our <a href="http://www.youtube.com/user/twinpeaksdigital" target="_blank" class="terracotta bold">YouTube Channel</a></h3>
    </div>
    <?php
}

/**
 * Portfolio Archive
 *
 */

/**
 * Display as Columns
 *
 */
function tpd_portfolio_post_class( $classes ) {
	
	global $wp_query;
	if( !$wp_query->is_main_query() ) 
		return $classes;
		
	$columns = 3;
	
	$column_classes = array( '', '', 'one-half', 'one-third', 'one-fourth', 'one-fifth', 'one-sixth' );
	$classes[] = $column_classes[$columns];
	if( 0 == $wp_query->current_post || 0 == $wp_query->current_post % $columns )
		$classes[] = 'first';
		
	return $classes;
}
add_filter( 'post_class', 'tpd_portfolio_post_class' );

// Remove items from loop
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
remove_action( 'genesis_entry_content', 'genesis_do_post_content' );
remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_open', 5 );
remove_action( 'genesis_entry_footer', 'genesis_post_meta' );
remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_close', 15 );

/**
 * Add Portfolio Video
 *
 */
function tpd_portfolio_video() {
    $video = get_post_custom_values('video_link');
    echo '<div class="resp-vid-wrap">
                    <iframe src="//player.vimeo.com/video/' . $video[0] . '" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen ></iframe>
            </div>';
}
add_action( 'genesis_entry_content', 'tpd_portfolio_video' );
add_filter( 'genesis_pre_get_option_content_archive_thumbnail', '__return_false' );

// Move Title below Image
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
add_action( 'genesis_entry_footer', 'genesis_entry_header_markup_open', 5 );
add_action( 'genesis_entry_footer', 'genesis_entry_header_markup_close', 15 );
add_action( 'genesis_entry_footer', 'genesis_do_post_title' );


genesis();