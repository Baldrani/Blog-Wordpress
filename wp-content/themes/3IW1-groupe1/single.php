<?php get_header(); ?>
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-8 article">
			<?php the_post(); ?>
			<h2><?php the_title(); ?></h2>
			<div class="thumbnail">
				<?php the_post_thumbnail(); ?>
			</div>
			<?php
			the_content();
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
			?>
		</div>
		<div class="col-xs-12 col-sm-4" id="sidebar-1">
			<?php dynamic_sidebar('sidebar-1'); ?>
		</div>
	</div>
</div>


</div><!-- .content-area -->

<?php get_footer(); ?>
