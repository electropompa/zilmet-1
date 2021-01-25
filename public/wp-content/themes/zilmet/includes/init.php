<?php

if ( ! function_exists( 'zilmet_setup' ) ) {
	function zilmet_setup() {
		define( 'WOOCOMMERCE_USE_CSS', false );

		add_theme_support( 'woocommerce' );
		add_theme_support( 'html5', array( 'search-form' ) );
		add_theme_support( 'widgets' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-slider' );
	}
}
add_action( 'after_setup_theme', 'zilmet_setup' );

function zilmet_style_method() {
	wp_enqueue_style( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css', '', '', '' );
	// wp_enqueue_style( 'zilmet-woocommerce', get_template_directory_uri() . '/woocommerce.css', null, 1.0, 'screen' );
	// wp_enqueue_style( 'fixed', get_template_directory_uri() . "/css/fixed.css", '', '', '' );
	wp_enqueue_style( 'style', get_template_directory_uri() . "/css/style.css", '', '', '' );
	// wp_enqueue_style( 'concat', get_template_directory_uri() . "/css/concat.min.css", '', '', '' );
}

if ( ! is_admin() ) {
	add_action( 'wp_print_styles', 'zilmet_style_method' );
}

function zilmet_scripts_method() {
	wp_deregister_script( 'jquery' );
	wp_enqueue_script( 'jquery', "https://yastatic.net/jquery/2.0.3/jquery.min.js", '', '', 'true' );
	wp_enqueue_script( 'bootstrap', "https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js", '', '', 'true' );
	wp_enqueue_script( 'maskedinput', get_template_directory_uri() . "/js/jquery.maskedinput.min.js", '', '', 'true' );
	// wp_enqueue_script( 'js-calculator', get_template_directory_uri() . "/js/raschet_otopl.js", '', '', 'true' );
	wp_enqueue_script( 'pushy', get_template_directory_uri() . "/js/pushy.min.js", '', '', 'true' );
	wp_enqueue_script( 'script', get_template_directory_uri() . "/js/script.js", '', '', 'true' );
}

add_action( 'wp_enqueue_scripts', 'zilmet_scripts_method' );


function zilmet_register_menu() {
	register_nav_menus( array(
		'primary_header_menu' => __( 'Верхнее меню' ),
		'aside_menu'          => __( 'Боковое меню' ),
		'mobile_menu'         => __( 'Мобильное меню' ),
	) );
}
if ( function_exists( 'register_nav_menus' ) ) {
	add_action( 'init', 'zilmet_register_menu' );
}

function true_register_wp_sidebars() {
	/* Сайдбар для вывода виджета обратного звонка */
	register_sidebar(
		array(
			'id'            => 'true_side',
			// уникальный id
			'name'          => 'Обратный звонок',
			// название сайдбара
			'description'   => 'Перетащите сюда виджеты, чтобы добавить их в сайдбар.',
			// описание
			'before_widget' => '<div id="%1$s" class="side widget %2$s">',
			// по умолчанию виджеты выводятся <li>-списком
			'after_widget'  => '</div>',
			'before_title'  => '',
			// по умолчанию заголовки виджетов в <h2>
			'after_title'   => ''
		)
	);
}

add_action( 'widgets_init', 'true_register_wp_sidebars' );

// Отключаем сжатие изображений
add_filter( 'jpeg_quality', function () {
	return 100;
} );

remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
// если собираетесь выводить вставки из других сайтов на своем, то закомментируйте след. строку.
remove_action( 'wp_head', 'wp_oembed_add_host_js' );

/* Сброс фильтра для html в описании категории */
remove_filter( 'pre_term_description', 'wp_filter_kses' );
remove_filter( 'pre_term_description', 'wp_kses_data' );

/* удаляем shortlink и canonical */
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
remove_action( 'wp_head', 'rel_canonical' );

// Убираем мусор из шапки
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'rsd_link' );

// убираем emoji
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

remove_filter( 'the_content', 'wptexturize' ); /* убираем авотдобавление параграфиов */
remove_action( 'wp_head', 'wp_resource_hints', 2 ); /* удаляем dns-prefetch */

// Удаляем автоподстановку размера картинок
// add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
// add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );

// function remove_thumbnail_dimensions( $html ) {
//     $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
//     return $html; 
// }

// Удаляем RSS ленту
function fb_disable_feed() {
	wp_redirect( get_option( 'siteurl' ) );//будет осуществляться редирект на главную страницу
}

add_action( 'do_feed', 'fb_disable_feed', 1 );
add_action( 'do_feed_rdf', 'fb_disable_feed', 1 );
add_action( 'do_feed_rss', 'fb_disable_feed', 1 );
add_action( 'do_feed_rss2', 'fb_disable_feed', 1 );
add_action( 'do_feed_atom', 'fb_disable_feed', 1 );
add_action( 'do_feed_rss2_comments', 'fb_disable_feed', 1 );
add_action( 'do_feed_atom_comments', 'fb_disable_feed', 1 );
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'feed_links', 2 );

// add_action( 'init', 'balls' );
function balls() {
	if ( !is_admin() ) {
		add_action( 'wp_print_styles', 'balls_style_method' );
		add_action( 'wp_enqueue_scripts', 'balls_script_method' );
	}

	function balls_style_method(){
		wp_enqueue_style( 'balls', get_template_directory_uri() . "/css/balls.css", '', '', '' );
	}

	function balls_script_method() {
		wp_enqueue_script( 'balls', get_template_directory_uri() . "/js/balls.js", '', '', 'true' );
	}

	function balls_template() {
		get_template_part( 'includes/new_year_balls' );
	}
	add_action( 'wp_body_open', 'balls_template' );
}