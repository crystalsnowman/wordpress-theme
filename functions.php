<?php

// ウィジェット
// register_sidebar();

// カテゴリー件数をaタグ内に入れるためのもの
add_filter( 'wp_list_categories', 'my_list_categories', 10, 2 );
function my_list_categories( $output, $args ) {
  $output = preg_replace('/<\/a>\s*\((\d+)\)/',' ($1)</a>',$output);
  return $output;
}

// アーカイブ件数をaタグ内に入れるためのもの
add_filter( 'get_archives_link', 'my_archives_link' );
function my_archives_link( $output ) {
  $output = preg_replace('/<\/a>\s*(&nbsp;)\((\d+)\)/',' ($2)</a>',$output);
  return $output;
}

// RSSフィード
// add_theme_support( 'automatic-feed-links' );

// コメントフィード廃止用
remove_action('wp_head', 'feed_links_extra', 3);

// カスタムメニュー
register_nav_menu( 'header-navi',  'ヘッダのナビゲーション' );
register_nav_menu( 'sidebar-navi', 'サイドバーのナビゲーション' );
register_nav_menu( 'footer-navi',  'フッタのナビゲーション' );

// カスタムヘッダ
add_theme_support( 'custom-header', array (
	'width'  => 1500,
	'height' => 250,
	'flex-height' => true,
) );

// html5化
add_theme_support( 'html5', array(
	'comment-form', 'comment-list', 'gallery', 'caption',
) );

// パーマリンク変更可能
add_filter( 'got_rewrite', '__return_true' );

// カスタム背景
add_theme_support( 'custom-background' );

// 概要の文字数
function my_length($length) {
	return 110;
}
add_filter( 'excerpt_mblength', 'my_length' );

// 概要の省略記号
function my_more($more) {
	return '...';
}
add_filter( 'excerpt_more', 'my_more' );

// アイキャッチ画像
add_theme_support( 'post-thumbnails' );

// 絵文字無効化
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

// 管理画面では内蔵のjQuery,サイト側ではGoogle AJAX Libraries APIをロードする
function load_cdn() {
    if ( !is_admin() ) {
      wp_deregister_script('jquery'); // 同梱のJQueryを読み込ませない
      wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js', array(), NULL, true); //Google CDNのJQueryの登録
      wp_enqueue_script('jquery'); //登録したJQueryをフックさせる
    }
}
add_action('init', 'load_cdn'); 