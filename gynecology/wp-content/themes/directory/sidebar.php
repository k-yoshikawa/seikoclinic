<?php
/**
 * The Sidebar containing the main widget area.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

$options = twentyeleven_get_theme_options();
$current_layout = $options['theme_layout'];

if ( 'content' != $current_layout ) :
?>
		<div id="secondary" class="widget-area" role="complementary">
			<!-- 子ページ一覧表示 -->
			<?php
			if (is_page() && $post->post_parent ) { //サブページのとき
			   $parent=$post->post_parent;
			} else { //トップページのとき
			   $parent=$post->ID;
			}
			$ul_top_title = get_the_title($parent);
			$ul_top_url = get_permalink($parent);
			if(wp_list_pages("title_li=&child_of=$parent&echo=0" )):
			?>
			<div id="contentmenu">
			<ul>
			<li id="sidebartop"><a href="<?php echo $ul_top_url; ?>"> <?php echo $ul_top_title; ?> </a> </li>
			<?php
			$children = wp_list_pages('title_li=&sort_column=menu_order&child_of='.$parent.'&echo=0');
			echo $children;
			?>
			</ul>
			</div>
			<!-- 子ページ一覧表示ここまで -->
			<?php endif; ?>




			<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

				<aside id="archives" class="widget">
					<h3 class="widget-title"><?php _e( 'Archives', 'twentyeleven' ); ?></h3>
					<ul>
						<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
					</ul>
				</aside>

				<aside id="meta" class="widget">
					<h class="widget-title"><?php _e( 'Meta', 'twentyeleven' ); ?></h3>
					<ul>
						<?php wp_register(); ?>
						<li><?php wp_loginout(); ?></li>
						<?php wp_meta(); ?>
					</ul>
				</aside>

			<?php endif; // end sidebar widget area ?>


		</div><!-- #secondary .widget-area -->
<?php endif; ?>