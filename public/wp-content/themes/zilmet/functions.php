<?php
/**
 * Zilmet functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Zilmet
 */

require get_template_directory() . '/includes/init.php';
require get_template_directory() . '/includes/woocommerce.php';

function show_protected_custom_fields( $protected, $meta_key, $meta_type ) {
    if ( isset( $meta_key ))
      return false;
}
 
add_filter( 'is_protected_meta', 'show_protected_custom_fields', 20, 3 );