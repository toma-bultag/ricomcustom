<?php 

/* -------------------------- *\
    .archive-product.php
\* -------------------------- */

//Remove add to cart from listing
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

//Remove promo from listig
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );

//add
add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 6 );

//Remove price from listing
// remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );

add_action( 'woocommerce_after_shop_loop_item_title', 'priceWord', 5 );
 
function priceWord() {
   echo '<span class="pr">'. __('Цена', 'bultag') .': </span>';
}

add_action( 'woocommerce_shop_loop_item_title', 'beforeTitle', 5 );
 
function beforeTitle() {
   echo '<div class="around_title"> <div class="around_title__innner">';
}

add_action( 'woocommerce_shop_loop_item_title', 'afterTitleInner', 15 );
 
 //Close .after_title__inner div % add content
function afterTitleInner() {
	
   // echo '</div><!-- /.after_title__inner -->';
	echo '<div class="desc">';
}

add_action( 'woocommerce_shop_loop_item_title', 'afterTitle', 16 );
 
 //Close .afterTitle div % add content
function afterTitle() {
	// echo '<p>' . wp_trim_words( get_the_content(), 20, '...' ) . '</p>';
	// echo wpautop( get_the_content() );
	echo get_ecommerce_excerpt();
	echo '</div><!-- /.desc -->';
   echo '</div><!-- /.after_title -->';
}

//Modify product listing ecerpt
function get_ecommerce_excerpt(){
$excerpt = get_the_excerpt();
$excerpt = substr($excerpt, 0, 200);
$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
return $excerpt;
}