<?php while (have_posts()) : the_post(); ?>

  <?php
    // get_template_part('templates/content', 'page');
  ?>

  <div class="row">
    <div class="col-sm-12">
      <h2 class="centered"><?= __('Trip Reports','eg'); ?></h2>
    </div>
  </div>

  <div class="row">

    <div class="masonrywrapper" >
      <?php
        // $args = array(
        //   "post_type"        =>  array( 'reports',),
        //   "posts_per_page"   => 99,
        //   "order"            => 'desc'
        // );

        // get_template_part("templates/content","masonry-listing");
      ?>

      <?php
$loadmore_shortcode = '[ajax_load_more repeater="template_1" post_type="reports" posts_per_page="6" scroll_distance="200" max_pages="99" button_label="Load More Trip Reports"]';
        echo do_shortcode( $loadmore_shortcode );
      ?>
    </div>
  </div>
<?php endwhile; ?>
