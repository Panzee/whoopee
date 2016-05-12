<?php get_header(); ?>
<div id="contents">
	<div class="_c-container">
		<div class="_c-row _c-row--margin">
			<div class="_c-row__col _c-row__col--1-1 _c-row__col--md-2-3">
				<main id="main" class="p-search">
					<h2>「<?php echo esc_html( $s ); ?>」の検索結果 ：<?php echo $wp_query->found_posts; ?> 件 </h2>
					<?php
						if ( have_posts() ) :
							while ( have_posts() ) :
								the_post();
								get_template_part( 'archive', 'media' );
							endwhile;
						endif;
					?>
					<?php get_template_part( 'pager' ); ?>
				</main>
			</div><!-- _c-row__col -->
			<div class="_c-row__col _c-row__col--1-1 _c-row__col--md-1-3">
				<?php get_sidebar(); ?>
			</div><!-- _c-row__col -->
		</div><!-- _c-row -->
	</div><!-- _c-container -->
</div><!-- contents -->
<?php get_footer(); ?>