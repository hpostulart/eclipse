<?php
add_action('init', 'register_galleries');
// add_action('init', 'register_gallery_taxonomies');

// register laywers custom post type
function register_galleries() {
  $labels = array(
      'name' => _x('Galleries', 'post type general name'),
      'singular_name' => _x('Gallery', 'post type singular name'),
      'add_new' => _x('Add New', 'Gallery'),
      'add_new_item' => __('Add New Gallery'),
      'edit_item' => __('Edit This Gallery'),
      'new_item' => __('New Gallery'),
      'view_item' => __('View Gallery'),
      'menu_name' => __('Galleries'),
      'search_items' => __('Search Galleries'),
      'not_found' =>  __('Nothing found'),
      'not_found_in_trash' => __('Nothing found in Trash'),
      'parent_item_colon' => ''
    );

  $args = array(
    'labels' => $labels,
    'description' => 'EG Galleries',
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'page',
    'hierarchical' => true,
    'menu_position' => 10,
    'supports' => array('title','editor','thumbnail','custom-fields','page-attributes','excerpt'),
    'rewrite' => array(
          'slug' => 'galleries',
          'with_front' => false
      ),
      'has_archive' => false,
    'taxonomies' => array('gallery-categories')
    );
  register_post_type( 'galleries' , $args );
}



// register laywers departments taxonomy
// function register_gallery_taxonomies() {
//     register_taxonomy(
//         'gallery-categories',
//         'galleries',
//         array(
//             'labels' => array(
//                 'name' => 'Gallery Categories',
//                 'add_new_item' => 'Add New Gallery Category',
//                 'new_item_name' => "New Gallery Category"
//             ),
//             'show_ui' => true,
//             'show_tagcloud' => false,
//             'hierarchical' => true,

//             'rewrite' => array(
//                 'slug' => 'galleries/categories',
//                 'with_front' => false,
//                 'hierarchical' => true ,
//             ),

//         )
//     );
// }
