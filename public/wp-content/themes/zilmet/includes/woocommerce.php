<?php

// Подсчет количества товаров в корзине
function woo_cart_count() {
  global $woocommerce;
  $count = $woocommerce->cart->cart_contents_count;
  if($count == 1){ $word = "товар"; }
  elseif($count%10 == 2){ $word = "товара"; }
  elseif($count%10 == 3){ $word = "товара"; }
  elseif($count%10 == 4){ $word = "товара"; }
  else{ $word = "товаров"; }
  echo $count . " " . $word;
}

// archive-product
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

/**
 * Remove product data tabs
 */
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );
function woo_remove_product_tabs( $tabs ) {
  // unset( $tabs['description'] );        // Remove the description tab
  unset( $tabs['reviews'] );      // Remove the reviews tab
  unset( $tabs['additional_information'] );   // Remove the additional information tab
  return $tabs;
}

/* реком товары */
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

add_filter( 'woocommerce_variable_free_price_html',  'hide_free_price_notice' );
add_filter( 'woocommerce_free_price_html',           'hide_free_price_notice' );
add_filter( 'woocommerce_variation_free_price_html', 'hide_free_price_notice' );

/* Скрываем метку 'Бесплатно!' со страниц магазина */
function hide_free_price_notice( $price ) {
  return '';
}

add_filter( 'woocommerce_empty_price_html', 'custom_call_for_price' );
function custom_call_for_price() {
  return 'По запросу';
}

// Надпись на кнопке add-to-cart на странице товара
function my_theme_cart_button_text() {
  return 'Добавить в корзину';
}
add_filter( 'woocommerce_product_single_add_to_cart_text', 'my_theme_cart_button_text' );

// Выводим поля для корзины
// переопределяем функцию для того, чтобы задать другие обертки для полей с классами Bootstrap
/**
 * Outputs a checkout/address form field.
 *
 * @param string $key Key.
 * @param mixed  $args Arguments.
 * @param string $value (default: null).
 * @return string
 */
