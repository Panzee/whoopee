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
<header id="header" class="p-header">
	<div class="p-header-area1 is-site-header">
		<div class="c-container">
			<div class="c-row c-row--nowrap c-row--auto c-row--between">
				<div class="c-row__col">	
					<div class="p-site-brand">
						<?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) : ?>
			    		<h1 class="p-site-brand__logo"><a class="p-site-brand__link" href="<?php echo home_url( '/' ); ?>"><?php the_custom_logo(); ?></a></h1>
			    	<?php else : ?>
							<h1 class="p-site-brand__title"><a class="p-site-brand__link" href="<?php echo home_url( '/' ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
						<?php endif; ?>
					</div><!-- p-site-brand -->
				</div><!-- c-row__col -->
				<div class="c-row__col u-hidden-sm u-hidden-md">
					<div class="p-global-nav">
						<?php wp_nav_menu( array(
							'theme_location'  => 'global',
							'container'				=> false,
						) ); ?>
					</div><!-- p-site-global-nav -->
				</div><!-- c-row__col -->
				<div class="c-row__col u-hidden-lg">
					<div class="p-hamburger-menu is-click-hamburger"><i class="fa fa-bars fa-2x"></i></div>
				</div><!-- c-row__col -->
			</div><!-- c-row -->
			<div class="p-hamburger-nav">
				<?php wp_nav_menu( array(
					'theme_location'  => 'global',
					'container'				=> false,
				) ); ?>
			</div><!-- p-hamburger-nav -->
		</div><!-- c-container -->
	</div><!-- p-header-area1 -->
	<div class="p-header-area2 is-fixed-next-area">
		<div class="c-container">
			<p class="p-header__description"><?php bloginfo( 'description' ); ?></p>
		</div><!-- c-container -->
	</div><!-- p-header-area2 -->
	<div class="p-header-area3">
		<div class="c-container">
			<div class="p-header__image"><img src="<?php header_image(); ?>"></div>
		</div><!-- c-container -->
	</div><!-- p-header-area3 -->
</header>