<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php
  if (!empty(wp_title())) {
      echo wp_title();
  } else {
      echo bloginfo('name');
  } ?></title>
  <?php wp_head(); ?>
</head>
<body>
    <div class="header">
      <?php
      if(get_header_image()){
        $url = strstr(get_header_image(), "wp");
        echo '<a href="'.get_home_url().'"><img src="'.get_home_url()."/".$url.'" alt="image header" title=""></a>';
      }else{
        echo "Adopte un Chat";
      }

      if ( is_active_sidebar( 'header-widget' ) ) : ?>

        <div id="header-widget-area" class="chw-widget-area widget-area col-xs-12 col-sm-5" role="complementary">
        <?php dynamic_sidebar( 'header-widget' ); ?>
        </div>
    </div>
<?php endif; ?>
