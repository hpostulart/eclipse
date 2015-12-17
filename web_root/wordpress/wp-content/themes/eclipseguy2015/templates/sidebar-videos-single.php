<aside class="sidebar-video">

<div class="row">
  <h2><?= __("Related Media","cp"); ?></h2>
  <div class="masonrywrapper" >
    <?php
      $relmedia_all = get_field("eg_media_related");
      foreach($relmedia_all as $relitem):
    ?>

    <?php $feat_item = get_post($relitem); ?>

    <div class="masonryitem listing-block <?php if($count==3) echo 'feat'; ?>">
      <a class="inner" href="<?= get_permalink($feat_item->ID); ?>">
        <?php
          $posttype = get_post_type( $feat_item );

          $thumb_id = get_post_thumbnail_id( $feat_item->ID );
          $thumb_obj = wp_get_attachment_image_src( $thumb_id, 'masonry-item-img');

          if( $thumb_obj[1] < 600){
            $sizeAlert = true;
          }else{
            $sizeAlert = false;
          }
        ?>
        <img src="<?= $thumb_obj[0]; ?>" class="img-responsive-grow" alt="<?= $feat_item->post_title; ?>">
        <h3><?= $feat_item->post_title; ?></h3>
        <div class="listing-item-description">
          <?php
            switch ($posttype) {
                case 'reports':
                    // the_excerpt();
                    echo eg_get_excerpt_by_id( $feat_item->ID , 99 );
                    break;
                case 'videos':
                    echo get_field('eg_video_description_short',$feat_item->ID);
                    break;
                case 'post':
                    // the_excerpt();
                    echo eg_get_excerpt_by_id( $feat_item->ID , 99 );
                    break;
            }
          ?>
        </div>
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
        <?php if( $sizeAlert == true and current_user_can("publish_posts") ): ?>
          <div class="alert-label">WARNING: The supplied featured image is only <?= $thumb_obj[1] ?>px wide &mdash; please add or select a thumbnail at least 750px wide in order to ensure visual quality across viewports.</div>
        <?php endif; ?>
      </a>
    </div>

    <?php endforeach; ?>
  </div>
  </div>
</aside>