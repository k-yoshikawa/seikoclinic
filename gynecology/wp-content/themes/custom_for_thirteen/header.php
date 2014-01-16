<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Eleven 1.0
 */
?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?> xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml">
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?> xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml">
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?> xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml">
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml" />
<!--<![endif]-->
<head>
<!-- OGP -->
<?php
if (is_front_page()){
echo '<meta property="og:type" content="website" />';echo "\n";
} else {
echo '<meta property="og:type" content="article" />';echo "\n";
}
// descriptionをall in one seo と同一に(トップページはサイトのdescriptionに合わせる)
if (is_front_page()){
echo '<meta property="og:description" content="'; bloginfo('description'); echo '">'."\n";
}else{
echo '<meta property="og:description" content="'.get_post_meta($post->ID, _aioseop_description, true).'">'."\n";
}
?>
<meta property="og:url" content="<?php
if(is_front_page() ){/*トップページの場合はWPのルートURLを指定*/
echo bloginfo('url') . '/';
}else{/*トップページ以外はパーマリンクを指定*/
echo the_permalink();
}
?>" />
<meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
<?php
$str = $post->post_content;
$searchPattern = '/<img.*?src=(["\'])(.+?)\1.*?>/i';//投稿にイメージがあるか調べる
if (has_post_thumbnail() && ! is_archive() && ! is_front_page() && ! is_home()){//投稿にサムネイルがある場合の処理
     $image_id = get_post_thumbnail_id();
     $image = wp_get_attachment_image_src( $image_id, 'full');
     echo '<meta property="og:image" content="'.$image[0].'" />';echo "\n";
} else if ( preg_match( $searchPattern, $str, $imgurl ) && ! is_archive() && ! is_front_page() && ! is_home()) {//投稿にサムネイルは無いが画像がある場合の処理
     echo '<meta property="og:image" content="'.$imgurl[2].'" />';echo "\n";
} else {//投稿にサムネイルも画像も無い場合、もしくはアーカイブページの処理
     echo '<meta property="og:image" content="/sites/advancecreate.co.jp/themes/corporate/img/thumbnail.png" />'; echo "\n";
}
?>
<!-- ここまでOGP -->
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="Expires" content="86400">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
<link rel="shortcut icon" href="<?php bloginfo('url'); ?>/image/favicon.ico">
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentythirteen' ), max( $paged, $page ) );

	?></title>
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'url' ); ?>/css/base.css" />
<!--[if lt IE 9]>
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'url' ); ?>/css/ie8.css" />
<![endif]-->
<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'url' ); ?>/css/print.css" media="print">

<link rel="shortcut icon" type="image/vnd.microsoft.icon" href="/sites/advancecreate.co.jp/themes/corporate/favicon.ico">
<link rel="icon" type="image/vnd.microsoft.icon" href="/sites/advancecreate.co.jp/themes/corporate/favicon.ico">
<link rel="apple-touch-icon" href="/sites/advancecreate.co.jp/themes/corporate/apple-touch-icon.png">
<link rel="apple-touch-icon" href="/sites/advancecreate.co.jp/themes/corporate/apple-touch-icon-precomposed.png">

<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	//if ( is_singular() && get_option( 'thread_comments' ) )
	//	wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('url'); ?>/js/mobilemenu.js"></script>
<script type="text/javascript" src="<?php bloginfo('url'); ?>/js/rollover.js"></script>
<!--[if lt IE 8]>
<script src="//ie7-js.googlecode.com/svn/version/2.1(beta4)/IE8.js"></script>
<?php /* IEはWidth:autoを設定する
<style>
img{
width:auto !important;
}
</style>
*/
?>
<![endif]-->
<!--[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<script src="<?php bloginfo('url'); ?>/js/css3-mediaqueries.js"></script>
<![endif]-->


<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-46330800-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>


</head>

<body <?php body_class(); ?>>
	<div id="container">
		<div id="header" class="clearfix">
			<div class="header">
				<h1 class="logo"><a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('name'); ?>"><img src="<?php bloginfo('url')?>/image/logo.png" title="<?php bloginfo('name'); ?>" alt="<?php bloginfo('name'); ?>" width="346" height="46" /></a></h1>
				<div class="news">
					<?php /*<!-- <img src="image/news.png" height="16" width="109" title="News&amp;topics">
					<span>新着情報がここに入ります。</span> -->
					<!-- <span><a href="#">一覧</a></span> -->
					*/ ?>
				</div>
			</div>
			<nav>
				<ul class="pc_nav">
					<li class="nav_home"><a href="<?php bloginfo('url'); ?>/" title="HOME"><span class="hide">HOME</span></a></li>
					<li class="nav_interview"><a href="<?php bloginfo('url'); ?>/staff/" title="役員・社員紹介一覧"><span class="hide">役員・社員紹介一覧</span></a></li>
					<li class="nav_story"><a href="<?php bloginfo('url'); ?>/story/" title="創業物語"><span class="hide">創業物語</span></a></li>
					<li class="nav_teach"><a href="<?php bloginfo('url'); ?>/teach/" title="濱田の言葉"><span class="hide">濱田の言葉</span></a></li>
					<li class="nav_company"><a href="/company/profile" title="企業情報" target="_blank"><span class="hide">企業情報</span></a></li>
					<li class="nav_information"><a href="<?php bloginfo('url'); ?>/information/" title="募集要項"><span class="hide">募集要項</span></a></li>
					<li class="nav_entry"><a href="<?php bloginfo('url'); ?>/entry/" title="エントリー"><span class="hide">エントリー</span></a></li>
				</ul>
				<dl class="acordion">
					<h2><a href="<?php bloginfo('url'); ?>/" title="アドバンスクリエイト　バーチャル人事部"><img src="<?php bloginfo('url')?>/image/logo.png" title="<?php bloginfo('name'); ?>" alt="<?php bloginfo('name'); ?>" width="346" height="46" /></a></h2>
					<dt class="trigger"><span class="open-close"><img src="<?php bloginfo('url'); ?>/image/spnav_plus.png" style="min-width: 80px;width: 100%;"></span></dt>
					<dd class="acordion_tree">
						<ul>
							<li style="border-top: 1px solid #999;" ><a href="<?php bloginfo('url'); ?>/staff/" title="役員・社員紹介一覧">役員・社員紹介一覧</a></li>
							<li ><a href="<?php bloginfo('url'); ?>/story/" title="創業物語">創業物語</a></li>
							<li ><a href="<?php bloginfo('url'); ?>/teach/" title="濱田の言葉">濱田の言葉</a></li>
							<li ><a href="/company/profile" target="_blank" title="企業情報">企業情報</a></li>
							<li ><a href="<?php bloginfo('url'); ?>/information/" title="募集要項">募集要項</a></li>
							<li ><a href="<?php bloginfo('url'); ?>/entry/" title="エントリー">エントリー</a></li>
						</ul>
					</dd>
				</dl>
			</nav>
		</div><!-- / #header .clearfix -->
