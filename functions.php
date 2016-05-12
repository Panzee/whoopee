<?php

add_action( 'after_setup_theme', 'parent_theme_setup', 99999 );
function parent_theme_setup() {
	if ( !class_exists( 'fc' ) ) {
		class fc extends _baseFunctions {
			public function __construct() {
				parent::__construct();
			}
		}
	}
	// 実行
	$fc = new fc();
}

class _baseFunctions {

	// フィード配信する投稿タイプを指定
	public $feed_posts = array( 'post' );

	public function __construct() {

		add_theme_support( 'custom-header', array(
			'width'				=> 1152,
			'height'			=> 300,
			'flex-width' => false,
			'flex-height' => true,	
		) );
		add_theme_support( 'custom-background' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
		add_theme_support( 'custom-logo', array(
			'width'		=> 320,
			'height'	=> 50,
		) );
		
		$this->register_nav_menus();
		
		add_action( 'init'								, array( $this, 'register_post_type_and_taxonomy' ) );
		add_action( 'widgets_init'				, array( $this, 'register_sidebar' ) );
		add_action( 'wp_enqueue_scripts'	, array( $this, 'wp_enqueue_scripts' ) );
	}
	
	/**
	 * Register menus
	 */
	protected function register_nav_menus() {
		register_nav_menus( array(
			'utility'	=> 'ユーティリティナビ',
			'global'	=> 'グローバルナビ',
			'footer'	=> 'フッターナビ',
		) );
	}
	
	/**
	 * Register widget areas
	 */
	public function register_sidebar() {
		register_sidebar( array(
			'id'						=> 'sidebar',
			'before_widget'	=> '<aside id="%1$s">',
			'after_widget'	=> '</aside>',
			'before_title'	=> '<h3>',
			'after_title'		=> '</h3>',
		) );
		
		register_sidebar( array(
			'id'						=> 'footer-1',
			'name'          => 'フッター 1',
			'before_widget'	=> '<div id="%1$s">',
			'after_widget'	=> '</div>',
			'before_title'	=> '<h3>',
			'after_title'		=> '</h3>',
		) );
		register_sidebar( array(
			'id'						=> 'footer-2',
			'name'          => 'フッター 2',
			'before_widget'	=> '<div id="%1$s">',
			'after_widget'	=> '</div>',
			'before_title'	=> '<h3>',
			'after_title'		=> '</h3>',
		) );
		register_sidebar( array(
			'id'						=> 'footer-3',
			'name'          => 'フッター 3',
			'before_widget'	=> '<div id="%1$s">',
			'after_widget'	=> '</div>',
			'before_title'	=> '<h3>',
			'after_title'		=> '</h3>',
		) );
	}
	
	/**
	 * Register post type
	 */
	public function register_post_type_and_taxonomy() {
		register_post_type( 'news2', array(
			'labels' => array(
				'name' 					=> 'news',
				'add_new_item'	=> 'newsを追加',
				'edit_item'			=> 'newsの編集',
			),
			'public' => true,
			'hierarchical' => false,
			'has_archive' => true,
			'supports' => array(
				'title',
				'editor',
				'custom-fields',
				'thumbnail',
			),
			'menu_position' => 5,
		) );
	}
	
	/**
	 * Load the CSS and JS
	 */
	public function wp_enqueue_scripts() {
		wp_enqueue_script(
			'menu.js',
			get_template_directory_uri() . '/js/menu.js',
			array( 'jquery' ),
			'1.0.0',
			true
		);
		
		wp_enqueue_style(
			'font-awesome',
			'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css',
			array(),
			'4.6.1'
		);
// 		wp_enqueue_style(
// 			'sass-basis',
// 			get_template_directory_uri() . '/basis/basis.min.css',
// 			array(),
// 			'4.2.7'
// 		);
		wp_enqueue_style(
			get_template(),
			get_template_directory_uri() . '/sass/style.css',
			array( /*'sass-basis'*/ ),
			'1.0.0'
		);
		//wp_deregister_style( 'open-sans-css' );
		//wp_register_style( 'open-sans', false );
	}
}