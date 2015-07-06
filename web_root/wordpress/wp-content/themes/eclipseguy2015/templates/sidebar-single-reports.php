<?php $related_media = get_field('eg_media_related');?>
<?php if($related_media): ?>
  <section class="related-listing">
    <div class="col-sm-12">
      <h2>Related Media</h2>
    </div>

      <?php foreach($related_media as $relitem): ?>

      <?php
        $relitem_obj = get_post($relitem);
        $rel_id = $relitem_obj->ID;
        $thumb_id = get_post_thumbnail_id( $rel_id );
        $thumb_obj = wp_get_attachment_image_src( $thumb_id, 'masonry-item-img');
      ?>

      <div class="related-media-item listing-block">
        <a class="inner" href="<?= get_permalink($relitem_obj->ID); ?>">
          <img src="<?= $thumb_obj[0]; ?>" class="img-responsive-grow" alt="<?= the_title(); ?>">
          <h3><?= $relitem_obj->post_title; ?></h3>
        </a>
      </div>

      <?php endforeach; ?>
  </section>
<?php endif; ?>