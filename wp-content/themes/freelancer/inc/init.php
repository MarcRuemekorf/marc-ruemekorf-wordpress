<?php
/**
* Register Custom Post Type: Cases
*
*/
function cases_init() {

  $labels = array(
    'name'                  => _x( 'Cases', 'Post Type General Name', 'freelancer' ),
    'singular_name'         => _x( 'Case', 'Post Type Singular Name', 'freelancer' ),
    'menu_name'             => __( 'Cases', 'freelancer' ),
    'name_admin_bar'        => __( 'Case', 'freelancer' ),
    'archives'              => __( 'Case Archives', 'freelancer' ),
    'attributes'            => __( 'Case Attributes', 'freelancer' ),
    'parent_item_colon'     => __( 'Parent Case:', 'freelancer' ),
    'all_items'             => __( 'All Cases', 'freelancer' ),
    'add_new_item'          => __( 'Add New Case', 'freelancer' ),
    'add_new'               => __( 'Add New', 'freelancer' ),
    'new_item'              => __( 'New Case', 'freelancer' ),
    'edit_item'             => __( 'Edit Case', 'freelancer' ),
    'update_item'           => __( 'Update Case', 'freelancer' ),
    'view_item'             => __( 'View Case', 'freelancer' ),
    'view_items'            => __( 'View Cases', 'freelancer' ),
    'search_items'          => __( 'Search Cases', 'freelancer' ),
    'not_found'             => __( 'Not found', 'freelancer' ),
    'not_found_in_trash'    => __( 'Not found in Trash', 'freelancer' ),
    'featured_image'        => __( 'Featured Image', 'freelancer' ),
    'set_featured_image'    => __( 'Set featured image', 'freelancer' ),
    'remove_featured_image' => __( 'Remove featured image', 'freelancer' ),
    'use_featured_image'    => __( 'Use as featured image', 'freelancer' ),
    'insert_into_item'      => __( 'Insert into case', 'freelancer' ),
    'uploaded_to_this_item' => __( 'Uploaded to this case', 'freelancer' ),
    'items_list'            => __( 'Cases list', 'freelancer' ),
    'items_list_navigation' => __( 'Cases list navigation', 'freelancer' ),
    'filter_items_list'     => __( 'Filter cases list', 'freelancer' ),
  );
  $args = array(
    'label'                 => __( 'case', 'freelancer' ),
    'description'           => __( 'Post type for cases', 'freelancer' ),
    'labels'                => $labels,
    'supports'              => array( 'title', 'editor', 'thumbnail' ),
    'taxonomies'            => array( 'webdesign', 'web-development' ),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 5,
    'menu_icon'             => 'dashicons-screenoptions',
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => true,
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capability_type'       => 'post',
    'show_in_rest'          => true,
  );
  register_post_type( 'cases', $args );

}
add_action( 'init', 'cases_init', 0 );

/**
 * Register Custom Post Type: Services
 *
 */
// Register Custom Post Type
function services_init() {

  $labels = array(
    'name'                  => _x( 'Services', 'Post Type General Name', 'freelancer' ),
    'singular_name'         => _x( 'Service', 'Post Type Singular Name', 'freelancer' ),
    'menu_name'             => __( 'Services', 'freelancer' ),
    'name_admin_bar'        => __( 'Service', 'freelancer' ),
    'archives'              => __( 'Service Archives', 'freelancer' ),
    'attributes'            => __( 'Service Attributes', 'freelancer' ),
    'parent_item_colon'     => __( 'Parent Service:', 'freelancer' ),
    'all_items'             => __( 'All Service', 'freelancer' ),
    'add_new_item'          => __( 'Add New Service', 'freelancer' ),
    'add_new'               => __( 'Add New', 'freelancer' ),
    'new_item'              => __( 'New Service', 'freelancer' ),
    'edit_item'             => __( 'Edit Service', 'freelancer' ),
    'update_item'           => __( 'Update Service', 'freelancer' ),
    'view_item'             => __( 'View Service', 'freelancer' ),
    'view_items'            => __( 'View Services', 'freelancer' ),
    'search_items'          => __( 'Search Services', 'freelancer' ),
    'not_found'             => __( 'Not found', 'freelancer' ),
    'not_found_in_trash'    => __( 'Not found in Trash', 'freelancer' ),
    'featured_image'        => __( 'Featured Image', 'freelancer' ),
    'set_featured_image'    => __( 'Set featured image', 'freelancer' ),
    'remove_featured_image' => __( 'Remove featured image', 'freelancer' ),
    'use_featured_image'    => __( 'Use as featured image', 'freelancer' ),
    'insert_into_item'      => __( 'Insert into service', 'freelancer' ),
    'uploaded_to_this_item' => __( 'Uploaded to this service', 'freelancer' ),
    'items_list'            => __( 'Services list', 'freelancer' ),
    'items_list_navigation' => __( 'Services list navigation', 'freelancer' ),
    'filter_items_list'     => __( 'Filter services list', 'freelancer' ),
  );
  $args = array(
    'label'                 => __( 'service', 'freelancer' ),
    'description'           => __( 'Post type for services', 'freelancer' ),
    'labels'                => $labels,
    'supports'              => array( 'title', 'editor', 'thumbnail' ),
    'taxonomies'            => array( 'webdesign', ' web-development', ' hosting', ' support' ),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 5,
    'menu_icon'             => 'dashicons-image-filter',
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => true,
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capability_type'       => 'post',
    'show_in_rest'          => true,
  );
  register_post_type( 'services', $args );

}
add_action( 'init', 'services_init', 0 );