<?php

/**
 * Register Services Custom Post Type
 */
function register_services_post_type() {

    $labels = array(
        'name'                  => 'Services',
        'singular_name'         => 'Service',
        'menu_name'             => 'Services',
        'name_admin_bar'        => 'Service',
        'add_new'               => 'Add New',
        'add_new_item'          => 'Add New Service',
        'new_item'              => 'New Service',
        'edit_item'             => 'Edit Service',
        'view_item'             => 'View Service',
        'all_items'             => 'All Services',
        'search_items'          => 'Search Services',
        'not_found'             => 'No services found',
        'not_found_in_trash'    => 'No services found in Trash',
        'featured_image'        => 'Service Image',
        'set_featured_image'    => 'Set Service Image',
        'remove_featured_image' => 'Remove Service Image',
        'use_featured_image'    => 'Use as Service Image',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,

        'menu_icon'          => 'dashicons-admin-tools',

        'supports'           => array(
            'title',
            'editor',
            'thumbnail',
            'excerpt',
            'page-attributes',
        ),

        'has_archive'        => true,

        'rewrite'            => array(
            'slug'       => 'treatments',
            'with_front' => false,
        ),

        'publicly_queryable' => true,
    );

    register_post_type('services', $args);
}

add_action('init', 'register_services_post_type');





/**
 * Register Services Category
 */
// function register_services_taxonomy() {

//     $labels = array(
//         'name'              => 'Service Categories',
//         'singular_name'     => 'Service Category',
//         'search_items'      => 'Search Service Categories',
//         'all_items'         => 'All Service Categories',
//         'parent_item'       => 'Parent Service Category',
//         'parent_item_colon' => 'Parent Service Category:',
//         'edit_item'         => 'Edit Service Category',
//         'update_item'       => 'Update Service Category',
//         'add_new_item'      => 'Add New Service Category',
//         'new_item_name'     => 'New Service Category Name',
//         'menu_name'         => 'Categories',
//     );

//     $args = array(
//         'hierarchical'      => true,
//         'labels'            => $labels,
//         'show_ui'           => true,
//         'show_admin_column' => true,
//         'show_in_rest'      => true,
//         'rewrite'           => array(
//             'slug' => 'service-category',
//         ),
//     );

//     register_taxonomy(
//         'service_category',
//         array('services'),
//         $args
//     );
// }

// add_action('init', 'register_services_taxonomy');


/**
 * Flush rewrite rules after theme/plugin activation
 */
// function services_rewrite_flush() {
//     register_services_post_type();
//     register_services_taxonomy();
//     flush_rewrite_rules();
// }

// register_activation_hook(__FILE__, 'services_rewrite_flush');