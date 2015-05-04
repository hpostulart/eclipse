<?php
/*
Template Name: Trip Report Listing
*/
?>

<?php include (TEMPLATEPATH . '/header-trip-reports.php'); ?>





	<div id="content_internal">
	<div id="media_list_2col_black">

	<?php if (have_posts()) : ?>

		<?php $posts = get_posts('cat=6&numberposts=200');
			foreach($posts as $post ):
			setup_postdata($post);?>


			<div class="media_list_box_2col">

			<!-- Get Thumbnail -->
			<?php $cur_post_thumb = get_post_meta($post->ID,'post-thumb',true);
			
			if($cur_post_thumb){?>
			
			
				<div class="media_list_thumb">
					<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
						<img src="<?=$cur_post_thumb?>" title="<?php the_title_attribute(); ?>" alt="<?php the_title_attribute(); ?> Thumbnail" /></a>
				</div>
				
			<?}else{?>
			
				<div class="media_list_thumb">
					<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
						<img height="105" width="130" src="<?php bloginfo('siteurl')?>/wp-content/uploads/no_thumb.gif" title="<?php the_title_attribute(); ?>" alt="No Thumbnail"/></a>
				</div>
			<?}?>




<!-- Get Title -->
			<div class="media_list_textinfo">
				
				<div class="media_list_title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></div>				

				<small><?php the_time('F jS, Y') ?> <!-- by <?php the_author() ?> --></small>

				<div class="media_list_description">
					<?php the_excerpt(); ?>
				</div>
				
				<!-- Get Permalink for CTA Button --> 		
<!-- 					<div class="repplay" ><a href="<?php the_permalink()?>" title="Read Trip Report"></a></div>				 -->
				
			</div>				
				<div class="clear"?></div>
		

			</div>

		<?php endforeach; ?>


	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>

	<?php endif; ?>


	<div class="clear"></div>
	</div>
	</div>




<!-- End Stripey Background -->
</div>

<?php get_footer(); ?>