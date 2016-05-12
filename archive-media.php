<article class="_c-media p-archive">
	<div class="_c-media__figure p-archive__thumbnail-box">
		<div class="c-dummy-image p-archive__thumbnail">
			<?php if ( has_post_thumbnail() ) : ?>
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'thumbnail' ); ?></a>
			<?php else : ?>
				<a href="<?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/no-img.png" alt="no image" title="no image" width="150" height="150" /></a>
			<?php endif; ?>
		</div><!-- c-dummy-image -->
	</div><!-- _c-media__figure -->
	<div class="_c-media__body p-archive__body">
		<h2 class="p-archive__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2><!-- p-archive__title -->
		<div class="p-archive__excerpt"><a href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a></div><!-- p-archive__exerpt -->
		<div class="p-archive__meta">
			<div class="p-archive__datetime">公開日：<time datetime="<?php the_time( 'c' ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></time></div>
			<div class="p-archive__tags">タグ：<?php the_category( ', ' ); ?><?php the_tags( '', ', ' ); ?>
		</div><!-- p-archive__meta -->
	</div><!-- _c-media__body -->
</article><!-- _c-media -->