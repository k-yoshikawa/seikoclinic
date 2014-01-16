<?php
//
//バージョン非表示
remove_action('wp_head', 'wp_generator');
//
//コメントフィード削除
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);
//
//リモート投稿URL削除
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
//
//前の文書、次の文書のhead内リンクを削除
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
//
//WordpressデフォルトURL削除
remove_action('wp_head', 'wp_shortlink_wp_head');
//
//デフォルトCSS削除
remove_action('wp_head', 'locale_stylesheet');
//
//子テーマのスタイル・スクリプト削除
remove_action( 'wp_enqueue_scripts', 'twentythirteen_scripts_styles',999 );
remove_action( 'after_setup_theme', 'twentythirteen_setup', 999 );
//
// ログイン時のロゴ変更
function custom_login_logo() {
 echo '<style type="text/css">h1 a { background: url('.bloginfo("url").'/image/logo.png) 50% 50% no-repeat !important; }</style>';
 }
add_action('login_head', 'custom_login_logo');
//
// フッターWordPressリンクを非表示に
function custom_admin_footer() {
 echo '<a href="mailto:info@i-directory.jp">システムに関するお問い合わせはディレクトリーまで</a>';
 }
add_filter('admin_footer_text', 'custom_admin_footer');
//
// 管理バーの項目を非表示
function remove_admin_bar_menu( $wp_admin_bar ) {
 $wp_admin_bar->remove_menu( 'wp-logo' ); // WordPressシンボルマーク
 $wp_admin_bar->remove_menu('my-account'); // マイアカウント
 }
add_action( 'admin_bar_menu', 'remove_admin_bar_menu', 70 );
//
// 管理バーのヘルプメニューを非表示にする
function my_admin_head(){
 echo '<style type="text/css">#contextual-help-link-wrap{display:none;}</style>';
 }
add_action('admin_head', 'my_admin_head');
//
// 管理バーにログアウトを追加
function add_new_item_in_admin_bar() {
 global $wp_admin_bar;
 $wp_admin_bar->add_menu(array(
 'id' => 'new_item_in_admin_bar',
 'title' => __('ログアウト'),
 'href' => wp_logout_url()
 ));
 }
add_action('wp_before_admin_bar_render', 'add_new_item_in_admin_bar');
//
// ダッシュボードウィジェット非表示
function example_remove_dashboard_widgets() {
 // if (!current_user_can('level_10')) { //level10以下のユーザーの場合ウィジェットをunsetする
 global $wp_meta_boxes;
 unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']); // 最近のコメント
 unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']); // 被リンク
 unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']); // プラグイン
 unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']); // クイック投稿
 unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']); // WordPressブログ
 unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']); // WordPressフォーラム
 // }
 }
add_action('wp_dashboard_setup', 'example_remove_dashboard_widgets');
//
// // メニューを非表示にする
// function remove_menus () {
//  // if (!current_user_can('level_10')) { //level10以下のユーザーの場合メニューをunsetする
//  remove_menu_page('wpcf7'); //Contact Form 7
//  global $menu;
//  unset($menu[2]); // ダッシュボード
//  unset($menu[4]); // メニューの線1
//  unset($menu[15]); // リンク
//  unset($menu[25]); // コメント
//  unset($menu[59]); // メニューの線2
//  unset($menu[60]); // テーマ
//  unset($menu[65]); // プラグイン
//  unset($menu[70]); // プロフィール
//  unset($menu[75]); // ツール
//  unset($menu[80]); // 設定
//  unset($menu[90]); // メニューの線3
//  // }
//  }
// add_action('admin_menu', 'remove_menus');
/**
 * TinyMCEの初期化配列を作成する
 * @param array $initArray
 * @return array
 */
