<?php
/**
 * Zilmet functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Zilmet
 */

if ( ! function_exists( 'zilmet_setup' ) ) {
  function zilmet_setup() {
    define('WOOCOMMERCE_USE_CSS', false);

    add_theme_support( 'woocommerce' );
    add_theme_support( 'html5', array( 'search-form' ) );
  }
}

add_action( 'after_setup_theme', 'zilmet_setup' );

if ( !is_admin() ) {
  show_admin_bar(false);

  add_action( 'wp_print_styles', 'zilmet_style_method' );
}

function zilmet_style_method(){
  wp_enqueue_style( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css', '', '', '' );
  wp_enqueue_style( 'zilmet-woocommerce', get_template_directory_uri() . '/woocommerce.css', null, 1.0, 'screen' );
  // wp_enqueue_style( 'fixed', get_template_directory_uri() . "/css/fixed.css", '', '', '' );
  wp_enqueue_style( 'style', get_template_directory_uri() . "/css/style.css", '', '', '' );
}

add_action('wp_enqueue_scripts', 'fishplanet_scripts_method');
function fishplanet_scripts_method(){
  wp_deregister_script('jquery');
  wp_enqueue_script('jquery', "https://yastatic.net/jquery/2.0.3/jquery.min.js", '', '', 'true');
  wp_enqueue_script('bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js", '', '', 'true');
}

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