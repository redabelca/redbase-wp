<?php get_header(); ?>

		<?php
		if ( have_posts() ) : ?>

				<?php
					the_archive_title( '<h1 class="single-post-title">','</h1>' );
					// the_archive_description( '<div class="archive-description">', '</div>' );
				?>

			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', get_post_format() );
			endwhile;
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif; ?>

<?php
get_sidebar();
get_footer();