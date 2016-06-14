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