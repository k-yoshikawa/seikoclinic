<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 */

get_header(); ?>
<?php get_sidebar(); ?>

	<article class="content">
		<div class="content_outer">
			<div class="content_inner">
				<div class="content_top">
					<div class="gaku shirahara"><a href="<?php bloginfo('url'); ?>/staff/shirahara/" title="「これでいい」夢 なんて、ない"></a></div>
					<div class="gaku yoshida"><a href="<?php bloginfo('url'); ?>/staff/yoshida/" title="前例なく、できそうもないことを、面白く"></a></div>
					<div class="gaku tahashi"><a href="<?php bloginfo('url'); ?>/staff/tabashi/" title="普通の女の子が歩んだ普通じゃない軌跡"></a></div>
					<div class="gaku sige"><a href="<?php bloginfo('url'); ?>/staff/shige/" title="根拠のない自信より、大それた具体的な夢"></a></div>
				</div>
				<div class="content_top">
					<div class="gaku spimg copy"><a href="<?php bloginfo('url'); ?>/teach/" title="選んだ道で、選ばれる人になる。"></a></div>
					<div class="gaku yoshizato"><a href="<?php bloginfo('url'); ?>/staff/yoshizato/" title="目標は謙虚に、仕事は貪欲に、明日はまた違う自分"></a></div>
					<div class="gaku pcimg copy"><a href="<?php bloginfo('url'); ?>/teach/" title="選んだ道で、選ばれる人になる。"></a></div>
					<div class="gaku ooi"><a href="<?php bloginfo('url'); ?>/staff/ooi/" title="前代未聞の大失敗も、乗り越えればキャリアになる"></a></div>
				</div>
				<div class="content_top">
					<div class="gaku oohara"><a href="<?php bloginfo('url'); ?>/staff/oohara/" title="自分の先が見えない時も、ひとの夢を信じ続けるという才能"></a></div>
					<div class="gaku pcimg story"><a href="<?php bloginfo('url'); ?>/story/" title="創業物語"></a></div>
					<div class="gaku pcimg teach"><a href="<?php bloginfo('url'); ?>/teach/" title="濱田の言葉"></a></div>
					<div class="gaku kushibiki"><a href="<?php bloginfo('url'); ?>/staff/kushibiki/" title="どうせ酔うなら、過去の栄光より、未来へのスピード感"></a></div>
					<div class="gaku spimg story"><a href="<?php bloginfo('url'); ?>/story/" title="創業物語"></a></div>
					<div class="gaku spimg teach"><a href="<?php bloginfo('url'); ?>/teach/" title="濱田の言葉"></a></div>
				</div>
				<div class="banner_list">
					<ul>
						<?php /* <li><a href="https://www.facebook.com/advancecreate.recruit" target="_blank"><img src="image/bn_facebook.png" height="66" width="233"></a></li> */ ?>
						<li><a href="http://www.hokende.com/static/life/features/20130818/" target="_blank"><img src="<?php bloginfo('url'); ?>/image/bn_youtube.png" width="225" height="58"></a></li>
					</ul>
				</div>
			</div><!-- / .content_inner -->
		</div><!-- / .content_outer -->
<?php
/*
		<section>
			<h2 class="news"><img src="<?php bloginfo('url'); ?>/image/h2_news.png" width="105" height="28" alt="新着情報" /></h2>
			<div class="news_body">
				<dl>
					<?php query_posts('showposts=10&cat=-5,-9,-12'); ?>
					<?php if(have_posts()): ?>
					<?php while(have_posts()): the_post(); ?>

					<?php /*カテゴリスラッグをクラスに設定,カテゴリー名を取得*/ /*?>
					<?php /*$cat = get_the_category(); *//* ?>
					<?php $cat = $cat[0]; ?>
					<?php $className = $cat->category_nicename; ?>
					<?php $catName = $cat->cat_name; ?>

					<dt><?php the_time('m/d'); ?> -</dt>
					 <dd><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a><span class="<?php echo $className ?>">- <?php echo $catName ?></span></dd>
					<?php endwhile; ?>
					<?php endif; ?>
				</dl>
			</div>
		</section>
		<section class="member">
			<ul>
				<?php query_posts('showposts=4&cat=5'); ?>
				<?php if(have_posts()): ?>
				<?php while(have_posts()): the_post(); ?>
				<li><p style="padding:0;margin:0;"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail(array(129,129)); ?></a></p>
				 <p><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></p>
				<?php endwhile; ?>
				<?php endif; ?>
			</ul>
		</section>
*/ ?>
<?php get_footer(); ?>