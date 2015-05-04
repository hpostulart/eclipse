<?php //This page detects the category of a post, and assigns the appropriate template to display it.  
// Note that this does not work for pages; for pages, specify the template explicitly in the WP page editor. ?>


	<?php 
	  $post = $wp_query->post;
	?>

    <?php

      if ( in_category('4') ) {
	    include(TEMPLATEPATH . '/video_permalink.php');
	    
      }else if ( in_category('9') ) {
	    include(TEMPLATEPATH . '/gallery_permalink.php');	    

      } else if ( in_category('6')) {
      	include (TEMPLATEPATH . '/trip_report_permalink.php');

      } else {
	    include(TEMPLATEPATH . '/newsbloggy.php');
	    
      }
      

    ?>

