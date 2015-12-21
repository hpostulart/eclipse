<?php
    global $posttype;
    // var_dump($posttype);

    if (is_singular('videos')):
        global $feat_item;
    elseif( is_singular('reports' )):
        global $relitem_obj;
        $feat_item = $relitem_obj;
    elseif( is_singular('post' )):
        global $relitem;
        $feat_item = $relitem;
    endif;

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