<?php
/*
Template Name: Video Permalink
*/
?>




<?php include (TEMPLATEPATH . '/header-media-vault.php'); ?>
<?php 
	/*
	if($snoog){
		print_r( $snoog );
		echo "<br/><br/>";
	}
	print_r( $post );
	*/
?>
	

	<div class="content_internal">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
		<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
		
		<div class="entry">
			<?php 
			//the_content('<p class="serif">Read the rest of this page &raquo;</p>'); 
			?>








<!-- COLUMN LEFT -->
	<div class="twocol_equal_left">
	   
	   
	   <!-- get custom fields from page data and display them -->
	  
	   <div>
	   		<!-- standard WP post title display -->
			<h2><?php the_title(); ?></h2>
	   
			<!-- video embed code -->	   

				<?php
				$vid_embed_code = get_post_meta($post->ID, 'vid-embed-code', true);

								
				if ( trim($vid_embed_code) != "hide"){
				 echo '<div class="vid_embed">';
				 echo $vid_embed_code;
				 if( ! $vid_embed_code ){
					echo "NO MEDIA SPECIFIED";
				 }				 
				 echo '<div class="clear"></div>';
				 echo '</div>';
				}
				
				?>
			
			
			

			<!-- vimeo link  -  only displays if vimeo-link custom field is set -->
			<?php 
				$vimeo_link = get_post_meta($post->ID, 'vimeo-link', true);
				if ($vimeo_link){
					echo "<div class='vimeo_link'>";
					echo $vimeo_link;
					echo "</div>";
				}

			?>

			
			
			<!-- video duration  -  only displays if vid-duration custom field is set -->
			<?php 
				$vid_duration = get_post_meta($post->ID, 'vid-duration', true);
				if ($vid_duration){
					echo "<div class='vid_duration'>Duration: ";
					echo $vid_duration;
					echo "</div>";
				}

			?>
			

			<!-- Blue Horizontal Rule -->
<!-- 			<div class="hline_blue"></div> -->
						
						
			<!-- video description -->						
			<div class="vid_description"><?php
				//$vid_description = get_post_meta($post->ID, 'vid-description', true);
				//echo $vid_description; 
				the_content('<p class="serif">Read the rest of this page &raquo;</p>');
			?></div>
			
	   </div>


	</div>
<!-- END COLUMN LEFT -->	











<!-- COLUMN RIGHT -->
	<div class="twocol_equal_right">
	
		<?php get_sidebar('related-media'); ?>		
		
	</div>

<!-- END COLUMN RIGHT -->





	<div class="clear"></div>


	<?php endwhile; endif; ?>

	<!-- display edit link, and post ID -->
	<?php 
		$editstring = '</p><p class="post_id_disp">ID for this post: '.$post->ID.'</p>';
		//echo $editstring;
		edit_post_link('Edit this entry.', '<p>', '</p>'.$editstring.''); 
		
/* 		echo "<h2>TEMPLATE:  video_permalink.php</h2>"; */
	?>




<!-- close bg div -->
</div>


</div></div></div>

<?php get_footer(); ?>