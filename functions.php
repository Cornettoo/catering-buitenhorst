<?php
require_once(__DIR__ . '/includes/autoload.php');

function add_js_and_css() {
    global $wp_scripts;
    wp_enqueue_style( 'global', get_template_directory_uri() . '/assets/css/global.min.css', [], '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'add_js_and_css' );

function footer_enqueue() {
    // wp_enqueue_script( 'jquery', get_template_directory_uri(). '/assets/js/jquery-2.1.1.min.js', array( 'jquery') );
    wp_enqueue_script( 'flickity', get_template_directory_uri(). '/assets/js/flickity.min.js', array( 'jquery') );
    wp_enqueue_script( 'script', get_template_directory_uri(). '/assets/js/script.js', array( 'jquery') );
}
add_action('wp_footer', 'footer_enqueue');
	
function register_my_menus() {
    register_nav_menus([
        'primary'       => __( 'Primary' ),
    ]);
}
add_action( 'init', 'register_my_menus' );

// REMOVE STANDARD WP ELEMENTS
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

// ADD POST TYPE TO BREADCRUMBS
add_filter( 'wpseo_breadcrumb_links', 'my_wpseo_breadcrumb_links' );
function my_wpseo_breadcrumb_links( $links ) {
 
    if ( is_single() ) {
        $cpt_object = get_post_type_object( get_post_type() );
        if ( ! $cpt_object->_builtin ) {
            $landing_page = get_page_by_path( $cpt_object->rewrite['slug'] );
            array_splice( $links, -1, 0, [
                [
                    'id'    => $landing_page->ID
                ]
            ]);
        }
    }
 
    return $links;
}

// Disable Gutenberg
add_filter('use_block_editor_for_post', '__return_false', 10);