<?php get_header(); ?>
<div class="contents">
	<div class="container">
		<main class="main left">
			<?php
				if ( have_posts() ) :
					while ( have_posts() ) :
					the_post();
			?>
				<article>
					<h2><?php the_title(); ?></h2>
					<div class="post-meta"><?php if ( get_the_modified_time() == get_the_time() ) : ?>
						<span>投稿日&nbsp;<time datetime="<?php the_time( 'c' ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></time></span>
					<?php else : ?>
						<span>投稿日&nbsp;<time datetime="<?php the_time( 'c' ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></time></span>
						<span>更新日&nbsp;<time datetime="<?php the_modified_time( 'c' ); ?>"><?php the_modified_time( get_option( 'date_format' ) ); ?></time></span>
					<?php endif; ?></div>
					<?php the_category( ', ' ); ?>
					<?php the_tags( '', ', ' ); ?>
					<?php the_content(); ?>
				</article>
				<?php comments_template(); ?>
			<?php
					endwhile;
				endif;
			?>
			<?php previous_post_link(); ?>
			<?php next_post_link(); ?>
		</main>
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>