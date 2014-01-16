<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>
		<!-- パン屑リスト -->
		<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
		<div style="font-size:small;" class="bread">
		<a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>&nbsp;>&nbsp;
		<?php $cat = get_the_category(); echo get_category_parents($cat[0], true, '&nbsp;>&nbsp;'); ?>
		<?php the_title(''); ?>
		</div>
		<!-- パン屑リストここまで -->

		<div id="primary" class="<?php $cat = get_the_category(); $cat = $cat[0]; { echo $cat->slug; } ?>">


			<div id="content" role="main" class="zone">
				<?php while ( have_posts() ) : the_post(); ?>


					<?php get_template_part( 'content', 'single' ); ?>

					<?php if(!in_category( 'recipe_blog')): ?>
					<!-- レシピ以外ならページネーション表示 -->
					<nav id="nav-single">
						<h3 class="assistive-text"><?php _e( 'Post navigation', 'twentyeleven' ); ?></h3>
						<span class="nav-previous"><?php previous_post_link( '%link', __( '<span class="meta-nav">&larr;</span> Previous', 'twentyeleven' ) ); ?></span>
						<span class="nav-next"><?php next_post_link( '%link', __( 'Next <span class="meta-nav">&rarr;</span>', 'twentyeleven' ) ); ?></span>
					</nav><!-- #nav-single -->
					<?php endif; ?>

				<?php endwhile; // end of the loop. ?>
			</div><!-- #content -->
			<div class="tag_cloud"><?php  //タグ外し wp_tag_cloud(); ?></div>
		</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>