<?php
/**
 * Plugin Name: マイプラグイン
 * Version: 1.0
 * Description: 私のぷらぐいん
 * Author: K2O
 * 
 */

add_shortcode('date', function() {
    return date('Y年 n月 j日 H:i:s');
});

add_shortcode('sum', function($atts) {
    $atts = shortcode_atts([
        'x' => 0,
        'y' => 0,
    ], $atts, 'sum');
    return intval($atts['x']) + intval($atts['y']);
});

add_action('init', function () {
    register_post_type(
        'item',
        [
            'label' => '商品', // メニューに表示
            'public' => true,
            'menu_position' => 10,
            'menu_icon' => 'dashicons-store', // メニューアイコン
            // 'supports' => ['thumbnail', 'title', 'editor', 'page-attributes'],
            'supports' => ['thumbnail', 'title', 'editor', 'custom-fields'],
            'has_archive' => true, // 一覧
            // 'hierarchical' => true, // 階層構造を持つ
            'show_in_rest' => true, // 新エディタの対応
        ]
    );
    // item:アイテム、post:投稿、page:固定ページ
    register_taxonomy('genre', 'item', [
        'label' => '商品ジャンル', // メニューに表示
        'hierarchical' => true, // チェックボックス選択 falseの場合、フリーテキスト
        'show_in_rest' => true, // 新エディタの対応
    ]);

});

// アクションフックのお試し
// https://wpdocs.osdn.jp/%E3%83%97%E3%83%A9%E3%82%B0%E3%82%A4%E3%83%B3_API/%E3%82%A2%E3%82%AF%E3%82%B7%E3%83%A7%E3%83%B3%E3%83%95%E3%83%83%E3%82%AF%E4%B8%80%E8%A6%A7
// add_action('get_header', function() {
//     echo 'アクションフックget_header';
// });
// add_action('get_footer', function() {
//     echo 'アクションフックget_header';
// });

add_filter('the_title', function($title) {
    return '■' . $title;
});
