<?php get_header();?>
<div id="contents">
	<div class="c-container">
		<div class="c-row is-contents-layout">
			<div class="c-row__col c-row__col--1-1 c-row__col--md-3-4">
				<main id="main">
					<?php
						if ( have_posts() ) :
							while ( have_posts() ) :
							the_post();
					?>
						<article <?php post_class( array( 'p-entry' ) ); ?>>
							<h1 class="p-entry__title"><?php the_title(); ?></h1>
							<div class="p-entry__meta">
								<?php if ( get_the_modified_time() == get_the_time() ) : ?>
									<div class="p-entry__post"><?php _e( 'Published', 'whoopee' ); ?>:<time datetime="<?php the_time( 'c' ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></time></div>
								<?php else : ?>
									<div class="p-entry__post"><?php _e( 'Published', 'whoopee' ); ?>:<time datetime="<?php the_time( 'c' ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></time></div>
									<div class="p-entry__update"><?php _e( 'Updated', 'whoopee' ); ?>:<time datetime="<?php the_modified_time( 'c' ); ?>"><?php the_modified_time( get_option( 'date_format' ) ); ?></time></div>
								<?php endif; ?>
								<div class="p-entry__tags"><?php _e( 'Tags', 'whoopee' ); ?>:<?php the_category( ' ' ); ?><?php if ( get_the_tags() ) the_tags( '', '' ); ?></div>
								<div class="p-entry__editor"><span class="p-entry__author"><?php _e( 'Author', 'whoopee' ); ?>:<?php the_author(); ?></span><span class="p-entry__edit"><?php edit_post_link(); ?></span></div>
							</div><!-- p-entry-meta -->
							<div class="p-entry__content">
								<?php the_content(); ?>
								<?php wp_link_pages( array( 'before' => '<p class="page-links">', 'pagelink' => '<span class="page-link">%</span>' ) ); ?>
							</div><!-- p-entry__content -->
							<?php comments_template(); ?>
							<div class="p-pager">
								<div class="p-pager__previous"><?php previous_post_link( '%link', __( 'Previous Post', 'whoopee' ) ); ?></div>
								<div class="p-pager__next"><?php next_post_link( '%link', __( 'Next Post', 'whoopee' ) ); ?></div>
							</div><!-- p-pager -->
						</article><!-- p-entry -->
					<?php
							endwhile;
						endif;
					?>
				</main>
			</div><!-- c-row__col -->
			<div class="c-row__col c-row__col--1-1 c-row__col--md-1-4">
				<?php get_sidebar(); ?>
			</div><!-- c-row__col -->
		</div><!-- c-row -->
	</div><!-- _c-container -->
</div><!-- contents -->
<?php get_footer(); ?>