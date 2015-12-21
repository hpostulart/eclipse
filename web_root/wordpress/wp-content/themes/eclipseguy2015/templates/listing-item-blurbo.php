<?php
    // echo 'gagagaaa';
    global $feat_item;
    global $posttype;
?>

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