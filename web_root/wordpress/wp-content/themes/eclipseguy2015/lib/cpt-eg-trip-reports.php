<?php
add_action('init', 'register_reports');
// add_action('init', 'register_report_taxonomies');

// register laywers custom post type
function register_reports() {
  $labels = array(
      'name' => _x('Trip Reports', 'post type general name'),
      'singular_name' => _x('Trip Report', 'post type singular name'),
      'add_new' => _x('Add New', 'Trip Report'),
      'add_new_item' => __('Add New Trip Report'),
      'edit_item' => __('Edit This Trip Report'),
      'new_item' => __('New Trip Report'),
      'view_item' => __('View Trip Report'),
      'menu_name' => __('Trip Reports'),
      'search_items' => __('Search Trip Reports'),
      'not_found' =>  __('Nothing found'),
      'not_found_in_trash' => __('Nothing found in Trash'),
      'parent_item_colon' => ''
    );

  $args = array(
    'labels' => $labels,
    'description' => 'EG Trip Reports',
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'page',
    'hierarchical' => true,
    'menu_position' => 10,
    'supports' => array('title','editor','thumbnail','custom-fields','page-attributes','excerpt','comments'),
    'rewrite' => array(
          'slug' => 'reports',
          'with_front' => false
      ),
      'has_archive' => false,
    'taxonomies' => array('report-categories')
    );
  register_post_type( 'reports' , $args );
}



// register  taxonomy

// function register_report_taxonomies() {
//     register_taxonomy(
//         'report-categories',
//         'reports',
//         array(
//             'labels' => array(
//                 'name' => 'Trip Report Categories',
//                 'add_new_item' => 'Add New Trip Report Category',
//                 'new_item_name' => "New Trip Report Category"
//             ),
//             'show_ui' => true,
//             'show_tagcloud' => false,
//             'hierarchical' => true,

//             'rewrite' => array(
//                 'slug' => 'reports/categories',
//                 'with_front' => false,
//                 'hierarchical' => true ,
//             ),

//         )
//     );
// }
