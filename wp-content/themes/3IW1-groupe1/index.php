<?php
get_header();

if (have_posts()){
  while (have_posts()) {
    the_post();?>
    <h2><?php the_title(); ?></h2>
    <?php the_content();
  }
}
else {
  echo 'Pas d\'article';
}

dynamic_sidebar('sidebar-1');

get_footer();
 ?>
