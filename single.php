<?php get_header(); ?>
<div id="contents">
	<div class="_c-container">
		<div class="_c-row _c-row--margin">
			<div class="_c-row__col _c-row__col--1-1 _c-row__col--md-2-3">
				<main id="main" class="p-single">
					<?php
						if ( have_posts() ) :
							while ( have_posts() ) :
							the_post();
					?>
						<article>
							<h2><?php the_title(); ?></h2>
							<div class="single-meta">
								<?php if ( get_the_modified_time() == get_the_time() ) : ?>
									<div class="single-update">投稿日&nbsp;<time datetime="<?php the_time( 'c' ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></time></div>
								<?php else : ?>
									<div class="single-update">投稿日&nbsp;<time datetime="<?php the_time( 'c' ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></time></div>
									<div class="single-update">更新日&nbsp;<time datetime="<?php the_modified_time( 'c' ); ?>"><?php the_modified_time( get_option( 'date_format' ) ); ?></time></div>
								<?php endif; ?>
								<div class="single-tags">タグ&nbsp;<?php the_category( ', ' ); ?><?php the_tags( '', ', ' ); ?></div>
							</div><!-- post-meta -->
							<?php the_content(); ?>
						</article>
						<?php comments_template(); ?>
					<?php
							endwhile;
						endif;
					?>
					<div class="single-pager _c-row">
						<div class="_c-row__col _c-row__col--1-3 _u-text-center"><?php previous_post_link(); ?></div>
						<div class="_c-row__col _c-row__col--1-3 _u-text-center">dummy</div>
						<div class="_c-row__col _c-row__col--1-3 _u-text-center"><?php next_post_link(); ?></div>
					</div><!-- _c-row -->
				</main>
			</div><!-- _c-row__col -->
			<div class="_c-row__col _c-row__col--1-1 _c-row__col--md-1-3">
				<?php get_sidebar(); ?>
			</div><!-- _c-row__col -->
		</div><!-- _c-row -->
	</div><!-- _c-container -->
</div><!-- contents -->
<?php get_footer(); ?>