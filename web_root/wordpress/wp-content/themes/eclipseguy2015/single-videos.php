<div class="row">
  <div class="single-video-player">
    <div class="embed-container">
      <?php the_field('eg_video_url'); ?>
    </div>
  </div>

  <div class="vid-single-description">
    <?php the_field('eg_video_description_long'); ?>
  </div>
</div>

<div class="row">
  <?php get_template_part("templates/sidebar","videos-single"); ?>
</div>