<?php
  // global $count;
  $is_mega_feat = get_field('ep_supersize_post_in_listing',$post->ID);
  // $is_home_feat = get_field('ep_supersize_post_on_home',$post->ID);
  if($is_mega_feat == true){
    $featclass = 'feat';
  }else{
    $featclass = null;
  }
?>
<div class="masonryitem listing-block <?php echo $featclass; ?>">
  <a class="inner" href="<?= get_permalink($post->ID); ?>">
    <?php
      $posttype = get_post_type( $post );
      $thumb_id = get_post_thumbnail_id( $post->ID );
      $thumb_obj = wp_get_attachment_image_src( $thumb_id, 'masonry-item-img');

      if( $thumb_obj[1] < 600){
        $sizeAlert = true;
      }else{
        $sizeAlert = false;
      }
    ?>
    <img src="<?= $thumb_obj[0]; ?>" class="img-responsive-grow" alt="<?= the_title(); ?>">
    <h3><?php the_title(); ?></h3>

    <!-- spit out date -->
    <?php if( $posttype == 'post'): ?>
      <span class="datestring"><?= get_the_date( 'l F j, Y  ', $post->ID ); ?></span>
    <?php endif; ?>

    <!-- spit out duration -->
    <?php if( $posttype == 'videos'): ?>
      <span class="datestring duration">Duration: <?= get_field('eg_video_duration'); ?></span>
    <?php endif; ?>

    <div class="listing-item-description">
      <?php
        switch ($posttype) {
            case 'reports':
                the_excerpt();
                break;
            case 'videos':
                echo get_field('eg_video_description_short',$post->ID);
                break;
            case 'post':
                the_excerpt();
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