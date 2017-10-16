<?php
/*
Plugin Name: Cornerstone Library: Woocommerce Product
Plugin URI:  http://cornerstonelibrary.com/
Description: Adds a new element to Cornerstone - a woocommerce product
Version:     0.1
Author:      Ruel Cena
Author URI:  http://bigwilliam.com
Author Email: php.rcena@gmail.com
Text Domain: __x__
*/


/* Prevent direct access */
if ( ! defined( 'WPINC' ) ) die;

/* Paths */
define( 'CSL_WCPRODUCT_PATH', plugin_dir_path( __FILE__ ) );
define( 'CSL_WCPRODUCT_URL', plugin_dir_url( __FILE__ ) );


/* Add element to Cornerstone */
add_action( 'cornerstone_register_elements', 'csl_wcproduct_register_elements', 100 );

/* Add Icon Map */
add_filter( 'cornerstone_icon_map', 'csl_wcproduct_icon_map');

/* scripts */
add_action( 'wp_enqueue_scripts', 'csl_wcproduct_scripts');



/*
 * => FUNCTIONS
 * ---------------------------------------------------------------------------*/

if (!function_exists('csl_wcproduct_scripts')) {
	
	function csl_wcproduct_scripts() {
		$version = 20171016;
		wp_enqueue_script( 'csl-wcproduct-script', CSL_WCPRODUCT_URL . 'assets/js/csl_wcproduct.js?' . time(), ['jquery'], $version, true );
		wp_enqueue_style( 'csl-wcproduct-style', CSL_WCPRODUCT_URL . 'assets/css/csl_wcproduct.css?' . time(), [], $version );
		wp_enqueue_style( 'csl-wcproduct-icons', D3FY_CSPP_URL.'/lib/csppicons/style.css', [], $version, 'all' );
	}

}

if (!function_exists('csl_wcproduct_register_elements')) {

	function csl_wcproduct_register_elements() {
		cornerstone_remove_element( 'csl-woocommerce-product' );
		cornerstone_register_element( 'CSL_WOOCOMMERCE_PRODUCT', 'csl-woocommerce-product', CSL_WCPRODUCT_PATH . 'includes/csl-woocommerce-product' );
	}

}

if (!function_exists('csl_wcproduct_icon_map')) {

	function csl_wcproduct_icon_map() {
		$icon_map['default'] = CSL_WCPRODUCT_URL . 'assets/svg/icons.svg';
		return $icon_map;
	}

}
