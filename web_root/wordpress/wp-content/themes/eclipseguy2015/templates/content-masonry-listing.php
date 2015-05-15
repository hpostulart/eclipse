<?php
  global $args; // fetch declared $args from page layout calling this loop
  $frontquery = new WP_Query($args);
  $count = 1;
?>
<?php if ( $frontquery->have_posts() ) : ?>


  <!-- the loop -->
  <!-- <div class="row"> -->
    <?php while ( $frontquery->have_posts() ) : $frontquery->the_post(); ?>
      <?php get_template_part('templates/content-listing-block-masonry'); ?>
      <?php $count ++; ?>
    <?php endwhile; ?>
  <!-- </div> -->
  <!-- end of the loop -->

  <!-- pagination here -->
  <?php wp_reset_postdata(); ?>



<?php else : ?>
  <p><?php _e( 'Sorry... No posts! No posts!' ); ?></p>
<?php endif; ?>