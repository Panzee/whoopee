<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" >
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--[if lt IE 9]>
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="header" style="background-color: #999";>
<div class="header-row-0"></div>
<div class="header-row-1">
	<div class="">
		<div class="left">
			<?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) : ?>
    		<h1 class="site-title"><a href="<?php echo home_url( '/' ); ?>"><?php the_custom_logo(); ?></a></h1>
    	<?php else : ?>
				<h1 class="site-title"><a href="<?php echo home_url( '/' ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
			<?php endif; ?>
			<p><?php bloginfo( 'description' ); ?></p>
		</div>
		<div class="right">
		</div>
	</div>
</div>
<div class="header-row-2">
	<div class="menu"><i class="fa fa-bars" aria-hidden="true"></i>&nbsp;MENU<i class="fa fa-chevron-circle-down" aria-hidden="true"></i></div>
	<?php wp_nav_menu( array(
		'theme_location'  => 'global',
	) ); ?>
	<div class="_c-container">
		<div class="staffs">
	    <div class="staff">1/3</div>
	    <div class="staff">1/3</div>
	    <div class="staff">1/3</div>
		</div>
	</div>
</div>
<div class="header-row-3">
	<img class="header-image" src="<?php header_image(); ?>">
</div>
</header>