<?php
/*
Template Name: Home Page
*/?>

<?php include (TEMPLATEPATH . '/header-home.php'); ?>



<div class="content_internal" >
 
 
     <?php if (have_posts()) : ?>

		<?php
/* 			 echo" <h1>&#147;You Must See An Eclipse Before You Die&#148;</h1>"; */
		?>	
		
		<?php while (have_posts()) : the_post(); ?>
		<div>	

				<div class="homepage_text">	
<!-- 					<h1> -->
						<?php //the_title() ?></h1><?php the_content() ?>
<!-- 					</h1> -->
<!-- 					<div class="align-right"><br/><i>-Eclipseguy</i></div> -->
				</div>

				
				
				<?php 
				
					$theme_path = get_bloginfo("siteurl");
					$theme_path .= "/wp-content/uploads/the_explorer.jpg";
					echo "<div class='homepage_portrait'>  <img height='338px' width='460px' src='".$theme_path."'><br/>			<h3><i>Eclipse chasing in Antarctica 2003</i></h3>		
					
					</div>";
				?>
					<div class="clear"></div>

				<div class="clear"></div>





	<!-- display edit link, and post ID -->
	<?php 
		$editstring = '</p><p class="post_id_disp">ID for this post: '.$post->ID.'</p>';
		//echo $editstring;
		edit_post_link('Edit this entry.', '<br/><br/><p>', '</p>'.$editstring.''); 
	?>	



		</div>

		<?php endwhile; ?>

	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>
	<?php endif; ?>
	
</div>




<br/>


<div class="content_internal">
<div id="homepage_video">
 
	<?php include (TEMPLATEPATH . '/homepage_video.php'); ?>		

</div>








<div id="homepage_news">
	<h1>Latest Headlines</h1>
	<?php $custom_fields = get_post_custom(); ?>	
	
	<?php //the three latest news posts
		$posts = get_posts('cat=1,11');
		for ( $i=0; $i<3; $i++ ):
		$post = $posts[$i];
		setup_postdata($post);?>
	
		
		<div>
			<div class='homepage_list_thumb'>
				<?php 
				
				
/*this is where shit broke, due, likely, to an unexpected update to the PHP install
  on AtomBong's server.  The following  4 lines of code are a workaround to access
  the appropriate variables from the $post object. */
  				
					$postvars = get_object_vars($post);
					$keys = array_keys($postvars);
//					echo $postvars[$key[0]];					
					$keyID = $postvars[$key[0]];

/* ...return to regularly scheduled programming... */

					
					$cur_post_data = get_post_custom($keyID);				
//					$cur_post_data = get_post_custom($post[$i]);

					$cur_post_thumb =  $cur_post_data["post-thumb"][0];

					$cur_post_permalink = get_permalink($keyID);
//					$cur_post_permalink = get_permalink($post[$i]);					

					echo $keyID;
//					echo $post[$i];


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
		
			<div class='homepage_list_textinfo'>
		 	 <h2>
				<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
					<?php the_title_attribute();?>
				</a>
			  </h2>
				<?php the_excerpt('<p class="serif">Read the rest of this &raquo;</p>');?>
			</div>	
			
		</div>
		
		<div class="clear"></div>
		
		<div class="hline_blue"></div>
		<?php endfor;?>
		
		
		<?php
			$siteurl = get_bloginfo("siteurl");
			echo "<h2><a href='".$siteurl."/news/' target='_self'>Read More News Headlines...</a></h2>";
		?>
</div>		

<div class="clear"></div>		

</div> 	

		
<?php include (TEMPLATEPATH . '/webring.php'); ?>		



	
		
</div>

<?php //get_sidebar(); ?>

<?php get_footer(); ?>
