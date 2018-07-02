<?php
/**
 * Cart totals
 *
 * @author    WooThemes
 * @package   WooCommerce/Templates
 * @version     2.3.6
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

?>
<div class="cart_totals <?php if ( WC()->customer->has_calculated_shipping() ) echo 'calculated_shipping'; ?>">

  <?php do_action( 'woocommerce_before_cart_totals' ); ?>

  <p class="cart_title">Корзина</p>

    <div class="row m-dis cart-subtotal">
      <div class="col-md-6">Сумма</div>
      <div class="col-md-6"><?php wc_cart_totals_subtotal_html(); ?></div>
    </div>

    <?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
      <div class="row cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
        <div class="col-md-6"><?php wc_cart_totals_coupon_label( $coupon ); ?></div>
        <div class="col-md-6"><?php wc_cart_totals_coupon_html( $coupon ); ?></div>
      </div>
    <?php endforeach; ?>

    <?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

      <?php do_action( 'woocommerce_cart_totals_before_shipping' ); ?>

      <?php wc_cart_totals_shipping_html(); ?>

      <?php do_action( 'woocommerce_cart_totals_after_shipping' ); ?>

    <?php elseif ( WC()->cart->needs_shipping() ) : ?>

      <div class="row m-dis shipping">
        <div class="col-md-6"><?php _e( 'Shipping', 'woocommerce' ); ?></div>
        <div class="col-md-6"><?php woocommerce_shipping_calculator(); ?></div>
      </div>

    <?php endif; ?>

    <?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
      <div class="row m-dis fee">
        <div class="col-md-6"><?php echo esc_html( $fee->name ); ?></div>
        <div class="col-md-6"><?php wc_cart_totals_fee_html( $fee ); ?></div>
      </div>
    <?php endforeach; ?>

    <?php if ( wc_tax_enabled() && WC()->cart->tax_display_cart == 'excl' ) : ?>
      <?php if ( get_option( 'woocommerce_tax_total_display' ) == 'itemized' ) : ?>
        <?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : ?>
          <div class="row m-dis tax-rate tax-rate-<?php echo sanitize_title( $code ); ?>">
            <div class="col-md-6"><?php echo esc_html( $tax->label ); ?></div>
            <div class="col-md-6"><?php echo wp_kses_post( $tax->formatted_amount ); ?></div>
          </div>
        <?php endforeach; ?>
      <?php else : ?>
        <div class="row m-dis tax-total">
          <div class="col-md-6"><?php echo esc_html( WC()->countries->tax_or_vat() ); ?></div>
          <div class="col-md-6"><?php wc_cart_totals_taxes_total_html(); ?></div>
        </div>
      <?php endif; ?>
    <?php endif; ?>

    <?php do_action( 'woocommerce_cart_totals_before_order_total' ); ?>

    <?php do_action( 'woocommerce_cart_totals_after_order_total' ); ?>

  </table>

  <?php if ( WC()->cart->get_cart_tax() ) : ?>
    <p class="wc-cart-shipping-notice"><small><?php

      $estimated_text = WC()->customer->is_customer_outside_base() && ! WC()->customer->has_calculated_shipping()
        ? sprintf( ' ' . __( ' (taxes estimated for %s)', 'woocommerce' ), WC()->countries->estimated_for_prefix() . __( WC()->countries->countries[ WC()->countries->get_base_country() ], 'woocommerce' ) )
        : '';

      printf( __( 'Note: Shipping and taxes are estimated%s and will be updated during checkout based on your billing and shipping information.', 'woocommerce' ), $estimated_text );

    ?></small></p>
  <?php endif; ?>

  <a href="/cart">Перейти в корзину</a>


  <!-- <div class="wc-proceed-to-checkout"> -->

    <?php //do_action( 'woocommerce_proceed_to_checkout' ); ?>

  <!-- </div> -->

  <?php do_action( 'woocommerce_after_cart_totals' ); ?>

</div>
