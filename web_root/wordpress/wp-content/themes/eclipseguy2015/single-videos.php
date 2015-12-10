<div class="row">
  <div class="single-video-player">
    <div class="embed-container">
      <?php
        the_field('eg_video_url');

          // $iframe = get_field('eg_video_url');
          // // use preg_match to find iframe src
          // preg_match('/src="(.+?)"/', $iframe, $matches);
          // $src = $matches[1];


          // // add extra params to iframe src
          // $params = array(
          //     'controls'    => 0,
          //     'hd'        => 1,
          //     'autohide'    => 1
          // );

          // $new_src = add_query_arg($params, $src);

          // $iframe = str_replace($src, $new_src, $iframe);


          // // add extra attributes to iframe html
          // $attributes = 'frameborder="0"';

          // $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);


          // // echo $iframe
          // echo $iframe;

      ?>


    </div>
  </div>

  <div class="vid-single-description">
    <?php the_field('eg_video_description_long'); ?>
  </div>
</div>

<div class="row">
  <?php get_template_part("templates/sidebar","videos-single"); ?>
</div>