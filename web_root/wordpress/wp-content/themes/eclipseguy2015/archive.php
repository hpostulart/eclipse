<?php while (have_posts()) : the_post(); ?>

  <?php
    // get_template_part('templates/content', 'page');
  ?>

  <div class="page-header">
    <div class="row">
      <div class="col-sm-12">
        <h2 class=""><?= single_cat_title( '', false ); ?></h2>
      </div>
    </div>
  </div>

  <!-- <div class="row"> -->
    <div class="linearwrapper" >
      <?php
        $args = array(
          // "post_type"        => 'post',
          // "posts_per_page"   => 12,
          // "order"            => 'desc'
        );

        // get_template_part("templates/content","linear-listing");
      ?>

      <?php
        if (is_category( )) {
          $cat = get_query_var('cat');
          $cat_obj = get_category($cat);
          $cat_slug = $cat_obj->slug;
          // var_dump($cat_slug);
        }

        $loadmore_shortcode = '[ajax_load_more repeater="template_2" post_type="post" category="'.$cat_slug.'" posts_per_page="5" scroll_distance="200" max_pages="99" button_label="Load More Posts"]';
        echo do_shortcode( $loadmore_shortcode );
      ?>
    </div>
  <!-- </div> -->
<?php endwhile; ?>
