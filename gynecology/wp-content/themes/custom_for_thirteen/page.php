<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Eleven 1.0
 */

get_header(); ?>
<?php get_sidebar(); ?>

		<?php /*
		<div id="primary" class="content">
			<div id="content" role="main">
			*/ ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>

			<?php /*
			</div><!-- #content -->
		</div><!-- .content -->
		*/ ?>
<?php get_footer(); ?>