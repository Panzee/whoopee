<?php get_header(); ?>
<div id="contents">
	<div class="_c-container">
		<?php 
			if ( is_page() ) {
				get_template_part( 'contents', 'page' );
			} else if ( is_single() ) {
				get_template_part( 'contents', 'single' );
			}
		?>
	</div><!-- _c-container -->
</div><!-- contents -->
<?php get_footer(); ?>