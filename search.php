<?php get_header(); ?>
<div id="contents">
	<div class="_c-container">
		<div class="c-row is-contents-layout">
			<div class="c-row__col c-row__col--1-1 c-row__col--md-2-3">
				<main id="main">
					<section class="p-archive p-search">
						<?php get_search_form(); ?>
						<p class="p-search__count"><?php _e( 'Result', 'whoopee' ) ?>:<?php echo $wp_query->found_posts; ?> <?php _e( 'hit', 'whoopee' ); ?></p>
						<?php
							if ( have_posts() ) :
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
					</section>	
				</main>
			</div><!-- c-row__col -->
			<div class="c-row__col c-row__col--1-1 c-row__col--md-1-3">
				<?php get_sidebar(); ?>
			</div><!-- c-row__col -->
		</div><!-- c-row -->
	</div><!-- c-container -->
</div><!-- contents -->
<?php get_footer(); ?>