function woocommerce_form_field( $key, $args, $value = null ) {
  $defaults = array(
    'type'              => 'text',
    'label'             => '',
    'description'       => '',
    'placeholder'       => '',
    'maxlength'         => false,
    'required'          => false,
    'autocomplete'      => false,
    'id'                => $key,
    'class'             => array(),
    'label_class'       => array(),
    'input_class'       => array(),
    'return'            => false,
    'options'           => array(),
    'custom_attributes' => array(),
    'validate'          => array(),
    'default'           => '',
    'autofocus'         => '',
    'priority'          => '',
  );

  $args = wp_parse_args( $args, $defaults );
  $args = apply_filters( 'woocommerce_form_field_args', $args, $key, $value );

  if ( $args['required'] ) {
    $args['class'][] = 'validate-required';
    $required        = '&nbsp;<abbr class="required" title="' . esc_attr__( 'required', 'woocommerce' ) . '">*</abbr>';
  } else {
    $required = '';
  }

  if ( is_string( $args['label_class'] ) ) {
    $args['label_class'] = array( $args['label_class'] );
  }

  if ( is_null( $value ) ) {
    $value = $args['default'];
  }

  // Custom attribute handling.
  $custom_attributes         = array();
  $args['custom_attributes'] = array_filter( (array) $args['custom_attributes'], 'strlen' );

  if ( $args['maxlength'] ) {
    $args['custom_attributes']['maxlength'] = absint( $args['maxlength'] );
  }

  if ( ! empty( $args['autocomplete'] ) ) {
    $args['custom_attributes']['autocomplete'] = $args['autocomplete'];
  }

  if ( true === $args['autofocus'] ) {
    $args['custom_attributes']['autofocus'] = 'autofocus';
  }

  if ( $args['description'] ) {
    $args['custom_attributes']['aria-describedby'] = $args['id'] . '-description';
  }

  if ( ! empty( $args['custom_attributes'] ) && is_array( $args['custom_attributes'] ) ) {
    foreach ( $args['custom_attributes'] as $attribute => $attribute_value ) {
      $custom_attributes[] = esc_attr( $attribute ) . '="' . esc_attr( $attribute_value ) . '"';
    }
  }

  if ( ! empty( $args['validate'] ) ) {
    foreach ( $args['validate'] as $validate ) {
      $args['class'][] = 'validate-' . $validate;
    }
  }

  $field           = '';
  $label_id        = $args['id'];
  $sort            = $args['priority'] ? $args['priority'] : '';
  $field_container = '<div class="%1$s" id="%2$s" data-priority="' . esc_attr( $sort ) . '">%3$s</div>';

  switch ( $args['type'] ) {
    case 'country':
    $countries = 'shipping_country' === $key ? WC()->countries->get_shipping_countries() : WC()->countries->get_allowed_countries();

    if ( 1 === count( $countries ) ) {

      $field .= '<strong>' . current( array_values( $countries ) ) . '</strong>';

      $field .= '<input type="hidden" name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" value="' . current( array_keys( $countries ) ) . '" ' . implode( ' ', $custom_attributes ) . ' class="country_to_state" readonly="readonly" />';

    } else {

      $field = '<select name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" class="country_to_state country_select ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" ' . implode( ' ', $custom_attributes ) . '><option value="">' . esc_html__( 'Select a country&hellip;', 'woocommerce' ) . '</option>';

      foreach ( $countries as $ckey => $cvalue ) {
        $field .= '<option value="' . esc_attr( $ckey ) . '" ' . selected( $value, $ckey, false ) . '>' . $cvalue . '</option>';
      }

      $field .= '</select>';

      $field .= '<noscript><button type="submit" name="woocommerce_checkout_update_totals" value="' . esc_attr__( 'Update country', 'woocommerce' ) . '">' . esc_html__( 'Update country', 'woocommerce' ) . '</button></noscript>';

    }

    break;
    case 'state':
    /* Get country this state field is representing */
    $for_country = isset( $args['country'] ) ? $args['country'] : WC()->checkout->get_value( 'billing_state' === $key ? 'billing_country' : 'shipping_country' );
    $states      = WC()->countries->get_states( $for_country );

    if ( is_array( $states ) && empty( $states ) ) {

      $field_container = '<p class="form-row %1$s" id="%2$s" style="display: none">%3$s</p>';

      $field .= '<input type="hidden" class="hidden" name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" value="" ' . implode( ' ', $custom_attributes ) . ' placeholder="' . esc_attr( $args['placeholder'] ) . '" readonly="readonly" />';

    } elseif ( ! is_null( $for_country ) && is_array( $states ) ) {

      $field .= '<select name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" class="state_select ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" ' . implode( ' ', $custom_attributes ) . ' data-placeholder="' . esc_attr( $args['placeholder'] ) . '">
      <option value="">' . esc_html__( 'Select a state&hellip;', 'woocommerce' ) . '</option>';

      foreach ( $states as $ckey => $cvalue ) {
        $field .= '<option value="' . esc_attr( $ckey ) . '" ' . selected( $value, $ckey, false ) . '>' . $cvalue . '</option>';
      }

      $field .= '</select>';

    } else {

      $field .= '<div class="col-12"><input type="text" class="input-text ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" value="' . esc_attr( $value ) . '"  placeholder="' . esc_attr( $args['placeholder'] ) . '" name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" ' . implode( ' ', $custom_attributes ) . ' /></div>';

    }

    break;
    case 'textarea':
    $field .= '<textarea name="' . esc_attr( $key ) . '" class="input-text ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" id="' . esc_attr( $args['id'] ) . '" placeholder="' . esc_attr( $args['placeholder'] ) . '" ' . ( empty( $args['custom_attributes']['rows'] ) ? ' rows="2"' : '' ) . ( empty( $args['custom_attributes']['cols'] ) ? ' cols="5"' : '' ) . implode( ' ', $custom_attributes ) . '>' . esc_textarea( $value ) . '</textarea>';

    break;
    case 'checkbox':
    $field = '<label class="checkbox ' . implode( ' ', $args['label_class'] ) . '" ' . implode( ' ', $custom_attributes ) . '>
    <input type="' . esc_attr( $args['type'] ) . '" class="input-checkbox ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" value="1" ' . checked( $value, 1, false ) . ' /> ' . $args['label'] . $required . '</label>';

    break;
    case 'text':
    case 'password':
    case 'datetime':
    case 'datetime-local':
    case 'date':
    case 'month':
    case 'time':
    case 'week':
    case 'number':
    case 'email':
    case 'url':
    case 'tel':
    $field .= '<div class="col-12"><input type="' . esc_attr( $args['type'] ) . '" class="input-text ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" placeholder="' . esc_attr( $args['placeholder'] ) . '"  value="' . esc_attr( $value ) . '" ' . implode( ' ', $custom_attributes ) . ' /></div>';

    break;
    case 'select':
    $field   = '';
    $options = '';

    if ( ! empty( $args['options'] ) ) {
      foreach ( $args['options'] as $option_key => $option_text ) {
        if ( '' === $option_key ) {
            // If we have a blank option, select2 needs a placeholder.
          if ( empty( $args['placeholder'] ) ) {
            $args['placeholder'] = $option_text ? $option_text : __( 'Choose an option', 'woocommerce' );
          }
          $custom_attributes[] = 'data-allow_clear="true"';
        }
        $options .= '<option value="' . esc_attr( $option_key ) . '" ' . selected( $value, $option_key, false ) . '>' . esc_attr( $option_text ) . '</option>';
      }

      $field .= '<select name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" class="select ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" ' . implode( ' ', $custom_attributes ) . ' data-placeholder="' . esc_attr( $args['placeholder'] ) . '">
      ' . $options . '
      </select>';
    }

    break;
    case 'radio':
    $label_id = current( array_keys( $args['options'] ) );

    if ( ! empty( $args['options'] ) ) {
      foreach ( $args['options'] as $option_key => $option_text ) {
        $field .= '<input type="radio" class="input-radio ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" value="' . esc_attr( $option_key ) . '" name="' . esc_attr( $key ) . '" ' . implode( ' ', $custom_attributes ) . ' id="' . esc_attr( $args['id'] ) . '_' . esc_attr( $option_key ) . '"' . checked( $value, $option_key, false ) . ' />';
        $field .= '<label for="' . esc_attr( $args['id'] ) . '_' . esc_attr( $option_key ) . '" class="radio ' . implode( ' ', $args['label_class'] ) . '">' . $option_text . '</label>';
      }
    }

    break;
  }

  if ( ! empty( $field ) ) {
    $field_html = '';

    if ( $args['label'] && 'checkbox' !== $args['type'] ) {
      $field_html .= '<label for="' . esc_attr( $label_id ) . '" class="' . esc_attr( implode( ' ', $args['label_class'] ) ) . '">' . $args['label'] . $required . '</label>';
    }

    $field_html .= /*'<span class="woocommerce-input-wrapper">' . */ $field;

    if ( $args['description'] ) {
      $field_html .= '<span class="description" id="' . esc_attr( $args['id'] ) . '-description" aria-hidden="true">' . wp_kses_post( $args['description'] ) . '</span>';
    }

    //$field_html .= '</span>';

    $container_class = esc_attr( implode( ' ', $args['class'] ) );
    $container_id    = esc_attr( $args['id'] ) . '_field';
    $field           = sprintf( $field_container, $container_class, $container_id, $field_html );
  }

  /**
   * Filter by type.
   */
  $field = apply_filters( 'woocommerce_form_field_' . $args['type'], $field, $key, $args, $value );

  /**
   * General filter on form fields.
   *
   * @since 3.4.0
   */
  $field = apply_filters( 'woocommerce_form_field', $field, $key, $args, $value );

  if ( $args['return'] ) {
    return $field;
  } else {
    echo $field; // WPCS: XSS ok.
  }
}


