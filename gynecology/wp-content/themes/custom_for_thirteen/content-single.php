<?php
/**
 * The template for displaying content in the single.php template
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Eleven 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>  class="content">
	<div class="entry-content">
		<h1 class="entry-title"><span><?php the_title(); ?></span></h1>
		<p class="post_date">更新：<?php the_time('m/d'); ?></p>
		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="clearfix">
			<!-- アイキャッチ表示 -->
			<div class="eye_catch"><?php the_post_thumbnail(array(250,250)); ?></div>
			<?php if(in_category( '10qa' )) : //10問10答またはメンバー紹介のときは写真の右側にステータス表示 ?>
				<span>氏名：<?php echo post_custom('名前'); ?></span><br />
				<span>入社：<?php echo post_custom('入社'); ?></span><br />
				<span>所属：<?php echo post_custom('所属'); ?></span><br />
				<div style="clear:both;">
					<div class="q10_q"><?php echo nl2br(post_custom('質問1')); ?></div>
					<div class="q10_a"><?php echo nl2br(post_custom('回答1')); ?></div>
					<div class="q10_q"><?php echo nl2br(post_custom('質問2')); ?></div>
					<div class="q10_a"><?php echo nl2br(post_custom('回答2')); ?></div>
					<div class="q10_q"><?php echo nl2br(post_custom('質問3')); ?></div>
					<div class="q10_a"><?php echo nl2br(post_custom('回答3')); ?></div>
					<div class="q10_q"><?php echo nl2br(post_custom('質問4')); ?></div>
					<div class="q10_a"><?php echo nl2br(post_custom('回答4')); ?></div>
					<div class="q10_q"><?php echo nl2br(post_custom('質問5')); ?></div>
					<div class="q10_a"><?php echo nl2br(post_custom('回答5')); ?></div>
					<div class="q10_q"><?php echo nl2br(post_custom('質問6')); ?></div>
					<div class="q10_a"><?php echo nl2br(post_custom('回答6')); ?></div>
					<div class="q10_q"><?php echo nl2br(post_custom('質問7')); ?></div>
					<div class="q10_a"><?php echo nl2br(post_custom('回答7')); ?></div>
					<div class="q10_q"><?php echo nl2br(post_custom('質問8')); ?></div>
					<div class="q10_a"><?php echo nl2br(post_custom('回答8')); ?></div>
					<div class="q10_q"><?php echo nl2br(post_custom('質問9')); ?></div>
					<div class="q10_a"><?php echo nl2br(post_custom('回答9')); ?></div>
					<div class="q10_q"><?php echo nl2br(post_custom('質問10')); ?></div>
					<div class="q10_a"><?php echo nl2br(post_custom('回答10')); ?></div>
				</div>
			<?php endif; ?>
			
		</div><!-- .entry-meta -->
		<?php endif; ?>

		<?php the_content(); ?>
		
		<?php if(in_category( 'info_recruit' )) : //採用のときはカスタムフィールド表組みに ?>
			<table class="th_left">
				<tr><th>業務内容</th><td><?php echo nl2br(post_custom('業務内容')); ?></td></tr>
				<tr><th>応募資格</th><td><?php echo nl2br(post_custom('応募資格')); ?></td></tr>
				<tr><th>雇用形態</th><td><?php echo post_custom('雇用形態'); ?></td></tr>
				<tr><th>募集職種</th><td><?php echo post_custom('募集職種'); ?></td></tr>
				<tr><th>勤務地</th><td><?php 
				$place = get_post_meta($post->ID,'勤務地',FALSE); // $place に キー「担当」のメタデータ配列を格納
				if($place != ""){ // メタデータ配列が空でない場合
				echo implode(",", $place); // カンマで連結して文字列表示　implode("区切り文字",配列)
				}
				 ?></td></tr>
				<tr><th>勤務地詳細</th><td><?php echo nl2br(post_custom('勤務地詳細')); ?></td></tr>
				<tr><th>勤務時間</th><td><?php echo post_custom('勤務時間'); ?></td></tr>
				<tr><th>勤務形態</th><td><?php echo post_custom('勤務形態'); ?></td></tr>
				<tr><th>想定年収</th><td><?php echo post_custom('想定年収'); ?></td></tr>
				<tr><th>休日</th><td><?php echo nl2br(post_custom('休日')); ?></td></tr>
				<tr><th>待遇・福利厚生</th><td><?php echo nl2br(post_custom('待遇・福利厚生')); ?></td></tr>
				<tr><th>給与形態</th><td><?php echo post_custom('給与形態'); ?></td></tr>
				<tr><th>給与備考</th><td><?php echo nl2br(post_custom('給与備考')); ?></td></tr>
			</table>
		<?php endif; ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'twentythirteen' ) . '</span>', 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->

		<?php
			if(in_category( 'recipe_blog')){
				//レシピのときは前のページに戻るを表示
				echo '<div style="margin: 20px auto;text-align:center; width:100%;"><a href="http://www.gliongroup-recruit.jp/" style="font-weight:bold;font-size:1.5em">前のページへ戻る</a></div>';

			}else{

				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'twentythirteen' ) );

				/* translators: used between list items, there is a space after the comma */
				$tag_list = get_the_tag_list( '', __( ', ', 'twentythirteen' ) );

				printf(
					"カテゴリー：" . $categories_list,
					"タグ：" . $tag_list
				);

			}

		?>

</article><!-- #post-<?php the_ID(); ?> -->
