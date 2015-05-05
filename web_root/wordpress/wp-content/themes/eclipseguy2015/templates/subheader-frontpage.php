<?php
  // $post_object = get_post( $post->ID );
  // var_dump($post);
?>
<div class="subheader frontpage">
  <div class="container">
    <div class="row">

      <div class="col-sm-8">
        <?= $post->post_content; ?>
      </div>

      <div class="col-sm-4">
        <div class="intro-headshot">
           <?php the_post_thumbnail( 'full' ); ?>
        </div>
      </div>

    </div>
  </div>
</div>