// Формы для заказа
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
function custom_override_checkout_fields( $f ) {
  unset(
    //$f['billing']['billing_country'],
    //$f['billing']['billing_address_1'],
    $f['billing']['billing_company'], 
    $f['billing']['billing_last_name'],
    $f['billing']['billing_city'],
    $f['billing']['billing_address_2'],
    // $f['billing']['billing_state'],
    $f['billing']['billing_postcode'],
    $f['shipping']['shipping_address_1']
  );

  $f['billing']['billing_first_name']['label'] = 'ФИО / Название компании';
  $f['billing']['billing_first_name']['placeholder'] = 'Введите ФИО';
  $f['billing']['billing_first_name']['class'][0] = '';
  $f['billing']['billing_first_name']['class'][1] = 'row col-lg-6 mb-3';
  $f['billing']['billing_first_name']['label_class'][0] = 'col-12';
  $f['billing']['billing_first_name']['input_class'][0] = 'col-12';
  $f['billing']['billing_first_name']['priority'] = 10;

  $f['billing']['billing_phone']['class'][2] = 'row col-lg-6 mb-3';
  $f['billing']['billing_phone']['label_class'][0] = 'col-12';
  $f['billing']['billing_phone']['input_class'][0] = 'col-12';
  $f['billing']['billing_phone']['priority'] = 15;

  $f['billing']['billing_email']['class'][2] = 'row col-lg-6 mb-3';
  $f['billing']['billing_email']['label_class'][0] = 'col-12';
  $f['billing']['billing_email']['input_class'][0] = 'col-12';
  $f['billing']['billing_email']['priority'] = 20;

  $f['billing']['billing_state']['label'] = 'Населенный пункт'; // Эти поля не влияют, менять в .po файлах
  $f['billing']['billing_state']['class'][2] = 'row col-lg-6 mb-3';
  $f['billing']['billing_state']['label_class'][0] = 'col-12';
  $f['billing']['billing_state']['input_class'][0] = 'col-12';
  $f['billing']['billing_state']['required'] = false;
  $f['billing']['billing_state']['priority'] = 50;

  $f['billing']['billing_address_1']['label'] = 'Адрес доставки'; // Эти поля не влияют, менять в .po файлах
  $f['billing']['billing_address_1']['class'][2] = 'row col-lg-6 mb-3';
  $f['billing']['billing_address_1']['label_class'][0] = 'col-12';
  $f['billing']['billing_address_1']['input_class'][0] = 'col-12';
  $f['billing']['billing_address_1']['required'] = 0;
  $f['billing']['billing_address_1']['priority'] = 80;

  $f['order']['order_comments']['label'] = 'Комментарий к доставке';
  $f['order']['order_comments']['class'][2] = 'row col-lg-12 mb-3';
  $f['order']['order_comments']['input_class'][0] = 'col-12';
  $f['order']['order_comments']['required'] = false;
  $f['order']['order_comments']['clear'] = true;

  $f['billing']['billing_country']['class'][0] = 'd-none';
  $f['billing']['billing_country']['priority'] = 90;

  // print_pre($f);
  return $f;
}

function custom_override_default_address_fields( $address_fields ) {
  $address_fields['address_1'][ 'required' ] = 0;
  $address_fields['state'][ 'required' ] = 0;
  // print_pre( $address_fields );
  return $address_fields;
}
add_filter( 'woocommerce_default_address_fields' , 'custom_override_default_address_fields' );

add_filter('woocommerce_variable_price_html', 'custom_variation_price', 10, 2);
function custom_variation_price( $price, $product ) {
  $variation = $product->get_available_variations();
  $price = '';
  $price .= wc_price($product->get_price());

  if (count($variation) == 1){
    return $price;
  } else {
    return false;
  }
}

add_filter( 'woocommerce_cart_totals_order_total_html', 'delete_nds_tax_from_checkout', 10 );
function delete_nds_tax_from_checkout( $value ) {
  return preg_replace("/<small[^>]+?[^>]+>(.*?)<\/small>/i", '', $value);
}

function add_oneclick_modal_form( $product ) {
  require 'oneclick_modal_form.php';
}
add_action( 'woocommerce_after_single_product', 'add_oneclick_modal_form', 100);