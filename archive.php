<?php get_header();?>
<div id="contents">
	<div class="c-container">
		<div class="c-row is-contents-layout">
			<div class="c-row__col c-row__col--1-1 is-main-row">
				<main id="main">
					<section class="p-archive">
					<?php
						if ( have_posts() ) :
							the_archive_title( '<h1 class="p-archive__title">', '</h1>' );
							if (get_the_archive_description()) :
								the_archive_description( '<div class="p-archive__description">', '</div>' );
							endif;
							while ( have_posts() ) :
								the_post();
					?>
								<article <?php post_class( 'p-archive__entry' ); ?>>
									<?php get_template_part( 'archive', 'media' ); ?>
								</article>
					<?php
							endwhile;
					else :
					?>
						<p><?php _e( 'Sorry. Page does not exist.', 'whoopee' ); ?></p>
					<?php
					endif;
					?>
					<?php get_template_part( 'pager' ); ?>
					</section><!-- p-archive -->
				</main>
			</div><!-- c-row__col -->
			<div class="c-row__col c-row__col--1-1 is-side-row">
				<?php get_sidebar(); ?>
			</div><!-- c-row__col -->
		</div><!-- c-row -->
	</div><!-- _c-container -->
</div><!-- contents -->
<?php get_footer(); ?>