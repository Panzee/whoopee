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
			'before_widget'	=> '<section class="p-widget %2$s">',
			'after_widget'	=> '</section>',
			'before_title'	=> '<h1 class="p-widget__title">',
			'after_title'		=> '</h1>',
		) );
		
		register_sidebar( array(
			'id'						=> 'footer-1',
			'name'          => 'フッター 1',
			'before_widget'	=> '<section class="p-widget %2$s">',
			'after_widget'	=> '</section>',
			'before_title'	=> '<h1 class="p-widget__title">',
			'after_title'		=> '</h1>',
		) );
		register_sidebar( array(
			'id'						=> 'footer-2',
			'name'          => 'フッター 2',
			'before_widget'	=> '<section class="p-widget %2$s">',
			'after_widget'	=> '</section>',
			'before_title'	=> '<h1 class="p-widget__title">',
			'after_title'		=> '</h1>',
		) );
		register_sidebar( array(
			'id'						=> 'footer-3',
			'name'          => 'フッター 3',
			'before_widget'	=> '<section class="p-widget %2$s">',
			'after_widget'	=> '</section>',
			'before_title'	=> '<h1 class="p-widget__title">',
			'after_title'		=> '</h1>',
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
		wp_enqueue_style(
			'sass-basis',
			get_template_directory_uri() . '/basis/basis.min.css',
			array(),
			'4.2.7'
		);
		wp_enqueue_style(
			get_template(),
			get_template_directory_uri() . '/sass/style.css',
			array( 'sass-basis' ),
			'1.0.0'
		);
		//wp_deregister_style( 'open-sans-css' );
		//wp_register_style( 'open-sans', false );
	}
}

// タグクラウドのstyle属性を削除
add_filter( 'wp_tag_cloud', 'remove_tag_cloud_style');
function remove_tag_cloud_style( $return, $args ) {
	$return = preg_replace('/\sstyle=\'.+\'/', '', $return);
	return $return;
}

// オリジナルカスタマイザー
$whoopee_customize = new Whoopee_Customize();
class Whoopee_Customize {
	
	public function __construct() {
		add_action( 'customize_register', array( $this, 'register' ) );
		add_action( 'customize_preview_init', array( $this, 'live_preview' ) );
		add_action( 'wp_head', array( $this, 'header_output' ) );
	}
	
