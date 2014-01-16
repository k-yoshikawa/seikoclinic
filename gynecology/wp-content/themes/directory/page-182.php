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
// レシピ用ページ

get_header(); ?>

		<div id="primary">
			<div id="content" role="main">
				<!-- パン屑リスト -->
				<div style="font-size:small;" class="bread">
				<a href="<?php echo get_option('home'); ?>">HOME</a>&nbsp;>&nbsp;</li>
				<?php foreach ( array_reverse(get_post_ancestors($post->ID)) as $parid ) { ?>
				<a href="<?php echo get_page_link( $parid );?>" title="<?php echo get_page($parid)->post_title; ?>">
				<?php echo get_page($parid)->post_title; ?></a>&nbsp;>&nbsp;
				<?php } ?>
				<?php the_title(''); ?>
				</div>
				<!-- パン屑リストここまで -->

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<header class="entry-header">
					<h1 class="entry-title"><?php the_title(); ?></h1>
				</header><!-- .entry-header -->

				<div class="recipe">
				<!-- 投稿レシピを取得 -->
					<?php query_posts('showposts=9&cat=12&paged=' . get_query_var( 'paged' )); ?> <!-- 記事9個取得。それ以降はページネーション実装。 -->
		                <?php if(have_posts()): ?>
			                <?php while(have_posts()): the_post(); ?>
			                <div>
				                <a href="<?php the_permalink(); ?>"><img src="<?php echo catch_that_image(); ?>" alt="やまちゃんおすすめ簡単レシピ" width="150" height="150" /></a>
				                <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
				            </div>
		                <?php endwhile; ?>
	                <?php endif; ?>
            	</div><!-- .recipe -->
            	<footer class="entry-meta">
            		<!-- ページネーション -->
            		<?php posts_nav_link( ' | ', $prelabel = '前の記事', $nxtlabel = '次の記事' ); ?>
				</footer><!-- .entry-meta -->
			</article><!-- #post-<?php the_ID(); ?> -->

			</div><!-- #content -->
		</div><!-- #primary -->


<!-- サイドバー　コピー -->
<div id="secondary" class="widget-area" role="complementary">
			<!-- 子ページ一覧表示 -->
						<div id="contentmenu">
			<ul>
			<li id="sidebartop"><a href="<?php bloginfo('url'); ?>/know/"> 知る・楽しむ </a> </li>
			<li class="page_item page-item-35"><a href="<?php bloginfo('url'); ?>/know/power/">昆布のちから</a></li>
<li class="page_item page-item-182"><a href="<?php bloginfo('url'); ?>/know/recipe/">やまちゃんのおすすめ簡単レシピ</a></li>
<li class="page_item page-item-184"><a href="<?php bloginfo('url'); ?>/know/how_to_dashi/">だしの取り方</a></li>
<li class="page_item page-item-147 current_page_item"><a href="<?php bloginfo('url'); ?>/know/gift/">「贈る」想いを大切に</a>
<ul class="children">
	<li class="page_item page-item-868"><a href="<?php bloginfo('url'); ?>/know/gift/auspicious_occasion/">慶事でのご購入に</a></li>
	<li class="page_item page-item-883"><a href="<?php bloginfo('url'); ?>/know/gift/condolence/">弔事でのご購入に</a></li>
</ul>
</li>
<li class="page_item page-item-141"><a href="<?php bloginfo('url'); ?>/know/kelp_road/">日本各地の昆布食文化</a></li>
<li class="page_item page-item-135"><a href="<?php bloginfo('url'); ?>/know/kind/">昆布の種類</a></li>
<li class="page_item page-item-139"><a href="<?php bloginfo('url'); ?>/know/history_kelp/">昆布の歴史</a></li>
<li class="page_item page-item-137"><a href="<?php bloginfo('url'); ?>/know/lifetime_kelp/">昆布の一生</a></li>
<li class="page_item page-item-133"><a href="<?php bloginfo('url'); ?>/know/fucoxanthin/">フコキサンチンとの出会い</a></li>
			</ul>
			</div>
			<!-- 子ページ一覧表示ここまで -->
			



			<aside id="text-2" class="widget widget_text">			<div class="textwidget"></div>
		</aside>
                <!-- facebook likebox -->
                <!-- <img src="http://ogurayayamamoto.co.jp/corporate/common/images/facebook.png"> -->
				<a href="http://ogurayayamamoto.co.jp?page_id=642"><img src="http://ogurayayamamoto.co.jp/corporate/common/images/tenpolist.png"></a>
                <a href="http://ogurayayamamoto.jp/" target="_blank"><img src="http://ogurayayamamoto.co.jp/corporate/common/images/onlineshop.jpg"></a>
                <!-- <a href="http://www.rakuten.co.jp/ogurayayamamoto/" target="_blank"><img src=" --><!-- /corporate/common/images/rakuten.png" style="width:auto;"></a>-->
                <!-- <a href="http://store.shopping.yahoo.co.jp/ogurayayamamoto/index.html" target="_blank"><img src=" --><!-- /corporate/common/images/yahoo.png" style="width:auto;"></a> -->
		</div>
<?php get_footer(); ?>