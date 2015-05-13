<?php
/**
 * Functions
 *
 * @package      twinpeaksdigital.com
 * @author         Stacy Mark <stacy@ambitionsweb.com>
 * @copyright    Copyright (c) 2015, Stacy Mark
 * @license      http://opensource.org/licenses/gpl-2.0.php GNU Public License
 *
 */

// add more buttons to editor
function add_more_buttons($buttons) {
 $buttons[] = 'hr';
 $buttons[] = 'del';
 $buttons[] = 'sub';
 $buttons[] = 'sup';
 $buttons[] = 'fontselect';
 $buttons[] = 'fontsizeselect';
 $buttons[] = 'cleanup';
 $buttons[] = 'styleselect';
 return $buttons;
}
add_filter("mce_buttons_3", "add_more_buttons");

/**
 * Theme Setup
 *
 * This setup function attaches all of the site-wide functions 
 * to the correct actions and filters. All the functions themselves
 * are defined below this setup function.
 *
 */
add_action('genesis_setup', 'child_theme_setup');
function child_theme_setup(){
    
    //* Start the engine
    include_once( get_template_directory() . '/lib/init.php' );

    //* Child theme (do not remove)
    define( 'CHILD_THEME_NAME', 'Twin Peaks Digital (on Genesis)' );
    define( 'CHILD_THEME_URL', 'http://twinpeaksdigital.com/' );
    define( 'CHILD_THEME_VERSION', '1' );

    //* Enqueue Google Fonts
    add_action( 'wp_enqueue_scripts', 'genesis_sample_google_fonts' );
    function genesis_sample_google_fonts() {
            wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Lato:300,400,700', array(), CHILD_THEME_VERSION );
    }
    //* Add HTML5 markup structure
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );
    //* Add viewport meta tag for mobile browsers
    add_theme_support( 'genesis-responsive-viewport' );
    //* Add support for custom background
    add_theme_support( 'custom-background' );
    //* Add support for 3-column footer widgets
    add_theme_support( 'genesis-footer-widgets', 3 );


    //* Reposition the primary navigation menu
    remove_action( 'genesis_after_header', 'genesis_do_nav' );
    add_action( 'genesis_before_header', 'genesis_do_nav' );

    // REGISTER WIDGETS
    genesis_register_sidebar( array(
        'id' => 'home-slider',
        'name' => 'Home Slider',
        'description' => 'Widget Area to hold Home Page Slider ',
    ));
    
    // HEADER Customization
    remove_action( 'genesis_header', 'genesis_do_header' );
    add_action( 'genesis_header', 'child_custom_header' );
    function child_custom_header() {
        ?>
        <div class="pr-site-header">
            <a href="/" title="Paladin Radio - Freelance Sports Engineering">
                   <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/paladin-radio-black.png" style="height:auto;width:auto;margin:auto;" alt="Paladin Radio - Freelance Sports Audio Engineering">
             </a>
            <p class="logo-tag"><?php echo get_bloginfo('description');?></p>
        </div>
       <?php
    }
    
    // CUSTOMIZE GRID LOOP
    // http://www.billerickson.net/a-better-and-easier-grid-loop/
    add_action( 'pre_get_posts', 'child_grid_loop_query_args' );

    function child_grid_loop_query_args( $query ) {
        //If no query is specified, grab the main query
        global $wp_query;
        if( !isset( $query ) || empty( $query ) || !is_object( $query ) ) {
                $query = $wp_query;
        }
        
        // set the query loop  to only show 3 posts on home
        if( $query->is_main_query() && is_home() ) {
                $query->set( 'posts_per_page', 9 );
                $query->set('post_type', 'portfolio');
                //$query->set('paged', 0);
        } //else {
            //echo "change your settings in 'customize/static front page' to latest posts for the grid to work";
        //}
    }
    
    // grid loop classes on posts
    function home_grid_post_class( $classes ) {
            global $wp_query;
            //if not main query return or not front page
            if( ! $wp_query->is_main_query() || ! is_front_page() ) {
                    return $classes;
            }

            // if main query add our grid classes then return
            $classes[] = 'one-third';
            if( 0 == $wp_query->current_post || 0 == $wp_query->current_post % 3 ) {
                    $classes[] = 'first';
            }
            return $classes;
    }
    add_filter( 'post_class', 'home_grid_post_class' );
    
    
    // CUSTOM GRID LOOP VIDEO INSTEAD OF IMAGE
    add_filter( 'genesis_post_info', 'home_grid_loop_video' );
    function home_grid_loop_video( ){
        global $wp_query;
        $video = get_post_custom_values('video_link');
        echo '<div class="resp-vid-wrap">
                        <iframe src="//player.vimeo.com/video/' . $video[0] . ' frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen style="width:100%;height:auto;"></iframe>
                </div>';
    }
    
}