	public function register ( $wp_customize ) {
		
		// レイアウト
		$wp_customize->add_section( 'whoopee-layout', array(
			'title'				=> __( 'Layout', 'whoopee-layout' ),
			'priority'		=> 10,
		));
		$wp_customize->add_setting( 's-whoopee-layout-contents', array(
				'default'  => 'column-2-right',
				'transport'=>'postMessage',
		));
		$wp_customize->add_control( 'c-whoopee-layout-contents', array(
				'section'		=> 'whoopee-layout',
				'settings'	=> 's-whoopee-layout-contents',
				'label'			=> 'メインコンテンツ',
				'type'			=> 'radio',
				'choices'    => array(
						'column-1' => '1カラム',
						'column-2-left' => '2カラム（サイドメニュー左）',
						'column-2-right' => '2カラム（サイドメニュー右）',
						//'column-3' => '3カラム',
				),
				'priority'	=> 10,
		));
		
		// ヘッダー
		$wp_customize->add_setting( 's-whoopee-layout-header', array(
				'default'  => 'default',
				'transport'=>'postMessage',
		));
		$wp_customize->add_control( 'c-whoopee-layout-header', array(
				'section'		=> 'whoopee-layout',
				'settings'	=> 's-whoopee-layout-header',
				'label'			=> __( 'Header', 'whoopee-layout' ),
				'type'			=> 'radio',
				'choices'   => array(
						'default' 			=> '設定なし',
						'hedaer-fixed'	=> 'ヘッダー固定',
						//'no-radio-menu' => 'ハンバーガーメニューにしない（スマホ時）',
				),
				'priority'	=> 20,
		));
		
		/* header-image */
		$wp_customize->add_setting( 's-whoopee-header-image', array(
				'default'  => 'hedaer-image',
				'transport'=>'postMessage',
		));
		$wp_customize->add_control( 'c-whoopee-header-image', array(
				'section'		=> 'header_image',
				'settings'	=> 's-whoopee-header-image',
				'label'			=> 'ヘッダー画像',
				'type'			=> 'radio',
				'choices'   => array(
						'hedaer-image' => '通常ヘッダー',
						'hero-image'	 => 'ヒーローイメージ',
				),
				'priority'	=> 5,
		));
		$wp_customize->add_setting( 's-whoopee-header-hero', array(
				'default'  => 'default',
				'transport'=>'postMessage',
		));
		$wp_customize->add_control( 'c-whoopee-header-hero', array(
				'section'		=> 'header_image',
				'settings'	=> 's-whoopee-header-hero',
				'label'			=> 'ヒーローイメージURL',
				'type'			=> 'url',
				'priority'	=> 35,
		));
		
		/* colors */
		$wp_customize -> remove_setting( 'header_textcolor' );
		$wp_customize -> remove_control( 'header_textcolor' );
		
		$wp_customize->add_setting( 's-whoopee-header-color', array(
				'default'  => '',
				'transport'=>'postMessage',
		));
		$wp_customize->add_control( 'c-whoopee-header-color', array(
				'section'			=> 'colors',
				'settings'		=> 's-whoopee-header-color',
				'label'				=> 'ヘッダー色',
				'type'				=> 'color',
				'priority'		=> 50,
		));
		$wp_customize->add_setting( 's-whoopee-footer-color', array(
				'default'  => '',
				'transport'=>'postMessage',
		));
		$wp_customize->add_control( 'c-whoopee-footer-color', array(
				'section'			=> 'colors',
				'settings'		=> 's-whoopee-footer-color',
				'label'				=> 'フッター色',
				'type'				=> 'color',
				'priority'		=> 60,
		));
		$wp_customize->add_setting( 's-whoopee-heading-color', array(
				'default'  => '',
				'transport'=>'postMessage',
		));
		$wp_customize->add_control( 'c-whoopee-heading-color', array(
				'section'			=> 'colors',
				'settings'		=> 's-whoopee-heading-color',
				'label'				=> '見出し色',
				'type'				=> 'color',
				'priority'		=> 70,
		));
	}
	
	public function header_output() {
  	echo '<style type="text/css">';
	    echo self::get_layout_main_css();
	    echo self::get_layout_header_css();
	    echo self::get_layout_header_color_css();
	    echo self::get_layout_footer_color_css();
  	echo '</style>'; 
	}

	public function live_preview() {
		wp_enqueue_script(
			'theme-customizer.js',
			get_template_directory_uri() . '/js/theme-customizer.js',
			array( 'jquery', 'customize-preview' ),
			'1.0.0',
			true
		);
	}
	
	// LayoutのメインコンテンツのCSS取得
	public function get_layout_main_css() {
	
		// レイアウト
		switch ( get_theme_mod( 's-whoopee-layout-contents' ) ) {
			case 'column-1':
				$main_width = '100%';
				$side_width = '100%';
				break;
			case 'column-2-left':
				$flex_direction = 'row-reverse';
				$main_width = '66.66667%';
				$side_width = '33.33333%';
				break;
			case 'column-2-right':
				$flex_direction = 'row';
				$main_width = '66.66667%';
				$side_width = '33.33333%';
				break;
			default:
				$flex_direction = 'row';
				$main_width = '66.66667%';
				$side_width = '33.33333%';
				break;
		}
		// flex-direction
		$css = '';
		$css .= '.is-contents-layout{';
		$css .= '-webkit-flex-direction:' . $flex_direction . ';';
		$css .= '-ms-flex-direction:' . $flex_direction . ';';
		$css .= 'flex-direction:' . $flex_direction . ';';
		$css .= '}';
		// row--md--3
		$css .= '@media (min-width: 64em){';
		$css .= '.is-main-row{';
		$css .= '-webkit-flex: 1;';
		$css .= '-ms-flex: 1;';
		$css .= '-webkit-flex: 0 1 ' . $main_width . ';';
		$css .= 'flex: 0 1 ' . $main_width . ';';
		$css .= 'max-width: 100%;';
		$css .= '}';
	
		$css .= '.is-side-row{';
		$css .= '-webkit-flex: 1;';
		$css .= '-ms-flex: 1;';
		$css .= '-webkit-flex: 0 1 ' . $side_width . ';';
		$css .= 'flex: 0 1 ' . $side_width . ';';
		$css .= 'max-width: 100%;';
		$css .= '}';
		$css .= '}';
	
		return $css;
	}
	
