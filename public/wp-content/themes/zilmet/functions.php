<?php
/**
 * Zilmet functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Zilmet
 */

$zilmet_includes = array(
	'print_functions.php',
	'init.php',
	'woocommerce.php'
);

foreach ( $zilmet_includes as $file ) {
	require_once get_template_directory() . '/includes/' . $file;
}

function show_protected_custom_fields( $protected, $meta_key, $meta_type ) {
	if ( isset( $meta_key ) ) {
		return false;
	}
}

add_filter( 'is_protected_meta', 'show_protected_custom_fields', 20, 3 );

function the_meta_title( $taxonomy, $term_id ) {
	if ( get_field( 'wc_title', $taxonomy . '_' . $term_id ) ) {
		the_field( 'wc_title', $taxonomy . '_' . $term_id );
	} elseif ( get_field( 'wc_title' ) ) {
		the_field( 'wc_title' );
	} else {
		wp_title( '', true );
	}
}

function the_meta_description( $taxonomy, $term_id ) {
	if ( get_field( 'wc_description', $taxonomy . '_' . $term_id ) ) {
		the_field( 'wc_description', $taxonomy . '_' . $term_id );
	} else {
		the_field( 'wc_description' );
	}
}

function the_meta_keywords( $taxonomy, $term_id ) {
	if ( get_field( 'wc_keywords', $taxonomy . '_' . $term_id ) ) {
		the_field( 'wc_keywords', $taxonomy . '_' . $term_id );
	} else {
		the_field( 'wc_keywords' );
	}
}