<?php
/**
 * The default template for displaying content
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Eleven 1.0
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<!-- start header -->
		<?php if ( is_sticky() ) : ?>
			<h2 class="entry-title"><span><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentythirteen' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></span></h2>
			<h3 class="entry-format"><?php _e( 'Featured', 'twentythirteen' ); ?></h3>
		<?php else : ?>
		<h3 class="entry-title"><span><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentythirteen' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></span></h3>
		<?php endif; ?>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<p class="post_date">更新：<?php the_time('m/d'); ?></p>
		</div><!-- .entry-meta -->
		<?php endif; ?>

		<?php if ( comments_open() && ! post_password_required() ) : ?>
		<?php endif; ?>
		
		<!-- end header -->





	</article><!-- #post-<?php the_ID(); ?> -->
