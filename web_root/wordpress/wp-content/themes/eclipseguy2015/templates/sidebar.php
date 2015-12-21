<section class="related-listing row">

  <div class="col-sm-12">
    <h2>Related Media</h2>
  </div>

  <?php
    $related_media = get_field('eg_sidebar_featured_media_items','options');
    foreach($related_media as $relitem):
  ?>

  <?php

    // $relitem_obj = get_post($relitem);
    $rel_id = $relitem->ID;


    global $relitem_obj;
    global $posttype;


    // $relitem_obj = get_post($relitem);
    $posttype = get_post_type( $relitem );

    $thumb_id = get_post_thumbnail_id( $rel_id );
    $thumb_obj = wp_get_attachment_image_src( $thumb_id, 'masonry-item-img');
  ?>

  <div class="related-media-item listing-block">
    <a class="inner" href="<?= get_permalink($rel_id); ?>">
      <img src="<?= $thumb_obj[0]; ?>" class="img-responsive-grow" alt="<?= the_title(); ?>">
      <h3><?= $relitem->post_title; ?></h3>
      <?php get_template_part("templates/listing-item-blurbo"); ?>

      <?php
        switch ($posttype) {
          case 'reports':
              $labeltext = __('Trip Report','eg');
              break;
          case 'videos':
              $labeltext = __('Video','eg');
              break;
          case 'post':
              $labeltext = __('Blog Post','eg');
              break;
        }
      ?>
      <div class="type-label"><?= $labeltext; ?></div>
    </a>
  </div>

   <?php endforeach; ?>


</section>

<section class="eclipse-countdown-sidebar">
  <div class="countdown-item">
    <div class="inner">
      <div class="preamble">The next eclipse is in</div>
      <?= do_shortcode('[fergcorp_cdt]'); ?>
    </div>
  </div>
</section>