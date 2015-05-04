
<?php
/*
Template Name: Media Vault Listings - Gallery OLD
*/
?>

<?php include (TEMPLATEPATH . '/header-media-vault.php'); ?>

<div id="content" class="narrowcolumn">
		<?php if (have_posts()):
		$posts = get_posts('cat=9');
		foreach($posts as $post ):
			setup_postdata($post);?>


		
		<div class="post">
			<?php 
			$cur_post_thumb = get_post_meta($post->ID,'post-thumb',true);
			if($cur_post_thumb){?>



	
<!-- Thumbnail -->


				<div class="media_list_thumb">
					<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
						<img height="105" width="130" src="<?=$cur_post_thumb?>" title="<?php the_title_attribute(); ?>" alt="<?php the_title_attribute(); ?> Thumbnail">
					</a>
				</div>
			<?}else{?>
				<div class="media_list_thumb">
					<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
						<img height="105" width="130" src="http://test.rubbersuit.com/eclipseguy/wp-content/uploads/nothumb.jpg" title="<?php the_title_attribute(); ?>" alt="No Thumbnail">
					</a>
				</div>


			<?}?>

<!--			<a href="<?php the_permalink()?>" title="Permanent Link">-->
<!--				<img src="<?=get_post_meta($post->ID, 'post-thumb', true);?>" title="<?php the_title_attribute(); ?>" />-->
<!--			</a>-->
				<h3 id="post-<?php the_ID(); ?>">
					<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
				</h3>
				<p><?=get_post_meta($post->ID, 'num-photos', true);?> Photographs</p>
				
				<div class="entry">
					<?php the_excerpt() ?>
				</div>
				
				<p><a href="<?php the_permalink()?>" title="Permanent Link">View Gallery</a>
<!--				<p class="postmetadata"><?php the_tags('Tags: ', ', ', '<br />'); ?> Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>-->

			</div>

		<?php endforeach; //endwhile; ?>
	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>

	</div>

	<?php get_footer(); ?>