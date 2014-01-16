<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<link rel="shortcut icon" href="/common/img/favicon.ico">
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="stylesheet" href="/common/css/normalize.css" media="screen, print">
<link rel="stylesheet" href="/common/css/base.css" media="screen, print">
<link rel="stylesheet" href="/common/css/forsmartphone.css" media="screen, print">

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<!-- 郵便番号変更 -->
<script src="//ajaxzip3.googlecode.com/svn/trunk/ajaxzip3/ajaxzip3.js" charset="UTF-8"></script>
<script type="text/javascript">
//<![CDATA[
jQuery(function(){
AjaxZip3.JSONDATA="http://ajaxzip3.googlecode.com/svn/trunk/ajaxzip3/zipdata";
jQuery('#postcode').keyup(function(event){
AjaxZip3.zip2addr(this,'','your-pref','your-city');
})
})
//]]>
</script>

<!-- スマートフォン　アドレスバー非表示 -->
<script type="text/javascript">
window.onload = function(){
     setTimeout("scrollTo(0,1)", 100);
}
</script>

<!--[if lt IE 7]>
<script href="/common/js/IE7.js"></script>
<![endif]-->




</head>

<body <?php body_class(); ?>>
<script type="text/javascript">
//backToTopがクリックされたら上に戻る
jQuery(function($){
	$('#backToTop a').click(function() {
		$('body,html').animate(
			{scrollTop:0}, 400);
		return false;
	});	
});
</script>


<div id="page" class="hfeed">
	<header role="banner" id="header">
			<hgroup id="branding">
				<div id="logo">
					<h1 id="site-title"><span><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="/common/img/logo.png" width="331" height="100" title="<?php bloginfo('name'); ?>" alt="<?php bloginfo('name'); ?>"></a></span></h1>
				</div>
                <div id="personalarea" class="header_info">
					<ul>
						<li><a href="#" title="お問い合わせ"><img src="/common/img/btn_header_contact.png" width="160" height="30" alt="お問い合わせ" /></a></li>
						<li><a href="#" title="お問い合わせ"><img src="/common/img/btn_header_yoyaku.png" width="160" height="30" alt="ご予約" /></a></li>
						<a href=""><img src="/common/img/btn_header_map.png" width="45" height="24" class="access" alt="アクセス" /></a>
					</ul>
                </div>
			</hgroup>
			<nav id="grobalnav">
				<ul>
				<li><a href="<?php bloginfo('url'); ?>"><img src="/common/img/gynecology/nav_home.png" alt="HOME"></a></li>
				<li><a href="<?php bloginfo('url'); ?>/examination/"><img src="/common/img/gynecology/nav_examination.png" alt="婦人科の診察・検査"></a></li>
				<li><a href="<?php bloginfo('url'); ?>/pill/"><img src="/common/img/gynecology/nav_pill.png" alt="ピル外来"></a></li>
				<li><a href="<?php bloginfo('url'); ?>/policy/"><img src="/common/img/gynecology/nav_policy.png" alt="医師・診療方針・English"></a></li>
				<li><a href="<?php bloginfo('url'); ?>/access/"><img src="/common/img/gynecology/nav_access.png" alt="アクセス"></a></li>
				<li><a href="<?php bloginfo('url'); ?>/contact/"><img src="/common/img/gynecology/nav_contact.png" alt="お問い合わせ"></a></li>
				</ul>
			</nav>
		    <!-- スマートフォン用ナビゲーション -->
		    <ul id="spnav">
				<li><a href="<?php bloginfo('url'); ?>">HOME</a></li>
				<li><a href="<?php bloginfo('url'); ?>/examination/" class="policy">婦人科<br />診察・検査</a></li>
				<li><a href="<?php bloginfo('url'); ?>/pill/">ピル外来</a></li>
				<li><a href="<?php bloginfo('url'); ?>/policy/" class="policy">医師・診療方針<br />English</a></li>
				<li><a href="<?php bloginfo('url'); ?>/access/">アクセス</a></li>
				<li><a href="<?php bloginfo('url'); ?>/contact/">お問い合わせ</a></li>
			</ul>


	</header><!-- #branding -->
	<div id="main">
    