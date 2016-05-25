<?php

// Set content width
if ( ! isset( $content_width ) ) $content_width = 1200;

// Load internationalization file
load_theme_textdomain( 'whoopee', get_template_directory() . '/languages' );

// Add theme supports
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
	'flex-height' => true,
) );

//  Register menus
register_nav_menus( array(
	'global'	=> __( 'Global Navigation', 'whoopee' ),
) );

/**
 * Register widget areas
 */
function whoopee_register_sidebar() {
	// sidebar
	register_sidebar( array(
		'id'						=> 'sidebar',
		'before_widget'	=> '<section class="p-widget %2$s">',
		'after_widget'	=> '</section>',
		'before_title'	=> '<h1 class="p-widget__title">',
		'after_title'		=> '</h1>',
	) );
	// footer 1
	register_sidebar( array(
		'id'						=> 'footer-1',
		'name'          => __( 'Footer 1', 'whoopee' ),
		'before_widget'	=> '<section class="p-widget %2$s">',
		'after_widget'	=> '</section>',
		'before_title'	=> '<h1 class="p-widget__title">',
		'after_title'		=> '</h1>',
	) );
	// footer 2
	register_sidebar( array(
		'id'						=> 'footer-2',
		'name'          => __( 'Footer 2', 'whoopee' ),
		'before_widget'	=> '<section class="p-widget %2$s">',
		'after_widget'	=> '</section>',
		'before_title'	=> '<h1 class="p-widget__title">',
		'after_title'		=> '</h1>',
	) );
	// footer 3
	register_sidebar( array(
		'id'						=> 'footer-3',
		'name'          => __( 'Footer 3', 'whoopee' ),
		'before_widget'	=> '<section class="p-widget %2$s">',
		'after_widget'	=> '</section>',
		'before_title'	=> '<h1 class="p-widget__title">',
		'after_title'		=> '</h1>',
	) );
}
add_action( 'widgets_init', 'whoopee_register_sidebar' );

/**
 * Load CSS and JS
 */
function whoopee_wp_enqueue_scripts() {
	
	// comment-reply
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	// orignal js on the menu
	wp_enqueue_script(
		'whoopee-menu.js',
		get_template_directory_uri() . '/js/whoopee-menu.js',
		array( 'jquery' ),
		'1.0.0',
		true
	);
	// font-awesome
	wp_enqueue_style(
		'font-awesome',
		'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css',
		array(),
		'4.6.1'
	);
	// style.css
	wp_enqueue_style(
		get_template(),
		get_template_directory_uri() . '/sass/style.css',
		array(),
		'1.0.0'
	);
}
add_action( 'wp_enqueue_scripts'	, 'whoopee_wp_enqueue_scripts' );

/**
 * Extension Theme customizer
 * 
 * @param object $wp_customize
 */	
function whoopee_customize_register( $wp_customize ) {
		
	// Main contents Layout
	$wp_customize->add_section( 'whoopee-layout', array(
		'title'				=> __( 'Layout', 'whoopee' ),
		'priority'		=> 10,
	));
	$wp_customize->add_setting( 's-whoopee-layout-contents', array(
			'default'  					=> 'column-2-right',
			'transport'					=> 'postMessage',
			'sanitize_callback' => 'sanitize_radio',
	));
	$wp_customize->add_control( 'c-whoopee-layout-contents', array(
			'section'			=> 'whoopee-layout',
			'settings'		=> 's-whoopee-layout-contents',
			'label'				=> __( 'Main Contents', 'whoopee' ),
			'type'				=> 'radio',
			'choices'    	=> array(
					'column-1' 				=> __( 'One Column', 'whoopee' ),
					'column-2-left' 	=> __( 'Two Column Left', 'whoopee' ),
					'column-2-right' 	=> __( 'Two Column Right', 'whoopee' ),
			),
			'priority'	=> 10,
	));
		
	// Header Layout
	$wp_customize->add_setting( 's-whoopee-layout-header', array(
			'default'  					=> 'default',
			'transport'					=> 'postMessage',
			'sanitize_callback' => 'sanitize_radio',
	));
	$wp_customize->add_control( 'c-whoopee-layout-header', array(
			'section'		=> 'whoopee-layout',
			'settings'	=> 's-whoopee-layout-header',
			'label'			=> __( 'Header', 'whoopee' ),
			'type'			=> 'radio',
			'choices'   => array(
					'default' 			=> __( 'Default', 'whoopee' ),
					'hedaer-fixed'	=> __( 'Fixed', 'whoopee' ),
			),
			'priority'	=> 20,
	) );
	function sanitize_radio( $input ) {
		return $input;
	}
		
	// Header Color
	$wp_customize->remove_control( 'header_textcolor' );	
	$wp_customize->add_setting( 's-whoopee-header-color', array(
			'default'  					=> '#ffffff',
			'transport'					=> 'postMessage',
			'sanitize_callback'	=> 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'c-whoopee-header-color', array(
			'section'			=> 'colors',
			'settings'		=> 's-whoopee-header-color',
			'label'				=> __( 'Header Color', 'whoopee' ),
			'priority'		=> 50,
	) ) );
	// Footer Color
	$wp_customize->add_setting( 's-whoopee-footer-color', array(
			'default'  					=> '#333333',
			'transport'					=> 'postMessage',
			'sanitize_callback'	=> 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'c-whoopee-footer-color', array(
			'section'			=> 'colors',
			'settings'		=> 's-whoopee-footer-color',
			'label'				=> __( 'Footer Color', 'whoopee' ),
			'priority'		=> 60,
	) ) );
	// Heading Color
	$wp_customize->add_setting( 's-whoopee-heading-color', array(
			'default'						=> '#606060',
			'transport'					=> 'postMessage',
			'sanitize_callback'	=> 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'c-whoopee-heading-color', array(
			'section'			=> 'colors',
			'settings'		=> 's-whoopee-heading-color',
			'label'				=> __( 'Heading Color', 'whoopee' ),
			'priority'		=> 70,
	) ) );
}
add_action( 'customize_register', 'whoopee_customize_register' );

