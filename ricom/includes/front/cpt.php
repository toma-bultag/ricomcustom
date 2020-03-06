<?php 

// //Gutenberg CPT
function cw_post_type() {

    register_post_type( 'product',
        // WordPress CPT Options Start
        array(
            'labels' => array(
                'name' => __( 'Products' ),
                'singular_name' => __( 'products' ),
                'add_new_item' => __( 'Add new product' ),
                'all_items' => __( 'All products' ),
            ),
            'hierarchical'          => true,
            'has_archive' => true,
            'public' => true,
            'rewrite' => array('slug' => 'products'),
            'show_in_rest' => true,
            'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'taxonomies' ),
             // 'taxonomies' => array( 'category' ),
            'menu_icon' => 'dashicons-filter',
            // 'show_ui' => true,       
        )
    );

    register_post_type( 'solution',
        // WordPress CPT Options Start
        array(
            'labels' => array(
                'name' => __( 'Solutions' ),
                'singular_name' => __( 'solutions' ),
                'add_new_item' => __( 'Add new solution' ),
                'all_items' => __( 'All solutions' ),
            ),
            'hierarchical'          => true,
            'has_archive' => true,
            'public' => true,
            'rewrite' => array('slug' => 'solutions'),
            'show_in_rest' => true,
            'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'taxonomies' ),
             // 'taxonomies' => array( 'category' ),
            'menu_icon' => 'dashicons-admin-generic',
            // 'show_ui' => true,          
        )
    );

    register_taxonomy(
      'typ',
      'product',
      array(
        'hierarchical'          => true,
        'supports'          => array( 'thumbnail', 'editor' ),
        'show_ui'               => true,
        'public'                     => true,
        'show_admin_column'     => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             => true,
        'rewrite'               => array( 'slug' => 'type' ),
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'show_in_rest' => true,
        'labels'                => array(
          'name'                       => _x( 'Types', 'taxonomy general name' ),
          'singular_name'              => _x( 'type', 'taxonomy singular name' ),
          'search_items'               => __( 'Search types' ),
          'popular_items'              => __( 'Popular types' ),
          'all_items'                  => __( 'All types' ),
          'parent_item'                => null,
          'parent_item_colon'          => null,
          'edit_item'                  => __( 'Edit type' ),
          'update_item'                => __( 'Update type' ),
          'add_new_item'               => __( 'Add New type' ),
          'new_item_name'              => __( 'New type Name' ),
          'separate_items_with_commas' => __( 'Separate types with commas' ),
          'add_or_remove_items'        => __( 'Add or remove types' ),
          'choose_from_most_used'      => __( 'Choose from the most used types' ),
          'not_found'                  => __( 'No types found.' ),
          'menu_name'                  => __( 'Types' ),
        ),
        
      )
    );

    register_taxonomy(
      'solution_type',
      'solution',
      array(
        'hierarchical'          => true,
        'supports'          => array( 'thumbnail', 'editor' ),
        'show_ui'               => true,
        'public'                     => true,
        'show_admin_column'     => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             => true,
        'rewrite'               => array( 'slug' => 'solution-type' ),
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'show_in_rest' => true,
        'labels'                => array(
          'name'                       => _x( 'Types', 'taxonomy general name' ),
          'singular_name'              => _x( 'Category', 'taxonomy singular name' ),
          'search_items'               => __( 'Search Types' ),
          'popular_items'              => __( 'Popular Types' ),
          'all_items'                  => __( 'All Types' ),
          'parent_item'                => null,
          'parent_item_colon'          => null,
          'edit_item'                  => __( 'Edit Type' ),
          'update_item'                => __( 'Update Type' ),
          'add_new_item'               => __( 'Add New Type' ),
          'new_item_name'              => __( 'New Type Name' ),
          'separate_items_with_commas' => __( 'Separate Types with commas' ),
          'add_or_remove_items'        => __( 'Add or remove Types' ),
          'choose_from_most_used'      => __( 'Choose from the most used Types' ),
          'not_found'                  => __( 'No Types found.' ),
          'menu_name'                  => __( 'Types' ),
        ),
        
      )
    );
}

add_action( 'init', 'cw_post_type' );