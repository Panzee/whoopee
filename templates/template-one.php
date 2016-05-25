<?php
/*
Template Name: Template One
*/
?>

<?php get_header();?>
<div id="contents">
	<div class="c-container">
		<div class="c-row">
			<div class="c-row__col c-row__col--1-1">
				<main id="main">
					<?php
						if ( have_posts() ) :
							while ( have_posts() ) :
							the_post();
					?>
						<article class="p-entry">
							<h1 class="p-entry__title"><?php the_title(); ?></h1>
							<div class="p-entry__content">
								<?php the_content(); ?>
								<?php wp_link_pages( array('before' => '<p class="page-links">', 'pagelink' => '<span class="page-link">%</span>') ); ?>
							</div><!-- p-entry__content -->
							<?php comments_template(); ?>
						</article><!-- p-entry -->
					<?php
							endwhile;
						endif;
					?>
				</main><!-- main -->
			</div><!-- c-row__col -->
			<div class="c-row__col c-row__col--1-1">
				<?php get_sidebar(); ?>
			</div><!-- c-row__col -->
		</div><!-- c-row -->
	</div><!-- _c-container -->
</div><!-- contents -->
<?php get_footer(); ?>