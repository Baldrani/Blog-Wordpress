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
  echo 'Pas d\'article yolo';
}
?>
<div class="container">
    <div class="row">
        <div class="col-xs-12" style="background:red"><?php dynamic_sidebar('my_custom_zone');?></div>
    </div>
</div>
<?php

//La voucle qui récupère les évenements
$loop = new WP_Query(array('post_type'=>'events'));
while ($loop->have_posts()){
    $loop->the_post();
    the_title();
    the_content();
}

 ?>

    <?php get_footer(); ?>
>>>>>>> Stashed changes
