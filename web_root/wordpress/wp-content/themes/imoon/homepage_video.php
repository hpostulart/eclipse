   <div>

	   
			<!-- video embed code -->	   
			<div class="vid_embed">
				<?php
				$vid_embed_code = get_post_meta($post->ID, 'vid-embed-code', true);
				echo $vid_embed_code; 
				
				if( ! $vid_embed_code ){
					echo "NO VIDEO SPECIFIED!!!";
				}
				?>
			
				<div class="clear"></div>				
			</div>
			

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
				$vid_description = get_post_meta($post->ID, 'vid-description', true);
				echo $vid_description; 
				//the_content('<p>Read the rest of this page &raquo;</p>');
			?></div>
			
	   </div>


