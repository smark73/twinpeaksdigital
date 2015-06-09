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
    
    //---------- FAVICON-------
    add_filter( 'genesis_pre_load_favicon', 'child_favicon_filter' );
    function child_favicon_filter( $favicon_url ) {
            $our_favicon = get_stylesheet_directory_uri() . "/images/favicon.ico";
            return $our_favicon;
    }
    //--------END FAVICON------------

    //-----REGISTER RESPONSIVE MENU SCRIPT---------
    /**
    * Enqueue responsive javascript
    * @author Ozzy Rodriguez
    * @todo Change 'prefix' to your theme's prefix
    */
    add_action( 'wp_enqueue_scripts', 'child_enqueue_scripts' );
    function child_enqueue_scripts() {
	wp_enqueue_script( 'child-responsive-menu', get_stylesheet_directory_uri() . '/lib/js/responsive-menu.js', array( 'jquery' ), '1.0.0', true );
    }
    //------ END RESPONSIVE MENU------------
    
    //* Reposition the primary navigation menu
    remove_action( 'genesis_after_header', 'genesis_do_nav' );
    add_action( 'genesis_before_header', 'genesis_do_nav' );

    // ----REGISTER WIDGETS -------
    genesis_register_sidebar( array(
        'id' => 'home-video-slider',
        'name' => 'Home Video Slider',
        'description' => 'Widget Area to hold Home Page Video Slider ',
    ));
    genesis_register_sidebar( array(
        'id' => 'home-photo-slider',
        'name' => 'Home Photo Slider',
        'description' => 'Widget Area to hold Home Page Photo Slider ',
    ));
    // -----END WIDGETS ------
    
    // -----REGISTER CUSTOM SIDEBARS
    
    genesis_register_sidebar(array(
        'name'=>'Services Sidebar',
        'id' => 'services-sidebar',
        'description' => 'Sidebar for the services page',
        'before_widget' => '<div id="%1$s"><div class="widget services-sidebar %2$s">',
        'after_widget'  => "</div></div>\n",
        'before_title'  => '<h4><span>',
        'after_title'   => "</span></h4>\n"
    ));
    add_action('get_header','services_change_sidebar');
    function services_change_sidebar() {
        if ( is_page( array(
                'services',
                'services/video-production-phoenix-az',
                'services/scottsdale-video-production',
                'services/flagstaff-sedona-video-production',
                'services/commercials',
                'services/corporate',
                'services/documentaries',
                'services/rates',
                'services/equipment',
                )
            )) {
            remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );
            add_action( 'genesis_sidebar', 'services_do_sidebar' );
        }
    }
    function services_do_sidebar(){
        dynamic_sidebar( 'services-sidebar');
    }
    
    genesis_register_sidebar(array(
        'name'=>'About Sidebar',
        'id' => 'about-sidebar',
        'description' => 'Sidebar for the about page',
        'before_widget' => '<div id="%1$s"><div class="widget services-sidebar %2$s">',
        'after_widget'  => "</div></div>\n",
        'before_title'  => '<h4><span>',
        'after_title'   => "</span></h4>\n"
    ));
    add_action('get_header','about_change_sidebar');
    function about_change_sidebar() {
        if ( is_page('about-twin-peaks-digital')) {
            remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );
            add_action( 'genesis_sidebar', 'about_do_sidebar' );
        }
    }
    function about_do_sidebar(){
        dynamic_sidebar( 'about-sidebar');
    }
    
    genesis_register_sidebar(array(
        'name'=>'Our Work Sidebar',
        'id' => 'our-work-sidebar',
        'description' => 'Sidebar for the our work page',
        'before_widget' => '<div id="%1$s"><div class="widget services-sidebar %2$s">',
        'after_widget'  => "</div></div>\n",
        'before_title'  => '<h4><span>',
        'after_title'   => "</span></h4>\n"
    ));
    add_action('get_header','our_work_change_sidebar');
    function our_work_change_sidebar() {
        if ( is_page('our-work')) {
            remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );
            add_action( 'genesis_sidebar', 'our_work_do_sidebar' );
        }
    }
    function our_work_do_sidebar(){
        dynamic_sidebar( 'our-work-sidebar');
    }
    
    //----END SIDEBARS ------
    
    //-----HEADER Customization------
    remove_action( 'genesis_header', 'genesis_do_header' );
    add_action( 'genesis_header', 'child_custom_header' );
    function child_custom_header() {
        ?>
        <div>
            <section class="tpd-logo one-third first">
                <a href="/" title="Twin Peaks Digital Video Production">
                       <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/twin-peaks-digital-video-production.png" alt="Twin Peaks Digital Video Production" class="tpd-logo">
                 </a>
            </section>
            <section class="tagline two-thirds second">
                <div clas="wrap">
                    <div class="two-thirds first">
                        <h1><?php echo get_bloginfo('description');?></h1>
                        <h2><a href="/services/video-production-phoenix-az/">Phoenix</a>  <span class="vert-sep">|</span>  <a href="/services/scottsdale-video-production/">Scottsdale</a>  <span class="vert-sep">|</span>  <a href="/services/flagstaff-sedona-video-production/">Flagstaff</a></h2>
                    </div>
                    <div class="one-third second navbar-icons-top">
                        <a href="http://www.facebook.com/pages/Twin-Peaks-Digital/107938599128" target="_blank" class="icon-fb"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-facebook.png" alt="Facebook Twin Peaks Digital"/></a>
                        <a href="https://plus.google.com/111869356554768492741/about" target="_blank" class="icon-gp"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-google-plus.png" alt="Google Plus Twin Peaks Digital"/></a>
                        <a href="http://www.linkedin.com/pub/matthew-nelson/12/808/444" target="_blank" class="icon-li"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-linkedin.png" alt="LinkedIn Twin Peaks Digital"/></a>
                        <a href="http://www.youtube.com/user/twinpeaksdigital" target="_blank" class="icon-yt"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-you-tube.png" alt="YouTube Channel for Twin Peaks Digital"/></a>
                        <a href="https://vimeo.com/channels/42610" target="_blank" class="icon-vi"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-vimeo.png" alt="Vimeo Channel for Twin Peaks Digital"/></a>
                    </div>
                </div>
            </section>
        </div>
       <?php
    }
     //-----END HEADER Customization-------
    
    // FOOTER Customization
    remove_action( 'genesis_footer', 'genesis_do_footer' );
    add_action( 'genesis_footer', 'paladin_custom_footer' );
    function paladin_custom_footer() {
        ?>
        <p class="copyright">
            &copy; Copyright 2015 <a href="http://twinpeaksdigital.com/">Twin Peaks Digital</a> &middot; All Rights Reserved &middot; An <a href="http://ambitionsweb.com" target="_blank" title="Ambitions Website Design">Ambitions Web</a> Project
        </p>
        <?php
    }
    
    // GALLERY PAGE WIDTH for Tiled Gallery
    function gallery_page_content_width() {
        if ( is_page( 'our-work/gallery' ) ) {
            global $content_width;
            $content_width = 800;
        }
    }
    add_action( 'get_header', 'gallery_page_content_width' );
    
    // CUSTOMIZE GRID LOOP
    // http://www.billerickson.net/a-better-and-easier-grid-loop/
