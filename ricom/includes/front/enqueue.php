<?php  

function theme_files() {
	$uri = get_template_directory_uri();
 	// wp_enqueue_script('jquery-ui-datepicker');
	// wp_enqueue_style('pickmeup', $uri . '/css/jquery-ui.min.css');
	wp_enqueue_style('main_styles', get_stylesheet_uri());
 	wp_enqueue_style('google_fonts','https://fonts.googleapis.com/css?family=Roboto:300,400,400i,700,900');
 	// wp_enqueue_style('font_awesome', 'https://use.fontawesome.com/releases/v5.5.0/css/all.css');
	// wp_enqueue_script('waypoints', $uri . '/js/jquery.waypoints.min.js', array( 'jquery' ), null, true);
 	// wp_enqueue_script('isotope', $uri . '/js/isotope.pkgd.min.js', array( 'jquery' ), null, true);
 	// wp_enqueue_script('bundle2', $uri . '/js/cus2.js', array( 'jquery' ), null, true);
 	wp_enqueue_script('custom', $uri . '/js/scripts.js', array( 'jquery' ), null, true);	
 	wp_enqueue_script('bundle', $uri . '/js/bundle.js', array( 'jquery' ), null, true);
 	// wp_localize_script('custom2', 'ajax', array( 'url' => admin_url( 'admin-ajax.php' ) ));
}
add_action('wp_enqueue_scripts', 'theme_files');

function admin_enqueue_scripts() {
	// wp_enqueue_style('pickmeup', get_template_directory_uri() . '/css/pickmeup.css');
	// wp_enqueue_script('pickmeup', get_template_directory_uri() . '/js/admin/pickmeup.min.js', array(), null, true);
	// wp_enqueue_script('admin-custom', get_template_directory_uri() . '/js/admin/admin-custom.js', array(), null, true);	
}
add_action('admin_enqueue_scripts', 'admin_enqueue_scripts'); 