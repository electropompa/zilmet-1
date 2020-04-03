<?php get_header(); ?>

<?php
$products = array(
	array(
		'name'  => 'Вертикальные гидроаккумуляторы',
		'img'   => '/wp-content/uploads/2018/07/DSC_0020_crop-150x150.jpg',
		'link'  => '/bak/gidroakkumulyatory-ultra-pro/vertikalnye/',
	),
	array(
		'name'  => 'Горизонтальные гидроаккумуляторы',
		'img'   => '/wp-content/uploads/2016/01/1100005013-white-150x150.jpg',
		'link'  => '/bak/gidroakkumulyatory-ultra-pro/gorizontalnyje/',
	),
    array(
        'name'  => 'С фланцем из нержавеющей стали',
        'img'   => '/wp-content/uploads/2016/01/nerzh-150x150.jpg',
        'link'  => '/bak/gidroakkumulyatory-ultra-pro/flange-stainless/',
    ),
    array(
        'name'  => 'До 16 bar',
        'img'   => '/wp-content/uploads/2016/01/25-bar-150x150.jpg',
        'link'  => '/bak/gidroakkumulyatory-ultra-pro/16-bar/',
    ),
	array(
		'name'  => 'До 20 bar',
		'img'   => '/wp-content/uploads/2016/01/20-бар-150x150.jpg',
		'link'  => '/bak/gidroakkumulyatory-ultra-pro/20-bar/',
	),
	array(
		'name'  => 'До 25 bar',
		'img'   => '/wp-content/uploads/2016/01/25-bar-150x150.jpg',
		'link'  => '/bak/gidroakkumulyatory-ultra-pro/25-bar/',
	),
	array(
		'name'  => 'С фланцем из Технопрена',
		'img'   => '/wp-content/uploads/2016/01/evo-150x150.jpg',
		'link'  => '/bak/gidroakkumulyatory-ultra-pro/tehnopren/',
	),
	array(
		'name'  => 'Из нержавеющей стали',
		'img'   => '/wp-content/uploads/2016/01/inox-ultra-150x150.jpg',
		'link'  => '/bak/inox-pro/ultra/',
	),
);
?>

    <main class="front-page-content col-12 col-sm-8 col-md-9" role="main">
        <h1>Официальный сайт Zilmet</h1>
        <h2 class="mb-4">Баки для водоснабжения</h2>
        <!-- div class="row no-gutters mb-2">
            <div class="col-12 col-md-4">
                <img class="mr-2" src="/wp-content/themes/zilmet/images/water.svg" alt="">
                <img class="mr-2" src="/wp-content/themes/zilmet/images/recicling.svg" alt="">
                <img class="mr-2" src="/wp-content/themes/zilmet/images/shower.svg" alt="">
                <img src="/wp-content/themes/zilmet/images/heat.svg" alt="">
            </div>
            <div class="col-12 col-md-8">
                <p class="grey"><i><b>Применение</b>: Питьевая вода, с насосами и установками повышения давления, ГВС, отопления и охлаждения</i></p>
            </div>
        </div -->
        <div class="row">
			<?php
			foreach ( $products as $product ) { ?>
                <div class="front-page-product-item col-6 col-xl-3 mb-3">
                    <a href="<?= $product['link'] ?>" title="<?= $product['name'] ?>">
                        <img src="<?= $product['img'] ?>" alt="<?= $product['name'] ?>">
                        <p><?= $product['name'] ?></p>
                    </a>
                </div>
			<?php } ?>
        </div>
		<?php
		if ( have_posts() ):
			while ( have_posts() ): the_post();

				the_content();

			endwhile;
		endif; ?>
    </main>

<?php get_footer(); ?>