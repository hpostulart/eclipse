<?php while (have_posts()) : the_post(); ?>

  <?php
    // get_template_part('templates/content', 'page');
  ?>

  <div class="row">
    <div class="col-sm-12">
      <h2 class="centered"><?= __('News & Musings','eg'); ?></h2>
    </div>
  </div>

  <div class="row">

    <div class="masonrywrapper" >
      <?php
        $args = array(
          "post_type"        => 'post',
          "posts_per_page"   => 12,
          "order"            => 'desc'
        );
      ?>
      <?php get_template_part("templates/content","masonry-listing"); ?>
    </div>
  </div>
<?php endwhile; ?>
