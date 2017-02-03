<?php
get_header();

/* if (have_posts()){
  while (have_posts()) {
    the_post();?>
    <h2><?php the_title(); ?></h2>
    <?php the_content();
  }
}
else {
  echo 'Pas d\'article yolo';
} */
?>
<div class="container">
    <div class="row">
        <div class="col-xs-12" style="background:red"><?php dynamic_sidebar('my_custom_zone');?></div>
    </div>
</div>
    <?php get_footer(); ?>
