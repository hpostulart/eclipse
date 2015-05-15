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