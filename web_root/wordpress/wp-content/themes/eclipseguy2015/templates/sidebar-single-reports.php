<?php $related_media = get_field('eg_media_related');?>
<?php if($related_media): ?>
  <section class="related-listing">
    <div class="col-sm-12">
      <h2>Related Media</h2>
    </div>

      <?php
        $count = 1;
        foreach($related_media as $relitem):
      ?>

      <?php

        global $relitem_obj;
        global $posttype;


        $relitem_obj = get_post($relitem);
        $posttype = get_post_type( $relitem_obj );

        $rel_id = $relitem_obj->ID;
        $thumb_id = get_post_thumbnail_id( $rel_id );
        $thumb_obj = wp_get_attachment_image_src( $thumb_id, 'masonry-item-img');
      ?>

      <div class="related-media-item listing-block">
        <a class="inner" href="<?= get_permalink($relitem_obj->ID); ?>">
          <img src="<?= $thumb_obj[0]; ?>" class="img-responsive-grow" alt="<?= the_title(); ?>">
          <h3><?= $relitem_obj->post_title; ?></h3>

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
      <?php
        if($count % 3 == 0){
           echo '<div class="clearfix visible-md-block visible-lg-block"></div>'; //clear bootstrap column
         }
        $count++;
      ?>

      <?php endforeach; ?>

  </section>
<?php endif; ?>