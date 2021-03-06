<?php

  // $background = get_template_directory_uri() . "/dist/images/header-sample-bg.jpg";
  $background = get_field('eg_default_site_header_img','options');
  $stylestring = 'style="background: black url(' . $background['url'] . '); background-size: cover; background-position: top center; position: relative;"';
  $default_header_fade = get_field('ep_default_site_header_opacity','options');
?>

<header id="header-global" class="banner" role="banner" <?= $stylestring; ?>>
  <div class="opacitator-header" style="opacity:<?= $default_header_fade; ?>; background:black;position:absolute;top:0;right:0;bottom:0;left:0;"></div>

  <div class="container">
    <a class="brand" href="<?= esc_url(home_url('/')); ?>"><img src="<?= get_template_directory_uri(); ?>/dist/images/eg-logo-total.png"></a>
  </div>

  <!-- MOBILE -->
  <nav role="navigation" class="nav-mobile visible-xs">
    <div class="navtoggle-wrap"><a data-toggle="collapse" data-target="#navcontent-mobile" href="#" class="navtoggle"><i class="fa fa-bars"></i></a></div>
    <div class="collapse" id="navcontent-mobile">
      <div class="container">
        <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']);
        endif;
        ?>
      </div>
    </div>
  </nav>

  <!-- DESKTOP -->
  <nav role="navigation" class="nav-main hidden-xs clearfix">
    <div class="container clearfix">
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