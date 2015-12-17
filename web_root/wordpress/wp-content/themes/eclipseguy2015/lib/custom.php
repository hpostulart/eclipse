<?php
// ---------------------- eclipseguy custom functions --------------------------

// Add EG img autoresize sizes
// add_image_size( 'thumb-120', 120, 120, true ); // (cropped)
// add_image_size( 'thumb-150', 150, 150, true ); // (cropped)
add_image_size( 'masonry-item-img', 750, 9999, false ); // (cropped)


if( function_exists('acf_add_options_page') ) {

  acf_add_options_page(array(
    'page_title'  => 'Eclipseguy General Settings',
    'menu_title'  => 'Eclipseguy Settings',
    'menu_slug'   => 'eg-general-settings',
    'capability'  => 'edit_posts',
    'redirect'    => false
  ));

  acf_add_options_sub_page('Eclipseguy General Site Options');
  // acf_add_options_sub_page('Header');
  // acf_add_options_sub_page('Footer');

}



add_filter( 'body_class', 'my_class_names' );
function my_class_names( $classes ) {
  // add 'class-name' to the $classes array

  if(is_singular('reports')){
    $wide = get_field('eg_trip_wide_format');
    var_dump($wide);
    if($wide == true){
      $classes[] = 'trip-wide';
    }else{
      $classes[] = 'trip-narrow';
    }
  }
  // return the $classes array
  return $classes;
}

//disable WP post formats
add_action( 'after_setup_theme', 'remove_post_formats', 11 );
function remove_post_formats() {
   remove_theme_support( 'post-formats' );
    // add_theme_support( 'post-formats', array( 'link', 'gallery' ) );
}







//custom excerpt by id function
/**
 * Get the excerpt of a specific post ID or object
 *
 * @author Pippin Williamson
 * @link http://goo.gl/lhtZD
 * @param object/int $post The ID or object of the post to get the excerpt of
 * @param int $length The length of the excerpt in words
 * @param string $tags The allowed HTML tags. These will not be stripped out
 * @param string $extra Text to append to the end of the excerpt
 */
function eg_get_excerpt_by_id( $post, $length = 10, $tags = '<a><em><strong>', $extra = '&hellip;' ) {

  if ( is_numeric( $post ) ) {
    $post = get_post( $post );
  } elseif( ! is_object( $post ) ) {
    return false;
  }

  if ( has_excerpt( $post->ID ) ) {
    $the_excerpt = $post->post_excerpt;
    return apply_filters( 'the_content', $the_excerpt );
  } else {
    $the_excerpt = $post->post_content;
  }

  $the_excerpt = strip_shortcodes( strip_tags( $the_excerpt, $tags ) );
  $the_excerpt = preg_split( '/\b/', $the_excerpt, $length * 2 + 1 );
  $excerpt_waste = array_pop( $the_excerpt );
  $the_excerpt = implode( $the_excerpt );
  $the_excerpt .= $extra;

  // return apply_filters( 'the_content', $the_excerpt );
  return $the_excerpt;
}