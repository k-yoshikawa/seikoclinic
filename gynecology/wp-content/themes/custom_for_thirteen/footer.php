<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Eleven 1.0
 */
?>

    </article><!-- end .content -->

	<div id="footer" class="clearfix">
		<div class="footer_inner">
			<ul class="pc_footer_nav">
				<li><a href="<?php bloginfo('url'); ?>/" title="HOME"><img src="<?php bloginfo('url'); ?>/image/li_arrow.png" width="10" height="9" />HOME</a></li>
				<li><a href="http://www.hokende.com/" target="_blank" title="保険市場へ"><img src="<?php bloginfo('url'); ?>/image/li_arrow.png" width="10" height="9" />保険市場へ</a></li>
				<li><a href="/" title="アドバンスクリエイトポータルサイトへ" target="_blank"><img src="<?php bloginfo('url'); ?>/image/li_arrow.png" width="10" height="9" />ポータルサイトへ</a></li>
				<li class="pc_footer"><a href="/company/privacy" title="プライバシーポリシー" target="_blank"><img src="<?php bloginfo('url'); ?>/image/li_arrow.png" width="10" height="9" />プライバシーポリシー</a></li>
				<li class="pc_footer"><a href="<?php bloginfo('url'); ?>/sitemap/" title="サイトマップ"><img src="<?php bloginfo('url'); ?>/image/li_arrow.png" width="10" height="9" />サイトマップ</a></li>
			</ul>
            <ul class="sp_footer">
				<li><a href="/company/privacy" title="プライバシーポリシー" target="_blank"><img src="<?php bloginfo('url'); ?>/image/li_arrow.png" width="10" height="9" />プライバシーポリシー</a></li>
				<li><a href="<?php bloginfo('url'); ?>/sitemap/" title="サイトマップ"><img src="<?php bloginfo('url'); ?>/image/li_arrow.png" width="10" height="9" />サイトマップ</a></li>
			</ul>
			<span class="copyright">&copy; 2013 株式会社アドバンスクリエイト　バーチャル人事部</span>
		</div>
	</div><!-- end #footer -->
</div><!-- end #container -->
<?php wp_footer(); ?>
<?php if(is_front_page() ): /*トップページの額縁IE8のbackground-size対応*/ ?>
<!--[if lte IE 8]>
    <script type="text/javascript" src="/recruit/js/jquery.backgroundSize.js"></script>
    <script>
    jQuery(document).ready(function() {
        jQuery('div.gaku a').css({backgroundSize: "contain"});
    });
    </script>
	<script type="text/javascript" src="/recruit/js/common.js"></script>
<![endif]-->
<?php else: ?>
<!--[if lte IE 8]>
    <script type="text/javascript" src="/recruit/js/jquery.backgroundSize.js"></script>
    <script>
    jQuery(document).ready(function() {
        jQuery('.staff .list li a').css({backgroundSize: "contain"});
    });
    </script>
<![endif]-->
<?php endif; ?>
</body>
</html>
