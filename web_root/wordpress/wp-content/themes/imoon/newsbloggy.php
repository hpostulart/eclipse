<?php
/*
Template Name: Newsbloggy
*/
?>




	<?php 
	  $post = $wp_query->post;
	?>

    <?php

      if ( in_category('11') ) {
		include (TEMPLATEPATH . '/header-news.php');
	    
      }else if ( in_category('15') ) {
		include (TEMPLATEPATH . '/header-opinions.php');
		
      }else if ( in_category('13') ) {
		include (TEMPLATEPATH . '/header-featured.php');		

      }else{
		include (TEMPLATEPATH . '/header-generic.php');      
      }
      

    ?>







	<!-- Begin Main Content -->
	<div class="content_news" >








	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

		<div class="content_news_box">
<div class="post" id="post-<?php the_ID(); ?>">
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

				<div class="details_newspost">Posted by <span class="author_name"><?php the_author(); ?></span>  &#124 <?php the_time('F jS, Y') ?> </div>	
				
								
				<div class="hline_yellow"></div>
				


				<div class="news_entry">
					<?php the_content('Read the rest of this entry &raquo;'); ?>
				</div>

				
					
				<!-- pagination -->
				<h3 class="alignleft">Page <?=$page?> of <?=count($pages)?></h3>

				<div id="trip_report_pagelinks">
				
					<?php 
	 					$arsrc = get_bloginfo('template_directory'); 
						$arsrc .= "/images/triangle_yellow.gif";
	/* 					echo $arsrc; */
	
					?>
					<?php wp_link_pages('before=<ul>&after=</ul>&next_or_number=next&nextpagelink=<div class="pglink_next">Next</div>&previouspagelink=<div class="pglink_prev">Previous</div>&link_before=<li><h3>&link_after=</h3></li>');?>
				
			
				
				</div>
			
				<div class="clear"></div>

				<!-- end pagination -->				
				
				
				
		</div>



	</div>
	
<!-- 	<div class="clear"></div> -->
	<!-- End Main Content -->



	<!-- Begin Comments -->
	

		<?php comments_template(); ?>

		<?php endwhile; ?>


	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>

	<?php endif; ?>				
			
		

	
	<!-- End Comments -->






	</div>




	<!-- Sidebar -->
	<?php get_sidebar('generic'); 	?>
	
	<!-- End Sidebar -->

	
	<div class="clear"></div>
	
	<!-- End Stripey Background -->
</div>

<?php get_footer(); ?>

