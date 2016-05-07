<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" >
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="header">
<div class="header-row-0"></div>
<div class="header-row-1">
	<div class="container">
		<div class="left">
			<?php if ( function_exists( 'the_custom_logo' ) ) : ?>
    		<h1 class="site-title"><a href="<?php echo home_url( '/' ); ?>"><?php the_custom_logo(); ?></a></h1>
    	<?php else : ?>
				<h1 class="site-title"><a href="<?php echo home_url( '/' ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
			<?php endif; ?>
			<p><?php bloginfo( 'description' ); ?></p>
		</div>
		<div class="right">
			<a href="tel:09014714638">090-1471-4638</a>
		</div>
	</div>
</div>
<div class="header-row-2">
	<div class="menu"><i class="fa fa-bars" aria-hidden="true"></i>&nbsp;MENU<i class="fa fa-chevron-circle-down" aria-hidden="true"></i></div>
	<?php wp_nav_menu( array(
		'theme_location'  => 'global',
		'menu_class'      => 'container',
		'container'       => 'nav',
		'container_class' => 'global-menu show',
	) ); ?>
</div>
<div class="header-row-3">
	<img class="header-image" src="<?php header_image(); ?>">
</div>
</header>