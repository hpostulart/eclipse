<?php
/*
Template Name: Media Vault
*/
?>


<?php include (TEMPLATEPATH . '/header-media-vault.php'); ?>


	<div id="content" class="narrowcolumn">


		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
		<h2><?php the_title(); ?></h2>
		
		
		
	

		
		
		
	<?php
		if($post->post_parent)
			$children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");
		else
			$children = wp_list_pages("depth=1&title_li=&child_of=".$post->ID."&echo=0");
		if ($children) { ?>
			<ul>
				<?php echo $children; ?>
			</ul>
	<?php } ?>
  
  
  
  		
			<div class="entry">
				<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>

				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

			</div>
		</div>
		<?php endwhile; endif; ?>
	<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>