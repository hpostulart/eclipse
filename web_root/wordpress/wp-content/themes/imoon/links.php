<?php
/*
Template Name: Linksies
*/
?>

<?php 	include (TEMPLATEPATH . '/header-links.php');  ?>



<div class="content_wide" >			




<div id="link-list">
	<ul>
		 <?php wp_list_bookmarks('categorize=0&title_li=&category=2&show_description=1&link_before=<span class="ll-title">&link_after=</span>'); ?>
	</ul>
</div>



	<!-- End Main Content Area -->
	</div>



	<!-- Sidebar -->
	<?php get_sidebar('generic'); 	?>
	
	<!-- End Sidebar -->

	
	<div class="clear"></div>
	
	<!-- End Stripey Background -->
	</div>
	
<?php get_footer(); ?>
