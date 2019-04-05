<?php 

$sidebar_menu = wp_nav_menu( array(
  'theme_location'  => 'aside_menu',
  'container'       => 'nav', 
  'container_class' => 'navbar', 
  'menu_class'      => 'nav', 
  'echo'            => 0,
  'fallback_cb'     => 'wp_page_menu',
  'items_wrap'      => '<ul id="%1$s" class="%2$s" role="navigation">%3$s</ul>',
  'depth'           => 1
) ); 
$sidebar_menu = str_replace('class="menu-item', 'class="menu-item nav-item', $sidebar_menu);
$sidebar_menu = str_replace('<a', '<a class="nav-link"', $sidebar_menu);
echo $sidebar_menu;
