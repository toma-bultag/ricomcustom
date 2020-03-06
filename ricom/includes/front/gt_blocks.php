<?php 

function register_acf_block_types() {

    // register a testimonial block.
    acf_register_block_type(array(
        'name'              => 'slider_gt_1',
        'title'             => __('slider_gt_1'),
        'description'       => __('A custom slider_gt_1 block.'),
        'render_template'   => 'template-parts/blocks/slider_gt_1/slider_gt_1.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        'keywords'          => array( 'slider_gt_1', 'quote' ),
    ));

    acf_register_block_type(array(
        'name'              => 'projects_list_gt',
        'title'             => __('projects_list_gt'),
        'description'       => __('A custom videos block.'),
        'render_template'   => 'template-parts/blocks/projects_list_gt/projects_list_gt.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        'keywords'          => array( 'projects', 'quote' ),
    ));

    acf_register_block_type(array(
        'name'              => 'map_gt',
        'title'             => __('map_gt'),
        'description'       => __('A custom gallery block.'),
        'render_template'   => 'template-parts/blocks/map_gt/map_gt.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        'keywords'          => array( 'map', 'quote' ),
    ));

    acf_register_block_type(array(
        'name'              => 'home_about_gt',
        'title'             => __('home_about_gt'),
        'description'       => __('A custom gallery block.'),
        'render_template'   => 'template-parts/blocks/home_about_gt/home_about_gt.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        'keywords'          => array( 'home_about', 'quote' ),
    ));

    acf_register_block_type(array(
        'name'              => 'home_slider_gt',
        'title'             => __('home_slider_gt'),
        'description'       => __('A custom gallery block.'),
        'render_template'   => 'template-parts/blocks/home_slider_gt/home_slider_gt.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        'keywords'          => array( 'home_slider', 'quote' ),
    ));

    acf_register_block_type(array(
        'name'              => 'slider_2_gt',
        'title'             => __('slider_2_gt'),
        'description'       => __('A custom blog slider block.'),
        'render_template'   => 'template-parts/blocks/slider_2_gt/slider_2_gt.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        'keywords'          => array( 'slider_2_gt', 'quote' ),
    ));

    acf_register_block_type(array(
        'name'              => 'contact_about_gt',
        'title'             => __('contact_about_gt'),
        'description'       => __('A custom blog slider block.'),
        'render_template'   => 'template-parts/blocks/contact_about_gt/contact_about_gt.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        'keywords'          => array( 'contact_about_gt', 'quote' ),
    ));

    acf_register_block_type(array(
        'name'              => 'banner_1_gt',
        'title'             => __('banner_1_gt'),
        'description'       => __('A custom blog slider block.'),
        'render_template'   => 'template-parts/blocks/banner_1_gt/banner_1_gt.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        'keywords'          => array( 'banner_1_gt', 'quote' ),
    ));
}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'register_acf_block_types');
}