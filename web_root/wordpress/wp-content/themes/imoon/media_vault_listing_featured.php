<?php
/*
Template Name: Media Vault Listings - Featured 
*/
?>

<?php include (TEMPLATEPATH . '/header-media-vault.php'); ?>





<!-- Get Media Nav -->
<div id="subnav_featured">
<?php include (TEMPLATEPATH . '/nav_media.php'); ?>
</div>


<!-- Begin Main Container -->

<div id="media_list_2col">



		<?php if (have_posts()):
		$posts = get_posts('cat=12&numberposts=40');
		foreach($posts as $post ):
			setup_postdata($post);?>
		
		
		

		
	

<!-- Single Listing -->
		<div class="media_list_box_2col">
		
			<!-- Get Thumbnail -->


			<?php 
			$cur_post_thumb = get_post_meta($post->ID,'post-thumb',true);
			if($cur_post_thumb){?>
				<div class="media_list_thumb">
					<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
						<img src="<?=$cur_post_thumb?>" title="<?php the_title_attribute(); ?>" alt="<?php the_title_attribute(); ?> Thumbnail" /></a>
				</div>


			<? }elseif( in_category('10') ) { ?>
				<div class="media_list_thumb">
					<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
						<img src="<?php bloginfo('siteurl')?>/wp-content/uploads/aud_thumb.gif" title="<?php the_title_attribute(); ?>" alt="No Thumbnail" />
					</a>
				</div>



			<? }else{ ?>
				<div class="media_list_thumb">
					<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
						<img src="<?php bloginfo('siteurl')?>/wp-content/uploads/no_thumb.gif" title="<?php the_title_attribute(); ?>" alt="No Thumbnail" />
					</a>
				</div>
			<?}?>			




			<!-- Begin Textinfo -->
			<div class="media_list_textinfo">			


 				<!-- Get Title -->
 					<div class="media_list_title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></div>

				
				<!-- Detect Duration Or Photo Count and display accordingly -->
				
					<?php
						$photo_count = get_post_meta($post->ID, 'num-photos', true);
						$vid_duration = get_post_meta($post->ID, 'vid-duration', true);
					?>

					<?php
						if ( $photo_count ){ ?>

							<div class="vid_duration">
								<?=get_post_meta($post->ID, 'num-photos', true);?> Photographs
							</div>
						
						
						
						<? } else if ( $vid_duration ){ ?>


							<div class="vid_duration">
								Duration: <?=get_post_meta($post->ID, 'vid-duration', true);?>
							</div>
							
					<? } ?>						
						


					
			
			
				<!-- Get Excerpt -->	
					<div class="media_list_description">
						<?php the_excerpt() ?>
					</div>
				





				<!-- Get Permalink, and select appropriate CTA Button based on category --> 
					<?php if ( in_category('4') ):?>
						<div class="vidplay" >
					<?php elseif ( in_category('9')):?>
						<div class="galplay" >
					<?php elseif ( in_category('10')):?>											
						<div class="audplay" >
					<?php endif;?>						
					
					
					<a href="<?php the_permalink()?>" title="Play Media"></a></div>
			
				<div class="clear"></div>
			
			<!-- End Textinfo -->
			</div>

			





			<div class="clear"></div>			
		</div>
		<!-- End Single Listing -->	
	
		
		
		
		
		
		

		<?php endforeach; //endwhile; ?>
		
		
		
	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>

	<div class="clear"></div>
	
	
<!-- EndMain Container -->
</div>




<!-- End BG Main (defined in header) -->
</div>



<?php get_footer(); ?>
