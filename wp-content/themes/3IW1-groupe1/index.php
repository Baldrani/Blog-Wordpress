<?php
get_header();

if (have_posts()){ ?>
    <?php
    $args = array( 'numberposts' => '4', 'post_status' => 'publish' );

    $recent_posts = wp_get_recent_posts( $args );

    ?>
    <section id="slideshow">
    <div class="container">
        <div class="c_slider"></div>
        <div class="slider">
            <?php

            //$args = array( 'numberposts' => '4', 'post_status' => 'publish' );

            $i=1;


            foreach( $recent_posts as $recent ){

                if ($i <= 4) {

                    //$toto = get_the_date('Y-m-d', $recent["ID"]);
                    the_post(); ?><a href="<?php echo the_permalink(); ?>" title="Aller à l'annonce"><figure><?php the_post_thumbnail( array(640,310) ); ?><figcaption><?php the_title(); ?></figcaption></figure></a>
                    <?php
                }
                $i++;

            }



            ?>
        </div>
    </div>
    <span id="timeline"></span>
    </section><?php
}
else {
    echo 'Pas d\'article';
}

dynamic_sidebar('sidebar-1');

get_footer();
?>
