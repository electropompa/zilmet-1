<?php
/**
 * Zilmet functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Zilmet
 */

function print_pre($val){
  echo '<pre>';
  print_r($val);
  echo  '</pre>';
}
function var_dump_pre($val){
  echo '<pre>';
  var_dump($val);
  echo  '</pre>';
}
function list_object($object){
  if(is_array($object) || is_object($object)){
    foreach ($object as $key => $value){
      list_object($value);
    }
  }else{
    echo $object . "<br>";
  }
}

require get_template_directory() . '/includes/init.php';
require get_template_directory() . '/includes/woocommerce.php';

function show_protected_custom_fields( $protected, $meta_key, $meta_type ) {
    if ( isset( $meta_key )) return false;
}
add_filter( 'is_protected_meta', 'show_protected_custom_fields', 20, 3 );

function the_meta_title($taxonomy, $term_id){
  if ( get_field( 'wc_title', $taxonomy . '_' . $term_id ) ) {
    the_field('wc_title', $taxonomy . '_' . $term_id);
  } elseif ( get_field('wc_title')) {
    the_field('wc_title');
  } else {
    wp_title('',true);
  }
}

function the_meta_description($taxonomy, $term_id){
  if( get_field( 'wc_description', $taxonomy . '_' . $term_id ) ) {
    the_field( 'wc_description', $taxonomy . '_' . $term_id );
  } else {
    the_field('wc_description');
  }
}

function the_meta_keywords($taxonomy, $term_id){
  if( get_field( 'wc_keywords', $taxonomy . '_' . $term_id ) ) {
    the_field( 'wc_keywords', $taxonomy . '_' . $term_id );
  } else { 
    the_field('wc_keywords');
  }
}