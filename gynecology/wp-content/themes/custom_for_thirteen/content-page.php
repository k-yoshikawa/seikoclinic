<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Eleven 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="content_outer">
		<div class="content_inner">



    
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'twentythirteen' ) . '</span>', 'after' => '</div>' ) ); ?>
		</div><!-- .content_inner -->
	</div><!-- .content_outer -->
</article><!-- #post-<?php the_ID(); ?> -->
