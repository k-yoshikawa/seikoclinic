<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Eleven 1.0
 */

get_header(); ?>
<?php get_sidebar(); ?>

		<div class="<?php $cat = get_the_category(); $cat = $cat[0]; { echo $cat->slug; } ?> content">
			<div role="main" id="main">

				<?php while ( have_posts() ) : the_post(); ?>


					<?php get_template_part( 'content', 'single' ); ?>

					<?php if(!in_category( 'recipe_blog')): ?>
					<!-- レシピ以外ならページネーション表示 -->
					<nav id="nav-single">
						<h3 class="assistive-text"><?php _e( 'Post navigation', 'twentythirteen' ); ?></h3>
						<span class="nav-previous"><?php previous_post_link( '%link', __( '<span class="meta-nav">&larr;</span> Previous', 'twentythirteen' ) ); ?></span>
						<span class="nav-next"><?php next_post_link( '%link', __( 'Next <span class="meta-nav">&rarr;</span>', 'twentythirteen' ) ); ?></span>
					</nav><!-- #nav-single -->
					<?php endif; ?>

				<?php endwhile; // end of the loop. ?>
			</div><!-- #main -->
			<div class="tag_cloud"><?php  //タグ外し wp_tag_cloud(); ?></div>
		</div><!-- .content -->

<?php get_footer(); ?>