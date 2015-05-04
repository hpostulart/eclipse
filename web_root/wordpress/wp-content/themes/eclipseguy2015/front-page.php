<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php
  	// get_template_part('templates/content', 'page');
  ?>

	<div class="masonrycontainer" style="background:pink;">
		<div class="masonryitem testmasonryitem">
			hello friend
		</div>
yo
	</div>

<?php endwhile; ?>
