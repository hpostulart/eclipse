<?php while (have_posts()) : the_post(); ?>

  <?php
    $selected_media_header = get_field('ep_selected_media_header');
  ?>


  <div class="row">
    <div class="col-sm-12">
      <div class="embed-container">
        <?= get_field('eg_frontpage_video',$post->ID); ?>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-12">

      <h2 class="centered"><?= __( $selected_media_header,'eg'); ?></h2>
    </div>
  </div>

  <div class="row">

    <div class="masonrywrapper" >
      <?php
        // $args = array(
        //   "post_type"        =>  array( 'post', 'videos', 'reports' ),
        //   "posts_per_page"   => 24,
        //   "order"            => 'desc'
        // );
      ?>

      <?php get_template_part("templates/content","masonry-listing-home"); ?>
    </div>
  </div>
<?php endwhile; ?>
