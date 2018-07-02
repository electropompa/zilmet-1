<?php

if ( !is_admin() )  show_admin_bar(false);

add_theme_support( 'woocommerce' );
define('WOOCOMMERCE_USE_CSS', false);

wp_register_style( 'bootstrap', get_template_directory_uri() . "/css/bootstrap4.min.css", '', '', '' );
wp_register_style( 'fixed', get_template_directory_uri() . "/css/fixed.css", '', '', '' );
wp_register_style( 'style', get_template_directory_uri() . "/css/style.css", '', '', '' );

wp_register_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', '', '', '');

function woo_style() {
  wp_register_style( 'my-woocommerce', get_template_directory_uri() . '/woocommerce.css', null, 1.0, 'screen' );
  wp_enqueue_style( 'my-woocommerce' ); 
} 
add_action( 'wp_enqueue_scripts', 'woo_style' );

register_nav_menus( array( 
  'primary_header_menu' => __( 'Верхнее меню' ), 
  'aside_menu' => __( 'Боковое меню' ), 
  ));

remove_filter('pre_term_description', 'wp_filter_kses');
remove_filter('pre_term_description', 'wp_kses_data');
remove_filter( 'the_content', 'wpautop');
remove_filter( 'the_excerpt', 'wpautop' );

/* реком товары */
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );


remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
// remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
// remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
// remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
// remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
// remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );

add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
function custom_override_checkout_fields( $fields ) { /*Убрали ненужные*/
     unset($fields['billing']['billing_company']);
     unset($fields['billing']['billing_country']);
     unset($fields['billing']['billing_address_1']);
     unset($fields['billing']['billing_address_2']);
     unset($fields['billing']['billing_state']);
     unset($fields['billing']['billing_postcode']);
     return $fields;
}
add_filter( 'woocommerce_variable_free_price_html',  'hide_free_price_notice' );
add_filter( 'woocommerce_free_price_html',           'hide_free_price_notice' );
add_filter( 'woocommerce_variation_free_price_html', 'hide_free_price_notice' );
 
/* Скрываем метку 'Бесплатно!' со страниц магазина */
function hide_free_price_notice( $price ) {
  return '';
}

add_filter('woocommerce_empty_price_html', 'custom_call_for_price');
function custom_call_for_price() {
return 'По запросу';
}
add_filter('woocommerce_billing_fields', 'custom_woocommerce_billing_fields');
function custom_woocommerce_billing_fields( $fields ) {
$fields['billing_address_1']['class'] = array( 'form-row-wide' ); /*Сделаи широким поле адреса*/
return $fields;
}

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );