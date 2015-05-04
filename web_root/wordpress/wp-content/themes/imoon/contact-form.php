<?php
/*
Template Name: Contact Form
*/
?>

<?php
	//-- grab array data and establish size of array --
	$header_name = get_post_meta($post->ID, 'header_name', false);

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

			<div>

<!-- 				<h1><?php the_title(); ?></h1> -->


				<div class="trip_report_content">
					<?php the_content('Read the rest of this entry &raquo;'); ?>
				</div>

<!-- 				<div class="contact_form">


					<form method="post" action="../cgi-bin/FormMail.pl">
						<input type=hidden name="recipient" value="imoon@eclipseguy.com">
						<input type=hidden name="redirect" value="http://www.eclipseguy.com/contact-success">
						<input type=hidden name="required" value="realname,email,comments">
						<input type=hidden name="missing_fields_redirect" value="http://www.eclipseguy.com/contact-error/">

						<table>
							<tr>
								<td class="ast-disclaim">&nbsp;</td>
								<td class="ast-disclaim">&#42; denotes required fields</td>
							</tr>
							<tr>
								<td class="labelcell">&#42;Name:</td>
								<td class="fieldcell"><input type="text" name="realname" id="realname"></td>
							</tr>

							<tr>
								<td class="labelcell">&#42;Email Address: </td>
								<td class="fieldcell"><input type="text" name="email" id="email"></td>
							</tr>

							<tr>
								<td class="labelcell">&#42;Message:</td>
								<td class="fieldcell"><textarea name="comments"  id="message"></textarea></td>
							</tr>

							<tr>
								<td></td>
								<td><input type="submit" value="Send To Eclipseguy" id="submit"></td>
							</tr>




						</form>
					</div>

					</table>
				</div> -->



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
	<?php get_sidebar('generic'); 	?>

	<!-- End Sidebar -->


	<div class="clear"></div>

	<!-- End Stripey Background -->
	</div>

<?php get_footer(); ?>
