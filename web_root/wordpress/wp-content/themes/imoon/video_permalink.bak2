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
	

	<div id="content" class="narrowcolumn">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
		
		<!-- <h2><?php the_title(); ?></h2> -->	  
  
				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>	     		
			<div class="entry">
				<?php 
				//the_content('<p class="serif">Read the rest of this page &raquo;</p>'); 
				?>




	
			<!-- get custom fields from page data and display them -->
			
			
	   <div class="vid_content">
	   		<!-- standard WP post title display -->
			<h2><?php the_title(); ?></h2>
	   
			<!-- video embed code -->	   
			<div class="vid_embed"><?php
				$vid_embed_code = get_post_meta($post->ID, 'vid-embed-code', true);
				echo $vid_embed_code; 
				
				if( ! $vid_embed_code ){
					echo "NO VIDEO SPECIFIED!!!";
				}
			?></div>
			
			<!-- video duration  -  only displays if vid-duration custom field is set -->
			<?php 
				$vid_duration = get_post_meta($post->ID, 'vid-duration', true);
				if ($vid_duration){
					echo "<div class='vid_duration'>Duration: ";
					echo $vid_duration;
					echo "</div>";
				}

			?>
						
			<!-- video description -->						
			<div class="vid_description"><?php
				//$vid_description = get_post_meta($post->ID, 'vid-description', true);
				//echo $vid_description; 
				the_content('<p class="serif">Read the rest of this page &raquo;</p>');
			?></div>
			



			
		<br/><br/>


			<!-- get custom field info for all vid-related keys -->
			<h2>Related Media:</h2>			
			
			<?php 

				//-- grab array data and establish size --
				$vid_related = get_post_meta($post->ID, 'vid-related', false); 

			?>
				
			<?php
	 		if($vid_related){
				
				$rel_count = sizeof($vid_related);
				$rel_count_adjusted = $rel_count - 1;
				// echo "<br/>size of array = ".$rel_count."<br>";

				//-- set up loop to fetch and write related media from custom fields
				$counter = 0;
								
				while ($counter <= $rel_count_adjusted) {
				
					// echo $counter." w00t <br/>";
					

					echo "<div class='vid_related'>";
					echo "<ul>";
					
						
						//-- grab post permalink --//
						$cur_post_id = $vid_related[$counter];
						$cur_post_permalink = get_permalink($cur_post_id);
					
						//-- grab post thumb url from post-thumb custom field --//

						$cur_post_id = $vid_related[$counter];
						$cur_post_data = get_post_custom($cur_post_id);
						$cur_post_thumb =  $cur_post_data["post-thumb"][0];
						
						//-- check if the above failed, and display thumb or placeholder accordingly --//
						if($cur_post_thumb){

							echo "<div class='vid_related_thumb'>";
							echo "<a href='".$cur_post_permalink."'>";							
							echo "<img height='120px' width='120px' src='".$cur_post_thumb."'>";
							echo "</a>";							
							echo "</div>";

						}else{
							echo "<div class='vid_related_thumb'>";
							echo "<img height='120px' width='120px' src='http://test.rubbersuit.com/eclipseguy/wp-content/uploads/nothumb.jpg'>";
							echo "</div>";						
						}
						
					
					
						//-- grab video post title by ID --
						$rel_title = wp_list_pages("include=".$vid_related[$counter]."&title_li=&echo=0");
						echo $rel_title;
						
					/*-- alternate method for grabbing post title
					
						$cur_post_id = $vid_related[$counter];
						$cur_post_data = get_post($cur_post_id);
						$cur_post_title = $cur_post_data->post_content;
						echo $cur_post_title." fuck yeah!";
						
					--*/
						
						
						
					echo "</ul>";
					
						/*-- grab video post description from custom field by ID (as an alternative to the below method)--
						$vid_related_description = get_post_meta($vid_related[$counter], "vid-description", true);
						echo $vid_related_description;
						*/
						
						
						//-- grab video post description from post content (as an alternative to the above method)--
						$cur_post_id = $vid_related[$counter];
						$cur_post_data = get_post($cur_post_id);
						$cur_post_content = $cur_post_data->post_content;
						echo $cur_post_content."<br/>";						

					echo "<div style='clear:both;height:0'></div>";
																	
					echo "</div>";

								

					
					$counter ++;					
				}
			?>
				
			<?php }else{ 
	
					echo "<div class='vid_related'>";		
					$failstring = "<ul><li style='font-size:1.3em;margin-top:20px'>There is no related media. <a href='../video'>Click here for more videos</a>.</li></ul>";
					echo $failstring;
					echo "</div>";
					
				  } ?>

		</div>		
				

			</div>
		</div>
		
		<?php endwhile; endif; ?>
		

	<!-- display edit link, and post ID -->
	<?php 
		$editstring = '</p><p class="post_id_disp">ID for this post: '.$post->ID.'</p>';
		//echo $editstring;
		edit_post_link('Edit this entry.', '<p>', '</p>'.$editstring.''); 
	?>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>