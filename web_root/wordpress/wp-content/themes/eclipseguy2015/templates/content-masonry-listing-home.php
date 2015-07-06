<?php
  // global $args; // fetch declared $args from page layout calling this loop
  // $frontquery = new WP_Query($args);
  // global $count;
  // $count = 1;
?>

<?php $front_featured_posts = get_field('ep_selected_media'); ?>

<?php if ( $front_featured_posts ) : ?>


  <!-- iterate -->

    <?php foreach($front_featured_posts as $post): ?>
      <?php get_template_part('templates/content-listing-block-masonry'); ?>
      <?php //$count ++; ?>
    <?php endforeach; ?>

  <!-- end of the loop -->
  <?php wp_reset_postdata(); ?>


<?php else : ?>
  <p><?php _e( 'Sorry... No posts! No posts!' ); ?></p>
<?php endif; ?>