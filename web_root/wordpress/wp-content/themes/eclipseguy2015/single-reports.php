<?php
  $report_content = get_field("trip_report_sections");
?>

<div class="row">
  <aside class="trip-report-nav">
    <div id="trip-report-nav-pusher"></div>
    <?php if( have_rows('trip_report_sections') ): ?>
    <ul>
      <?php $count = 1; ?>
      <?php while( have_rows('trip_report_sections') ): the_row(); ?>

        <?php
          $pretitle = get_sub_field('trip_report_section_title');
          if($pretitle != ""){
            $sep = ":";
          }else{
            $sep = '';
          }
        ?>
        <li><a href="#p-<?=$count;?>"><?php echo 'Part '.$count.$sep.'&nbsp;'; echo get_sub_field('trip_report_section_title'); ?></a></li>
        <?php $count ++; ?>
      <?php endwhile;?>
    </ul>
    <?php endif; ?>
  </aside>



  <?php while (have_posts()) : the_post(); ?>
    <article class="trip-report-content">

      <div class="entry-content">
        <?php if( have_rows('trip_report_sections') ): ?>
          <?php $count = 1; ?>
          <?php
            while( have_rows('trip_report_sections') ): the_row();
              // vars
              // $image = get_sub_field('image');
              $pretitle = get_sub_field('trip_report_section_title');
              $title = '<span class="partnum">Part '.$count.$sep.'&nbsp;</span>' . $pretitle;
              $content = get_sub_field('trip_report_section_content');
              // $link = get_sub_field('link');
              // echo '<a name="p-'.$count.'">';
              $anchor = "p-".$count;
              echo '<div id="'.$anchor.'" class="trip-report-section">';
              echo '<h3>' . $title . '</h3>';
              echo $content;
              echo '</div>';
              $count ++;
            endwhile;
            endif;
          ?>
      </div>

      <a href="/trip-reports" class="back-to-listing"><?= __('« Back To Trip Report Listing','ep'); ?></a>

      <footer>
        <?php
          // wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']);
        ?>
      </footer>
      <?php comments_template('/templates/comments.php'); ?>
    </article>
  <?php endwhile; ?>

</div>