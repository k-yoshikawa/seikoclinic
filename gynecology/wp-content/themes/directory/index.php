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
 * @subpackage Twenty_Eleven
 */

get_header(); ?>

		<!-- メインビジュアル -->

		<script href="/common/js/jquery.cycle.all.js"></script>
		<script>
		<!--
		jQuery( function() {
			jQuery( '#jquery-cycle' ) .cycle({
				fx: 'fade',
				speed: 3000,
				timeout: 2000,
			});
		} );
		// -->
		</script>
		<div id="jquery-cycle">
			<?php query_posts('showposts=5&cat=9'); ?>
			<?php if(have_posts()): ?>
			<?php while(have_posts()): the_post(); ?>
			<a href="<?php echo get_post_meta($post->ID, 'url', true); ?>"><?php the_post_thumbnail(); ?></a>
			<?php endwhile; ?>
			<?php endif; ?>
			<img src="/common/img/gynecology/main_visual.png" />
		</div>


		<div id="primary">
            <div id="maincontent">
                <div class="consultation zone">
					<h3>診療時間</h3>
					<div class="zone_content">
						<table>
							<tr class="first_line">
								<th></th>
								<th>月</th>
								<th>火</th>
								<th>水</th>
								<th>木</th>
								<th>金</th>
								<th>土</th>
								<th>日</th>
							</tr>
							<tr>
								<th>午前<br />10:30~12:00</th>
								<td>○</td>
								<td>×</td>
								<td>○</td>
								<td>○</td>
								<td>×</td>
								<td>○</td>
								<td>○</td>
							</tr>
							<tr>
								<th>午後<br />1:30~7:00</th>
								<td>○</td>
								<td>×</td>
								<td>○</td>
								<td>○</td>
								<td>×</td>
								<td>○</td>
								<td>○</td>
							</tr>
						</table>
						<p class="attention">※午後7時まで診療の受付を行っております。<br />
						※予約制ではありません。来院された順の診療となります。<br />
						※お付添いであっても男性の院内への入室はご遠慮いただいております。<br />
						&nbsp;&nbsp;当クリニックは、女性が受診しやすい環境づくりに努めております。<br />
						&nbsp;&nbsp;ご理解、ご協力を賜りますようお願い致します。</p>
					</div>
				</div>
				<div class="news_zone zone">
					<h3>新着情報</h3>
					<div class="zone_content">
						<dl class="newsfeed_day">
						<?php query_posts('showposts=10&cat=-9,-12'); ?>
						<?php if(have_posts()): ?>
						<?php while(have_posts()): the_post(); ?>
						 <!-- <dt style="float:left;width:40%;text-align:center;font-weight:normal;text-shadow:none;line-height: 1.6em;"><a href="<?php the_permalink(); ?>"><?php the_time('Y/m/d'); ?></a></dt> -->
						 <dt class="newsfeed_dt"><a href="<?php the_permalink(); ?>"><?php the_time('Y年m月d日'); ?></a></dt>
						 <dd class="newsfeed_dd"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></dd>
						<?php endwhile; ?>
						<?php endif; ?>
						</dl>
					</div>
				</div>
                <div class="clear"></div>
            </div>
			<p class="btn_pageTop"><a href="#"><img src="/common/img/gynecology/btn_pagetop.png" width="101" height="25" /></a></p>

		</div><!-- #primary -->

        <div id="secondary">
			<div class="zone">
				<h3>取り扱いピルについて</h3>
				<div class="zone_content">
					<a href="#"><img src="/common/img/gynecology/bn_emergency_pill.png" /></a>
					<a href="#"><img src="/common/img/gynecology/bn_lowdosage_pill.png" /></a>
					<a href="#"><img src="/common/img/gynecology/bn_physiological.png" /></a>

				</div>
			</div>
			<div class="zone btnmenu">
				<h3>婦人科の診察・検査</h3>
				<div class="zone_content">
					<a href=""><img src="/common/img/gynecology/btn_illness.png" alt="婦人科の病気"></a>
					<a href=""><img src="/common/img/gynecology/btn_venereal.png" alt="性病検査"></a>
					<a href=""><img src="/common/img/gynecology/btn_uterine-cancer.png" alt="子宮がん精密検査"></a>
					<a href=""><img src="/common/img/gynecology/btn_pregnancy.png" alt="妊娠検査"></a>
				</div>
			</div>
			<div class="zone access">
				<h3>アクセス</h3>
				<div class="zone_content">
				<iframe width="260" height="260" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.jp/maps?f=q&amp;source=s_q&amp;hl=ja&amp;geocode=&amp;q=%E5%A4%A7%E9%98%AA%E5%BA%9C%E5%A4%A7%E9%98%AA%E5%B8%82%E4%B8%AD%E5%A4%AE%E5%8C%BA%E9%9B%A3%E6%B3%A2%EF%BC%92%E4%B8%81%E7%9B%AE%EF%BC%93%E2%88%92%EF%BC%95+%E6%98%9F%E5%85%89%E3%82%AF%E3%83%AA%E3%83%8B%E3%83%83%E3%82%AF&amp;aq=0&amp;oq=%E6%98%9F%E5%85%89%E3%82%AF%E3%83%AA%E3%83%8B%E3%83%83%E3%82%AF&amp;sll=34.728949,138.455511&amp;sspn=61.734272,79.013672&amp;brcurrent=3,0x6000e712f7dfe92d:0x89a572f5ea6bb502,0&amp;ie=UTF8&amp;hq=%E6%98%9F%E5%85%89%E3%82%AF%E3%83%AA%E3%83%8B%E3%83%83%E3%82%AF&amp;hnear=%E5%A4%A7%E9%98%AA%E5%BA%9C%E5%A4%A7%E9%98%AA%E5%B8%82%E4%B8%AD%E5%A4%AE%E5%8C%BA%E9%9B%A3%E6%B3%A2%EF%BC%92%E4%B8%81%E7%9B%AE%EF%BC%93%E2%88%92%EF%BC%95&amp;ll=34.667494,135.499306&amp;spn=0.006295,0.006295&amp;t=m&amp;output=embed"></iframe><br /><small><a href="https://maps.google.co.jp/maps?f=q&amp;source=embed&amp;hl=ja&amp;geocode=&amp;q=%E5%A4%A7%E9%98%AA%E5%BA%9C%E5%A4%A7%E9%98%AA%E5%B8%82%E4%B8%AD%E5%A4%AE%E5%8C%BA%E9%9B%A3%E6%B3%A2%EF%BC%92%E4%B8%81%E7%9B%AE%EF%BC%93%E2%88%92%EF%BC%95+%E6%98%9F%E5%85%89%E3%82%AF%E3%83%AA%E3%83%8B%E3%83%83%E3%82%AF&amp;aq=0&amp;oq=%E6%98%9F%E5%85%89%E3%82%AF%E3%83%AA%E3%83%8B%E3%83%83%E3%82%AF&amp;sll=34.728949,138.455511&amp;sspn=61.734272,79.013672&amp;brcurrent=3,0x6000e712f7dfe92d:0x89a572f5ea6bb502,0&amp;ie=UTF8&amp;hq=%E6%98%9F%E5%85%89%E3%82%AF%E3%83%AA%E3%83%8B%E3%83%83%E3%82%AF&amp;hnear=%E5%A4%A7%E9%98%AA%E5%BA%9C%E5%A4%A7%E9%98%AA%E5%B8%82%E4%B8%AD%E5%A4%AE%E5%8C%BA%E9%9B%A3%E6%B3%A2%EF%BC%92%E4%B8%81%E7%9B%AE%EF%BC%93%E2%88%92%EF%BC%95&amp;ll=34.667494,135.499306&amp;spn=0.006295,0.006295&amp;t=m" style="color:#0000FF;text-align:left">大きな地図で見る</a></small>
				<p class="attention">住所:大阪市中央区なんば2-3-5<br />&nbsp;&nbsp;&nbsp;&nbsp;ティックランドビル 4F</p>
				<p class="attention">（地下鉄なんば駅24号出口を出て右へ30m）</p>
				</div>
			</div>
        </div><!-- #secondary -->
		<div class="clear"></div>

<?php get_footer(); ?>