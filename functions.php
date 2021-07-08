<?php
require_once(__DIR__ . '/includes/autoload.php');

function add_js_and_css() {
    global $wp_scripts;
    wp_enqueue_style( 'global', get_template_directory_uri() . '/dist/style/bundle.css', [], '2.0.0' );
}
add_action( 'wp_enqueue_scripts', 'add_js_and_css' );

function footer_enqueue() {
    wp_enqueue_script( 'flickity', get_template_directory_uri(). '/libs/flickity.min.js', ['jquery'], '2.0.0' );
    wp_enqueue_script( 'video', get_template_directory_uri(). '/libs/video.min.js', ['jquery'], '2.0.0' );
    wp_enqueue_script( 'script', get_template_directory_uri(). '/dist/script/bundle.js', ['jquery'], '2.0.0' );
}
add_action('wp_footer', 'footer_enqueue');
	
function register_my_menus() {
    register_nav_menus([
        'primary'       => __( 'Primary' ),
        'secondary'     => __( 'Mobile' ),
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

// Disable Gutenberg
add_filter('use_block_editor_for_post', '__return_false', 10);

// Login page
add_action( 'login_enqueue_scripts', 'ac_custom_login' );
function ac_custom_login() {
    wp_enqueue_style( 'ac-custom-login', get_stylesheet_directory_uri(). '/dist/style/login.css', ['login'] );
}

add_filter( 'login_headerurl', 'ac_custom_url' );
function ac_custom_url($url) {
    return 'https://www.accepta.eu';
}

// add_action( 'init', 'stop_heartbeat', 1 );
// function stop_heartbeat() {
// 	wp_deregister_script('heartbeat');
// }

// Register main datepicker jQuery plugin script
add_action( 'wp_enqueue_scripts', 'enabling_date_picker' );
function enabling_date_picker() {
    // Only on front-end and checkout page
    if( is_admin() || ! is_checkout() ) return;

    // Load the datepicker jQuery-ui plugin script
    wp_enqueue_script( 'jquery-ui-datepicker' );
    wp_enqueue_style('jquery-ui', "https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/smoothness/jquery-ui.css", '', '', false);
}

// Add custom checkout datepicker field
add_action( 'woocommerce_before_order_notes', 'datepicker_custom_field' );
function datepicker_custom_field($checkout) {
    $datepicker_slug = 'my_datepicker';

    echo '<div id="datepicker-wrapper">';

    woocommerce_form_field($datepicker_slug, array(
        'type' => 'text',
        'class'=> array( 'form-row-first my-datepicker'),
        'label' => __('Selecteer een leverdatum/afhaaldatum'),
        'required' => true, // Or false
    ), '' );

    echo '<br clear="all"></div>';


    // Jquery: Enable the Datepicker
    ?>
    <script language="javascript">
    jQuery( function($){
        var a = '#<?php echo $datepicker_slug ?>';
        $(a).datepicker({
            dateFormat: 'dd-mm-yy', // ISO formatting date
            minDate: +1,
				beforeShowDay: function(date) {
					var day = date.getDay();
					return [(day != 0), ''];
				}
        });
    });
    </script>
    <?php
}

// Field validation
add_action( 'woocommerce_after_checkout_validation', 'checkout_datepicker_custom_field_validation', 10, 2 );
function checkout_datepicker_custom_field_validation( $data, $errors ) {
    $field_id = 'my_datepicker';

    if ( isset($_POST[$field_id]) && empty($_POST[$field_id]) ) {
        $errors->add( 'validation', __('Selecteer een leverdatum', 'woocommerce') ); 
    }
}

// Save field
add_action( 'woocommerce_checkout_create_order', 'save_datepicker_custom_field_value', 10, 2 );
function save_datepicker_custom_field_value( $order, $data ){
    $field_id = 'my_datepicker';
    $meta_key = '_'.$field_id;

    if ( isset($_POST[$field_id]) && ! empty($_POST[$field_id]) ) {
        $order->update_meta_data( $meta_key, esc_attr($_POST[$field_id]) ); 
    }
}


// Display custom field value in admin order pages
add_action( 'woocommerce_admin_order_data_after_billing_address', 'admin_display_date_custom_field_value', 10, 1 );
function admin_display_date_custom_field_value( $order ) {
    $meta_key   = '_my_datepicker';
    $meta_value = $order->get_meta( $meta_key ); // Get carrier company

    if( ! empty($meta_value) ) {
        // Display
        echo '<p><strong>' . __("Date", "woocommerce") . '</strong>: ' . $meta_value . '</p>';
    }
}

// Display custom field value after shipping line everywhere (orders and emails)
add_filter( 'woocommerce_get_order_item_totals', 'display_date_custom_field_value_on_order_item_totals', 10, 3 );
function display_date_custom_field_value_on_order_item_totals( $total_rows, $order, $tax_display ){
    $field_id   = 'my_datepicker';
    $meta_key   = '_my_datepicker';
    $meta_value = $order->get_meta( $meta_key ); // Get carrier company

    if( ! empty($meta_value) ) {
        $new_total_rows = [];

        // Loop through order total rows
        foreach( $total_rows as $key => $values ) {
            $new_total_rows[$key] = $values;

            // Inserting the carrier company under shipping method
            if( $key === 'shipping' ) {
                $new_total_rows[$field_id] = array(
                    'label' => __("Date", "woocommerce") . ':',
                    'value' => $meta_value,
                );
            }
        }
        return $new_total_rows;
    }
    return $total_rows;
}

/**
 * Hide shipping rates when free shipping is available.
 * Updated to support WooCommerce 2.6 Shipping Zones.
 *
 * @param array $rates Array of rates found for the package.
 * @return array
 */
function my_hide_shipping_when_free_is_available( $rates ) {
	$free = array();
	$freeActive = false;

	foreach ( $rates as $rate_id => $rate ) {
		if ('free_shipping' === $rate->method_id) {
			$freeActive = true;
		}
	}

	if ($freeActive) {
		foreach ( $rates as $rate_id => $rate ) {
			if ('free_shipping' === $rate->method_id || 'local_pickup' === $rate->method_id) {
				$free[ $rate_id ] = $rate;
			}
		}
	}

	return ! empty( $free ) ? $free : $rates;
}
add_filter( 'woocommerce_package_rates', 'my_hide_shipping_when_free_is_available', 100 );


// Remove WC styles
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

add_filter( 'woocommerce_default_address_fields', 'ac_remove_fields' );
function ac_remove_fields( $fields ) {
	unset($fields['address_2']);
	return $fields;
}


// add_filter('wc_price_args', 'sw_change_price_html');
// function sw_change_price_html($args) {

//     global $product;
//     if (!is_object( $product)) 
//         $product = wc_get_product( get_the_ID() );
//     if( is_single() && $product && ($product->is_type('simple') || $product->is_type('variation')) )
//         $args['price_format'] = str_replace('%2$s','<span class="wapf-p">%2$s</span>',$args['price_format']);

//     return $args;
// }

add_action('wp_footer','sw_add_wapf_scripts');

function sw_add_wapf_scripts() {
	?>
	<script>
		jQuery(document).on('wapf/pricing', function(e, productTotal, optionsTotal, grandTotal) {
			jQuery('.woocommerce-variation-price .woocommerce-Price-amount.amount').each(function() {
				var price = WAPF.Util.formatNumber(grandTotal,wapf_config.display_options.decimals,wapf_config.display_options.thousand,wapf_config.display_options.decimal);
				var $p = jQuery(this);
				$p.html('<bdi><span class="woocommerce-Price-currencySymbol">€</span>&nbsp;' + price + '</bdi>');
			});
		});
	</script>
	<?php
}