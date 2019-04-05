<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title><?php 
      $queried_object = get_queried_object(); 
      $taxonomy = $queried_object->taxonomy;
      $term_id = $queried_object->term_id;

    if(get_field('wc_title', $taxonomy . '_' . $term_id)){echo the_field('wc_title', $taxonomy . '_' . $term_id);} 
      elseif (get_field('wc_title')) {echo the_field('wc_title');}
      else {wp_title('',true);} ?></title>
  <meta name="description" content="<?php if(get_field('wc_description', $taxonomy . '_' . $term_id)){echo the_field('wc_description', $taxonomy . '_' . $term_id);} 
      else {echo the_field('wc_description');} ?>">
  <meta name="keywords" content="<?php if(get_field('wc_keywords', $taxonomy . '_' . $term_id)){echo the_field('wc_keywords', $taxonomy . '_' . $term_id);} 
      else {echo the_field('wc_keywords');} ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <link rel="icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <?php 
    echo get_post_meta($post->ID, 'yandexmap', true); 
    wp_head(); ?>
</head>

<body>

  <!--section class="header-top-advert">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <p class="text-center d-flex align-items-center justify-content-center">
            <span class="white">С 1 июля цены снижены на 5%</span>
          </p>
        </div>
      </div>
    </div>
  </section -->

  <main class="body mt-3">
    <div class="b__fixed"></div>
    <div class="container">
      <div class="content-wrapper">
      <header class="header" role="banner">

        <div class="row">

          <!-- Logo -->
          <div class="col-12 col-sm-5 col-md-3 col-lg-2 text-center">
            <a href="/">
              <img src="/images/headers/zilmet_globally_renowned.svg" alt="Zilmet logo" class="zilmet-logo"> 
            </a>
          </div>

          <div class="col-12 col-sm-6 offset-sm-1 col-md-4 order-last offset-md-0 col-lg-3 text-center text-sm-right">
            <a href="tel:+74959819244" rel="nofollow" class="phone-moscow">+7 (495) 981-92-44</a>
            <a href="tel:88001000077" rel="nofollow" class="header-phone"> 8 800 100 00 77</a>
            <span class="call-free-desc">Звонок по России бесплатный</span>
            <time id="timetable" itemprop="openingHours" datetime="Mo-Fr 09:00−18:00"><small>Пн - Чт:</small> 9.00 - 18.00</time>
            <time datetime="Sa 09:00-17:00"><small>Пт:</small> 9.00 - 17.00</time>
          </div>

          <div class="col-12 col-sm-12 col-md-12 col-lg-6 offset-md-1">
            <div class="row contacts">
              <div class="col-sm-12">
                <p class="header-desc text-center">Эксклюзивный дистрибьютор <br class="hidden-lg-up">Zilmet&nbsp;S.p.A. в России</p>
              </div>
              
              <div class="col-12 col-sm-12 col-md-5 col-lg-8 text-center text-md-left">
                <a class="header-mail" href="mailto:zilmet@zilmet.ru" rel="nofollow"><img src="/wp-content/themes/zilmet/images/mail.svg" class="mail-ico" width="19" height="25">zilmet@zilmet.ru</a>
                <br class="hidden-sm-down">
                <img src="/images/questions-circular-button.svg" alt="Доставка" class="hidden-xs-down" width="20" height="20"> <a href="/help/" class="shipping">Оплата и доставка</a>
              </div>
              <div class="col-12 col-md-7 col-lg-4 col-lg-offset-1  text-center">
                <div class="row">
                  <div class="col-8 text-right">
                    <a href="/cart/" class="header_cart_link" title="Корзина" rel="nofollow">
                      <div class="header_cart_count"><?php woo_cart_count(); ?></div>
                      <div class="header_cart_ammount"><?php $totalvalheader = WC()->cart->cart_contents_total + $woocommerce->cart->tax_total; echo $totalvalheader; ?> ₽</div>
                    </a>
                  </div>
                  <div class="col-4">
                    <a href="/cart/" class="header_cart_link" title="Корзина" rel="nofollow"><img src="/images/trolley.svg" alt="" height="35"></a>
                  </div>
                </div>
                <!-- <p class="address"><a href="/contact-us/">141707, МО, г. Долгопрудный, Лихачевский проезд, д.8</a></p> -->
              </div>
            </div>
          </div>

        </div><!-- row -->
      </header>
      <div class="row">
        <div class="col-12">
        <?php
          $top_menu = wp_nav_menu( array(
            'theme_location'  => 'primary_header_menu',
            'container'       => 'nav', 
            'container_class' => 'navigation', 
            'menu_class'      => 'menu nav', 
            'fallback_cb'     => 'wp_page_menu',
            'items_wrap'      => '<ul id="%1$s" class="%2$s" role="navigation">%3$s</ul>',
            'depth'           => 0,
            'echo'            => false
          ) ); 
          $top_menu = str_replace('class="menu-item', 'class="menu-item nav-item', $top_menu);
          $top_menu = str_replace('<a', '<a class="nav-link"', $top_menu);
          echo $top_menu;
        ?>
        </div>
      </div>

      <div class="row">
        <div id="sidebar" class="col-12 col-sm-4 col-md-3">
          <?php get_sidebar(); ?>
        </div>