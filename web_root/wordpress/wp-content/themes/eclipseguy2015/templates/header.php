<?php

  $background = get_template_directory_uri() . "/dist/images/header-sample-bg.jpg";
  $stylestring = 'style="background: black url(' . $background . '); background-size: cover; background-position: top center;"';
?>

<header class="banner" role="banner" <?= $stylestring; ?>>

  <div class="container">
    <a class="brand" href="<?= esc_url(home_url('/')); ?>"><img src="<?= get_template_directory_uri(); ?>/dist/images/eg-logo-total.png"></a>
  </div>

  <nav role="navigation" class="nav-main">
    <div class="container">
      <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']);
      endif;
      ?>
    </div>
  </nav>

</header>

<?php
  if(is_front_page()){
    get_template_part("templates/subheader","frontpage");
  }if(is_singular('reports')){
    get_template_part("templates/subheader","report");
  }if(is_singular('videos')){
    get_template_part("templates/subheader","videos");
  }
?>