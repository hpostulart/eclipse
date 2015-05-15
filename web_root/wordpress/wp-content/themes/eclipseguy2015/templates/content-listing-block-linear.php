          <div class="listing-block-linear">

            <div class="wrap-inner">
              <!-- LEFT -->
              <a class="inner left" href="<?= get_permalink($post->ID); ?>">
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

                <?php if( $sizeAlert == true and current_user_can("publish_posts") ): ?>
                  <div class="alert-label">WARNING: The supplied featured image is only <?= $thumb_obj[1] ?>px wide &mdash; please add or select a thumbnail at least 750px wide in order to ensure visual quality across viewports.</div>
                <?php endif; ?>
              </a>

              <!-- RIGHT -->
              <div class="inner right">
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <div class="datestring"><?php the_date(); ?></div>
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
              </div> <!-- end inner-right -->


            </div>
          </div>