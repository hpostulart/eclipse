<div class="sidebar-box">	
	<h2>Featured</h2>


<?php
	$posts = get_posts('cat=13&posts_per_page=10');
	foreach($posts as $post ):
		setup_postdata($post);?>
		
	<div class="hline_blue"></div>	
		
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
	
		
		
		
		<!--- text info --->
		<div class="media_list_textinfo">
		
			<div class="media_list_title">
				<h3> 
					<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
					<?php the_title_attribute();?></a>
				</h3>				
			</div>
			<?php the_excerpt('<p class="serif">Read the rest of this &raquo;</p>');?>

		</div>
	<div class="clear"></div>


<?php 
	endforeach;
?>

</div>		