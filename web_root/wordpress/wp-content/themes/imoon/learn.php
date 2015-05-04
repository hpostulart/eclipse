<?php
/*
Template Name: Learn
*/
?>

<?php 
	//-- grab array data and establish size --
	$header_name = get_post_meta($post->ID, 'header_name', false); 
/* 	echo $header_name[0]; */
	
	if ($header_name) {
		$header_file = TEMPLATEPATH ."/".$header_name[0].".php";
	} else {
		$header_file = TEMPLATEPATH ."/header-generic.php";
	}
/* 	include (TEMPLATEPATH . '/header-trip-reports.php');  */
	include ($header_file); 
	
?>



	<div class="content_wide" >			

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
			
			<div class="learn_display">

<!-- 				<h1><?php the_title(); ?></h1> -->


				<div class="trip_report_content">
					<?php the_content('Read the rest of this entry &raquo;'); ?>
				</div>
	
				

<!-- <?php bloginfo('siteurl')?> -->
			<div class="clear"></div>
			</div>
		<?php endwhile; ?>


	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>

	<?php endif; ?>





	<!-- display edit link, and post ID -->
	<?php 
		$editstring = '</p><p class="post_id_disp">ID for this post: '.$post->ID.'</p>';
		//echo $editstring;
		edit_post_link('Edit this entry.', '<p>', '</p>'.$editstring.''); 
		

	?>




	<!-- End Main Content Area -->
	</div>



	<!-- Sidebar -->
	<?php get_sidebar('learn'); 	?>
	
	<!-- End Sidebar -->

	
	<div class="clear"></div>
	
	<!-- End Stripey Background -->
	</div>
	
<?php get_footer(); ?>
