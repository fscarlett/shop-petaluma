<?php 

function spet_post_types() {

//register Merchant post type
  $merchant_labels = array(
    'name'                => 'Merchants',
    'singular_name'       => 'Merchant',
    'menu_name'           => 'Merchants',
    'name_admin_bar'      => 'Merchant',
    'add_new'             => 'Add New',
    'add_new_item'        => 'Add New Merchant',
    'new_item'            => 'New Merchant',
    'edit_item'           => 'Edit Merchant',
    'view_item'           => 'View Merchant',
    'all_items'           => 'All Merchants',
    'search_items'        => 'Search For Merchants',
    'parent_item_colon'   => 'Parent Merchants:',
    'not_found'           => 'No Merchant found.',
    'not_found_in_trash'  => 'No Merchant found in trash.',
    );
  $merchant_args = array(
    'labels'              => $merchant_labels,
    'description'         => 'Merchants',
    'public'              => true,
    'publicly_queryable'  => true,
    'show_ui'             => true,
    'query_var'           => true,
    'rewrite'             => array( 'slug' => 'merchants' ),
    'capability_type'     => 'page',
    'map_meta_cap'        => true,
    'exclude_from_search' => false,
    'has_archive'         => false,
    'hierarchical'        => false,
    'taxonomies'          => array( 'category' ),
    'menu_position'       => null,
    'supports'            => array( 'title', 'thumbnail', 'editor', 'excerpt', 'page-attributes' ),
    'menu_icon'           => 'dashicons-store',
    );

  register_post_type( 'spet_merchant', $merchant_args );


// //register Problem post type
//   $problem_labels = array(
//     'name'                => 'Problems',
//     'singular_name'       => 'Problem',
//     'menu_name'           => 'Problems',
//     'name_admin_bar'      => 'Problem',
//     'add_new'             => 'Add New',
//     'add_new_item'        => 'Add New Problem',
//     'new_item'            => 'New Problem',
//     'edit_item'           => 'Edit Problem',
//     'view_item'           => 'View Problem',
//     'all_items'           => 'All Problems',
//     'search_items'        => 'Search For Problems',
//     'parent_item_colon'   => 'Parent Problems:',
//     'not_found'           => 'No Problem found.',
//     'not_found_in_trash'  => 'No Problem found in trash.',
//     );
//   $problem_args = array(
//     'labels'              => $problem_labels,
//     'description'         => 'Problems',
//     'public'              => true,
//     'publicly_queryable'  => true,
//     'show_ui'             => true,
//     'query_var'           => true,
//     'rewrite'             => array( 'slug' => 'solution-center/problems' ),
//     'capability_type'     => 'page',
//     'exclude_from_search' => false,
//     'has_archive'         => false,
//     'hierarchical'        => true,
//     'menu_position'       => null,
//     'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes' ),
//     'menu_icon'           => 'dashicons-warning',
//     );

//   register_post_type( 'spet_problem', $problem_args );





//   //register Job Opening post type
//   $opening_labels = array(
//     'name'                => 'Job Openings',
//     'singular_name'       => 'Job Opening',
//     'menu_name'           => 'Job Openings',
//     'name_admin_bar'      => 'Job Opening',
//     'add_new'             => 'Add New',
//     'add_new_item'        => 'Add New Job Opening',
//     'new_item'            => 'New Job Opening',
//     'edit_item'           => 'Edit Job Opening',
//     'view_item'           => 'View Job Opening',
//     'all_items'           => 'All Job Openings',
//     'search_items'        => 'Search For Job Openings',
//     'parent_item_colon'   => 'Parent Job Openings:',
//     'not_found'           => 'No Job Opening found.',
//     'not_found_in_trash'  => 'No Job Opening found in trash.',
//     );
//   $opening_args = array(
//     'labels'              => $opening_labels,
//     'description'         => 'Job Openings',
//     'public'              => true,
//     'publicly_queryable'  => true,
//     'show_ui'             => true,
//     'query_var'           => true,
//     'rewrite'             => array( 'slug' => 'job-openings' ),
//     'capability_type'     => 'page',
//     'map_meta_cap'        => true,
//     'exclude_from_search' => false,
//     'has_archive'         => true,
//     'hierarchical'        => false,
//     'menu_position'       => null,
//     'supports'            => array( 'title', 'thumbnail', 'editor', 'excerpt', 'page-attributes' ),
//     'menu_icon'           => 'dashicons-universal-access',
//     );

//   register_post_type( 'spet_opening', $opening_args );


// //register Resource post type
//   $resource_labels = array(
//     'name'                => 'Resources',
//     'singular_name'       => 'Resource',
//     'menu_name'           => 'Resources',
//     'name_admin_bar'      => 'Resource',
//     'add_new'             => 'Add New',
//     'add_new_item'        => 'Add New Resource',
//     'new_item'            => 'New Resource',
//     'edit_item'           => 'Edit Resource',
//     'view_item'           => 'View Resource',
//     'all_items'           => 'All Resources',
//     'search_items'        => 'Search For Resources',
//     'parent_item_colon'   => 'Parent Resources:',
//     'not_found'           => 'No Resource found.',
//     'not_found_in_trash'  => 'No Resource found in trash.',
//     );
//   $resource_args = array(
//     'labels'              => $resource_labels,
//     'description'         => 'Resources',
//     'public'              => true,
//     'publicly_queryable'  => true,
//     'show_ui'             => true,
//     'query_var'           => true,
//     'rewrite'             => array( 'slug' => 'resources' ),
//     'capability_type'     => 'page',
//     'map_meta_cap'        => true,
//     'exclude_from_search' => false,
//     'has_archive'         => false,
//     'hierarchical'        => false,
//     'menu_position'       => null,
//     'supports'            => array( 'title', 'thumbnail', 'editor', 'excerpt', 'page-attributes' ),
//     'menu_icon'           => 'dashicons-palmtree',
//     );

//   register_post_type( 'spet_resource', $resource_args );

}

add_action( 'init', 'spet_post_types', 10 );
