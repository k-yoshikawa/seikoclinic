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
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>
		<!-- パン屑リスト -->
		<div style="font-size:small;" class="bread">
		<a href="<?php echo get_option('home'); ?>">HOME</a>&nbsp;>&nbsp;</li>
		<?php foreach ( array_reverse(get_post_ancestors($post->ID)) as $parid ) { ?>
		<a href="<?php echo get_page_link( $parid );?>" title="<?php echo get_page($parid)->post_title; ?>">
		<?php echo get_page($parid)->post_title; ?></a>&nbsp;>&nbsp;
		<?php } ?>
		<?php the_title(''); ?>
		</div>
		<!-- パンくずリストここまで -->

		<div id="primary">
			<div id="content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>