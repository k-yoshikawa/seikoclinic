<?php
//サイトナビゲーション
register_nav_menus(array('head' => 'ヘッダーナビ' ));
register_nav_menus(array('footer' => 'フッターナビ' ));
register_nav_menus(array('footerm1' => 'フッターマップ1' ));
register_nav_menus(array('footerm2' => 'フッターマップ2' ));
register_nav_menus(array('footerm3' => 'フッターマップ3' ));
register_nav_menus(array('footerm4' => 'フッターマップ4' ));


// ログイン時のロゴ変更
function custom_login_logo() {
 echo '<style type="text/css">h1 a { background: url('.get_bloginfo('template_directory').'/images/logo-login.png) 50% 50% no-repeat !important; }</style>';
 }
add_action('login_head', 'custom_login_logo');

// バージョン更新を非表示にする
add_filter('pre_site_transient_update_core', '__return_zero');
// APIによるバージョンチェックの通信をさせない
remove_action('wp_version_check', 'wp_version_check');
remove_action('admin_init', '_maybe_update_core');

// フッターWordPressリンクを非表示に
function custom_admin_footer() {
 echo '<a href="mailto:info@i-directory.jp">システムに関するお問い合わせはディレクトリーまで</a>';
 }
add_filter('admin_footer_text', 'custom_admin_footer');

// 管理バーの項目を非表示
function remove_admin_bar_menu( $wp_admin_bar ) {
 $wp_admin_bar->remove_menu( 'wp-logo' ); // WordPressシンボルマーク
 $wp_admin_bar->remove_menu('my-account'); // マイアカウント
 }
add_action( 'admin_bar_menu', 'remove_admin_bar_menu', 70 );

// 管理バーのヘルプメニューを非表示にする
function my_admin_head(){
 echo '<style type="text/css">#contextual-help-link-wrap{display:none;}</style>';
 }
add_action('admin_head', 'my_admin_head');

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

// ダッシュボードウィジェット非表示
function example_remove_dashboard_widgets() {
 // if (!current_user_can('level_10')) { //level10以下のユーザーの場合ウィジェットをunsetする
 global $wp_meta_boxes;
 unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']); // 現在の状況
 unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']); // 最近のコメント
 unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']); // 被リンク
 unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']); // プラグイン
 unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']); // クイック投稿
 unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']); // 最近の下書き
 unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']); // WordPressブログ
 unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']); // WordPressフォーラム
 // }
 }
add_action('wp_dashboard_setup', 'example_remove_dashboard_widgets');

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

?>