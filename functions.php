<?php
require_once(__DIR__ . '/includes/autoload.php');

function add_js_and_css() {
    global $wp_scripts;
    wp_enqueue_style( 'global', get_template_directory_uri() . '/dist/style/bundle.css', [], '1.0.4' );
}
add_action( 'wp_enqueue_scripts', 'add_js_and_css' );

function footer_enqueue() {
    wp_enqueue_script( 'flickity', get_template_directory_uri(). '/libs/flickity.min.js', ['jquery'], '1.0.0' );
    wp_enqueue_script( 'video', get_template_directory_uri(). '/libs/video.min.js', ['jquery'], '1.0.0' );
    wp_enqueue_script( 'script', get_template_directory_uri(). '/dist/script/bundle.js', ['jquery'], '1.0.0' );
}
add_action('wp_footer', 'footer_enqueue');
	
function register_my_menus() {
    register_nav_menus([
        'primary'       => __( 'Hoofdmenu' ),
        'secondary'     => __( 'Zichtbaar in navigatie' ),
    ]);
}
add_action( 'init', 'register_my_menus' );

// Remove standard WP elements
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

// Add options page
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page('Website opties');
}

// Add post type to breadcrumbs
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

// Login page
add_action( 'login_enqueue_scripts', 'ac_custom_login' );
function ac_custom_login() {
    wp_enqueue_style( 'ac-custom-login', get_stylesheet_directory_uri(). '/dist/style/login.css', ['login'] );
}

add_filter( 'login_headerurl', 'ac_custom_url' );
function ac_custom_url($url) {
    return 'https://www.accepta.eu';
}

// WC
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

function accepta_custom_show_sale_price( $old_display, $cart_item, $cart_item_key ) {
	/** @var WC_Product $product */
	$product = $cart_item['data'];
	if ( $product ) {
		return $product->get_price_html();
	}
	return $old_display;
}
add_filter( 'woocommerce_cart_item_price', 'accepta_custom_show_sale_price', 10, 3 );

add_filter( 'woocommerce_add_to_cart_fragments', 'accepta_add_to_cart_fragment' );
function accepta_add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	$fragments['.cart-total-count'] = '<span class="cart-total-count">' . $woocommerce->cart->cart_contents_count . '</span>';
 	return $fragments;
}

// Remove checkout input fields
add_filter( 'woocommerce_checkout_fields' , 'override_checkout_fields' );
function override_checkout_fields( $fields ) {
	unset($fields['billing']['billing_address_2']);

	foreach ($fields as $category => $value) {
		foreach ($fields[$category] as $field => $property) {
			unset($fields[$category][$field]['placeholder']);
		}
	}

	return $fields;
}