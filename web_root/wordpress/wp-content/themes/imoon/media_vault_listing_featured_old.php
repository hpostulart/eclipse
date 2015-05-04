<?php include (TEMPLATEPATH . '/header-media-vault.php'); ?>

<div id="content" class="narrowcolumn">
		<?php if (have_posts()):
		$posts = get_posts('cat=12');
		foreach($posts as $post ):
			setup_postdata($post);?>
			
			
			
				<?php if ( in_category('4') ):?>
					<!-- video clip -->
					<div class="post">
						<?php 
						$cur_post_thumb = get_post_meta($post->ID,'post-thumb',true);
						if($cur_post_thumb):?>
							<div class="media_list_thumb">
								<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
									<img height="105" width="130" src="<?=$cur_post_thumb?>" title="<?php the_title_attribute(); ?>" alt="<?php the_title_attribute(); ?> Thumbnail">
								</a>
							</div>
						<?else:?>
							<div class="media_list_thumb">
								<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
									<img height="105" width="130" src="http://test.rubbersuit.com/eclipseguy/wp-content/uploads/nothumb.jpg" title="<?php the_title_attribute(); ?>" alt="No Thumbnail">
								</a>
							</div>
						<?endif;?>
							<h3 id="post-<?php the_ID(); ?>">
								<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
							</h3>
							<p>Duration: <?=get_post_meta($post->ID, 'vid-duration', true);?></p>
							
							<div class="entry">
								<?php the_excerpt() ?>
							</div>
							
							<p><a href="<?php the_permalink()?>" title="Permanent Link">Watch Video</a>
						</div>




					<?php elseif ( in_category('10')):?>
					<!-- audio clip  -->
					<div class="post">
						<?php $cur_post_thumb = get_post_meta($post->ID,'post-thumb',true);
						if($cur_post_thumb):?>
							<div class="media_list_thumb">
								<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
									<img height="105" width="130" src="<?=$cur_post_thumb?>" title="<?php the_title_attribute(); ?>" alt="<?php the_title_attribute(); ?> Thumbnail">
								</a>
							</div>
						<?else:?>
							<div class="media_list_thumb">
								<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
									<img height="105" width="130" src="http://test.rubbersuit.com/eclipseguy/wp-content/uploads/nothumb.jpg" title="<?php the_title_attribute(); ?>" alt="No Thumbnail">
								</a>
							</div>
						<?endif;?>
							<h3 id="post-<?php the_ID(); ?>">
								<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
							</h3>
							<p>Duration: <?=get_post_meta($post->ID, 'clip-duration', true);?></p>
							
							<div class="entry">
								<?php the_excerpt() ?>
							</div>
							
							<p><a href="<?php the_permalink()?>" title="Permanent Link">Listen</a>
						</div>




					<?php elseif ( in_category('9')):?>
					<!-- gallery page -->
					<div class="post">
						<?php $cur_post_thumb = get_post_meta($post->ID,'post-thumb',true);
						if($cur_post_thumb):?>
							<div class="media_list_thumb">
								<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
									<img height="105" width="130" src="<?=$cur_post_thumb?>" title="<?php the_title_attribute(); ?>" alt="<?php the_title_attribute(); ?> Thumbnail">
								</a>
							</div>
						<?else:?>
							<div class="media_list_thumb">
								<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
									<img height="105" width="130" src="http://test.rubbersuit.com/eclipseguy/wp-content/uploads/nothumb.jpg" title="<?php the_title_attribute(); ?>" alt="No Thumbnail">
								</a>
							</div>
						<?endif;?>
							<h3 id="post-<?php the_ID(); ?>">
								<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
							</h3>
							<p><?=get_post_meta($post->ID, 'num-photos', true);?> Photographs</p>
							
							<div class="entry">
								<?php the_excerpt() ?>
							</div>
							
							<p><a href="<?php the_permalink()?>" title="Permanent Link">View Gallery</a>
						</div>
					<?php endif;?>


		<?php endforeach; //endwhile; ?>
	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>

	</div>

	<?php get_footer(); ?>