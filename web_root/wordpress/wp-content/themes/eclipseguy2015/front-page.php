<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php
    // get_template_part('templates/content', 'page');
  ?>

  <div class="row">
    <div class="col-sm-12">
      <h2><?= __('Selected Eclipse Media','eg'); ?></h2>
    </div>
  </div>

  <div class="row">

    <div class="masonrywrapper" >
      <?php
        $args = array(
          "post_type"        =>  array( 'post', 'videos', 'reports' ),
          "posts_per_page"   => 24,
          "order"            => 'desc'
        );

        $frontquery = new WP_Query($args);
      ?>

      <?php if ( $frontquery->have_posts() ) : ?>


        <!-- the loop -->
        <?php while ( $frontquery->have_posts() ) : $frontquery->the_post(); ?>
          <div class="masonryitem listing-block">
            <a class="inner" href="<?= get_permalink($post->ID); ?>">
              <?php
                $attr = array(
                  // 'src' => $src,
                  'class' => "img-responsive-grow",
                  'alt' => trim( strip_tags( $attachment->post_excerpt ) ),
                  'title' => trim( strip_tags( $attachment->post_title ) ),
                );
                echo get_the_post_thumbnail( $post->ID, 'full', $attr );
              ?>
              <h3><?php the_title(); ?></h3>
              <div class="listing-item-description">
                <?php
                  $posttype = get_post_type( $post );

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
            </a>
          </div>
        <?php endwhile; ?>
        <!-- end of the loop -->

        <!-- pagination here -->
        <?php wp_reset_postdata(); ?>

      <?php else : ?>
        <p><?php _e( 'Sorry... No posts! No posts!' ); ?></p>
      <?php endif; ?>


    </div>
  </div>
<?php endwhile; ?>
