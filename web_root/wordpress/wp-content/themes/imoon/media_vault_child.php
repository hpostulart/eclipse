<?php
/*
Template Name: Media Vault Child
*/
?>

<?php include (TEMPLATEPATH . '/header-media-vault.php'); ?>

	<div id="content" class="narrowcolumn">



		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
		<h2><?php the_title(); ?></h2>
			<div class="entry">
				<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>

				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

			</div>
		</div>
		<?php endwhile; endif; ?>
		
				
		
<!-- build subnav -->		
	<?php
		echo $post;
		//print_r($post);
		echo "<br/";
		if($post->post_parent)
			$children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");
		else
			$children = wp_list_pages("depth=1&title_li=&child_of=".$post->ID."&echo=0");
		if ($children) { ?>
			<ul>

				<?php
				 echo $children; 
				 // print_r($children);
				?>
			</ul>
	<?php } ?>
	
	
	

<!--  CRAZINESS!!!! -->

<div class="vid_content">
<?php
// this is where the Features module begins
/*query_posts('showposts=1&cat=4'); ?> */ 
query_posts('posts_per_page=1&cat=4'); ?> 

<h2>
<?php
// this is where the name of the Features category gets printed
single_cat_title(); ?>
</h2>



<?php while (have_posts()) : the_post(); ?>

<div class="vid_related">

  <div class="vid_related_thumb">
   <a href="<?php the_permalink() ?>">
	<img src="<?php 
					$values = get_post_custom_values("post-thumb");
					echo $values[0];
			   ?>" alt="" />
   </a>
  </div>


  <a href="<?php the_permalink() ?>">
	<?php echo $values[0] ?>
	<?php
	// this is where title of the Feature gets printed
	the_title(); ?>&raquo;
  </a>	

  <?php
	the_excerpt('<p class="serif">Read the rest of this page &raquo;</p>');
  ?>
  

  <div style="clear:both; height:0px"></div>
</div>

<?php endwhile; ?>
		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>
</div>

				  
				  
<!-- END CRAZINESS! -->				  	
	



	<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
