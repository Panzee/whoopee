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
	</div><!-- c-row__col -->
	<div class="c-row__col c-row__col--1-1 is-side-row">
		<?php get_sidebar(); ?>
	</div><!-- c-row__col -->
</div><!-- c-row -->