
			<!-- get custom field info for all vid-related keys -->
			<h2>Related Media:</h2>			
			
			<?php 

				//-- grab array data and establish size --
				$vid_related = get_post_meta($post->ID, 'vid-related', false); 

				$gal_related = get_post_meta($post->ID, 'gal-related', false);
	
				$aud_related = get_post_meta($post->ID, 'aud-related', false);				



/* Add all media list objects indiscriminately */	
/* 				$all_related = array_merge($vid_related, $gal_related, $aud_related); */


				
/* detect associated media types and build media list object */
			
				$all_related = array();
				
				if($vid_related){
					$all_related = array_merge($all_related, $vid_related);
				}
				
				if($gal_related){

					$all_related = array_merge($all_related, $gal_related);					
				}
				if($aud_related){

					$all_related = array_merge($all_related, $aud_related);	
				}	

			?>
				
			<?php
/* 	 		if($vid_related){ */
	 		if($all_related){	 		
				
/* 				$rel_count = sizeof($vid_related); */
				$rel_count = sizeof($all_related);				
				$rel_count_adjusted = $rel_count - 1;
				// echo "<br/>size of array = ".$rel_count."<br>";

				//-- set up loop to fetch and write related media from custom fields
				$counter = 0;
								

				

					
				while ($counter <= $rel_count_adjusted) {
					echo "<div class='media_list_box'>";
/* 			 		echo "<ul>";	 */				
					/* echo $counter." w00t <br/>"; */


						//-- grab post permalink --//
/* 						$cur_post_id = $vid_related[$counter]; */
						$cur_post_id = $all_related[$counter];
						$cur_post_permalink = get_permalink($cur_post_id);
					
						//-- grab post thumb url from post-thumb custom field --//

/* 						$cur_post_id = $vid_related[$counter]; */
						$cur_post_id = $all_related[$counter];						
						$cur_post_data = get_post_custom($cur_post_id);
						$cur_post_thumb =  $cur_post_data["post-thumb"][0];


						
						//-- check if the above failed, and display thumb or placeholder accordingly --//
						if($cur_post_thumb){

							echo "<div class='media_list_thumb'>";
							echo "<a href='".$cur_post_permalink."'>";							
							echo "<img height='105px' width='130px' src='".$cur_post_thumb."'>";
							echo "</a>";							
							echo "</div>";

						}else{
							$theme_path = get_bloginfo("siteurl");
							$theme_path .= "/wp-content/uploads/nothumb.jpg";
							
							echo "<div class='media_list_thumb'>";

							echo "<img height='105px' width='130px' src='".$theme_path."'>";
							echo "</div>";


						}
						

					
					echo "<div class='media_list_textinfo'>";
					echo "<ul>";			
					
						//-- grab video post title by ID --
						echo "<div class='media_list_title'>";
						

						/* Old method for grabbing the post title and link broke when switching from pages to posts */
/*
						$rel_title = wp_list_pages("include=".$vid_related[$counter]."&title_li=&echo=0");
						echo $rel_title;
*/

						/* New method for grabbing the post title and link using 'get_permalink()' */
/* 						$cur_post_id = $vid_related[$counter];	 */
						$cur_post_id = $all_related[$counter];							
																	
						$rel_title_data =  get_post($cur_post_id);
						$rel_title_alt = $rel_title_data->post_title;
						
						$rel_title_link = get_permalink($cur_post_id);
						
						echo "<a href='".$rel_title_link."'>";
						echo $rel_title_alt;
/* 						echo "<div class='button_vidplay_small'></div>"; */
						echo "</a>";

						

						echo "</div>";

						
					/*-- alternate method for grabbing post title
					
						$cur_post_id = $vid_related[$counter];
						$cur_post_data = get_post($cur_post_id);
						$cur_post_title = $cur_post_data->post_content;
						echo $cur_post_title." fuck yeah!";
						
					--*/
						
						
						
						
						
						// -- Display Duration If Present--//
						$vid_duration = get_post_meta($cur_post_id, 'vid-duration', true);
						
						if($vid_duration){
							echo "<div class='vid_duration'>";
							echo "Duration: ".$vid_duration."";
							echo "</div>";
						}



						// -- Display Photo Count If Present--//
						$num_photos = get_post_meta($cur_post_id, 'num-photos', true);
						
						if($num_photos){
							echo "<div class='vid_duration'>";
							echo "".$num_photos." Photos In This Gallery";
							echo "</div>";
						}
						
						
						

					
						/*-- grab video post description from custom field by ID (as an alternative to the below method)--
						$vid_related_description = get_post_meta($vid_related[$counter], "vid-description", true);
						echo $vid_related_description;
						*/
						
						
						//-- grab video post description from post content (as an alternative to the above method)--
/* 						$cur_post_id = $vid_related[$counter]; */
						$cur_post_id = $all_related[$counter];
						$cur_post_data = get_post($cur_post_id);

						// switched to post_excerpt
						// $cur_post_content = $cur_post_data->post_content;
						$cur_post_content = $cur_post_data->post_excerpt;
						echo "<div class='media_list_description'>";						
						echo $cur_post_content."<br/>";
						echo "</div>";	
						
						
						/* New method for grabbing the post title and link using 'get_permalink()' 
							SPIT OUT BUTTON AND LINK IT */
/* 						$cur_post_id = $vid_related[$counter];	 */
						$cur_post_id = $all_related[$counter];							
						$rel_title_link = get_permalink($cur_post_id);
						

/* 						echo "<div class='vidplay' > <a href='".$rel_title_link."'></a> </div>"; */

/* 					Get Permalink, and select appropriate CTA Button based on category */
						
						if(in_category('4', $cur_post_id)){
/* 							echo "video"; */
							echo "<div class='vidplay' > <a href='".$rel_title_link."'></a> </div>";
						}elseif(in_category('9', $cur_post_id)){
/* 							echo "gallery";						 */
							echo "<div class='galplay' > <a href='".$rel_title_link."'></a> </div>";
						}elseif(in_category('10', $cur_post_id)){
/* 							echo "audio";						 */
							echo "<div class='audplay' > <a href='".$rel_title_link."'></a> </div>";
						}elseif(in_category('6', $cur_post_id)){
/* 							echo "trip report";						 */
							echo "<div class='repplay' > <a href='".$rel_title_link."'></a> </div>";							
						}else{
/* 							echo "unknown media type"; */
							echo "<a href='".$rel_title_link."'>Click Here!</a>";
						}

						
					
					echo "</ul>";
					echo "</div>";
					
					
					echo "<div class='clear'></div>";	


/* 					echo "</ul>";	 */																		
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
				  


	
