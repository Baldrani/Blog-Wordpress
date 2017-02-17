<?php
get_header();
/*
if (have_posts()){
  while (have_posts()) {
    the_post();?>
    <h2><?php the_title(); ?></h2>
    <?php the_content();
  }
}
else {
  echo 'Pas d\'article yolo';
}*/
?>
<div class="container">
    <div class="row">
        <!-- Sldier Douae -->
        <div class="col-xs-12 col-sm-8">
            <?php
                if (have_posts()) {
                    $args = array( 'numberposts' => '4', 'post_status' => 'publish' );
                    $recent_posts = wp_get_recent_posts($args); ?>
            <section id="slideshow">
            <div class="container">
                <div class="c_slider"></div>
                        <div class="slider">
                            <?php
                            //$args = array( 'numberposts' => '4', 'post_status' => 'publish' );
                            $i=1;
                    foreach ($recent_posts as $recent) {
                        if ($i <= 4) {
                            //$toto = get_the_date('Y-m-d', $recent["ID"]);
                                    the_post(); ?><a href="<?php echo the_permalink(); ?>" title="Aller à l'annonce"><figure><?php the_post_thumbnail(array(640,310)); ?><figcaption><?php the_title(); ?></figcaption></figure></a>
                                    <?php

                        }
                        $i++;
                    } ?>
                        </div>
                    </div>
                    <span id="timeline"></span>
                    </section><?php

                } else {
                    echo 'Pas d\'article';
                }
            ?>
        </div>

        <div class="col-xs-12 col-sm-8">
            <?php if ( is_active_sidebar('jqvmap') ) dynamic_sidebar('jqvmap'); ?>
        </div>
        <div class="col-xs-12 col-sm-4">
        <?php dynamic_sidebar('sidebar-1'); ?>
        </div>
    </div>
    <div class="row">
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
