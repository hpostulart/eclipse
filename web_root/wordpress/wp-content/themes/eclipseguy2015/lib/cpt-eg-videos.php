<?php
add_action('init', 'register_videos');
// add_action('init', 'register_video_taxonomies');

// register laywers custom post type
function register_videos() {
  $labels = array(
      'name' => _x('Videos', 'post type general name'),
      'singular_name' => _x('Video', 'post type singular name'),
      'add_new' => _x('Add New', 'Video'),
      'add_new_item' => __('Add New Video'),
      'edit_item' => __('Edit This Video'),
      'new_item' => __('New Video'),
      'view_item' => __('View Video'),
      'menu_name' => __('Videos'),
      'search_items' => __('Search Videos'),
      'not_found' =>  __('Nothing found'),
      'not_found_in_trash' => __('Nothing found in Trash'),
      'parent_item_colon' => ''
    );

  $args = array(
    'labels' => $labels,
    'description' => 'Canopy Planet Videos',
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'page',
    'hierarchical' => true,
    'menu_position' => 10,
    'supports' => array('title','thumbnail'),
    'rewrite' => array(
          'slug' => 'videos',
          'with_front' => false
      ),
      'has_archive' => false,
    'taxonomies' => array('video-categories')
    );
  register_post_type( 'videos' , $args );
}



// register laywers departments taxonomy
function register_video_taxonomies() {
    register_taxonomy(
        'video-categories',
        'videos',
        array(
            'labels' => array(
                'name' => 'Video Categories',
                'add_new_item' => 'Add New Video Category',
                'new_item_name' => "New Video Category"
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => true,

            'rewrite' => array(
                'slug' => 'videos/categories',
                'with_front' => false,
                'hierarchical' => true ,
            ),

        )
    );
}
