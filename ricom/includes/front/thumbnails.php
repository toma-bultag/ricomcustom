<?php

add_action( 'after_setup_theme', 'wpdocs_theme_setup' );
function wpdocs_theme_setup() {
    add_image_size( 'prod_list_1_item', 150, 170 , true ); // (cropped)
    add_image_size( 'package', 140, 140 , true ); // (cropped)
    add_image_size( 'minithumb', 47, 47 , true ); // (cropped)
    add_image_size( 'bogthumb', 290, 245 , true ); // (cropped)
    add_image_size( 'slider_2', 480, 300 , array( 'top' ) ); // (cropped)

    //add_image_size( 'latest_projects', 600, 600 ); // 300 pixels wide (and unlimited height)
    //add_image_size( 'portfolio', 700, 581, array( 'left', 'top' ) ); // (cropped)
    //add_image_size( 'portfoio_2', 700, 514 , array( 'top', 'center' ) ); // (cropped)
    //add_image_size( 'portfoio_300', 300, 300 , true ); // (cropped)
    //add_image_size( 'blog_listing', 1155, 645 , true ); // (cropped)
    //add_image_size( 'service', 638, 700, array( 'left', 'top' ) ); // (cropped)
}