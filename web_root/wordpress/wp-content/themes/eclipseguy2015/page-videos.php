<?php while (have_posts()) : the_post(); ?>

  <?php
    // get_template_part('templates/content', 'page');
  ?>

  <div class="row">
    <div class="col-sm-12">
      <h2 class="centered"><?= __('Videos','eg'); ?></h2>
    </div>
  </div>

  <div class="row">

    <div class="masonrywrapper" >
      <?php
        $args = array(
          "post_type"        =>  array( 'videos',),
          "posts_per_page"   => 99,
          "order"            => 'desc'
        );
      ?>
      <?php get_template_part("templates/content","masonry-listing"); ?>
    </div>
  </div>
<?php endwhile; ?>
