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
<header id="header">
	<div class="_c-container">
		<div class="_c-row _c-row--auto _c-row--lg-margin">
			<div class="_c-row__col">	
				<div class="p-site-brand">
					<?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) : ?>
		    		<h1 class="p-site-brand__logo"><a class="p-site-brand__link" href="<?php echo home_url( '/' ); ?>"><?php the_custom_logo(); ?></a></h1>
		    	<?php else : ?>
						<h1 class="p-site-brand__title"><a class="p-site-brand__link" href="<?php echo home_url( '/' ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
					<?php endif; ?>
					<p class="p-site-brand__description"><?php bloginfo( 'description' ); ?></p>
				</div><!-- p-site-brand -->
			</div><!-- c-row__col -->
			<div class="_c-row__col _u-hidden-sm _u-hidden-md">
				<div class="p-global-nav _u-pull-right">
					<?php wp_nav_menu( array(
						'theme_location'  => 'global',
						'container'				=> false,
					) ); ?>
				</div><!-- p-global-nav -->
			</div><!-- c-row__col -->
			<div class="_c-row__col _u-hidden-lg">
				<div class="_u-pull-right"><i class="fa fa-bars fa-2x"></i></div>
			</div><!-- c-row__col -->
		</div><!-- c-row -->
		<img class="header-image" src="<?php header_image(); ?>">
	</div><!-- c-container -->
</header>