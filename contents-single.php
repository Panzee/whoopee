<div class="c-row is-contents-layout">
	<div class="c-row__col c-row__col--1-1 is-main-row">
		<main id="main">
			<?php
				if ( have_posts() ) :
					while ( have_posts() ) :
					the_post();
			?>
				<article class="p-single">
					<h1 class="p-single__title"><?php the_title(); ?></h1>
					<div class="p-single__meta">
						<?php if ( get_the_modified_time() == get_the_time() ) : ?>
							<div class="p-single__post">投稿日：<time datetime="<?php the_time( 'c' ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></time></div>
						<?php else : ?>
							<div class="p-single__post">投稿日：<time datetime="<?php the_time( 'c' ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></time></div>
							<div class="p-single__update">更新日：<time datetime="<?php the_modified_time( 'c' ); ?>"><?php the_modified_time( get_option( 'date_format' ) ); ?></time></div>
						<?php endif; ?>
						<div class="p-single__tags">タグ：<?php the_category( ' ' ); ?><?php if ( get_the_tags() ) the_tags( '', '' ); ?></div>
					</div><!-- post-meta -->
					<div class="p-single__content">
						<?php the_content(); ?>
						<?php wp_link_pages( array('before' => '<p class="page-links">', 'pagelink' => '<span class="page-link">%</span>') ); ?>
					</div><!-- p-single__content -->
					<?php comments_template(); ?>
				</article>
			<?php
					endwhile;
				endif;
			?>
			<div class="p-pager">
				<div class="p-pager__previous"><?php previous_post_link('%link', '前の記事'); ?></div>
				<div class="p-pager__next"><?php next_post_link('%link', '次の記事'); ?></div>
			</div><!-- p-single-pager -->
		</main>
	</div><!-- c-row__col -->
	<div class="c-row__col c-row__col--1-1 is-side-row">
		<?php get_sidebar(); ?>
	</div><!-- c-row__col -->
</div><!-- c-row -->