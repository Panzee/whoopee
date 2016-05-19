<?php get_header();?>
<div id="contents">
	<div class="c-container">
		<?php
			global $template;
			echo $template;
			if ( is_front_page() && is_home() ) {
				get_template_part( 'contents', 'archive' );
			} elseif ( is_front_page() ) {
				get_template_part( 'contents', 'page' );
			} elseif ( is_home() ) {
				get_template_part( 'contents', 'archive' );
			} elseif ( is_single() ) {
				get_template_part( 'contents', 'single' );
			} elseif ( is_page() ) {
				get_template_part( 'contents', 'page' );
			} elseif ( is_archive() ) {
				get_template_part( 'contents', 'archive' );
			} else {
				echo 'ccc';
			}
		?>
	</div><!-- _c-container -->
</div><!-- contents -->
<?php get_footer(); ?>