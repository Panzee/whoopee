<div class="_c-media">
	<div class="_c-media__figure">
		<div class="c-dummy-image">
			<?php if ( has_post_thumbnail() ) : ?>
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'thumbnail' ); ?></a>
			<?php else : ?>
				<a href="<?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/no-img.png" alt="no image" title="no image" width="150" height="150" /></a>
			<?php endif; ?>
		</div><!-- c-dummy-image -->
	</div><!-- _c-media__figure -->
	<div class="_c-media__body">
		<div class="c-archive-entry__body">
			<h2 class="c-archive-entry__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2><!-- p-archive__title -->
			<div class="c-archive-entry__excerpt"><a href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a></div><!-- p-archive__exerpt -->
			<div class="c-archive-entry__meta">
				<div class="c-archive-entry__datetime">公開日：<time datetime="<?php the_time( 'c' ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></time></div>
				<div class="c-archive-entry__tags">タグ：<?php the_category( ', ' ); ?><?php the_tags( '', ', ' ); ?>
			</div><!-- c-archive-entry__meta -->
		</div><!-- c-archive-entry__body -->
	</div><!-- _c-media__body -->
</div><!-- _c-media -->