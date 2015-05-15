<ul class="lawyer-single-publications-listing">
<li class="lawyer-single-media-listing-item">
  <h4><a href="<?php the_permalink(); ?>"><?php echo the_title();?></a></h4>

    <?php
      $list_title = __('Related Resource Categories','tr');
      tr_list_contextual_terms('resource-categories','resources', get_the_ID(),false,$list_title);

      $list_title = __('Related Practice Areas','tr');
      tr_list_contextual_terms('practice-areas','lawyers',get_the_ID(),false,$list_title);
   ?>

   <div class="lawyer-postlist-excerpt"><?php the_excerpt(); ?></div>
</li>
</ul>