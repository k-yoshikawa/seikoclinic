<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Eleven 1.0
 */

get_header(); ?>
<?php get_sidebar(); ?>
		<section id="primary" class="content category_page">
			<div id="content" role="main">

			<?php if ( have_posts() ) : ?>
				<h1><span><?php $cat = get_the_category(); $cat = $cat[0]; { echo $cat->cat_name; } ?></span></h1>



				<?php
					$category_description = category_description();
					if ( ! empty( $category_description ) )
						echo apply_filters( 'category_archive_meta', '<div class="category-archive-meta">' . $category_description . '</div>' );
				?>
				<?php get_search_form(); ?>


				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to overload this in a child theme then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content', get_post_format() );
					?>

				<?php endwhile; ?>

				<?php twentythirteen_paging_nav(); ?>

				<?php else : ?>
					<?php get_template_part( 'content', 'none' ); ?>
				<?php endif; ?>

			</div><!-- #content -->
            <?php wp_tag_cloud(); ?>
		</section><!-- .content -->


<?php get_footer(); ?>
