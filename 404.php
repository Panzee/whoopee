<?php get_header();?>
<div id="contents">
	<div class="c-container">
		<div class="c-row is-contents-layout">
			<div class="c-row__col c-row__col--1-1 is-main-row">
				<main id="main">
					<section class="p-archive">
						<h1><?php _e( 'Not Found', 'whoopee' ); ?></h1>
						<p><?php _e( 'Sorry. Page does not exist.', 'whoopee' ); ?></p>
					</section>
				</main>
			</div><!-- c-row__col -->
			<div class="c-row__col c-row__col--1-1 is-side-row">
				<?php get_sidebar(); ?>
			</div><!-- c-row__col -->
		</div><!-- c-row -->
	</div><!-- _c-container -->
</div><!-- contents -->
<?php get_footer(); ?>