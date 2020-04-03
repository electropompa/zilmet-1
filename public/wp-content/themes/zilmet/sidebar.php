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

?>

<div class="sidebar-banner-wrapper">
    <img src="/images/3d.jpg" alt="3d модели баков">
<div id="sidebar-banner">
	<p><b>New!!!</b> Теперь доступны для скачивания 3D-модели баков серий ULTRA-PRO <a href="/bak/gidroakkumulyatory-ultra-pro/vertikalnye/" title="Вертикальные гидроаккумуляторы">вертикальные</a>, <a href="/bak/gidroakkumulyatory-ultra-pro/gorizontalnyje/" title="Горизонтальные гидроаккумуляторы">горизонтальные</a> и <a href="/bak/rasshiritelnye/cal-pro/" title="Расширительные баки">CAL-PRO</a></p>
</div>
</div>

