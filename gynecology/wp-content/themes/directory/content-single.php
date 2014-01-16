<?php
/**
 * The template for displaying content in the single.php template
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> class="zone">
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<span>投稿日時：<?php the_time('m/d'); ?></span>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'twentyeleven' ) . '</span>', 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
		<?php /*
			if(in_category( 'recipe_blog')){
				//レシピのときは前のページに戻るを表示
				echo '<div style="margin: 20px auto;text-align:center; width:100%;"><a href="http://ogurayayamamoto.co.jp/know/recipe/" style="font-weight:bold;font-size:1.5em">前のページへ戻る</a></div>';

			}else{

				$categories_list = get_the_category_list( __( ', ', 'twentyeleven' ) );

				$tag_list = get_the_tag_list( '', __( ', ', 'twentyeleven' ) );

				printf(
					"カテゴリー：" . $categories_list,
					"タグ：" . $tag_list
				);

			}

		*/ ?>

	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->
