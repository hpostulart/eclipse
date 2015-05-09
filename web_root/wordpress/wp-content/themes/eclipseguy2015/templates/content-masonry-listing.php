      <?php
        global $args; // fetch declared $args from page layout calling this loop
        $frontquery = new WP_Query($args);
        $count = 1;
      ?>
      <?php if ( $frontquery->have_posts() ) : ?>


        <!-- the loop -->
        <?php while ( $frontquery->have_posts() ) : $frontquery->the_post(); ?>
          <div class="masonryitem listing-block <?php if($count==3) echo 'feat'; ?>">
            <a class="inner" href="<?= get_permalink($post->ID); ?>">
              <?php
                $posttype = get_post_type( $post );
                $attr = array(
                  // // 'src' => $src,
                  // 'class' => "img-responsive-grow",
                  // 'alt' => trim( strip_tags( $attachment->post_excerpt ) ),
                  // 'title' => trim( strip_tags( $attachment->post_title ) ),
                );
                $thumb_id = get_post_thumbnail_id( $post->ID );
                $thumb_obj = wp_get_attachment_image_src( $thumb_id, 'masonry-item-img');

                if( $thumb_obj[1] < 600){
                  $sizeAlert = true;
                }else{
                  $sizeAlert = false;
                }

                // var_dump($thumb_obj);
              ?>
              <img src="<?= $thumb_obj[0]; ?>" class="img-responsive-grow" alt="<?= the_title(); ?>">
              <h3><?php the_title(); ?></h3>
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
          <?php $count ++; ?>
        <?php endwhile; ?>
        <!-- end of the loop -->

        <!-- pagination here -->
        <?php wp_reset_postdata(); ?>

      <?php else : ?>
        <p><?php _e( 'Sorry... No posts! No posts!' ); ?></p>
      <?php endif; ?>