<?php 

  	function theme_features() {
	add_theme_support( 'post-thumbnails' );
	add_theme_support('title-tag');
	add_theme_support('menus');
	add_theme_support('post-thumbnails');
  	// add_theme_support('woocommerce');
	register_nav_menu('mainMenu', 'Main Menu');
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
	register_nav_menu('Footer_1', 'Footer Menu 1');
	register_nav_menu('Footer_2', 'Footer Menu 2');
	register_nav_menu('Footer_3', 'Footer Menu 3');
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'customize-selective-refresh-widgets' );


	// add_theme_support( 'woocommerce', array(
	// 	        'thumbnail_image_width' => 255,
	// 	        'single_image_width'    => 255,

	// 	        'product_grid'          => array(
	// 	            'default_rows'    => 10,
	// 	            'min_rows'        => 5,
	// 	            'max_rows'        => 10,
	// 	            'default_columns' => 4,
	// 	            'min_columns'     => 1,
	// 	            'max_columns'     => 5,
	// 	        ),
	// 	    ) );

	// 	add_theme_support( 'wc-product-gallery-zoom' );
	// 	add_theme_support( 'wc-product-gallery-lightbox' );
	// 	// add_theme_support( 'wc-product-gallery-slider' );

	// 	if ( ! isset( $content_width ) ) {
	// 		$content_width = 600;
	// 	}
}
add_action('after_setup_theme', 'theme_features');

