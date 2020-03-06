<?php
function kalitin_files() {
	wp_enqueue_style('main_styles', get_stylesheet_uri());
	wp_enqueue_style( 'styles', get_template_directory_uri() . '/styles.css',false,'1.1','all');
	/* wp_enqueue_script('app', '/temp/scripts/App.js', array(), null, true); */
	// wp_enqueue_script("jquery");
	wp_enqueue_script('image-map', get_template_directory_uri() . '/js/image-map.min.js', array( 'jquery' ), null, true);
	wp_enqueue_script('lightbox', get_template_directory_uri() . '/js/lightbox.js', array( 'jquery' ), null, true);

}
add_action('wp_enqueue_scripts', 'kalitin_files');


function theme_features() {
	add_theme_support( 'post-thumbnails' );
	add_theme_support('title-tag');
	add_theme_support('menus');
	register_nav_menu('headerBgMenu', 'Header Bg Menu');
	register_nav_menu('floorBgMenu', 'Floor Bg Menu');
}
add_action('after_setup_theme', 'theme_features');

//Add Custom Post Type - Apartments

function theme_post_types() {
	register_post_type('apartment', array(
		'rewrite' => array('slug' => 'apartamenti'),
		'has_archive' => true,
		'public' => true,
		'labels' => array(
			'name' => 'Apartments',
			'add_new_item' => 'Add new Apartment',
			'edit_item' => 'Edit Apartment',
			'all_items' => 'All Apartmennts',
			'singular_name' => 'Apartment'
		),
		'menu_icon' => 'dashicons-building'

	));

	register_post_type('etaj', array(
		'rewrite' => array('slug' => 'etaji'),
		'has_archive' => false,
		'public' => true,
		'labels' => array(
			'name' => 'Floors',
			'add_new_item' => 'Add new Floor',
			'edit_item' => 'Edit Floor',
			'all_items' => 'All Floors',
			'singular_name' => 'Floor'
		),
		'menu_icon' => 'dashicons-building'

	));
}

add_action('init', 'theme_post_types');