	// LayoutのヘッダーコンテンツのCSS取得
	public function get_layout_header_css() {
		// レイアウト
		switch ( get_theme_mod( 's-whoopee-layout-header' ) ) {
			case 'default':
				$position = 'absolute';
				break;
			case 'hedaer-fixed':
				$position = 'fixed';
				break;
			case 'no-radio-menu':
				break;
			default:
				$position = 'absolute';
				break;
		}
		$css = '';
		$css .= '.is-site-header{';
		$css .= 'position:' . $position . ';';
		$css .= 'top:0;';
		$css .= 'left:0;';
		$css .= 'right:0;';
		$css .= 'box-shadow:0 .01rem .3rem .1rem #aaa;';
		$css .= '}';
		
		return $css;
	}
	
	// LayoutのヘッダーコンテンツのCSS取得
	public function get_layout_header_color_css() {
		$hex = get_theme_mod( 's-whoopee-header-color' );
		
		$css .= '.p-header-area1{';
		$css .= 'background-color:' . $hex . ';';
		$css .= '}';
		return $css;
	}
	// LayoutのフッターコンテンツのCSS取得
	public function get_layout_footer_color_css() {
		// レイアウト
		
		$hex = get_theme_mod( 's-whoopee-footer-color' );
		$rgb = self::hex_to_rgb( $hex );
		
		$max = max( $rgb );
		$min = min( $rgb );
		$max_color = array_search( $max, $rgb );
		$min_color = array_search( $min, $rgb );
		
		// http://www.peko-step.com/tool/hslrgb.html様の計算
		// 色相
		if ( $rgb['r'] == $rgb['g'] && $rgb['g'] == $rgb['b'] ) {
			$h = 0;
		}
		
		switch ($max_color) {
			case 'r':
				$h = 60 * ( ( $rgb['g'] - $rgb['b'] ) / ( $max - $min ) );
				break;
			case 'g':
				$h = 60 * ( ( $rgb['b'] - $rgb['r'] ) / ( $max - $min ) ) + 120;
				break;
			case 'b':
				$h = 60 * ( ( $rgb['r'] - $rgb['g'] ) / ( $max - $min ) ) + 240;
				break;
			default:
				$h = 0;
				break;
		}
		if ( $h < 0 ) $h += 360;
		$h = round( $h );
		
		// 彩度
		$cnt = ( $max + $min ) / 2;
		if ( $cnt > 127 ) {
			$cnt = 255 - $cnt;
			$s = ( $max - $min ) / ( 510 - $max - $min ) * 100;
		} else {
			$s = ( $max - $min ) / ( $max + $min ) * 100;
		}
		$s = round( $s );
		
		// 明度
		$l = ( $max + $min ) / 2;
		$l = ( $l / 255 ) * 100;
		$l = round( $l );
		
		$css .= '#footer{';
		$css .= 'background-color:hsla(' . $h . ',' . $s . '%,' . $l . '%,1);';
		$css .= '}';
		return $css;
	}
	
	// habakiri様(http://habakiri.2inc.org/)から拝借・・・
	public function hex_to_rgb( $hex ) {
		$hex = str_replace( '#', '', $hex );
		if ( strlen( $hex ) == 3 ) {
			$r = hexdec( substr( $hex, 0, 1 ) . substr( $hex, 0, 1 ) );
			$g = hexdec( substr( $hex, 1, 1 ) . substr( $hex, 1, 1 ) );
			$b = hexdec( substr( $hex, 2, 1 ) . substr( $hex, 2, 1 ) );
		} else {
			$r = hexdec( substr( $hex, 0, 2 ) );
			$g = hexdec( substr( $hex, 2, 2 ) );
			$b = hexdec( substr( $hex, 4, 2 ) );
		}
		return array( 'r' => (int)$r, 'g' => (int)$g, 'b' => (int)$b );
	}
}