<?php
/*
Template Name: News Listing Page
*/
?>



<?php include (TEMPLATEPATH . '/header-news.php'); ?>





<!-- Main Content Area -->


<div class="content_news">
	
	<!-- setup custom wp_query -->
	<?php
		$temp = $wp_query;
		$wp_query= null;
		$wp_query = new WP_Query();
		$wp_query->query('cat=1,11'.'&showposts=5'.'&paged='.$paged);
		$wp_query->is_archive = true; 
		$wp_query->is_home = false;		
	?>


	
	
	<?php if (have_posts()) : ?>


		<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>		
		<div class="content_news_box">
		
			<div  id="post-<?php the_ID(); ?>">
			
				
				
<!-- Get Thumbnail -->


			<div class='homepage_list_thumb'>
				<?php 
					$cur_post_data = get_post_custom($i);
					$cur_post_thumb =  $cur_post_data["post-thumb"][0];
					$cur_post_permalink = get_permalink($i);					
					
					if($cur_post_thumb) {

						echo "<a href='".$cur_post_permalink."'>";							
						echo "<img height='105px' width='130px' src='".$cur_post_thumb."'>";
						echo "</a>";							

					}else{
						$thumb_path = get_bloginfo("siteurl");
						$thumb_path .= "/wp-content/uploads/nothumb.jpg";	
						echo "<a href='".$cur_post_permalink."'>";							
						echo "<img height='105px' width='130px' src='".$thumb_path."'>";						
						echo "</a>";							
					}
				
				?>
			</div>
			
			
			
							
				
			<div class='news_list_textinfo'>
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>			

				<div class="details_newspost">Posted by <span class="author_name"><?php the_author(); ?></span>  &#124 <?php the_time('F jS, Y') ?> </div>	
				<div class="news_entry"><?php the_excerpt('Read the rest of this entry &raquo;'); ?></div>
		

				<div class="postmetadata"><?php the_tags('Tags: ', ', ', '<br />'); ?> Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments on this post', '1 Comment on this post', '% Comments on this post'); ?></div>


			</div>						
			
			</div>
			<div class="clear"></div>
		</div>			

		<?php endwhile; ?>



		<div class="content_news_box"><br/>
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
			<div class="clear"></div>
			<br/>
		</div>


		
		<?php $wp_query = null; $wp_query = $temp;?>		


	<?php else : ?>

		<div class="content_news_box">
			<h2 class="center">Whoopsie... there's no content here!</h2>
			<p class="center">Sorry, but you are looking for something that isn't here.  In all likelihood, the content you're looking for is down for maintenance or an upgrade - check back soon</p>
			
			<h3 class="center">In the meantime, why not watch some <a href="<?php get_bloginfo("siteurl") ?>video">videos?</a></h3>
			<?php// include (TEMPLATEPATH . "/searchform.php"); ?>
		</div>

	<?php endif; ?>
	




<!-- 	<div class="clear"></div> -->


	<!-- End Main Content Area -->

</div>




	<!-- Sidebar -->
	<?php get_sidebar('generic'); 	?>
	
	<!-- End Sidebar -->

	
	<div class="clear"></div>
	
	<!-- End Stripey Background -->
</div>

<?php get_footer(); ?>
