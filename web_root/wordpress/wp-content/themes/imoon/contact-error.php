<?php
/*
Template Name: Contact Error
*/
?>

<?php 
	include (TEMPLATEPATH . '/header-consuccess.php'); 
?>

	<div class="content_internal">
		<br/><br/>
		<h1 class="center" style="color:#FF0000;">Your message was missing fields, or contained an error!</h1>
		<h2 class="center"><a href="javascript:history.go(-1);">Click here to return to the previous page and complete all fields the contact form.</a></h2>

		<h3 class="center">*&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;*
		<br/>

		
		<br/><br/>Please note that all fields on the contact form are required, and you must provide a valid email address!</h3>
		<br/><br/>
	
	</div>

	<div class="clear"></div>


</div>


<?php get_footer(); ?>