//    add_action( 'pre_get_posts', 'child_grid_loop_query_args' );
//
//    function child_grid_loop_query_args( $query ) {
//        //If no query is specified, grab the main query
//        global $wp_query;
//        if( !isset( $query ) || empty( $query ) || !is_object( $query ) ) {
//                $query = $wp_query;
//        }
//        
//        // set the query loop  to only show 3 posts on home
//        if( $query->is_main_query() && is_page( 'video-production-portfolio' ) ) {
//                //$query->set( 'posts_per_page', 9 );
//                $query->set('post_type', 'portfolio');
//                //$query->set('paged', 0);
//        } //else {
//            //echo "change your settings in 'customize/static front page' to latest posts for the grid to work";
//        //}
//    }
    
    // grid loop classes on posts
//    function custom_grid_post_class( $classes ) {
//            global $wp_query;
//            //if not main query return or not front page
//            if( ! $wp_query->is_main_query() || ! is_post_type_archive( 'portfolio' ) ) {
//                    return $classes;
//            }
//
//            // if main query add our grid classes then return
//            $classes[] = 'one-third';
//            if( 0 == $wp_query->current_post || 0 == $wp_query->current_post % 3 ) {
//                    $classes[] = 'first';
//            }
//            return $classes;
//    }
//    add_filter( 'post_class', 'custom_grid_post_class' );
    
    
    //CUSTOM GRID LOOP VIDEO INSTEAD OF IMAGE
//    add_filter( 'genesis_post_info', 'portfolio_grid_loop_video' );
//    function portfolio_grid_loop_video( ){
//        //global $wp_query;
//        //$wp_query->the_post();
//
//        
//        //$video = get_post_custom_values( 'video_link', $wp_query->post->ID);
//
//        //echo $wp_query->post_type;
//        
//        if ( is_singular( 'portfolio' ) ){
//
//            global $wp_query;
//            $wp_query->the_post();
//            $vid_id = $post[0]->ID;
//            print_r($vid_id);
//            $video = get_post_custom_values( 'video_link', $vid_id);
//
//
//            echo '<div class="resp-vid-wrap">
//                            <iframe src="//player.vimeo.com/video/' . $video[0] . '" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
//                    </div>';
//        }
//    }
    
}