function _my_tinymce($initArray) {
     //選択できるブロック要素を変更
     $initArray['theme_advanced_blockformats'] = 'p,h2,h3,h4,h5,dt,dd,div,pre';
	//iframeが消えるのを救う
	$initArray[ 'extended_valid_elements' ] .= "iframe[id|class|title|style|align|frameborder|height|longdesc|marginheight|marginwidth|name|scrolling|src|width]";
	//タグ名[属性|属性],タグ名[属性|属性],タグ名[属性|属性]...

     return $initArray;
}
//TMAより後に実行されるように、10000番ぐらいにフック登録
add_filter('tiny_mce_before_init', '_my_tinymce', 10000);
//
//投稿の最初の画像を取得する
function catch_that_image() {
    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $first_img = $matches [1] [0];
 
    if(empty($first_img)){ //画像がない場合のダミー画像
        $first_img = "/images/default.jpg";
    }
return $first_img;
}
//
//
//　Pタグ、BRタグの自動挿入機能を無効に
remove_filter('the_content', 'wpautop');
//
// ビジュアルエディターのスタイルをフロントと同一に
function my_theme_add_editor_styles() {
    add_editor_style( 'base.css' );
}
add_action( 'init', 'my_theme_add_editor_styles' );
//
//対人サイトマップ
function simple_sitemap(){
	global $wpdb;
	$args = array('depth'        => 0,
		'show_date'    => NULL,
		'date_format'  => get_option('date_format'),
		'child_of'     => 0,
		'exclude'      => NULL,
		'include'      => NULL,
		'title_li'           => '<span class="subheader">一覧</span>',
		'echo'         => 1,
		'authors'      => NULL,
		'sort_column'  => 'menu_order, post_title',
		'link_before'  => NULL,
		'link_after'   => NULL,
		'exclude_tree' => NULL ); 

	echo '<div id="sitemap"><ul>';
		echo '<li><a href="../">コーポレートトップページ</a></li>';
		echo '<ul>',
		'<li><a href="../company/privacy">プライバシーポリシー</a></li>',
		'</ul>';
		echo '<li>関連サイト</li>';
		echo '<ul>',
		'<li><a href="https://www.facebook.com/advancecreate.recruit" target="_blank">アドバンスクリエイト公式Facebookページ</a></li>',
		'<li><a href="http://www.hokende.com/static/life/features/20130818/" target="_blank">鉄拳「約束」パラパラ漫画 オリジナルバージョン</a></li>',
		'</ul>';

		wp_list_pages($args);
	echo '</ul>';
//対人マップ設定ここまで
	$args = array('show_option_all'    => NULL,
		'orderby'            => 'name',
		'order'              => 'ASC',
		'show_last_update'   => 0,
		'style'              => 'list',
		'show_count'         => 0,
		'hide_empty'         => 1,
		'use_desc_for_title' => 1,
		'child_of'           => 0,
		'feed'               => NULL,
		'feed_type'          => NULL,
		'feed_image'         => NULL,
		'exclude'            => NULL,
		'exclude_tree'       => NULL,
		'include'            => NULL,
		'hierarchical'       => true,
		'title_li'           => '<span class="subheader">カテゴリ</span>',
		'number'             => NULL,
		'echo'               => 1,
		'depth'              => 0,
		'current_category'   => 0,
		'pad_counts'         => 0,
		'taxonomy'           => 'category',
		'walker'             => 'Walker_Category' );

        echo '<ul>';
	   echo wp_list_categories( $args );
	   echo '</ul>';

	echo '</div>';
}
add_shortcode('sitemap', 'simple_sitemap');
//
//相対パスに書き換える関数
//
class relative_URI {
    public function __construct() {
        add_action('get_header', array(&$this, 'get_header'), 1);
        add_action('wp_footer', array(&$this, 'wp_footer'), 99999);
    }
    protected function replace_relative_URI($content) {
        $home_url = trailingslashit(get_home_url('/'));
        $top_url = preg_replace( '/^(https?:\/\/.+?)\/(.*)$/', '$1', $home_url );
        return str_replace( $top_url, '', $content );
    }
    public function get_header(){
        ob_start(array(&$this, 'replace_relative_URI'));
    }
    public function wp_footer(){
        ob_end_flush();
    }
}
$relative_URI = new relative_URI();
?>