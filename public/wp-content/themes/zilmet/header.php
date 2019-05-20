<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <?php 
    $queried_object = get_queried_object(); 
    $taxonomy = $queried_object->taxonomy;
    $term_id = $queried_object->term_id;
  ?>
  <title><?php the_meta_title($taxonomy, $term_id); ?></title>
  <meta name="description" content="<?php the_meta_description($taxonomy, $term_id); ?>">
  <meta name="keywords" content="<?php the_meta_keywords($taxonomy, $term_id); ?>">
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
  <!-- Pushy Menu -->
  <nav class="pushy pushy-left">
    <div class="pushy-content">
     <div class="text-right">
      <button class="menu-btn"><img src="<?php bloginfo('template_url'); ?>/images/close.svg" alt="Закрыть" width="24"></button>
    </div>
    <?php
    wp_nav_menu( array(
      'theme_location'  => 'mobile_menu',
      'container'       => 'nav', 
      'container_class' => '', 
      'menu_class'      => '', 
      'fallback_cb'     => 'wp_page_menu',
      'items_wrap'      => '<ul id="%1$s" class="%2$s" role="navigation">%3$s</ul>',
      'depth'           => 0,
      'echo'            => true
    ) ); 
    ?>
  </div>
</nav>

<div id="container">

  <!-- Site Overlay -->
  <div class="site-overlay"></div>

  <div class="pushy-menu-line-wrapper d-flex justify-content-between align-items-center d-sm-none">
    <button class="menu-btn">&#9776; Меню</button>
    <div class="d-inline-block mr-3"><a href="tel:88001000077" rel="nofollow"><img src="<?php bloginfo('template_url'); ?>/images/phone-call-white.svg" alt="" width="24"></a></div>
  </div>
    <div class="b__fixed"></div>
    <div class="container">
      <div class="content-wrapper">
        <header class="header" role="banner">
          <div class="row">
            <!-- Logo -->
            <div class="col-6 col-sm-5 col-md-3 col-lg-2 mb-1 mb-sm-0 text-center">
              <a href="/">
                <img src="/images/headers/zilmet_globally_renowned.svg" alt="Zilmet logo" class="zilmet-logo"> 
              </a>
            </div>

            <div class="col-12 col-sm-6 col-md-4 col-lg-3 text-left text-sm-right order-last">
              <a class="phone-moscow d-none d-sm-block" href="tel:+74959819244" rel="nofollow">+7 (495) 981-92-44</a>
              <a class="header-phone d-none d-sm-block" href="tel:88001000077" rel="nofollow"> 8 800 100 00 77</a>
              <div class="call-free-desc d-none d-sm-block">Звонок по России бесплатный</div>
              <time id="timetable" itemprop="openingHours" datetime="Mo-Fr 09:00−18:00"><small>Пн - Чт:</small> 9.00 - 18.00</time>
              <time datetime="Sa 09:00-17:00"><small>Пт:</small> 9.00 - 17.00</time>
            </div>

            <div class="col-6 col-sm-12 col-md-12 col-lg-6 offset-md-1">
              <div class="row contacts">
                <div class="d-none d-sm-block col-sm-12">
                  <p class="header-desc text-center">Эксклюзивный дистрибьютор <br class="hidden-lg-up">Zilmet&nbsp;S.p.A. в России</p>
                </div>
                <div class="col-12 col-sm-12 col-md-5 col-lg-8 text-center text-md-left">
                  <a class="header-mail mb-3 mb-sm-1" href="mailto:zilmet@zilmet.ru" rel="nofollow"><img src="/wp-content/themes/zilmet/images/mail.svg" class="mail-ico d-none d-sm-inline-block" width="19" height="25" alt="">zilmet@zilmet.ru</a>
                  <br class="hidden-sm-down">
                  <img src="/images/questions-circular-button.svg" alt="Доставка" class="d-none d-sm-inline-block" width="20" height="20"> <a class="shipping d-none d-sm-inline-block" href="/help/">Оплата и доставка</a>
                </div>
                <div class="col-12 col-md-7 col-lg-4 col-lg-offset-1  text-center">
                  <div class="row no-gutters">
                    <div class="col-8 text-right">
                      <a href="/checkout/" class="header_cart_link" title="Корзина" rel="nofollow">
                        <div class="header_cart_count"><?php woo_cart_count(); ?></div>
                        <div class="header_cart_ammount"><?=WC()->cart->total?> ₽</div>
                      </a>
                    </div>
                    <div class="col-4 mt-1 mt-sm-2">
                      <a href="/checkout/" class="header_cart_link" title="Корзина" rel="nofollow"><img src="/images/trolley.svg" alt="" height="35"></a>
                    </div>
                  </div>
                  <!-- <p class="address"><a href="/contact-us/">141707, МО, г. Долгопрудный, Лихачевский проезд, д.8</a></p> -->
                </div>
              </div>
            </div>

          </div><!-- row -->
        </header>


 
        <div class="row d-none d-sm-block">
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
          <div id="sidebar" class="col-12 col-sm-4 col-md-3 d-none d-sm-block">
            <?php get_sidebar(); ?>
          </div>