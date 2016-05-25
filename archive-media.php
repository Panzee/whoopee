<div class="c-media">
	<div class="c-media__figure">
		<div class="c-dummy-image">
			<?php if ( has_post_thumbnail() ) : ?>
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'thumbnail' ); ?></a>
			<?php else : ?>
				<a href="<?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/no-img.png" alt="no image" title="no image" width="150" height="150" /></a>
			<?php endif; ?>
		</div><!-- c-dummy-image -->
	</div><!-- c-media__figure -->
	<div class="c-media__body">
		<div class="p-archive-entry__body">
			<h2 class="p-archive-entry__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2><!-- p-archive__title -->
			<div class="p-archive-entry__excerpt"><a href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a></div><!-- p-archive__exerpt -->
			<div class="p-archive-entry__meta">
				<div class="p-archive-entry__datetime"><?php _e( 'Published', 'whoopee' ); ?>:<time datetime="<?php the_time( 'c' ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></time></div>
				<div class="p-archive-entry__tags"><?php _e( 'Tags', 'whoopee' ); ?>:<?php the_category( ', ' ); ?><?php the_tags( '', ', ' ); ?>
			</div><!-- p-archive-entry__meta -->
		</div><!-- p-archive-entry__body -->
	</div><!-- c-media__body -->
</div><!-- c-media -->