<?php get_header(); ?>
<div id="contents">
	<div class="_c-container">
		<div class="_c-row _c-row--margin-s">
			<div class="_c-row__col _c-row__col--1-1 _c-row__col--md-2-3">
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
						<article class="p-archive__entry">
						<?php get_template_part( 'archive', 'media' ); ?>
						</article>
						<?php
								endwhile;
							endif;
						?>
						<?php get_template_part( 'pager' ); ?>
					</section>
				</main>
			</div><!-- _c-row__col -->
			<div class="_c-row__col _c-row__col--1-1 _c-row__col--md-1-3">
				<?php get_sidebar(); ?>
			</div><!-- _c-row__col -->
		</div><!-- _c-row -->
	</div><!-- _c-container -->
</div><!-- contents -->
<?php get_footer(); ?>