<?php 

add_action( 'init', 'spet_zone_taxonomy', 0 );
 
function spet_zone_taxonomy() {
 
  $labels = array(
    'name' => _x( 'Zone', 'taxonomy general name' ),
    'singular_name' => _x( 'Zone', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Zones' ),
    // 'popular_items' => __( 'Popular Zones' ),
    'all_items' => __( 'All Zones' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Zone' ), 
    'update_item' => __( 'Update Zone' ),
    'add_new_item' => __( 'Add New Zone' ),
    'new_item_name' => __( 'New Zone Name' ),
    'separate_items_with_commas' => __( 'One zone only' ),
    'add_or_remove_items' => __( 'Add or remove Zones' ),
    'choose_from_most_used' => __( 'Choose from the most used Zones' ),
    'menu_name' => __( 'Zones' ),
  ); 

  $object_type = array( 
    'spet_merchant'
  );
 
  register_taxonomy('zones', $object_type, array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'zone' ),
  ));

  register_taxonomy_for_object_type( 'zones', $object_type );
}
