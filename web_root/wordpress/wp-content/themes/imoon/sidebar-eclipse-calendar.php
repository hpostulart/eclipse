<div class="sidebar-box">
<div id="sidebar-eclipse-calendar">
<!-- 	<h2>The Next Eclipse is in</h2> -->

<h2>The next Total Eclipse is in <br/><?php function_exists('fergcorp_countdownTimer')?fergcorp_countdownTimer():NULL; ?><br /><br /><br />





	
	<?php 
		$calendar_link = get_bloginfo('siteurl');
		$calendar_link .= '/eclipse-calendar';

	?>
	<div id="button_calendar"><a href="<?=$calendar_link?>" target="_self"></a></div>
</div>	
</div>