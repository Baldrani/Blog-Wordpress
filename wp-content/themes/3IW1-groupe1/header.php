<!DOCTYPE html>
<html>
<head>
  <title><?php bloginfo('name'); ?></title>
  <?php wp_head(); ?>
</head>
<body>
  <h1><?php bloginfo('name'); ?></h1>
  <?php
  if (get_header_image()) {
      echo "<img src=\"".header_image()."\" alt=\"image logo\">";
  } else {
      echo "Pas d'image d'en-tête";
  }
  header_image(); 
  wp_nav_menu(array(
      'theme_location' => 'main_menu'
  ));
  ?>
