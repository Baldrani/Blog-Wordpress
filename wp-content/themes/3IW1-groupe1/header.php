<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php  wp_title(); echo ' | '; bloginfo('name'); ?></title>
  <?php wp_head();
  ?>
</head>
<body>
  <?php
  if(get_header_image()){
    echo '<a href="'.get_home_url().'"><img src ="'.get_header_image().'" alt="image header" title=""></a>';
  }else{
    echo "pas d'image d'en-tete";
  }
    wp_nav_menu(array(
               'theme_location' =>'main_menu'
      ) );
  ?>
