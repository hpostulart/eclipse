
		

			<?php 

				//-- grab array data and establish size --
				$gal_related = get_post_meta($post->ID, 'gal-related', false); 

			?>
				
			<?php
	 		if($gal_related){
	 		
				echo '<div class="sidebar-box" id="sidebar-video-list">';
				echo '<h2>Related Galleries</h2>';
				
				$rel_count = sizeof($gal_related);
				$rel_count_adjusted = $rel_count - 1;
				// echo "<br/>size of array = ".$rel_count."<br>";

				//-- set up loop to fetch and write related media from custom fields
				$counter = 0;
								

				

					
				while ($counter <= $rel_count_adjusted) {

/* 						echo "<div class='sidebar_hline_blue'></div>"; */

						//-- grab post permalink --//
						$cur_post_id = $gal_related[$counter];
						$cur_post_permalink = get_permalink($cur_post_id);
					
						//-- grab post thumb url from post-thumb custom field --//

						$cur_post_id = $gal_related[$counter];
						$cur_post_data = get_post_custom($cur_post_id);
						$cur_post_thumb =  $cur_post_data["post-thumb"][0];


						
						//-- check if the above failed, and display thumb or placeholder accordingly --//
						if($cur_post_thumb){

							echo "<div class='sidebar-list-thumb'>";
							echo "<a href='".$cur_post_permalink."'>";							
							echo "<img src='".$cur_post_thumb."'>";
							echo "</a>";							
							echo "</div>";

						}else{
							$theme_path = get_bloginfo("siteurl");
							$theme_path .= "/wp-content/uploads/nothumb.jpg";
							
							echo "<div class='sidebar-list-thumb'>";

							echo "<img height='105px' width='130px' src='".$theme_path."'>";
							echo "</div>";


						}
						

					
					echo "<div class='sidebar-textinfo'>";

					
						//-- grab video post title by ID --
						echo "<h3>";
						


						/* New method for grabbing the post title and link using 'get_permalink()' */
						$cur_post_id = $gal_related[$counter];	
																	
						$rel_title_data =  get_post($cur_post_id);
						$rel_title_alt = $rel_title_data->post_title;
						
						$rel_title_link = get_permalink($cur_post_id);
						
						echo "<a href='".$rel_title_link."'>";
						echo $rel_title_alt;
/* 						echo "<div class='button_vidplay_small'></div>"; */
						echo "</a>";

						

						echo "</h3>";

		
	
					
						/*-- grab video post description from custom field by ID (as an alternative to the below method)--
						$gal_related_description = get_post_meta($gal_related[$counter], "vid-description", true);
						echo $gal_related_description;
						*/
						
						
						//-- grab video post description from post content (as an alternative to the above method)--
						$cur_post_id = $gal_related[$counter];
						$cur_post_data = get_post($cur_post_id);

						// switched to post_excerpt
						// $cur_post_content = $cur_post_data->post_content;
						$cur_post_content = $cur_post_data->post_excerpt;
						echo "<div class='media_list_description'>";						
						echo $cur_post_content."<br/>";
						echo "</div>";	
						
						
						/* New method for grabbing the post title and link using 'get_permalink()' 
							SPIT OUT BUTTON AND LINK IT */
						$cur_post_id = $gal_related[$counter];	
						$rel_title_link = get_permalink($cur_post_id);
						

						echo "<div class='galplay' > <a href='".$rel_title_link."'></a> </div>";

						
					


					echo "</div>";
					
					
					echo "<div class='clear'></div>";	


					echo "<div class='sidebar_hline_blue'></div>";

					
					$counter ++;					
				}
				
/* 				echo 'link to media vault gallery page goes here'; */

				$go_link = get_bloginfo('siteurl');
				$go_link .= '/media-vault/photo-galleries';
				echo '<div id="button_gallery"><a href="'.$go_link.'" target="_self"></a></div>';

				echo "</div>";
				
			}
		  				
			?>
				  





	