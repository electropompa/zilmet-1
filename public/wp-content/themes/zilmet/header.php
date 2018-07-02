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
  <link rel="icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <?php 
    wp_enqueue_style( 'bootstrap' ); 
    wp_enqueue_style( 'style' ); 
    echo get_post_meta($post->ID, 'yandexmap', true); 
    wp_head(); ?>

</head>

<body class="site">

	<section class="header-top-advert">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<p class="text-center d-flex align-items-center justify-content-center">
						<span class="white">С 1 июля цены снижены на 5%</span>
					</p>
				</div>
			</div>
		</div>
	</section>

  <div class="body"> 
    <div class="b__fixed"></div>
    <div class="container">
      <header class="header" role="banner">

        <div class="row">

          <!-- Logo -->
          <div class="col-12 col-sm-5 col-md-3 col-lg-2 col-xl-2 text-center">
            <a href="/">
              <img src="/images/headers/zilmet-logo-new.jpg" alt="Zilmet logo" class="zilmet-logo"> 
            </a>
          </div>

          <div class="col-sm-5 hidden-sm-down hidden-lg-up">
            <p class="header-desc sm text-md-center">Эксклюзивный дистрибьютор<br>Zilmet S.p.A. в России</p>
          </div>
          <div class="col-12 push-xs-0 col-sm-6 offset-sm-1 push-sm-0 col-md-4 offset-md-0 push-md-0 push-lg-7 col-lg-3 text-center text-sm-right">
              <a href="tel:+74959819244" rel="nofollow" class="phone-moscow">+7 (495) 981-92-44</a>
              <a href="tel:88001000077" rel="nofollow" class="header-phone"> 8 800 100 00 77</a>
              <span class="call-free-desc">Звонок по России бесплатный</span>
              <time id="timetable" itemprop="openingHours" datetime="Mo-Fr 09:00−18:00"><small>Пн - Чт:</small> 9.00 - 18.00</time>
              <time datetime="Sa 09:00-17:00"><small>Пт:</small> 9.00 - 17.00</time>
          </div>

          <div class="col-12 col-sm-12 col-md-12 pull-md-0 pull-lg-3 col-lg-7">
            <div class="row contacts">
              <div class="col-sm-12 hidden-md-down">
                <p class="header-desc text-center">Эксклюзивный дистрибьютор <br class="hidden-lg-up">Zilmet&nbsp;S.p.A. в России</p>
              </div>
              
              <div class="col-12 col-md-7 col-lg-6 col-lg-offset-1  text-center">
                <p class="address"><a href="/contact-us/">141707, МО, г. Долгопрудный, Лихачевский проезд, д.8</a></p>
              </div>
              <div class="col-12 col-sm-12 col-md-5 col-lg-5 text-center text-md-left">
                <span class="header-mail"><img src="/wp-content/themes/zilmet/images/mail.svg" class="mail-ico hidden-xs-down">zilmet@zilmet.ru</span>
                <br class="hidden-sm-down">
                <img src="/wp-content/themes/zilmet/images/package.svg" alt="Доставка" class="hidden-xs-down" width="20"> <a href="/dostavka" class="shipping">Оплата и доставка</a>
              </div>
            </div>
          </div>
        </div><!-- row -->
      </header>
      <div class="row">
        <div class="col-12">
        <?php wp_nav_menu( array(
                'theme_location'  => 'primary_header_menu',
                'menu'            => '', 
                'container'       => 'nav', 
                'container_class' => 'navigation', 
                'container_id'    => '',
                'menu_class'      => 'menu', 
                'menu_id'         => '',
                'echo'            => true,
                'fallback_cb'     => 'wp_page_menu',
                'before'          => '',
                'after'           => '',
                'link_before'     => '',
                'link_after'      => '',
                'items_wrap'      => '<ul id="%1$s" class="%2$s" role="navigation">%3$s</ul>',
                'depth'           => 0
              ) ); ?>
        </div>
      </div>

      <div class="row">
        <div id="sidebar" class="col-12 col-sm-4 col-md-3 col-lg-3">
          <?php wp_nav_menu( array(
                  'theme_location'  => 'aside_menu',
                  'menu'            => '', 
                  'container'       => 'nav', 
                  'container_class' => 'navbar', 
                  'container_id'    => '',
                  'menu_class'      => 'menu', 
                  'menu_id'         => '',
                  'echo'            => true,
                  'fallback_cb'     => 'wp_page_menu',
                  'before'          => '',
                  'after'           => '',
                  'link_before'     => '',
                  'link_after'      => '',
                  'items_wrap'      => '<ul id="%1$s" class="%2$s" role="navigation">%3$s</ul>',
                  'depth'           => 1
                ) ); ?>
          <div class="col-lg-12"><?php woocommerce_cart_totals(); ?></div>
        </div>
