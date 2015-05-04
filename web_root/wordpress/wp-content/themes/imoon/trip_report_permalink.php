<?php
/*
Template Name: Trip Report Single
*/
?>
<?php include (TEMPLATEPATH . '/header-trip-reports.php'); ?>



	<div class="content_wide" >			

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
			
			<div class="trip_report_display">

				<h2><?php the_title(); ?></h2>


				<div class="trip_report_content">
					<?php the_content('Read the rest of this entry &raquo;'); ?>
				</div>
	
				<h3>Page <?=$page?> of <?=count($pages)?></h3>

				<div id="trip_report_pagelinks">
				
				<?php 
					

					
 					$arsrc = get_bloginfo('template_directory'); 
					$arsrc .= "/images/triangle_yellow.gif";
/* 					echo $arsrc; */

				?>
				<?php wp_link_pages('before=<ul>&after=</ul>&next_or_number=next&nextpagelink=<div class="pglink_next">Next</div>&previouspagelink=<div class="pglink_prev">Previous</div>&link_before=<li><h3>&link_after=</h3></li>');?>
				
				<br/>
				




				
				</div>

<!-- <?php bloginfo('siteurl')?> -->
			<div class="clear"></div>
			</div>
		<?php endwhile; ?>


	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>

	<?php endif; ?>





	<!-- display edit link, and post ID -->
	<?php 
		$editstring = '</p><p class="post_id_disp">ID for this post: '.$post->ID.'</p>';
		//echo $editstring;
		edit_post_link('Edit this entry.', '<p>', '</p>'.$editstring.''); 
		

	?>




	<!-- End Main Content Area -->
	</div>



	<!-- Sidebar -->
	
	<?php get_sidebar('trip-report'); ?>
	
	<!-- End Sidebar -->

	
	<div class="clear"></div>
	
	<!-- End Stripey Background -->
	</div>
	
<?php get_footer(); ?>
