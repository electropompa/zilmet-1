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
    if ( isset( $meta_key ))
      return false;
}
 
add_filter( 'is_protected_meta', 'show_protected_custom_fields', 20, 3 );