/**
 * Display CSS That Theme Customizer Setting
 */
function header_output() {
  echo '<style type="text/css">';
  	echo get_layout_main_css();
  	echo get_layout_header_css();
  	echo get_layout_header_color_css();
  	echo get_layout_footer_color_css();
  	echo get_layout_heading_color_css();
  echo '</style>'; 
}
add_action( 'wp_head', 'header_output' );

/**
 * Load JS Theme Customizer
 */
function live_preview() {
	wp_enqueue_script(
		'theme-customizer.js',
		get_template_directory_uri() . '/js/theme-customizer.js',
		array( 'jquery', 'customize-preview' ),
		'1.0.0',
		true
	);
}
add_action( 'customize_preview_init', 'live_preview' );
	
/**
 * Create CSS Main Layout
 *
 * @return string
 */
function get_layout_main_css() {

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
	$css .= '-ms-flex: 0 1 ' . $main_width . ';';
	$css .= '-webkit-flex: 0 1 ' . $main_width . ';';
	$css .= 'flex: 0 1 ' . $main_width . ';';
	$css .= 'max-width: ' . $main_width . ';';
	$css .= '}';

	$css .= '.is-side-row{';
	$css .= '-ms-flex: 0 1 ' . $side_width . ';';
	$css .= '-webkit-flex: 0 1 ' . $side_width . ';';
	$css .= 'flex: 0 1 ' . $side_width . ';';
	$css .= 'max-width:' . $side_width . ';';
	$css .= '}';
	$css .= '}';

	return $css;
}
	
/**
 * Create CSS Header Layout
 *
 * @return string
 */
function get_layout_header_css() {
	// レイアウト
	switch ( get_theme_mod( 's-whoopee-layout-header' ) ) {
		case 'default':
			$position = 'absolute';
			$box_shadow = 'none';
			break;
		case 'hedaer-fixed':
			$position = 'fixed';
			$box_shadow = '0 .01rem .3rem .1rem #aaa';
			break;
		default:
			$position = 'absolute';
			$box_shadow = 'none';
			break;
	}
	$css = '';
	$css .= '.is-site-header{';
	$css .= 'position:' . $position . ';';
	$css .= 'top:0;';
	$css .= 'left:0;';
	$css .= 'right:0;';
	$css .= 'box-shadow:' . $box_shadow . ';';
	$css .= '}';
	
	return $css;
}
	
/**
 * Create CSS Header Color
 *
 * @return string
 */
function get_layout_header_color_css() {
	
	$hex = get_theme_mod( 's-whoopee-header-color' );
	if ( $hex == '' ) $hex = 'transparent';
	
	$css = '';
	$css .= '.p-header-area1{';
	$css .= 'background-color:' . $hex . ';';
	$css .= '}';
	$css .= '.p-header-area2{';
	$css .= 'background-color:' . $hex . ';';
	$css .= '}';
	return $css;
}
/**
 * Create CSS Footer Color
 *
 * @return string
 */
function get_layout_footer_color_css() {
	
	$hex = get_theme_mod( 's-whoopee-footer-color' );
	if ( $hex == '' ) $hex = 'transparent';
	
	$css = '';
	$css .= '#footer{';
	$css .= 'background-color:' . $hex . ';';
	$css .= '}';
	$css .= '.page-numbers.current{';
	$css .= 'background-color:' . $hex . ';';
	$css .= '}';
	$css .= '.page-links > span{';
	$css .= 'background-color:' . $hex . ';';
	$css .= '}';
	return $css;
}
/**
 * Create CSS Heading Color
 *
 * @return string
 */
function get_layout_heading_color_css() {
	
	$hex = get_theme_mod( 's-whoopee-heading-color' );
	if ( $hex == '' ) $hex = 'transparent';

	$css = '';
	$css .= '.p-entry__content h2{';
	$css .= 'border-left: solid .8rem ' . $hex . ';';
	$css .= 'border-bottom: solid .1rem ' . $hex . ';';
	$css .= '}';
	$css .= '.p-entry__content h3:after{';
	$css .= 'background-color:' . $hex . ';';
	$css .= '}';
	$css .= '.p-entry__content h4{';
	$css .= 'border-left: solid .8rem ' . $hex . ';';
	$css .= '}';
	$css .= '.p-entry__content h5:before{';
	$css .= 'color:' . $hex . ';';
	$css .= '}';
	$css .= '.p-entry__content h6:before{';
	$css .= 'color:' . $hex . ';';
	$css .= '}';
	return $css;
}