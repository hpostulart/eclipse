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